<?php
 include "connectdb.php";
?>
<html>
	<?php include "head.php";?>
	<body>
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <div class="page-header">
     <h3>เพิ่มสมาชิก</h3>
    </div>
    <a href="index.php">หน้าแรก</a>
    <form class="form-horizontal">
     <div class="form-group">
      <label class="col-sm-3 control-label">First Name</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
       <span id="error_f"><span>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Last Name</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="lastname" placeholder="Last Name" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Nick Name</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="nickname" placeholder="Nick Name" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Student ID</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="student_id" placeholder="Student ID" maxlength="11" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Faculty</label>
      <div class="col-sm-8">
        <select class="form-control" id="faculty" required>
         <option value="0">เลือกคณะ</option>
        <?php
         $fc = mysqli_query($conn,"select * from faculty");
         while($row = mysqli_fetch_array($fc)){
             echo "<option value=".$row['faculty_id'].">".$row['faculty_name']."</option>";
         }
         ?>
        </select>
    </div>
    </div>
    <div class="form-group">
     <label class="col-sm-3 control-label">Major</label>
     <div class="col-sm-8">
     <select class="form-control" id="major">
      <option value="0">เลือกสาขา</option>
     </select>
     </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Tel</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="tel" placeholder="Tel" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">BirthDay</label>
      <div class="col-sm-8">
       <input type="date" class="form-control" id="birthday" placeholder="BirthDay" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Age</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="age" placeholder="Age" required>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Address</label>
      <div class="col-sm-8">
       <input type="text" class="form-control" id="address" placeholder="Address" required>
      </div>
     </div>
    
     <div class="form-group">
      <div class="col-sm-3 control-label">
       <button type="submit" class="btn btn-default">Save</button>
      </div>
      </div>
      
      
      </form>
      </div>
      </div>
      </div>
    <script> 
    $(document).ready(function() {
        $("#faculty").change(function() { 
            var TxtFaculty = $(this).val(); 
            $.ajax({ 
                type: "POST", 
                url: "major.php", 
                data: { 
                    'id':TxtFaculty 
                    }, 
                success: function(data){ 
                    $("#major").html(data); 
                    }
                }); 
                return false;  
        });
    $(".btn").on('click',function(){ 
        var Txt;
        var TxtFname = $("#firstname").val(); 
        var TxtLname = $("#lastname").val(); 
        var TxtStdId = $("#student_id").val(); 
        var TxtFaculty = $("#faculty").val(); 
        var TxtMajor = $("#major").val(); 
        var TxtBirthday =$('#birthday').val();
        var TxtTel = $('#tel').val();
        var TxtAddress = $('#address').val();
        var TxtAge = $('#age').val();
        var TxtNname = $('#nickname').val();
        if(TxtFname !="" && TxtFaculty !="0"){ 
            $.ajax({ 
                type: 'POST', 
                url: 'save_student.php', 
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
                dataType : 'html', 
                success: function(data){ 
                    alert( data ); 
                    top.location.href = "index.php"; 
                    } 
                }); 
                return false; 
                }else
                    { alert(" "); 
                    return false; 
                } 
            }); 
        }); 
    </script> 
</body> 
</html> 
