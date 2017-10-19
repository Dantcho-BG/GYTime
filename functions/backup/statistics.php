<?php
	
	/*$year_2016= '<label class="btn btn-primary" ><input type="radio" name="year_2016" id="year_2016" value="2016" autocomplete="off">2016</label>';
	
	$month_january= '<label class="btn btn-primary "><input type="radio" name="January" id="months01" autocomplete="off"> January</label>';
	$month_february= '<label class="btn btn-primary"><input type="radio" name="February" id="months02" autocomplete="off"> February</label>';
	$month_march= '<label class="btn btn-primary"><input type="radio" name="March" id="months03" autocomplete="off"> March</label>';
	$month_april= '<label class="btn btn-primary"><input type="radio" name="April" id="months04" autocomplete="off"> April</label>';
	$month_may= '<label class="btn btn-primary"><input type="radio" name="May" id="months05" autocomplete="off"> May</label>';
	$month_june= '<label class="btn btn-primary"><input type="radio" name="Juny" id="months06" autocomplete="off"> Juny</label>';
	$month_july= '<label class="btn btn-primary"><input type="radio" name="July" id="months07" autocomplete="off"> July</label>';
	$month_august= '<label class="btn btn-primary"><input type="radio" name="August" id="months08" autocomplete="off"> August</label>';
	$month_september= '<label class="btn btn-primary"><input type="radio" name="September" id="months09" autocomplete="off"> September</label>';
	$month_october= '<label class="btn btn-primary"><input type="radio" name="October" id="months10" autocomplete="off"> October</label>';
	$month_november= '<label class="btn btn-primary"><input type="radio" name="November" id="months11" autocomplete="off"> November</label>';
	$month_december= '<label class="btn btn-primary"><input type="radio" name="December" id="months12" autocomplete="off"> December</label>';
	
	$day_01= '<label class="btn btn-primary"><input type="radio" name="days_31_01" id="days_31_01" autocomplete="off"> 01</label>';
	$day_02= '<label class="btn btn-primary"><input type="radio" name="days_31_02" id="days_31_02" autocomplete="off"> 02</label>';
	$day_03= '<label class="btn btn-primary"><input type="radio" name="days_31_03" id="days_31_03" autocomplete="off"> 03</label>';
	$day_04= '<label class="btn btn-primary"><input type="radio" name="days_31_04" id="days_31_04" autocomplete="off"> 04</label>';
	$day_05= '<label class="btn btn-primary"><input type="radio" name="days_31_05" id="days_31_05" autocomplete="off"> 05</label>';
	$day_06= '<label class="btn btn-primary"><input type="radio" name="days_31_06" id="days_31_06" autocomplete="off"> 06</label>';
	$day_07= '<label class="btn btn-primary"><input type="radio" name="days_31_07" id="days_31_07" autocomplete="off"> 07</label>';
	$day_08= '<label class="btn btn-primary"><input type="radio" name="days_31_08" id="days_31_08" autocomplete="off"> 08</label>';
	$day_09= '<label class="btn btn-primary"><input type="radio" name="days_31_09" id="days_31_09" autocomplete="off"> 09</label>';
	$day_10= '<label class="btn btn-primary"><input type="radio" name="days_31_10" id="days_31_10" autocomplete="off"> 10</label>';
	$day_11= '<label class="btn btn-primary"><input type="radio" name="days_31_11" id="days_31_11" autocomplete="off"> 11</label>';
	$day_12= '<label class="btn btn-primary"><input type="radio" name="days_31_12" id="days_31_12" autocomplete="off"> 12</label>';
	$day_13= '<label class="btn btn-primary"><input type="radio" name="days_31_13" id="days_31_13" autocomplete="off"> 13</label>';
	$day_14= '<label class="btn btn-primary"><input type="radio" name="days_31_14" id="days_31_14" autocomplete="off"> 14</label>';
	$day_15= '<label class="btn btn-primary"><input type="radio" name="days_31_15" id="days_31_15" autocomplete="off"> 15</label>';
	$day_16= '<label class="btn btn-primary"><input type="radio" name="days_31_16" id="days_31_16" autocomplete="off"> 16</label>';
	$day_17= '<label class="btn btn-primary"><input type="radio" name="days_31_17" id="days_31_17" autocomplete="off"> 17</label>';
	$day_18= '<label class="btn btn-primary"><input type="radio" name="days_31_18" id="days_31_18" autocomplete="off"> 18</label>';
	$day_19= '<label class="btn btn-primary"><input type="radio" name="days_31_19" id="days_31_19" autocomplete="off"> 19</label>';
	$day_20= '<label class="btn btn-primary"><input type="radio" name="days_31_20" id="days_31_20" autocomplete="off"> 20</label>';
	$day_21= '<label class="btn btn-primary"><input type="radio" name="days_31_21" id="days_31_21" autocomplete="off"> 21</label>';
	$day_22= '<label class="btn btn-primary"><input type="radio" name="days_31_22" id="days_31_22" autocomplete="off"> 22</label>';
	$day_23= '<label class="btn btn-primary"><input type="radio" name="days_31_23" id="days_31_23" autocomplete="off"> 23</label>';
	$day_24= '<label class="btn btn-primary"><input type="radio" name="days_31_24" id="days_31_24" autocomplete="off"> 24</label>';
	$day_25= '<label class="btn btn-primary"><input type="radio" name="days_31_25" id="days_31_25" autocomplete="off"> 25</label>';
	$day_26= '<label class="btn btn-primary"><input type="radio" name="days_31_26" id="days_31_26" autocomplete="off"> 26</label>';
	$day_27= '<label class="btn btn-primary"><input type="radio" name="days_31_27" id="days_31_27" autocomplete="off"> 27</label>';
	$day_28= '<label class="btn btn-primary"><input type="radio" name="days_31_28" id="days_31_28" autocomplete="off"> 28</label>';
	$day_29= '<label class="btn btn-primary"><input type="radio" name="days_31_29" id="days_31_29" autocomplete="off"> 29</label>';
	$day_30= '<label class="btn btn-primary"><input type="radio" name="days_31_30" id="days_31_30" autocomplete="off"> 30</label>';
	$day_31= '<label class="btn btn-primary"><input type="radio" name="days_31_31" id="days_31_31" autocomplete="off"> 31</label>';
	
	$div_years= '<div id="years" class="btn-group" data-toggle="buttons">';
	$div_months= '<div id="months" class="btn-group" data-toggle="buttons">';
	$div_days= '<div id="days" class="btn-group" data-toggle="buttons">';
	$div_close_years= '</div>';
	$div_close_months= '</div>';
	$div_close_days= '</div>';
	
	$confirm_button= '<div class="box-footer"><button type="submit" class="btn btn-success pull-right">Confirm</button></div>';*/
?>