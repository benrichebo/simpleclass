<?php
require_once("initialize.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
 //some variables to be used
    //signup
    if (isset($_POST['createCourse'])) {
        $cName = Course::$courseName = test_input($_POST['courseName']);
        $cCode = Course::$courseCode = test_input($_POST['courseCode']);
        $lecturer = Lecturer::$lecturerName = test_input($_POST['lecturer']);
        if (isset($lecturer)) {
            if (empty($cName)) {
                echo $msg = 'Course name is required';
            }elseif(!preg_match("/^[a-zA-Z ]*$/", $cName)){
                echo $msg = 'Enter text only for course name';
            }elseif(empty($cCode)){
                echo $msg = 'Course code is required';
            }elseif(!preg_match("/^[a-zA-Z 0-9 ]*$/", $cCode)){
                echo $msg = 'Course code should be a combination of digits and number';
            }elseif(empty($lecturer)){
                echo $msg = 'lecturer name is required';
            }elseif(!preg_match("/^[a-zA-Z ]*$/", $lecturer)){
                echo $msg = 'Enter text only for lecturer name';
            }else{
                $data = "course_code,course_name";
                $table = "courses";
                $where = "WHERE '$data' = '$cCode' AND course_name = '$cName'";
                Course::checkCourse($connection,$data,$table,$where);
                if (Course::$result == 1) {
                   echo $msg = 'Course already exist';
                } else {
                    $dbvalues = "(course_name,course_code,lecturer)";
                    $values = "VALUES('$cName','$cCode','$lecturer')";
                    Course::createCourse($connection,$table,$dbvalues,$values);
                    if (Course::$result == 1) {
                        echo $msg = 'Course has been created successfully';    
                    } else {
                        echo $msg = 'Course registration failed';
                    }  
                }
            }
        }
    }elseif (isset($_POST['fetchCourse'])) {
        $data = '*';
        $table = "courses";
        Course::checkCourse($connection,$data,$table);
        if (Course::$result) {
            echo Course::$qry;
        } else {
            echo 'Data not fetched';
        }
        
    }elseif (isset($_POST['fetchCourses'])) {
        $data = '*';
        $table = "courses";
        Course::checkCourse($connection,$data,$table);
        if (Course::$result) {
            echo Course::$qry;
        } else {
            echo 'Data not fetched';
        }
        
    }
    else{
        echo 'not set';
    }
}
?>