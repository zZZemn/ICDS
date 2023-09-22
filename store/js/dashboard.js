$(document).ready(function () {
  const successAlert = (title) => {
    Swal.fire({
      icon: "success",
      title: title,
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    }).then((result) => {
      window.location.href = "dashboard.php";
    });
  };

  const dangerAlert = (title) => {
    Swal.fire({
      icon: "error",
      title: title,
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    });
  };

  const closeFrm = (id) => {
    $(id).css("display", "none");
    $(id)[0].reset();
  };

  //   form open
  $("#btnNewLink").click(function (e) {
    e.preventDefault();
    $("#frmNewLink").css("display", "block");

    // close other form here
    closeFrm("#frmPhoto");
  });

  $("#btnNewPhoto").click(function (e) {
    e.preventDefault();
    $("#frmPhoto").css("display", "block");

    // close other frm
    closeFrm("#frmNewLink");
  });

  //   click close
  $("#cancelFrmNewLink").click(function (e) {
    e.preventDefault();
    closeFrm("#frmNewLink");
  });

  $("#cancelFrmPhoto").click(function (e) {
    e.preventDefault();
    closeFrm("#frmPhoto");
  });

  //   submit
  $("#frmNewLink").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "endpoints/submit.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response === "Link Added") {
          successAlert(response);
        } else {
          dangerAlert(response);
        }
      },
    });
  });

  $("#frmPhoto").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      type: "POST",
      url: "endpoints/submit.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        if (response === "Photo Added") {
          successAlert(response);
        } else {
          dangerAlert(response);
        }
      },
    });
  });
});
