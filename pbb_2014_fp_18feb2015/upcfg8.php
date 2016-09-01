<?php

/**
 * PBB2014 V1 configuration file
 */

// Show SQL for debug
define("UP_DEBUG_ENABLED", FALSE, TRUE); // TRUE to debug

// General
define("UP_IS_WINDOWS", (strtolower(substr(PHP_OS, 0, 3)) === 'win'), TRUE); // Is Windows OS
define("UP_IS_PHP5", (phpversion() >= "5.0.0"), TRUE); // Is PHP 5 or later
if (!UP_IS_PHP5) die("This script requires PHP 5. You are running " . phpversion() . ".");
define("UP_PATH_DELIMITER", ((UP_IS_WINDOWS) ? "\\" : "/"), TRUE); // Physical path delimiter
define("UP_ROOT_RELATIVE_PATH", ".", TRUE); // Relative path of app root
define("UP_DEFAULT_DATE_FORMAT", "yyyy/mm/dd", TRUE); // Default date format
define("UP_DEFAULT_DATE_FORMAT_ID", "5", TRUE); // Default date format
define("UP_DATE_SEPARATOR", "/", TRUE); // Date separator
define("UP_UNFORMAT_YEAR", 50, TRUE); // Unformat year
define("UP_PROJECT_NAME", "PBB_2014_Reports", TRUE); // Project name
define("UP_RANDOM_KEY", 'rH8SF7puqtgmoe1g', TRUE); // Random key for encryption
define("UP_PROJECT_STYLESHEET_FILENAME", "phpcss/PBB_2014_Reports.css", TRUE); // Project stylesheet file name
define("UP_CHARSET", "", TRUE); // Project charset
define("UP_EMAIL_CHARSET", UP_CHARSET, TRUE); // Email charset
define("UP_EMAIL_KEYWORD_SEPARATOR", "", TRUE); // Email keyword separator
define("UP_COMPOSITE_KEY_SEPARATOR", ",", TRUE); // Composite key separator
define("UP_HIGHLIGHT_COMPARE", TRUE, TRUE); // Highlight compare mode, TRUE(case-insensitive)|FALSE(case-sensitive)
define("UP_RECORD_DELIMITER", "\r", TRUE); // Record delimiter for Ajax
define("UP_FIELD_DELIMITER", "|", TRUE); // Field delimiter for Ajax
define('UP_USE_DOM_XML', ((!function_exists('xml_parser_create') && class_exists("DOMDocument")) || FALSE), TRUE);
if (!isset($ADODB_OUTP)) $ADODB_OUTP = 'up_SetDebugMsg';

// Database connection info
define("UP_CONN_HOST", 'localhost', TRUE);
define("UP_CONN_PORT", 3306, TRUE);
define("UP_CONN_USER", 'root', TRUE);
define("UP_CONN_PASS", 'rac123', TRUE);
define("UP_CONN_DB", 'db_pbb_2014_web', TRUE);

// ADODB (Access/SQL Server)
define("UP_CODEPAGE", 0, TRUE); // Code page

/**
 * Character encoding
 * Note: If you use non English languages, you need to set character encoding
 * for some features. Make sure either iconv functions or multibyte string
 * functions are enabled and your encoding is supported. See PHP manual for
 * details.
 */
define("UP_ENCODING", "", TRUE); // Character encoding
define("UP_FILE_SYSTEM_ENCODING", "", TRUE); // File system encoding

// Database
define("UP_IS_MSACCESS", FALSE, TRUE); // Access
define("UP_IS_MSSQL", FALSE, TRUE); // SQL Server
define("UP_IS_MYSQL", TRUE, TRUE); // MySQL
define("UP_IS_POSTGRESQL", FALSE, TRUE); // PostgreSQL
define("UP_IS_ORACLE", FALSE, TRUE); // Oracle
define("UP_DB_QUOTE_START", "`", TRUE);
define("UP_DB_QUOTE_END", "`", TRUE);
define("UP_SELECT_LIMIT", (UP_IS_MYSQL || UP_IS_POSTGRESQL), TRUE);

