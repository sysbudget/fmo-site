<?php

			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$file1_attachment = "mfo5pss-jan_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file1_attachment = strtolower($file1_attachment);
			$file1_attachment = preg_replace('/\s+/', '', $file1_attachment);
			$file2_attachment = "mfo5pss-feb_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file2_attachment = strtolower($file2_attachment);
			$file2_attachment = preg_replace('/\s+/', '', $file2_attachment);
			$file3_attachment = "mfo5pss-mar_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file3_attachment = strtolower($file3_attachment);
			$file3_attachment = preg_replace('/\s+/', '', $file3_attachment);
			$file4_attachment = "mfo5pss-apr_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file4_attachment = strtolower($file4_attachment);
			$file4_attachment = preg_replace('/\s+/', '', $file4_attachment);
			$file5_attachment = "mfo5pss-may_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file5_attachment = strtolower($file5_attachment);
			$file5_attachment = preg_replace('/\s+/', '', $file5_attachment);
			$file6_attachment = "mfo5pss-jun_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file6_attachment = strtolower($file6_attachment);
			$file6_attachment = preg_replace('/\s+/', '', $file6_attachment);
			$file7_attachment = "mfo5pss-jul_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file7_attachment = strtolower($file7_attachment);
			$file7_attachment = preg_replace('/\s+/', '', $file7_attachment);
			$file8_attachment = "mfo5pss-aug_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file8_attachment = strtolower($file8_attachment);
			$file8_attachment = preg_replace('/\s+/', '', $file8_attachment);
			$file9_attachment = "mfo5pss-sep_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file9_attachment = strtolower($file9_attachment);
			$file9_attachment = preg_replace('/\s+/', '', $file9_attachment);
			$file10_attachment = "mfo5pss-oct_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file10_attachment = strtolower($file10_attachment);
			$file10_attachment = preg_replace('/\s+/', '', $file10_attachment);
			$file11_attachment = "mfo5pss-nov_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file11_attachment = strtolower($file11_attachment);
			$file11_attachment = preg_replace('/\s+/', '', $file11_attachment);
			$file12_attachment = "mfo5pss-dec_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$file12_attachment = strtolower($file12_attachment);
			$file12_attachment = preg_replace('/\s+/', '', $file12_attachment);
			$sample_attachment = "mfo5pss-sample_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$sample_attachment = strtolower($sample_attachment);
			$sample_attachment = preg_replace('/\s+/', '', $sample_attachment);

?>