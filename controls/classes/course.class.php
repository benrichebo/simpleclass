<?php
class Course extends Query{
    public static $courseName, $courseCode;

    public static function createCourse($connection,$table,$dbvalues,$values){
        return static::insertData($connection,$table,$dbvalues,$values);
    }
    public static function checkCourse($connection,$data,$table){
        return static::selectData($connection,$data,$table);
    }

    public static function editCourse($connection,$data,$table,$where){

    }
    
    public static function deleteCourse($connection,$data,$table,$where){

    }
}

?>