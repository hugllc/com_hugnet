<?php
/**
 * Joomla Component for viewing HUGnet data
 *
 * PHP Version 5
 *
 * <pre>
 * com_hugnet is a joomla component for interacting with the HUGnet system
 * Copyright (C) 2013 Hunt Utilities Group, LLC
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * </pre>
 *
 * @category   Joomla
 * @package    Components
 * @subpackage Controllers
 * @author     Scott Price <prices@hugllc.com>
 * @copyright  2013 Hunt Utilities Group, LLC
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link       http://dev.hugllc.com/index.php/Project:com_hugnet
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Require the base controller
require_once (JPATH_COMPONENT.DS.'controller.php');

$component = JComponentHelper::getComponent('com_hugnet');
$api_url = $component->params->get("hugnet_api_url");

// static mixed script (string $file, [boolean $framework = false], [boolean $relative = false], [boolean $path_only = false], [boolean $detect_browser = true], [boolean $detect_debug = true])
JHTML::script(dirname($api_url)."/hugnet.js");
JHTML::script(dirname($api_url)."/contrib.js");

//static mixed stylesheet (string $file, [array $attribs = array()], [boolean $relative = false], [boolean $path_only = false], [boolean $detect_browser = true], [boolean $detect_debug = true])

// Create the controller
$controller = JController::getInstance('HUGnet');

// Perform the Request task
$controller->execute(JRequest::getVar('task', null, 'default', 'cmd'));
$controller->redirect();
?>
