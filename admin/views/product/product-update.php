<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="py-3 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <span class="fs-3 fw-bold">Update a Product</span>
            <a href="?act=product-list" class="btn btn-secondary" type="button">
                <i class="bx bx-arrow-back me-1"></i>
                Back to list
            </a>
        </div>

        <form action="" method="post" class="row" enctype="multipart/form-data">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product information</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-name">Name</label>
                            <input type="text" name="productName" class="form-control" id="product-name" value="<?= $show['name'] ?>" placeholder="Product title">
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productName"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productName"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-description">
                                Description
                                <span class="text-muted">(Optional)</span>
                            </label>
                            <textarea rows="6" cols="50" name="productDescription" class="form-control" id="product-description" placeholder="Enter description here"><?= $show['description'] ?></textarea>
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productDescription"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productDescription"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row gap-4 mb-4">
                    <div style="max-width: 300px;">
                        <img src="<?= PATH_UPLOAD . $show['thumbnail'] ?>" id="img-preview" class="w-100 d-block card" alt="">
                    </div>

                    <div class="card w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Media</h5>
                        </div>
    
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="thumbnail">thumbnail</label>
                                <input type="file" name="productThumbnail" class="form-control" id="thumbnail" onchange="previewImage()">
                                <input type="hidden" id="img-current" name="img-current" value="<?= $show['thumbnail'] ?>">
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["productThumbnail"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["productThumbnail"] ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-category">Category</label>
                            <select class="form-select" id="product-category" name="productCategory">
                                <?php foreach ($listCategory as $value) : ?>
                                    <option <?= $value['id'] == $show['id_category'] ? 'selected' : '' ?> value="<?= $value['id'] ?>">
                                        <?= $value['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productCategory"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productCategory"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Inventory</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-instock">Add to stock</label>
                            <input type="number" min="0" name="productInstock" class="form-control" id="product-instock" value="<?= $show['instock'] ?>" placeholder="Quantity">
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productInstock"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productInstock"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-price">Base price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" min="0" name="productPrice" class="form-control" id="product-price" value="<?= $show['price'] ?>" placeholder="Product price">
                            </div>
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productPrice"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productPrice"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-discount">Discount percent</label>
                            <div class="input-group">
                                <input type="number" min="0" max="99" name="productDiscount" class="form-control" id="product-discount" value="<?= $show['discount'] ?>" placeholder="0 to 99">
                                <span class="input-group-text">%</span>
                            </div>
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["productDiscount"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["productDiscount"] ?>
                                </span>
                            <?php endif; ?>
                            <?php unset($_SESSION["errors"]); ?>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button class="btn btn-primary" type="submit" name="btnSave">
                        <i class="bx bx-save me-1"></i>
                        Save
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>

<script>
    var imgPreview = document.getElementById('img-preview');
    var imgCurrent = document.getElementById('img-current');
    var input      = document.getElementById('thumbnail');

    function previewImage() {

        // Check if a file is selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);

            // Update the hidden input value to the new image data
            imgCurrent.value = '';
        } else {
            // If no file is selected, keep the current image
            imgPreview.src = imgCurrent.value;
        }
    }

    function deleteImage() {
        imgCurrent.value = '';
        imgPreview.src   = '';
    }
</script>