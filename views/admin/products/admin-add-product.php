<div class="modal fade" id="openAddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='/admin-add-product' method='post' enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="e.g Napa, Tusca etc" required>
                            <label for="product_name">Product Name</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="gen_name" name="gen_name" placeholder="e.g Napa, Tusca etc" required>
                            <label for="gen_name">General Name</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Beximco" required>
                            <label for="company">Company</label>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Product Description" id="product_desc" name="product_desc" style="height: 70px" required></textarea>
                        <label for="product_desc">Product Description</label>
                    </div>

                    <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="price" name="price" placeholder="10 tk" required>
                            <label for="price">Price</label>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="10" required>
                            <label for="stock">Stock</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="product_image" aria-label="file example" required>
                    </div>
                    <div class="col-lg-6 m-auto text-center">
                        <button name="add_product" type="submit" class="submit-btn m-auto btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


