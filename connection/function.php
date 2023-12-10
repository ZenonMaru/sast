<?php

include('./connect_db.php');

session_start();

//restriction delete, edit or update
if(isset($_POST['add_to_list'])){

    $faculty_id = mysqli_real_escape_string($con,$_POST['faculty_id']);
    $class_id = mysqli_real_escape_string($con,$_POST['class_id']);
    $subject_id = mysqli_real_escape_string($con,$_POST['subject_id']);

    
            $insert = " INSERT INTO `restriction_list` (faculty_id, class_id, subject_id) 
            VALUES ('$faculty_id', '$class_id', '$subject_id')";
            mysqli_query($con, $insert);
            header('location:../Admin/EditQuestionnaire.php');
}
//question delete, edit or update
if(isset($_POST['submit_question'])){

    $question = mysqli_real_escape_string($con,$_POST['question']);

    
            $insert = " INSERT INTO `question_list` (question) VALUES ('$question')";
            mysqli_query($con, $insert);
            header('location:../Admin/EditQuestionnaire.php');
}
//criteria delete, edit or update
if(isset($_POST['delete_criteria'])){

    $ID = mysqli_real_escape_string($con,$_POST['delete_criteria']);

    $select = "DELETE FROM `criteria_list` WHERE ID= '$ID'";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/criteria.php');
    }else{
        header('location:../Admin/criteria.php');
    }
}

if(isset($_POST['submit_criteria'])){

    $Criteria = mysqli_real_escape_string($con,$_POST['Criteria']);

            $insert = " INSERT INTO `criteria_list` (Criteria)
            VALUES ('$Criteria')";
            mysqli_query($con, $insert);
            header('location:../Admin/criteria.php');
        }

//academic delete, edit or update
if(isset($_POST['delete_academic'])){

    $ID = mysqli_real_escape_string($con,$_POST['delete_academic']);

    $select = "DELETE FROM `academic_list` WHERE ID= '$ID'";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/AcademicYear.php');
    }else{
        header('location:../Admin/AcademicYear.php');
    }
}

if(isset($_POST['update_academic'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Year = mysqli_real_escape_string($con,$_POST['Year']);
    $Semester = mysqli_real_escape_string($con,$_POST['Semester']);
    $Status = mysqli_real_escape_string($con,$_POST['Status']);

    $select = " UPDATE `academic_list` SET Year='$Year', Semester='$Semester', Status='$Status' WHERE ID= '$ID'";

    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/AcademicYear.php');
    }else{
        header('location:../Admin/AcademicYear.php');
    }
}

if(isset($_POST['submit_academic'])){

    $Year = mysqli_real_escape_string($con,$_POST['Year']);
    $Semester = mysqli_real_escape_string($con,$_POST['Semester']);

    
            $insert = " INSERT INTO `academic_list` (Year, Semester)
            VALUES ('$Year','$Semester')";
            mysqli_query($con, $insert);
            header('location:../Admin/AcademicYear.php');
        }



//subject add, delete, edit or update

if(isset($_POST['delete_subject'])){

    $ID = mysqli_real_escape_string($con,$_POST['delete_subject']);

    $select = "DELETE FROM `subject_list` WHERE ID= '$ID'";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/subject.php');
    }else{
        header('location:../Admin/subject.php');
    }
}

if(isset($_POST['update_subject'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Code = mysqli_real_escape_string($con,$_POST['Code']);
    $Subject = mysqli_real_escape_string($con,$_POST['Subject']);
    $Description = mysqli_real_escape_string($con,$_POST['Description']);

    $select = " UPDATE `subject_list` SET Code='$Code', Subject='$Subject', Description='$Description' WHERE ID= '$ID'";

    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/subject.php');
    }else{
        header('location:../Admin/subject.php');
    }
}

if(isset($_POST['submit_subject'])){

    $Code = mysqli_real_escape_string($con,$_POST['Code']);
    $Subject = mysqli_real_escape_string($con,$_POST['Subject']);
    $Description = mysqli_real_escape_string($con,$_POST['Description']);

    
            $insert = " INSERT INTO `subject_list` (Code, Subject, Description)
            VALUES ('$Code','$Subject', '$Description')";
            mysqli_query($con, $insert);
            header('location:../Admin/subject.php');
        }


//class add, delete, edit or update
if(isset($_POST['delete_class'])){

    $ID = mysqli_real_escape_string($con,$_POST['delete_class']);

    $select = "DELETE FROM `class_list` WHERE ID= '$ID'";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/class.php');
    }else{
        header('location:../Admin/class.php');
    }
}