/**
 * MySQL charset (for SET NAMES statement, not used by default)
 * Note: Read http://dev.mysql.com/doc/refman/5.0/en/charset-connection.html
 * before using this setting.
 */
define("UP_MYSQL_CHARSET", "", TRUE);

/**
 * Password (MD5 and case-sensitivity)
 * Note: If you enable MD5 password, make sure that the passwords in your
 * user table are stored as MD5 hash (32-character hexadecimal number) of the
 * clear text password. If you also use case-insensitive password, convert the
 * clear text passwords to lower case first before calculating MD5 hash.
 * Otherwise, existing users will not be able to login. MD5 hash is
 * irreversible, password will be reset during password recovery.
 */
define("UP_ENCRYPTED_PASSWORD", FALSE, TRUE); // Use encrypted password
define("UP_CASE_SENSITIVE_PASSWORD", FALSE, TRUE); // Case-sensitive password

/**
 * Remove XSS
 * Note: If you want to allow these keywords, remove them from the following UP_XSS_ARRAY at your own risks.
*/
define("UP_REMOVE_XSS", TRUE, TRUE);
$UP_XSS_ARRAY = array('javascript', 'vbscript', 'expression', '<applet', '<meta', '<xml', '<blink', '<link', '<style', '<script', '<embed', '<object', '<iframe', '<frame', '<frameset', '<ilayer', '<layer', '<bgsound', '<title', '<base',
'onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'leehwesuomno', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');

// Session names
define("UP_SESSION_STATUS", UP_PROJECT_NAME . "_status", TRUE); // Login status
define("UP_SESSION_USER_NAME", UP_SESSION_STATUS . "_UserName", TRUE); // User name
define("UP_SESSION_USER_ID", UP_SESSION_STATUS . "_UserID", TRUE); // User ID
define("UP_SESSION_USER_PROFILE", UP_SESSION_STATUS . "_UserProfile", TRUE); // User profile
define("UP_SESSION_USER_PROFILE_USER_NAME", UP_SESSION_USER_PROFILE . "_UserName", TRUE);
define("UP_SESSION_USER_PROFILE_PASSWORD", UP_SESSION_USER_PROFILE . "_Password", TRUE);
define("UP_SESSION_USER_PROFILE_LOGIN_TYPE", UP_SESSION_USER_PROFILE . "_LoginType", TRUE);
define("UP_SESSION_USER_LEVEL_ID", UP_SESSION_STATUS . "_UserLevel", TRUE); // User Level ID
@define("UP_SESSION_USER_LEVEL", UP_SESSION_STATUS . "_UserLevelValue", TRUE); // User Level
define("UP_SESSION_PARENT_USER_ID", UP_SESSION_STATUS . "_ParentUserID", TRUE); // Parent User ID
define("UP_SESSION_SYS_ADMIN", UP_PROJECT_NAME . "_SysAdmin", TRUE); // System admin
define("UP_SESSION_AR_USER_LEVEL", UP_PROJECT_NAME . "_arUserLevel", TRUE); // User Level array
define("UP_SESSION_AR_USER_LEVEL_PRIV", UP_PROJECT_NAME . "_arUserLevelPriv", TRUE); // User Level privilege array
define("UP_SESSION_SECURITY", UP_PROJECT_NAME . "_Security", TRUE); // Security array
define("UP_SESSION_MESSAGE", UP_PROJECT_NAME . "_Message", TRUE); // System message
define("UP_SESSION_FAILURE_MESSAGE", UP_PROJECT_NAME . "_Failure_Message", TRUE); // System error message
define("UP_SESSION_SUCCESS_MESSAGE", UP_PROJECT_NAME . "_Success_Message", TRUE); // System message
define("UP_SESSION_INLINE_MODE", UP_PROJECT_NAME . "_InlineMode", TRUE); // Inline mode

// Language settings
define("UP_LANGUAGE_FOLDER", "phplang/", TRUE);
$UP_LANGUAGE_FILE = array();
$UP_LANGUAGE_FILE[] = array("en", "", "english.xml");
define("UP_LANGUAGE_DEFAULT_ID", "en", TRUE);
define("UP_SESSION_LANGUAGE_ID", UP_PROJECT_NAME . "_LanguageId", TRUE); // Language ID

