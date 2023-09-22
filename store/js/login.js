$(document).ready(function () {
  $("#login-form").submit(function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "../global-assets/endpoints/login.php",
      data: {
        userType: 'store',
        username: username,
        password: password,
      },
      success: function (response) {
        if (response === "Login success") {
          Swal.fire({
            icon: "success",
            title: response,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          }).then((result) => {
            window.location.href = "dashboard.php";
          });
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
