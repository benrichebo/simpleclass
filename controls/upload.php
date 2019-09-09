<?php

require_once("initialize.php");
$msg = ''; $msg2 = ''; $msg3 = ''; $msg4 = ''; $msg5 = ''; $msg6 = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
 //some variables to be used
    //signup
   
    $target_dir = "uploads/";
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (isset($_POST['submit'])) {
        $check = is_file($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            //header('Location: dashboard.php?page=materials');
            $msg5 = "File should be a pdf/word file- </br>";
        }
        
    }

    //check if file already exist
    if (file_exists($target_file)) {
        $msg2 = "sorry file already exist </br>";
        $uploadOk = 0;
    } 

    //check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        $msg3 = "Sorry your file is too large </br>";
        $uploadOk = 0;
    }

    //Allow certain file formats
    if ($imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "csv") {
        $msg3 = "Sorry only PDF, WORD files are allowed </br>";
        $uploadOk = 0;
    }

    //check if uploadOK is et to 0 by an error
    if ($uploadOk == 0) {
        $msg = "Sorry your file was not uploaded </br>";
    }else{
        //if everything is ok upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $cName = Course::$courseName = test_input($_POST['selectCourses']);
            $clName = Program::$class = test_input($_POST['selectClasses']);
            $lEmail = Lecturer::$lecturerEmail = test_input($_POST['lecturer']);

            if (isset($lEmail)) {
                if (empty($cName)) {
                     $msg6 = 'Course name is required';
                }elseif(empty($clName)){
                     $msg6 = 'Class name is required';
                }elseif(empty($lEmail)){
                     $msg6 = 'lecturer email is required';
                }else{
                    
                    try {
                        //connect to the database
                    $dsn = 'mysql:host=localhost;dbname=simpleclass';
                    
                    $connection = new PDO($dsn, 'Richard', 'rFSBtpxiM44WL0ja');
                        $errorInfo = $connection->errorInfo();
                        if(isset($errorInfo[2])){
                            $error = $errorInfo[2];
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    }
                        $file = $_FILES["fileToUpload"]["name"];
                        $table = "materials";
                        $dbvalues = "(material_name,course_name,lecturer_email)";
                        $values = "VALUES('$file','$cName','$lEmail')";
                        Material::uploadMaterial($connection,$table,$dbvalues,$values);
                        if (Material::$result == 1) {
                            $columnvalues = "materials = materials + 1";
                            $table = "teachers_account";
                            $where = "WHERE email = '$lEmail'";
                            Lecturer::addCountToMaterial($connection,$table,$columnvalues,$where);
                            if (Lecturer::$result == 1) {
                                echo $msg4 = 'Material ' . basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded successfully';    
                            }else {
                                echo $msg4 = 'Material upload failed';
                            } 
                            
                        } else {
                            echo $msg4 = 'Data was not inserted into material table';
                        }  
                }
            }
        }else{
            $msg5 = "Sorry there was an error uploading your file </br>";
            }
    }
}
?>