// Data types
define("UP_DATATYPE_NUMBER", 1, TRUE);
define("UP_DATATYPE_DATE", 2, TRUE);
define("UP_DATATYPE_STRING", 3, TRUE);
define("UP_DATATYPE_BOOLEAN", 4, TRUE);
define("UP_DATATYPE_MEMO", 5, TRUE);
define("UP_DATATYPE_BLOB", 6, TRUE);
define("UP_DATATYPE_TIME", 7, TRUE);
define("UP_DATATYPE_GUID", 8, TRUE);
define("UP_DATATYPE_XML", 9, TRUE);
define("UP_DATATYPE_OTHER", 10, TRUE);

// Row types
define("UP_ROWTYPE_VIEW", 1, TRUE); // Row type view
define("UP_ROWTYPE_ADD", 2, TRUE); // Row type add
define("UP_ROWTYPE_EDIT", 3, TRUE); // Row type edit
define("UP_ROWTYPE_SEARCH", 4, TRUE); // Row type search
define("UP_ROWTYPE_MASTER", 5, TRUE);  // Row type master record
define("UP_ROWTYPE_AGGREGATEINIT", 6, TRUE); // Row type aggregate init
define("UP_ROWTYPE_AGGREGATE", 7, TRUE); // Row type aggregate

// Table parameters
define("UP_TABLE_PREFIX", "||UPPBB2014Report||", TRUE);
define("UP_TABLE_REC_PER_PAGE", "recperpage", TRUE); // Records per page
define("UP_TABLE_START_REC", "start", TRUE); // Start record
define("UP_TABLE_PAGE_NO", "pageno", TRUE); // Page number
define("UP_TABLE_BASIC_SEARCH", "psearch", TRUE); // Basic search keyword
define("UP_TABLE_BASIC_SEARCH_TYPE","psearchtype", TRUE); // Basic search type
define("UP_TABLE_ADVANCED_SEARCH", "advsrch", TRUE); // Advanced search
define("UP_TABLE_SEARCH_WHERE", "searchwhere", TRUE); // Search where clause
define("UP_TABLE_WHERE", "where", TRUE); // Table where
define("UP_TABLE_WHERE_LIST", "where_list", TRUE); // Table where (list page)
define("UP_TABLE_ORDER_BY", "orderby", TRUE); // Table order by
define("UP_TABLE_ORDER_BY_LIST", "orderby_list", TRUE); // Table order by (list page)
define("UP_TABLE_SORT", "sort", TRUE); // Table sort
define("UP_TABLE_KEY", "key", TRUE); // Table key
define("UP_TABLE_SHOW_MASTER", "showmaster", TRUE); // Table show master
define("UP_TABLE_SHOW_DETAIL", "showdetail", TRUE); // Table show detail
define("UP_TABLE_MASTER_TABLE", "mastertable", TRUE); // Master table
define("UP_TABLE_DETAIL_TABLE", "detailtable", TRUE); // Detail table
define("UP_TABLE_RETURN_URL", "return", TRUE); // Return URL
define("UP_TABLE_EXPORT_RETURN_URL", "exportreturn", TRUE); // Export return URL
define("UP_TABLE_GRID_ADD_ROW_COUNT", "gridaddcnt", TRUE); // Grid add row count

