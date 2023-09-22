$(document).ready(function () {
  $("#frmRegister").submit(function (e) {
    e.preventDefault();
    console.log("submitted");
    var formData = new FormData($(this)[0]);

    $.ajax({
      type: "POST",
      url: "endpoints/register.php",
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting the content type
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
