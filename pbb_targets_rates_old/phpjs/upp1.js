// JavaScript for PBB2016 V1+
//(C) 2016-2016 UP Budget Office.
// Page properties

var upAddOptDialog;
var upEmailDialog;
var upEnv = YAHOO.env;
var upUtil = YAHOO.util;
var upDom = YAHOO.util.Dom;
var upEvent = YAHOO.util.Event;
var upGet = YAHOO.util.Get;
var upLang = YAHOO.lang;
var upConnect = YAHOO.util.Connect;
var upWidget = YAHOO.widget;
var UP_TABLE_CLASS = "upTable";
var UP_GRID_CLASS = "upGrid";
var UP_TABLE_ROW_CLASSNAME = "upTableRow";
var UP_TABLE_ALT_ROW_CLASSNAME = "upTableAltRow";
var UP_ITEM_TEMPLATE_CLASSNAME = "upTemplate";
var UP_ITEM_TABLE_CLASSNAME = "upItemTable";
var UP_IMAGE_FOLDER = "phpimages/"; // Image folder
var UP_TABLE_LAST_ROW_CLASSNAME = "upTableLastRow";
var UP_TABLE_PREVIEW_ROW_CLASSNAME = "upTablePreviewRow";
var UP_REPORT_CONTAINER_ID = "upContainer";
var UP_UNFORMAT_YEAR = 50;

// up_Page class
// Page Object
function up_Page(name) {
	this.Name = name;
	this.PageID = "";

	// search highlight properties
	this.ShowHighlightText = upLanguage.Phrase("ShowHighlight");
	this.HideHighlightText = upLanguage.Phrase("HideHighlight");
	this.SearchPanel = name + "_SearchPanel";
	this.SearchButton = name + "_SearchImage";

	// validate function
	this.ValidateRequired = true;

	// multi page properties
	this.MultiPage = null;
	this.TabView = null;
}

// up_Language class
function up_Language(obj) {
	this.obj = obj;
	this.Phrase = function(id) {
		return this.obj[id.toLowerCase()];
	};
}

// Include another client script
function up_ClientScriptInclude(path, opts) {
	upGet.script(path, opts);
}

// Check if boolean value is true
function up_ConvertToBool(value) {
	return (value == "1" || value.toLowerCase() == "y" || value.toLowerCase() == "t");
}

// Check if element value changed
function up_ValueChanged(fobj, infix, fld, bool) {
	var nelm = fobj.elements["x" + infix + "_" + fld];
	var oelm = fobj.elements["o" + infix + "_" + fld];
	var foelm = fobj.elements["fo" + infix + "_" + fld];
	if (!oelm && !nelm)
		return false;
	if (oelm && nelm) {
		if (bool) {
			if (up_ConvertToBool(up_GetValue(oelm)) === up_ConvertToBool(up_GetValue(nelm)))
				return false;
		} else {
			if (foelm) {
				if (up_GetValue(foelm) == up_GetValue(nelm))
					return false;
			} else {
				if (up_GetValue(oelm) == up_GetValue(nelm))
					return false;
			}
		}
	}
	return true;
}

// Get form element value
function up_GetValue(obj) {
	if (!obj)
		return "";
	if (!up_HasValue(obj))
		return "";
	var type = (!obj.type && obj[0]) ? obj[0].type : obj.type;
	if (type == "text" || type == "password" || type == "textarea" ||
		type == "file" || type == "hidden") {
		return (obj.value);
	} else if (type == "select-one") {
		return (obj.options[obj.selectedIndex].value);
	} else if (type == "select-multiple") {
		var selwrk = "";
		for (var i=0; i < obj.options.length; i++) {
			if (obj.options[i].selected) {
				if (selwrk != "") selwrk += ", ";
				selwrk += obj.options[i].value;
			}
		}
		return selwrk;
	} else if (type == "checkbox") {
		if (obj[0]) {
			var chkwrk = "";
			for (var i=0; i < obj.length; i++) {
				if (obj[i].checked) {
					if (chkwrk != "") chkwrk += ", ";
					chkwrk += obj[i].value;
				}
			}
			return chkwrk;
		} else {
			if (obj.checked) 
				return obj.value;
		}
	} else if (type == "radio") {
		if (obj[0]) {
			var rdowrk = "";
			for (var i=0; i < obj.length; i++) {
				if (obj[i].checked) {
					if (rdowrk != "") rdowrk += ", ";
					rdowrk += obj[i].value;
				}
			}
			return rdowrk;
		} else {
			return obj.value;
		}
	}
	return "";
}

// Handle search operator changed
function up_SrchOprChanged(id) {
	var elem = document.getElementById(id);
	if (!elem) return;
	var f = elem.form;
	var isBetween = (elem.options[elem.selectedIndex].value == "BETWEEN");
	var arEl, arChildren;
	arEl = document.getElementsByName("btw0_" + id.substr(2));
	for (var i=0; i < arEl.length; i++)
		arEl[i].style.display = (isBetween) ? "none" : "";
	arEl = document.getElementsByName("btw1_" + id.substr(2));
	for (var i=0; i < arEl.length; i++) {
		arEl[i].style.display = (isBetween) ? "" : "none";
		var arChildren = upDom.getChildrenBy(arEl[i], function(El) { return typeof(El.disabled) != "undefined"; });
		for (var j=0; j < arChildren.length; j++)
			arChildren[j].disabled = !isBetween;	
	}
}

// DHTML editor
function up_DHTMLEditor(name, f) {
	this.name = name;
	this.create = (typeof f == "function") ? f : function() { this.active = true; };
	this.editor = null;
	this.active = false;
}

// Create DHTML editor
function up_CreateEditor(name) {
	if (typeof up_DHTMLEditors === "undefined" || !upLang.isArray(up_DHTMLEditors))
		return;
	var f;
	for (var i = 0; i < up_DHTMLEditors.length; i++) {
		var ed = up_DHTMLEditors[i];
		var cr = !ed.active && ed.name.match(/\$rowindex\$/) == null;
		if (name) cr = cr && ed.name == name;
		if (cr) {
			if (typeof ed.create == "function")
				ed.create();
			var el = upDom.get(ed.name);
			if (el && el.form)
				f = el.form;
			if (f && !f._EditorCreated) {
				if (f.onsubmit) {
					var of = f.onsubmit;
					f.onsubmit = function() {
						if (typeof up_UpdateTextArea == "function")
							up_UpdateTextArea();
						if (upLang.isArray(of.arguments)) {
							return of.apply(f, of.arguments);
						} else {
							return of.apply(f);
						}
					};
				} else {
					f.onsubmit = function() {
						if (typeof up_UpdateTextArea == "function")
							up_UpdateTextArea();
						return true;
					};
				}
				f._EditorCreated = true;
			}
			if (name)
				break;
		}
	}
}

// Read Only Text Area
function up_ReadOnlyTextArea(id, w, h) {
	var ta = upDom.get(id);
	if (!ta) return;
	ta.readOnly = true;
	ta.style.display = "none";
	var p = upDom.getAncestorByTagName(ta, "TD");
	if (!p) return;
	var div = document.createElement("DIV");
	div.className = "upReadOnlyTextArea";
	p.appendChild(div);
	var divdata = document.createElement("DIV");
	divdata.className = "upReadOnlyTextAreaData";
	divdata.innerHTML = ta.value;
	div.appendChild(divdata);
	var rs = new upUtil.Resize(div, {width: w, height: h});
}

// Submit form
function up_SubmitForm(page, f, a) {
	if (page.ValidateForm(f)) {
		if (typeof f.onsubmit != 'function' || (typeof f.onsubmit == 'function' && f.onsubmit())) {
			if (a) f.action = a;
			f.submit();
		}
	}
	return false;
}

// Submit language form
function up_SubmitLanguageForm(f) {
	if (!f) return;
	var url = new up_URL();
	if (f.language) {
		url.addArg("language", f.language.value, true);
		window.location = url.toString();
	}
}

// Submit selected records for update/delete
function up_SubmitSelected(f, a, msg) {
	if (!f) return;
	if (!up_KeySelected(f)) {
		alert(upLanguage.Phrase("NoRecordSelected"));
	} else {
		if ((msg) ? up_Confirm(msg) : true) {
			f.action = a;
			f.encoding = "application/x-www-form-urlencoded";
			f.submit();
		}
	}
}

// Submit selected records for export
function up_SubmitSelectedExport(f, a, val) {
	if (!f) return;
	if (!up_KeySelected(f)) {
		alert(upLanguage.Phrase("NoRecordSelected"));
	} else {
		if (f.exporttype && val != "")
			f.exporttype.value = val;
		f.action = a;
		f.encoding = "application/x-www-form-urlencoded";
		f.enctype = "application/x-www-form-urlencoded";
		f.submit();
	}
}

// Remove spaces
function up_RemoveSpaces(value) {
	str = value.replace(/^\s*|\s*$/g, "");
	str = str.toLowerCase();
	if (str == "<p>" || str == "<p/>" || str == "<p>" ||
		str == "<br>" || str == "<br/>" || str == "<br>" ||
		str == "&nbsp;" || str == "<p>&nbsp;</p>")
		return ""
	else
		return value;
}

// Check if hidden text area
function up_IsHiddenTextArea(input_object) {
	return (input_object && input_object.type && input_object.type == "textarea" &&
		input_object.style && input_object.style.display &&
		input_object.style.display == "none");
}

// Set focus
function up_SetFocus(input_object) {
	if (!input_object)
		return;	
	if (!input_object.type && input_object[0]) {	
		for (var i=0; i < input_object.length; i++) {
			if (input_object[i].value != "{value}") {
				input_object = input_object[i];
				break;
			}
		}
	}
	if (!input_object || !input_object.type)
		return;
	var type = input_object.type;
	if (type == "textarea") {
		if (up_IsHiddenTextArea(input_object)) { // DHTML editor
			if (typeof up_FocusDHTMLEditor == "function")
				setTimeout("up_FocusDHTMLEditor('" + input_object.id + "')", 500);
		} else { // textarea
			input_object.focus();
			input_object.select();
		}	
		return;
	} else if (type == "hidden") {
		var asEl = up_GetElements("sv_" + input_object.id); // Auto-Suggest
		if (asEl && asEl.type && asEl.type == "text") {
			asEl.focus();
			asEl.select();
		}
		return; 
	}
	input_object.focus();
	if (type == "text" || type == "password" || type == "file")
		input_object.select();
}

