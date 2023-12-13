<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Edit Business <i class="fas fa-building"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Business</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title"> <small>Edit Business</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addBusiness" method="post" action="<?= site_url('admin/editDataBusiness') ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $business['id'] ?>">
                                        <label for="exampleInputEmail1">Business Name</label>
                                        <input type="text" name="name" value="<?= $business['business_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Business Name">
                                        <?php if (session()->getFlashdata('err')) : ?>
                                            <div class="text-danger">
                                                <?= session()->getFlashdata('err') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Business Status</label>
                                        <br>
                                        <input type="radio" name="status" value="1" id="" <?php if ($business['status'] == 1) { ?> checked <?php } ?>> Active
                                        <input type="radio" name="status" value="0" id="" <?php if ($business['status'] == 0) { ?> checked <?php } ?>> Inactive
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->