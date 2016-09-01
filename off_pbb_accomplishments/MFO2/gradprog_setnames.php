<?php

			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$qtr1_attachment = "mfo2grad-q1_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$qtr1_attachment = strtolower($qtr1_attachment);
			$qtr1_attachment = preg_replace('/\s+/', '', $qtr1_attachment);
			$qtr2_attachment = "mfo2grad-q2_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$qtr2_attachment = strtolower($qtr2_attachment);
			$qtr2_attachment = preg_replace('/\s+/', '', $qtr2_attachment);
			$qtr3_attachment = "mfo2grad-q3_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$qtr3_attachment = strtolower($qtr3_attachment);
			$qtr3_attachment = preg_replace('/\s+/', '', $qtr3_attachment);
			$qtr4_attachment = "mfo2grad-q4_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$qtr4_attachment = strtolower($qtr4_attachment);
			$qtr4_attachment = preg_replace('/\s+/', '', $qtr4_attachment);

?>