// Show error message
function up_OnError(page, input_object, error_message) {
	alert(error_message); 
	if (page && page.MultiPage) // check if multi-page
		page.MultiPage.GotoPageByElement(input_object);
	up_SetFocus(input_object);
	return false;
}

// Check if object has value
function up_HasValue(obj) {
	if (!obj)
		return true;
	var type = (!obj.type && obj[0]) ? obj[0].type : obj.type;
	if (type == "text" || type == "password" || type == "textarea" ||
		type == "file" || type == "hidden") {
		return (obj.value.length != 0);
	} else if (type == "select-one") {
		return (obj.selectedIndex > 0 || (obj.selectedIndex == 0 && obj.options[obj.selectedIndex].value != ""));
	} else if (type == "select-multiple") {
		return (obj.selectedIndex > -1);
	} else if (type == "checkbox") {
		if (obj[0]) {
			for (var i=0; i < obj.length; i++) {
				if (obj[i].value != "{value}" && obj[i].checked)
				return true;
			}
			return false;
		}
	} else if (type == "radio") {
		if (obj[0]) {
			for (var i=0; i < obj.length; i++) {
				if (obj[i].value != "{value}" && obj[i].checked)
				return true;
			}
			return false;
		} else {
			return (obj.value != "{value}" && obj.checked);
		}
	}
	return true;
}

// Get Ctrl key for multiple column sort
function up_Sort(e, url, type) {
	var newUrl = url
	if (type == 2 && e.ctrlKey)
		newUrl +=	"&ctrl=1";
	location = newUrl;
	return true;
}

// Confirm message
function up_Confirm(msg) {
	return confirm(msg);
}

// Confirm Delete Message
function up_ConfirmDelete(msg, el) {
	var del = confirm(msg);
	if (!del)
		up_ClearDelete(el); // Clear delete status
	return del;
}

// Check if any key selected // PHP
function up_KeySelected(f) {
	if (!f.elements["key_m[]"]) return false;
	if (f.elements["key_m[]"][0]) {
		for (var i=0; i<f.elements["key_m[]"].length; i++)
			if (f.elements["key_m[]"][i].checked) return true;
	} else {
		return f.elements["key_m[]"].checked;
	}
	return false;
}

// Select all related checkboxes
function up_SelectAll(obj)	{
	var f = obj.form;
	var i, elm
	for (i=0; i<f.elements.length; i++) {
		elm = f.elements[i];
		if (elm.type == "checkbox" && elm.name.substr(0, obj.name.length+1) == obj.name + "_") {
			elm.checked = obj.checked;
		}
	}
}

// Update selected checkbox
function up_UpdateSelected(f) {
	var pfx = "u";
	for (i=0; i<f.elements.length; i++) {
		var elm = f.elements[i];
		if (elm.type == "checkbox" && elm.name.substr(0, pfx.length+1) == pfx + "_") {
			if (elm.checked) return true;
		}
	}
	return false;
}

// Set mouse over color
function up_MouseOver(ev, row) {
	var tbl = upDom.getAncestorByClassName(row, UP_TABLE_CLASS);
	row.mouseover = true; // Mouse over
	if (typeof(row.oCssText) == "undefined")
		row.oCssText = row.style.cssText;
	if (!row.selected) {
		upDom.addClass(row, tbl.getAttribute("data-rowhighlightclass"));
	}
}

// Set mouse out color
function up_MouseOut(ev, row) {
	row.mouseover = false; // Mouse out
	if (!row.selected)
		up_SetColor(row);
}

// Set row color
function up_SetColor(row) {
	var tbl = upDom.getAncestorByClassName(row, UP_TABLE_CLASS);
	if (row.selected) {
		if (typeof(row.oCssText) == "undefined")
			row.oCssText = row.style.cssText;
		upDom.removeClass(row, tbl.getAttribute("data-rowhighlightclass"));
		upDom.removeClass(row, tbl.getAttribute("data-roweditclass"));
		upDom.addClass(row, tbl.getAttribute("data-rowselectclass"));
	} else if (row.edit) {
		upDom.removeClass(row, tbl.getAttribute("data-rowselectclass"));
		upDom.removeClass(row, tbl.getAttribute("data-rowhighlightclass"));
		upDom.addClass(row, tbl.getAttribute("data-roweditclass"));
	} else {
		upDom.removeClass(row, tbl.getAttribute("data-rowselectclass"));
		upDom.removeClass(row, tbl.getAttribute("data-roweditclass"));
		upDom.removeClass(row, tbl.getAttribute("data-rowhighlightclass"));
		if (typeof(row.oCssText) != "undefined")
			row.style.cssText = row.oCssText;
	}
}

// Set selected row color
function up_Click(ev, row) {
	var tbl = upDom.getAncestorByClassName(row, UP_TABLE_CLASS);
	if (row.deleteclicked) {
		row.deleteclicked = false; // Reset delete button/checkbox clicked
	} else {
		var bselected = row.selected;
		up_ClearSelected(tbl); // Clear all other selected rows
		if (!row.deleterow)
			row.selected = !bselected; // Toggle
		up_SetColor(row);
	}
}

// Clear selected rows color
function up_ClearSelected(tbl) {
	var row;
	var cnt = tbl.rows.length;	
	for (var i=0; i<cnt; i++) {
		row = tbl.rows[i];
		if (row.selected && !row.deleterow) {
			row.selected = false;
			up_SetColor(row);
		}
	}
}

// Clear all row delete status
function up_ClearDelete(el) {
	var row;
	var tbl = upDom.getAncestorByClassName(el, UP_TABLE_CLASS);
	var cnt = tbl.rows.length;
	for (var i=0; i<cnt; i++) {
		row = tbl.rows[i];
		row.deleterow = false;
	}
}

// Click all delete button
function up_ClickAll(chkbox) {
	var row;
	var tbl = upDom.getAncestorByClassName(chkbox, UP_TABLE_CLASS);
	var cnt = tbl.tBodies[0].rows.length;
	for (var i=0; i<cnt; i++) {
		row = tbl.tBodies[0].rows[i];
		row.selected = chkbox.checked;
		row.deleterow = chkbox.checked;
		up_SetColor(row);
	}
}

// Click single delete link
function up_ClickDelete(a) {
    var row;
    var tbl = upDom.getAncestorByClassName(a, UP_TABLE_CLASS);
    up_ClearSelected(tbl);
    var cnt = tbl.rows.length;
    for (var i=0; i<cnt; i++) {
        row = tbl.rows[i];
        if (row.mouseover) {
            row.deleteclicked = true;
            row.deleterow = true;
            row.selected = true;
            up_SetColor(row);
            break;
        }
    }
}

// Click multiple checkbox
function up_ClickMultiCheckbox(chkbox) {
	var row;
	var tbl = upDom.getAncestorByClassName(chkbox, UP_TABLE_CLASS);
	up_ClearSelected(tbl);
	var cnt = tbl.rows.length;
	for (var i=0; i<cnt; i++) {
		row = tbl.rows[i];
		if (row.mouseover) {
			row.deleteclicked = true;
			row.deleterow = chkbox.checked;
			row.selected = chkbox.checked;
			up_SetColor(row);
			break;
		}
	}
}

// Setup table
function up_SetupTable(tbl, force) {
	if (!tbl || !tbl.rows)
		return;
	if (!force && tbl.isset)
		return;
	var cnt = tbl.rows.length;
	if (cnt == 0)
		return;
	var i, r, last = false;
	for (i = cnt - 1; i >= 0; i--) {
		r = tbl.rows[i];
		if (!last && !upDom.hasClass(r, UP_ITEM_TEMPLATE_CLASSNAME)) { // last row
			upDom.addClass(r, UP_TABLE_LAST_ROW_CLASSNAME);
			last = true;
		} else {
			upDom.removeClass(r, UP_TABLE_LAST_ROW_CLASSNAME);
		}
		if (r.cells && r.cells.length > 0)
			r.cells[r.cells.length-1].style.borderRight = "0"; // last column
	}
	var rowcnt = 0;
	if (tbl.tBodies.length > 0) {
		var idx = tbl.tBodies.length - 1; // use last TBODY (for Opera bug)
		for (var i = 0, cnt = tbl.tBodies[idx].rows.length; i < cnt; i++) {
			r = tbl.tBodies[idx].rows[i];
			if (!upDom.hasClass(r, UP_TABLE_PREVIEW_ROW_CLASSNAME) && !upDom.hasClass(r, UP_ITEM_TEMPLATE_CLASSNAME)) {
				upDom.addClass(r, (rowcnt % 2 == 0) ? UP_TABLE_ROW_CLASSNAME : UP_TABLE_ALT_ROW_CLASSNAME); // row color
				upDom.removeClass(r, (rowcnt % 2 == 0) ? UP_TABLE_ALT_ROW_CLASSNAME : UP_TABLE_ROW_CLASSNAME);
				rowcnt++;
			}
		}
	}
	up_SetupGrid(upDom.getAncestorByClassName(tbl, UP_GRID_CLASS), force);
	tbl.isset = true;
}

// Setup grid
function up_SetupGrid(grid, force) {
	if (!grid)
		return;
	if (!force && grid.isset)
		return;
	var tbl = up_GetLastElementBy(function(node) { return (upDom.hasClass(node, UP_TABLE_CLASS)) }, "TABLE", grid);
	var rowcnt = 0;
	if (tbl && tbl.tBodies.length > 0) {
		var idx = tbl.tBodies.length - 1; // use last TBODY (for Opera bug)
		for (var i = 0, cnt = tbl.tBodies[idx].rows.length; i < cnt; i++) {
			r = tbl.tBodies[idx].rows[i];
			if (!upDom.hasClass(r, UP_TABLE_PREVIEW_ROW_CLASSNAME) && !upDom.hasClass(r, UP_ITEM_TEMPLATE_CLASSNAME))
				rowcnt++;
		}
	}
	var divupper = up_GetFirstElementBy(function(node) { return (upDom.hasClass(node, "upGridUpperPanel")) }, "DIV", grid);
	var divmiddle = up_GetFirstElementBy(function(node) { return (upDom.hasClass(node, "upGridMiddlePanel")) }, "DIV", grid);
	var divlower = up_GetFirstElementBy(function(node) { return (upDom.hasClass(node, "upGridLowerPanel")) }, "DIV", grid);
	if (divmiddle)
		divmiddle.style.display = (rowcnt == 0) ? "none" : "";
	if (divupper && divlower) {
		if (rowcnt == 0) {
			upDom.addClass(divlower, "upDisplayNone");
			upDom.addClass(divupper, "upNoBorderBottom");
		} else {
			upDom.removeClass(divlower, "upDisplayNone");
			upDom.removeClass(divupper, "upNoBorderBottom");
		}
	} else if (divupper && !divlower) {
		if (rowcnt == 0) {
			upDom.addClass(divupper, "upNoBorderBottom");
		} else {
			upDom.removeClass(divupper, "upNoBorderBottom");
		}
	} else if (divlower && !divupper) {
		if (rowcnt == 0) {
			upDom.addClass(divlower, "upNoBorderTop");
		} else {
			upDom.removeClass(divlower, "upNoBorderTop");
		}
	}
	grid.isset = true;
}

