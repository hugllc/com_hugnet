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

jimport('joomla.application.component.controller');
/**
 * This is the main controller class.  It has the tasks to actually talk with
 * the HUGnetLib API.  It also has the base stuff for the component
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
class HUGnetController extends JController
{
    /**
    * The constructor
    */

    function __construct()
    {
        parent::__construct();
    }



    /**
    * Gets the base URL to use
    *
    * @return string The URL
    */
    private function _url()
    {
        return JComponentHelper::getComponent('com_hugnet')->params->get(
            "hugnet_api_url"
        );
    }
    /**
    * This deals with the device
    *
    * @return null
    */
    public function device()
    {
        $query = array();
        $url = $this->_url();
        $command = trim(strtolower(JRequest::getCmd('action')));
        switch ($command) {
        case "get":
            $did = JRequest::getVar('id');
            $did = sprintf("%06X", hexdec($did));
            $query = array(
                "task" => "device",
                "action" => $command,
                "id" => $did,
            );
            break;
        case "list":
            $data = (array)JRequest::getVar('data', array());
            $query = array(
                "task" => "device",
                "action" => $command,
                "data" => $data,
            );
            break;
        }
        if (count($query) > 0) {
            $url = $url."?".http_build_query($query);
            $response = file_get_contents($url);
            print $response;
            unset($response);
        }
    }
    /**
    * This deals with the history
    *
    * @return null
    */
    public function history()
    {
        $query = array();
        $url = $this->_url();
        $command = trim(strtolower(JRequest::getCmd('action')));
        $data = (array)JRequest::getVar('data', array());
        $did = JRequest::getVar('id');
        $did = sprintf("%06X", hexdec($did));
        switch ($command) {
        case "get":
            $query = array(
                "task" => "history",
                "action" => "get",
                "id" => $did,
                "data" => $data,
            );
            break;
        case "last":
            $query = array(
                "task" => "history",
                "action" => "last",
                "id" => $did,
                "data" => $data,
            );
            break;
        }
        if (count($query) > 0) {
            $url = $url."?".http_build_query($query);
            $response = file_get_contents($url);
            print $response;
            unset($response);
        }
    }


}
?>
