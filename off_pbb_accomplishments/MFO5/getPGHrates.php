<?php

function getBedOccupancyRate($bed_days, $ipdays)
{
	$rate = 0.00;
	if ($bed_days != 0)
		$rate = ($ipdays/$bed_days)*100.00;
	
	return $rate;
}

function getAverage($numerator, $denominator)
{
	$average = 0.00;
	if ($denominator != 0)
		$average = $numerator/$denominator;
	
	return $average;

}
?>
