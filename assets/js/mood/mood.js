$(document).on("click", "#submitMood", function () {
  const moods = $('input[name="moods"]:checked').val();
  const points = document.querySelector('input[name="moods"]:checked');
  const moodpoints = points ? points.getAttribute("data-pts") : null;
  var userID = $("#userID").val();
  console.log(moods);
  $.post({
    url: base_url + "mobile/service/Mobile_service/post_mood",
    // selector: '.form-control',
    data: {
      User: userID,
      Mood: moods,
      Points: moodpoints,
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        toastr.success(e.message);
        setTimeout(function () {
          location.href = location.href;
        }, 1000);
      } else {
        toastr.error(e.message);
      }
    },
  });
});

$(document).on("click", ".make-apt", function () {
  var queryString = window.location.search;
  var searchParams = new URLSearchParams(queryString);
  var ID = searchParams.get("ID");
  window.location = base_url + "mobile/schedule_appointment?ID=" + ID;
});

$(document).ready(function () {
  $(document).on("click", ".close", function () {
    setTimeout(function () {
      $("#modal-second").modal("show");
    }, 500);
  });
});

$(document).on("click", ".acknowledgebtn", function () {
  var queryString = window.location.search;
  var searchParams = new URLSearchParams(queryString);
  var ID = searchParams.get("ID");
  $.post({
    url: base_url + "mobile/service/Mobile_service/acknowledge",
    // selector: '.form-control',
    data: {
      User: ID,
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        location.href = location.href;
      }
      
    },
  });
});
