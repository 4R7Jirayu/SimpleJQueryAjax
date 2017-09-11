<?php
 include "connectdb.php";
 if(isset($_POST)){
    $TxtStdId = $_POST['TxtStdId'];
    $TxtFname = $_POST['TxtFname'];
    $TxtLname =$_POST['TxtLname'];
	$TxtMajor = $_POST['TxtMajor'];
	$TxtBirthday =$_POST['TxtBirthday'];
	$TxtTel = $_POST['TxtTel'];
	$TxtAddress = $_POST['TxtAddress'];
	$TxtAge = $_POST['TxtAge'];
	$TxtNname = $_POST['TxtNname'];
   /*
		 $std_birthday =$row['std_birthday'];
                         $std_tel = $row['std_tel'];
                         $std_address = $row['std_address'];
                         $std_age = $row['std_age'];
                         $std_nick = $row['std_nick'];
   */
   $sql_update = "UPDATE student SET std_fname = '".$TxtFname."', std_lname = '".$TxtLname."',major_id = ".$TxtMajor.",std_birthday = '".$TxtBirthday."',std_tel = ".$TxtTel.",std_address = '".$TxtAddress."',std_age = ".$TxtAge.",std_nick = '".$TxtNname."' where Std_id=".$TxtStdId."";

    $query_sql = mysqli_query($conn,$sql_update);
	if($query_sql){
	 $msg = "แก้ไขข้อมูลสำเร็จ";
	 echo $msg;
	 }else{
	 $msg = "ไม่สามารถแก้ไขข้อมูลได้ [".' '.$sql_update.''."]";
	 echo $msg;
	 }
	 }
?>