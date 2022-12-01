$(document).ready(function () {
  $("#data-table").DataTable({
    responsive: true,
  });
});

function update(product_id) {
  elem = document.getElementById(product_id);
  allTD = elem.getElementsByTagName("td");

  // console.log(allTD);

  let product_name = allTD[1].innerText;
  let generic_name = allTD[2].innerText;
  let product_desc = allTD[3].innerText;
  let price = allTD[4].innerText;
  let stock = allTD[5].innerText;
  let expiration_date = allTD[6].innerText;
  let company = allTD[7].innerText;
  let product_img = allTD[8].innerHTML;

  // console.log(product_id, product_name, gen_name, product_desc, price, stock, company, product_image);

  document.getElementById("update_product_id").value = product_id;
  document.getElementById("update_product_name").value = product_name;
  document.getElementById("update_gen_name").value = generic_name;
  document.getElementById("update_product_desc").value = product_desc;
  document.getElementById("update_company").value = company;
  document.getElementById("update_price").value = price;
  document.getElementById("update_stock").value = stock;
  document.getElementById("update_expiration_date").value = expiration_date;
  document.getElementById("prev_product_image").innerHTML = product_img;

  $("#openUpdateProduct").modal("show");
}