// Audit Trail
define("UP_AUDIT_TRAIL_TO_DATABASE", FALSE, TRUE); // Write audit trail to DB
define("UP_AUDIT_TRAIL_TABLE_NAME", "", TRUE); // Audit trail table name
define("UP_AUDIT_TRAIL_FIELD_NAME_DATETIME", "", TRUE); // Audit trail DateTime field name
define("UP_AUDIT_TRAIL_FIELD_NAME_SCRIPT", "", TRUE); // Audit trail Script field name
define("UP_AUDIT_TRAIL_FIELD_NAME_USER", "", TRUE); // Audit trail User field name
define("UP_AUDIT_TRAIL_FIELD_NAME_ACTION", "", TRUE); // Audit trail Action field name
define("UP_AUDIT_TRAIL_FIELD_NAME_TABLE", "", TRUE); // Audit trail Table field name
define("UP_AUDIT_TRAIL_FIELD_NAME_FIELD", "", TRUE); // Audit trail Field field name
define("UP_AUDIT_TRAIL_FIELD_NAME_KEYVALUE", "", TRUE); // Audit trail Key Value field name
define("UP_AUDIT_TRAIL_FIELD_NAME_OLDVALUE", "", TRUE); // Audit trail Old Value field name
define("UP_AUDIT_TRAIL_FIELD_NAME_NEWVALUE", "", TRUE); // Audit trail New Value field name

// Security
define("UP_ADMIN_USER_NAME", "a", TRUE); // Administrator user name
define("UP_ADMIN_PASSWORD", "a", TRUE); // Administrator password
define("UP_USE_CUSTOM_LOGIN", TRUE, TRUE); // Use custom login

// Compatibility with UPPBB2014 Report 3 only
define("UP_REPORT_USER_LEVEL_INCLUDE_FILE", "upruserlevel.php", TRUE);
if (file_exists(UP_REPORT_USER_LEVEL_INCLUDE_FILE)) {
	$rptuserlevel = '';
	if ($handle = @fopen(UP_REPORT_USER_LEVEL_INCLUDE_FILE, 'r')) {
		$rptuserlevel = fread($handle, filesize(UP_REPORT_USER_LEVEL_INCLUDE_FILE));
		fclose($handle);
	}
	$rptuserlevel = str_replace(array('<?php', '?>'), array('', ''), $rptuserlevel);
	if (defined("UP_REPORT_TABLE_PREFIX"))
		$rptuserlevel = preg_replace('/define\("UP_REPORT_TABLE_PREFIX".*\);/i', '', $rptuserlevel);
	eval($rptuserlevel);
}

// User level constants
define("UP_USER_LEVEL_COMPAT", TRUE, TRUE); // Use old User Level values. Comment out to use new User Level values (separate values for View/Search).
define("UP_ALLOW_ADD", 1, TRUE); // Add
define("UP_ALLOW_DELETE", 2, TRUE); // Delete
define("UP_ALLOW_EDIT", 4, TRUE); // Edit
@define("UP_ALLOW_LIST", 8, TRUE); // List
if (defined("UP_USER_LEVEL_COMPAT")) {
	define("UP_ALLOW_VIEW", 8, TRUE); // View
	define("UP_ALLOW_SEARCH", 8, TRUE); // Search
} else {
	define("UP_ALLOW_VIEW", 32, TRUE); // View
	define("UP_ALLOW_SEARCH", 64, TRUE); // Search
}
@define("UP_ALLOW_REPORT", 8, TRUE); // Report
@define("UP_ALLOW_ADMIN", 16, TRUE); // Admin

// Hierarchical User ID
@define("UP_USER_ID_IS_HIERARCHICAL", TRUE, TRUE); // Change to FALSE to show one level only

// Use subquery for master/detail
define("UP_USE_SUBQUERY_FOR_MASTER_USER_ID", FALSE, TRUE);

// User table filters
define("UP_USER_TABLE", "`tbl_users`",  TRUE);
define("UP_USER_NAME_FILTER", "(`users_userLoginName` = '%u')",  TRUE);
define("UP_USER_ID_FILTER", "(`unitID` = %u)",  TRUE);
define("UP_USER_EMAIL_FILTER", "",  TRUE);
define("UP_USER_ACTIVATE_FILTER", "",  TRUE);
define("UP_USER_PROFILE_FIELD_NAME", "",  TRUE);

