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
$RootMenu->AddMenuItem(15, $Language->MenuPhrase("15", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(168, $Language->MenuPhrase("168", "MenuText"), "", 15, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(187, $Language->MenuPhrase("187", "MenuText"), "view_trans_tbl_accomplishment_a_mfo_1list.php", 168, "", AllowListMenu('view_trans_tbl_accomplishment_a_mfo_1'), TRUE);
$RootMenu->AddMenuItem(188, $Language->MenuPhrase("188", "MenuText"), "view_trans_tbl_accomplishment_a_mfo_2list.php", 168, "", AllowListMenu('view_trans_tbl_accomplishment_a_mfo_2'), TRUE);
$RootMenu->AddMenuItem(189, $Language->MenuPhrase("189", "MenuText"), "view_trans_tbl_accomplishment_a_mfo_3list.php", 168, "", AllowListMenu('view_trans_tbl_accomplishment_a_mfo_3'), TRUE);
$RootMenu->AddMenuItem(190, $Language->MenuPhrase("190", "MenuText"), "view_trans_tbl_accomplishment_a_mfo_4list.php", 168, "", AllowListMenu('view_trans_tbl_accomplishment_a_mfo_4'), TRUE);
$RootMenu->AddMenuItem(191, $Language->MenuPhrase("191", "MenuText"), "view_trans_tbl_accomplishment_a_mfo_5list.php", 168, "", AllowListMenu('view_trans_tbl_accomplishment_a_mfo_5'), TRUE);
$RootMenu->AddMenuItem(192, $Language->MenuPhrase("192", "MenuText"), "view_trans_tbl_accomplishment_b_stolist.php", 15, "", AllowListMenu('view_trans_tbl_accomplishment_b_sto'), TRUE);
$RootMenu->AddMenuItem(193, $Language->MenuPhrase("193", "MenuText"), "view_trans_tbl_accomplishment_c_gasslist.php", 15, "", AllowListMenu('view_trans_tbl_accomplishment_c_gass'), TRUE);
$RootMenu->AddMenuItem(169, $Language->MenuPhrase("169", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(170, $Language->MenuPhrase("170", "MenuText"), "", 169, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(195, $Language->MenuPhrase("195", "MenuText"), "view_trans_cu_tbl_accomplishment_a_mfo_1list.php", 170, "", AllowListMenu('view_trans_cu_tbl_accomplishment_a_mfo_1'), TRUE);
$RootMenu->AddMenuItem(196, $Language->MenuPhrase("196", "MenuText"), "view_trans_cu_tbl_accomplishment_a_mfo_2list.php", 170, "", AllowListMenu('view_trans_cu_tbl_accomplishment_a_mfo_2'), TRUE);
$RootMenu->AddMenuItem(197, $Language->MenuPhrase("197", "MenuText"), "view_trans_cu_tbl_accomplishment_a_mfo_3list.php", 170, "", AllowListMenu('view_trans_cu_tbl_accomplishment_a_mfo_3'), TRUE);
$RootMenu->AddMenuItem(198, $Language->MenuPhrase("198", "MenuText"), "view_trans_cu_tbl_accomplishment_a_mfo_4list.php", 170, "", AllowListMenu('view_trans_cu_tbl_accomplishment_a_mfo_4'), TRUE);
$RootMenu->AddMenuItem(199, $Language->MenuPhrase("199", "MenuText"), "view_trans_cu_tbl_accomplishment_a_mfo_5list.php", 170, "", AllowListMenu('view_trans_cu_tbl_accomplishment_a_mfo_5'), TRUE);
$RootMenu->AddMenuItem(200, $Language->MenuPhrase("200", "MenuText"), "view_trans_cu_tbl_accomplishment_b_stolist.php", 169, "", AllowListMenu('view_trans_cu_tbl_accomplishment_b_sto'), TRUE);
$RootMenu->AddMenuItem(201, $Language->MenuPhrase("201", "MenuText"), "view_trans_cu_tbl_accomplishment_c_gasslist.php", 169, "", AllowListMenu('view_trans_cu_tbl_accomplishment_c_gass'), TRUE);
$RootMenu->AddMenuItem(213, $Language->MenuPhrase("213", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(206, $Language->MenuPhrase("206", "MenuText"), "view_reps_1_3_formalist.php", 213, "", AllowListMenu('view_reps_1_3_forma'), TRUE);
$RootMenu->AddMenuItem(216, $Language->MenuPhrase("216", "MenuText"), "view_reps_2_2_forma_1list.php", 213, "", AllowListMenu('view_reps_2_2_forma_1'), TRUE);
$RootMenu->AddMenuItem(219, $Language->MenuPhrase("219", "MenuText"), "view_reps_3_3_completion_statuslist.php", 213, "", AllowListMenu('view_reps_3_3_completion_status'), TRUE);
$RootMenu->AddMenuItem(222, $Language->MenuPhrase("222", "MenuText"), "view_reps_4_3_eligible_statuslist.php", 213, "", AllowListMenu('view_reps_4_3_eligible_status'), TRUE);
$RootMenu->AddMenuItem(16, $Language->MenuPhrase("16", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(203, $Language->MenuPhrase("203", "MenuText"), "tbl_collectionperiodlist.php", 16, "", AllowListMenu('tbl_collectionperiod'), TRUE);
$RootMenu->AddMenuItem(186, $Language->MenuPhrase("186", "MenuText"), "tbl_unitslist.php", 16, "", AllowListMenu('tbl_units'), TRUE);
$RootMenu->AddMenuItem(30, $Language->MenuPhrase("30", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(215, $Language->MenuPhrase("215", "MenuText"), "audittraillist.php", 30, "", AllowListMenu('audittrail'), TRUE);
$RootMenu->AddMenuItem(194, $Language->MenuPhrase("194", "MenuText"), "tbl_userslist.php", 30, "", AllowListMenu('tbl_users'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
