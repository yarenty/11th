<?php

/* draws a calendar */
function draw_calendar($uid,$month,$year){


    $Hdate = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
	 
	$calendar ='<center><h2>'.date("F Y", mktime(0, 0, 0, $month, 1, $year)).'</h2>';
	/* draw table */
	$calendar .= '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;




	$db  = new db();

		$start_date = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$end_date = date("Y-m-d", mktime(0, 0, 0, $month, 31, $year));
		$sql = "select
			display_date
		from ".$db->prefix."task where user_id = ".$uid." 
				and display_date >= '".$start_date."' 
				and display_date <= '".$end_date."' 
				and status_id='1'";

	debug("SQL::".$sql);
	$chaindate = $db->getRowSet($sql);
	
	// debug("out:".var_dump($chaindate));
	
	$dates = array();
	foreach( $chaindate as $d) {
			$dates[intval(substr($d[0],-2))]=1;
	} 
	
	// debug("out:".var_dump($dates));
	
	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			if (array_key_exists($list_day,$dates)) {
				$calendar.= '<p><a href="history.php?hist='.date("Y-m-d", mktime(0, 0, 0, $month, $list_day, $year)).'">X</a></p>';
			} else {
			$calendar.= str_repeat('<p> </p>',2);
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table></center>';
	
	/* all done, return result */
	return $calendar;
}




	
	