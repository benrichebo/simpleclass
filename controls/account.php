<?php
session_start();
require_once("initialize.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
 //some variables to be used
    //signup
   

    if (isset($_POST['signup'])) {
        $eml = Account::$email = test_input($_POST['email']);
        $psd = Account::$password = test_input($_POST['password']);
        $class = Program::$class = test_input($_POST['myClass']);
        if (isset($psd)) {
                if (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                    echo $msg = "Enter a valid email";  
                    }elseif (empty($psd)) {
                        echo $msg = 'Password is required';
                    } elseif (!preg_match("/^[a-zA-Z 0-9]*$/", $psd)) {
                            echo $msg = "Password should contain at least 8 characters of 1 digi";  
                        }elseif(!preg_match("/^[a-zA-Z ]*$/", $class)){
                            echo $msg = "Class should contain only text";  
                        }else{
                            $data = "email";
                            $table = "account";
                            $where = "WHERE $data = '$eml'";
                            CheckEmailPassword::checkmail($connection,$data,$table,$where);
                            if (Account::$result) {
                               echo $msg = 'Email already exist';
                            } else {
                                $table = "account";
                                $dbvalues = "(email,psd,class)";
                                $values = "VALUES('$eml','$psd','$class')";
                                Account::createAccount($connection,$table,$dbvalues,$values);
                                    $_SESSION['userPassword'] = $psd;
                                    echo $msg = 'user signed up';    
                                
                            }
                        }
            }
        }elseif (isset($_POST['signupAdmin'])) {
            $nm = Account::$name = test_input($_POST['lecname']);
            $eml = Account::$email = test_input($_POST['email']);
            $psd = Account::$password = test_input($_POST['password']);
            $scode = Program::$code = test_input($_POST['code']);
            $depart = Program::$department = test_input($_POST['department']);
            if (Program::verifyCode() == true) {
                if (!preg_match("/^[a-zA-Z ]*$/", $nm)) {
                    echo $msg = "Name should contain only text";  
                }elseif (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                        echo $msg = "Enter a valid email";  
                        }elseif (empty($psd)) {
                            echo $msg = 'Password is required';
                        }
                         elseif (!preg_match("/^[a-zA-Z 0-9]*$/", $psd)) {
                                echo $msg = "Password should contain at least 8 characters of 1 digit";  
                            }else{
                                $data = "email";
                                $table = "teachers_account";
                                $where = "WHERE $data = '$eml'";
                                CheckEmailPassword::checkmail($connection,$data,$table,$where);
                                if (Account::$result) {
                                   echo $msg = 'Email already exist';
                                } else {
                                    $dbvalues = "(lecturer_name,email,psd,department,courses,materials)";
                                    $values = "VALUES('$nm','$eml','$psd','$depart',0,0)";
                                    Account::createAccount($connection,$table,$dbvalues,$values);
                                    if (Account::$result) {
                                        $_SESSION['adminPassword'] = $psd;
                                        $_SESSION['userEmail'] = $eml;
                                        echo $msg = 'admin signed up';    
                                    } else {
                                        echo $msg = 'Registration failed';
                                    }  
                                }
                            }
                }else{
                    echo $msg = 'Code is not correct';
                }
            }
        
        elseif (isset($_POST['login'])) {
            $eml = Account::$email = test_input($_POST['email']);
            $psd = Account::$password = test_input($_POST['password']);
            if (isset($psd)) {
                    if (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                        echo $msg = "Enter a valid email";  
                        }elseif (empty($psd)) {
                            echo $msg = 'Password is required';
                        } else{
                                   
                                $data  = 'email,psd';
                                $table = 'account';
                                $where = "WHERE email = '$eml' AND psd = '$psd'";
                                
                                Account::login($connection,$data,$table,$where);
                                if (Account::$result) {
                                    $_SESSION['userPassword'] = $psd;
                                    $_SESSION['userEmail'] = $eml;
                                    echo $msg = 'user loged in';
                                } else {
                                    $table = 'teachers_account';
                                    Account::login($connection,$data,$table,$where);
                                    if (Account::$result) {
                                        $_SESSION['adminPassword'] = $psd;
                                        $_SESSION['userEmail'] = $eml;
                                        echo $msg = 'admin loged in';
                                    }else{
                                        echo $msg = 'Email/Password does not exist';
                                    }
                                    
                                }
                            }
                }
            }
    elseif (isset($_POST['logout'])) { 
        //remove all session variables
        session_unset();

        //destroy session
        session_destroy();

        echo $msg = 'logged out';
    } elseif (isset($_POST['fetchLecturer'])) {
        $data = '*';
        $table = "teachers_account";
        Lecturer::fetchLecturers($connection,$data,$table);
        if (Lecturer::$result) {
            echo Lecturer::$qry;
        } else {
            echo 'Data not fetched';
        }
        
    }elseif (isset($_POST['fetchStudents'])) {
        $data = '*';
        $table = "account";
        Student::fetchStudents($connection,$data,$table);
        if (Student::$result) {
            echo Student::$qry;
        } else {
            echo 'Data not fetched';
        }
        
    }
     else {
        echo $msg = 'not set';
    }
}
?>