<?php
			// upload: Generate sample filename
			date_default_timezone_set("Asia/Hong_Kong");
			$timestamp = time();
			$d = date("Ymd_His",$timestamp);
			$cu = preg_replace('/\s+/', ' ', $cu_short_name);
			$du = preg_replace('/\s+/', ' ', $unit_delivery_name_short);
			$conu = preg_replace('/\s+/', ' ', $unit_contributor_name_short);

			$surveyfilename1 = "mfo2timeliresults_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$surveyfilename1 = strtolower($surveyfilename1);
			$surveyfilename1 = preg_replace('/\s+/', '', $surveyfilename1);
			$surveyfilename2 = "mfo2timelisample_" . $cu . "_" . $du . "_" . $conu . "_" . $d;
			$surveyfilename2 = strtolower($surveyfilename2);
			$surveyfilename2 = preg_replace('/\s+/', '', $surveyfilename2);

?>