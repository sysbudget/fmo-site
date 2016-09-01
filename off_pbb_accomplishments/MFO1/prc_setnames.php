<?php

			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$prcfilename1 = "mfo1prcdata_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$prcfilename1 = strtolower($prcfilename1);
			$prcfilename1 = preg_replace('/\s+/', '', $prcfilename1);
			$prcfilename2 = "mfo1non-prcdata_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$prcfilename2 = strtolower($prcfilename2);
			$prcfilename2 = preg_replace('/\s+/', '', $prcfilename2);

?>