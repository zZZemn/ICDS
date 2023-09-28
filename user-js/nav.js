$(document).ready(function () {
  var isClosed = true;

  $("#toggleNav").click(function (e) {
    e.preventDefault();
    if (isClosed == true) {
      // open the nav
      console.log("open");
      $(".nav-links").css("transform", "translateX(0)");
      isClosed = !isClosed;
    } else {
      //    close the nav
      console.log("close");
      $(".nav-links").css("transform", "translateX(-100%)");
      isClosed = !isClosed;
    }
  });

  const updateMaxWidth = () => {
    var screenWidth = $(window).width();
    if (screenWidth > 729) {
      $(".nav-links").css("transform", "translateX(0)");
    } else {
        $(".nav-links").css("transform", "translateX(-100%)");
    }
    console.log(screenWidth);
  };

  // Initial call to set max-width on page load
  updateMaxWidth();

  // Update max-width when the window is resized
  $(window).resize(updateMaxWidth);
});
