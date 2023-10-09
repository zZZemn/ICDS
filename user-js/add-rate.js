$(document).ready(function () {
  var rateValue = 0;

  const closeAddReviewFrm = () => {
    $("#txtReview").val("");
    $(".add-review-frm-container").css("display", "none");
    rateValue = 0;
  };

  const changeStarsColor = (value) => {
    $(".btnRateStarsClick i").removeClass("fa-solid");
    $(".btnRateStarsClick i").addClass("fa-regular");

    for (i = value; i > 0; i--) {
      $(".btnRateStarsClick" + i + " i").removeClass("fa-regular");
      $(".btnRateStarsClick" + i + " i").addClass("fa-solid");
    }
  };

  $("#btnOpenAddReviewModal").click(function (e) {
    e.preventDefault();
    $(".add-review-frm-container").css("display", "block");
  });

  $("#btnCancelAddReview").click(function (e) {
    e.preventDefault();
    closeAddReviewFrm();
    changeStarsColor(0);
  });

  $(".btnRateStarsClick").click(function (e) {
    e.preventDefault();
    rateValue = $(this).attr("data-val");
    changeStarsColor(rateValue);
  });

  $("#frmModalAddReview").submit(function (e) {
    e.preventDefault();
    var userId = $("#userId").val();
    var storeId = $("#storeId").val();
    var review = $("#txtReview").val();

    $.ajax({
      type: "POST",
      url: "user-endpoints/form-submit.php",
      data: {
        userId: userId,
        storeId: storeId,
        review: review,
        rateValue: rateValue,
      },
      success: function (response) {
        if (response == "200") {
          Swal.fire({
            icon: "success",
            title: "Review Added",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          }).then((result) => {
            window.location.reload();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Something went wrong",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });
        }
      },
    });
  });
});
