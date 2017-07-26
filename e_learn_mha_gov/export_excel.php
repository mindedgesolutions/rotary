<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=school-survey.csv');
session_start();
ob_start();
include('include/config.php');
$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
//mysql_connect('localhost', 'root', '');

//mysql_select_db('rotary');

$msg = '';
$i = 0;

$msg = $msg."User Name, User Address, User Email, User Ph. No., School Name, UDISE No., Principal, Phone No., Email, State, District, Tehsil, Village, PIN, Website, School Category, Type of School, No. of Girl Students, No. of Boy Students, Total Students, No. of Male Teacher, No. of Female Teacher, Total Teachers, School have E-learning facility, E-learning appropriate option, E-Learning Fucntional Units, Installation Date, E-Learning Comprises, Other info not covered, Name of user, Designation of User \r\n";

//$query_getDet = mysql_query("select * from tbl_school_survey_maharashtra_gov where final_submission='yes'");
$query_getDet = mysql_query("SELECT a.id, a.fullname, a.address, a.email, a.mobno, b.userid, b.school_name, b.udise_no, b.head_teacher_name,
							b.school_ph_no, b.school_email, b.school_state, b.school_pin_code, b.school_website, b.school_type, 
							b.stud_girls, b.stud_boys, b.stud_total, b.teacher_male, b.teacher_femail, b.teacher_total, 
							b.e_learning_fac, b.e_learning_func_unit, b.any_other_info_not_covered, b.school_cat, b.school_dist, 
							b.e_learning_facility_installed, b.e_learning_unit_comp, b.name_who_fill_form, b.school_tehsil, b.village, 
							b.Inter_School, b.ELearnningOption, b.desig_who_fill_form
							FROM tbl_user_mh as a, tbl_school_survey_maharashtra_gov as b 
							where a.id=b.userid and b.final_submission='yes'");

while($getDet = mysql_fetch_array($query_getDet))
{
	$ELearnningOption = str_replace(',','+',$getDet['ELearnningOption']);
	$fullname = str_replace(',','+',$getDet['fullname']);
	$address = str_replace(',','+',$getDet['address']);
	$head_teacher_name = str_replace(',','+',$getDet['head_teacher_name']);
	$email = str_replace(',','+',$getDet['email']);
	$mobno = str_replace(',','+',$getDet['mobno']);
	$udise_no = str_replace(',','+',$getDet['udise_no']);
	$school_ph_no = str_replace(',','+',$getDet['school_ph_no']);
	$school_email = str_replace(',','+',$getDet['school_email']);
	$school_state = str_replace(',','+',$getDet['school_state']);
	$district = str_replace(',','+',$getDet['district']);
	$school_tehsil = str_replace(',','+',$getDet['school_tehsil']);
	$village = str_replace(',','+',$getDet['village']);
	$school_pin_code = str_replace(',','+',$getDet['school_pin_code']);
	$school_website = str_replace(',','+',$getDet['school_website']);	
	$school_cat = str_replace(',','+',$getDet['school_cat']);
	$school_type = str_replace(',','+',$getDet['school_type']);	
	$stud_girls = str_replace(',','+',$getDet['stud_girls']);
	$stud_boys = str_replace(',','+',$getDet['stud_boys']);
	$stud_total = str_replace(',','+',$getDet['stud_total']);
	$teacher_male = str_replace(',','+',$getDet['teacher_male']);
	$teacher_femail = str_replace(',','+',$getDet['teacher_femail']);
	$teacher_total = str_replace(',','+',$getDet['teacher_total']);
	$e_learning_fac = str_replace(',','+',$getDet['e_learning_fac']);
	$e_learning_func_unit = str_replace(',','+',$getDet['e_learning_func_unit']);
	$e_learning_facility_installed = str_replace(',','+',$getDet['e_learning_facility_installed']);
	$e_learning_unit_comp = str_replace(',','+',$getDet['e_learning_unit_comp']);
	$school_name = str_replace(',','+',$getDet['school_name']);
	$any_other_info_not_covered = str_replace(',','+',$getDet['any_other_info_not_covered']);
	$name_who_fill_form = str_replace(',','+',$getDet['name_who_fill_form']);
	$desig_who_fill_form = str_replace(',','+',$getDet['desig_who_fill_form']);
	
	//$msg = $msg.$getDet['name'].",".$getDet['udise_no'].",".$getDet['head_teacher_name'].",".$getDet['school_ph_no'].",".$getDet['school_email'].",".$getDet['school_state'].",".$getDet['district'].",".$getDet['school_tehsil'].",".$getDet['village'].",".$getDet['school_pin_code'].",".$getDet['school_website'].",".$getDet['school_cat'].",".$getDet['school_type'].",".$getDet['stud_girls'].",".$getDet['stud_boys'].",".$getDet['stud_total'].",".$getDet['teacher_male'].",".$getDet['teacher_femail'].",".$getDet['teacher_total'].",".$getDet['tran_teacher_male'].",".$getDet['tran_teacher_femail'].",".$getDet['tran_teacher_total'].",".$getDet['dis_male']." ,".$getDet['dis_female']." ,".$getDet['dis_total']." ,".$getDet['seeing']." ,".$getDet['hearing']." ,".$getDet['speech']." ,".$getDet['moving']." ,".$getDet['mental_retard'].", ".$getDet['dis_other'].", ".$getDet['slow_learners'].", ".$getDet['conduct_co_curricular'].", ".$getDet['ex_school_mgm_comm'].", ".$getDet['is_smc_active'].", ".$getDet['school_dev_plan'].", ".$getDet['time_fram_smc'].", ".$getDet['school_build_stru'].", ".$getDet['status_ele_supply'].", ".$getDet['kept_locked'].", ".$getDet['toilet_for_boys_func'].", ".$getDet['toilet_for_boys_non_func'].", ".$getDet['toilet_for_boys_total'].", ".$getDet['toilet_for_girls_func'].", ".$getDet['toilet_for_girls_non_func'].", ".$getDet['toilet_for_girls_total'].", ".$getDet['toilet_for_teachers_func'].", ".$getDet['toilet_for_teachers_non_func'].", ".$getDet['toilet_for_teachers_total'].", ".$getDet['drink_water_stu_techer'].", ".$getDet['total_hand_wash_stn'].", ".$getDet['library_with_book'].", ".$getDet['library_with_book_no'].", ".$getDet['footwear_per'].", ".$getDet['school_bag_per'].", ".$getDet['uniform_per'].", ".$getDet['no_benches'].", ".$getDet['no_desks'].", ".$getDet['head_teacher'].", ".$getDet['stores_separate'].", ".$getDet['laboratory'].", ".$getDet['kitchen_mid_day'].", ".$getDet['indoor_games'].", ".$getDet['staff_room'].", ".$getDet['staff_room_no_chair'].", ".$getDet['staff_room_no_table'].", ".$getDet['e_learning_fac'].", ".$getDet['e_learning_func_unit'].", ".$getDet['e_learning_facility_installed'].", ".$getDet['e_learning_unit_comp'].", ".$getDet['pe_period_upto5th'].", ".$getDet['pe_period_upto10th'].", ".$getDet['pe_period_upto12th'].", ".$getDet['no_pe_teacher'].", ".$getDet['no_pe_teacher_other'].", ".$getDet['rolls_Contractual'].", ".$getDet['pe_teacher_conduct_sport_edu'].", ".$getDet['curriculum_pe_sports'].", ".$getDet['who_has_prescrib_it'].", ".$sports_played_in_school.", ".$sports_infra.", ".$sports_infra_other.", ".$getDet['spend_on_sports'].", ".$maj_chall_faced_ped.", ".$maj_chall_faced_ped_other.", ".$getDet['is_sport_card'].", ".$getDet['Inter_School'].", ".$getDet['District_level'].", ".$getDet['State_Level'].", ".$getDet['National_level'].", ".$is_sprt_part_curri_yes.", ".$is_sprt_part_curri_no.", ".$any_other_info_not_covered.", ".$name_desig_who_fill_form." \r\n";
	$msg = $msg.$fullname.",".$address.",".$email.",".$mobno.",".$school_name.",".$udise_no.",".$head_teacher_name.",".$school_ph_no.",".$school_email.",".$school_state.",".$district.",".$school_tehsil.",".$village.",".$school_pin_code.",".school_website.",".$school_cat.",".$school_type.",".$stud_girls.",".$stud_boys.",".$stud_total.",".$teacher_male.",".$teacher_femail.",".$teacher_total.",".$e_learning_fac.",".$ELearnningOption.",".$e_learning_func_unit.", ".$e_learning_facility_installed.",".$e_learning_unit_comp.",".$any_other_info_not_covered.",".$name_who_fill_form.",".$desig_who_fill_form." \r\n";
	$i++;
}
echo $msg;
?>