// User Profile Constants
define("UP_USER_PROFILE_KEY_SEPARATOR", "", TRUE);
define("UP_USER_PROFILE_FIELD_SEPARATOR", "", TRUE);
define("UP_USER_PROFILE_SESSION_ID", "SessionID", TRUE);
define("UP_USER_PROFILE_LAST_ACCESSED_DATE_TIME", "LastAccessedDateTime", TRUE);
define("UP_USER_PROFILE_SESSION_TIMEOUT", 20, TRUE);
define("UP_USER_PROFILE_LOGIN_RETRY_COUNT", "LoginRetryCount", TRUE);
define("UP_USER_PROFILE_LAST_BAD_LOGIN_DATE_TIME", "LastBadLoginDateTime", TRUE);
define("UP_USER_PROFILE_MAX_RETRY", 3, TRUE);
define("UP_USER_PROFILE_RETRY_LOCKOUT", 20, TRUE);
define("UP_USER_PROFILE_LAST_PASSWORD_CHANGED_DATE", "LastPasswordChangedDate", TRUE);
define("UP_USER_PROFILE_PASSWORD_EXPIRE", 90, TRUE);

// Email
define("UP_EMAIL_COMPONENT", strtoupper("PHP"), TRUE);
define("UP_SMTP_SERVER", "localhost", TRUE); // SMTP server
define("UP_SMTP_SERVER_PORT", 25, TRUE); // SMTP server port
define("UP_SMTP_SERVER_USERNAME", "", TRUE); // SMTP server user name
define("UP_SMTP_SERVER_PASSWORD", "", TRUE); // SMTP server password
define("UP_SENDER_EMAIL", "", TRUE); // Sender email address
define("UP_RECIPIENT_EMAIL", "", TRUE); // Recipient email address
define("UP_MAX_EMAIL_RECIPIENT", 3, TRUE);
define("UP_MAX_EMAIL_SENT_COUNT", 3, TRUE);
define("UP_EXPORT_EMAIL_COUNTER", UP_SESSION_STATUS . "_EmailCounter", TRUE);

// File upload
define("UP_UPLOAD_DEST_PATH", "", TRUE); // Upload destination path (relative to app root)
define("UP_UPLOAD_ALLOWED_FILE_EXT", "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip", TRUE); // Allowed file extensions
define("UP_IMAGE_ALLOWED_FILE_EXT", "gif,jpg,png,bmp", TRUE); // Allowed file extensions for images
define("UP_MAX_FILE_SIZE", 2000000, TRUE); // Max file size
define("UP_THUMBNAIL_DEFAULT_WIDTH", 0, TRUE); // Thumbnail default width
define("UP_THUMBNAIL_DEFAULT_HEIGHT", 0, TRUE); // Thumbnail default height
define("UP_THUMBNAIL_DEFAULT_QUALITY", 75, TRUE); // Thumbnail default qualtity (JPEG)
define("UP_UPLOADED_FILE_MODE", 0666, TRUE); // Uploaded file mode
define("UP_UPLOAD_TMP_PATH", "", TRUE); // User upload temp path (relative to app root) e.g. "tmp/"

// Audit trail
define("UP_AUDIT_TRAIL_PATH", "", TRUE); // Audit trail path (relative to app root)

// Export records
define("UP_EXPORT_ALL", TRUE, TRUE); // Export all records
define("UP_XML_ENCODING", "utf-8", TRUE); // Encoding for Export to XML
define("UP_EXPORT_ORIGINAL_VALUE", FALSE, TRUE);
define("UP_EXPORT_FIELD_CAPTION", FALSE, TRUE); // TRUE to export field caption
define("UP_EXPORT_CSS_STYLES", TRUE, TRUE); // TRUE to export CSS styles
define("UP_EXPORT_MASTER_RECORD", TRUE, TRUE); // TRUE to export master record
define("UP_EXPORT_MASTER_RECORD_FOR_CSV", FALSE, TRUE); // TRUE to export master record for CSV

// Use token in URL (reserved, not used, do NOT change!)
define("UP_USE_TOKEN_IN_URL", FALSE, TRUE);

// Use ILIKE for PostgreSql
define("UP_USE_ILIKE_FOR_POSTGRESQL", TRUE, TRUE);

// Use collation for MySQL
define("UP_LIKE_COLLATION_FOR_MYSQL", "", TRUE);

