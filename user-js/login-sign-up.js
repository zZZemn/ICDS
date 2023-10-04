$(document).ready(function () {
  var passwordShow = false;
  const showPassword = (className, btnId) => {
    if (passwordShow) {
      passwordShow = false;
      $(className).attr("type", "password");
      $(btnId).removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
      passwordShow = true;
      $(className).attr("type", "text");
      $(btnId).removeClass("fa-eye").addClass("fa-eye-slash");
    }
  };

  $("#showPassword").click(function (e) {
    e.preventDefault();
    showPassword(".input-password", "#showPassword i");
  });

  $("#showPassword2").click(function (e) {
    e.preventDefault();
    showPassword(".input-password2", "#showPassword2 i");
  });

  $("#frmSignup").submit(function (e) {
    e.preventDefault();
    var pass1 = $("#password").val();
    var pass2 = $("#repassword").val();

    if (pass1 !== pass2) {
      $("#repassword").addClass("is-invalid");
    } else {
      console.log("Signup Complete");
    }
  });

  $("#frmLogin").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "user-endpoints/form-submit.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response === "200") {
          Swal.fire({
            icon: "success",
            title: "Login success!",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          }).then((result) => {
            window.location.href = "index.php";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Wrong email or password!",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });
        }
      },
    });
  });
});
