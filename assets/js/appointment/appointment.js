$(document).on("click", "#setAppointment", function () {
  var Date = $("#aDate").val();
  // var Time = $('#aTime').val();
  var fromTime = $("#aTime").find(":selected").data("from");
  var toTime = $("#aTime").find(":selected").data("to");

  var ID = 5;
  console.log(fromTime + "-" + toTime);

  $.post({
    url: base_url + "mobile/service/Mobile_service/set_appointment",
    // selector: '.form-control',
    data: {
      // ID     : $('#cust_id').val(),
      Date: Date,
      fromTime: fromTime,
      toTime: toTime,
      studID: $("#studID").val(),
      counselorID: $("#gCounselor").val(),
      Status: 0,
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        // $('#modal-default').modal('hide');
        toastr.success(e.message);
        // $('#save').css('display','none');
        // $('#bill').css('display','inline');
        // $('#proceed_payment').css('display','block');
        // $('.form-control').attr('disabled','disabled');
        // $('.btn_add_item').attr('disabled','disabled');

        // $('#proceed_payment').click(function() {
        //     window.location.href = base_url+"point_of_sale/payment/?custid="+$('#cust_id').val()+'&oid='+e.id;
        // });
      } else {
        //   $('#List').attr('class', 'form-control inpt is-invalid');
        //   $('#modal-default').modal('hide');
        toastr.error(e.message);
      }
    },
  });
});
// Common function for handling actions
function handleAppointmentAction(ID, status, url, Remarks) {
  $.post({
    url: base_url + url,
    data: {
      ID: ID,
      Status: status,
      Remarks: Remarks,
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        if (e.message == "APPOINTMENT IS CANCELLED") {
          toastr.error(e.message);
          //   setTimeout(function () {
          //     location.href = location.href;
          // }, 1000);
          // Handle specific error message related to appointment cancellation
        } else {
          toastr.success(e.message);
          if (status == 0) {
            $("#btnUndo").css("display", "none");
            $("#btnApprove").css("display", "inline");
          } else if (status == 1) {
            $("#btnUndo").css("display", "inline");
            $("#btnApprove").css("display", "none");
          }
          // Redirect to the current URL after a delay
          // setTimeout(function () {
          //     location.href = location.href;
          // }, 1000);
        }
      } else {
        toastr.error(e.message);
      }
    },
  });
}

// Click event handler for approve button
$(document).on("click", ".btnApprove", function () {
  var appointmentID = $(this).closest("tr").find(".appointmentID").val();

  handleAppointmentAction(
    appointmentID,
    1,
    "mobile/service/Mobile_service/approve_appointment"
  );
});
$(document).on("click", ".btnApproveC", function () {
  var appointmentIDC = $(this).data("appointment-id");
  // alert(appointmentIDC);
  // return;
  // var Remarks = $("#Remarks").val();
  // console.log(appointmentIDC);
  // var appointmentIDC = $(this).data("appoinment-id");
  var Remarks = $("#modal_approve_remark_" + appointmentIDC).find("#RemarksC").val();
  // alert(Remarks);
  // return;
  handleAppointmentAction(
    appointmentIDC,
    1,
    "mobile/service/Mobile_service/approve_appointment",
    Remarks
  );
});

// Click event handler for undo button
$(document).on("click", ".btnUndo", function () {
  var appointmentID = $(this).closest("tr").find(".appointmentID").val();
  handleAppointmentAction(
    appointmentID,
    0,
    "mobile/service/Mobile_service/set_appointment_pending"
  );
});
// Click event handler for undo button
$(document).on("click", ".btnUndoC", function () {
  var appointmentIDC = $(this).data("appointment-id");
  var Remarks = $("#modal_undo_remark_" + appointmentIDC).find("#RemarksC").val();
  handleAppointmentAction(
    appointmentIDC,
    0,
    "mobile/service/Mobile_service/set_appointment_pending",
    Remarks
  );
});

// Click event handler for cancel button
$(document).on("click", ".btnCancel", function () {
  var appointmentID = $(this).closest("tr").find(".appointmentID").val();
  handleAppointmentAction(
    appointmentID,
    2,
    "mobile/service/Mobile_service/set_appointment_cancel"
  );
});
// Click event handler for cancel button
$(document).on("click", ".btnCancelC", function () {
  var appointmentIDC = $(this).data("appointment-id");
  var Remarks = $("#modal_cancel_remark_" + appointmentIDC).find("#RemarksC").val();

  // alert(Remarks);
  // return;
  handleAppointmentAction(
    appointmentIDC,
    2,
    "mobile/service/Mobile_service/set_appointment_cancel",
    Remarks
  );
});
