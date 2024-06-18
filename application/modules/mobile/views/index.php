<?php
main_header(['dashboard']);

@$userID = @$_GET['ID'];

?>
<!-- ############ PAGE START-->
<style>
    .article-list {
        color: #313437;
        background-color: #fff;
    }

    .article-list p {
        color: #7d8285;
    }

    .article-list h2 {
        font-weight: bold;
        margin-bottom: 40px;
        padding-top: 40px;
        color: inherit;
    }

    @media (max-width:767px) {
        .article-list h2 {
            margin-bottom: 25px;
            padding-top: 25px;
            font-size: 24px;
        }
    }

    .article-list .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto;
    }

    .article-list .intro p {
        margin-bottom: 0;
    }

    .article-list .articles {
        padding-bottom: 40px;
    }

    .article-list .item {
        padding-top: 50px;
        min-height: 425px;
        text-align: center;
    }

    .article-list .item .name {
        font-weight: bold;
        font-size: 16px;
        margin-top: 20px;
        color: inherit;
    }

    .article-list .item .description {
        font-size: 14px;
        margin-top: 15px;
        margin-bottom: 0;
    }

    .article-list .item .action {
        font-size: 24px;
        width: 24px;
        margin: 22px auto 0;
        line-height: 1;
        display: block;
        color: #4f86c3;
        opacity: 0.85;
        transition: opacity 0.2s;
        text-decoration: none;
    }

    .article-list .item .action:hover {
        opacity: 1;
    }

    /* For desktop: */
    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    @media only screen and (min-width: 412px) and (max-width: 1440px) and (min-height: 732px) and (max-height: 2960px) and (orientation: portrait) {
        /* Your styles for Pixel 3XL in portrait mode go here */
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        [class*="col-"] {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="btnHolder col-12" style="margin:auto; padding:auto">
        <h3 class="col-12 pt-4 pb-5" style="color:#27B51E">Welcome to Mindcare!</h3>
        <a href="<?php echo base_url() ?>Mobile/student_profile?ID=<?= @$userID ?>"> <button type="button" id="profBtn" style="margin-top: 3rem;" class="btn btn-block btn-outline-success btn-lg p-1 mb-5 col-12">Profile</button></a>
        <a href="<?php echo base_url() ?>Mobile/schedule_appointment?ID=<?= @$userID ?>"> <button type="button" id="schedBtn" class="btn btn-block btn-outline-success btn-lg mt-2 p-1 mb-5 col-12">Appointment</button></a>
        <a href="<?php echo base_url() ?>Mobile/view_appointments?ID=<?= @$userID ?>"> <button type="button" id="viewApt" class="btn btn-block btn-outline-success btn-lg mt-2 p-1 mb-5 col-12">View Appointments</button></a>
        <a href="<?php echo base_url() ?>Mobile/mood?ID=<?= @$userID ?>"> <button type="button" id="moodBtn" class="btn btn-block btn-outline-success btn-lg mt-2 p-1 mb-5 col-12">Post Mood</button></a>
        <a href="<?php echo base_url() ?>Mobile/view_articles?ID=<?= @$userID ?>"> <button type="button" id="moodBtn" class="btn btn-block btn-outline-success btn-lg mt-2 p-1 col-12">View Articles</button></a>

    </div>
</div>



<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/mobile_js/mobile.js"></script>