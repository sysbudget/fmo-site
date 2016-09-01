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
$RootMenu->AddMenuItem(409, $Language->MenuPhrase("409", "MenuText"), "frm_u_rep_t_completion_status_unit_mfolist.php", 17, "", AllowListMenu('frm_u_rep_t_completion_status_unit_mfo'), TRUE);
$RootMenu->AddMenuItem(319, $Language->MenuPhrase("319", "MenuText"), "frm_u_rep_a_eligible_status_unit_mfolist.php", 17, "", AllowListMenu('frm_u_rep_a_eligible_status_unit_mfo'), TRUE);
$RootMenu->AddMenuItem(475, $Language->MenuPhrase("475", "MenuText"), "frm_u_rep_ta_form_a_1list.php", 17, "", AllowListMenu('frm_u_rep_ta_form_a_1'), TRUE);
$RootMenu->AddMenuItem(18, $Language->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(11, $Language->MenuPhrase("11", "MenuText"), "frm_fp_unitslist.php", 18, "", AllowListMenu('frm_fp_units'), TRUE);
$RootMenu->AddMenuItem(407, $Language->MenuPhrase("407", "MenuText"), "frm_fp_rep_t_completion_status_unit_mfolist.php", 18, "", AllowListMenu('frm_fp_rep_t_completion_status_unit_mfo'), TRUE);
$RootMenu->AddMenuItem(411, $Language->MenuPhrase("411", "MenuText"), "frm_fp_rep_t_completion_status_unit_pilist.php", 18, "", AllowListMenu('frm_fp_rep_t_completion_status_unit_pi'), TRUE);
$RootMenu->AddMenuItem(302, $Language->MenuPhrase("302", "MenuText"), "frm_fp_rep_a_eligible_statuslist.php", 18, "", AllowListMenu('frm_fp_rep_a_eligible_status'), TRUE);
$RootMenu->AddMenuItem(463, $Language->MenuPhrase("463", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(354, $Language->MenuPhrase("354", "MenuText"), "frm_fp_rep_ta_form_a_culist.php", 463, "", AllowListMenu('frm_fp_rep_ta_form_a_cu'), TRUE);
$RootMenu->AddMenuItem(473, $Language->MenuPhrase("473", "MenuText"), "frm_fp_rep_ta_form_a_1list.php", 463, "", AllowListMenu('frm_fp_rep_ta_form_a_1'), TRUE);
$RootMenu->AddMenuItem(465, $Language->MenuPhrase("465", "MenuText"), "frm_fp_rep_ta_form_a_1_iatf_headerlist.php", 463, "", AllowListMenu('frm_fp_rep_ta_form_a_1_iatf_header'), TRUE);
$RootMenu->AddMenuItem(73, $Language->MenuPhrase("73", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(472, $Language->MenuPhrase("472", "MenuText"), "frm_sam_rep_ta_val_form_a_0_based_on_culist.php", 73, "", AllowListMenu('frm_sam_rep_ta_val_form_a_0_based_on_cu'), TRUE);
$RootMenu->AddMenuItem(474, $Language->MenuPhrase("474", "MenuText"), "frm_sam_rep_ta_form_a_1list.php", 73, "", AllowListMenu('frm_sam_rep_ta_form_a_1'), TRUE);
$RootMenu->AddMenuItem(400, $Language->MenuPhrase("400", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(153, $Language->MenuPhrase("153", "MenuText"), "frm_sam_cu_executive_officeslist.php", 400, "", AllowListMenu('frm_sam_cu_executive_offices'), TRUE);
$RootMenu->AddMenuItem(351, $Language->MenuPhrase("351", "MenuText"), "frm_sam_rep_t_completion_statuslist.php", 400, "", AllowListMenu('frm_sam_rep_t_completion_status'), TRUE);
$RootMenu->AddMenuItem(408, $Language->MenuPhrase("408", "MenuText"), "frm_sam_rep_t_completion_status_unit_mfolist.php", 400, "", AllowListMenu('frm_sam_rep_t_completion_status_unit_mfo'), TRUE);
$RootMenu->AddMenuItem(412, $Language->MenuPhrase("412", "MenuText"), "frm_sam_rep_t_completion_status_unit_pilist.php", 400, "", AllowListMenu('frm_sam_rep_t_completion_status_unit_pi'), TRUE);
$RootMenu->AddMenuItem(401, $Language->MenuPhrase("401", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(27, $Language->MenuPhrase("27", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(152, $Language->MenuPhrase("152", "MenuText"), "frm_sam_collection_periodlist.php", 27, "", AllowListMenu('frm_sam_collection_period'), TRUE);
$RootMenu->AddMenuItem(154, $Language->MenuPhrase("154", "MenuText"), "frm_sam_cutoffdatelist.php", 27, "", AllowListMenu('frm_sam_cutoffdate'), TRUE);
$RootMenu->AddMenuItem(155, $Language->MenuPhrase("155", "MenuText"), "frm_sam_mfo_questionslist.php", 27, "", AllowListMenu('frm_sam_mfo_questions'), TRUE);
$RootMenu->AddMenuItem(44, $Language->MenuPhrase("44", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(159, $Language->MenuPhrase("159", "MenuText"), "frm_sam_userslist.php", 44, "", AllowListMenu('frm_sam_users'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
