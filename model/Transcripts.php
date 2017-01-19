<?php

class Transcripts {
    private $regcode, $term, $courseNo, $title, $instructor, 
            $daystimes, $credits, $lettergrade, $gradepoints;
    public function __construct() {
        $this->regcode = '';
        $this->term = '';
        $this->courseNo = '';
        $this->title = '';
        $this->instructor = '';
        $this->daystimes = '';
        $this->credits = '';
        $this->lettergrade = '';
        $this->gradepoints = '';
    }    
    function getRegcode() {
        return $this->regcode;
    }
    function getCourseNo() {
        return $this->courseNo;
    }

    function getInstructor() {
        return $this->instructor;
    }

    function getDaystimes() {
        return $this->daystimes;
    }

    function getLettergrade() {
        return $this->lettergrade;
    }

    function getGradepoints() {
        return $this->gradepoints;
    }

    function setCourseNo($courseNo) {
        $this->courseNo = $courseNo;
    }

    function setInstructor($instructor) {
        $this->instructor = $instructor;
    }

    function setDaystimes($daystimes) {
        $this->daystimes = $daystimes;
    }

    function setLettergrade($lettergrade) {
        $this->lettergrade = $lettergrade;
    }

    function setGradepoints($gradepoints) {
        $this->gradepoints = $gradepoints;
    }

    function getTerm() {
        return $this->term;
    }

    function getTitle() {
        return $this->title;
    }

    function getCredits() {
        return $this->credits;
    }

    function getCost() {
        return $this->cost;
    }

    function setRegcode($regcode) {
        $this->regcode = $regcode;
    }

    function setTerm($term) {
        $this->term = $term;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCredits($credits) {
        $this->credits = $credits;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }
}
