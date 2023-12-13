<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Add Company <i class="fas fa-building"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Company</li>
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
                        <h6 class="card-title"> <small>Add Company</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addCompany" method="post" action="<?= site_url('admin/storeCompany') ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Business</label>
                                        <select class="form-control" name="business_id" id="c_business_id" onchange="getClients()">
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
                                        <label for="exampleInputEmail1">Select Client</label>
                                        <select class="form-control" name="client_id" id="c_client_id">
                                            <option value="" disabled selected> Select Client</option>                                            
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
                                        <?php
                                        // Check if there are validation errors
                                        if (session()->has('errors')) {
                                            $validation = session('errors');
                                            if ($validation->getError('company_name')) {
                                        ?>
                                                <div class='text-danger mb-1'>
                                                    <?= $error = $validation->getError('company_name'); ?>
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