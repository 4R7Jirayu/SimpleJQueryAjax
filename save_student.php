<?php 
    include "connectdb.php";
    if(isset($_POST)){
        $TxtFname = $_POST['TxtFname'];
        $TxtLname = $_POST['TxtLname'];
        $TxtStdId = $_POST['TxtStdId'];
        $TxtMajor = $_POST['TxtMajor'];
        //(std_id,std_fname,std_lname,major_id,std_birthday,std_address,std_tel,std_project,std_age) 
        $sql ="INSERT INTO student (std_id,std_fname,std_lname,major_id) VALUES  ( ".$TxtStdId.",'".$TxtFname."','".$TxtLname."',".$TxtMajor." )";

        $sql_query = mysqli_query($conn,$sql);
        if($sql_query){
            echo "บันทึกสำเร็จ";
        }
        else{
            echo "ไม่สำเร็จ" .$sql."";
        }
    }
?>