<?php 
    include "connectdb.php";
    if(isset($_POST)){
        $TxtFname = $_POST['TxtFname'];
        $TxtLname = $_POST['TxtLname'];
        $TxtStdId = $_POST['TxtStdId'];
        $TxtMajor = $_POST['TxtMajor'];     
         $TxtBirthday =$_POST['TxtBirthday'];
         $TxtTel = $_POST['TxtTel'];
         $TxtAddress = $_POST['TxtAddress'];
         $TxtAge = $_POST['TxtAge'];
         $TxtNname = $_POST['TxtNname'];
        //(std_id,std_fname,std_lname,major_id,std_birthday,std_address,std_tel,std_project,std_age) 
        $sql ="INSERT INTO student (std_id,std_fname,std_lname,major_id,std_birthday,std_address,std_tel,std_nick,std_age) VALUES  ( ".$TxtStdId.",'".$TxtFname."','".$TxtLname."',".$TxtMajor.",'".$TxtBirthday."','".$TxtAddress."','".$TxtTel."','".$TxtNname."',".$TxtAge." )";

        $sql_query = mysqli_query($conn,$sql);
        if($sql_query){
            echo "บันทึกสำเร็จ";
        }
        else{
            echo "ไม่สำเร็จ" .$sql."";
        }
    }
?>