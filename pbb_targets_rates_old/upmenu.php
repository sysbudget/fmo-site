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
$RootMenu->AddMenuItem(13, $Language->MenuPhrase("13", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(96, $Language->MenuPhrase("96", "MenuText"), "frm_1_t_conu_1_pbb_detail_contributorlist.php?cmd=resetall", 13, "", AllowListMenu('frm_1_t_conu_1_pbb_detail_contributor'), TRUE);
$RootMenu->AddMenuItem(88, $Language->MenuPhrase("88", "MenuText"), "frm_1_t_conu_contributor_mfo_statuslist.php", 13, "", AllowListMenu('frm_1_t_conu_contributor_mfo_status'), TRUE);
$RootMenu->AddMenuItem(48, $Language->MenuPhrase("48", "MenuText"), "frm_2_a_conu_rep_form_a_raw_data_du_conulist.php", 13, "", AllowListMenu('frm_2_a_conu_rep_form_a_raw_data_du_conu'), TRUE);
$RootMenu->AddMenuItem(90, $Language->MenuPhrase("90", "MenuText"), "tbl_temp_conulist.php", 13, "", AllowListMenu('tbl_temp_conu'), TRUE);
$RootMenu->AddMenuItem(25, $Language->MenuPhrase("25", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(97, $Language->MenuPhrase("97", "MenuText"), "frm_1_a_du_pbb_detail_deliverylist.php", 25, "", AllowListMenu('frm_1_a_du_pbb_detail_delivery'), TRUE);
$RootMenu->AddMenuItem(86, $Language->MenuPhrase("86", "MenuText"), "frm_1_t_du_delivery_statuslist.php", 25, "", AllowListMenu('frm_1_t_du_delivery_status'), TRUE);
$RootMenu->AddMenuItem(49, $Language->MenuPhrase("49", "MenuText"), "frm_2_a_du_rep_form_a_raw_data_cu_dulist.php", 25, "", AllowListMenu('frm_2_a_du_rep_form_a_raw_data_cu_du'), TRUE);
$RootMenu->AddMenuItem(92, $Language->MenuPhrase("92", "MenuText"), "tbl_temp_dulist.php", 25, "", AllowListMenu('tbl_temp_du'), TRUE);
$RootMenu->AddMenuItem(44, $Language->MenuPhrase("44", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(85, $Language->MenuPhrase("85", "MenuText"), "frm_2_a_fi_rep_form_a_raw_data_culist.php", 44, "", AllowListMenu('frm_2_a_fi_rep_form_a_raw_data_cu'), TRUE);
$RootMenu->AddMenuItem(89, $Language->MenuPhrase("89", "MenuText"), "frm_1_t_fi_cu_statuslist.php", 44, "", AllowListMenu('frm_1_t_fi_cu_status'), TRUE);
$RootMenu->AddMenuItem(50, $Language->MenuPhrase("50", "MenuText"), "frm_2_a_fi_rep_form_a_raw_data_cu_dulist.php", 44, "", AllowListMenu('frm_2_a_fi_rep_form_a_raw_data_cu_du'), TRUE);
$RootMenu->AddMenuItem(95, $Language->MenuPhrase("95", "MenuText"), "frm_1_t_fi_units_deliverylist.php", 44, "", AllowListMenu('frm_1_t_fi_units_delivery'), TRUE);
$RootMenu->AddMenuItem(91, $Language->MenuPhrase("91", "MenuText"), "tbl_temp_culist.php", 44, "", AllowListMenu('tbl_temp_cu'), TRUE);
$RootMenu->AddMenuItem(77, $Language->MenuPhrase("77", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(55, $Language->MenuPhrase("55", "MenuText"), "frm_9_m_sa_units_culist.php", 77, "", AllowListMenu('frm_9_m_sa_units_cu'), TRUE);
$RootMenu->AddMenuItem(52, $Language->MenuPhrase("52", "MenuText"), "frm_9_m_sa_cutoffdatelist.php", 77, "", AllowListMenu('frm_9_m_sa_cutoffdate'), TRUE);
$RootMenu->AddMenuItem(53, $Language->MenuPhrase("53", "MenuText"), "frm_9_m_sa_mfo_questionslist.php", 77, "", AllowListMenu('frm_9_m_sa_mfo_questions'), TRUE);
$RootMenu->AddMenuItem(57, $Language->MenuPhrase("57", "MenuText"), "frm_9_m_sa_userslist.php", 77, "", AllowListMenu('frm_9_m_sa_users'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
