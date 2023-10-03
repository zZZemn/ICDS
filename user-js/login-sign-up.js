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
});
