<?php

// Menu
define("UP_MENUBAR_CLASSNAME", "yuimenu", TRUE);
define("UP_MENUBAR_ITEM_CLASSNAME", "yuimenuitem", TRUE);
define("UP_MENUBAR_ITEM_LABEL_CLASSNAME", "yuimenuitemlabel", TRUE);
define("UP_MENU_CLASSNAME", "yuimenu", TRUE);
define("UP_MENU_ITEM_CLASSNAME", "yuimenuitem", TRUE); // Vertical
define("UP_MENU_ITEM_LABEL_CLASSNAME", "yuimenuitemlabel", TRUE); // Vertical
?>
<?php

// Menu Rendering event
function Menu_Rendering(&$Menu) {

	// Change menu items here
}

// MenuItem Adding event
function MenuItem_Adding(&$Item) {

	//var_dump($Item);
	// Return FALSE if menu item not allowed

	return TRUE;
}
?>
<!-- Begin Main Menu -->
<div class="upbudgetofficeclass">
<?php

// Generate all menu items
$RootMenu = new cMenu("RootMenu");
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(19, $Language->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(7, $Language->MenuPhrase("7", "MenuText"), "tbl_uporgchart_culist.php", 19, "", AllowListMenu('tbl_uporgchart_cu'), TRUE);
$RootMenu->AddMenuItem(18, $Language->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(22, $Language->MenuPhrase("22", "MenuText"), "ref_academicyearlist.php", 18, "", AllowListMenu('ref_academicyear'), TRUE);
$RootMenu->AddMenuItem(8, $Language->MenuPhrase("8", "MenuText"), "tbl_uporgchart_locationlist.php", 18, "", AllowListMenu('tbl_uporgchart_location'), TRUE);
$RootMenu->AddMenuItem(45, $Language->MenuPhrase("45", "MenuText"), "ref_disciplinechedcodes_majorlist.php", 18, "", AllowListMenu('ref_disciplinechedcodes_major'), TRUE);
$RootMenu->AddMenuItem(26, $Language->MenuPhrase("26", "MenuText"), "ref_degreelevel_degreeslist.php", 18, "", AllowListMenu('ref_degreelevel_degrees'), TRUE);
$RootMenu->AddMenuItem(27, $Language->MenuPhrase("27", "MenuText"), "ref_degreelevel_facultylist.php", 18, "", AllowListMenu('ref_degreelevel_faculty'), TRUE);
$RootMenu->AddMenuItem(10, $Language->MenuPhrase("10", "MenuText"), "ref_facultygrouplist.php", 18, "", AllowListMenu('ref_facultygroup'), TRUE);
$RootMenu->AddMenuItem(11, $Language->MenuPhrase("11", "MenuText"), "ref_facultyranklist.php", 18, "", AllowListMenu('ref_facultyrank'), TRUE);
$RootMenu->AddMenuItem(40, $Language->MenuPhrase("40", "MenuText"), "ref_hda_inactivepursuitofhigherdegreelist.php", 18, "", AllowListMenu('ref_hda_inactivepursuitofhigherdegree'), TRUE);
$RootMenu->AddMenuItem(28, $Language->MenuPhrase("28", "MenuText"), "ref_leavecodelist.php", 18, "", AllowListMenu('ref_leavecode'), TRUE);
$RootMenu->AddMenuItem(20, $Language->MenuPhrase("20", "MenuText"), "ref_salaryscalelist.php", 18, "", AllowListMenu('ref_salaryscale'), TRUE);
$RootMenu->AddMenuItem(29, $Language->MenuPhrase("29", "MenuText"), "ref_tenurecodelist.php", 18, "", AllowListMenu('ref_tenurecode'), TRUE);
$RootMenu->AddMenuItem(39, $Language->MenuPhrase("39", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(24, $Language->MenuPhrase("24", "MenuText"), "tbl_audittraillist.php", 39, "", AllowListMenu('tbl_audittrail'), TRUE);
$RootMenu->AddMenuItem(47, $Language->MenuPhrase("47", "MenuText"), "view_tbl_uporgchart_cu_userslist.php", 39, "", AllowListMenu('view_tbl_uporgchart_cu_users'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
<script type="text/javascript">
<!--

// init the menu
var RootMenu = new YAHOO.widget.Menu("RootMenu", { position: "static", hidedelay: 750, lazyload: true });
RootMenu.render();        

//-->
</script>
