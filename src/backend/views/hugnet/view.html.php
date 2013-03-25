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

jimport( 'joomla.application.component.view' );
/**
 * Base driver class for devices.
 *
 * This class deals with loading the drivers and figuring out what driver needs
 * to be loaded.
 *
 * @category   Joomla
 * @package    Components
 * @subpackage Controllers
 * @author     Scott Price <prices@hugllc.com>
 * @copyright  2013 Hunt Utilities Group, LLC
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version    Release: 0.0.1
 * @link       http://dev.hugllc.com/index.php/Project:com_hugnet
 * @since      0.0.1
 */
class HUGnetViewHUGnet extends Jview
{
    /**
    * The display class
    */
    function display($tpl = null){
        // Set the toolbar
        $this->addToolBar();

        parent::display($tpl);

        // Set the document
        $this->setDocument();

    }
    /**
    * Setting the toolbar
    */
    protected function addToolBar()
    {
            JToolBarHelper::preferences('com_hugnet');
    }
    /**
    * Method to set up the document properties
    *
    * @return void
    */
    protected function setDocument()
    {
            $document = JFactory::getDocument();
            $document->setTitle(JText::_('COM_HUGNET_ADMINISTRATION'));
    }

}
?>
