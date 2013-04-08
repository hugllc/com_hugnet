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


?>
        <h1 class="header">Endpoints</h1>
        <div id="hugnetview">
        <div id="tabs-tests"></div>
        <?php print $this->loadTemplate("data"); ?>
        <?php print $this->loadTemplate("export"); ?>
        <?php print $this->loadTemplate("tests"); ?>
        </div>
        <script type="text/javascript">
            HUGnetView.Devices = new HUGnet.Devices({
                url: 'index.php?option=com_hugnet&format=json'
            });
            HUGnetView.Devices.fetch();

            $(document).ready(function(){
                "use strict";
                var iface = new HUGnetView.main({
                    url: 'index.php?option=com_hugnet&format=json'
            }   );
            });
        </script>
        <div>
            <span style="float: right; padding: 5px;">Powered by <a href="http://www.hugllc.com">HUGnetLab</a>&trade;</span>
            <div>&copy; Copyright 2013 <a href="http://www.hugllc.com">Hunt Utilities Group, LLC</a></div>
        </div>
