<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Add Vehicle <i class="fas fa-car"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Vehicle</li>
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
                        <h6 class="card-title"> <small>Add Vehicle</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addVehicle" method="post" action="<?= site_url('admin/storeVehicle') ?>">

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
                                        <label for="exampleInputEmail1">Select Company</label>
                                        <select class="form-control" name="company_id" id="c_company_id" onchange="getDepartment()">
                                            <option value="" disabled selected> Select Company</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Card Holder Name</label>
                                        <input type="text" name="card_holder_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Card Holder Name">
                                        <?php
                                        // Check if there are validation errors
                                        if (session()->has('errors')) {
                                            $validation = session('errors');
                                            if ($validation->getError('card_holder_name')) {
                                        ?>
                                                <div class='text-danger mb-1'>
                                                    <?= $error = $validation->getError('card_holder_name'); ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Client</label>
                                        <select class="form-control" name="client_id" id="c_client_id" onchange="getCompanies()">
                                            <option value="" disabled selected> Select Client</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Department</label>
                                        <select class="form-control" name="department_id" id="c_department_id">
                                            <option value="" disabled selected> Select Department</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vehicle Number</label>
                                        <input type="text" name="vehicle_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Number">
                                        <?php
                                        // Check if there are validation errors
                                        if (session()->has('errors')) {
                                            $validation = session('errors');
                                            if ($validation->getError('vehicle_no')) {
                                        ?>
                                                <div class='text-danger mb-1'>
                                                    <?= $error = $validation->getError('vehicle_no'); ?>
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