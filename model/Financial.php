<?php

class Financial {
    private $studentID, $payment, $paymentDate;
    
    public function __construct() {
        $this->studentID = '';
        $this->payment = '';
        $this->paymentDate = '';
    }
    
    function getStudentID() {
        return $this->studentID;
    }

    function getPayment() {
        return $this->payment;
    }
    
    function getPaymentFormatted() {
        $formatted_payment = number_format($this->payment, 2);
        return $formatted_payment;
    }
    
    function getPaymentDate() {
        return $this->paymentDate;
    }

    function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    function setPayment($payment) {
        $this->payment = $payment;
    }

    function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }
}
