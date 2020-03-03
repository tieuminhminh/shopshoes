<?php require_once 'view/admin/layout/header.php' ?>
<?php require_once 'view/admin/layout/sidebar.php' ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Create Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="sku" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="enter product name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price"
                                           placeholder="enter product price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <select multiple="" class="form-control" id="color">
                                        <option>White</option>
                                        <option>Black</option>
                                        <option>Blue</option>
                                        <option>Red</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select multiple="" class="form-control" id="category">
                                        <option>Man</option>
                                        <option>Woman</option>
                                        <option>Unisex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" required>
                                            <label class="custom-file-label" for="image">Choose file</label>

                                        </div>

                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>

                                    </div>
                                    <p id="error" style="color:red"></p>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </form>
                    <div class="card-footer">
                        <button onclick="Submit()" class="btn btn-info">Submit</button>
                        <button type="submit" href="#" class="btn btn-default float-right">Cancel</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php require_once 'view/admin/layout/footer.php' ?>