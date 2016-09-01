<?php

/**
 * UPPBB2014 Common classes and functions
 * University of the Philippines (C) 2014 UP Budget Office
*/
if (!function_exists("G")) {

	function &G($name) {
		return $GLOBALS[$name];
	}
}

// Get current page object
function &CurrentPage() {
	return $GLOBALS["Page"];
}

// Get current main table object
function &CurrentTable() {
	return $GLOBALS["Table"];
}

/**
 * Export document class
 */

class cExportDocument {
	var $Table;
	var $Text;
	var $Line = "";
	var $Header = "";
	var $Style = "h"; // "v"(Vertical) or "h"(Horizontal)
	var $Horizontal = TRUE; // Horizontal
	var $FldCnt;

	// Constructor
	function cExportDocument(&$tbl, $style) {
		$this->Table = $tbl;
		$this->ChangeStyle($style);
	}

	function ChangeStyle($style) {
		if (strtolower($style) == "v" || strtolower($style) == "h")
			$this->Style = strtolower($style);
		$this->Horizontal = ($this->Table->Export <> "xml" && ($this->Style <> "v" || $this->Table->Export == "csv"));
	}

	// Table Header
	function ExportTableHeader() {
		switch ($this->Table->Export) {
			case "email":
			case "html":
			case "word":
			case "excel":
				$this->Text .= "<table class=\"upExportTable\">";
				break;
			case "pdf":
				$this->Text .= "<table cellspacing=\"0\" class=\"upTablePdf upTablePdfBorder\">\r\n";
				break;
			case "csv":
				$this->Text .= "";
		}
	}

	// Field Caption
	function ExportCaption(&$fld) {
		$this->ExportValueEx($fld, $fld->ExportCaption());
	}

	// Field value
	function ExportValue(&$fld) {
		$this->ExportValueEx($fld, $fld->ExportValue($this->Table->Export, $this->Table->ExportOriginalValue));
	}

	// Field aggregate
	function ExportAggregate(&$fld, $type) {
		if ($this->Horizontal) {
			global $Language;
			$val = "";
			if (in_array($type, array("TOTAL", "COUNT", "AVERAGE")))
				$val = $Language->Phrase($type) . ": " . $fld->ExportValue($this->Table->Export, $this->Table->ExportOriginalValue);
			$this->ExportValueEx($fld, $val);
		}
	}

	// Export a value (caption, field value, or aggregate)
	function ExportValueEx(&$fld, $val, $usestyle = TRUE) {
		switch ($this->Table->Export) {
			case "html":
			case "email":
			case "word":
			case "excel":
				$this->Text .= "<td" . (($usestyle && UP_EXPORT_CSS_STYLES) ? $fld->CellStyles() : "") . ">";
				if ($this->Table->Export == "excel" && $fld->FldDataType == UP_DATATYPE_STRING && is_numeric($val)) {
					$this->Text .= "=\"" . strval($val) . "\"";
				} else {
					$this->Text .= strval($val);
				}
				$this->Text .= "</td>";
				break;
			case "csv":
				if ($this->Line <> "")
					$this->Line .= ",";
				$this->Line .= "\"" . str_replace("\"", "\"\"", strval($val)) . "\"";
				break;
			case "pdf":
				$wrkval = strval($val);
				$wrkval = "<td" . (($usestyle && UP_EXPORT_CSS_STYLES) ? $fld->CellStyles() : "") . ">" . $wrkval . "</td>\r\n";
				$this->Line .= $wrkval;
				$this->Text .= $wrkval;
				break;
		}
	}

	// Begin a row
	function BeginExportRow($rowcnt = 0, $usestyle = TRUE) {
		$this->FldCnt = 0;
		if ($this->Horizontal) {
			switch ($this->Table->Export) {
				case "html":
				case "email":
				case "word":
				case "excel":
					if ($rowcnt == -1) {
						$this->Table->CssClass = "upExportTableFooter";
					} elseif ($rowcnt == 0) {
						$this->Table->CssClass = "upExportTableHeader";
					} else {
						$this->Table->CssClass = (($rowcnt % 2) == 1) ? "upExportTableRow" : "upExportTableAltRow";
					}
					$this->Text .= "<tr" . (($usestyle && UP_EXPORT_CSS_STYLES) ? $this->Table->RowStyles() : "") . ">";
					break;
				case "csv":
					$this->Line = "";
					break;
				case "pdf":
					if ($rowcnt == -1)
						$this->Table->CssClass = "upTablePdfFooter";
					elseif ($rowcnt == 0)
						$this->Table->CssClass = "upTablePdfHeader";
					else
						$this->Table->CssClass = (($rowcnt % 2) == 1) ? "upTableRow" : "upTableAltRow";
					$this->Line = "<tr" . (($usestyle && UP_EXPORT_CSS_STYLES) ? $this->Table->RowStyles() : "") . ">";
					$this->Text .= $this->Line;
					break;
			}
		}
	}

	// End a row
	function EndExportRow($header = FALSE) {
		if ($this->Horizontal) {
			switch ($this->Table->Export) {
				case "html":
				case "email":
				case "word":
				case "excel":
					$this->Text .= "</tr>";
					break;
				case "csv":
					$this->Line .= "\r\n";
					$this->Text .= $this->Line;
					break;
				case "pdf":
					$this->Line .= "</tr>";
					$this->Text .= "</tr>";
					if ($header) $this->Header = $this->Line;
					break;
			}
		}
	}

	// Page break
	function ExportPageBreak() {
		if ($this->Horizontal) {
			switch ($this->Table->Export) {
				case "pdf":
					$this->Text .= "</table>\r\n"; // end current table
					$this->Text .= "<p style=\"page-break-after:always;\">\r\n"; // page break
					$this->Text .= "<table class=\"upTablePdf upTablePdfBorder\">\r\n"; // new page header
					$this->Text .= $this->Header;
					break;
			}
		}
	}

	// Empty line
	function ExportEmptyLine() {
			switch ($this->Table->Export) {
				case "html":
				case "email":
				case "word":
				case "excel":
				case "pdf":
					$this->Text .= "<br> ";
					break;
			}
	}

	// Export a field
	function ExportField(&$fld) {
		if ($this->Horizontal) {
			$this->ExportValue($fld);
		} else { // Vertical, export as a row
			$this->FldCnt++;
			switch ($this->Table->Export) {
				case "html":
				case "email":
				case "word":
				case "excel":
					$this->Text .= "<tr class=\"" . (($this->FldCnt % 2 == 1) ? "upExportTableRow" : "upExportTableAltRow") . "\">" .
						"<td class=\"upTableHeader\">" . $fld->ExportCaption() . "</td>";
					break;
				case "pdf":
					$fld->CellCssClass = ($this->FldCnt % 2 == 1) ? "upTableRow" : "upTableAltRow";
					$this->Text .= "<tr><td class=\"upTablePdfHeader\">" . $fld->ExportCaption() . "</td>";
					break;
			}
			$this->Text .= "<td" . ((UP_EXPORT_CSS_STYLES) ? $fld->CellStyles() : "") . ">" .
				$fld->ExportValue($this->Table->Export, $this->Table->ExportOriginalValue) . "</td></tr>";
		}
	}

	// Table Footer
	function ExportTableFooter() {
		switch ($this->Table->Export) {
			case "html":
			case "email":
			case "word":
			case "excel":
			case "pdf":
				$this->Text .= "</table>";
				break;
		}
	}

	function ExportHeaderAndFooter() {
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		$cssfile = ($this->Table->Export == "pdf") ? UP_PDF_STYLESHEET_FILENAME : UP_PROJECT_STYLESHEET_FILENAME;
		switch ($this->Table->Export) {
			case "email":
			case "html":
			case "excel":
			case "word":
			case "pdf":
				$header = "<html><head>\r\n";
				if (UP_ENCODING == "UTF-8") $header .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\r\n";
				if (UP_EXPORT_CSS_STYLES && $cssfile <> "")
					$header .= "<style type=\"text/css\">" . file_get_contents($cssfile) . "</style>\r\n";
				$header .= "</" . "head>\r\n<body>\r\n";
				$this->Text = $header . $this->Text . "</body></html>";
				break;
		}
	}
}

/**
 * QueryString class
 */

class cQueryString {
	var $values = array();
	var $Count;

	function cQueryString() {
		$ar = explode("&", up_ServerVar("QUERY_STRING"));
		foreach ($ar as $p) {
			$arp = explode("=", $p);
			if (count($arp) == 2) $this->values[urldecode($arp[0])] = $arp[1];
		}
		$this->Count = count($this->values);
	}

	function getValue($name) {
		return (array_key_exists($name, $this->values)) ? $this->values[$name] : "";
	}

	function getUrlDecodedValue($name) {
		return urldecode($this->getValue($name));
	}

	function getRawUrlDecodedValue($name) {
		return rawurldecode($this->getValue($name));
	}

	function getConvertedValue($name) {
		return up_ConvertFromUtf8($this->getRawUrlDecodedValue($name));
	}
}

/**
 * Email class
 */

class cEmail {

	// Class properties
	var $Sender = ""; // Sender
	var $Recipient = ""; // Recipient
	var $Cc = ""; // Cc
	var $Bcc = ""; // Bcc
	var $Subject = ""; // Subject
	var $Format = ""; // Format
	var $Content = ""; // Content
	var $Charset = ""; // Charset
	var $SendErrDescription; // Send error description

	// Method to load email from template
	function Load($fn) {
		$fn = up_ScriptFolder() . UP_PATH_DELIMITER . $fn;
		$sWrk = file_get_contents($fn); // Load text file content
		if ($sWrk <> "") {

			// Locate Header & Mail Content
			if (UP_IS_WINDOWS) {
				$i = strpos($sWrk, "\r\n\r\n");
			} else {
				$i = strpos($sWrk, "\n\n");
				if ($i === FALSE) $i = strpos($sWrk, "\r\n\r\n");
			}
			if ($i > 0) {
				$sHeader = substr($sWrk, 0, $i);
				$this->Content = trim(substr($sWrk, $i, strlen($sWrk)));
				if (UP_IS_WINDOWS) {
					$arrHeader = explode("\r\n", $sHeader);
				} else {
					$arrHeader = explode("\n", $sHeader);
				}
				$cnt = count($arrHeader);
				for ($j = 0; $j < $cnt; $j++) {
					$i = strpos($arrHeader[$j], ":");
					if ($i > 0) {
						$sName = trim(substr($arrHeader[$j], 0, $i));
						$sValue = trim(substr($arrHeader[$j], $i+1, strlen($arrHeader[$j])));
						switch (strtolower($sName))
						{
							case "subject":
								$this->Subject = $sValue;
								break;
							case "from":
								$this->Sender = $sValue;
								break;
							case "to":
								$this->Recipient = $sValue;
								break;
							case "cc":
								$this->Cc = $sValue;
								break;
							case "bcc":
								$this->Bcc = $sValue;
								break;
							case "format":
								$this->Format = $sValue;
								break;
						}
					}
				}
			}
		}
	}

	// Method to replace sender
	function ReplaceSender($ASender) {
		$this->Sender = str_replace('<!--$From-->', $ASender, $this->Sender);
	}

	// Method to replace recipient
	function ReplaceRecipient($ARecipient) {
		$this->Recipient = str_replace('<!--$To-->', $ARecipient, $this->Recipient);
	}

	// Method to add Cc email
	function AddCc($ACc) {
		if ($ACc <> "") {
			if ($this->Cc <> "") $this->Cc .= ";";
			$this->Cc .= $ACc;
		}
	}

	// Method to add Bcc email
	function AddBcc($ABcc) {
		if ($ABcc <> "")  {
			if ($this->Bcc <> "") $this->Bcc .= ";";
			$this->Bcc .= $ABcc;
		}
	}

	// Method to replace subject
	function ReplaceSubject($ASubject) {
		$this->Subject = str_replace('<!--$Subject-->', $ASubject, $this->Subject);
	}

	// Method to replace content
	function ReplaceContent($Find, $ReplaceWith) {
		$this->Content = str_replace($Find, $ReplaceWith, $this->Content);
	}

	// Method to send email
	function Send() {
		global $gsEmailErrDesc;
		$result = up_SendEmail($this->Sender, $this->Recipient, $this->Cc, $this->Bcc,
			$this->Subject, $this->Content, $this->Format, $this->Charset);
		$this->SendErrDescription = $gsEmailErrDesc;
		return $result;
	}
}

/**
 * Pager item class
 */

class cPagerItem {
	var $Start;
	var $Text;
	var $Enabled;
}

/**
 * Numeric pager class
 */

class cNumericPager {
	var $Items = array();
	var $Count, $FromIndex, $ToIndex, $RecordCount, $PageSize, $Range;
	var $FirstButton, $PrevButton, $NextButton, $LastButton;
	var $ButtonCount = 0;
	var $Visible = TRUE;

	function cNumericPager($StartRec, $DisplayRecs, $TotalRecs, $RecRange)
	{
		$this->FirstButton = new cPagerItem;
		$this->PrevButton = new cPagerItem;
		$this->NextButton = new cPagerItem;
		$this->LastButton = new cPagerItem;
		$this->FromIndex = intval($StartRec);
		$this->PageSize = intval($DisplayRecs);
		$this->RecordCount = intval($TotalRecs);
		$this->Range = intval($RecRange);
		if ($this->PageSize == 0) return;
		if ($this->FromIndex > $this->RecordCount)
			$this->FromIndex = $this->RecordCount;
		$this->ToIndex = $this->FromIndex + $this->PageSize - 1;
		if ($this->ToIndex > $this->RecordCount)
			$this->ToIndex = $this->RecordCount;

		// setup
		$this->SetupNumericPager();

		// update button count
		if ($this->FirstButton->Enabled) $this->ButtonCount++;
		if ($this->PrevButton->Enabled) $this->ButtonCount++;
		if ($this->NextButton->Enabled) $this->ButtonCount++;
		if ($this->LastButton->Enabled) $this->ButtonCount++;
		$this->ButtonCount += count($this->Items);
  }

	// Add pager item
	function AddPagerItem($StartIndex, $Text, $Enabled)
	{
		$Item = new cPagerItem;
		$Item->Start = $StartIndex;
		$Item->Text = $Text;
		$Item->Enabled = $Enabled;
		$this->Items[] = $Item;
	}

	// Setup pager items
	function SetupNumericPager()
	{
		if ($this->RecordCount > $this->PageSize) {
			$Eof = ($this->RecordCount < ($this->FromIndex + $this->PageSize));
			$HasPrev = ($this->FromIndex > 1);

			// First Button
			$TempIndex = 1;
			$this->FirstButton->Start = $TempIndex;
			$this->FirstButton->Enabled = ($this->FromIndex > $TempIndex);

			// Prev Button
			$TempIndex = $this->FromIndex - $this->PageSize;
			if ($TempIndex < 1) $TempIndex = 1;
			$this->PrevButton->Start = $TempIndex;
			$this->PrevButton->Enabled = $HasPrev;

			// Page links
			if ($HasPrev || !$Eof) {
				$x = 1;
				$y = 1;
				$dx1 = intval(($this->FromIndex-1)/($this->PageSize*$this->Range))*$this->PageSize*$this->Range + 1;
				$dy1 = intval(($this->FromIndex-1)/($this->PageSize*$this->Range))*$this->Range + 1;
				if (($dx1+$this->PageSize*$this->Range-1) > $this->RecordCount) {
					$dx2 = intval($this->RecordCount/$this->PageSize)*$this->PageSize + 1;
					$dy2 = intval($this->RecordCount/$this->PageSize) + 1;
				} else {
					$dx2 = $dx1 + $this->PageSize*$this->Range - 1;
					$dy2 = $dy1 + $this->Range - 1;
				}
				while ($x <= $this->RecordCount) {
					if ($x >= $dx1 && $x <= $dx2) {
						$this->AddPagerItem($x, $y, $this->FromIndex<>$x);
						$x += $this->PageSize;
						$y++;
					} elseif ($x >= ($dx1-$this->PageSize*$this->Range) && $x <= ($dx2+$this->PageSize*$this->Range)) {
						if ($x+$this->Range*$this->PageSize < $this->RecordCount) {
							$this->AddPagerItem($x, $y . "-" . ($y+$this->Range-1), TRUE);
						} else {
							$ny = intval(($this->RecordCount-1)/$this->PageSize) + 1;
							if ($ny == $y) {
								$this->AddPagerItem($x, $y, TRUE);
							} else {
								$this->AddPagerItem($x, $y . "-" . $ny, TRUE);
							}
						}
						$x += $this->Range*$this->PageSize;
						$y += $this->Range;
					} else {
						$x += $this->Range*$this->PageSize;
						$y += $this->Range;
					}
				}
			}

			// Next Button
			$TempIndex = $this->FromIndex + $this->PageSize;
			$this->NextButton->Start = $TempIndex;
			$this->NextButton->Enabled = !$Eof;

			// Last Button
			$TempIndex = intval(($this->RecordCount-1)/$this->PageSize)*$this->PageSize + 1;
			$this->LastButton->Start = $TempIndex;
			$this->LastButton->Enabled = ($this->FromIndex < $TempIndex);
		}
	}
}

/**
 * PrevNext pager class
 */

class cPrevNextPager {
	var $FirstButton, $PrevButton, $NextButton, $LastButton;
	var $CurrentPage, $PageCount, $FromIndex, $ToIndex, $RecordCount;
	var $Visible = TRUE;

	function cPrevNextPager($StartRec, $DisplayRecs, $TotalRecs)
	{
		$this->FirstButton = new cPagerItem;
		$this->PrevButton = new cPagerItem;
		$this->NextButton = new cPagerItem;
		$this->LastButton = new cPagerItem;
		$this->FromIndex = intval($StartRec);
		$this->PageSize = intval($DisplayRecs);
		$this->RecordCount = intval($TotalRecs);
		if ($this->PageSize == 0) return;
		$this->CurrentPage = intval(($this->FromIndex-1)/$this->PageSize) + 1;
		$this->PageCount = intval(($this->RecordCount-1)/$this->PageSize) + 1;
		if ($this->FromIndex > $this->RecordCount)
			$this->FromIndex = $this->RecordCount;
		$this->ToIndex = $this->FromIndex + $this->PageSize - 1;
		if ($this->ToIndex > $this->RecordCount)
			$this->ToIndex = $this->RecordCount;

		// First Button
		$TempIndex = 1;
		$this->FirstButton->Start = $TempIndex;
		$this->FirstButton->Enabled = ($TempIndex <> $this->FromIndex);

		// Prev Button
		$TempIndex = $this->FromIndex - $this->PageSize;
		if ($TempIndex < 1) $TempIndex = 1;
		$this->PrevButton->Start = $TempIndex;
		$this->PrevButton->Enabled = ($TempIndex <> $this->FromIndex);

		// Next Button
		$TempIndex = $this->FromIndex + $this->PageSize;
		if ($TempIndex > $this->RecordCount)
			$TempIndex = $this->FromIndex;
		$this->NextButton->Start = $TempIndex;
		$this->NextButton->Enabled = ($TempIndex <> $this->FromIndex);

		// Last Button
		$TempIndex = intval(($this->RecordCount-1)/$this->PageSize)*$this->PageSize + 1;
		$this->LastButton->Start = $TempIndex;
		$this->LastButton->Enabled = ($TempIndex <> $this->FromIndex);
  }
}

/**
 * Field class
 */

