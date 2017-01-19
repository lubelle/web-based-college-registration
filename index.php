<?php
/* 
 * Project : IntegratedApp_PHP
 * Program : index.php(controller)
 */
session_start();
require_once('model/database.php');
require_once('model/financial_db.php');
require_once('model/financial.php');
require_once('model/student_db.php');
require_once('model/student.php');
require_once('model/course_db.php');
require_once('model/course.php');
require_once('model/transcripts_db.php');
require_once('model/transcripts.php');
define("CURRENT_SEMESTER", "Winter_2015");
$student_id = trim(filter_input(INPUT_GET, 'sid'));  //from url
$_SESSION['student_id'] = $student_id;
$term = trim(filter_input(INPUT_POST, 'term'));  //from url
if ($term == NULL) {
    $term = filter_input(INPUT_GET, 'term');
    if ($term == NULL) {
        $term = CURRENT_SEMESTER;
    }
}
$_SESSION['term'] = $term;

$action = trim(filter_input(INPUT_POST, 'action'));  //from url
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'Payment';
    }
}

switch ($action) {
    case 'Payment':       
        $error_message = filter_input(INPUT_GET, 'msg');
        if ($error_message == NULL) {
            $error_message = '';
        }
        $student = StudentDB::getStudent($student_id);
        $cost_list = StudentDB::getSelectedCourses($term, $student_id);         
        include 'view/payment.php';    
        break;
    case 'Charge':
        $error_message = '';
        $student_id = filter_input(INPUT_POST, 'student_id');
        $amount_paid = filter_input(INPUT_POST, 'amount_paid');
        $student = StudentDB::getStudent($student_id);
        $creditAmount = $student->getCreditAmount();        
        if ( $amount_paid > $creditAmount||empty($amount_paid)||!is_numeric($amount_paid)|| $amount_paid <= 0){
            $error_message = 'Amount must be a valid number greater than zero or less than credit amount.';
        } 
        if ($error_message != ''){ 
            header("Location: .?sid=$student_id&msg=$error_message");
            exit();
        }
        $payment_date = date("Y-m-d H:i:s");
        $onePayment = new Financial();
        $onePayment->setStudentID($student_id);
        $onePayment->setPayment($amount_paid);
        $onePayment->setPaymentDate($payment_date);       
        FinancialDB::addPayment($onePayment);      
        include 'view/payment_result.php'; 
        break;
    case 'Financial':
        $student = StudentDB::getStudent($student_id);
        $coursesTaken = CourseDB::getCoursesTaken($student_id);
        $payments = FinancialDB::getAllPayment($student_id);        
        include 'view/financial_report.php';
        break;
    case 'Transcripts':      
        $term = $_SESSION['term'];
        $student_id = $_SESSION['student_id'];
        $student = StudentDB::getStudent($student_id);
        $transcripts = TranscriptsDB::getAcademicReport($term, $student_id);
        include 'view/academic_report.php';       
        break; 
}
