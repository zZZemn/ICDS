$(document).ready(function () {
  $("#frmRegister").submit(function (e) {
    e.preventDefault();
    console.log("submitted");
    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "endpoints/register.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response === "Registration Success!") {
          Swal.fire({
            icon: "success",
            title: response,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });
          //   .then((result) => {
          //     window.location.href = "dashboard.php";
          //   });
        } else {
          Swal.fire({
            icon: "error",
            title: response,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });
        }
      },
    });
  });
});
