
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
                 <input type="text" class="form-control" id="std_id" value="<?php echo $std_id;?>" maxlength="11" required>
                </div>
               </div>
               <!-- $sql_faculty = mysqli_query($conn,"select * from faculty LEFT JOIN  major on faculty.faculty_id=major.faculty_id GROUP BY faculty_name"); 
              -->
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
            if(TxtStdId !=''){
                $.ajax({
                    type: "POST",
                    url: "edit_student2.php",
                    data: {
                        'TxtFname': TxtFname, 
                        'TxtLname': TxtLname, 
                        'TxtStdId': TxtStdId, 
                        'TxtMajor': TxtMajor 
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