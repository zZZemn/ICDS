$(document).ready(function () {
  const swalFire = (icon, title) => {
    Swal.fire({
      icon: icon,
      title: title,
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    }).then((result) => {
      location.reload();
    });
  };

  $(".modal-all").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "endpoints/form-submit.php",
      data: formData,
      success: function (response) {
        if (response === "200") {
          swalFire("success", "Action completed successfully.");
        } else {
          swalFire("error", "Something went wrong.");
        }
      },
      error: function () {
        swalFire("error", "Something went wrong.");
      },
    });
  });
});
