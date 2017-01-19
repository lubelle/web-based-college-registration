<?php

class Student {
    private $studentID, $passCode, $firstName, 
            $lastName, $creditAmount, $creditCard;
    public function __construct($studentID,$passCode,$firstName,$lastName,$creditAmount,$creditCard) {
        $this->studentID = $studentID;
        $this->passCode = $passCode;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->creditAmount = $creditAmount;
        $this->creditCard = $creditCard;        
    }
    public function getStudentID() {
        return $this->studentID;
    }
    public function setStudentID($studentID){
        $this->studentID = $studentID;
    }
    public function getPassCode() {
        return $this->passCode;
    }
    public function setPassCode($passCode) {
        $this->passCode = $passCode;
    }
    public function getFirstName(){
        return $this->firstName; 
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    public function getCreditAmount(){
        return $this->creditAmount;
    }
    public function setCreditAmount($creditAmount){
        $this->creditAmount = $creditAmount;
    }
    public function getCreditCard(){
        return $this->creditCard;
    }
    public function setCreditCard($creditCard){
        $this->creditCard = $creditCard;
    }
}
