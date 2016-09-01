<?php
			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$tracerfilename1 = "mfo2employresults_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$tracerfilename1 = strtolower($tracerfilename1);
			$tracerfilename1 = preg_replace('/\s+/', '', $tracerfilename1);
			$tracerfilename2 = "mfo2employsample_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$tracerfilename2 = strtolower($tracerfilename2);
			$tracerfilename2 = preg_replace('/\s+/', '', $tracerfilename2);

?>