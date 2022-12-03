<!-- Modal -->
<div class="modal fade modal-lg" id="CartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title header text-center mt-4">Cart Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row py-4 cart-row ps-4 pe-4">
                    <?php
                    $total = 0;

                    $output = "";
                    $output .= '
                <table class="table table-bordered" id="cart-table">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th> 
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Price Details</th>
                        <th>Action</th>
                    </tr>    
                ';

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $output .= "
                        <tr>
                            <td>" . $value['id'] . "</td>
                            <td style='text-transform: capitalize;'>" . $value['name'] . "</td>
                            <td>" . $value['price'] . "</td>
                            <td>" . $value['quantity'] . "</td>
                            <td>" . number_format($value['price'] * $value['quantity'], 2) . " tk</td>
                            <td>
                                <a href='/?action=remove&id=" . $value['id'] . "'>
                                    <button type='submit' name='remove' class='btn m-auto btn-block btn-danger'>remove</button>
                                </a>
                            </td>
                        </tr>
                        ";
                            $total = $total + $value['quantity'] * $value['price'];
                        }
                        $output .= "
                    <tr>
                        <td colspan='3'></td>
                        <td><b>Total Price</b></td>
                        <td><b>" . number_format($total, 2) . " tk </b></td>
                        <td>
                            <a href='/?action=clearall' style='text-decoration:none;'>
                                <button type='submit' name='clearall' class='btn m-auto btn-block btn-warning'>clear all</button>
                            </a> 
                            <a href='#' style='text-decoration:none;'>
                                <button type='submit' name='check-out' class='btn m-auto btn-block btn-success' style='background-color:#059377;'>check out</button>
                            </a> 
                        </td>
                    </tr>
                    </table> 
                    ";
                    } else {
                        $output .= "
                    <tr>
                        <td colspan='6' class='text-center' style='color: red;'>No item in cart.</td>
                    </tr>
                    ";
                    }
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>