class cField {
	var $TblName; // Table name
	var $TblVar; // Table variable name
	var $FldName; // Field name
	var $FldVar; // Field variable name
	var $FldExpression; // Field expression (used in SQL)
	var $FldIsVirtual; // Virtual field
	var $FldVirtualExpression; // Virtual field expression (used in ListSQL)
	var $FldForceSelection; // Autosuggest force selection
	var $FldDefaultErrMsg; // Default error message
	var $VirtualValue; // Virtual field value
	var $TooltipValue; // Field tooltip value
	var $TooltipWidth = 0; // Field tooltip width
	var $FldType; // Field type
	var $FldDataType; // UPPBB2014 Field type
	var $FldBlobType; // For Oracle only
	var $FldViewTag; // View Tag
	var $FldIsDetailKey = FALSE; // Field is detail key
	var $AdvancedSearch; // AdvancedSearch Object
	var $Upload; // Upload Object
	var $FldDateTimeFormat; // Date time format
	var $CssStyle; // CSS style
	var $CssClass; // CSS class
	var $ImageAlt; // Image alt
	var $ImageWidth = 0; // Image width
	var $ImageHeight = 0; // Image height
	var $ImageResize = FALSE; // Image resize
	var $ResizeQuality = 100; // Resize quality
	var $ViewCustomAttributes; // View custom attributes
	var $EditCustomAttributes; // Edit custom attributes
	var $LinkCustomAttributes; // Link custom attributes
	var $Count; // Count
	var $Total; // Total
	var $TrueValue = '1';
	var $FalseValue = '0';
	var $Visible = TRUE; // Visible
	var $Disabled; // Disabled
	var $ReadOnly = FALSE; // Read only
	var $TruncateMemoRemoveHtml; // Remove HTML from memo field
	var $CustomMsg = ""; // Custom message
	var $CellCssClass = ""; // Cell CSS class
	var $CellCssStyle = ""; // Cell CSS style
	var $CellCustomAttributes = ""; // Cell custom attributes
	var $MultiUpdate; // Multi update
	var $OldValue; // Old Value
	var $ConfirmValue; // Confirm value
	var $CurrentValue; // Current value
	var $ViewValue; // View value
	var $EditValue; // Edit value
	var $EditValue2; // Edit value 2 (search)
	var $HrefValue; // Href value
	var $HrefValue2; // Href value 2 (confirm page upload control)
	var $FormValue; // Form value
	var $QueryStringValue; // QueryString value
	var $DbValue; // Database value
	var $Sortable = TRUE; // Sortable
	var $UploadPath = UP_UPLOAD_DEST_PATH; // Upload path
	var $CellAttrs = array(); // Cell custom attributes
	var $EditAttrs = array(); // Edit custom attributes
	var $ViewAttrs = array(); // View custom attributes
	var $LinkAttrs = array(); // Link custom attributes

	// Constructor
	function cField($tblvar, $tblname, $fldvar, $fldname, $fldexp, $fldtype, $flddtfmt, $upload, $fldvirtualexp, $fldvirtual, $forceselect, $fldviewtag="") {
		$this->TblVar = $tblvar;
		$this->TblName = $tblname;
		$this->FldVar = $fldvar;
		$this->FldName = $fldname;
		$this->FldExpression = $fldexp;
		$this->FldType = $fldtype;
		$this->FldDataType = up_FieldDataType($fldtype);
		$this->FldDateTimeFormat = $flddtfmt;
		$this->AdvancedSearch = new cAdvancedSearch();
		if ($upload)
			$this->Upload = new cUpload($this->TblVar, $this->FldVar);
		$this->FldVirtualExpression = $fldvirtualexp;
		$this->FldIsVirtual = $fldvirtual;
		$this->FldForceSelection = $forceselect;
		$this->FldViewTag = $fldviewtag;
	}

	// Field caption
	function FldCaption() {
		global $Language;
		return $Language->FieldPhrase($this->TblVar, substr($this->FldVar, 2), "FldCaption");
	}

	// Field title
	function FldTitle() {
		global $Language;
		return $Language->FieldPhrase($this->TblVar, substr($this->FldVar, 2), "FldTitle");
	}

	// Field image alt
	function FldAlt() {
		global $Language;
		return $Language->FieldPhrase($this->TblVar, substr($this->FldVar, 2), "FldAlt");
	}

	// Field error message
	function FldErrMsg() {
		global $Language;
		$err = $Language->FieldPhrase($this->TblVar, substr($this->FldVar, 2), "FldErrMsg");
		if ($err == "") $err = $this->FldDefaultErrMsg . " - " . $this->FldCaption();
		return $err;
	}

	// Field tag caption
	function FldTagCaption($i) {
		global $Language;
		return $Language->FieldPhrase($this->TblVar, substr($this->FldVar, 2), "FldTagCaption" . $i);
	}

	// Reset attributes for field object
	function ResetAttrs() {
		$this->CssStyle = "";
		$this->CssClass = "";
		$this->CellCssStyle = "";
		$this->CellCssClass = "";
		$this->CellAttrs = array();
		$this->EditAttrs = array();
		$this->ViewAttrs = array();
		$this->LinkAttrs = array();
	}

	// View Attributes
	function ViewAttributes() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->ViewAttrs["style"] <> "")
			$sStyle .= " " . $this->ViewAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->ViewAttrs["class"] <> "")
			$sClass .= " " . $this->ViewAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		if (trim($this->ImageAlt) <> "")
			$this->ViewAttrs["alt"] = trim($this->ImageAlt);
		if (intval($this->ImageWidth) > 0 && (!$this->ImageResize || ($this->ImageResize && intval($this->ImageHeight) <= 0)))
			$this->ViewAttrs["width"] = intval($this->ImageWidth);
		if (intval($this->ImageHeight) > 0 && (!$this->ImageResize || ($this->ImageResize && intval($this->ImageWidth) <= 0)))
			$this->ViewAttrs["height"] = intval($this->ImageHeight);
		foreach ($this->ViewAttrs as $k => $v) {
			if ($k <> "style" && $k <> "class" && trim($v) <> "")
				$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
		}
		if (trim($this->ViewCustomAttributes) <> "")
			$sAtt .= " " . trim($this->ViewCustomAttributes);
		return $sAtt;
	}

	// Edit attributes
	function EditAttributes() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->EditAttrs["style"] <> "")
			$sStyle .= " " . $this->EditAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->EditAttrs["class"] <> "")
			$sClass .= " " . $this->EditAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if ($sClass <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		if ($this->Disabled)
			$this->EditAttrs["disabled"] = "disabled";
		if ($this->ReadOnly)
			$this->EditAttrs["readonly"] = "readonly";
		foreach ($this->EditAttrs as $k => $v) {
			if ($k <> "style" && $k <> "class" && trim($v) <> "")
				$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
		}
		if (trim($this->EditCustomAttributes) <> "")
			$sAtt .= " " . trim($this->EditCustomAttributes);
		return $sAtt;
	}

	// Cell styles
	function CellStyles() {
		$sAtt = "";
		$sStyle = trim($this->CellCssStyle);
		if (@$this->CellAttrs["style"] <> "")
			$sStyle .= " " . $this->CellAttrs["style"];
		$sClass = trim($this->CellCssClass);
		if (@$this->CellAttrs["class"] <> "")
			$sClass .= " " . $this->CellAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		return $sAtt;
	}

	// Cell attributes
	function CellAttributes() {
		$sAtt = $this->CellStyles();
		foreach ($this->CellAttrs as $k => $v) {
			if ($k <> "style" && $k <> "class" && trim($v) <> "")
				$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
		}
		if (trim($this->CellCustomAttributes) <> "")
			$sAtt .= " " . trim($this->CellCustomAttributes);
		return $sAtt;
	}

	// Link attributes
	function LinkAttributes() {
		$sAtt = "";
		$sHref = trim($this->HrefValue);
		foreach ($this->LinkAttrs as $k => $v) {
			if (trim($v) <> "") {
				if ($k == "href")
					$sHref .= " " . $v;
				else
					$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
			}
		}
		if ($sHref <> "")
			$sAtt .= " href=\"" . trim($sHref) . "\"";
		if (trim($this->LinkCustomAttributes) <> "")
			$sAtt .= " " . trim($this->LinkCustomAttributes);
		return $sAtt;
	}

	// Sort
	function getSort() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TblVar . "_" . UP_TABLE_SORT . "_" . $this->FldVar];
	}

	function setSort($v) {
		if (@$_SESSION[UP_PROJECT_NAME . "_" . $this->TblVar . "_" . UP_TABLE_SORT . "_" . $this->FldVar] <> $v) {
			$_SESSION[UP_PROJECT_NAME . "_" . $this->TblVar . "_" . UP_TABLE_SORT . "_" . $this->FldVar] = $v;
		}
	}

	function ReverseSort() {
		return ($this->getSort() == "ASC") ? "DESC" : "ASC";
	}

	// Advanced search
	function UrlParameterName($name) {
		$fldparm = substr($this->FldVar, 2);
		if (strcasecmp($name, "SearchValue") == 0) {
			$fldparm = "x_" . $fldparm;
		} elseif (strcasecmp($name, "SearchOperator") == 0) {
			$fldparm = "z_" . $fldparm;
		} elseif (strcasecmp($name, "SearchCondition") == 0) {
			$fldparm = "v_" . $fldparm;
		} elseif (strcasecmp($name, "SearchValue2") == 0) {
			$fldparm = "y_" . $fldparm;
		} elseif (strcasecmp($name, "SearchOperator2") == 0) {
			$fldparm = "w_" . $fldparm;
		}
		return $fldparm;
	}

	function getAdvancedSearch($name) {
		$fldparm = UrlParameterName($name);
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fldparm];
	}

	function setAdvancedSearch($name, $v) {
		$fldparm = UrlParameterName($name);
		if (@$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fldparm] <> $v)
			$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fldparm] = $v;
	}

	// List view value
	function ListViewValue() {
		if ($this->FldDataType == UP_DATATYPE_XML) {
			return $this->ViewValue . "&nbsp;";
		} else {
			$value = trim(strval($this->ViewValue));
			if ($value <> "") {
				$value2 = trim(preg_replace('/<[^img][^>]*>/i', '', strval($value)));
				return ($value2 <> "") ? $this->ViewValue : "&nbsp;";
			} else {
				return "&nbsp;";
			}
		}
	}

	// Export caption
	function ExportCaption() {
		return (UP_EXPORT_FIELD_CAPTION) ? $this->FldCaption() : $this->FldName;
	}

	// Export value
	function ExportValue($Export, $Original) {
		$ExportValue = ($Original) ? $this->CurrentValue : $this->ViewValue;
		if ($Export == "xml" && is_null($ExportValue))
			$ExportValue = "<Null>";
		if ($Export == "pdf") {
			if ($this->FldViewTag == "IMAGE")  {
				if ($this->FldDataType == UP_DATATYPE_BLOB) {
					$wrkdata = $this->Upload->DbValue;
					if (!empty($wrkdata)) {
						if ($this->ImageResize) {
							$wrkwidth = $this->ImageWidth;
							$wrkheight = $this->ImageHeight;
							up_ResizeBinary($wrkdata, $wrkwidth, $wrkheight, $this->ResizeQuality);
						}
						$imagefn = up_TmpImage($wrkdata);
						if ($imagefn <> "")
							$ExportValue = "<img src=\"" . $imagefn . "\">";
					}
				} else {
					$wrkfile = $this->Upload->DbValue;
					if (empty($wrkfile)) $wrkfile = $this->CurrentValue;
					if (!empty($wrkfile)) {
						$imagefn = up_UploadPathEx(TRUE, $this->UploadPath) . $wrkfile;
						if ($this->ImageResize) {
							$wrkwidth = $this->ImageWidth;
							$wrkheight = $this->ImageHeight;
							$wrkdata = up_ResizeFileToBinary($imagefn, $wrkwidth, $wrkheight, $this->ResizeQuality);
							$imagefn = up_TmpImage($wrkdata);
						} else {
							$imagefn = up_TmpFile($imagefn);
						}
						if ($imagefn <> "")
							$ExportValue = "<img src=\"" . $imagefn . "\">";
					}
				}
			} else {
				$ExportValue = str_replace("<br>", "\r\n", $ExportValue);
				$ExportValue = strip_tags($ExportValue);
				$ExportValue = str_replace("\r\n", "<br>", $ExportValue);
			}
		}
		return $ExportValue;
	}

	// Form value
	function setFormValue($v) {
		$this->FormValue = up_StripSlashes($v);
		if (is_array($this->FormValue))
			$this->FormValue = implode(",", $this->FormValue);
		$this->CurrentValue = $this->FormValue;
	}

	// Old value (from $_POST)
	function setOldValue($v) {
		$this->OldValue = up_StripSlashes($v);
		if (is_array($this->OldValue)) {
			$this->OldValue = implode(",", $this->OldValue);
		} else {
			$this->OldValue = $v;
		}
	}

	// QueryString value
	function setQueryStringValue($v) {
		$this->QueryStringValue = up_StripSlashes($v);
		$this->CurrentValue = $this->QueryStringValue;
	}

	// Database value
	function setDbValue($v) {
		$this->DbValue = $v;
		$this->CurrentValue = $this->DbValue;
	}

	// Set database value with error default
	function SetDbValueDef(&$rs, $value, $default, $skip = FALSE) {
		if ($skip || !$this->Visible || $this->Disabled)
			return;
		switch ($this->FldType) {
			case 2:
			case 3:
			case 16:
			case 17:
			case 18:  // Integer
				$value = trim($value);
				$DbValue = (is_numeric($value)) ? intval($value) : $default;
				break;
			case 19:
			case 20:
			case 21: // Big integer
				$value = trim($value);
				$DbValue = (is_numeric($value)) ? $value : $default;
				break;
			case 5:
			case 6:
			case 14:
			case 131: // Double
			case 139:
			case 4: // Single
				$value = trim($value);
				$value = up_StrToFloat($value);
				$DbValue = (is_numeric($value)) ? $value : $default;
				break;
			case 7:
			case 133:
			case 134:
			case 135: // Date
			case 141: // XML
			case 145: // Time
			case 146: // DateTiemOffset
			case 201:
			case 203:
			case 129:
			case 130:
			case 200:
			case 202: // String
				$value = trim($value);
				$DbValue = ($value == "") ? $default : $value;
				break;
			case 128:
			case 204:
			case 205: // Binary
				$DbValue = (is_null($value)) ? $default : $value;
				break;
			case 72: // GUID
				$value = trim($value);
				$DbValue = ($value <> "" && up_CheckGUID($value)) ? $value : $default;
				break;
			case 11: // Boolean
				$DbValue = (is_bool($value) || is_numeric($value)) ? $value : $default;
				break;
			default:
				$DbValue = $value;
		}
		$this->setDbValue($DbValue);
		$rs[$this->FldName] = $this->DbValue;
	}

	// Session value
	function getSessionValue() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TblVar . "_" . $this->FldVar . "_SessionValue"];
	}

	function setSessionValue($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TblVar . "_" . $this->FldVar . "_SessionValue"] = $v;
	}
}

/**
 * List option collection class
 */

class cListOptions {
	var $Items = array();
	var $CustomItem = "";
	var $Tag = "td";
	var $Separator = "";

	// Add and return a new option
	function &Add($Name) {
		$item = new cListOption($Name, $this->Tag, $this->Separator);
		$item->Parent =& $this;
		$this->Items[$Name] = $item;
		return $item;
	}

	// Load default settings
	function LoadDefault() {
		$this->CustomItem = "";
		foreach ($this->Items as $key => $item)
			$this->Items[$key]->Body = "";
	}

	// Hide all options
	function HideAllOptions() {
		foreach ($this->Items as $key => $item)
			$this->Items[$key]->Visible = FALSE;
	}

	// Show all options
	function ShowAllOptions() {
		foreach ($this->Items as $key => $item)
			$this->Items[$key]->Visible = TRUE;
	}

	// Get item by name
	// predefined names: view/edit/copy/delete/detail_<DetailTable>/userpermission/checkbox
	function &GetItem($Name) {
		$item = array_key_exists($Name, $this->Items) ? $this->Items[$Name] : NULL;
		return $item;
	}

	// Move item to position
	function MoveItem($Name, $Pos) {
		$cnt = count($this->Items);
		if ($Pos < 0)
			$Pos = 0;
		elseif ($Pos >= $cnt)
			$Pos = $cnt - 1;
		$item = $this->GetItem($Name);
		if ($item) {
			unset($this->Items[$Name]);
			$this->Items = array_merge(array_slice($this->Items, 0, $Pos),
				array($Name => $item), array_slice($this->Items, $Pos));
		}
	}

	// Render list options
	function Render($Part, $Pos="") {
		if ($this->CustomItem <> "") {
			$cnt = 0;
			foreach ($this->Items as &$item) {
				if ($item->Visible && $this->ShowPos($item->OnLeft, $Pos))
					$cnt++;
				if ($item->Name == $this->CustomItem)
					$opt = $item;
			}
			if (is_object($opt) && $cnt > 0) {
				if ($this->ShowPos($opt->OnLeft, $Pos)) {
					echo $opt->Render($Part, $cnt);
				} else {
					echo $opt->Render("", $cnt);
				}
			}
		} else {
			foreach ($this->Items as &$item) {
				if ($item->Visible && $this->ShowPos($item->OnLeft, $Pos))
					echo $item->Render($Part);
			}
		}
	}

	function ShowPos($OnLeft, $Pos) {
		return ($OnLeft && $Pos == "left") || (!$OnLeft && $Pos == "right") || ($Pos == "");
	}
}

/**
 * List option class
 */

class cListOption {
	var $Name;
	var $OnLeft;
	var $CssStyle;
	var $Visible = TRUE;
	var $Header;
	var $Body;
	var $Footer;
	var $Tag = "td";
	var $Separator = "";
	var $Parent;

	function cListOption($Name, $Tag, $Separator) {
		$this->Name = $Name;
		$this->Tag = $Tag;
		$this->Separator = $Separator;
	}

	function MoveTo($Pos) {
		$this->Parent->MoveItem($this->Name, $Pos);
	}

	function Render($Part, $ColSpan = 1) {
		if ($Part == "header") {
			$value = $this->Header;
		} elseif ($Part == "body") {
			$value = $this->Body;
		} elseif ($Part == "footer") {
			$value = $this->Footer;
		} else {
			$value = $Part;
		}
		if (strval($value) == "" && strtolower($this->Tag) <> "td")
			return "";
		$res = ($value <> "") ? $value : "&nbsp;";
		$tage = "</" . $this->Tag . ">";
		$tags = "<" . $this->Tag;
		$tags .= " class=\"upbudgetofficeclass\"";
		if ($this->CssStyle <> "")
			$tags .= " style=\"" . $this->CssStyle . "\"";
		if (strtolower($this->Tag) == "td" && $ColSpan > 1)
			$tags .= " colspan=\"" . $ColSpan . "\"";
		$tags .= ">";
		$res = $tags . $res . $tage . $this->Separator;
		return $res;
	}
}
?>
<?php

/**
 * Advanced Search class
 */

class cAdvancedSearch {
	var $SearchValue; // Search value
	var $SearchOperator; // Search operator
	var $SearchCondition; // Search condition
	var $SearchValue2; // Search value 2
	var $SearchOperator2; // Search operator 2
}
?>
<?php

/**
 * Upload class
 */

