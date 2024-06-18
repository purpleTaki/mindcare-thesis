<?php
main_header(['dashboard']);

?>

<section>
<div class="card card-success" style="margin:0; padding:0">
              <div class="card-header">
                <h3 class="card-title">Student Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group-sm">
                    <input type="hidden" id="userID" value="<?=@$userID?>">
                    <label for="fName">First Name</label>
                    <input type="text" class="form-control" id="fName" value="<?=@$student_prof->fname?>" placeholder="<?=@$student_prof->fname?>">
                    <label for="mName">Middle Name</label>
                    <input type="text" class="form-control" id="mName" value="<?=@$student_prof->mname?>"placeholder="<?=@$student_prof->mname?>">
                    <label for="lName">Last Name</label>
                    <input type="text" class="form-control" id="lName" value="<?=@$student_prof->lname?>" placeholder="<?=@$student_prof->lname?>">
                  </div>
                  <div class="form-group-sm mt-2">
                    <label for="cNum">Contact Number</label>
                    <input type="text" class="form-control" id="cNum" value="<?=@$student_prof->cnum?>" placeholder="<?=@$student_prof->cnum?>">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" value="<?=@$student_prof->email?>" placeholder="<?=@$student_prof->email?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" id="editInfo" class="btn btn-success"><i class="fa fa-edit" style="color:white"></i></button>
                  <a href="<?php echo base_url() ?>Mobile/student_profile?ID=<?=@$userID?>"><button type="button" class="btn btn-success "><i class="fa fa-arrow-left" style="color:white"></button></a>
                </div>
              </form>
    </div>
</section>
<?php 
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/mobile_js/student.js"></script>