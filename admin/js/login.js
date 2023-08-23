$(document).ready(function () {
  $("#login-form").submit(function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "endpoints/login.php",
      data: {
        username: username,
        password: password,
      },
      success: function (response) {
        console.log(response);
        if (response === "Login success") {
            window.location.href = 'dashboard.php';
        } else {
          $(".alert-inc-pass").css("opacity", "1");
          setTimeout(function () {
            $(".alert-inc-pass").css("opacity", "0");
          }, 2000);
        }
      },
    });
  });
});
