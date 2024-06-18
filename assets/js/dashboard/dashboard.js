var load_articles = () => {
  $(document).gmLoadPage({
    url: "dashboard/get_details",
    load_on: "#load_details",
  });
};

$(document).ready(function () {
  function populateModalFields(title, articleURL, shortDescription, ID) {
    // Set values in the modal input fields
    $("#u-article-title").val(title);
    $("#u-basic-url").val(articleURL);
    $("#u-shortdesc").val(shortDescription);
    $("#uID").val(ID);
  }
});

$(".btn-add-article").click(function () {
  $.post({
    url: "dashboard/service/Dashboard_service/save",
    // selector: '.form-control',
    data: {
      article_url: $("#basic-url").val(),
      title: $("#article-title").val(),
      desc: $("#shortdesc").val(),
    },
    success: function (e) {
      var e = JSON.parse(e);
      if (e.has_error == false) {
        window.location.reload();
      } else {
      }
    },
  });
});

function populateModalFields(title, articleURL, shortDescription, ID) {
  // Set values in the modal input fields
  $("#u-article-title").val(title);
  $("#u-basic-url").val(articleURL);
  $("#u-shortdesc").val(shortDescription);
  $("#uID").val(ID);
}

$(".btn-update-modal").click(function () {
  // Retrieve the data attributes
  var title = $(this).data("title");
  var articleURL = $(this).data("articleurl");
  var shortDescription = $(this).data("shortdesc");
  var ID = $(this).data("id");

  // Call the function to set values in the modal
  populateModalFields(title, articleURL, shortDescription, ID);

  // Show the modal
  $("#updateModal").modal("show");
});

$(".btn-archive").click(function () {
  // Retrieve the data attributes
  var ID = $(this).data("id");
  if (confirm("Are you sure you want to archive this article?") == true) {
    $.post({
      url: "dashboard/service/Dashboard_service/archive",
      data: {
        ID: ID,
      },
      success: function (e) {
        var e = JSON.parse(e);
        if (e.has_error == false) {
          toastr.success(e.message);
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        } else {
          toastr.error(e.message);
        }
      },
    });
  } else {
    return;
  }
});

$("#btn-update").click(function () {
  // Retrieve the data attributes
  if (confirm("Would you like to update this article??") == true) {
    $.post({
      url: "dashboard/service/Dashboard_service/update",
      data: {
        ID: $("#uID").val(),
        article_url: $("#u-basic-url").val(),
        title: $("#u-article-title").val(),
        desc: $("#u-shortdesc").val(),
      },
      success: function (e) {
        var e = JSON.parse(e);
        if (e.has_error == false) {
          toastr.success(e.message);
          setTimeout(function () {
            // window.location.reload();
          }, 1000);
        } else {
          toastr.error(e.message);
        }
      },
    });
  } else {
    return;
  }
});
