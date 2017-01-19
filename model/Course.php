<?php

class Course {
    private $regcode, $courseNo, $title, $term, $instructor, $daysTimes, $creidts, $cost;
    function __construct() {
        $this->regcode = '';
        $this->courseNo = '';
        $this->title = '';
        $this->term = '';
        $this->instructor = '';
        $this->daysTimes = '';
        $this->creidts = '';
        $this->cost = '';
    }

    function setRegcode($regcode) {
        $this->regcode = $regcode;
    }

     function setCourseNo($courseNo) {
        $this->courseNo = $courseNo;
    }

     function setTitle($title) {
        $this->title = $title;
    }

     function setTerm($term) {
        $this->term = $term;
    }

     function setInstructor($instructor) {
        $this->instructor = $instructor;
    }

     function setDaysTimes($daysTimes) {
        $this->daysTimes = $daysTimes;
    }

     function setCredits($creidts) {
        $this->creidts = $creidts;
    }
    function setCost($cost) {
        $this->cost = $cost;
    }
    function getRegcode() {
        return $this->regcode;
    }

     function getCourseNo() {
        return $this->courseNo;
    }

     function getTitle() {
        return $this->title;
    }

     function getTerm() {
        return $this->term;
    }

     function getInstructor() {
        return $this->instructor;
    }

     function getDaysTimes() {
        return $this->daysTimes;
    }

     function getCredits() {
        return $this->creidts;
    }
    function getCost() {
        return $this->cost;
    }
}