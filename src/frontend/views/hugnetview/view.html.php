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

jimport('joomla.application.component.view');
/**
 * This is the base class for the view.
 *
 * @category   Joomla
 * @package    Components
 * @subpackage Controllers
 * @author     Scott Price <prices@hugllc.com>
 * @copyright  2013 Hunt Utilities Group, LLC
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version    Release: 0.0.2
 * @link       http://dev.hugllc.com/index.php/Project:com_hugnet
 * @since      0.0.1
 */
class HUGnetViewHUGnetView extends Jview
{
    /**
    * The display function
    *
    * @param string $tpl The template to use
    *
    * @return null
    */
    function display($tpl = null)
    {
        // Get the component
        $component = JComponentHelper::getComponent('com_hugnet');
        $api_url = $component->params->get("hugnet_api_url");


        /*
        static mixed script (string $file, [boolean $framework = false],
            [boolean $relative = false], [boolean $path_only = false],
            [boolean $detect_browser = true], [boolean $detect_debug = true])
        */
        JHTML::script(dirname($api_url)."/contrib.js");
        JHTML::script(dirname($api_url)."/hugnet.js");
        $filebase = "components".DS."com_hugnet".DS."views".DS."hugnetview";
        $assetbase = "components".DS."com_hugnet".DS."assets";
        JHTML::script(
            $filebase.DS."view.js"
        );

        /*
        static mixed stylesheet (string $file, [array $attribs = array()],
            [boolean $relative = false], [boolean $path_only = false],
            [boolean $detect_browser = true], [boolean $detect_debug = true])
        */
        JHTML::stylesheet(
            $filebase.DS."default.css"
        );
        JHTML::stylesheet(
            $assetbase.DS."css".DS."pepper-grinder".DS."jquery-ui.css"
        );

        parent::display($tpl);

    }

}
?>
