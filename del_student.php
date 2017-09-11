<?php include "connectdb.php"; ?> 
<html> 
<?php include "head.php"; ?>    
<body> 
	<?php
		include "connectdb.php";
		if(isset($_GET)){
			$std_id=$_GET['std_id'];
			$sql = mysqli_query($conn,"DELETE FROM student WHERE std_id='".$std_id."'");					
			if($sql){
				echo "<center>ลบข้อมูลสำเร็จ<br>";
				echo "<a href='index.php'>กลับ</a>";
				}else{
				echo "ไม่สามารถลบข้อมูลได้[".' '.$sql.' '."]";
				echo"<a href='index.php'>กลับ</a></center>";
				}
			}
	?>
	</body>
</html>