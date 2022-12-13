$(document).ready(function () {
    $("#data-table").DataTable({
      responsive: true,
    });
  });
  
  function update(user_id) {
    elem = document.getElementById(user_id);
    allTD = elem.getElementsByTagName("td");
  
    console.log(allTD[1].innerText);
  
    let fname = allTD[1].innerText;
    let lname = allTD[2].innerText;
    let email = allTD[3].innerText;
    let phone = allTD[4].innerText;
    let house = allTD[5].innerText;
    let city = allTD[6].innerText;
    let street = allTD[7].innerText;
  
    // console.log(product_id, product_name, gen_name, product_desc, price, stock, company, product_image);
  
    document.getElementById("update_customer_id").value = user_id;
    document.getElementById("update_fname").value = fname;
    document.getElementById("update_lname").value = lname;
    document.getElementById("update_email").value = email;
    document.getElementById("update_phone").value = phone;
    document.getElementById("update_house").value = house;
    document.getElementById("update_city").value = city;
    document.getElementById("update_street").value = street;
    
  
    $("#openUpdateCustomer").modal("show");
  }
  