// Null / Not Null values
define("UP_NULL_VALUE", "##null##", TRUE);
define("UP_NOT_NULL_VALUE", "##notnull##", TRUE);

/**
 * Search multi value option
 * 1 - no multi value
 * 2 - AND all multi values
 * 3 - OR all multi values
*/
define("UP_SEARCH_MULTI_VALUE_OPTION", 3, TRUE);

// Validate option
define("UP_CLIENT_VALIDATE", TRUE, TRUE);
define("UP_SERVER_VALIDATE", FALSE, TRUE);

// Blob field byte count for hash value calculation
define("UP_BLOB_FIELD_BYTE_COUNT", 200, TRUE);

// Auto suggest max entries
define("UP_AUTO_SUGGEST_MAX_ENTRIES", 10, TRUE);

// Checkbox and radio button groups
define("UP_ITEM_TEMPLATE_CLASSNAME", "upTemplate", TRUE);
define("UP_ITEM_TABLE_CLASSNAME", "upItemTable", TRUE);

/**
 * Numeric and monetary formatting options
 * Set UP_USE_DEFAULT_LOCALE to TRUE to override localeconv and use the
 * following constants for up_FormatCurrency/Number/Percent functions
 * Also read http://www.php.net/localeconv for description of the constants
*/
@define("UP_USE_DEFAULT_LOCALE", FALSE, TRUE);
@define("DEFAULT_DECIMAL_POINT", ".", TRUE);
@define("DEFAULT_THOUSANDS_SEP", ",", TRUE);
@define("DEFAULT_CURRENCY_SYMBOL", "$", TRUE);
@define("DEFAULT_MON_DECIMAL_POINT", ".", TRUE);
@define("DEFAULT_MON_THOUSANDS_SEP", ",", TRUE);
@define("DEFAULT_POSITIVE_SIGN", "", TRUE);
@define("DEFAULT_NEGATIVE_SIGN", "-", TRUE);
@define("DEFAULT_FRAC_DIGITS", 2, TRUE);
@define("DEFAULT_P_CS_PRECEDES", TRUE, TRUE);
@define("DEFAULT_P_SEP_BY_SPACE", FALSE, TRUE);
@define("DEFAULT_N_CS_PRECEDES", TRUE, TRUE);
@define("DEFAULT_N_SEP_BY_SPACE", FALSE, TRUE);
@define("DEFAULT_P_SIGN_POSN", 3, TRUE);
@define("DEFAULT_N_SIGN_POSN", 3, TRUE);

// Cookies
define("UP_COOKIE_EXPIRY_TIME", time() + 365*24*60*60, TRUE); // Change cookie expiry time here

/**
 * Time zone (Note: Requires PHP 5 >= 5.1.0)
 * Read http://www.php.net/date_default_timezone_set for details
 * and http://www.php.net/timezones for supported time zones
*/
if (function_exists("date_default_timezone_set"))
	date_default_timezone_set("GMT"); // Note: Change the timezone_identifier here

//
// Global variables
//

if (!isset($conn)) {

	// Common objects
	$conn = NULL; // Connection
	$Page = NULL; // Page
	$Table = NULL; // Main table
	$MasterPage = NULL; // Master page
	$MasterTable = NULL; // Master table
	$Language = NULL; // Language
	$Security = NULL; // Security
	$UserProfile = NULL; // User profile
	$objForm = NULL; // Form

	// Current language
	$gsLanguage = "";

	// Used by ValidateForm/ValidateSearch
	$gsFormError = ""; // Form error message
	$gsSearchError = ""; // Search form error message

	// Used by *master.php
	$gsMasterReturnUrl = "";

	// Used by header.php, export checking
	$gsExport = "";
	$gsExportFile = "";

	// Email error message
	$gsEmailErrDesc = "";

	// Debug message
	$gsDebugMsg = "";

	// Debug timer
	$gTimer = NULL;

	// Keep temp images name for PDF export for delete
	$gTmpImages = array();
}
?>
<?php
define("UP_PDF_STYLESHEET_FILENAME", "", TRUE); // export PDF CSS styles
?>