class cUpload {
	var $Index = 0; // Index for multiple form elements
	var $TblVar; // Table variable
	var $FldVar; // Field variable
	var $Message; // Error message
	var $DbValue; // Value from database
	var $Value = NULL; // Upload value
	var $Action; // Upload action
	var $FileName; // Upload file name
	var $FileSize; // Upload file size
	var $ContentType; // File content type
	var $ImageWidth; // Image width
	var $ImageHeight; // Image height
	var $Error; // Upload error

	// Constructor
	function cUpload($TblVar, $FldVar, $Binary = FALSE) {
		$this->TblVar = $TblVar;
		$this->FldVar = $FldVar;
	}

	function getSessionID() {
		return UP_PROJECT_NAME . "_" . $this->TblVar . "_" . $this->FldVar . "_" . $this->Index;
	}

	// Save value to Session
	function SaveDbToSession() {
		$sSessionID = $this->getSessionID();
		$_SESSION[$sSessionID . "_DbValue"] = $this->DbValue;
	}

	// Restore value from Session
	function RestoreDbFromSession() {
		$sSessionID = $this->getSessionID();
		$this->DbValue = @$_SESSION[$sSessionID . "_DbValue"];
	}

	// Remove value from Session
	function RemoveDbFromSession() {
		$sSessionID = $this->getSessionID();
		unset($_SESSION[$sSessionID . "_DbValue"]);
	}

	// Save upload values to Session
	function SaveToSession() {
		$sSessionID = $this->getSessionID();
		$_SESSION[$sSessionID . "_upload"] = serialize($this);
	}

	// Restore upload values from Session
	function RestoreFromSession() {
		$sSessionID = $this->getSessionID();
		$obj = @unserialize($_SESSION[$sSessionID . "_upload"]);
		if (is_object($obj)) {
			$this->Action = $obj->Action;
			$this->FileSize = $obj->FileSize;
			$this->FileName = $obj->FileName;
			$this->ContentType = $obj->ContentType;
			$this->ImageWidth = $obj->ImageWidth;
			$this->ImageHeight = $obj->ImageHeight;
			$this->Value = $obj->Value;
			$this->Error = $obj->Error;
		}
	}

	// Remove upload values from Session
	function RemoveFromSession() {
		$sSessionID = $this->getSessionID();
		unset($_SESSION[$sSessionID . "_upload"]);
	}

	// Check file type of the uploaded file
	function UploadAllowedFileExt($filename) {
		return up_CheckFileType($filename);
	}

	// Get upload file
	function UploadFile() {
		global $objForm;
		$this->Value = NULL; // Reset first
		$gsFldVar = $this->FldVar;
		$gsFldVarAction = "a" . substr($gsFldVar, 1);

		// Get action
		$this->Action = $objForm->GetValue($gsFldVarAction);

		// Get and check the upload file size
		$this->FileSize = $objForm->GetUploadFileSize($gsFldVar);

		// Get and check the upload file type
		$this->FileName = $objForm->GetUploadFileName($gsFldVar);

		// Get upload file content type
		$this->ContentType = $objForm->GetUploadFileContentType($gsFldVar);

		// Get upload value
		$this->Value = $objForm->GetUploadFileData($gsFldVar);

		// Get upload error
		$this->Error = $objForm->GetUploadFileError($gsFldVar);

		// Get image width and height
		$sizes = $objForm->GetUploadImageSize($gsFldVar);
		$this->ImageWidth = @$sizes[0];
		$this->ImageHeight = @$sizes[1];
		return TRUE; // Normal return
	}

	// Resize image
	function Resize($width, $height, $quality) {
		if (!up_Empty($this->Value)) {
			$wrkwidth = $width;
			$wrkheight = $height;
			if (up_ResizeBinary($this->Value, $wrkwidth, $wrkheight, $quality)) { // P6
				$this->ImageWidth = $wrkwidth;
				$this->ImageHeight = $wrkheight;
				$this->FileSize = strlen($this->Value);
			}
		}
	}

	// Save uploaded data to file (Path relative to application root)
	function SaveToFile($Path, $NewFileName, $OverWrite) {
		if (!up_Empty($this->Value)) {
			$Path = up_UploadPathEx(TRUE, $Path);
			if (trim(strval($NewFileName)) == "") $NewFileName = $this->FileName;
			if ($OverWrite) {
				return up_SaveFile($Path, $NewFileName, $this->Value);
			} else {
				return up_SaveFile($Path, up_UploadFileNameEx($Path, $NewFileName), $this->Value);
			}
		}
		return FALSE;
	}

	// Resize and save uploaded data to file (Path relative to application root)
	function ResizeAndSaveToFile($Width, $Height, $Quality, $Path, $NewFileName, $OverWrite) {
		$bResult = FALSE;
		if (!up_Empty($this->Value)) {
			$OldValue = $this->Value;
			$this->Resize($Width, $Height, $Quality);
			$bResult = $this->SaveToFile($Path, $NewFileName, $OverWrite);
			$this->Value = $OldValue;
		}
		return $bResult;
	}
}
?>
<?php

/**
 * Advanced Security class
 */

class cAdvancedSecurity {
	var $UserLevel = array(); // All User Levels
	var $UserLevelPriv = array(); // All User Level permissions
	var $UserLevelID = array(); // User Level ID array
	var $UserID = array(); // User ID array
	var $CurrentUserLevelID;
	var $CurrentUserLevel; // Permissions
	var $CurrentUserID;
	var $CurrentParentUserID;

	// Constructor
	function cAdvancedSecurity() {

		// Init User Level
		$this->CurrentUserLevelID = $this->SessionUserLevelID();
		if (is_numeric($this->CurrentUserLevelID) && intval($this->CurrentUserLevelID) >= -1) {
			$this->UserLevelID[] = $this->CurrentUserLevelID;
		}

		// Init User ID
		$this->CurrentUserID = $this->SessionUserID();
		$this->CurrentParentUserID = $this->SessionParentUserID();

		// Load user level (for TablePermission_Loading event)
		$this->LoadUserLevel();
	}

	// Session User ID
	function SessionUserID() {
		return strval(@$_SESSION[UP_SESSION_USER_ID]);
	}

	function setSessionUserID($v) {
		$_SESSION[UP_SESSION_USER_ID] = trim(strval($v));
		$this->CurrentUserID = trim(strval($v));
	}

	// Session Parent User ID
	function SessionParentUserID() {
		return strval(@$_SESSION[UP_SESSION_PARENT_USER_ID]);
	}

	function setSessionParentUserID($v) {
		$_SESSION[UP_SESSION_PARENT_USER_ID] = trim(strval($v));
		$this->CurrentParentUserID = trim(strval($v));
	}

	// Session User Level ID
	function SessionUserLevelID() {
		return @$_SESSION[UP_SESSION_USER_LEVEL_ID];
	}

	function setSessionUserLevelID($v) {
		$_SESSION[UP_SESSION_USER_LEVEL_ID] = $v;
		$this->CurrentUserLevelID = $v;
		if (is_numeric($v) && $v >= -1)
			$this->UserLevelID = array($v);
	}

	// Session User Level value
	function SessionUserLevel() {
		return @$_SESSION[UP_SESSION_USER_LEVEL];
	}

	function setSessionUserLevel($v) {
		$_SESSION[UP_SESSION_USER_LEVEL] = $v;
		$this->CurrentUserLevel = $v;
	}

	// Current user name
	function getCurrentUserName() {
		return strval(@$_SESSION[UP_SESSION_USER_NAME]);
	}

	function setCurrentUserName($v) {
		$_SESSION[UP_SESSION_USER_NAME] = $v;
	}

	function CurrentUserName() {
		return $this->getCurrentUserName();
	}

	// Current User ID
	function CurrentUserID() {
		return $this->CurrentUserID;
	}

	// Current Parent User ID
	function CurrentParentUserID() {
		return $this->CurrentParentUserID;
	}

	// Current User Level ID
	function CurrentUserLevelID() {
		return $this->CurrentUserLevelID;
	}

	// Current User Level value
	function CurrentUserLevel() {
		return $this->CurrentUserLevel;
	}

	// Can add
	function CanAdd() {
		return (($this->CurrentUserLevel & UP_ALLOW_ADD) == UP_ALLOW_ADD);
	}

	function setCanAdd($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_ADD);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_ADD));
		}
	}

	// Can delete
	function CanDelete() {
		return (($this->CurrentUserLevel & UP_ALLOW_DELETE) == UP_ALLOW_DELETE);
	}

	function setCanDelete($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_DELETE);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_DELETE));
		}
	}

	// Can edit
	function CanEdit() {
		return (($this->CurrentUserLevel & UP_ALLOW_EDIT) == UP_ALLOW_EDIT);
	}

	function setCanEdit($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_EDIT);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_EDIT));
		}
	}

	// Can view
	function CanView() {
		return (($this->CurrentUserLevel & UP_ALLOW_VIEW) == UP_ALLOW_VIEW);
	}

	function setCanView($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_VIEW);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_VIEW));
		}
	}

	// Can list
	function CanList() {
		return (($this->CurrentUserLevel & UP_ALLOW_LIST) == UP_ALLOW_LIST);
	}

	function setCanList($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_LIST);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_LIST));
		}
	}

	// Can report
	function CanReport() {
		return (($this->CurrentUserLevel & UP_ALLOW_REPORT) == UP_ALLOW_REPORT);
	}

	function setCanReport($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_REPORT);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_REPORT));
		}
	}

	// Can search
	function CanSearch() {
		return (($this->CurrentUserLevel & UP_ALLOW_SEARCH) == UP_ALLOW_SEARCH);
	}

	function setCanSearch($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_SEARCH);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_SEARCH));
		}
	}

	// Can admin
	function CanAdmin() {
		return (($this->CurrentUserLevel & UP_ALLOW_ADMIN) == UP_ALLOW_ADMIN);
	}

	function setCanAdmin($b) {
		if ($b) {
			$this->CurrentUserLevel = ($this->CurrentUserLevel | UP_ALLOW_ADMIN);
		} else {
			$this->CurrentUserLevel = ($this->CurrentUserLevel & (~ UP_ALLOW_ADMIN));
		}
	}

	// Last URL
	function LastUrl() {
		return @$_COOKIE[UP_PROJECT_NAME]['LastUrl'];
	}

	// Save last URL
	function SaveLastUrl() {
		$s = up_ServerVar("SCRIPT_NAME");
		$q = up_ServerVar("QUERY_STRING");
		if ($q <> "") $s .= "?" . $q;
		if ($this->LastUrl() == $s) $s = "";
		@setcookie(UP_PROJECT_NAME . '[LastUrl]', $s);
	}

	// Auto login
	function AutoLogin() {
		if (@$_COOKIE[UP_PROJECT_NAME]['AutoLogin'] == "autologin") {
			$usr = TEAdecrypt(@$_COOKIE[UP_PROJECT_NAME]['Username'], UP_RANDOM_KEY);
			$pwd = TEAdecrypt(@$_COOKIE[UP_PROJECT_NAME]['Password'], UP_RANDOM_KEY);
			$AutoLogin = $this->ValidateUser($usr, $pwd, TRUE);
		} else {
			$AutoLogin = FALSE;
		}
		return $AutoLogin;
	}

	// Validate user
	function ValidateUser($usr, $pwd, $autologin) {
		global $conn, $Language;
		global $tbl_users;
		$ValidateUser = FALSE;

		// Call User Custom Validate event
		if (UP_USE_CUSTOM_LOGIN) {
			$ValidateUser = $this->User_CustomValidate($usr, $pwd);
			if ($ValidateUser) {
				$_SESSION[UP_SESSION_STATUS] = "login";
			}
		}

		// Check hard coded admin first
		if (!$ValidateUser) {
			if (UP_CASE_SENSITIVE_PASSWORD) {
				$ValidateUser = (UP_ADMIN_USER_NAME == $usr && UP_ADMIN_PASSWORD == $pwd);
			} else {
				$ValidateUser = (strtolower(UP_ADMIN_USER_NAME) == strtolower($usr) &&
					strtolower(UP_ADMIN_PASSWORD) == strtolower($pwd));
			}
			if ($ValidateUser) {
				$_SESSION[UP_SESSION_STATUS] = "login";
				$_SESSION[UP_SESSION_SYS_ADMIN] = 1; // System Administrator
				$this->setCurrentUserName("Administrator"); // Load user name
				$this->setSessionUserID(-1); // System Administrator
				$this->setSessionUserLevelID(-1); // System Administrator
				$this->SetUpUserLevel();
			}
		}

		// Check other users
		if (!$ValidateUser) {
			$sFilter = str_replace("%u", up_AdjustSql($usr), UP_USER_NAME_FILTER);

			// Set up filter (SQL WHERE clause) and get return SQL
			// SQL constructor in <UseTable> class, <UserTable>info.php

			$sSql = $tbl_users->GetSQL($sFilter, "");
			if ($rs = $conn->Execute($sSql)) {
				if (!$rs->EOF) {
					$ValidateUser = up_ComparePassword($rs->fields('users_password'), $pwd);
					if ($ValidateUser) {
						$_SESSION[UP_SESSION_STATUS] = "login";
						$_SESSION[UP_SESSION_SYS_ADMIN] = 0; // Non System Administrator
						$this->setCurrentUserName($rs->fields('users_userLoginName')); // Load user name
						$this->setSessionUserID($rs->fields('units_id')); // Load User ID
						if (is_null($rs->fields('users_userLevel'))) {
							$this->setSessionUserLevelID(0);
						} else {
							$this->setSessionUserLevelID(intval($rs->fields('users_userLevel'))); // Load User Level
						}
						$this->SetUpUserLevel();

						// Call User Validated event
						$row = $rs->fields;
						$this->User_Validated($row);
					}
				}
				$rs->Close();
			}
		}
		if (!$ValidateUser)
			$_SESSION[UP_SESSION_STATUS] = ""; // Clear login status
		return $ValidateUser;
	}

	// Static User Level security
	function SetUpUserLevel() {

		// User Level definitions
		array_splice($this->UserLevel, 0);
		$this->UserLevel[] = array("0", "Default");
		$this->UserLevel[] = array("1", "unit_users");
		$this->UserLevel[] = array("2", "cu_focal_person");
		array_splice($this->UserLevelPriv, 0);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_accomplishment', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_accomplishment', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_accomplishment', 2, 12);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_target', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_target', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_pbb_detail_target', 2, 12);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit_mfo', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_a_eligible_status_unit_mfo', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_mfo', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_mfo', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_pi', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_pi', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_t_completion_status_unit_pi', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf_header', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf_header', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_1_iatf_header', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_cu', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_cu', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_rep_ta_form_a_cu', 2, 8);
		$this->UserLevelPriv[] = array('frm_fp_units', 0, 0);
		$this->UserLevelPriv[] = array('frm_fp_units', 1, 0);
		$this->UserLevelPriv[] = array('frm_fp_units', 2, 12);
		$this->UserLevelPriv[] = array('frm_sam_collection_period', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_collection_period', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_collection_period', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_cu_executive_offices', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_cu_executive_offices', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_cu_executive_offices', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_cutoffdate', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_cutoffdate', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_cutoffdate', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions_cu', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions_cu', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_mfo_questions_cu', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_pbb_detail', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_pbb_detail', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_pbb_detail', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit_mfo', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_a_eligible_status_unit_mfo', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_mfo', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_mfo', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_pi', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_pi', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_t_completion_status_unit_pi', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0_cu', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0_cu', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_0_cu', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_1', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_1', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_rep_ta_form_a_1', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_units', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_units', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_units', 2, 0);
		$this->UserLevelPriv[] = array('frm_sam_users', 0, 0);
		$this->UserLevelPriv[] = array('frm_sam_users', 1, 0);
		$this->UserLevelPriv[] = array('frm_sam_users', 2, 0);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_accomplishment', 0, 0);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_accomplishment', 1, 12);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_accomplishment', 2, 0);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_target', 0, 0);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_target', 1, 12);
		$this->UserLevelPriv[] = array('frm_u_pbb_detail_target', 2, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_a_eligible_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_a_eligible_status_unit_mfo', 1, 8);
		$this->UserLevelPriv[] = array('frm_u_rep_a_eligible_status_unit_mfo', 2, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_t_completion_status_unit_mfo', 0, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_t_completion_status_unit_mfo', 1, 8);
		$this->UserLevelPriv[] = array('frm_u_rep_t_completion_status_unit_mfo', 2, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_ta_form_a_1', 0, 0);
		$this->UserLevelPriv[] = array('frm_u_rep_ta_form_a_1', 1, 8);
		$this->UserLevelPriv[] = array('frm_u_rep_ta_form_a_1', 2, 0);
		if (function_exists("SetUpReportUserLevel")) // For UPPBB2014 Report 3+
			SetUpReportUserLevel($this->UserLevelPriv);

		// User Level loaded event
		$this->UserLevel_Loaded();

		// Save the User Level to Session variable
		$this->SaveUserLevel();
	}

	// Add user permission
	function AddUserPermission($UserLevelName, $TableName, $UserPermission) {

		// Get User Level ID from user name
		$UserLevelID = "";
		if (is_array($this->UserLevel)) {
			foreach ($this->UserLevel as $row) {
				list($levelid, $name) = $row;
				if (strval($UserLevelName) == strval($name)) {
					$UserLevelID = $levelid;
					break;
				}
			}
		}
		if (is_array($this->UserLevelPriv) && $UserLevelID <> "") {
			$cnt = count($this->UserLevelPriv);
			for ($i = 0; $i < $cnt; $i++) {
				list($table, $levelid, $priv) = $this->UserLevelPriv[$i];
				if (strtolower($table) == strtolower($TableName) && strval($levelid) == strval($UserLevelID)) {
					$this->UserLevelPriv[$i][2] = $priv | $UserPermission; // Add permission
					break;
				}
			}
		}
	}

	// Delete user permission
	function DeleteUserPermission($UserLevelName, $TableName, $UserPermission) {

		// Get User Level ID from user name
		$UserLevelID = "";
		if (is_array($this->UserLevel)) {
			foreach ($this->UserLevel as $row) {
				list($levelid, $name) = $row;
				if (strval($UserLevelName) == strval($name)) {
					$UserLevelID = $levelid;
					break;
				}
			}
		}
		if (is_array($this->UserLevelPriv) && $UserLevelID <> "") {
			$cnt = count($this->UserLevelPriv);
			for ($i = 0; $i < $cnt; $i++) {
				list($table, $levelid, $priv) = $this->UserLevelPriv[$i];
				if (strtolower($table) == strtolower($TableName) && strval($levelid) == strval($UserLevelID)) {
					$this->UserLevelPriv[$i][2] = $priv & (127 - $UserPermission); // Remove permission
					break;
				}
			}
		}
	}

	// Load current User Level
	function LoadCurrentUserLevel($Table) {
		$this->LoadUserLevel();
		$this->setSessionUserLevel($this->CurrentUserLevelPriv($Table));
	}

	// Get current user privilege
	function CurrentUserLevelPriv($TableName) {
		if ($this->IsLoggedIn()) {
			$Priv= 0;
			foreach ($this->UserLevelID as $UserLevelID)
				$Priv |= $this->GetUserLevelPrivEx($TableName, $UserLevelID);
			return $Priv;
		} else {
			return 0;
		}
	}

	// Get User Level ID by User Level name
	function GetUserLevelID($UserLevelName) {
		if (strval($UserLevelName) == "Administrator") {
			return -1;
		} elseif ($UserLevelName <> "") {
			if (is_array($this->UserLevel)) {
				foreach ($this->UserLevel as $row) {
					list($levelid, $name) = $row;
					if (strval($name) == strval($UserLevelName))
						return $levelid;
				}
			}
		}
		return -2;
	}

	// Add User Level (for use with UserLevel_Loading event)
	function AddUserLevel($UserLevelName) {
		if (strval($UserLevelName) == "") return;
		$UserLevelID = $this->GetUserLevelID($UserLevelName);
		if (!is_numeric($UserLevelID)) return;
		if ($UserLevelID < -1) return;
		if (!in_array($UserLevelID, $this->UserLevelID))
			$this->UserLevelID[] = $UserLevelID;
	}

	// Delete User Level (for use with UserLevel_Loading event)
	function DeleteUserLevel($UserLevelName) {
		if (strval($UserLevelName) == "") return;
		$UserLevelID = $this->GetUserLevelID($UserLevelName);
		if (!is_numeric($UserLevelID)) return;
		if ($UserLevelID < -1) return;
		$cnt = count($this->UserLevelID);
		for ($i = 0; $i < $cnt; $i++) {
			if ($this->UserLevelID[$i] == $UserLevelID) {
				unset($this->UserLevelID[$i]);
				break;
			}
		}
	}

	// User Level list
	function UserLevelList() {
		return implode(", ", $this->UserLevelID);
	}

	// User Level name list
	function UserLevelNameList() {
		$list = "";
		foreach ($this->UserLevelID as $UserLevelID) {
			if ($list <> "") $list .= ", ";
			$list .= up_QuotedValue($this->GetUserLevelName($UserLevelID), UP_DATATYPE_STRING);
		}
		return $list;
	}

	// Get user privilege based on table name and User Level
	function GetUserLevelPrivEx($TableName, $UserLevelID) {
		if (strval($UserLevelID) == "-1") { // System Administrator
			if (defined("UP_USER_LEVEL_COMPAT")) {
				return 31; // Use old User Level values
			} else {
				return 127; // Use new User Level values (separate View/Search)
			}
		} elseif ($UserLevelID >= 0) {
			if (is_array($this->UserLevelPriv)) {
				foreach ($this->UserLevelPriv as $row) {
					list($table, $levelid, $priv) = $row;
					if (strtolower($table) == strtolower($TableName) && strval($levelid) == strval($UserLevelID)) {
						if (is_null($priv) || !is_numeric($priv)) return 0;
						return intval($priv);
					}
				}
			}
		}
		return 0;
	}

	// Get current User Level name
	function CurrentUserLevelName() {
		return $this->GetUserLevelName($this->CurrentUserLevelID());
	}

	// Get User Level name based on User Level
	function GetUserLevelName($UserLevelID) {
		if (strval($UserLevelID) == "-1") {
			return "Administrator";
		} elseif ($UserLevelID >= 0) {
			if (is_array($this->UserLevel)) {
				foreach ($this->UserLevel as $row) {
					list($levelid, $name) = $row;
					if (strval($levelid) == strval($UserLevelID))
						return $name;
				}
			}
		}
		return "";
	}

	// Display all the User Level settings (for debug only)
	function ShowUserLevelInfo() {
		echo "<pre class=\"upbudgetofficeclass\">";
		print_r($this->UserLevel);
		print_r($this->UserLevelPriv);
		echo "</pre>";
		echo "<p>Current User Level ID = " . $this->CurrentUserLevelID() . "</p>";
		echo "<p>Current User Level ID List = " . $this->UserLevelList() . "</p>";
	}

	// Check privilege for List page (for menu items)
	function AllowList($TableName) {
		return ($this->CurrentUserLevelPriv($TableName) & UP_ALLOW_LIST);
	}

	// Check privilege for Add page (for Allow-Add / Detail-Add)
	function AllowAdd($TableName) {
		return ($this->CurrentUserLevelPriv($TableName) & UP_ALLOW_ADD);
	}

	// Check privilege for Edit page (for Detail-Edit)
	function AllowEdit($TableName) {
		return ($this->CurrentUserLevelPriv($TableName) & UP_ALLOW_EDIT);
	}

	// Check if user password expired
	function IsPasswordExpired() {
		return (@$_SESSION[UP_SESSION_STATUS] == "passwordexpired");
	}

	// Check if user is logging in (after changing password)
	function IsLoggingIn() {
		return (@$_SESSION[UP_SESSION_STATUS] == "loggingin");
	}

	// Check if user is logged in
	function IsLoggedIn() {
		return (@$_SESSION[UP_SESSION_STATUS] == "login");
	}

	// Check if user is system administrator
	function IsSysAdmin() {
		return (@$_SESSION[UP_SESSION_SYS_ADMIN] == 1);
	}

	// Check if user is administrator
	function IsAdmin() {
		$IsAdmin = $this->IsSysAdmin();
		if (!$IsAdmin)
			$IsAdmin = in_array(-1, $this->UserLevelID);
		if (!$IsAdmin)
    	$IsAdmin = ($this->CurrentUserID == -1);
		if (!$IsAdmin)
			$IsAdmin = in_array(-1, $this->UserID);
		return $IsAdmin;
  }

	// Save User Level to Session
	function SaveUserLevel() {
		$_SESSION[UP_SESSION_AR_USER_LEVEL] = $this->UserLevel;
		$_SESSION[UP_SESSION_AR_USER_LEVEL_PRIV] = $this->UserLevelPriv;
	}

	// Load User Level from Session
	function LoadUserLevel() {
		if (!is_array(@$_SESSION[UP_SESSION_AR_USER_LEVEL]) || !is_array(@$_SESSION[UP_SESSION_AR_USER_LEVEL_PRIV])) {
			$this->SetupUserLevel();
			$this->SaveUserLevel();
		} else {
			$this->UserLevel = $_SESSION[UP_SESSION_AR_USER_LEVEL];
			$this->UserLevelPriv = $_SESSION[UP_SESSION_AR_USER_LEVEL_PRIV];
		}
	}

	// Get current user info
	function CurrentUserInfo($fieldname) {
		$info = NULL;
    $info = $this->GetUserInfo($fieldname, $this->CurrentUserID);
		return $info;
	}

	// Get user info
	function GetUserInfo($FieldName, $UserID) {
		global $conn, $tbl_users;
		if (strval($UserID) <> "") {

			// Get SQL from GetSQL method in <UseTable> class, <UserTable>info.php
			$sFilter = str_replace("%u", up_AdjustSql($UserID), UP_USER_ID_FILTER);
			$sSql = $tbl_users->GetSQL($sFilter, '');
			if (($RsUser = $conn->Execute($sSql)) && !$RsUser->EOF) {
				$info = $RsUser->fields($FieldName);
				$RsUser->Close();
				return $info;
			}
		}
		return NULL;
  }

	// Get User ID by user name
	function GetUserIDByUserName($UserName) {
		global $conn, $tbl_users;
		if (strval($UserName) <> "") {
			$sFilter = str_replace("%u", up_AdjustSql($UserName), UP_USER_NAME_FILTER);
			$sSql = $tbl_users->GetSQL($sFilter, '');
			if (($RsUser = $conn->Execute($sSql)) && !$RsUser->EOF) {
				$UserID = $RsUser->fields('units_id');
				$RsUser->Close();
				return $UserID;
			}
		}
		return "";
	}

	// Load User ID
	function LoadUserID() {
		global $conn, $tbl_users;
		$this->UserID = array();
		if (strval($this->CurrentUserID) == "") {

			// Add codes to handle empty user id here
		} elseif ($this->CurrentUserID <> "-1") {

			// Get first level
			$this->AddUserID($this->CurrentUserID);
			$sFilter = $tbl_users->UserIDFilter($this->CurrentUserID);
			$sSql = $tbl_users->GetSQL($sFilter, '');
			if ($RsUser = $conn->Execute($sSql)) {
				while (!$RsUser->EOF) {
					$this->AddUserID($RsUser->fields('units_id'));
					$RsUser->MoveNext();
				}
				$RsUser->Close();
			}
		}
	}

	// Add user name
	function AddUserName($UserName) {
		$this->AddUserID($this->GetUserIDByUserName($UserName));
	}

	// Add User ID
	function AddUserID($userid) {
		if (strval($userid) == "") return;
		if (!in_array(trim(strval($userid)), $this->UserID))
			$this->UserID[] = trim(strval($userid));
	}

	// Delete user name
	function DeleteUserName($UserName) {
		$this->DeleteUserID($this->GetUserIDByUserName($UserName));
	}

	// Delete User ID
	function DeleteUserID($userid) {
		if (strval($userid) == "") return;
		$cnt = count($this->UserID);
		for ($i = 0; $i < $cnt; $i++) {
			if ($this->UserID[$i] == trim(strval($userid))) {
				unset($this->UserID[$i]);
				break;
			}
		}
	}

	// User ID list
	function UserIDList() {
		$ar = $this->UserID;
		$len = count($ar);
		for ($i = 0; $i < $len; $i++)
			$ar[$i] =  up_QuotedValue($ar[$i], UP_DATATYPE_STRING);
		return implode(", ", $ar);
	}

	// list of allowed User IDs for this user
	function IsValidUserID($userid) {
		return in_array(trim(strval($userid)), $this->UserID);
	}

	// UserID Loading event
	function UserID_Loading() {

		//echo "UserID Loading: " . $this->CurrentUserID() . "<br>";
	}

	// UserID Loaded event
	function UserID_Loaded() {

		//echo "UserID Loaded: " . $this->UserIDList() . "<br>";
	}

	// User Level Loaded event
	function UserLevel_Loaded() {

		//$this->AddUserPermission(<UserLevelName>, <TableName>, <UserPermission>);
		//$this->DeleteUserPermission(<UserLevelName>, <TableName>, <UserPermission>);

	}

	// Table Permission Loading event
	function TablePermission_Loading() {

		//echo "Table Permission Loading: " . $this->CurrentUserLevelID() . "<br>";
	}

	// Table Permission Loaded event
	function TablePermission_Loaded() {

		//echo "Table Permission Loaded: " . $this->CurrentUserLevel . "<br>";
	}

	// User Custom Validate event
	function User_CustomValidate(&$usr, &$pwd) {

		// Return FALSE to continue with default validation after event exits, or return TRUE to skip default validation
		return FALSE;
	}

	// User Validated event
	function User_Validated(&$rs) {

		// Example:
		//$_SESSION['UserEmail'] = $rs['Email'];

	}

	// User PasswordExpired event
	function User_PasswordExpired(&$rs) {

	  //echo "User_PasswordExpired";
	}
}
?>
<?php

