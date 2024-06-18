// $(".btn-status").click(function () {
$(document).on("click", ".btn-status", function () {
  if (confirm("Would you like to confirm this action???")) {
    $.post({
      url: "appointment/service/Appointment_service/update_status",
      data: {
        ID: $(this).data("id"),
        status: $(this).data("stat"),
        // remarks: $("#remarks").val()
      },
      success: function (e) {
        var e = JSON.parse(e);
        if (e.has_error == false) {
          if (e.stat == 1) {
            alert("Appointment status is set to : Approved");
            // window.location.reload();
          } else if (e.stat == 0) {
            alert("Appointment status is set to : Pending");
            // window.location.reload();
          } else if (e.stat == 2) {
            alert("Appointment status is set to : Cancelled");
            // window.location.reload();
          }
        } else {
          alert("error");
        }
      },
    });
  } else {
    return;
  }
});

$(".btn-modal").click(function () {
  var ID = $(this).data("id");
  var status = $(this).data("stat");
  console.log(ID + " " + status);
  $("#idd").val(ID);
  $("#statt").val(status);
});

$(document).on("click", ".btn-update-stat", function () {
  if (confirm("Would you like to confirm this action???")) {
    $.post({
      url: "appointment/service/Appointment_service/update_status",
      data: {
        ID: $("#idd").val(),
        status: $("#statt").val(),
        remarks: $("#remarks").val()
      },
      success: function (e) {
        var e = JSON.parse(e);
        if (e.has_error == false) {
          if (e.stat == 1) {
            alert("Appointment status is set to : Approved");
            // window.location.reload();
          } else if (e.stat == 0) {
            alert("Appointment status is set to : Pending");
            // window.location.reload();
          } else if (e.stat == 2) {
            alert("Appointment status is set to : Cancelled");
            // window.location.reload();
          }
        } else {
          alert("error");
        }
      },
    });
  } else {
    return;
  }
});
