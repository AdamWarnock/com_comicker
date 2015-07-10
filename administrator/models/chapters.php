<?php

/**
 * @version     0.0.2
 * @package     com_comicker
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Adam Warnock <salsa.the.geek@gmail.com> - http://radboxstudio.com
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Comicker records.
 */
class ComickerModelChapters extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'chaptertitle', 'a.chaptertitle',
                'chapterdescription', 'a.chapterdescription',
                'chapterimage', 'a.chapterimage',
                'chaptertags', 'a.chaptertags',
                'parentcomic', 'a.parentcomic',
                'parentchapter', 'a.parentchapter',

            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     */
    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);

        
		//Filtering parentcomic
		$this->setState('filter.parentcomic', $app->getUserStateFromRequest($this->context.'.filter.parentcomic', 'filter_parentcomic', '', 'string'));

		//Filtering parentchapter
		$this->setState('filter.parentchapter', $app->getUserStateFromRequest($this->context.'.filter.parentchapter', 'filter_parentchapter', '', 'string'));


        // Load the parameters.
        $params = JComponentHelper::getParams('com_comicker');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.chaptertitle', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('filter.search');
        $id.= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'DISTINCT a.*'
                )
        );
        $query->from('`#__comicker_chapters` AS a');

        
		// Join over the users for the checked out user
		$query->select("uc.name AS editor");
		$query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
		// Join over the foreign key 'parentcomic'
		$query->select('#__comicker_comics_1951363.id AS comics_id_1951363');
		$query->join('LEFT', '#__comicker_comics AS #__comicker_comics_1951363 ON #__comicker_comics_1951363.id = a.parentcomic');
		// Join over the foreign key 'parentchapter'
		$query->select('#__comicker_chapters_1951364.id AS chapters_id_1951364');
		$query->join('LEFT', '#__comicker_chapters AS #__comicker_chapters_1951364 ON #__comicker_chapters_1951364.id = a.parentchapter');

        

		// Filter by published state
		$published = $this->getState('filter.state');
		if (is_numeric($published)) {
			$query->where('a.state = ' . (int) $published);
		} else if ($published === '') {
			$query->where('(a.state IN (0, 1))');
		}

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.chaptertitle LIKE '.$search.'  OR  a.parentcomic LIKE '.$search.'  OR  a.parentchapter LIKE '.$search.' )');
            }
        }

        

		//Filtering parentcomic
		$filter_parentcomic = $this->state->get("filter.parentcomic");
		if ($filter_parentcomic) {
			$query->where("a.parentcomic = '".$db->escape($filter_parentcomic)."'");
		}

		//Filtering parentchapter
		$filter_parentchapter = $this->state->get("filter.parentchapter");
		if ($filter_parentchapter) {
			$query->where("a.parentchapter = '".$db->escape($filter_parentchapter)."'");
		}


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
		foreach ($items as $oneItem) {

			if ( isset($oneItem->chaptertags) ) {
				// Catch the item tags (string with ',' coma glue)
				$tags = explode(",",$oneItem->chaptertags);

				$db = JFactory::getDbo();
					$namedTags = array(); // Cleaning and initalization of named tags array

					// Get the tag names of each tag id
					foreach ($tags as $tag) {

						$query = $db->getQuery(true);
						$query->select("title");
						$query->from('`#__tags`');
						$query->where( "id=" . intval($tag) );

						$db->setQuery($query);
						$row = $db->loadObjectList();

						// Read the row and get the tag name (title)
						if (!is_null($row)) {
							foreach ($row as $value) {
								if ( $value && isset($value->title) ) {
									$namedTags[] = trim($value->title);
								}
							}
						}

					}

					// Finally replace the data object with proper information
					$oneItem->chaptertags = !empty($namedTags) ? implode(', ',$namedTags) : $oneItem->chaptertags;
				}

			if (isset($oneItem->parentcomic)) {
				$values = explode(',', $oneItem->parentcomic);

				$textValue = array();
				foreach ($values as $value){
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$query
							->select($db->quoteName('id'))
							->from('`#__comicker_comics`')
							->where($db->quoteName('id') . ' = '. $db->quote($db->escape($value)));
					$db->setQuery($query);
					$results = $db->loadObject();
					if ($results) {
						$textValue[] = $results->id;
					}
				}

			$oneItem->parentcomic = !empty($textValue) ? implode(', ', $textValue) : $oneItem->parentcomic;

			}

			if (isset($oneItem->parentchapter)) {
				$values = explode(',', $oneItem->parentchapter);

				$textValue = array();
				foreach ($values as $value){
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$query
							->select($db->quoteName('id'))
							->from('`#__comicker_chapters`')
							->where($db->quoteName('id') . ' = '. $db->quote($db->escape($value)));
					$db->setQuery($query);
					$results = $db->loadObject();
					if ($results) {
						$textValue[] = $results->id;
					}
				}

			$oneItem->parentchapter = !empty($textValue) ? implode(', ', $textValue) : $oneItem->parentchapter;

			}
		}
        return $items;
    }

}
