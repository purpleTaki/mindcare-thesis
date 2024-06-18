<?php
main_header(['dashboard']);
@$userID = $_GET['ID'];
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
  <section>

    <div class="card-body">
      <h3 class="text-center" style="color:#27B51E;font-size:1.36rem;">My Appointment List</h3>
      <div style="max-height: 350px; overflow-y: auto;">
      <table class="table table-bordered table-hover" style="margin:0px">
          <thead>
            <tr>
              <!-- <th>#</th> -->
              <th style="color:#026E09">Counselor Name</th>
              <th style="color:#026E09">Date</th>
              <th style="color:#026E09">Time</th>
              <th style="color:#026E09">Status</th>
              <th style="color:#026E09">Remarks</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($appointment as $appointments => $value) { ?>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <input type="hidden" name="appointmentID[]" class="appointmentID" value="<?= @$value->aptID ?>">
                    <input type="hidden" class="appointmentStatus" value="<?= @$value->Status ?>">
                    <td class=""><?= @$value->fname . ' ' . @$value->lname ?></td>
                    <td class=""><?= date('M d, Y', strtotime(@$value->Date)) ?></td>
                    <td class=""><?= date('h:ia', strtotime(@$value->fromTime)) .'-'. date('h:ia', strtotime(@$value->toTime)) ?></td>
                    <td class=""> <?php
                        $status = @$value->Status;
                        if ($status == 1) {
                            echo 'Approved';
                        } elseif ($status == 2) {
                            echo 'Cancelled';
                        } elseif ($status == 0) {
                            echo 'Pending';
                        } else {
                            echo 'Unknown Status';
                        }
                        ?>
                     </td>
                     <td class="text-center"><?= @$value->Remarks?></td>

                    
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-body">
      <h3 class="text-center" style="color:#27B51E; font-size:1.36rem;">Appointments from Counselor</h3>
      <div style="max-height: 320px; overflow-y: auto;">
      <table class="table table-bordered table-hover" style="margin:0px">
          <!-- <thead>
            <tr>
              <th style="color:#27B51E">Date</th>
              <th style="color:#27B51E">Time</th>
              <th style="color:#27B51E">Status</th>
              <th style="color:#27B51E">Options</th>
            </tr>
          </thead> -->
          <th style="color:#026E09">Notification</th>
              <th style="color:#026E09">Date</th>
              <th style="color:#026E09">Actions</th>
              <th style="color:#026E09">Status</th>
              <th style="color:#026E09">Remarks</th>
          <tbody>
            <?php foreach ($counselor_appointment as $appointments => $value) { ?>
            <tr data-widget="expandable-table" aria-expanded="false">
              <!-- <td>134</td> -->
              <input type="hidden" name="appointmentIDC[]" class="appointmentIDC" value=<?= @$value->aptID ?>>
              <input type="hidden" id="appointmentStatusC" value=<?= @$value->Status ?>>
              <td class="text-center col-5"><strong><?=ucfirst(@$value->fname).' '.ucfirst(@$value->lname)?></strong> wants to have a session with you</td>
              <td class="col-3 text-center" style="font-size:0.75rem;color:green;font-weight:800;"><?= date('M d, Y', strtotime(@$value->Date)).'<br>'.date('h:i a', strtotime(@$value->fromTime)) .'-'. date('h:i a', strtotime(@$value->toTime)) ?></td>
              <td class="col-4 pt-2 pl-4" style="padding:0%">

                <button class="btn btn-success p-1" type="button" data-toggle="modal" data-target="#modal_approve_remark_<?=@$value->aptID?>"><i class="fa fa-check-circle" style="margin:0%;padding:0%"></i>Accept</button>

                <button class="btn btn-success p-1 " data-toggle="modal" data-target="#modal_undo_remark_<?=@$value->aptID?>" type="button"><i class="fa fa-undo" style="margin:0%;padding:0%"></i>Pending</button>

                <button class="btn btn-success p-1 " data-toggle="modal" data-target="#modal_cancel_remark_<?=@$value->aptID?>"  type="button"><i class="fa fa-ban" style="margin:0%;padding:0%"></i> Deny</button>
              </td>
              <td class=""> <?php
                        $status = @$value->Status;
                        if ($status == 1) {
                            echo 'Approved';
                        } elseif ($status == 2) {
                            echo 'Cancelled';
                        } elseif ($status == 0) {
                            echo 'Pending';
                        } else {
                            echo 'Unknown Status';
                        }
                        ?>
                     </td>
              <td class="text-center col-5"><?=@$value->Remarks?></td>
            </tr>
              <!-- modal for appointment approval-->
            <div class="modal fade" id="modal_cancel_remark_<?=@$value->aptID?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <input type="text" name="appointmentIDC[]" class="appointmentIDC" value=<?= @$value->aptID ?>>
                        <input type="hidden" id="appointmentStatusC" value=<?= @$value->Status ?>>
                            <h4 class="modal-title">Appointment Cancellation and Remarks</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Leave Remarks as to why Appointment is Cancelled</p>
                            <input type="text" id="RemarksC" class="col-12">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default btn-success btnCancelC" id="btnCancelC" data-appointment-id="<?=@$value->aptID?>" data-dismiss="modal">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    <!-- /.modal -->
              <!-- modal for appointment cancellation-->
            <div class="modal fade" id="modal_approve_remark_<?=@$value->aptID?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <input type="text" name="appointmentIDC[]" class="appointmentIDC" value=<?= @$value->aptID ?>>
                        <input type="hidden" id="appointmentStatusC" value=<?= @$value->Status ?>>
                            <h4 class="modal-title">Appointment Confirmation and Remarks</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Leave Remarks for Approval of Appointment</p>
                            <input type="text" id="RemarksC" class="col-12">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default btn-success btnApproveC" data-appointment-id="<?=@$value->aptID?>" id="btnApproveC" data-dismiss="modal">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal_undo_remark_<?=@$value->aptID?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <input type="text" name="appointmentIDC[]" class="appointmentIDC" value=<?= @$value->aptID ?>>
                        <input type="hidden" id="appointmentStatusC" value=<?= @$value->Status ?>>
                            <h4 class="modal-title">Appointment Update and Remarks</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Leave Remarks for Update of Appointment</p>
                            <input type="text" id="RemarksC" class="col-12">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default btn-success btnUndoC" data-appointment-id="<?=@$value->aptID?>" id="btnUndoC" data-dismiss="modal">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    <!-- /.modal -->
            <?php } ?>
          </tbody>
        </table>
      </div>
      
      <a href="<?php echo base_url() ?>mobile?ID=<?= $userID ?>"><button class="btn btn-block btn-success btn-sm col-3 mt-2" type="button"><i class="fa fa-arrow-left" style="color:white"></i></button></a>
    </div>
  </section>
</body>
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>assets/js/appointment/appointment.js"></script>

<script>

  
</script>
