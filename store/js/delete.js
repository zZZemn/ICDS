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
        photo: photo
      },
      success: function (response) {
        console.log(response);
      },
    });
  });
});
