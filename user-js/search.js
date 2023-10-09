$(document).ready(function () {
  $("#search").on('input', function (e) {
    var value = $(this).val();
    var category = $("#selectedCategory").val();

    $.ajax({
      type: "GET",
      url: "user-endpoints/search.php",
      data: {
        value: value,
        category: category,
      },
      success: function (response) {
        $("#search-content-container").html(response);
      },
    });
  });
});
