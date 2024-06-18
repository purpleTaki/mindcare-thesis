<?php
main_header(['dashboard']);
date_default_timezone_set('UTC');
?>

<head>
  <style>
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

    @media only screen and (max-width: 768px) {

      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="card card-success col-12 col-lg-6 col-md-6 col-sm-12 mt-5" style="padding:0">
    <div class="card-header">
      <h3 class="card-title">Set Appointment Schedule</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group-sm">
          <input type="hidden" id="studID" value="<?= @$userID ?>">
          <label for="counselor">Guidance Counselor</label><br>
          <select class="custom-select rounded-0" id="gCounselor">
            <?php foreach ($counselor as $key => $value) { ?>
              <option value="<?= @$value->ID ?>"><?= @$value->fname . ' ' . @$value->mname . ' ' . @$value->lname ?></option>
            <?php } ?>
          </select><br>
          <label for="aDate">Appointment Date</label>
          <input type="date" class="form-control" id="aDate">
          <label for="aTime">Appointment Time</label>
          <!-- <input type="time" class="form-control" id="aTime" placeholder=""> -->
          <select id="aTime" name="schedule">
            <option disabled>--Select Appointment Time--</option>
            <option data-from="<?= date('H:i:s', strtotime('08:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('09:00:00')) ?>">8:00am - 9:00am</option>
            <option data-from="<?= date('H:i:s', strtotime('09:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('10:00:00')) ?>">9:00am - 10:00am</option>
            <option data-from="<?= date('H:i:s', strtotime('10:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('11:00:00')) ?>">10:00am - 11:00am</option>
            <option data-from="<?= date('H:i:s', strtotime('13:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('14:00:00')) ?>">1:00pm - 2:00pm</option>
            <option data-from="<?= date('H:i:s', strtotime('14:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('15:00:00')) ?>">2:00pm - 3:00pm</option>
            <option data-from="<?= date('H:i:s', strtotime('15:00:00')) ?>" data-to="<?= date('H:i:s', strtotime('16:00:00')) ?>">3:00pm - 4:00pm</option>
          </select>
        </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
          <div class="col-6">
            <button type="button" id="setAppointment" class="btn btn-success col-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 p-2"><i class="fa fa-save" style="color:white"></i></button>
            <a href="<?php echo base_url() ?>Mobile/index?ID=<?= @$userID ?>"><button type="button" class="btn btn-success col-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 p-2"><i class="fa fa-arrow-left" style="color:white"></i></button></a>
          </div>
          <div class="col-6">

          </div>
        </div>
      </div>
    </form>
  </div>
</body>
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/appointment/appointment.js"></script>