if(isset($_POST['update_class'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Class = mysqli_real_escape_string($con,$_POST['Class']);

    $select = " UPDATE `class_list` SET Class='$Class' WHERE ID= '$ID'";

    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/class.php');
    }else{
        header('location:../Admin/class.php');
    }
}

if(isset($_POST['submit_class'])){

    $Class = mysqli_real_escape_string($con,$_POST['Class']);

            $insert = " INSERT INTO `class_list` (Class) VALUES ('$Class')";
            mysqli_query($con, $insert);
            header('location:../Admin/class.php');
}

//faculty delete, edit or update

if(isset($_POST['delete_faculty'])){

    $ID = $_POST['deleteID_faculty'];

    $select = "DELETE FROM `faculty_list` WHERE ID= '$ID'";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/faculty.php');
    }else{
        header('location:../Admin/faculty.php');
    }
}

if(isset($_POST['update_faculty'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $SchoolID = mysqli_real_escape_string($con,$_POST['SchoolID']);
    $FullName = mysqli_real_escape_string($con,$_POST['FullName']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con, md5($_POST['Password']));
    $CPassword = mysqli_real_escape_string($con, md5($_POST['CPassword'])); 

    $select = mysqli_query($con," UPDATE `faculty_list` SET SchoolID='$SchoolID', FullName='$FullName', Email= '$Email', Password= '$Password', CPassword= '$CPassword' WHERE ID= '$ID'");

    if($select){
        header('location:../Admin/faculty.php');
    }else{
        header('location:../Admin/faculty.php');
    }
};
if(isset($_POST['update_faculty'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Avatar = $_FILES['Avatar']['name'];
    if(!empty($Avatar)){
            $update_avatar_query = mysqli_query($con, " UPDATE `faculty_list` SET Avatar= '$Avatar' WHERE ID= '$ID'");

            if($update_avatar_query){
                move_uploaded_file($_FILES['Avatar']['tmp_name'], "../uploads/".$_FILES["Avatar"]["name"]); 
            }
    }
};
//student delete, edit or update

if(isset($_POST['delete'])){

    $ID = $_POST['deleteID'];

    $select = "DELETE FROM `student_list` WHERE ID= '$ID' ";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/student.php');
    }else{
        header('location:../Admin/student.php');
    }
}
if(isset($_POST['update'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $SchoolID = mysqli_real_escape_string($con,$_POST['SchoolID']);
    $FullName = mysqli_real_escape_string($con,$_POST['FullName']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $CourseYear = mysqli_real_escape_string($con,$_POST['CourseYear']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con, md5($_POST['Password']));
    $CPassword = mysqli_real_escape_string($con, md5($_POST['CPassword'])); 
    
            $select = mysqli_query($con," UPDATE `student_list` SET SchoolID='$SchoolID', FullName='$FullName', Username='$Username', 
            CourseYear='$CourseYear', Email= '$Email', Password= '$Password', CPassword= '$CPassword' WHERE ID= '$ID'");

            if($select){                           
                header('location:../Admin/student.php');
            }else{
                header('location:../Admin/student.php');
            }
};
if(isset($_POST['update'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Avatar = $_FILES['Avatar']['name'];
    if(!empty($Avatar)){
            $update_avatar_query = mysqli_query($con, " UPDATE `student_list` SET Avatar= '$Avatar' WHERE ID= '$ID'");

            if($update_avatar_query){
                move_uploaded_file($_FILES['Avatar']['tmp_name'], "../uploads/".$_FILES["Avatar"]["name"]); 
            }
    }
};
// admin or userdata table
if(isset($_POST['delete_Admin'])){

    $ID = $_POST['deleteID_Admin'];

    $select = "DELETE FROM `userdata` WHERE ID= '$ID' ";
    $result = mysqli_query($con, $select);

    if($result){
        header('location:../Admin/user.php');
    }else{
        header('location:../Admin/user.php');
    }
}
if(isset($_POST['update_admin'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $SchoolID = mysqli_real_escape_string($con,$_POST['SchoolID']);
    $FullName = mysqli_real_escape_string($con,$_POST['FullName']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con, md5($_POST['Password']));
    $CPassword = mysqli_real_escape_string($con, md5($_POST['CPassword'])); 
    
            $select = mysqli_query($con," UPDATE `userdata` SET SchoolID='$SchoolID', FullName='$FullName', Username='$Username', 
            Email= '$Email', Password= '$Password', CPassword= '$CPassword' WHERE ID= '$ID'");

            if($select){                           
                header('location:../Admin/user.php');
            }else{
                header('location:../Admin/user.php');
            }
};
if(isset($_POST['update_admin'])){

    $ID = mysqli_real_escape_string($con,$_POST['ID']);

    $Avatar = $_FILES['Avatar']['name'];
    if(!empty($Avatar)){
            $update_avatar_query = mysqli_query($con, " UPDATE `userdata` SET Avatar= '$Avatar' WHERE ID= '$ID'");

            if($update_avatar_query){
                move_uploaded_file($_FILES['Avatar']['tmp_name'], "../uploads/".$_FILES["Avatar"]["name"]); 
            }
    }
};
?>