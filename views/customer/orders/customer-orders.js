$(document).ready(function () {
  $("#data-table").DataTable({
    responsive: true,
  });
});

function view(order_id) {
  var url = "/view-order?order_id="+order_id;

  fetch(url)
    .then(function (response) {
      return response.text();
    })
    .then(function (body) {
      document.getElementById("view").innerHTML = body;
      $("#viewOrder").modal("show");
    });
}
