$(document).ready(function () {
  load_details();
});

var load_details = () => {
  $(document).gmLoadPage({
    url: "user/get_students",
    load_on: "#load_students",
  });
};

$("#search").change(function () {
  $.post({
    url: "user/service/User_service/search",
    data: {
      search: $(this).val(),
    },
    success: function (response) {
      $("#load_students").html(response);
    },
  });
});

$("#save").click(function () {
  $.post({
    url: "user/service/User_service/save",
    data: {
      fname: $("#fname").val(),
      mname: $("#mname").val(),
      lname: $("#lname").val(),
      uname: $("#uname").val(),
      email: $("#email").val(),
      gender: $("#gender").val(),
      course: $("#course").val(),
      usertype: $("#usertype").val(),
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        window.location.reload();
      } else {
        alert("error");
      }
    },
  });
});

// $(".edit-btn").click(function () {
// });

// used this type of format because other version cannot detect grid elements
$(document).on("click", ".edit-btn", function () {
  $("#save").off("click");
  $("#save").attr("id", "edit-user");
  $("#edit-user").text("EDIT");
  $("#cancelbtn").show();
  var id = $(this).data("id");
  var fname = $(this).data("fname");
  var mname = $(this).data("mname");
  var lname = $(this).data("lname");
  var uname = $(this).data("uname");
  var email = $(this).data("email");
  var course = $(this).data("course");

  $("#update").val(id);
  $("#fname").val(fname);
  $("#mname").val(mname);
  $("#lname").val(lname);
  $("#uname").val(uname);
  $("#email").val(email);
  $("#course").val(course);

  $("#edit-user").click(function () {
    $.post({
      url: "user/service/User_service/update",
      data: {
        ID: $("#update").val(),
        fname: $("#fname").val(),
        mname: $("#mname").val(),
        lname: $("#lname").val(),
        uname: $("#uname").val(),
        email: $("#email").val(),
        gender: $("#gender").val(),
        course: $("#course").val(),
        usertype: $("#usertype").val(),
      },
      success: function (e) {
        var e = JSON.parse(e);
        if (e.has_error == false) {
          window.location.reload();
        } else {
          alert("error");
        }
      },
    });
  });

  $("#cancelbtn").click(function () {
    $(this).removeAttr("style").hide();
    $("#edit-user").off("click");
    $("#edit-user").attr("id", "save");
    $("#save").text("SAVE");
  });
});

$(document).on("click", ".btn-make-apt", function () {
  var fname = $(this).data("fname");
  var mname = $(this).data("mname");
  var lname = $(this).data("lname");
  var ID = $(this).data("id");

  var fullname = fname + " " + Array.from(mname)[0] + ". " + lname;
  $("#std_name").text(fullname);
  $("#std_ID").val(ID);
});

$("#make-appointment").click(function () {
  $.post({
    url: "user/service/User_service/make_appointment",
    data: {
      ID: $("#std_ID").val(),
      adate: $("#aDate").val(),
      atime: $("#aTime").val(),
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        window.location.reload();
      } else {
        alert("error");
      }
    },
  });
});

$(document).on("click", ".btn-view", function () {
  var ID = $(this).data("id");
  // alert(ID)
  $(document).gmLoadPage({
    url: "user/load_chart?ID=" + ID,
    load_on: "#load-chart",
  });
});

$("#usertype").change(function () {
  alert();
  switch ($("#usertype").val()) {
    case "0":
      console.log("Setting value to empty");
      $("#course").val("");
      break;
    case "1":
      console.log("Setting value to Counselor");
      $("#course").val("Counselor");
      break;
    case "2":
      console.log("Setting value to Admin");
      $("#course").val("Admin");
      break;
    case "3":
      console.log("Setting value to Sec");
      $("#course").val("Secretary");
      break;
  }
});
