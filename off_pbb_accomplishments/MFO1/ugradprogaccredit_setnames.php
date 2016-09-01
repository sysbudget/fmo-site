<?php
			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$accreditfilename1 = "mfo1accredcert_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$accreditfilename1 = strtolower($accreditfilename1);
			$accreditfilename1 = preg_replace('/\s+/', '', $accreditfilename1);
			$accreditfilename2 = "mfo1accredlevscheme_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$accreditfilename2 = strtolower($accreditfilename2);
			$accreditfilename2 = preg_replace('/\s+/', '', $accreditfilename2);

?>