/**
 * Common functions
 */

// Connection/Query error handler
function up_ErrorFn($DbType, $ErrorType, $ErrorNo, $ErrorMsg, $Param1, $Param2, $Object) {
	if ($ErrorType == 'CONNECT') {
		$msg = "Failed to connect to $Param2 at $Param1. Error: " . $ErrorMsg;
	} elseif ($ErrorType == 'EXECUTE') {
		if (UP_DEBUG_ENABLED) {
			$msg = "Failed to execute SQL: $Param1. Error: " . $ErrorMsg;
		} else {
			$msg = "Failed to execute SQL. Error: " . $ErrorMsg;
		}
	} 
	up_AddMessage($_SESSION[UP_SESSION_FAILURE_MESSAGE], $msg);
}

// Write HTTP header
function up_Header($cache, $charset = UP_CHARSET) {
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
	if ($cache || !$cache && up_IsHttps() && @$gsExport <> "" && @$gsExport <> "print") { // Allow cache
		header("Cache-Control: private, must-revalidate"); // HTTP/1.1
	} else { // No cache
		header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache"); // HTTP/1.0
	}
	if ($charset <> "")
		header("Content-Type: text/html; charset=" . $charset); // Charset
}

// Connect to database
function &up_Connect() {
	$GLOBALS["ADODB_FETCH_MODE"] = ADODB_FETCH_BOTH;
	$conn = new mysqlt_driver_ADOConnection();
	$conn->debug = UP_DEBUG_ENABLED;
	$conn->debug_echo = FALSE;
	$info = array("host" => UP_CONN_HOST, "port" => UP_CONN_PORT,
		"user" => UP_CONN_USER, "pass" => UP_CONN_PASS, "db" => UP_CONN_DB);

	// Database loading event
	Database_Connecting($info);
	$conn->port = intval($info["port"]);
	$conn->raiseErrorFn = 'up_ErrorFn';
	$conn->Connect($info["host"], $info["user"], $info["pass"], $info["db"]);
	if (UP_MYSQL_CHARSET <> "")
		$conn->Execute("SET NAMES '" . UP_MYSQL_CHARSET . "'");
	$conn->raiseErrorFn = '';
	return $conn;
}

// Database Connecting event
function Database_Connecting(&$info) {

	// Example:
	//var_dump($info);
	//if (up_CurrentUserIP() == "127.0.0.1") { // testing on local PC
	//	$info["host"] = "locahost";
	//	$info["user"] = "root";
	//	$info["pass"] = "";
	//}

}

// check if allow add/delete row
function up_AllowAddDeleteRow() {
	$ua = up_UserAgent();
	return (count($ua) >= 2 && ($ua[0] != "IE" || $ua[1] > 5));
}

// Get browser type and version
function up_UserAgent() {
	$useragent = up_ServerVar("HTTP_USER_AGENT");
	if (preg_match("|MSIE ([0-9].[0-9]{1,2})|", $useragent, $matched)) {
		$browser = "IE";
		$browser_version = $matched[1];
	} elseif (preg_match("|Firefox/([0-9\.]+)|", $useragent, $matched)) {
		$browser = "Firefox";
		$browser_version = $matched[1];
	} elseif (preg_match("|Opera/([0-9].[0-9]{1,2})|", $useragent, $matched)) {
		$browser = "Opera";
		$browser_version = $matched[1];
	} elseif (preg_match("|Chrome/([0-9\.]+)|", $useragent, $matched)) {
		$browser = "Chrome";
		$browser_version = $matched[1];
	} elseif (preg_match("|Safari/|", $useragent) && preg_match("|Version/([0-9\.]+)|", $useragent, $matched)) {
		$browser = "Safari";
		$browser_version = $matched[1];
	} else { // browser not recognized
		$browser = "Other";
		$browser_version = 0;
	}
	$ua[] = $browser;
	$ver = explode(".", $browser_version);
	for ($i = 0; $i < count($ver); $i++)
		$ua[] = $ver[$i];
	return $ua;
}

// Check if HTTP POST
function up_IsHttpPost() {
	$ct = up_ServerVar("CONTENT_TYPE");
	if (empty($ct)) $ct = up_ServerVar("HTTP_CONTENT_TYPE");
	return ($ct == "application/x-www-form-urlencoded");
}

// Get script name
function up_ScriptName() {
	$sn = up_ServerVar("PHP_SELF");
	if (empty($sn)) $sn = up_ServerVar("SCRIPT_NAME");
	if (empty($sn)) $sn = up_ServerVar("ORIG_PATH_INFO");
	if (empty($sn)) $sn = up_ServerVar("ORIG_SCRIPT_NAME");
	if (empty($sn)) $sn = up_ServerVar("REQUEST_URI");
	if (empty($sn)) $sn = up_ServerVar("URL");
	if (empty($sn)) $sn = "UNKNOWN";
	return $sn;
}

// Append like operator
function up_Like($pat) {
	if (UP_LIKE_COLLATION_FOR_MYSQL <> "") {
		return " LIKE " . $pat . " COLLATE " . UP_LIKE_COLLATION_FOR_MYSQL;
	} else {
		return " LIKE " . $pat;
	}
}

// Return multi-value search SQL
function up_GetMultiSearchSql(&$Fld, $FldVal) {
	$sWrk = "";
	$arVal = explode(",", $FldVal);
	foreach ($arVal as $sVal) {
		$sVal = trim($sVal);
		if (UP_IS_MYSQL) {
			$sSql = "FIND_IN_SET('" . up_AdjustSql($sVal) . "', " . $Fld->FldExpression . ")";
		} else {
			if (count($arVal) == 1 || UP_SEARCH_MULTI_VALUE_OPTION == 3) {
				$sSql = $Fld->FldExpression . " = '" . up_AdjustSql($sVal) . "' OR " . up_GetMultiSearchSqlPart($Fld, $sVal);
			} else {
				$sSql = up_GetMultiSearchSqlPart($Fld, $sVal);
			}
		}
		if ($sWrk <> "") {
			if (UP_SEARCH_MULTI_VALUE_OPTION == 2) {
				$sWrk .= " AND ";
			} elseif (UP_SEARCH_MULTI_VALUE_OPTION == 3) {
				$sWrk .= " OR ";
			}
		}
		$sWrk .= "($sSql)";
	}
	return $sWrk;
}

// Get multi search SQL part
function up_GetMultiSearchSqlPart(&$Fld, $FldVal) {
	return $Fld->FldExpression . up_Like("'" . up_AdjustSql($FldVal) . ",%'") . " OR " .
		$Fld->FldExpression . up_Like("'%," . up_AdjustSql($FldVal) . ",%'") . " OR " .
		$Fld->FldExpression . up_Like("'%," . up_AdjustSql($FldVal) . "'");
}

// Get search SQL
function up_GetSearchSql(&$Fld, $FldVal, $FldOpr, $FldCond, $FldVal2, $FldOpr2) {
	$sSql = "";
	$sFldExpression = ($Fld->FldIsVirtual && !$Fld->FldForceSelection) ? $Fld->FldVirtualExpression : $Fld->FldExpression;
	$FldDataType = $Fld->FldDataType;
	if ($Fld->FldIsVirtual && !$Fld->FldForceSelection)
		$FldDataType = UP_DATATYPE_STRING;
	if ($FldOpr == "BETWEEN") {
		$IsValidValue = ($FldDataType <> UP_DATATYPE_NUMBER) ||
			($FldDataType == UP_DATATYPE_NUMBER && is_numeric($FldVal) && is_numeric($FldVal2));
		if ($FldVal <> "" && $FldVal2 <> "" && $IsValidValue)
			$sSql = $sFldExpression . " BETWEEN " . up_QuotedValue($FldVal, $FldDataType) .
				" AND " . up_QuotedValue($FldVal2, $FldDataType);
	} elseif ($FldVal == UP_NULL_VALUE || $FldOpr == "IS NULL") {
		$sSql = $sFldExpression . " IS NULL";
	} elseif ($FldVal == UP_NOT_NULL_VALUE || $FldOpr == "IS NOT NULL") {
		$sSql = $sFldExpression . " IS NOT NULL";
	} else {
		$IsValidValue = ($FldDataType <> UP_DATATYPE_NUMBER) ||
			($FldDataType == UP_DATATYPE_NUMBER && is_numeric($FldVal));
		if ($FldVal <> "" && $IsValidValue && up_IsValidOpr($FldOpr, $FldDataType)) {
			$sSql = $sFldExpression . up_SearchString($FldOpr, $FldVal, $FldDataType);
			if ($Fld->FldDataType == UP_DATATYPE_BOOLEAN && $FldVal == $Fld->FalseValue && $FldOpr == "=")
				$sSql = "(" . $sSql . " OR " . $sFldExpression . " IS NULL)";
		}
		$IsValidValue = ($FldDataType <> UP_DATATYPE_NUMBER) ||
			($FldDataType == UP_DATATYPE_NUMBER && is_numeric($FldVal2));
		if ($FldVal2 <> "" && $IsValidValue && up_IsValidOpr($FldOpr2, $FldDataType)) {
			$sSql2 = $sFldExpression . up_SearchString($FldOpr2, $FldVal2, $FldDataType);
			if ($Fld->FldDataType == UP_DATATYPE_BOOLEAN && $FldVal2 == $Fld->FalseValue && $FldOpr2 == "=")
				$sSql2 = "(" . $sSql2 . " OR " . $sFldExpression . " IS NULL)";
			if ($sSql <> "") {
				$sSql = "(" . $sSql . " " . (($FldCond == "OR") ? "OR" : "AND") . " " . $sSql2 . ")";
			} else {
				$sSql = $sSql2;
			}
		}
	}
	return $sSql;
}

