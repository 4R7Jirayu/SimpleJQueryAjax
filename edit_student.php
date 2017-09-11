
<?php include "connectdb.php"; ?> 
<html> 
    <?php include "head.php"; ?>
    <body> 
        <div class="container"> 
            <div class="row"> 
            <div class="col-md-6 col-md-offset-3">
            <div class="page-header">
            <h3>แก้ไขสมาชิก</h3>
            </div>
            <a href="index.php">หน้าแรก</a>
            <?php
                    $sql = mysqli_query($conn,"select * from student where std_id=".$_GET['std_id'].""); 
                    while($row = mysqli_fetch_array($sql)){
                         $fname = $row['std_fname']; 
                         $lname = $row['std_lname'];                          
                         $std_id = $row['std_id']; 
                         $major_id = $row['major_id']; 
                         $std_birthday =$row['std_birthday'];
                         $std_tel = $row['std_tel'];
                         $std_address = $row['std_address'];
                         $std_age = $row['std_age'];
                         $std_nick = $row['std_nick'];
                        } 
                    if($_GET['std_id'] != ''){
                    ?>
                    <form class="form-horizontal">
                <div class="form-group">
                <label class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-8">
                 <input type="hidden" class="form-control" id="st_id" value="<?php echo $st_id;?>" required>
                 <input type="text" class="form-control" id="firstname" value="<?php echo $fname;?>" required>
                 <span id="error_f"><span>
                </div>
               </div>
               <div class="form-group">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="lastname" value="<?php echo $lname;?>" required>
                </div>
               </div>
               <div class="form-group">
                <label class="col-sm-3 control-label">Student ID</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="std_id" value="<?php echo $std_id;?>" maxlength="10" required>
                </div>
               </div>
               <div class="form-group">
      <label class="col-sm-3 control-label">Nick Name</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="nickname" value="<?php echo $std_nick;?>" required>
      </div>
     </div>              
              <div class="form-group">
              <label class="col-sm-3 control-label">Faculty</label>
              <div class="col-sm-8">
                <select class="form-control" id="faculty">
                 <?php
                  $sql_faculty = mysqli_query($conn,"select * from faculty INNER JOIN major on faculty.faculty_id=major.faculty_id GROUP BY faculty_name");
                  while($faculty = mysqli_fetch_array($sql_faculty)){
                      if($faculty['faculty_id'] == $major_id){
                          $selected = "selected";
                      }else{
                          $selected = "";
                      }
                      echo "<option value=".$faculty['faculty_id']." ".$selected.">".$faculty['faculty_name']."</option>";
                  }
                  ?>
                 </select>
                 </div>
                 </div>
                 <div class="form-group">
                 <label class="col-sm-3 control-label">Major</label>
                 <div class="col-sm-8">
                    <select class="form-control" id="major">
                    <?php
                    $sql_major = mysqli_query($conn,"select * from major");
                    while($major = mysqli_fetch_array($sql_major)){
                     if($major['major_id'] == $major_id){
                         $selected = "selected";
                     }else{
                         $selected = "";
                     }
                     echo "<option value=".$major['major_id']." ".$selected.">".$major['major_name']."</option>";
                    }
                    ?>
                </select>
                </div>
                </div>
                <div class="form-group">
      <label class="col-sm-3 control-label">Tel</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="tel" value="<?php echo $std_tel;?>" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">BirthDay</label>
      <div class="col-sm-8">
       <input type="date" class="form-control" id="birthday" value="<?php echo $std_birthday;?>" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Age</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="age" value="<?php echo $std_age;?>" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Address</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="address" value="<?php echo $std_address;?>" required>
      </div>
     </div>
                <div class="form-group">
                <div class="col-sm-3">
    <button type="submit" class="btn btn-default">Save</button> 
</div> 
    </div> 
    </form> 
         <?php }else{header('Location: index.php');} ?>
    </div> 
</div> 
</div> 

<script type="text/javascript"> 
    $(document).ready(function(){ 
        
			$('#faculty').change(function(){
			var txt_f = $(this).val();
			var url = "major.php";
			var datas = {id : txt_f};
			$.post(url,datas,function(data){
			$("#major").html(data);
		});
	});
        $("button").click(function(){
            var TxtFname = $('#firstname').val(); 
            var TxtLname = $('#lastname').val(); 
            var TxtStdId = $('#std_id').val(); 
            var TxtMajor = $('#major').val(); 
            var TxtBirthday =$('#birthday').val();
            var TxtTel = $('#tel').val();
            var TxtAddress = $('#address').val();
            var TxtAge = $('#age').val();
            var TxtNname = $('#nickname').val();
            if(TxtStdId !=''){
                $.ajax({
                    type: "POST",
                    url: "edit_student2.php",
                    data: {
                        'TxtFname': TxtFname, 
                        'TxtLname': TxtLname, 
                        'TxtStdId': TxtStdId, 
                        'TxtMajor': TxtMajor,
                        'TxtBirthday': TxtBirthday,
                        'TxtTel':TxtTel,
                        'TxtAddress':TxtAddress,
                        'TxtAge':TxtAge,
                        'TxtNname':TxtNname
                    },
                    success: function(data){
                        alert( data );
                        top.location.href = "index.php";
                    }
                });
                return false;
            }else{
                alert("กรุณากรอกข้อมูล");
                return false;
            }
        });
    });
</script>  
       
</body>
</html>         