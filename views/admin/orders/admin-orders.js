$(document).ready(function () {
  $("#data-table").DataTable({
    responsive: true,
  });
});

function view(order_id) {
  var url = "/admin-view-order?order_id=" + order_id;

  console.log(order_id);

  fetch(url)
    .then(function (response) {
      return response.text();
    })
    .then(function (body) {
      document.getElementById("view").innerHTML = body;
      $("#viewOrder").modal("show");
    });
}
