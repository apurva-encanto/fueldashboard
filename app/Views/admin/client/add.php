<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Add Client <i class="fas fa-building"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Client</li>
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
                        <h6 class="card-title"> <small>Add Client</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addClient" method="post" action="<?= site_url('admin/storeClient') ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Business</label>
                                        <select class="form-control" name="business_id" id="">
                                            <option value="" disabled selected> Select Business</option>
                                            <?php
                                            foreach ($business as $budines) {
                                            ?>
                                                <option value="<?= $budines['id'] ?>"><?= $budines['business_name'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Client Name</label>
                                        <input type="text" name="client_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Client Name">
                                        <?php
                                        // Check if there are validation errors
                                        if (session()->has('errors')) {
                                            $validation = session('errors');
                                            if ($validation->getError('client_name')) {
                                        ?>
                                                <div class='text-danger mb-1'>
                                                    <?= $error = $validation->getError('client_name'); ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>
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