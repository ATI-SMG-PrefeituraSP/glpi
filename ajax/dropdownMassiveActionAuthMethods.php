<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2009 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Julien Dombre
// Purpose of file:
// ----------------------------------------------------------------------

$NEEDED_ITEMS=array("search");
$AJAX_INCLUDE=1;

define('GLPI_ROOT','..');
include (GLPI_ROOT."/inc/includes.php");
header("Content-Type: text/html; charset=UTF-8");
header_nocache();

checkRight("user","w");
if ($_POST["authtype"] > 0) {
   switch($_POST["authtype"]) {
      case AUTH_DB_GLPI :
         echo "<input type='hidden' name='auth_server' value='0'>";
         break;
      case AUTH_LDAP :
      case AUTH_EXTERNAL :
         dropdownValue("glpi_authldaps","auth_server",1);
         break;

      case AUTH_MAIL :
         dropdownValue("glpi_authmails","auth_server",1);
         break;
   }
   echo "<input type='submit' name='massiveaction' class='submit' value=\"".$LANG['buttons'][2]."\" >";
}
?>