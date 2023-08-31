$(document).ready(function () {
  const toggleSideBar = () => {
    var state = $("#burger").data("state");

    if (state === "open") {
      $("#sidebar").addClass("sidebar-hide");
      $("#main").addClass("main-hide-side-bar");
      $("#burger").data("state", "close");
      $("#main").css("z-index", "1");
    } else {
      $("#sidebar").removeClass("sidebar-hide");
      $("#main").removeClass("main-hide-side-bar");
      $("#burger").data("state", "open");
      if ($(window).width() <= 900) {
        $("#main").css("z-index", "-1");
      } else {
        $("#main").css("z-index", "1");
      }
    }
  };

  const checkWindowWidth = () => {
    if ($(window).width() <= 900) {
      toggleSideBar();
    }
  };

  $("#burger").click(function (e) {
    e.preventDefault();
    toggleSideBar();
  });

  $(window).on("load", function () {
    checkWindowWidth();
  });

  $('#datatable').DataTable();
});
