<?php

/**
 * @version     0.0.2
 * @package     com_comicker
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Adam Warnock <salsa.the.geek@gmail.com> - http://radboxstudio.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Comicker helper.
 */
class ComickerHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_COMICKER_TITLE_COMICS'),
			'index.php?option=com_comicker&view=comics',
			$vName == 'comics'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_COMICKER_TITLE_CHAPTERS'),
			'index.php?option=com_comicker&view=chapters',
			$vName == 'chapters'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_COMICKER_TITLE_PAGES'),
			'index.php?option=com_comicker&view=pages',
			$vName == 'pages'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_comicker';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
