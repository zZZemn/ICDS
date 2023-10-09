$(document).ready(function () {
  $(".btnDeleteStore").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var wtd = $(this).data("wtd");
    var photo = $(this).data("photo");

    console.log(id);
    console.log(wtd);
    console.log(photo);

    $.ajax({
      type: "POST",
      url: "endpoints/delete.php",
      data: {
        wtd: wtd,
        id: id,
        photo: photo,
      },
      success: function (response) {
        console.log(response);
        if (response == "200") {
          Swal.fire({
            icon: "success",
            title: "Deleted",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          }).then((result) => {
            window.location.href = "dashboard.php";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Somethin went wrong",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });
        }
      },
    });
  });
});