// Return search string
function up_SearchString($FldOpr, $FldVal, $FldType) {
	if ($FldOpr == "LIKE") {
		return up_Like(up_QuotedValue("%$FldVal%", $FldType));
	} elseif ($FldOpr == "NOT LIKE") {
		return " NOT " . up_Like(up_QuotedValue("%$FldVal%", $FldType));
	} elseif ($FldOpr == "STARTS WITH") {
		return up_Like(up_QuotedValue("$FldVal%", $FldType));
	} else {
		return " $FldOpr " . up_QuotedValue($FldVal, $FldType);
	}
}

// Check if valid operator
function up_IsValidOpr($Opr, $FldType) {
	$Valid = ($Opr == "=" || $Opr == "<" || $Opr == "<=" ||
		$Opr == ">" || $Opr == ">=" || $Opr == "<>");
	if ($FldType == UP_DATATYPE_STRING || $FldType == UP_DATATYPE_MEMO || $FldType == UP_DATATYPE_XML)
		$Valid = ($Valid || $Opr == "LIKE" || $Opr == "NOT LIKE" ||	$Opr == "STARTS WITH");
	return $Valid; 
}

// Quote table/field name
function up_QuotedName($Name) {
	$Name = str_replace(UP_DB_QUOTE_END, UP_DB_QUOTE_END . UP_DB_QUOTE_END, $Name);
	return UP_DB_QUOTE_START . $Name . UP_DB_QUOTE_END;
}

// Quote field value
function up_QuotedValue($Value, $FldType) {
	if (is_null($Value)) return "NULL";
	switch ($FldType) {
	case UP_DATATYPE_STRING:
	case UP_DATATYPE_MEMO:
	case UP_DATATYPE_TIME:
		if (UP_REMOVE_XSS) {
			return "'" . up_AdjustSql(up_RemoveXSS($Value)) . "'";
		} else {
			return "'" . up_AdjustSql($Value) . "'";
		}
	case UP_DATATYPE_XML:
		return "'" . up_AdjustSql($Value) . "'";
	case UP_DATATYPE_BLOB:
		return "'" . up_AdjustSql($Value) . "'";
	case UP_DATATYPE_DATE:
		return "'" . up_AdjustSql($Value) . "'";
	case UP_DATATYPE_GUID:
		return "'" . $Value . "'";
	case UP_DATATYPE_BOOLEAN:
		return "'" . $Value . "'"; // 'Y'|'N' or 'y'|'n' or '1'|'0' or 't'|'f'
	default:
		return $Value;
	}
}

// Convert different data type value
function up_Conv($v, $t) {
	switch ($t) {
	case 2:
	case 3:
	case 16:
	case 17:
	case 18:
	case 19: // adSmallInt/adInteger/adTinyInt/adUnsignedTinyInt/adUnsignedSmallInt
		return (is_null($v)) ? NULL : intval($v);
	case 4:
	Case 5:
	case 6:
	case 131:
	case 139: // adSingle/adDouble/adCurrency/adNumeric/adVarNumeric
		return (is_null($v)) ? NULL : (float)$v;
	default:
		return (is_null($v)) ? NULL : $v;
	}
}

// Convert string to float
function up_StrToFloat($v) {
	$v = str_replace(" ", "", $v);
	if (!UP_USE_DEFAULT_LOCALE) extract(localeconv());
	if (empty($decimal_point)) $decimal_point = DEFAULT_DECIMAL_POINT;
	if (empty($thousands_sep)) $thousands_sep = DEFAULT_THOUSANDS_SEP;
	$v = str_replace(array($thousands_sep, $decimal_point), array("", "."), $v);
	return $v;
}

// Write message to debug file
function up_Trace($msg) {
	$filename = "debug.txt";
	if (!$handle = fopen($filename, 'a')) exit;
	if (is_writable($filename)) fwrite($handle, $msg . "\n");
	fclose($handle);
}

// Compare values with special handling for null values
function up_CompareValue($v1, $v2) {
	if (is_null($v1) && is_null($v2)) {
		return TRUE;
	} elseif (is_null($v1) || is_null($v2)) {
		return FALSE;

//	} elseif (is_float($v1) || is_float($v2)) {
//		return (float)$v1 == (float)$v2;

	} else {
		return ($v1 == $v2);
	}
}

// Check if boolean value is TRUE
function up_ConvertToBool($value) {
	return ($value === TRUE || strval($value) == "1" ||
		strtolower(strval($value)) == "y" || strtolower(strval($value)) == "t");
}

// Strip slashes
function up_StripSlashes($value) {
	if (!get_magic_quotes_gpc()) return $value;
	if (is_array($value)) { 
		return array_map('up_StripSlashes', $value);
	} else {
		return stripslashes($value);
	}
}

// Prepend CSS class name
function up_PrependClass(&$attr, $classname) {
	$classname = trim($classname);
	if ($classname <> "") {
		$attr = trim($attr);
		if ($attr <> "")
			$attr = " " . $attr;
		$attr = $classname . $attr;
	}
}

// Append CSS class name
function up_AppendClass(&$attr, $classname) {
	$classname = trim($classname);
	if ($classname <> "") {
		$attr = trim($attr);
		if ($attr <> "")
			$attr .= " ";
		$attr .= $classname;
	}
}

// Add message
function up_AddMessage(&$msg, $msgtoadd, $sep = "<br>") {
	if (strval($msgtoadd) <> "") {
		if (strval($msg) <> "")
			$msg .= $sep;
		$msg .= $msgtoadd;
	}
}

// Add filter
function up_AddFilter(&$filter, $newfilter) {
	if (trim($newfilter) == "") return;
	if (trim($filter) <> "") {
		$filter = "(" . $filter . ") AND (" . $newfilter . ")";
	} else {
		$filter = $newfilter;
	}
}

// Add slashes for SQL
function up_AdjustSql($val) {
	$val = addslashes(trim($val));
	return $val;
}

// Build SELECT SQL based on different sql part
function up_BuildSelectSql($sSelect, $sWhere, $sGroupBy, $sHaving, $sOrderBy, $sFilter, $sSort) {
	$sDbWhere = $sWhere;
	up_AddFilter($sDbWhere, $sFilter);
	$sDbOrderBy = $sOrderBy;
	if ($sSort <> "") $sDbOrderBy = $sSort;
	$sSql = $sSelect;
	if ($sDbWhere <> "") $sSql .= " WHERE " . $sDbWhere;
	if ($sGroupBy <> "") $sSql .= " GROUP BY " . $sGroupBy;
	if ($sHaving <> "") $sSql .= " HAVING " . $sHaving;
	if ($sDbOrderBy <> "") $sSql .= " ORDER BY " . $sDbOrderBy;
	return $sSql;
}

// Load recordset
function &up_LoadRecordset($SQL) {
	global $conn;
	$conn->raiseErrorFn = 'up_ErrorFn';
	$rs = $conn->Execute($SQL);
	$conn->raiseErrorFn = '';
	return $rs;
}

// Executes the query, and returns the first column of the first row
function up_ExecuteScalar($SQL) {
	$res = FALSE;
	$rs = up_LoadRecordset($SQL);
	if ($rs && !$rs->EOF && $rs->FieldCount() > 0) {
		$res = $rs->fields[0];
		$rs->Close();
	}
	return $res;
}

// Executes the query, and returns the first row
function up_ExecuteRow($SQL) {
	$res = FALSE;
	$rs = up_LoadRecordset($SQL);
	if ($rs && !$rs->EOF) {
		$res = $rs->fields;
		$rs->Close();
	}
	return $res;
}

// Write audit trail (login/logout)
function up_WriteAuditTrailOnLogInOut($usr, $logtype) {
	up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $logtype, up_CurrentUserIP(), "", "", "", "");
}

