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

  $(".change_status").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var table = $(this).data("table");
    var value = $(this).data("value");
    var idName = $(this).data("idname");
    $.ajax({
      type: "POST",
      url: "endpoints/actions.php",
      data: {
        id: id,
        value: value,
        table: table,
        idName: idName,
      },
      success: function (response) {
        response = response.trim();
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
