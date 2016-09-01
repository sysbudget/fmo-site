<?php

// Menu
define("UP_MENUBAR_CLASSNAME", "upMenuBarVertical", TRUE);
define("UP_MENUBAR_ITEM_CLASSNAME", "", TRUE);
define("UP_MENUBAR_ITEM_LABEL_CLASSNAME", "", TRUE);
define("UP_MENU_CLASSNAME", "upMenuBarVertical", TRUE);
define("UP_MENU_ITEM_CLASSNAME", "", TRUE);
define("UP_MENU_ITEM_LABEL_CLASSNAME", "", TRUE);
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
$RootMenu->AddMenuItem(17, $Language->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(15, $Language->MenuPhrase("15", "MenuText"), "frm_u_pbb_detail_targetlist.php", 17, "", AllowListMenu('frm_u_pbb_detail_target'), TRUE);
$RootMenu->AddMenuItem(18, $Language->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(11, $Language->MenuPhrase("11", "MenuText"), "frm_fp_unitslist.php", 18, "", AllowListMenu('frm_fp_units'), TRUE);
$RootMenu->AddMenuItem(77, $Language->MenuPhrase("77", "MenuText"), "frm_fp_completion_statuslist.php", 18, "", AllowListMenu('frm_fp_completion_status'), TRUE);
$RootMenu->AddMenuItem(76, $Language->MenuPhrase("76", "MenuText"), "frm_fp_formalist.php", 18, "", AllowListMenu('frm_fp_forma'), TRUE);
$RootMenu->AddMenuItem(73, $Language->MenuPhrase("73", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(74, $Language->MenuPhrase("74", "MenuText"), "rep_3_1_formalist.php", 73, "", AllowListMenu('rep_3_1_forma'), TRUE);
$RootMenu->AddMenuItem(27, $Language->MenuPhrase("27", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(81, $Language->MenuPhrase("81", "MenuText"), "frm_collection_periodlist.php", 27, "", AllowListMenu('frm_collection_period'), TRUE);
$RootMenu->AddMenuItem(83, $Language->MenuPhrase("83", "MenuText"), "frm_cutoffdatelist.php", 27, "", AllowListMenu('frm_cutoffdate'), TRUE);
$RootMenu->AddMenuItem(82, $Language->MenuPhrase("82", "MenuText"), "frm_cu_executive_officeslist.php", 27, "", AllowListMenu('frm_cu_executive_offices'), TRUE);
$RootMenu->AddMenuItem(78, $Language->MenuPhrase("78", "MenuText"), "frm_mfo_questionslist.php", 27, "", AllowListMenu('frm_mfo_questions'), TRUE);
$RootMenu->AddMenuItem(44, $Language->MenuPhrase("44", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(28, $Language->MenuPhrase("28", "MenuText"), "tbl_userslist.php", 44, "", AllowListMenu('tbl_users'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
