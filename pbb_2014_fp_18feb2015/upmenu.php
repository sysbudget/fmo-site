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
$RootMenu->AddMenuItem(41, $Language->MenuPhrase("41", "MenuText"), "", -1, "", IsLoggedIn(), TRUE);
$RootMenu->AddMenuItem(16, $Language->MenuPhrase("16", "MenuText"), "view_reps_3_3_completion_statuslist.php", 41, "", AllowListMenu('view_reps_3_3_completion_status'), TRUE);
$RootMenu->AddMenuItem(17, $Language->MenuPhrase("17", "MenuText"), "view_reps_3_4_completion_status_summarylist.php", 41, "", AllowListMenu('view_reps_3_4_completion_status_summary'), TRUE);
$RootMenu->AddMenuItem(22, $Language->MenuPhrase("22", "MenuText"), "view_reps_4_5_eligible_status_summary_2list.php", 41, "", AllowListMenu('view_reps_4_5_eligible_status_summary_2'), TRUE);
$RootMenu->AddMenuItem(23, $Language->MenuPhrase("23", "MenuText"), "view_reps_4_6_eligible_status_summary_3_culist.php", 41, "", AllowListMenu('view_reps_4_6_eligible_status_summary_3_cu'), TRUE);
$RootMenu->AddMenuItem(24, $Language->MenuPhrase("24", "MenuText"), "view_reps_5_1_units_requiring_justificationlist.php", 41, "", AllowListMenu('view_reps_5_1_units_requiring_justification'), TRUE);
$RootMenu->AddMenuItem(42, $Language->MenuPhrase("42", "MenuText"), "view_reps_5_2_units_requiring_justification_summarylist.php", 41, "", AllowListMenu('view_reps_5_2_units_requiring_justification_summary'), TRUE);
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
