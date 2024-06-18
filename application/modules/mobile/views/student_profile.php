<?php
main_header(['dashboard']);

?>

<style>
    .label-details{
        font-weight: normal !important;
        color: #7e7e7e;
    }
    /* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
.details-container{
    border: #27B51E solid 2px;
    margin-top: 2rem;
}
</style>
<div class="container" >
    <div class="col-12">
        
            <!-- <h2>Student Profile</h2>
            <label></label> </br>
            <label>Year and Section: <?=$student_prof->yearSection?></label> </br>
            <label>Contact Number: <?=$student_prof->cnum?></label> </br>
            <label>Email Address: <?=$student_prof->email?></label> </br> -->
            
            <div class="card-body details-container">
            <h2 class="ml-1">My Profile</h2>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">ID Number:</b>  <?=@$student_prof->username?></label><br>
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">First Name:</b>  <?=@$student_prof->fname?></label><br>
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">Last Name:</b>  <?=@$student_prof->lname?></label><br>
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">Middle Name:</b> <?=@$student_prof->mname?></label><br>
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">Contact Number:</b>  <?=@$student_prof->cnum?></label><br>
                    
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">Year and Section:</b> <?=@$student_prof->yearSection?></label><br>
                    <label class="label-details" style="font-size: 20px; color: #27B51E"><b style="color:black">Email Address:</b>  <?=@$student_prof->email?></label>
                </div><br>
            </div>   
            <div class="row col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                <a href="<?php echo base_url()?>Mobile/edit_student_profile?ID=<?=$userID?>"><button class="btn btn-block btn-success btn-sm col-12 ml-2 p-2" id="editProfBtn" type="button"><i class="fa fa-edit" style="color:white"></i></button></a>
                <a href="<?php echo base_url()?>mobile?ID=<?=$userID?>"><button class="btn btn-block btn-success btn-sm col-12 ml-3 p-2" type="button"><i class="fa fa-arrow-left" style="color:white"></i></button></a>
            </div>              
    </div>
</div>
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/mobile_js/student_prof.js"></script>