// Toggle highlight
function up_ToggleHighlight(p, lnk, name) {
	if (!lnk || !document.getElementsByName)
		return;
	var elems = document.getElementsByName(name);
	var i, el;
	for (i=0; i<elems.length; i++) {
		elem = elems[i];
		elem.className = (elem.className == "") ? "upHighlightSearch" : "";
	}
	lnk.innerHTML = (lnk.innerHTML == p.HideHighlightText) ? p.ShowHighlightText : p.HideHighlightText;
}

// Show/Hide field row (for Add/Edit/Search/Update/View page)
function up_SetFieldVisible(fldvar, bool) {
	var row = document.getElementById("r_" + fldvar);
	if (row) {
		if (bool) {
			row.style.display = "";
		} else {
			row.style.display = "none";
		}
	}
}

// Add a row to grid
function up_AddGridRow(el) {
	if (!el)
		return;
	var grid = upDom.getAncestorByClassName(el, UP_GRID_CLASS);
	if (!grid)
		return;
	var tbl = upDom.getElementsByClassName(UP_TABLE_CLASS, "TABLE", grid);
	if (!tbl)
		return;
	if (tbl.length > 0)
		tbl = tbl[0];
	var tpl = null;
	for (var i = 0; i < tbl.rows.length; i++) {
		if (upDom.hasClass(tbl.rows[i], "upTemplate")) {
			tpl = tbl.rows[i];
			break;
		}
	}
	if (tpl) {
		var lastrow = tbl.rows[tbl.rows.length-1];
		upDom.removeClass(lastrow, UP_TABLE_LAST_ROW_CLASSNAME);
		var row = tpl.cloneNode(true);
		upDom.removeClass(row, "upTemplate");
		var elkeycnt = upDom.get("key_count");
		var keycnt = parseInt(elkeycnt.value) + 1;
		row.id = "r" + keycnt + row.id.substring(2);
		row.setAttribute("data-rowindex", keycnt);
		var els = upDom.getElementsBy(function(node) { // get the scripts with rowindex
			return (node.text.indexOf("$rowindex$") > -1)	
			}, "SCRIPT", tbl); // the scripts tags are under the table node
		upDom.insertAfter(row, lastrow); // insert first (for IE <=7)
		for (var i = 0; i < row.cells.length; i++) {
			var cell = row.cells[i];
			var html = cell.innerHTML;
			html = html.replace(/\$rowindex\$/g, keycnt); // replace row index
			cell.innerHTML = html;
		}
		upDom.getElementsBy(function(node) { // process the scripts in the row (not in cell)
			if (node.text.indexOf("$rowindex$") > -1)
				node.text = node.text.replace(/\$rowindex\$/g, keycnt); // replace row index
			}, "SCRIPT", row);
		elkeycnt.value = keycnt;
		var keyact = document.createElement("INPUT");
		keyact.type = "hidden";
		keyact.id = "k" + keycnt + "_action";
		keyact.name = keyact.id;
		keyact.value = "insert";
		upDom.insertAfter(keyact, elkeycnt);
		for (var i = 0; i < els.length; i++) {
			var node = els[i];			
			scr = document.createElement("SCRIPT");
			scr.type = "text/javascript";
			scr.text = node.text.replace(/\$rowindex\$/g, keycnt); // replace row index			
			document.body.appendChild(scr); // insert the script			

			// create DHTML editor, if any
			if ((ar = scr.text.match(/new up_DHTMLEditor\("([\w]+)"/)) != null)
				up_CreateEditor(ar[1]);
		}	
		up_SetupTable(tbl, true);
		return true;
	}
	return false;
}

// Delete a row from grid
function up_DeleteGridRow(el, p, infix) {
	if (!el)
		return;
	var row = upDom.getAncestorByTagName(el, "TR");
	if (!row)
		return;
	var tbl = upDom.getAncestorByClassName(row, UP_TABLE_CLASS);
	if (!tbl)
		return;
	var rowidx = parseInt(row.getAttribute("data-rowindex"));
	var c = true;
	if (p && typeof(p.EmptyRow) == "function") {
		var fobj = upDom.getAncestorByTagName(el, "FORM");
		if (fobj)
			c = !p.EmptyRow(fobj, infix);
	}
	if (c) {
		if (!confirm(upLanguage.Phrase('DeleteConfirmMsg')))
			return;
	}
	tbl.deleteRow(row.rowIndex);

//	if (upDom.hasClass(row, UP_TABLE_LAST_ROW_CLASSNAME)) {
//		var lastrow = tbl.rows[tbl.rows.length-1];
//		upDom.addClass(lastrow, UP_TABLE_LAST_ROW_CLASSNAME);
//	}

	up_SetupTable(tbl, true);
	if (rowidx > 0) {
		var keyact = upDom.get("k" + rowidx + "_action");
		if (keyact) {
			if (keyact.value == "insert")
				keyact.value = "insertdelete";
			else
				keyact.value = "delete";
		} else {
			var elkeycnt = upDom.get("key_count");
			var keyact = document.createElement("INPUT");
			keyact.type = "hidden";
			keyact.id = "k" + rowidx + "_action";
			keyact.name = keyact.id;
			keyact.value = "delete";
			upDom.insertAfter(keyact, elkeycnt);
		}
		return true;
	}
	return false;
}

// Html encode text
function up_HtmlEncode(text) {
	var str = text;
	str = str.replace(/&/g, '&amp');
	str = str.replace(/\"/g, '&quot;');
	str = str.replace(/</g, '&lt;');
	str = str.replace(/>/g, '&gt;'); 
	return str;
}

// Get element from form
function up_GetFormElement(f, name) {
	for(var i=0; i<f.elements.length; i++) {
		if(f.elements[i].name == name) {
			return f.elements[i];
		}
	}
}

// Extended basic search clear form
function up_ClearForm(objForm){
	with (objForm) {
		for (var i=0; i<elements.length; i++){
			var tmpObj = eval(elements[i]);
			if (tmpObj.type == "checkbox" || tmpObj.type == "radio"){
				tmpObj.checked = false;
			} else if (tmpObj.type == "select-one"){
				tmpObj.selectedIndex = 0;
			} else if (tmpObj.type == "select-multiple") {
				for (var j=0; j<tmpObj.options.length; j++)
					tmpObj.options[j].selected = false;
            } else if (tmpObj.type == "text" || tmpObj.type == "textarea"){
				tmpObj.value = "";
			}
		}
	}
}

// Toggle search panel
function up_ToggleSearchPanel(p) {
	if (!document.getElementById)
		return;
	var img = document.getElementById(p.SearchButton);
	var p = document.getElementById(p.SearchPanel);
	if (!p || !img)
		return;
	if (p.style.display == "") {
		p.style.display = "none";
		if (img.tagName == "IMG")
			img.src = UP_IMAGE_FOLDER + "expand.gif";
	} else {
		p.style.display = "";
		if (img.tagName == "IMG")
			img.src = UP_IMAGE_FOLDER + "collapse.gif";
	}
}

// Create tab view
function up_TabView(oPage) {
	if (!oPage)
		return;
	var tv = oPage.TabView = new upWidget.TabView(oPage.Name);
	var mp = oPage.MultiPage;
	tv.subscribe("activeTabChange", function(e) {
		if (mp) {
			var i = tv.getTabIndex(e.newValue) + 1;
			mp.GotoPageByIndex(i);
		}
	});
	tv.subscribe("contentReady", function(e) {
		if (mp) {
			mp.Init(); // Multi-page initialization
			mp.TabView = tv;
			mp.SubmitButton = upDom.get("btnAction");
			var i = tv.get("activeIndex") + 1;
			mp.GotoPageByIndex(i);
		}
	});
}

// Functions for multi page
function up_MultiPage() {
	if (!(document.getElementById || document.all))
		return;		
	this.PageIndex = 1;
	this.MaxPageIndex = 0;
	this.MinPageIndex = 0;
	this.Elements = new Array();
	this.AddElement = up_MultiPageAddElement;
	this.Init = up_InitMultiPage;
	this.ShowPage = up_ShowPage;
	this.EnableButtons = up_EnableButtons;
	this.GetPageIndexByElementId = up_GetPageIndexByElementId;
	this.GotoPageByIndex = up_GotoPageByIndex;
	this.GotoPageByElement = up_GotoPageByElement;
	this.FocusInvalidElement = up_FocusInvalidElement;
	this.TabView = null;
	this.SubmitButton = null;
	this.LastPageSubmit = false;
	this.HideDisabledButton = true;
}

// Multi page add element
function up_MultiPageAddElement(elemid, pageIndex) {
	this.Elements.push([elemid, pageIndex]);
}

// Multi page init
function up_InitMultiPage() {
	for (var i=0; i<this.Elements.length; i++) {
		if (this.Elements[i][1] > this.MaxPageIndex)
			this.MaxPageIndex = this.Elements[i][1]; 
	}	
	this.MinPageIndex = this.MaxPageIndex;
	for (var i=0; i<this.Elements.length; i++) {
		if (this.Elements[i][1] < this.MinPageIndex)
			this.MinPageIndex = this.Elements[i][1]; 
	}

	// if ASP.NET 
	if (typeof Page_ClientValidate == "function") {
    original_Page_ClientValidate = Page_ClientValidate; 
		Page_ClientValidate = function() { 
			var isValid;
			isValid = original_Page_ClientValidate();          
			if (!isValid) 
				this.FocusInvalidElement();
			return isValid; 
		} 
	}	
}

//// Multi page show this page
function up_ShowPage() {
	for (var i=0; i<this.Elements.length; i++) {
		if (this.Elements[i][1] == this.PageIndex) {
			up_CreateEditor(this.Elements[i][0]);
		}
	}
	this.EnableButtons();
}

// Multi page enable buttons
function up_EnableButtons() {
	if (this.SubmitButton) {
		this.SubmitButton.disabled = (this.LastPageSubmit) ? (this.PageIndex != this.MaxPageIndex) : false;
		if (this.SubmitButton.disabled) {
			this.SubmitButton.style.display = (this.HideDisabledButton) ? "none" : "";
		} else {
			this.SubmitButton.style.display = "";	
		}
	}
}

// Get page index by element id
function up_GetPageIndexByElementId(elemid) {
	var pageIndex = -1;
	for (var i=0; i<this.Elements.length; i++) {
		if (this.Elements[i][0] == elemid)
			return this.Elements[i][1];
	}
	return pageIndex;
}

// Goto page by index
function up_GotoPageByIndex(pageIndex) {
	if (pageIndex < this.MinPageIndex || pageIndex > this.MaxPageIndex)
		return; 
	this.PageIndex = pageIndex;
	this.ShowPage();
}

// Goto page by element
function up_GotoPageByElement(elem) {
	var pageIndex;
	if (!elem)
		return;
	var id = (!elem.type && elem[0]) ? elem[0].id : elem.id;
	if (id == "")
		return;	
	pageIndex = this.GetPageIndexByElementId(id);
	if (pageIndex > -1) {
		this.GotoPageByIndex(pageIndex);
		if (this.TabView)
			this.TabView.set("activeIndex", pageIndex - 1);
	}		
}

// for ASP.NET
// Focus invalid element
function up_FocusInvalidElement() {	
 	for (var i=0; i<Page_Validators.length; i++) {
		if (!Page_Validators[i].isvalid) {
			var elem = document.getElementById(Page_Validators[i].controltovalidate);
			this.GotoPageByElement(elem);
			up_SetFocus(elem);
			break;
		}
	}
}

// Get first element
function up_GetFirstElementBy(method, tag, root) {
	var ar = upDom.getElementsBy(method, tag, root, null, null, null, true);
	return (upLang.isArray(ar) && ar.length == 0) ? null : ar;
}

// Get last element
function up_GetLastElementBy(method, tag, root) {
	var ar = upDom.getElementsBy(method, tag, root, null, null, null);
	return (ar.length == 0) ? null : ar[ar.length - 1];
}

// get selection list as element or radio/checkbox list as array
function up_GetElements(name) {
	var ar = document.getElementsByName(name);
	if (ar.length == 1) {
		var el = ar[0];
		if (el.type && el.type != "checkbox" && el.type != "radio") 
			return ar[0];
	}	
	return ar;
}

// update multiple selection lists
function up_UpdateOpts(ar) {
	if (upLang.isArray(ar)) { 
		var u;
		var cnt = ar.length; 
		for (i = 0; i < cnt; i++) {
			u = ar[i];
			if (upLang.isBoolean(u[2]) && !u[2]) { // Ajax and sync
				u[0] = {id: u[0], values: up_GetOptValues(up_GetElements(u[0]))};
				u[1] = {id: u[1], values: up_GetOptValues(up_GetElements(u[1]))};
			} else {
				up_UpdateOpt(u[0], u[1], u[2], false);	
			}   	
		}
		for (i = 0; i < cnt; i++) {
			u = ar[i];
			if (upLang.isBoolean(u[2]) && !u[2]) {
				up_UpdateOpt(u[0], u[1], true, false);			
			}   	
		}
	}
}

// update child element options
function up_UpdateOpt(id, parent_id, ds, updatechild) {
	var iff = -1;
	var oid, obj, ar, parentObj, arp; 		
	if (upLang.isString(id)) {
		oid = id;
		obj = up_GetElements(id);
		ar = up_GetOptValues(obj);		
	} else if (upLang.isObject(id)) {
		oid = id.id;
		obj = up_GetElements(id.id);
		ar = id.values;		
	}
	if (upLang.isString(parent_id)) {
		parentObj = up_GetElements(parent_id);
		arp = up_GetOptValues(parentObj);	
	} else if (upLang.isObject(parent_id)) {
		parentObj = up_GetElements(parent_id.id);
		arp = parent_id.values;
		parent_id = parent_id.id;	
	}	
	var id = up_GetId(obj);
	up_ClearOpt(obj);
	var addOpt = function(aResults) {
		var cnt = aResults.length;		
		for (var i=0; i<cnt; i++) {
			if (iff == 5) {
				for (var j=0; j<arp.length; j++) {
					if (aResults[i][5].toUpperCase() == arp[j].toUpperCase()) {
						up_NewOpt(obj, aResults[i][0], aResults[i][1], aResults[i][2], aResults[i][3], aResults[i][4]);
						break; 
					}
				}
			} else {
				up_NewOpt(obj, aResults[i][0], aResults[i][1], aResults[i][2], aResults[i][3], aResults[i][4]);
			}					
		}
		if (obj.length) // radio/checkbox list
			up_RenderOpt(obj);
		up_SelectOpt(obj, ar);
		if (updatechild != false) {
			if (obj.options) {
				if (typeof(obj.onchange) == "function")
					obj.onchange();
			} else if (obj.length) { // radio/checkbox list
				if (obj.length > 0) {
			    var el = obj[0];
			    if (typeof(el.onchange) == "function")
						el.onchange();
				}
			}
		}	
	} 
	if (upLang.isArray(ds)) { // array => non-Ajax
		iff = 5;
		addOpt(ds);
	} else if (upLang.isBoolean(ds)) { // async => Ajax
		var async = ds;
		var f = upDom.getAncestorByTagName(upDom.get(oid), "FORM");
		if (!f)
			return;
		var s = f.elements["s_" + id];	
		var lft = f.elements["lft_" + id];		
		if (!s || s.value == "")
			return;		
		var cb = {			
			success: function(oResponse) {
				var txt = oResponse.responseText; 
				if (txt.length > 0) {          
					var newLength = txt.length - UP_RECORD_DELIMITER.length;
					if (txt.substr(newLength) == UP_RECORD_DELIMITER)
						txt = txt.substr(0, newLength);
					var aResults = [];					
					var aRecords = txt.split(UP_RECORD_DELIMITER);					
					for (var n = aRecords.length-1; n >= 0; n--)
						aResults[n] = aRecords[n].split(UP_FIELD_DELIMITER);
					addOpt(aResults);				
				}
			},
			failure: function(oResponse) {						
			},			
			scope: this,
			argument: null
		}
		var o = upConnect.getConnectionObject(false);
		if (o) {		
			var url = UP_LOOKUP_FILE_NAME + "?s=" + s.value + "&f=" + encodeURIComponent(arp.join(","));
			if (lft)
				url += "&lft=" + encodeURIComponent(lft.value);
			o.conn.open("get", url, async);
			if (async)
				upConnect.handleReadyState(o, cb);
			o.conn.send(null);
			if (!async)
				upConnect.handleTransactionResponse(o, cb); 
		}
	}		
}

// Render repeat column table (rowcnt is zero based row count)
function up_RepeatColumnTable(totcnt, rowcnt, repeatcnt, rendertype) {
	var sWrk = "";
	if (rendertype == 1) { // render start
		if (rowcnt == 0)
			sWrk += "<table class=\"" + UP_ITEM_TABLE_CLASSNAME + "\">";
		if (rowcnt % repeatcnt == 0)
			sWrk += "<tr>";
		sWrk += "<td>";
	} else if (rendertype == 2) { // render end
		sWrk += "</td>";
		if (rowcnt % repeatcnt == repeatcnt - 1) {
			sWrk += "</tr>";
		} else if (rowcnt == totcnt - 1) {
			for (i = (rowcnt % repeatcnt) + 1; i < repeatcnt; i++)
				sWrk += "<td>&nbsp;</td>";
			sWrk += "</tr>";
		}
		if (rowcnt == totcnt - 1) sWrk += "</table>";
	}
	return sWrk;
}

// Get existing selected values
function up_GetOptValues(obj) {
	var ar = [];
	if (obj.options) { // selection list
		for (i=0; i<obj.options.length; i++) {
			if (obj.options[i].selected)
				ar.push(obj.options[i].value);
		}
	} else if (obj.length) { // radio/checkbox list
		var i, el;		
		var cnt = obj.length;		
		for (i=0; i<cnt; i++) {
			el = obj[i];
			if (el.checked)
				ar.push(el.value);
		}	
	} else if (obj) { // radio/checkbox/text/hidden
		ar.push(obj.value);
	}
	return ar;
}

// Clear existing options
function up_ClearOpt(obj) {
	if (obj.options) { // selection list
		var lo = (obj.type == "select-multiple") ? 0 : 1;
		for (var i=obj.length-1; i>=lo; i--)
			obj.options[i] = null;
	} else if (obj.length) { // radio/checkbox list
		var id = up_GetId(obj); 
		var p = document.getElementById("dsl_" + id); // parent element
		if (p) {
			var els = upDom.getChildrenBy(p, function(node) {
				return (node.tagName == "TABLE" && node.className == UP_ITEM_TABLE_CLASSNAME);
			});			
			for (var i=0; i<els.length; i++)
				p.removeChild(els[i]);
			p._options = [];
		}
	}
}

// Get the id or name of an element
function up_GetId(obj) {
	var id = "";
	if (!obj.options && obj.length)
		obj = obj[0];
	if (obj.id && obj.id != "") {
		id = obj.id;
	} else if (obj.name && obj.name != "") {
		id = obj.name;
	}
	if (id.substr(id.length-2, 2) == "[]")
		id = id.substr(0, id.length-2); 	
	return id;
}

// Create combobox option 
function up_NewOpt(obj, value, text1, text2, text3, text4) {
	var text = text1;
	if (text2 && text2 != "")
		text += UP_FIELD_SEP + text2;
	if (text3 && text3 != "")
		text += UP_FIELD_SEP + text3;
	if (text4 && text4 != "")
		text += UP_FIELD_SEP + text4;
	if (obj.options) { // selection list
		var optionName = new Option(text, value, false, false)
		obj.options[obj.length] = optionName;
	} else if (obj.length) { // radio/checkbox list
		var id = up_GetId(obj); 
		var p = document.getElementById("dsl_" + id); // get parent element		
		if (p)
			p._options.push({val:value, lbl:text});
	}
}

// Render the options
function up_RenderOpt(obj) {
	var id = up_GetId(obj); 
	var p = document.getElementById("dsl_" + id); // parent element
	var t = document.getElementById("tp_" + id); // get the item template	
	if (!p || !p._options || !t)
		return;
	var cnt = p._options.length;
	var cols = p.getAttribute("data-repeatcolumn");
	if (!cols || cols == NaN || cols < 1)
		cols = 5;
	var tpl = t.innerHTML;		 
	var html = "";
	var ihtml;
	for (var i=0; i<cnt; i++) {
		html += up_RepeatColumnTable(cnt, i, cols, 1);
		ihtml = tpl;
		ihtml = ihtml.replace(/(\"){0,1}{value}(\"){0,1}/g, "\"" + up_HtmlEncode(p._options[i].val) + "\""); // replace value		
		html += "<label>" + ihtml + p._options[i].lbl + "</label>";		
		html += up_RepeatColumnTable(cnt, i, cols, 2);		
	} 
	p.innerHTML += html;
	p._options = [];		
}

// Select combobox option
function up_SelectOpt(obj, value_array) {
	if (!obj || !value_array)
		return;
	var i, j, cnt2, el;
	var cnt = value_array.length; 
	for (i=0; i<cnt; i++) {		
		if (obj.options) { // listbox/combobox
			cnt2 = obj.length;
			for (j=0; j<cnt2; j++) {
				if (obj.options[j].value.toUpperCase() == value_array[i].toUpperCase()) {
					obj.options[j].selected = true;
					break;
				}
			}
		} else if (obj.length) { // radio/checkbox list
			cnt2 = obj.length;
			if (cnt2 == 1 && obj[0].type == "checkbox") { // assume boolean field // P802
				obj[0].checked = (up_ConvertToBool(obj[0].value) === up_ConvertToBool(value_array[0]));
			} else {
				for (j=0; j<cnt2; j++) {
					if (obj[j].value.toUpperCase() == value_array[i].toUpperCase()) {
						obj[j].checked = true;
						break;
					}
				}
			}
		} else if (obj.type) {
			obj.value = value_array.join(",");
		}
	}
	if (obj.options && (obj.getAttribute("data-autoselect") == "true" || obj.getAttribute("autoselect") == "true")) {
		if (obj.type == "select-one" && obj.options.length == 2 &&
			!obj.options[1].selected) {
			obj.options[1].selected = true;
		} else if (obj.type == "select-multiple" && obj.options.length == 1 &&
			!obj.options[0].selected) {
			obj.options[0].selected = true;
		}
	} else if (obj.length && obj.length == 2 && (obj[0].getAttribute("data-autoselect") == "true" || obj[0].getAttribute("autoselect") == "true")) { // radio/checkbox list			
		obj[1].checked = true;
	}
}

// Auto-Suggest
function up_AutoSuggest(elInput, elContainer, elSQL, elMessage, elValue, elParent, forceSelection, maxEntries) {

	// Create DataSource
	this.ds = new upUtil.XHRDataSource(UP_LOOKUP_FILE_NAME);
	this.ds.responseType = upUtil.XHRDataSource.TYPE_TEXT;
	this.ds.responseSchema = {
		recordDelim: UP_RECORD_DELIMITER,
		fieldDelim: UP_FIELD_DELIMITER
	};
	this.ds.maxCacheEntries = 0; // DO NOT CHANGE!		
	this.ds.scriptQueryParam = "q";

	// create AutoComplete
	this.ac = new upWidget.AutoComplete(elInput, elContainer, this.ds);
	this.ac._originalClearSelection = this.ac._clearSelection;
	this.ac._as = this;
	this.ac.useShadow = false;
	this.ac.animVert = false;
	this.ac.minQueryLength = 1;
	this.ac.maxResultsDisplayed = maxEntries;
	this.ac.typeAhead = true;
	this.ac.forceSelection = forceSelection;
	this.ac.useIFrame = (upEnv.ua.ie > 0 && upEnv.ua.ie < 8);
	this.ac.doBeforeExpandContainer = function(oTextbox, oContainer, sQuery, aResults) {
		var pos = upDom.getXY(oTextbox);
		pos[1] += upDom.get(oTextbox).offsetHeight + 1;
		upDom.setXY(oContainer,pos);
		oContainer.style.width = upDom.get(elInput).offsetWidth + "px"; // set container width
		return true;
	};

	// if forceSelection
	this.ac._clearSelection = function() {
		if (this._elTextbox.value == "") {
			this._as.setValue("");
		} else {
			this._originalClearSelection();
		}
	}

	// format display value (Note: Override this function if link field <> display field)
	this.formatResult = function(ar) {
		return ar[0];
	};

	// set the key to the actual value field
	this.setValue = function(v) {
		if (elValue) {
			var el = upDom.get(elValue);
			if (el) {
				el.value = v;		
				if (el.onchange)					
					el.onchange.call(el);
			}
		}	
	}

	// format result
	this.ac.formatResult = function(oResultItem, sQuery) {	

		//var key = oResultItem[0];
		var lbl = this._as.formatResult(oResultItem);

		//oResultItem[0] = lbl;		
		//oResultItem.push(key); // Save the key to last

		return lbl;		
	};

	// generate request
	this.ac.generateRequest = function(sQuery) {
		this.dataSource.scriptQueryAppend = "s=" + upDom.get(elSQL).value;
		if (elParent != "") {
			var arp = up_GetOptValues(up_GetElements(elParent));
			this.dataSource.scriptQueryAppend += "&f=" + encodeURIComponent(arp.join(","));			
		}
		sQuery = (this.queryQuestionMark ? "?" : "") + (this.dataSource.scriptQueryParam || "query") + "=" + sQuery + 
    	(this.dataSource.scriptQueryAppend ? ("&" + this.dataSource.scriptQueryAppend) : ""); 
		return sQuery;
	};

	// update the key to the actual value field
	this.ac.itemSelectEvent.subscribe(function(type, e) {
		var ar = e[2];
		this._as.setValue(ar[0]);
		this._elTextbox.value = this._as.formatResult(ar);
	});		

	// remove styles for unmatched item
	this.ac.textboxFocusEvent.subscribe(function(type, e) {
		upDom.removeClass(elInput, "upUnmatched");
		upDom.setStyle(elMessage, "display", "none");
	});

	// clear the actual value field
	if (forceSelection) {
		this.ac.selectionEnforceEvent.subscribe(function(type, e) {
			this._as.setValue("");
			upDom.addClass(elInput, "upUnmatched");
			upDom.setStyle(elMessage, "display", "");
		});	
	} else {
		this.ac.unmatchedItemSelectEvent.subscribe(function(type, e) {
			this._as.setValue(this._elTextbox.value);	
		});
	}
}

// Get Auto-Suggest unmatched item (for form submission by pressing Return)
function up_PostAutoSuggest(f) {
	var arEl = upDom.getElementsByClassName("yui-ac-input", "INPUT", f);
	for (var i=0; i<arEl.length; i++) {
		var name = arEl[i].name;
		if (name.substr(0, 3) == "sv_") {
			var oas = eval("oas_" + name.substr(3));
			if (oas && oas.ac && oas.ac._bFocused) {
				oas.ac._onTextboxBlur(null, oas.ac);
				break;
			}
		}
	}
}

// Init add option dialog
function up_InitAddOptDialog() {
	upAddOptDialog = new upWidget.Dialog("upAddOptDialog", { visible: false, constraintoviewport: true, hideaftersubmit: false, zIndex: 9000 }); 
	upAddOptDialog.callback = { success: up_AddOptHandleSuccess, failure: up_AddOptHandleFailure };

	// Validate data
	upAddOptDialog.validate = function() {
		var data = this.getData();
		var tablename = data.t;

		// Note: You can add your validation code here, return false if invalid, e.g.
// if (tablename == "xxx") {
// if (data.firstname == "" || data.lastname == "") {
// alert("Please enter your first and last names.");
// return false;
// }
// }

		return true;
	};

// upAddOptDialog.beforeShowEvent.subscribe(function() {
// var w = this.header.offsetWidth;
// w = Math.max(w, this.body.offsetWidth);
// w = Math.max(w, this.footer.offsetWidth);
// this.header.style.width = w + "px";
// this.body.style.width = w + "px";
// this.footer.style.width = w + "px";
// });

	upAddOptDialog.render();
}

// Init email dialog
function up_InitEmailDialog() {
	upEmailDialog = new upWidget.Dialog("upEmailDialog", { visible: false, constraintoviewport: true, hideaftersubmit: false, zIndex: 10000 });
	if (upEmailDialog.body) {
		upEmailDialog._body = upEmailDialog.body.innerHTML;
		upEmailDialog.setBody("");
	}
	upEmailDialog.validate = function() {
		var elm;
		var fobj = this.form;
		elm = fobj.elements["sender"];
		if (elm && !up_HasValue(elm))
			return up_OnError(null, elm, upLanguage.Phrase("EnterSenderEmail"));
		if (elm && !up_CheckEmailList(elm.value, 1))
			return up_OnError(null, elm, upLanguage.Phrase("EnterProperSenderEmail"));
		elm = fobj.elements["recipient"];
		if (elm && !up_HasValue(elm))
			return up_OnError(null, elm, upLanguage.Phrase("EnterRecipientEmail"));
		if (elm && !up_CheckEmailList(elm.value, UP_MAX_EMAIL_RECIPIENT))
			return up_OnError(null, elm, upLanguage.Phrase("EnterProperRecipientEmail"));
		elm = fobj.elements["cc"];
		if (elm && !up_CheckEmailList(elm.value, UP_MAX_EMAIL_RECIPIENT))
			return up_OnError(null, elm, upLanguage.Phrase("EnterProperCcEmail"));
		elm = fobj.elements["bcc"];
		if (elm && !up_CheckEmailList(elm.value, UP_MAX_EMAIL_RECIPIENT))
			return up_OnError(null, elm, upLanguage.Phrase("EnterProperBccEmail"));
		elm = fobj.elements["subject"];
		if (elm && !up_HasValue(elm))
			return up_OnError(null, elm, upLanguage.Phrase("EnterSubject"));
		return true;
	};
	upEmailDialog.render();
}

function up_DefaultHandleSubmit() {
	this.submit();
	up_RemoveScript(this.callback.argument.el);
}

function up_DefaultHandleCancel() {
	this.cancel();
	this.setBody("");
	up_RemoveScript(this.callback.argument.el);	
}

// Execute JavaScript loaded by Ajax
function up_ExecScript(html, id) {
	var re = /<script[^>]*>((.|[\r\n])*?)<\\?\/script>/ig;
	var ar;
	while ((ar = re.exec(html)) != null) {
		scr = document.createElement("SCRIPT");
		scr.type = "text/javascript";
		scr.text = RegExp.$1;
		document.body.appendChild(scr);
	}
}

// Remove JavaScript added by Ajax
function up_RemoveScript(id) {
	if (!id)
		return;
	var el = document.getElementsByTagName("SCRIPT");
	var i, scr;
	var prefix = "scr_" + id + "_";
	var prelen = prefix.length;
	var len = el.length;
	for (i=len-1; i>=0; i--) {
		scr = el[i];
		if (scr.id && scr.id.substr(0, prelen) == prefix)
			scr.parentNode.removeChild(scr);
	}
}

function up_AddOptHandleFailure(o) {
	upAddOptDialog.hide();
	upAddOptDialog.setBody("");
	alert("Server Error " + o.status + ": " + o.statusText);
}

function up_AddOptHandleSuccess(o) {
	var results;
	if (o.responseXML)	
		results = o.responseXML.getElementsByTagName("result");	
	if (results && results.length > 0) {
		upAddOptDialog.hide();
		upAddOptDialog.setBody("");
		var xl;
		var result = results[0];				
		var obj = up_GetElements(o.argument.el);
		if (obj) {
			xl = result.getElementsByTagName(o.argument.lf);
			var lfv = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			xl = result.getElementsByTagName(o.argument.df);
			var dfv = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			var df2v = "";
			if (o.argument.df2 != "") {
				xl = result.getElementsByTagName(o.argument.df2);			
				df2v = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			}
			var df3v = "";
			if (o.argument.df3 != "") {
				xl = result.getElementsByTagName(o.argument.df3);
				df3v = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			}
			var df4v = "";
			if (o.argument.df4 != "") {
				xl = result.getElementsByTagName(o.argument.df4);
				df4v = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			}
			var ffv = "";
			if (o.argument.ff != "") {
				xl = result.getElementsByTagName(o.argument.ff);			
				ffv = (xl.length > 0 && xl[0].firstChild) ? xl[0].firstChild.nodeValue : "";
			}
			if (lfv != "" && dfv != "") {
				if (o.argument.pg) { // non-Ajax
					var elid = o.argument.el;
					if (elid.substr(elid.length - 2, 2) == "[]") // PHP
						elid = elid.substr(0, elid.length - 2); 
					var ar = o.argument.pg["ar_" + elid];					
					if (ar && upLang.isArray(ar))
						ar[ar.length] = [lfv, dfv, df2v, df3v, df4v, ffv];
				}
				var add = true;

				// get the parent field value
				if (o.argument.pf != "") {
					var pobj = up_GetElements(o.argument.pf);
					var par = up_GetOptValues(pobj);				
					var pcnt = par.length;
					add = false;
					for (var i=0; i<pcnt; i++) {
						if (par[i] == ffv) {
							add = true;
							break;
						}
					}
				}
				if (add) { // add the new option
					if (!obj.options && obj.length) { // radio/checkbox list
						var id = up_GetId(obj); 
						var p = document.getElementById("dsl_" + id); // parent element
						if (!p)
							return;					
						var ar = [];
						var vals = [];
						var cnt = obj.length;
						for (var i=0; i<cnt; i++) {
							if (obj[i].type == "checkbox" && obj[i].checked)
								vals.push(obj[i].value);
							if (obj[i].nextSibling) 
								ar.push({val: obj[i].value, lbl: obj[i].nextSibling.nodeValue});
						}					
						up_ClearOpt(obj);
						p._options = ar;	
					}
					up_NewOpt(obj, lfv, dfv, df2v, df3v, df4v);
					if (obj.options) {
						obj.options[obj.options.length-1].selected = true;
						if (obj.onchange)
							obj.onchange.call(obj);
						obj.focus();				
					} else if (obj.length) { // radio/checkbox list					
						up_RenderOpt(obj);
						if (vals.length > 0)
							up_SelectOpt(obj, vals);	
						var obj = up_GetElements(o.argument.el);
						if (obj.length > 0) {
							var el = obj[obj.length-1];
							el.checked = true;
							if (el.type == "radio") 
								el.onclick.call(el);
							el.focus();
						}	 				
					}
				}
			}				
		}
	} else {
		upAddOptDialog.setBody(o.responseText);	
	}				
}

// Show dialog
// argument object members:
// pg - page
// lnk - add option link id
// el - form element id
// url - URL of the Add form 
// hdr - dialog header
// lf - link field
// df - display field
// df2 - display field 2
// df3 - display field 3
// df4 - display field 4
// pf - parent field
// ff - filter field
function up_AddOptDialogShow(oArg) {
	if (upAddOptDialog && upAddOptDialog.cfg.getProperty("visible")) upAddOptDialog.hide();
	var f = {
		success: function(o) {
			if (upAddOptDialog) {

				// get the parent field value
				var obj = up_GetElements(o.argument.pf);
				var ar = up_GetOptValues(obj);
				var cfg = { context: [o.argument.lnk, "tl", "bl"],
					buttons: [ { text:UP_ADDOPT_BUTTON_SUBMIT_TEXT, handler:up_DefaultHandleSubmit, isDefault:true },
						{ text:UP_BUTTON_CANCEL_TEXT, handler:up_DefaultHandleCancel } ]
				};
				if (upEnv.ua.ie && upEnv.ua.ie >= 8)
					cfg["underlay"] = "none";
				upAddOptDialog.cfg.applyConfig(cfg);
				upAddOptDialog.callback.argument = o.argument;
				if (upAddOptDialog.header) upAddOptDialog.header.style.width = "auto";
				if (upAddOptDialog.body) upAddOptDialog.body.style.width = "auto";
				if (upAddOptDialog.footer) upAddOptDialog.footer.style.width = "auto";
				upAddOptDialog.setBody(o.responseText);
				upAddOptDialog.setHeader(o.argument.hdr);
				upAddOptDialog.render();
				upAddOptDialog.registerForm(); // make sure the form is registered (otherwise, the form is not registered in the first time)

				// set the filter field value
				if (ar.length == 1 && o.argument.ff != "" && upAddOptDialog.form && upAddOptDialog.form.elements[o.argument.ff])
					up_SelectOpt(upAddOptDialog.form.elements[o.argument.ff], ar);
				upAddOptDialog.show();
				up_ExecScript(o.responseText, o.argument.el);
			}
		},
		failure: function(oResponse) {
		},
		scope: this,
		argument: oArg
	}
	upConnect.asyncRequest("get", oArg.url, f, null);
}

// Auto fill text boxes by AJAX
function up_AjaxAutoFill(obj) {
	if (upLang.isString(obj))
		obj = up_GetElements(obj);
	var ar = up_GetOptValues(obj);
	var id = up_GetId(obj);
	var sf = document.getElementById("sf_" + id);
	if (ar.length < 1 || ar[0] == "" || !sf || sf.value == "")
		return;
	var ds = new upUtil.XHRDataSource(UP_LOOKUP_FILE_NAME);
	ds.responseSchema.recordDelim = UP_RECORD_DELIMITER;
	ds.responseSchema.fieldDelim = UP_FIELD_DELIMITER;
	ds.responseType = upUtil.DataSourceBase.TYPE_TEXT;
	ds.maxCacheEntries = 0; // DO NOT CHANGE!
	var f = function(oRequest, oParsedResponse) {
		var aResults = oParsedResponse.results;
		var id = up_GetId(this);
		var dn = document.getElementById("ln_" + id);
		var destNames = (dn) ? dn.value : "";
		var dest_array = destNames.split(",");
		var destEl, asEl, dfv;
		for (var j=0; j < dest_array.length; j++) {
			destEl = up_GetElements(dest_array[j]);
			if (destEl && j < aResults[0].length) {
				dfv = aResults[0][j];
				if (destEl.options || destEl.length) {
					up_SelectOpt(destEl, [dfv]); // P802
				} else if (destEl.type == "hidden") {
					asEl = up_GetElements("sv_" + dest_array[j]);
					if (asEl && asEl.value) {
						destEl.value = ar[0];
						asEl.value = dfv;
					} else {
						destEl.value = dfv;
					}
				} else if (destEl.type == "textarea") {
					destEl.value = dfv;
					if (typeof up_UpdateDHTMLEditor == "function")
						up_UpdateDHTMLEditor(dest_array[j]);
				} else {
					destEl.value = dfv;
				}
			}
		}
	}
	var sQuery = "?q=" + encodeURIComponent(ar[0]) + "&s=" + sf.value;
	ds.sendRequest(sQuery, f, obj);
}

// init tooltip div
function up_InitTooltipDiv() {
	upTooltipDiv = new upWidget.Panel("upTooltipDiv", { context:null, visible:false, zIndex:11000, draggable:false, close:false });
	upTooltipDiv.render();
}

// show tooltip div
// wd = width (px)
function up_ShowTooltip(obj, el, wd) {
	el = upDom.get(el);
	if (typeof(upTooltipDiv) == "undefined" || !el || !el.innerHTML || up_RemoveSpaces(el.innerHTML) == "")
		return;
	if (up_TooltipTimer)
		clearTimeout(up_TooltipTimer);
	var cfg = {context:[obj,"tl","tr"], visible:false, constraintoviewport:true, preventcontextoverlap:true};
	wd = parseInt(wd);
	if (upLang.isNumber(wd) && (wd > 0)) {
		cfg["width"] = wd + "px";
	} else {
		cfg["width"] = "";
	}
	upTooltipDiv.cfg.applyConfig(cfg, true);
	upTooltipDiv.setBody("<div>" + el.innerHTML + "</div>");
	upTooltipDiv.render();
	upTooltipDiv.show();
}

// hide tooltip div
function up_HideTooltip() {
	if (typeof(up_TooltipTimer) != "undefined")
		clearTimeout(up_TooltipTimer);
	if (typeof(upTooltipDiv) != "undefined")
		upTooltipDiv.hide();
}

// show title 
// wd = width (px)
function up_ShowTitle(obj, html, wd) {
	if (typeof(upTooltipDiv) == "undefined" || up_RemoveSpaces(html) == "")
		return;
	if (up_TooltipTimer)
		clearTimeout(up_TooltipTimer);
	var cfg = {context:[obj,"tl","tr"], visible:false, constraintoviewport:true, preventcontextoverlap:true};
	wd = parseInt(wd);
	if (upLang.isNumber(wd) && (wd > 0)) {
		cfg["width"] = wd + "px";
	} else {
		cfg["width"] = "";
	}
	upTooltipDiv.cfg.applyConfig(cfg, true);
	upTooltipDiv.setBody("<div>" + html + "</div>");
	upTooltipDiv.render();
	upTooltipDiv.show();
}

// Show dialog for email sending
// argument object members:
// lnk - email link id
// hdr - dialog header
// url - URL of the email script
// f - form
// key - key as object
function up_EmailDialogShow(oArg) {
	if (!upEmailDialog)
		return;
	if (oArg.sel && !up_KeySelected(oArg.f)) {
		alert(upLanguage.Phrase("NoRecordSelected"));
		return;
	}
	if (upEmailDialog.cfg.getProperty("visible"))
		upEmailDialog.hide();
	var cfg = { context: [oArg.lnk, "tl", "bl"], postmethod: "form",
		buttons: [ { text:UP_EMAIL_EXPORT_BUTTON_SUBMIT_TEXT, handler:up_DefaultHandleSubmit, isDefault:true },
			{ text:UP_BUTTON_CANCEL_TEXT, handler:up_DefaultHandleCancel } ]
	};
	if (upEnv.ua.ie && upEnv.ua.ie >= 8)
		cfg["underlay"] = "none";
	upEmailDialog.cfg.applyConfig(cfg);
	upEmailDialog.callback.argument = oArg;
	if (upEmailDialog.header) upEmailDialog.header.style.width = "auto";
	if (upEmailDialog.body) upEmailDialog.body.style.width = "auto";
	if (upEmailDialog.footer) upEmailDialog.footer.style.width = "auto";
	upEmailDialog.setHeader(oArg.hdr);
	upEmailDialog.setBody(upEmailDialog._body);
	upEmailDialog.render();
	upEmailDialog.registerForm(); // make sure the form is registered (otherwise, the form is not registered in the first time)

    // if export selected
	var frm = oArg.f;
	if (frm) {
		var ar = upDom.getElementsBy(function(node){return node.type=="checkbox"&&node.name=="key_m[]"&&node.checked}, "INPUT", frm);
		var cnt = ar.length;
		var el;
		if (oArg.sel) {
			for (var i=0; i<cnt; i++) {
				el = document.createElement("INPUT");
				el.setAttribute("id","key_m[]");
				el.setAttribute("name","key_m[]");
				el.type = "hidden";
				el.value = ar[i].value;
				upEmailDialog.form.appendChild(el);
			}
		}
	}
	var key = oArg.key;
	if (key) {
		for (n in key) {
			el = document.createElement("INPUT");
			el.setAttribute("id", n);
			el.setAttribute("name", n);
			el.type = "hidden";
			el.value = key[n];
			upEmailDialog.form.appendChild(el);
		}
	}

  //alert(upEmailDialog.form.innerHTML);
	upEmailDialog.show();
}
up_URL = function(url) {
	this.scheme = null;
	this.host = null;
	this.port = null;
	this.path = null;
	this.args = {};
	this.anchor = null;
	if (url) {
		this.set(url);
	} else {
		this.set(window.location.href);
	}
}

// parses the current window.location and returns a up_URL object
up_URL.thisURL = function() {
	return new up_URL(window.location.href);
}
up_URL.prototype = new Object();

// parses an URL
up_URL.prototype.set = function(url) {
	var p;
	if (p = this.parseURL(url)) {
		this.scheme = p['scheme'];
		this.host = p['host'];
		this.port = p['port'];
		this.path = p['path'];
		this.args = this.parseArgs(p['args']);
		this.anchor = p['anchor'];
	}
}

// remove a specified argument
up_URL.prototype.removeArg = function(k) {
	if (k && String(k.constructor) == String(Array)) {
		var t = this.args;
		for (var i = 0; i < k.length - 1; i++) {
			if (typeof t[k[i]] != 'undefined') {
				t = t[k[i]];
			} else {
				return false;
			}
		}
		delete t[k[k.length - 1]];
		return true;
	} else if (typeof this.args[k] != 'undefined') {
		delete this.args[k];
		return true;
	}
	return false;
}

// add an argument with specified value
up_URL.prototype.addArg = function(k, v, o) {
	if (k && String(k.constructor) == String(Array)) {
		var t = this.args;
		for (var i = 0; i < k.length - 1; i++) {
			if (typeof t[k[i]] == 'undefined') t[k[i]] = {};
			t = t[k[i]];
		}
		if (o || typeof t[k[k.length - 1]] == 'undefined') t[k[k.length - 1]] = v;
	} else if (o || typeof this.args[k] == 'undefined') {
		this.args[k] = v;
		return true;
	}
	return false;
}

// parses the specified URL and returns an object
up_URL.prototype.parseURL = function(url) {
	var p = {}, m;
	if (m = url.match(/((https?):\/\/)?([^\/:]+)?(:([0-9]+))?([^\?#]+)?(\?([^#]+))?(#(.+))?/)) {
		p['scheme'] = (m[2] ? m[2] : 'http');
		p['host'] = (m[3] ? m[3] : window.location.host);
		p['port'] = (m[5] ? m[5] : null);
		p['path'] = (m[6] ? m[6] : null);
		p['args'] = (m[8] ? m[8] : null);
		p['anchor'] = (m[10] ? m[10] : null);
		if (!m[2] && !m[5] && !m[6] && m[3]) { // input is relative URL
			p['path'] = p['host'];
			p['host'] = null;
		}
		return p;
	}
	return false;
}

// parses a query string and returns an object
up_URL.prototype.parseArgs = function(s) {
	var a = {};
	if (s && s.length) {
		var kp, kv;
		var p;
		if ((kp = s.split('&')) && kp.length) {
			for (var i = 0; i < kp.length; i++) {
				if ((kv = kp[i].split('=')) && kv.length == 2) {
					if (p = kv[0].split(/(\[|\]\[|\])/)) {
						for (var z = 0; z < p.length; z++) {
							if (p[z] == ']' || p[z] == '[' || p[z] == '][') {
								p.splice(z, 1);
							}
						}
						var t = a;
						for (var o = 0; o < p.length - 1; o++) {
							if (typeof t[p[o]] == 'undefined') t[p[o]] = {};
							t = t[p[o]];
						}
						t[p[p.length - 1]] = kv[1];
					} else {
						a[kv[0]] = kv[1];
					}
				}
			}
		}
	}
	return a;
}

// takes an object and returns a query string
up_URL.prototype.toArgs = function(a, p) {
	if (arguments.length < 2) p = '';
	if (a && typeof a == 'object') {
		var s = '';
		for (i in a) {
			if (typeof a[i] != 'function') {
				if (s.length) s += '&';
				if (typeof a[i] == 'object') {
					var k = (p.length ? p + '[' + i + ']' : i);
					s += this.toArgs(a[i], k);
				} else {
					s += p + (p.length && i != '' ? '[' : '') + i + (p.length && i != '' ? ']' : '') + '=' + a[i];
				}
			}
		}
		return s;
	}
	return '';
}

// returns string containing the absolute URL
up_URL.prototype.toAbsolute = function() {
	var s = '';
	if (this.scheme != null) s += this.scheme + '://';
	if (this.host != null) s += this.host;
	if (this.port != null) s += ':' + this.port;
	s += this.toRelative();
	return s;
}

// returns a string containing the relative URL
up_URL.prototype.toRelative = function() {
	var s = '';
	if (this.path != null) s += this.path;
	var a = this.toArgs(this.args);
	if (a.length) s += '?' + a;
	if (this.anchor != null) s += '#' + this.anchor;
	return s;
}

// determine whether the host matches the current host
up_URL.prototype.isHost = function() {
	var u = up_URL.thisURL();
	return (this.host == null || this.host == u.host ? true : false);
}

// returns URL
up_URL.prototype.toString = function() {
	return (this.isHost() ? this.toRelative() : this.toAbsolute());
}

// Validators
// Check US Date format (mm/dd/yyyy)
function up_CheckUSDate(object_value) {
	return up_CheckDateEx(object_value, "us", UP_DATE_SEPARATOR);
}

// Check US Date format (mm/dd/yy)
function up_CheckShortUSDate(object_value) {
	return up_CheckDateEx(object_value, "usshort", UP_DATE_SEPARATOR);
}

// Check Date format (yyyy/mm/dd)
function up_CheckDate(object_value) {
	return up_CheckDateEx(object_value, "std", UP_DATE_SEPARATOR);
}

// Check Date format (yy/mm/dd)
function up_CheckShortDate(object_value) {
	return up_CheckDateEx(object_value, "stdshort", UP_DATE_SEPARATOR);
}

// Check Euro Date format (dd/mm/yyyy)
function up_CheckEuroDate(object_value) {
	return up_CheckDateEx(object_value, "euro", UP_DATE_SEPARATOR);
}

// Check Euro Date format (dd/mm/yy)
function up_CheckShortEuroDate(object_value) {
	return up_CheckDateEx(object_value, "euroshort", UP_DATE_SEPARATOR);
}

// Check date format
// format: std/stdshort/us/usshort/euro/euroshort
function up_CheckDateEx(value, format, sep) {
	if (value == null || value.length == "")
		return true;
	while (value.indexOf("  ") > -1)
		value = value.replace(/  /g, " ");
	value = value.replace(/^\s*|\s*$/g, "");
	var arDT = value.split(" ");
	if (arDT.length > 0) {
		var re, sYear, sMonth, sDay;
		re = /^([0-9]{4})-([0][1-9]|[1][0-2])-([0][1-9]|[1|2][0-9]|[3][0|1])$/;
		if (ar = re.exec(arDT[0])) {
			sYear = ar[1];
			sMonth = ar[2];
			sDay = ar[3];
		} else {
			var wrksep = "\\" + sep;
			switch (format) {
				case "std":
					re = new RegExp("^([0-9]{4})" + wrksep + "([0]?[1-9]|[1][0-2])" + wrksep + "([0]?[1-9]|[1|2][0-9]|[3][0|1])$");
					break;
				case "stdshort":
					re = new RegExp("^([0-9]{2})" + wrksep + "([0]?[1-9]|[1][0-2])" + wrksep + "([0]?[1-9]|[1|2][0-9]|[3][0|1])$");
					break;
				case "us":
					re = new RegExp("^([0]?[1-9]|[1][0-2])" + wrksep + "([0]?[1-9]|[1|2][0-9]|[3][0|1])" + wrksep + "([0-9]{4})$");
					break;
				case "usshort":
					re = new RegExp("^([0]?[1-9]|[1][0-2])" + wrksep + "([0]?[1-9]|[1|2][0-9]|[3][0|1])" + wrksep + "([0-9]{2})$");
					break;
				case "euro":
					re = new RegExp("^([0]?[1-9]|[1|2][0-9]|[3][0|1])" + wrksep + "([0]?[1-9]|[1][0-2])" + wrksep + "([0-9]{4})$");
					break;
				case "euroshort":
					re = new RegExp("^([0]?[1-9]|[1|2][0-9]|[3][0|1])" + wrksep + "([0]?[1-9]|[1][0-2])" + wrksep + "([0-9]{2})$");
					break;
			}
			if (!re.test(arDT[0]))
				return false;
		}
		var arD = arDT[0].split(sep);
		switch (format) {
			case "std":
			case "stdshort":
				sYear = up_UnformatYear(arD[0]);
				sMonth = arD[1];
				sDay = arD[2];
				break;
			case "us":
			case "usshort":
				sYear = up_UnformatYear(arD[2]);
				sMonth = arD[0];
				sDay = arD[1];
				break;
			case "euro":
			case "euroshort":
				sYear = up_UnformatYear(arD[2]);
				sMonth = arD[1];
				sDay = arD[0];
				break;
		}
		if (!up_CheckDay(sYear, sMonth, sDay))
			return false;
	}
	if (arDT.length > 1 && !up_CheckTime(arDT[1]))
		return false;
	return true;
}

// Unformat 2 digit year to 4 digit year
function up_UnformatYear(yr) {
	if (yr.length == 2) {
		if (yr > UP_UNFORMAT_YEAR)
			return "19" + yr;
		else
			return "20" + yr;
	} else {
		return yr;
	}
}

// Check day
function up_CheckDay(checkYear, checkMonth, checkDay) {
	maxDay = 31;
	if (checkMonth == 4 || checkMonth == 6 ||	checkMonth == 9 || checkMonth == 11) {
		maxDay = 30;
	} else if (checkMonth == 2)	{
		if (checkYear % 4 > 0)
			maxDay =28;
		else if (checkYear % 100 == 0 && checkYear % 400 > 0)
			maxDay = 28;
		else
			maxDay = 29;
	}
	return up_CheckRange(checkDay, 1, maxDay);
}

// Check integer
function up_CheckInteger(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	var decimal_format = ".";
	var check_char;
	check_char = object_value.indexOf(decimal_format);
	if (check_char < 1)
		return up_CheckNumber(object_value);
	else
		return false;
}

// Check number range
function up_NumberRange(object_value, min_value, max_value) {
	if (min_value != null) {
		if (object_value < min_value)
			return false;
	}
	if (max_value != null) {
		if (object_value > max_value)
			return false;
	}
	return true;
}

// Check number
function up_CheckNumber(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	var start_format = " .+-0123456789";
	var number_format = " .0123456789";
	var check_char;
	var decimal = false;
	var trailing_blank = false;
	var digits = false;
	check_char = start_format.indexOf(object_value.charAt(0));
	if (check_char == 1)
		decimal = true;
	else if (check_char < 1)
		return false;
	for (var i = 1; i < object_value.length; i++)	{
		check_char = number_format.indexOf(object_value.charAt(i))
		if (check_char < 0) {
			return false;
		} else if (check_char == 1)	{
			if (decimal)
				return false;
			else
				decimal = true;
		} else if (check_char == 0) {
			if (decimal || digits)	
			trailing_blank = true;
		}	else if (trailing_blank) { 
			return false;
		} else {
			digits = true;
		}
	}	
	return true;
}

// Check range
function up_CheckRange(object_value, min_value, max_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	if (!up_CheckNumber(object_value))
		return false;
	else
		return (up_NumberRange((eval(object_value)), min_value, max_value));
	return true;
}

// Check time
function up_CheckTime(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	isplit = object_value.indexOf(':');
	if (isplit == -1 || isplit == object_value.length)
		return false;
	sHour = object_value.substring(0, isplit);
	iminute = object_value.indexOf(':', isplit + 1);
	if (iminute == -1 || iminute == object_value.length)
		sMin = object_value.substring((sHour.length + 1));
	else
		sMin = object_value.substring((sHour.length + 1), iminute);
	if (!up_CheckInteger(sHour))
		return false;
	else if (!up_CheckRange(sHour, 0, 23))
		return false;
	if (!up_CheckInteger(sMin))
		return false;
	else if (!up_CheckRange(sMin, 0, 59))
		return false;
	if (iminute != -1) {
		sSec = object_value.substring(iminute + 1);		
		if (!up_CheckInteger(sSec))
			return false;
		else if (!up_CheckRange(sSec, 0, 59))
			return false;	
	}
	return true;
}

// Check phone
function up_CheckPhone(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	if (object_value.length != 12)
		return false;
	if (!up_CheckNumber(object_value.substring(0,3)))
		return false;
	else if (!up_NumberRange((eval(object_value.substring(0,3))), 100, 1000))
		return false;
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false
	if (!up_CheckNumber(object_value.substring(4,7)))
		return false;
	else if (!up_NumberRange((eval(object_value.substring(4,7))), 100, 1000))
		return false;
	if (object_value.charAt(7) != "-" && object_value.charAt(7) != " ")
		return false;
	if (object_value.charAt(8) == "-" || object_value.charAt(8) == "+")
		return false;
	else
		return (up_CheckInteger(object_value.substring(8,12)));
}

// Check zip
function up_CheckZip(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	if (object_value.length != 5 && object_value.length != 10)
		return false;
	if (object_value.charAt(0) == "-" || object_value.charAt(0) == "+")
		return false;
	if (!up_CheckInteger(object_value.substring(0,5)))
		return false;
	if (object_value.length == 5)
		return true;
	if (object_value.charAt(5) != "-" && object_value.charAt(5) != " ")
		return false;
	if (object_value.charAt(6) == "-" || object_value.charAt(6) == "+")
		return false;
	return (up_CheckInteger(object_value.substring(6,10)));
}

// Check credit card
function up_CheckCreditCard(object_value) {
	var white_space = " -";
	var creditcard_string = "";
	var check_char;
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			creditcard_string += object_value.substring(i, (i + 1));
	}	
	if (creditcard_string.length == 0)
		return false;	 
	if (creditcard_string.charAt(0) == "+")
		return false;
	if (!up_CheckInteger(creditcard_string))
		return false;
	var doubledigit = creditcard_string.length % 2 == 1 ? false : true;
	var checkdigit = 0;
	var tempdigit;
	for (var i = 0; i < creditcard_string.length; i++) {
		tempdigit = eval(creditcard_string.charAt(i));		
		if (doubledigit) {
			tempdigit *= 2;
			checkdigit += (tempdigit % 10);			
			if ((tempdigit / 10) >= 1.0)
				checkdigit++;			
			doubledigit = false;
		}	else {
			checkdigit += tempdigit;
			doubledigit = true;
		}
	}
	return (checkdigit % 10) == 0 ? true : false;
}

// Check social security number
function up_CheckSSC(object_value) {
	var white_space = " -+.";
	var ssc_string="";
	var check_char;
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	if (object_value.length != 11)
		return false;
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false;
	if (object_value.charAt(6) != "-" && object_value.charAt(6) != " ")
		return false;
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			ssc_string += object_value.substring(i, (i + 1));
	}	
	if (ssc_string.length != 9)
		return false;	 
	if (!up_CheckInteger(ssc_string))
		return false;
	return true;
}

// Check emails
function up_CheckEmailList(object_value, email_cnt) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	var emailList = object_value.replace(/,/g,";");
	var arEmails = emailList.split(";");
	if (arEmails.length > email_cnt && email_cnt > 0)
		return false;
	for (var i = 0; i < arEmails.length; i++) {
		if (!up_CheckEmail(arEmails[i]))
			return false;
	}
	return true;
}

// Check email
function up_CheckEmail(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	object_value = object_value.replace(/^\s*|\s*$/g, "");
	var re = new RegExp("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$", "i");
	return re.test(object_value);
}

// Check GUID {xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx}	
function up_CheckGUID(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	object_value = object_value.replace(/^\s*|\s*$/g, "");
	var re = new RegExp("^(\{{1}([0-9a-fA-F]){8}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){12}\}{1})$");
	return re.test(object_value);
}

// Check file extension
function up_CheckFileType(object_value) {
	if (object_value == null)
		return true;
	if (object_value.length == 0) 
		return true;
	if (typeof UP_UPLOAD_ALLOWED_FILE_EXT == "undefined")
		return true;
	if (UP_UPLOAD_ALLOWED_FILE_EXT.replace(/^\s*|\s*$/g, "") == "")
		return true;	
	var fileTypes = UP_UPLOAD_ALLOWED_FILE_EXT.split(",");
	var ext = object_value.substring(object_value.lastIndexOf(".")+1, object_value.length).toLowerCase(); 
	for (var i=0; i < fileTypes.length; i++) { 
		if (fileTypes[i] == ext) 
			return true; 
	} 
	return false; 
}

// Check by regular expression
function up_CheckByRegEx(object_value, pattern) {
	if (object_value == null)
		return true;
	if (object_value.length == 0)
		return true;
	return (object_value.match(pattern)) ? true : false;
}
