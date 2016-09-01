<?php if (@$gsExport == "") { ?>
				<p>&nbsp;</p>			
			<!-- right column (end) -->
			<?php if (isset($gTimer)) $gTimer->Stop() ?>
	    </td>	
		</tr>
	</table>
	<!-- content (end) -->	

</div>
<div class="yui-tt" id="upTooltipDiv" style="visibility: hidden; border: 0px;" name="upTooltipDivDiv"></div>
<?php } ?>
<script type="text/javascript">
<!--
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
upDom.getElementsByClassName(UP_TABLE_CLASS, "TABLE", null, up_SetupTable); // init the table
upDom.getElementsByClassName(UP_GRID_CLASS, "TABLE", null, up_SetupGrid); // init grids
<?php } ?>
<?php if (@$gsExport == "") { ?>
up_InitTooltipDiv(); // init tooltip div
<?php } ?>

//-->
</script>
<?php if (@$gsExport == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your global startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
</body>
</html>
