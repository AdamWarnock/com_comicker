<?php
/**
 * @version     0.0.2
 * @package     com_comicker
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Adam Warnock <salsa.the.geek@gmail.com> - http://radboxstudio.com
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_comicker')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Comicker');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