// Write audit trail
function up_WriteAuditTrail($pfx, $dt, $script, $usr, $action, $table, $field, $keyvalue, $oldvalue, $newvalue) {
	$usrwrk = $usr;
	if ($usrwrk == "") $usrwrk = "-1"; // Assume Administrator if no user
	if (UP_AUDIT_TRAIL_TO_DATABASE) {
		global $conn;
		$sAuditSql = "INSERT INTO " . up_QuotedName(UP_AUDIT_TRAIL_TABLE_NAME) .
			" (" . up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_DATETIME) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_SCRIPT) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_USER) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_ACTION) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_TABLE) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_FIELD) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_KEYVALUE) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_OLDVALUE) . ", " .
			up_QuotedName(UP_AUDIT_TRAIL_FIELD_NAME_NEWVALUE) . ") VALUES (" .
			up_QuotedValue($dt, UP_DATATYPE_DATE) . ", " .
			up_QuotedValue($script, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($usrwrk, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($action, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($table, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($field, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($keyvalue, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($oldvalue, UP_DATATYPE_STRING) . ", " .
			up_QuotedValue($newvalue, UP_DATATYPE_STRING) . ")";
		$conn->Execute($sAuditSql);
	} else {
		$sTab = "\t";
		$sHeader = "date/time" . $sTab . "script" . $sTab .	"user" . $sTab .
			"action" . $sTab . "table" . $sTab . "field" . $sTab .
			"key value" . $sTab . "old value" . $sTab . "new value";
		$sMsg = $dt . $sTab . $script . $sTab . $usrwrk . $sTab . 
				$action . $sTab . $table . $sTab . $field . $sTab .
				$keyvalue . $sTab . $oldvalue . $sTab . $newvalue;
		$sFolder = UP_AUDIT_TRAIL_PATH;
		$sFn = $pfx . "_" . date("Ymd") . ".txt";
		$filename = up_UploadPathEx(TRUE, $sFolder) . $sFn;
		if (file_exists($filename)) {
			$fileHandler = fopen($filename, "a+b");
		} else {
			$fileHandler = fopen($filename, "a+b");
			fwrite($fileHandler,$sHeader."\r\n");
		}
		fwrite($fileHandler, $sMsg."\r\n");
		fclose($fileHandler);
	}
}

// Unformat date time based on format type
function up_UnFormatDateTime($dt, $namedformat) {
	if (preg_match('/^([0-9]{4})-([0][1-9]|[1][0-2])-([0][1-9]|[1|2][0-9]|[3][0|1])( (0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))?$/', $dt))
		return $dt;
	$dt = trim($dt);
	while (strpos($dt, "  ") !== FALSE) $dt = str_replace("  ", " ", $dt);
	$arDateTime = explode(" ", $dt);
	if (count($arDateTime) == 0) return $dt;
	if ($namedformat == 0 || $namedformat == 1 || $namedformat == 2 || $namedformat == 8) {
		$arDefFmt = explode(UP_DATE_SEPARATOR, UP_DEFAULT_DATE_FORMAT);
		if ($arDefFmt[0] == "yyyy") {
			$namedformat = 9;
		} elseif ($arDefFmt[0] == "mm") {
			$namedformat = 10;
		} elseif ($arDefFmt[0] == "dd") {
			$namedformat = 11;
		}
	}
	$arDatePt = explode(UP_DATE_SEPARATOR, $arDateTime[0]);
	if (count($arDatePt) == 3) {
		switch ($namedformat) {
		case 5:
		case 9: //yyyymmdd
			if (up_CheckDate($arDateTime[0])) {
				list($year, $month, $day) = $arDatePt;
				break;
			} else {
				return $dt;
			}
		case 6:
		case 10: //mmddyyyy
			if (up_CheckUSDate($arDateTime[0])) {
				list($month, $day, $year) = $arDatePt;
				break;
			} else {
				return $dt;
			}
		case 7:
		case 11: //ddmmyyyy
			if (up_CheckEuroDate($arDateTime[0])) {
				list($day, $month, $year) = $arDatePt;
				break;
			} else {
				return $dt;
			}
		case 12:
		case 15: //yymmdd
			if (up_CheckShortDate($arDateTime[0])) {
				list($year, $month, $day) = $arDatePt;
				$year = up_UnformatYear($year);
				break;
			} else {
				return $dt;
			}
		case 13:
		case 16: //mmddyy
			if (up_CheckShortUSDate($arDateTime[0])) {
				list($month, $day, $year) = $arDatePt;
				$year = up_UnformatYear($year);
				break;
			} else {
				return $dt;
			}
		case 14:
		case 17: //ddmmyy
			if (up_CheckShortEuroDate($arDateTime[0])) {
				list($day, $month, $year) = $arDatePt;
				$year = up_UnformatYear($year);
				break;
			} else {
				return $dt;
			}
		default:
			return $dt;
		}
		return $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" .
			str_pad($day, 2, "0", STR_PAD_LEFT) .
			((count($arDateTime) > 1) ? " " . $arDateTime[1] : "");
	} else {
		return $dt;
	}
}

// Format a timestamp, datetime, date or time field from MySQL
// $namedformat:
// 0 - General Date
// 1 - Long Date
// 2 - Short Date (Default)
// 3 - Long Time
// 4 - Short Time (hh:mm:ss)
// 5 - Short Date (yyyy/mm/dd)
// 6 - Short Date (mm/dd/yyyy)
// 7 - Short Date (dd/mm/yyyy)
// 8 - Short Date (Default) + Short Time (if not 00:00:00)
// 9 - Short Date (yyyy/mm/dd) + Short Time (hh:mm:ss)
// 10 - Short Date (mm/dd/yyyy) + Short Time (hh:mm:ss)
// 11 - Short Date (dd/mm/yyyy) + Short Time (hh:mm:ss)
// 12 - Short Date - 2 digit year (yy/mm/dd)
// 13 - Short Date - 2 digit year (mm/dd/yy)
// 14 - Short Date - 2 digit year (dd/mm/yy)
// 15 - Short Date - 2 digit year (yy/mm/dd) + Short Time (hh:mm:ss)
// 16 - Short Date (mm/dd/yyyy) + Short Time (hh:mm:ss)
// 17 - Short Date (dd/mm/yyyy) + Short Time (hh:mm:ss)
function up_FormatDateTime($ts, $namedformat) {
	if (is_numeric($ts)) // timestamp
	{
		switch (strlen($ts)) {
			case 14:
				$patt = '/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
				break;
			case 12:
				$patt = '/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
				break;
			case 10:
				$patt = '/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
				break;
			case 8:
				$patt = '/(\d{4})(\d{2})(\d{2})/';
				break;
			case 6:
				$patt = '/(\d{2})(\d{2})(\d{2})/';
				break;
			case 4:
				$patt = '/(\d{2})(\d{2})/';
				break;
			case 2:
				$patt = '/(\d{2})/';
				break;
			default:
				return $ts;
		}
		if ((isset($patt))&&(preg_match($patt, $ts, $matches)))
		{
			$year = $matches[1];
			$month = @$matches[2];
			$day = @$matches[3];
			$hour = @$matches[4];
			$min = @$matches[5];
			$sec = @$matches[6];
		}
		if (($namedformat==0)&&(strlen($ts)<10)) $namedformat = 2;
	}
	elseif (is_string($ts))
	{
		if (preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $ts, $matches)) // datetime
		{
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			$hour = $matches[4];
			$min = $matches[5];
			$sec = $matches[6];
		}
		elseif (preg_match('/(\d{4})-(\d{2})-(\d{2})/', $ts, $matches)) // date
		{
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			if ($namedformat==0) $namedformat = 2;
		}
		elseif (preg_match('/(^|\s)(\d{2}):(\d{2}):(\d{2})/', $ts, $matches)) // time
		{
			$hour = $matches[2];
			$min = $matches[3];
			$sec = $matches[4];
			if (($namedformat==0)||($namedformat==1)) $namedformat = 3;
			if ($namedformat==2) $namedformat = 4;
		}
		else
		{
			return $ts;
		}
	}
	else
	{
		return $ts;
	}
	if (!isset($year)) $year = 0; // dummy value for times
	if (!isset($month)) $month = 1;
	if (!isset($day)) $day = 1;
	if (!isset($hour)) $hour = 0;
	if (!isset($min)) $min = 0;
	if (!isset($sec)) $sec = 0;
	$uts = @mktime($hour, $min, $sec, $month, $day, $year);
	if ($uts < 0 || $uts == FALSE || // failed to convert
		(intval($year) == 0 && intval($month) == 0 && intval($day) == 0)) {
		$year = substr_replace("0000", $year, -1 * strlen($year));
		$month = substr_replace("00", $month, -1 * strlen($month));
		$day = substr_replace("00", $day, -1 * strlen($day));
		$hour = substr_replace("00", $hour, -1 * strlen($hour));
		$min = substr_replace("00", $min, -1 * strlen($min));
		$sec = substr_replace("00", $sec, -1 * strlen($sec));
		$DefDateFormat = str_replace("yyyy", $year, UP_DEFAULT_DATE_FORMAT);
		$DefDateFormat = str_replace("mm", $month, $DefDateFormat);
		$DefDateFormat = str_replace("dd", $day, $DefDateFormat);
		switch ($namedformat) {
			case 0:
				return $DefDateFormat." $hour:$min:$sec";
				break;
			case 1://unsupported, return general date
				return $DefDateFormat." $hour:$min:$sec";
				break;
			case 2:
				return $DefDateFormat;
				break;
			case 3:
				if (intval($hour)==0)
					return "12:$min:$sec AM";
				elseif (intval($hour)>0 && intval($hour)<12)
					return "$hour:$min:$sec AM";
				elseif (intval($hour)==12)
					return "$hour:$min:$sec PM";
				elseif (intval($hour)>12 && intval($hour)<=23)
					return (intval($hour)-12).":$min:$sec PM";
				else
					return "$hour:$min:$sec";
				break;
			case 4:
				return "$hour:$min:$sec";
				break;
			case 5:
				return "$year". UP_DATE_SEPARATOR . "$month" . UP_DATE_SEPARATOR . "$day";
				break;
			case 6:
				return "$month". UP_DATE_SEPARATOR ."$day" . UP_DATE_SEPARATOR . "$year";
				break;
			case 7:
				return "$day" . UP_DATE_SEPARATOR ."$month" . UP_DATE_SEPARATOR . "$year";
				break;
			case 8:
				return $DefDateFormat . (($hour == 0 && $min == 0 && $sec == 0) ? "" : " $hour:$min:$sec");
				break;
			case 9:
				return "$year". UP_DATE_SEPARATOR . "$month" . UP_DATE_SEPARATOR . "$day $hour:$min:$sec";
				break;
			case 10:
				return "$month". UP_DATE_SEPARATOR ."$day" . UP_DATE_SEPARATOR . "$year $hour:$min:$sec";
				break;
			case 11:
				return "$day" . UP_DATE_SEPARATOR ."$month" . UP_DATE_SEPARATOR . "$year $hour:$min:$sec";
				break;
			case 12:
				return substr($year,-2) . UP_DATE_SEPARATOR . $month . UP_DATE_SEPARATOR . $day;
				break;
			case 13:
				return substr($year,-2) . UP_DATE_SEPARATOR . $month . UP_DATE_SEPARATOR . $day;
				break;
			case 14:
				return substr($year,-2) . UP_DATE_SEPARATOR . $month . UP_DATE_SEPARATOR . $day;
				break;
		}
	} else {
		$DefDateFormat = str_replace("yyyy", $year, UP_DEFAULT_DATE_FORMAT);
		$DefDateFormat = str_replace("mm", $month, $DefDateFormat);
		$DefDateFormat = str_replace("dd", $day, $DefDateFormat);
		switch ($namedformat) {
			case 0:
				return strftime($DefDateFormat." %H:%M:%S", $uts);
				break;
			case 1:
				return strftime("%A, %B %d, %Y", $uts);
				break;
			case 2:
				return strftime($DefDateFormat, $uts);
				break;
			case 3:
				return strftime("%I:%M:%S %p", $uts);
				break;
			case 4:
				return strftime("%H:%M:%S", $uts);
				break;
			case 5:
				return strftime("%Y" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%d", $uts);
				break;
			case 6:
				return strftime("%m" . UP_DATE_SEPARATOR . "%d" . UP_DATE_SEPARATOR . "%Y", $uts);
				break;
			case 7:
				return strftime("%d" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%Y", $uts);
				break;
			case 8:
				return strftime($DefDateFormat . (($hour == 0 && $min == 0 && $sec == 0) ? "" : " %H:%M:%S"), $uts);
				break;
			case 9:
				return strftime("%Y" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%d %H:%M:%S", $uts);
				break;
			case 10:
				return strftime("%m" . UP_DATE_SEPARATOR . "%d" . UP_DATE_SEPARATOR . "%Y %H:%M:%S", $uts);
				break;
			case 11:
				return strftime("%d" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%Y %H:%M:%S", $uts);
				break;
			case 12:
				return strftime("%y" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%d", $uts);
				break;
			case 13:
				return strftime("%m" . UP_DATE_SEPARATOR . "%d" . UP_DATE_SEPARATOR . "%y", $uts);
				break;
			case 14:
				return strftime("%d" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%y", $uts);
				break;
			case 15:
				return strftime("%y" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%d %H:%M:%S", $uts);
				break;
			case 16:
				return strftime("%m" . UP_DATE_SEPARATOR . "%d" . UP_DATE_SEPARATOR . "%y %H:%M:%S", $uts);
				break;
			case 17:
				return strftime("%d" . UP_DATE_SEPARATOR . "%m" . UP_DATE_SEPARATOR . "%y %H:%M:%S", $uts);
				break;
		}
	}
}

// Format currency
// Arguments: Expression [,NumDigitsAfterDecimal [,IncludeLeadingDigit [,UseParensForNegativeNumbers [,GroupDigits]]]])
// NumDigitsAfterDecimal is the numeric value indicating how many places to the
// right of the decimal are displayed
// -1 Use Default
// The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
// arguments have the following settings:
// -1 True
// 0 False
// -2 Use Default
function up_FormatCurrency($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit = -2, $UseParensForNegativeNumbers = -2, $GroupDigits = -2) {

	// export the values returned by localeconv into the local scope
	if (!UP_USE_DEFAULT_LOCALE) {
		extract(localeconv());
		if (UP_CHARSET == "utf-8") {
			if ($int_curr_symbol == "EUR" && ord($currency_symbol) == 128) {
				$currency_symbol = "\xe2\x82\xac";
			} elseif ($int_curr_symbol == "GBP" && ord($currency_symbol) == 163) {
				$currency_symbol = "\xc2\xa3";
			}
		}
	}

	// set defaults if locale is not set
	if (empty($decimal_point)) $decimal_point = DEFAULT_DECIMAL_POINT;
	if (empty($thousands_sep)) $thousands_sep = DEFAULT_THOUSANDS_SEP;
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$mon_thousands_sep = "";
	}

	// start by formatting the unsigned number
	$number = number_format(abs($amount),
							$frac_digits,
							$mon_decimal_point,
							$mon_thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;

		// "extracts" the boolean value as an integer
		$n_cs_precedes  = intval($n_cs_precedes  == true);
		$n_sep_by_space = intval($n_sep_by_space == true);
		$key = $n_cs_precedes . $n_sep_by_space . $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$p_cs_precedes  = intval($p_cs_precedes  == true);
		$p_sep_by_space = intval($p_sep_by_space == true);
		$key = $p_cs_precedes . $p_sep_by_space . $p_sign_posn;
	}
	$formats = array(

	  // currency symbol is after amount
	  // no space between amount and sign

	  '000' => '(%s' . $currency_symbol . ')',
	  '001' => $sign . '%s ' . $currency_symbol,
	  '002' => '%s' . $currency_symbol . $sign,
	  '003' => '%s' . $sign . $currency_symbol,
	  '004' => '%s' . $sign . $currency_symbol,

	  // one space between amount and sign
	  '010' => '(%s ' . $currency_symbol . ')',
	  '011' => $sign . '%s ' . $currency_symbol,
	  '012' => '%s ' . $currency_symbol . $sign,
	  '013' => '%s ' . $sign . $currency_symbol,
	  '014' => '%s ' . $sign . $currency_symbol,

	  // currency symbol is before amount
	  // no space between amount and sign

	  '100' => '(' . $currency_symbol . '%s)',
	  '101' => $sign . $currency_symbol . '%s',
	  '102' => $currency_symbol . '%s' . $sign,
	  '103' => $sign . $currency_symbol . '%s',
	  '104' => $currency_symbol . $sign . '%s',

	  // one space between amount and sign
	  '110' => '(' . $currency_symbol . ' %s)',
	  '111' => $sign . $currency_symbol . ' %s',
	  '112' => $currency_symbol . ' %s' . $sign,
	  '113' => $sign . $currency_symbol . ' %s',
	  '114' => $currency_symbol . ' ' . $sign . '%s');

  // lookup the key in the above array
	return sprintf($formats[$key], $number);
}

// Format number
// Arguments: Expression [,NumDigitsAfterDecimal [,IncludeLeadingDigit [,UseParensForNegativeNumbers [,GroupDigits]]]])
// NumDigitsAfterDecimal is the numeric value indicating how many places to the
// right of the decimal are displayed
// -1 Use Default
// The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
// arguments have the following settings:
// -1 True
// 0 False
// -2 Use Default
function up_FormatNumber($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit = -2, $UseParensForNegativeNumbers = -2, $GroupDigits = -2) {

	// export the values returned by localeconv into the local scope
	if (!UP_USE_DEFAULT_LOCALE) extract(localeconv());

	// set defaults if locale is not set
	if (empty($decimal_point)) $decimal_point = DEFAULT_DECIMAL_POINT;
	if (empty($thousands_sep)) $thousands_sep = DEFAULT_THOUSANDS_SEP;
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$thousands_sep = DEFAULT_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$thousands_sep = "";
	}

	// start by formatting the unsigned number
	$number = number_format(abs($amount),
						  $frac_digits,
						  $decimal_point,
						  $thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;
		$key = $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$key = $p_sign_posn;
	}
	$formats = array(
		'0' => '(%s)',
		'1' => $sign . '%s',
		'2' => $sign . '%s',
		'3' => $sign . '%s',
		'4' => $sign . '%s');

	// lookup the key in the above array
	return sprintf($formats[$key], $number);
}

// Format percent
// Arguments: Expression [,NumDigitsAfterDecimal [,IncludeLeadingDigit	[,UseParensForNegativeNumbers [,GroupDigits]]]])
// NumDigitsAfterDecimal is the numeric value indicating how many places to the
// right of the decimal are displayed
// -1 Use Default
// The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
// arguments have the following settings:
// -1 True
// 0 False
// -2 Use Default
function up_FormatPercent($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit = -2, $UseParensForNegativeNumbers = -2, $GroupDigits = -2) {

	// export the values returned by localeconv into the local scope
	if (!UP_USE_DEFAULT_LOCALE) extract(localeconv());

	// set defaults if locale is not set
	if (empty($decimal_point)) $decimal_point = DEFAULT_DECIMAL_POINT;
	if (empty($thousands_sep)) $thousands_sep = DEFAULT_THOUSANDS_SEP;
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$thousands_sep = DEFAULT_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$thousands_sep = "";
	}

	// start by formatting the unsigned number
	$number = number_format(abs($amount)*100,
							$frac_digits,
							$decimal_point,
							$thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;
		$key = $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$key = $p_sign_posn;
	}
	$formats = array(
		'0' => '(%s%%)',
		'1' => $sign . '%s%%',
		'2' => $sign . '%s%%',
		'3' => $sign . '%s%%',
		'4' => $sign . '%s%%');

	// lookup the key in the above array
	return sprintf($formats[$key], $number);
}

// Encode value for single-quoted JavaScript string
function up_JsEncode($val) {
	$val = str_replace("\\", "\\\\", strval($val));
	$val = str_replace("'", "\\'", $val);
	$val = str_replace("\r\n", "<br>", $val);
	$val = str_replace("\r", "<br>", $val);
	$val = str_replace("\n", "<br>", $val);
	return $val;
}

// Generate Value Separator based on current row index
// rowidx - zero based row index
// dispidx - zero based display index
// fld - field object
function up_ValueSeparator($rowidx, $dispidx, &$fld) {
	return ", ";
}

// Generate View Option Separator based on current option count (Multi-Select / CheckBox)
// optidx - zero based option index
function up_ViewOptionSeparator($optidx) {
	return ", ";
}

// Move uploaded file
function up_MoveUploadFile($srcfile, $destfile) {
	$res = move_uploaded_file($srcfile, $destfile);
	if ($res) chmod($destfile, UP_UPLOADED_FILE_MODE);
	return $res;
}

// Render repeat column table
// $rowcnt - zero based row count
function up_RepeatColumnTable($totcnt, $rowcnt, $repeatcnt, $rendertype) {
	$sWrk = "";
	if ($rendertype == 1) { // Render control start
		if ($rowcnt == 0) $sWrk .= "<table class=\"" . UP_ITEM_TABLE_CLASSNAME . "\">";
		if ($rowcnt % $repeatcnt == 0) $sWrk .= "<tr>";
		$sWrk .= "<td>";
	} elseif ($rendertype == 2) { // Render control end
		$sWrk .= "</td>";
		if ($rowcnt % $repeatcnt == $repeatcnt - 1) {
			$sWrk .= "</tr>";
		} elseif ($rowcnt == $totcnt - 1) {
			for ($i = ($rowcnt % $repeatcnt) + 1; $i < $repeatcnt; $i++) {
				$sWrk .= "<td>&nbsp;</td>";
			}
			$sWrk .= "</tr>";
		}
		if ($rowcnt == $totcnt - 1) $sWrk .= "</table>";
	}
	return $sWrk;
}

// Truncate Memo Field based on specified length, string truncated to nearest space or CrLf
function up_TruncateMemo($memostr, $ln, $removehtml) {
	$str = ($removehtml) ? up_RemoveHtml($memostr) : $memostr;
	if (strlen($str) > 0 && strlen($str) > $ln) {
		$k = 0;
		while ($k >= 0 && $k < strlen($str)) {
			$i = strpos($str, " ", $k);
			$j = strpos($str, chr(10), $k);
			if ($i === FALSE && $j === FALSE) { // Not able to truncate
				return $str;
			} else {

				// Get nearest space or CrLf
				if ($i > 0 && $j > 0) {
					if ($i < $j) {
						$k = $i;
					} else {
						$k = $j;
					}
				} elseif ($i > 0) {
					$k = $i;
				} elseif ($j > 0) {
					$k = $j;
				}

				// Get truncated text
				if ($k >= $ln) {
					return substr($str, 0, $k) . "...";
				} else {
					$k++;
				}
			}
		}
	} else {
		return $str;
	}
}

// Remove HTML tags from text
function up_RemoveHtml($str) {
	return preg_replace('/<[^>]*>/', '', strval($str));
}

// Include PHPMailer class if selected
if (UP_EMAIL_COMPONENT == "PHPMAILER") {
	include_once("phpmailer51/class.phpmailer.php");
}

// Function to send email
function up_SendEmail($sFrEmail, $sToEmail, $sCcEmail, $sBccEmail, $sSubject, $sMail, $sFormat, $sCharset, $sAttachmentFileName = "", $sAttachmentContent = "") {
	global $Language, $gsEmailErrDesc;
	$res = FALSE;
	if (UP_EMAIL_COMPONENT == "PHPMAILER") {
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->Host = UP_SMTP_SERVER;
		$mail->SMTPAuth = (UP_SMTP_SERVER_USERNAME <> "" && UP_SMTP_SERVER_PASSWORD <> "");
		$mail->Username = UP_SMTP_SERVER_USERNAME;
		$mail->Password = UP_SMTP_SERVER_PASSWORD;
		$mail->Port = UP_SMTP_SERVER_PORT;
		$mail->From = $sFrEmail;
		$mail->FromName = $sFrEmail;
		$mail->Subject = $sSubject;
		$mail->Body = $sMail;
		if ($sCharset <> "" && strtolower($sCharset) <> "iso-8859-1")
			$mail->CharSet = $sCharset;
		$sToEmail = str_replace(";", ",", $sToEmail);
		$arrTo = explode(",", $sToEmail);
		foreach ($arrTo as $sTo) {
			$mail->AddAddress(trim($sTo));
		}
		if ($sCcEmail <> "") {
			$sCcEmail = str_replace(";", ",", $sCcEmail);
			$arrCc = explode(",", $sCcEmail);
			foreach ($arrCc as $sCc) {
				$mail->AddCC(trim($sCc));
			}
		}
		if ($sBccEmail <> "") {
			$sBccEmail = str_replace(";", ",", $sBccEmail);
			$arrBcc = explode(",", $sBccEmail);
			foreach ($arrBcc as $sBcc) {
				$mail->AddBCC(trim($sBcc));
			}
		}
		if (strtolower($sFormat) == "html") {
			$mail->ContentType = "text/html";
		} else {
			$mail->ContentType = "text/plain";
		}
		if ($sAttachmentContent <> "" && $sAttachmentFileName <> "") {
			$mail->AddStringAttachment($sAttachmentContent, $sAttachmentFileName);
		} else if ($sAttachmentFileName <> "") {
			$mail->AddAttachment($sAttachmentFileName);
		}
		$res = $mail->Send();
		$gsEmailErrDesc = $mail->ErrorInfo;

		// Uncomment to debug
//		var_dump($mail); exit();

	} else {
		$to  = $sToEmail;
		$subject = $sSubject;
		$message = $sMail;

		// header
		$headers = "MIME-Version: 1.0" . "\r\n";
		$content_type = (strtolower($sFormat) == "html") ? "text/html" : "text/plain";
		if ($sCharset <> "")
			$content_type .= "; charset=" . $sCharset;
		$headers .= "Content-type: " . $content_type . "\r\n";
		if (function_exists("quoted_printable_encode")) {
			$headers .= "Content-Transfer-Encoding: quoted-printable\r\n";
			$message = quoted_printable_encode($message);
		}
		$headers .= "From: " . str_replace(";", ",", $sFrEmail) . "\r\n";
		if ($sCcEmail <> "")
			$headers .= "Cc: " . str_replace(";", ",", $sCcEmail) . "\r\n";
		if ($sBccEmail <>"")
			$headers .= "Bcc: " . str_replace(";", ",", $sBccEmail) . "\r\n";
		if (UP_IS_WINDOWS) {
			if (UP_SMTP_SERVER <> "")
				ini_set("SMTP", UP_SMTP_SERVER);
			if (is_int(UP_SMTP_SERVER_PORT))
				ini_set("smtp_port", UP_SMTP_SERVER_PORT);
		}
		ini_set("sendmail_from", $sFrEmail);
		if ($sCharset <> "") {
			$res = mail($to, '=?' . strtolower($sCharset) . '?B?' . base64_encode($subject) . '?=', $message, $headers);
		} else {
			$res = mail($to, $subject, $message, $headers);
		}
		$gsEmailErrDesc = ($res) ? $Language->Phrase("FailedToSendMail") : "";

		// Uncomment to debug
//		echo "Header: " . $headers . "<br>" . "Subject: " . $subject . "<br>" .
//			"To: " . $to . "<br>" .	"Body: " . $message . "<br>";	exit();

	}
	return $res;
}

// Load content at URL
// Arguments:
// url: URL to send reqeust
// method: "GET" or "POST"
// postdata: POST data
// Note: CURL must be enabled
function up_LoadContentFromUrl($url, $method = "GET", $postdata = "") {
	$fp = "";
	if (function_exists("curl_init")) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		if (strtoupper(trim($method)) == "POST")
			curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$fp = curl_exec($ch);
		curl_close($ch);
	}
	return trim($fp);
}

// Field data type
function up_FieldDataType($fldtype) {
	switch ($fldtype) {
		case 20:
		case 3:
		case 2:
		case 16:
		case 4:
		case 5:
		case 131:
		case 139:
		case 6:
		case 17:
		case 18:
		case 19:
		case 21: // Numeric
			return UP_DATATYPE_NUMBER;
		case 7:
		case 133:
		case 135: // Date
		case 146: // DateTiemOffset
			return UP_DATATYPE_DATE;
		case 134: // Time
		case 145: // Time
			return UP_DATATYPE_TIME;
		case 201:
		case 203: // Memo
			return UP_DATATYPE_MEMO;
		case 129:
		case 130:
		case 200:
		case 202: // String
			return UP_DATATYPE_STRING;
		case 11: // Boolean
			return UP_DATATYPE_BOOLEAN;
		case 72: // GUID
			return UP_DATATYPE_GUID;
		case 128:
		case 204:
		case 205: // Binary
			return UP_DATATYPE_BLOB;
		case 141: // XML
			return UP_DATATYPE_XML;
		default:
			return UP_DATATYPE_OTHER;
	}
}

// Application root
function up_AppRoot() {

	// 1. use root relative path
	if (UP_ROOT_RELATIVE_PATH <> "") {
		$Path = realpath(UP_ROOT_RELATIVE_PATH);
		$Path = str_replace("\\\\", UP_PATH_DELIMITER, $Path);
	}

	// 2. if empty, use the document root if available
	if (empty($Path))
		$Path = up_ServerVar("APPL_PHYSICAL_PATH"); // IIS
	if (empty($Path))
		$Path = up_ServerVar("DOCUMENT_ROOT");

	// 3. if empty, use current folder
	if (empty($Path))
		$Path = realpath(".");

	// 4. use custom path, uncomment the following line and enter your path
	// e.g. $Path = 'C:\Inetpub\wwwroot\MyWebRoot'; // Windows
	//$Path = 'enter your path here';

	if (empty($Path))
		die("Path of website root unknown.");
	return up_IncludeTrailingDelimiter($Path, TRUE);
}

// Get path relative to application root
function up_ServerMapPath($Path) {
	return up_PathCombine(up_AppRoot(), $Path, TRUE);
}

// Get path relative to a base path
function up_PathCombine($BasePath, $RelPath, $PhyPath) {
	$BasePath = up_RemoveTrailingDelimiter($BasePath, $PhyPath);
	if ($PhyPath) {
		$Delimiter = UP_PATH_DELIMITER;
		$RelPath = str_replace('/', UP_PATH_DELIMITER, $RelPath);
		$RelPath = str_replace('\\', UP_PATH_DELIMITER, $RelPath);
	} else {
		$Delimiter = '/';
		$RelPath = str_replace('\\', '/', $RelPath);
	}
	if ($RelPath == '.' || $RelPath == '..') $RelPath .= $Delimiter;
	$p1 = strpos($RelPath, $Delimiter);
	$Path2 = "";
	while ($p1 !== FALSE) {
		$Path = substr($RelPath, 0, $p1 + 1);
		if ($Path == $Delimiter || $Path == ".$Delimiter") {

			// Skip
		} elseif ($Path == "..$Delimiter") {
			$p2 = strrpos($BasePath, $Delimiter);
			if ($p2 !== FALSE) $BasePath = substr($BasePath, 0, $p2);
		} else {
			$Path2 .= $Path;
		}
		$RelPath = substr($RelPath, $p1+1);
		if ($RelPath === FALSE) {
			$RelPath = "";
		} elseif ($RelPath == '.' || $RelPath == '..') {
			$RelPath .= $Delimiter;
		}
		$p1 = strpos($RelPath, $Delimiter);
	}
	return up_IncludeTrailingDelimiter($BasePath, $PhyPath) . $Path2 . $RelPath;
}

// Remove the last delimiter for a path
function up_RemoveTrailingDelimiter($Path, $PhyPath) {
	$Delimiter = ($PhyPath) ? UP_PATH_DELIMITER : '/';
	while (substr($Path, -1) == $Delimiter)
		$Path = substr($Path, 0, strlen($Path)-1);
	return $Path;
}

// Include the last delimiter for a path
function up_IncludeTrailingDelimiter($Path, $PhyPath) {
	$Path = up_RemoveTrailingDelimiter($Path, $PhyPath);
	$Delimiter = ($PhyPath) ? UP_PATH_DELIMITER : '/';
	return $Path . $Delimiter;
}

// Write the paths for config/debug only
function up_WritePaths() {
	echo 'DOCUMENT_ROOT=' . up_ServerVar("DOCUMENT_ROOT") . "<br>";
	echo 'UP_ROOT_RELATIVE_PATH=' . UP_ROOT_RELATIVE_PATH . "<br>";
	echo 'up_AppRoot()=' . up_AppRoot() . "<br>";
	echo 'realpath(".")=' . realpath(".") . "<br>";
	echo '__FILE__=' . __FILE__ . "<br>";
}

// Upload path
// If PhyPath is TRUE(1), return physical path on the server
// If PhyPath is FALSE(0), return relative URL
function up_UploadPathEx($PhyPath, $DestPath) {
	if ($PhyPath) {
		$Path = up_PathCombine(up_AppRoot(), str_replace("/", UP_PATH_DELIMITER, $DestPath), TRUE);
	} else {
		$Path = up_ScriptName();
		$Path = substr($Path, 0, strrpos($Path, "/"));
		$Path = up_PathCombine($Path, UP_ROOT_RELATIVE_PATH, FALSE);
		$Path = up_PathCombine(up_IncludeTrailingDelimiter($Path, FALSE), $DestPath, FALSE);
	}
	return up_IncludeTrailingDelimiter($Path, $PhyPath);
}

// Global upload path
// If PhyPath is TRUE(1), return physical path on the server
// If PhyPath is FALSE(0), return relative URL
function up_UploadPath($PhyPath) {
	return up_UploadPathEx($PhyPath, UP_UPLOAD_DEST_PATH);
}

// Upload file name
function up_UploadFileNameEx($folder, $sFileName) {

	// By default, up_UniqueFileName() is used to get an unique file name,
	// you can change the logic here

	$sOutFileName = up_UniqueFilename($folder, $sFileName);

	// Return computed output file name
	return $sOutFileName;
}

// Generate an unique file name (filename(n).ext)
function up_UniqueFilename($folder, $orifn) {
	if ($orifn == "") $orifn = up_DefaultFileName();
	$orifn = str_replace(" ", "_", $orifn);
	$orifn = strtolower(basename($orifn));
	$destpath = $folder . $orifn;
	$newfn = $orifn;
	$i = 1;
	if (!file_exists($folder)) {
		if (!up_CreateFolder($folder)) {
			die("Folder does not exist: " . $folder);
		}
	}
	while (file_exists(up_Convert(UP_ENCODING, UP_FILE_SYSTEM_ENCODING, $destpath))) {
		$file_extension = strtolower(strrchr($orifn, "."));
		$file_name = basename($orifn, $file_extension);
		$newfn = $file_name . "($i)" . $file_extension;
		$destpath = $folder . $newfn;
		$i++;
	}
	return $newfn;
}

// Create a default file name(yyyymmddhhmmss.bin)
function up_DefaultFileName() {
	return date("YmdHis") . ".bin";
}

// Get refer page name
function up_ReferPage() {
	return up_GetPageName(up_ServerVar("HTTP_REFERER"));
}

// Get script physical folder
function up_ScriptFolder() {
	$folder = "";
	$path = up_ServerVar("SCRIPT_FILENAME");
	$p = strrpos($path, UP_PATH_DELIMITER);
	if ($p !== FALSE)
		$folder = substr($path, 0, $p);
	return ($folder <> "") ? $folder : realpath(".");
}

// Get a temp folder for temp file
function up_TmpFolder() {
	$tmpfolder = NULL;
	$folders = array();
	if (UP_IS_WINDOWS) {
		$folders[] = up_ServerVar("TEMP");
		$folders[] = up_ServerVar("TMP");
	} else {
		if (UP_UPLOAD_TMP_PATH <> "") $folders[] = up_AppRoot() . str_replace("/", UP_PATH_DELIMITER, UP_UPLOAD_TMP_PATH);
		$folders[] = '/tmp';
	}
	if (ini_get('upload_tmp_dir')) {
		$folders[] = ini_get('upload_tmp_dir');
	}
	foreach ($folders as $folder) {
		if (!$tmpfolder && is_dir($folder)) {
			$tmpfolder = $folder;
		}
	}

	//if ($tmpfolder) $tmpfolder = up_IncludeTrailingDelimiter($tmpfolder, TRUE);
	return $tmpfolder;
}

// Create folder
function up_CreateFolder($dir, $mode = 0777) {
  if (is_dir($dir) || @mkdir($dir, $mode))
		return TRUE;
  if (!up_CreateFolder(dirname($dir), $mode))
		return FALSE;
  return @mkdir($dir, $mode);
}

// Save file
function up_SaveFile($folder, $fn, $filedata) {
	$fn = up_Convert(UP_ENCODING, UP_FILE_SYSTEM_ENCODING, $fn);
	$res = FALSE;
	if (up_CreateFolder($folder)) {
		if ($handle = fopen($folder . $fn, 'w')) { // P6
			$res = fwrite($handle, $filedata);
    	fclose($handle);
		}
		if ($res)
			chmod($folder . $fn, UP_UPLOADED_FILE_MODE);
	}
	return $res;
}

// function to generate random number
function up_Random() {
	return mt_rand();
}

// function to remove CR and LF
function up_RemoveCrLf($s) {
	if (strlen($s) > 0) {
		$s = str_replace("\n", " ", $s);
		$s = str_replace("\r", " ", $s);
		$s = str_replace("\l", " ", $s);
	}
	return $s;
}

// Calculate field hash
function up_GetFldHash($value) {
	return md5(up_GetFldValueAsString($value));
}

// Get field value as string
function up_GetFldValueAsString($value) {
	if (is_null($value)) {
		return "";
	} else {
		if (strlen($value) > 65535) { // BLOB/TEXT
			if (UP_BLOB_FIELD_BYTE_COUNT > 0) {
				return substr($value, 0, UP_BLOB_FIELD_BYTE_COUNT);
			} else {
				return $value;
			}
		} else {
			return strval($value);
		}
	}
}

// Convert byte array to binary string
function up_BytesToStr($bytes) {
	$str = "";
	foreach ($bytes as $byte)
		$str .= chr($byte);
	return $str;
}

// Convert binary string to byte array
function up_StrToBytes($str) {
	$cnt = strlen($str);
	$bytes = array();
	for ($i = 0; $i < $cnt; $i++)
		$bytes[] = ord($str[$i]);
	return $bytes;
}

// Create temp image file from binary data
function up_TmpImage(&$filedata) {
	global $gTmpImages;

//  $f = tempnam(up_TmpFolder(), "tmp");
	$folder = up_AppRoot() . UP_UPLOAD_DEST_PATH;
	$f = tempnam($folder, "tmp");
	$handle = fopen($f, 'w+');
	fwrite($handle, $filedata);
	fclose($handle);
	$info = getimagesize($f);
	switch ($info[2]) {
	case 1:
		rename($f, $f .= '.gif'); break;
	case 2:
		rename($f, $f .= '.jpg'); break;
	case 3:
		rename($f, $f .= '.png'); break;
	default:
		return "";
	}
	$tmpimage = basename($f);
	$gTmpImages[] = $tmpimage;
	return UP_UPLOAD_DEST_PATH . $tmpimage;
}

// Delete temp images
function up_DeleteTmpImages() {
	global $gTmpImages;
	foreach ($gTmpImages as $tmpimage)
		@unlink(up_AppRoot() . UP_UPLOAD_DEST_PATH . $tmpimage);
}

// Create temp file
function up_TmpFile($file) {
	global $gTmpImages;
	if (file_exists($file)) { // Copy only

//  	$f = tempnam(up_TmpFolder(), "tmp");
		$folder = up_AppRoot() . UP_UPLOAD_DEST_PATH;
		$f = tempnam($folder, "tmp");
		@unlink($f);
		$info = pathinfo($file);
		if ($info["extension"] <> "")
			$f .= "." . $info["extension"];
		copy($file, $f);
		$tmpimage = basename($f);
		$gTmpImages[] = $tmpimage;
		return UP_UPLOAD_DEST_PATH . $tmpimage;
	} else {
		return "";
	}
}
?>
<?php

// jQuery files host
function up_jQueryHost() {

	// Use files online
	if (up_IsHttps()) {
		return "https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/";
	} else {
		return "http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/";
	}
}
?>
<?php

/**
 * Form class
 */

class cFormObj {
	var $Index;

	// Constructor
	function cFormObj() {
		$this->Index = 0;
	}

	// Get form element name based on index
	function GetIndexedName($name) {
		if ($this->Index <= 0) {
			return $name;
		} else {
			return substr($name, 0, 1) . $this->Index . substr($name, 1);
		}
	}

	// Has value for form element
	function HasValue($name) {
		$wrkname = $this->GetIndexedName($name);
		return isset($_POST[$wrkname]);
	}

	// Get value for form element
	function GetValue($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_POST[$wrkname];
	}

	// Get upload file size
	function GetUploadFileSize($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_FILES[$wrkname]['size'];
	}

	// Get upload file name
	function GetUploadFileName($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_FILES[$wrkname]['name'];
	}

	// Get file content type
	function GetUploadFileContentType($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_FILES[$wrkname]['type'];
	}

	// Get file error
	function GetUploadFileError($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_FILES[$wrkname]['error'];
	}

	// Get file temp name
	function GetUploadFileTmpName($name) {
		$wrkname = $this->GetIndexedName($name);
		return @$_FILES[$wrkname]['tmp_name'];
	}

	// Check if is upload file
	function IsUploadedFile($name) {
		$wrkname = $this->GetIndexedName($name);
		return is_uploaded_file(@$_FILES[$wrkname]["tmp_name"]);
	}

	// Get upload file data
	function GetUploadFileData($name) {
		if ($this->IsUploadedFile($name)) {
			$wrkname = $this->GetIndexedName($name);
			return file_get_contents($_FILES[$wrkname]["tmp_name"]);
		} else {
			return NULL;
		}
	}

	function GetUploadImageSize($name) {
		$wrkname = $this->GetIndexedName($name);
		return @getimagesize($_FILES[$wrkname]['tmp_name']);
	}
}
?>
<?php

/**
 * Functions for image resize
 */

// Resize binary to thumbnail
function up_ResizeBinary($filedata, &$width, &$height, $quality) {
	return TRUE; // No resize
}

// Resize file to thumbnail file
function up_ResizeFile($fn, $tn, &$width, &$height, $quality) {
	if (file_exists($fn)) { // Copy only
		return ($fn <> $tn) ? copy($fn, $tn) : TRUE;
	} else {
		return FALSE;
	}
}

// Resize file to binary
function up_ResizeFileToBinary($fn, &$width, &$height, $quality) {
	return file_get_contents($fn); // Return original file content only
}
?>
<?php

/**
 * Functions for search
 */

// Highlight value based on basic search / advanced search keywords
function up_Highlight($name, $src, $bkw, $bkwtype, $akw) {
	$outstr = "";
	if (strlen($src) > 0 && (strlen($bkw) > 0 || strlen($akw) > 0)) {
		$xx = 0;
		$yy = strpos($src, "<", $xx);
		if ($yy === FALSE) $yy = strlen($src);
		while ($yy >= 0) {
			if ($yy > $xx) {
				$wrksrc = substr($src, $xx, $yy - $xx);
				$kwstr = trim($bkw);
				if (strlen($bkw) > 0 && strlen($bkwtype) == 0) { // check for exact phase
        	$kwlist = array($kwstr); // use single array element
        } else {
					$kwlist = explode(" ", $kwstr);
				}
				if (strlen($akw) > 0)
					$kwlist[] = $akw;
				$x = 0;
				up_GetKeyword($wrksrc, $kwlist, $x, $y, $kw);
				while ($y >= 0) {
					$outstr .= substr($wrksrc, $x, $y-$x) .
						"<span name=\"$name\" id=\"$name\" class=\"upHighlightSearch\">" .
						substr($wrksrc, $y, strlen($kw)) . "</span>";
					$x = $y + strlen($kw);
					up_GetKeyword($wrksrc, $kwlist, $x, $y, $kw);
				}
				$outstr .= substr($wrksrc, $x);
				$xx += strlen($wrksrc);
			}
			if ($xx < strlen($src)) {
				$yy = strpos($src, ">", $xx);
				if ($yy !== FALSE) {
					$outstr .= substr($src, $xx, $yy - $xx + 1);
					$xx = $yy + 1;
					$yy = strpos($src, "<", $xx);
					if ($yy === FALSE) $yy = strlen($src);
				} else {
					$outstr .= substr($src, $xx);
					$yy = -1;
				}
			} else {
				$yy = -1;
			}
		}	
	} else {
		$outstr = $src;
	}
	return $outstr;
}

// Get keyword
function up_GetKeyword(&$src, &$kwlist, &$x, &$y, &$kw) {
	$thisy = -1;
	$thiskw = "";
	foreach ($kwlist as $wrkkw) {
		$wrkkw = trim($wrkkw);
		if ($wrkkw <> "") {
			if (UP_HIGHLIGHT_COMPARE) { // Case-insensitive
				$wrky = stripos($src, $wrkkw, $x);
			} else {
				$wrky = strpos($src, $wrkkw, $x);
			}
			if ($wrky !== FALSE) {
				if ($thisy == -1) {
					$thisy = $wrky;
					$thiskw = $wrkkw;
				} elseif ($wrky < $thisy) {
					$thisy = $wrky;
					$thiskw = $wrkkw;
				}
			}
		}
	}
	$y = $thisy;
	$kw = $thiskw;
}
?>
<?php

/**
 * Functions for Auto-Update fields
 */

// Get user IP
function up_CurrentUserIP() {
	return up_ServerVar("REMOTE_ADDR");
}

// Get current host name, e.g. "www.mycompany.com"
function up_CurrentHost() {
	return up_ServerVar("HTTP_HOST");
}

// Get current date in default date format
// $namedformat = -1|5|6|7 (see comment for up_FormatDateTime)
function up_CurrentDate($namedformat = -1) {
	if (in_array($namedformat, array(5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17))) {
		if ($namedformat == 5 || $namedformat == 9 || $namedformat == 12 || $namedformat == 15) {
			$DT = up_FormatDateTime(date('Y-m-d'), 5);
		} elseif ($namedformat == 6 || $namedformat == 10 || $namedformat == 13 || $namedformat == 16) {
			$DT = up_FormatDateTime(date('Y-m-d'), 6);
		} else {
			$DT = up_FormatDateTime(date('Y-m-d'), 7);
		}
		return $DT;
	} else {
		return date('Y-m-d');
	}
}

// Get current time in hh:mm:ss format
function up_CurrentTime() {
	return date("H:i:s");
}

// Get current date in default date format with time in hh:mm:ss format
// $namedformat = -1, 5-7, 9-11 (see comment for up_FormatDateTime)
function up_CurrentDateTime($namedformat = -1) {
	if (in_array($namedformat, array(5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17))) {
		if ($namedformat == 5 || $namedformat == 9 || $namedformat == 12 || $namedformat == 15) {
			$DT = up_FormatDateTime(date('Y-m-d H:i:s'), 9);
		} elseif ($namedformat == 6 || $namedformat == 10 || $namedformat == 13 || $namedformat == 16) {
			$DT = up_FormatDateTime(date('Y-m-d H:i:s'), 10);
		} else {
			$DT = up_FormatDateTime(date('Y-m-d H:i:s'), 11);
		}
		return $DT;
	} else {
		return date('Y-m-d H:i:s');
	}
}

// Get current date in standard format (yyyy/mm/dd)
function up_StdCurrentDate() {
	return date('Y/m/d');
}

// Get date in standard format (yyyy/mm/dd)
function up_StdDate($ts) {
	return date('Y/m/d', $ts);
}

// Get current date and time in standard format (yyyy/mm/dd hh:mm:ss)
function up_StdCurrentDateTime() {
	return date('Y/m/d H:i:s');
}

// Get date/time in standard format (yyyy/mm/dd hh:mm:ss)
function up_StdDateTime($ts) {
	return date('Y/m/d H:i:s', $ts);
}

// Encrypt password
function up_EncryptPassword($input, $salt = '') {
	return (strval($salt) <> "") ? md5($input . $salt) . ":" . $salt : md5($input);
}

// Compare password
// Note: If salted, password must be stored in '<hashedstring>:<salt>' format
function up_ComparePassword($pwd, $input) {
	@list($crypt, $salt) = explode(":", $pwd, 2);
	if (UP_CASE_SENSITIVE_PASSWORD) {
		if (UP_ENCRYPTED_PASSWORD) {
			return ($pwd == up_EncryptPassword($input, @$salt));
		} else {
			return ($pwd == $input);
		}
	} else {
		if (UP_ENCRYPTED_PASSWORD) {
			return ($pwd == up_EncryptPassword(strtolower($input), @$salt));
		} else {
			return (strtolower($pwd) == strtolower($input));
		}
	}
}

/**
 * Functions for backward compatibilty
 */

// Get current user name
function CurrentUserName() {
	global $Security;
	return (isset($Security)) ? $Security->CurrentUserName() : strval(@$_SESSION[UP_SESSION_USER_NAME]);
}

// Get current user ID
function CurrentUserID() {
	global $Security;
	return (isset($Security)) ? $Security->CurrentUserID() : strval(@$_SESSION[UP_SESSION_USER_ID]);
}

// Get current parent user ID
function CurrentParentUserID() {
	global $Security;
	return (isset($Security)) ? $Security->CurrentParentUserID() : strval(@$_SESSION[UP_SESSION_PARENT_USER_ID]);
}

// Get current user level
function CurrentUserLevel() {
	global $Security;
	return (isset($Security)) ? $Security->CurrentUserLevelID() : @$_SESSION[UP_SESSION_USER_LEVEL_ID];
}

// Get current user level list
function CurrentUserLevelList() {
	global $Security;
	return (isset($Security)) ? $Security->UserLevelList() : strval(@$_SESSION[UP_SESSION_USER_LEVEL_ID]);
}

// Get Current user info
function CurrentUserInfo($fldname) {
	global $Security;
	if (isset($Security)) {
		return $Security->CurrentUserInfo($fldname);
	} elseif (defined("UP_USER_TABLE") && !IsSysAdmin()) {
		$user = CurrentUserName();
		if (strval($user) <> "")
			return up_ExecuteScalar("SELECT " . up_QuotedName($fldname) . " FROM " . UP_USER_TABLE . " WHERE " .
				str_replace("%u", up_AdjustSql($user), UP_USER_NAME_FILTER));
	}
	return NULL;
}

// Get current page ID
function CurrentPageID() {
	if (isset($GLOBALS["Page"])) {
		return $GLOBALS["Page"]->PageID;
	} elseif (defined("UP_PAGE_ID")) {
		return UP_PAGE_ID;
	}
	return "";
}

// Allow list
function AllowList($TableName) {
	global $Security;
	return $Security->AllowList($TableName);
}

// Allow add
function AllowAdd($TableName) {
	global $Security;
	return $Security->AllowAdd($TableName);
}

// Is password expired
function IsPasswordExpired() {
	global $Security;
	return (isset($Security)) ? $Security->IsPasswordExpired() : ($_SESSION[UP_SESSION_STATUS] == "passwordexpired");
}

// Is logging in
function IsLoggingIn() {
	global $Security;
	return (isset($Security)) ? $Security->IsLoggingIn() : ($_SESSION[UP_SESSION_STATUS] == "loggingin");
}

// Is logged in
function IsLoggedIn() {
	global $Security;
	return (isset($Security)) ? $Security->IsLoggedIn() : ($_SESSION[UP_SESSION_STATUS] == "login");
}

// Is system admin
function IsSysAdmin() {
	global $Security;
	return (isset($Security)) ? $Security->IsSysAdmin() : ($_SESSION[UP_SESSION_SYS_ADMIN] == 1);
}

/**
 * Functions for TEA encryption/decryption
 */

function long2str($v, $w) {
	$len = count($v);
	$s = array();
	for ($i = 0; $i < $len; $i++)
	{
		$s[$i] = pack("V", $v[$i]);
	}
	if ($w) {
		return substr(join('', $s), 0, $v[$len - 1]);
	}	else {
		return join('', $s);
	}
}

function str2long($s, $w) {
	$v = unpack("V*", $s. str_repeat("\0", (4 - strlen($s) % 4) & 3));
	$v = array_values($v);
	if ($w) {
		$v[count($v)] = strlen($s);
	}
	return $v;
}

// encrypt
function TEAencrypt($str, $key) {
	if ($str == "") {
		return "";
	}
	$v = str2long($str, true);
	$k = str2long($key, false);
	$cntk = count($k);
	if ($cntk < 4) {
		for ($i = $cntk; $i < 4; $i++) {
			$k[$i] = 0;
		}
	}
	$n = count($v) - 1;
	$z = $v[$n];
	$y = $v[0];
	$delta = 0x9E3779B9;
	$q = floor(6 + 52 / ($n + 1));
	$sum = 0;
	while (0 < $q--) {
		$sum = int32($sum + $delta);
		$e = $sum >> 2 & 3;
		for ($p = 0; $p < $n; $p++) {
			$y = $v[$p + 1];
			$mx = int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
			$z = $v[$p] = int32($v[$p] + $mx);
		}
		$y = $v[0];
		$mx = int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
		$z = $v[$n] = int32($v[$n] + $mx);
	}
	return up_UrlEncode(long2str($v, false));
}

// decrypt
function TEAdecrypt($str, $key) {
	$str = up_UrlDecode($str);
	if ($str == "") {
		return "";
	}
	$v = str2long($str, false);
	$k = str2long($key, false);
	$cntk = count($k);
	if ($cntk < 4) {
		for ($i = $cntk; $i < 4; $i++) {
			$k[$i] = 0;
		}
	}
	$n = count($v) - 1;
	$z = $v[$n];
	$y = $v[0];
	$delta = 0x9E3779B9;
	$q = floor(6 + 52 / ($n + 1));
	$sum = int32($q * $delta);
	while ($sum != 0) {
		$e = $sum >> 2 & 3;
		for ($p = $n; $p > 0; $p--) {
			$z = $v[$p - 1];
			$mx = int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
			$y = $v[$p] = int32($v[$p] - $mx);
		}
		$z = $v[$n];
		$mx = int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
		$y = $v[0] = int32($v[0] - $mx);
		$sum = int32($sum - $delta);
	}
	return long2str($v, true);
}

function int32($n) {
	while ($n >= 2147483648) $n -= 4294967296;
	while ($n <= -2147483649) $n += 4294967296;
	return (int)$n;
}

function up_UrlEncode($string) {
	$data = base64_encode($string);
	return str_replace(array('+','/','='), array('-','_','.'), $data);
}

function up_UrlDecode($string) {
	$data = str_replace(array('-','_','.'), array('+','/','='), $string);
	return base64_decode($data);
}

// Remove XSS
function up_RemoveXSS($val) {

	// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed 
	// this prevents some character re-spacing such as <java\0script> 
	// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs 

	$val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val); 

	// straight replacements, the user should never need these since they're normal characters 
	// this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29> 

	$search = 'abcdefghijklmnopqrstuvwxyz'; 
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$search .= '1234567890!@#$%^&*()'; 
	$search .= '~`";:?+/={}[]-_|\'\\'; 
	for ($i = 0; $i < strlen($search); $i++) { 

	   // ;? matches the ;, which is optional 
	   // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
	   // &#x0040 @ search for the hex values 

	   $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ; 

	   // &#00064 @ 0{0,7} matches '0' zero to seven times 
	   $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
	} 

	// now the only remaining whitespace attacks are \t, \n, and \r 
	$ra = $GLOBALS["UP_XSS_ARRAY"]; // Note: Customize $UP_XSS_ARRAY in upcfg*.php
	$found = true; // keep replacing as long as the previous round replaced something 
	while ($found == true) { 
	   $val_before = $val; 
	   for ($i = 0; $i < sizeof($ra); $i++) { 
	      $pattern = '/'; 
	      for ($j = 0; $j < strlen($ra[$i]); $j++) { 
	         if ($j > 0) { 
	            $pattern .= '('; 
	            $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?'; 
	            $pattern .= '|(&#0{0,8}([9][10][13]);?)?'; 
	            $pattern .= ')?'; 
	         } 
	         $pattern .= $ra[$i][$j]; 
	      } 
	      $pattern .= '/i'; 
	      $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag 
	      $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags 
	      if ($val_before == $val) { 

	         // no replacements were made, so exit the loop 
	         $found = false; 
	      } 
	   } 
	} 
	return $val; 
}

// HTTP request by cURL
// Note: cURL must be enabled in PHP
function up_Curl($url, $postdata = "", $method = "GET") {
	if (!function_exists("curl_init"))
		die("cURL not installed.");
	$ch = curl_init();
	$method = strtoupper($method);
	if ($method == "POST") {
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	} elseif ($method == "GET") {
		curl_setopt($ch, CURLOPT_URL, $url . "?" . $postdata);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}

// Calculate date difference
function up_DateDiff($dateTimeBegin, $dateTimeEnd, $interval = "d") {
	$dateTimeBegin = strtotime($dateTimeBegin);
	if ($dateTimeBegin === -1 || $dateTimeBegin === FALSE)
		return FALSE;
	$dateTimeEnd = strtotime($dateTimeEnd);
	if($dateTimeEnd === -1 || $dateTimeEnd === FALSE)
		return FALSE;
	$dif = $dateTimeEnd - $dateTimeBegin;	
	$arBegin = getdate($dateTimeBegin);
	$dateBegin = mktime(0, 0, 0, $arBegin["mon"], $arBegin["mday"], $arBegin["year"]);
	$arEnd = getdate($dateTimeEnd);
	$dateEnd = mktime(0, 0, 0, $arEnd["mon"], $arEnd["mday"], $arEnd["year"]);
	$difDate = $dateEnd - $dateBegin;
	switch ($interval) {
		case "s": // seconds
			return $dif;
		case "n": // minutes
			return ($dif > 0) ? floor($dif/60) : ceil($dif/60);
		case "h": // hours
			return ($dif > 0) ? floor($dif/3600) : ceil($dif/3600);
		case "d": // days
			return ($difDate > 0) ? floor($difDate/86400) : ceil($difDate/86400);
		case "w": // weeks
			return ($difDate > 0) ? floor($difDate/604800) : ceil($difDate/604800);
		case "ww": // calendar weeks
			$difWeek = (($dateEnd - $arEnd["wday"]*86400) - ($dateBegin - $arBegin["wday"]*86400))/604800;
			return ($difWeek > 0) ? floor($difWeek) : ceil($difWeek);
		case "m": // months
			return (($arEnd["year"]*12 + $arEnd["mon"]) -	($arBegin["year"]*12 + $arBegin["mon"]));
		case "yyyy": // years
			return ($arEnd["year"] - $arBegin["year"]);
	}
}

// Write global debug message
function up_DebugMsg() {
	global $gsDebugMsg;
	$msg = $gsDebugMsg;
	$gsDebugMsg = "";
	return ($msg <> "") ? "<p>" . $msg . "</p>" : "";
}

// Write global debug message
function up_SetDebugMsg($v, $newline = TRUE) {
	global $gsDebugMsg;
	if ($newline && $gsDebugMsg <> "")
		$gsDebugMsg .= "<br>";
	$gsDebugMsg .=  $v;
}

// Init array
function &up_InitArray($len, $value) {
	if ($len > 0)
		$ar = array_fill(0, $len, $value);
	else
		$ar = array();
	return $ar;
}

// Init 2D array
function &up_Init2DArray($len1, $len2, $value) {
	return up_InitArray($len1, up_InitArray($len2, $value));
}

/**
 * Validation functions
 */

// Check date format
// format: std/stdshort/us/usshort/euro/euroshort
function up_CheckDateEx($value, $format, $sep) {
	if (strval($value) == "") return TRUE;
	while (strpos($value, "  ") !== FALSE)
		$value = str_replace("  ", " ", $value);
	$value = trim($value);
	$arDT = explode(" ", $value);
	if (count($arDT) > 0) {
		if (preg_match('/^([0-9]{4})-([0][1-9]|[1][0-2])-([0][1-9]|[1|2][0-9]|[3][0|1])$/', $arDT[0], $matches)) { // accept yyyy-mm-dd
			$sYear = $matches[1];
			$sMonth = $matches[2];
			$sDay = $matches[3];
		} else {
			$wrksep = "\\$sep";
			switch ($format) {
				case "std":
					$pattern = '/^([0-9]{4})' . $wrksep . '([0]?[1-9]|[1][0-2])' . $wrksep . '([0]?[1-9]|[1|2][0-9]|[3][0|1])$/';
					break;
				case "stdshort":
					$pattern = '/^([0-9]{2})' . $wrksep . '([0]?[1-9]|[1][0-2])' . $wrksep . '([0]?[1-9]|[1|2][0-9]|[3][0|1])$/';
					break;
				case "us":
					$pattern = '/^([0]?[1-9]|[1][0-2])' . $wrksep . '([0]?[1-9]|[1|2][0-9]|[3][0|1])' . $wrksep . '([0-9]{4})$/';
					break;
				case "usshort":
					$pattern = '/^([0]?[1-9]|[1][0-2])' . $wrksep . '([0]?[1-9]|[1|2][0-9]|[3][0|1])' . $wrksep . '([0-9]{2})$/';
					break;
				case "euro":
					$pattern = '/^([0]?[1-9]|[1|2][0-9]|[3][0|1])' . $wrksep . '([0]?[1-9]|[1][0-2])' . $wrksep . '([0-9]{4})$/';
					break;
				case "euroshort":
					$pattern = '/^([0]?[1-9]|[1|2][0-9]|[3][0|1])' . $wrksep . '([0]?[1-9]|[1][0-2])' . $wrksep . '([0-9]{2})$/';
					break;
			}
			if (!preg_match($pattern, $arDT[0])) return FALSE;
			$arD = explode($sep, $arDT[0]); // change UP_DATE_SEPARATOR to $sep
			switch ($format) {
				case "std":
				case "stdshort":
					$sYear = up_UnformatYear($arD[0]);
					$sMonth = $arD[1];
					$sDay = $arD[2];
					break;
				case "us":
				case "usshort":
					$sYear = up_UnformatYear($arD[2]);
					$sMonth = $arD[0];
					$sDay = $arD[1];
					break;
				case "euro":
				case "euroshort":
					$sYear = up_UnformatYear($arD[2]);
					$sMonth = $arD[1];
					$sDay = $arD[0];
					break;
			}
		}
		if (!up_CheckDay($sYear, $sMonth, $sDay)) return FALSE;
	}
	if (count($arDT) > 1 && !up_CheckTime($arDT[1])) return FALSE;
	return TRUE;
}

// Unformat 2 digit year to 4 digit year
function up_UnformatYear($yr) {
	if (strlen($yr) == 2) {
		if ($yr > UP_UNFORMAT_YEAR)
			return "19" . $yr;
		else
			return "20" . $yr;
	} else {
		return $yr;
	}
}

// Check Date format (yyyy/mm/dd)
function up_CheckDate($value) {
	return up_CheckDateEx($value, "std", UP_DATE_SEPARATOR);
}

// Check Date format (yy/mm/dd)
function up_CheckShortDate($value) {
	return up_CheckDateEx($value, "stdshort", UP_DATE_SEPARATOR);
}

// Check US Date format (mm/dd/yyyy)
function up_CheckUSDate($value) {
	return up_CheckDateEx($value, "us", UP_DATE_SEPARATOR);
}

// Check US Date format (mm/dd/yy)
function up_CheckShortUSDate($value) {
	return up_CheckDateEx($value, "usshort", UP_DATE_SEPARATOR);
}

// Check Euro Date format (dd/mm/yyyy)
function up_CheckEuroDate($value) {
	return up_CheckDateEx($value, "euro", UP_DATE_SEPARATOR);
}

// Check Euro Date format (dd/mm/yy)
function up_CheckShortEuroDate($value) {
	return up_CheckDateEx($value, "euroshort", UP_DATE_SEPARATOR);
}

// Check day
function up_CheckDay($checkYear, $checkMonth, $checkDay) {
	$maxDay = 31;
	if ($checkMonth == 4 || $checkMonth == 6 ||	$checkMonth == 9 || $checkMonth == 11) {
		$maxDay = 30;
	} elseif ($checkMonth == 2)	{
		if ($checkYear % 4 > 0) {
			$maxDay = 28;
		} elseif ($checkYear % 100 == 0 && $checkYear % 400 > 0) {
			$maxDay = 28;
		} else {
			$maxDay = 29;
		}
	}
	return up_CheckRange($checkDay, 1, $maxDay);
}

// Check integer
function up_CheckInteger($value) {
	if (strval($value) == "")	return TRUE;
	return preg_match('/^\-?\+?[0-9]+$/', $value);
}

// Check number range
function up_NumberRange($value, $min, $max) {
	if ((!is_null($min) && $value < $min) ||
		(!is_null($max) && $value > $max))
		return FALSE;
	return TRUE;
}

// Check number
function up_CheckNumber($value) {
	if (strval($value) == "")	return TRUE;
	return is_numeric(trim($value));
}

// Check range
function up_CheckRange($value, $min, $max) {
	if (strval($value) == "")	return TRUE;
	if (!up_CheckNumber($value)) return FALSE;
	return up_NumberRange($value, $min, $max);
}

// Check time
function up_CheckTime($value) {
	if (strval($value) == "")	return TRUE;
	return preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $value);
}

// Check US phone number
function up_CheckPhone($value) {
	if (strval($value) == "")	return TRUE;
	return preg_match('/^\(\d{3}\) ?\d{3}( |-)?\d{4}|^\d{3}( |-)?\d{3}( |-)?\d{4}$/', $value);
}

// Check US zip code
function up_CheckZip($value) {
	if (strval($value) == "")	return TRUE;
	return preg_match('/^\d{5}$|^\d{5}-\d{4}$/', $value);
}

// Check credit card
function up_CheckCreditCard($value, $type="") {
	if (strval($value) == "")	return TRUE;
	$creditcard = array("visa" => "/^4\d{3}[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}$/",
		"mastercard" => "/^5[1-5]\d{2}[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}$/",
		"discover" => "/^6011[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}$/",
		"amex" => "/^3[4,7]\d{13}$/",
		"diners" => "/^3[0,6,8]\d{12}$/",
		"bankcard" => "/^5610[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}$/",
		"jcb" => "/^[3088|3096|3112|3158|3337|3528]\d{12}$/",
		"enroute" => "/^[2014|2149]\d{11}$/",
		"switch" => "/^[4903|4911|4936|5641|6333|6759|6334|6767]\d{12}$/");
	if (empty($type))	{
		$match = FALSE;
		foreach ($creditcard as $type => $pattern) {
			if (@preg_match($pattern, $value) == 1) {
				$match = TRUE;
				break;
			}
		}
		return ($match) ? up_CheckSum($value) : FALSE;
	}	else {
		if (!preg_match($creditcard[strtolower(trim($type))], $value)) return FALSE;
		return up_CheckSum($value);
	}
}

// Check sum
function up_CheckSum($value) {
	$value = str_replace(array('-',' '), array('',''), $value);
	$checksum = 0;
	for ($i=(2-(strlen($value) % 2)); $i<=strlen($value); $i+=2)
		$checksum += (int)($value[$i-1]);
  for ($i=(strlen($value)%2)+1; $i <strlen($value); $i+=2) {
	  $digit = (int)($value[$i-1]) * 2;
		$checksum += ($digit < 10) ? $digit : ($digit-9);
  }
	return ($checksum % 10 == 0);
}

// Check US social security number
function up_CheckSSC($value) {
	if (strval($value) == "")	return TRUE;
	return preg_match('/^(?!000)([0-6]\d{2}|7([0-6]\d|7[012]))([ -]?)(?!00)\d\d\3(?!0000)\d{4}$/', $value);
}

// Check emails
function up_CheckEmailList($value, $email_cnt) {
	if (strval($value) == "")	return TRUE;
	$emailList = str_replace(",", ";", $value);
	$arEmails = explode(";", $emailList);
	$cnt = count($arEmails);
	if ($cnt > $email_cnt && $email_cnt > 0)
		return FALSE;
	foreach ($arEmails as $email) {
		if (!up_CheckEmail($email))
			return FALSE;
	}
	return TRUE;
}

// Check email
function up_CheckEmail($value) {
	if (strval($value) == "")	return TRUE;

	//return preg_match('/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/', trim($value));
	return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i', trim($value));
}

// Check GUID
function up_CheckGUID($value) {
	if (strval($value) == "")	return TRUE;
	$p1 = '/^{{1}([0-9a-fA-F]){8}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){12}}{1}$/';
	$p2 = '/^([0-9a-fA-F]){8}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){12}$/';
	return preg_match($p1, $value) || preg_match($p2, $value);
}

// Check file extension
function up_CheckFileType($value) {
	if (strval($value) == "") return TRUE;
	$extension = substr(strtolower(strrchr($value, ".")), 1);
	$allowExt = explode(",", strtolower(UP_UPLOAD_ALLOWED_FILE_EXT));
	return (in_array($extension, $allowExt) || trim(UP_UPLOAD_ALLOWED_FILE_EXT) == "");
}

// Check empty string
function up_EmptyStr($value) {
	$str = strval($value);
	$str = str_replace("&nbsp;", "", $str);
	return (trim($str) == "");
}

// Check empty file
function up_Empty($value) {
	return is_null($value);
}

// Check by preg
function up_CheckByRegEx($value, $pattern) {
	if (strval($value) == "")	return TRUE;
	return preg_match($pattern, $value);
}

// include shared code
include_once "upshared8.php";
?>
