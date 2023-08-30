$(document).ready(function () {
  const toggleSideBar = () => {
    var state = $("#burger").data("state");

    if (state === "open") {
      $("#sidebar").addClass("sidebar-hide");
      $("#main").addClass("main-hide-side-bar");
      $("#burger").data("state", "close");
    } else {
      $("#sidebar").removeClass("sidebar-hide");
      $("#main").removeClass("main-hide-side-bar");
      $("#burger").data("state", "open");
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
});
