<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Search List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Search List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search List</h3>
                    </div>


                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="get" id="generateReport" action="<?= site_url('admin/report/generate') ?>">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Business</label>
                                        <select class="form-control" name="business_id" id="c_business_id" onchange="searchClients()">
                                            <option value="">Select Business</option>
                                            <?php
                                            foreach ($business as $budines) {
                                            ?>
                                                <option value="<?= $budines['id'] ?>"><?= $budines['business_name'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Clients</label>
                                        <select class="form-control" name="client_id" id="c_client_id" onchange="searchCompanies()">
                                            <option value="" selected>Select Clients</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for="">Company</label>
                                        <select class="form-control" name="company_id" id="c_company_id" onchange="searchDepartment()">
                                            <option value="" selected>Select Company</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <select class="form-control" name="department_id" id="c_department_id" onchange="searchVehicle()">
                                            <option value="" selected>Select Department</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for="">Vechiles</label>
                                        <select class="form-control" name="vehicle_id" id="c_vehicle_id">
                                            <option value="" selected>Select Vehicles</option>
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for="">Report Month</label>
                                        <select class="form-control" name="month" id="c_month">
                                            <option value="" selected>Select Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <br>
                                        <button type="submit" class="btn btn-info mt-1" style="width: 100%;">Generate Report</button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 table-data vehicle_table d-none">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle List</h3>
                    </div>


                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.card-header -->


                    <div class="card-body">


                        <table id="myDataTable3" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Name</th>
                                    <th>Card Holder Name</th>
                                    <th>Vehicle Number</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Name</th>
                                    <th>Card Holder Name</th>
                                    <th>Vehicle Number</th>
                                </tr>
                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-12 table-data department_table d-none">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Department List</h3>
                    </div>


                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.card-header -->


                    <div class="card-body">


                        <table id="myDataTable2" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Id</th>
                                    <th>Department Name</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Id</th>
                                    <th>Department Name</th>
                                </tr>
                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-12 table-data company_table d-none">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Company List</h3>
                    </div>


                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.card-header -->


                    <div class="card-body">


                        <table id="myDataTable1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Id</th>
                                    <th>Company Name</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Id</th>
                                    <th>Company Name</th>
                                </tr>
                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-12 table-data client_table  d-none">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Client List</h3>
                    </div>


                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.card-header -->


                    <div class="card-body">


                        <table id="myDataTable" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Id</th>
                                    <th>Client Name</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Id</th>
                                    <th>Client Name</th>
                                </tr>
                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script src="<?php echo base_url("public/plugins/jquery/jquery.min.js") ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url("public/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/jszip/jszip.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/pdfmake/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/pdfmake/vfs_fonts.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("public/plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>

<script>
    function searchClients() {

        // Assuming you have previously initialized DataTable with id 'myDataTable1'
        var existingDataTable = $('#myDataTable').DataTable();

        // Destroy the DataTable instance if it already exists
        if ($.fn.DataTable.isDataTable('#myDataTable')) {
            existingDataTable.destroy();
        }

        let business_id = $('#c_business_id').val()
        $.ajax({
            url: '<?php echo base_url('admin/company/getClient'); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                business_id: business_id
            },
            success: function(data) {
                populateDataTable(data)
                var select = $('#c_client_id');
                // Clear existing options
                select.empty();

                select.append('<option value="" selected >Select Client</option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.client_name + '</option>');
                });


            }
        });
    }



    function searchCompanies() {

        // Assuming you have previously initialized DataTable with id 'myDataTable1'
        var existingDataTable = $('#myDataTable1').DataTable();

        // Destroy the DataTable instance if it already exists
        if ($.fn.DataTable.isDataTable('#myDataTable1')) {
            existingDataTable.destroy();
        }

        var client_id = $('#c_client_id').val()
        console.log("client_id", client_id);
        $.ajax({
            url: '<?php echo base_url('admin/company/getCompanies'); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                client_id: client_id
            },
            success: function(data) {
                console.log('company', data);
                var select = $('#c_company_id');
                // Clear existing options
                select.empty();
                populateCompanyDataTable(data)

                select.append('<option value="" selected >Select Company</option>');

                $.each(data, function(index, item) {
                    select.append('<option  value="' + item.id + '">' + item.company_name + '</option>');
                });
            }
        });
    }


    function populateDataTable(data) {
        console.log(data);
        $('.table-data').addClass('d-none')
        $('.client_table').removeClass('d-none')

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#myDataTable')) {
            $('#myDataTable').DataTable().destroy();
        }

        // Initialize DataTable
        var dataTable = $('#myDataTable').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            data: data,
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'business_name',
                    title: 'Business Name'
                },
                {
                    data: 'client_id',
                    title: 'Client Id'
                },
                {
                    data: 'client_name',
                    title: 'Client Name'
                }
                // Add more columns as needed
            ]
        });

        // Move the DataTable buttons container to a specified location
        dataTable.buttons().container().appendTo('#myDataTable_wrapper .col-md-6:eq(0)');

    }


    function populateCompanyDataTable(data) {
        $('.table-data').addClass('d-none')
        $('.company_table').removeClass('d-none')

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#myDataTable1')) {
            $('#myDataTable1').DataTable().destroy();
        }

        var dataTable = $('#myDataTable1').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            data: data,
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'business_name',
                    title: 'Business Name'
                },
                {
                    data: 'client_name',
                    title: 'Client Name'
                },
                {
                    data: 'company_id',
                    title: 'Company Name'
                },
                {
                    data: 'company_name',
                    title: 'Company Name'
                }
                // Add more columns as needed
            ]
        });

        // Move the DataTable buttons container to a specified location
        dataTable.buttons().container().appendTo('#myDataTable1_wrapper .col-md-6:eq(0)');
    }

    function populateDepartmentDataTable(data) {
        $('.table-data').addClass('d-none')
        $('.department_table').removeClass('d-none')

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#myDataTable2')) {
            $('#myDataTable2').DataTable().destroy();
        }

        var dataTable = $('#myDataTable2').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            data: data,
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'business_name',
                    title: 'Business Name'
                },
                {
                    data: 'client_name',
                    title: 'Client Name'
                },
                {
                    data: 'company_name',
                    title: 'Company Name'
                },
                {
                    data: 'department_id',
                    title: 'Department Id'
                },
                {
                    data: 'department_name',
                    title: 'Department Name'
                }

                // Add more columns as needed
            ]
        });

        // Move the DataTable buttons container to a specified location
        dataTable.buttons().container().appendTo('#myDataTable2_wrapper .col-md-6:eq(0)');


    }


    function searchDepartment() {

        // Assuming you have previously initialized DataTable with id 'myDataTable1'
        var existingDataTable = $('#myDataTable2').DataTable();

        // Destroy the DataTable instance if it already exists
        if ($.fn.DataTable.isDataTable('#myDataTable2')) {
            existingDataTable.destroy();
        }

        var company_id = $('#c_company_id').val()
        console.log("company_id", company_id);
        $.ajax({
            url: '<?php echo base_url('admin/company/getDepartments'); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                company_id: company_id
            },
            success: function(data) {
                console.log('company', data);
                var select = $('#c_department_id');
                // Clear existing options
                select.empty();
                populateDepartmentDataTable(data)

                select.append('<option value="" selected >Select Department</option>');

                $.each(data, function(index, item) {
                    select.append('<option  value="' + item.id + '">' + item.department_name + '</option>');
                });
            }
        });
    }

    function searchVehicle() {
        // Assuming you have previously initialized DataTable with id 'myDataTable1'
        var existingDataTable = $('#myDataTable3').DataTable();

        // Destroy the DataTable instance if it already exists
        if ($.fn.DataTable.isDataTable('#myDataTable3')) {
            existingDataTable.destroy();
        }

        var department_id = $('#c_department_id').val()
        console.log("department_id", department_id);

        $.ajax({
            url: '<?php echo base_url('admin/company/getVehicles'); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                department_id: department_id
            },
            success: function(data) {
                console.log('company', data);
                var select = $('#c_vehicle_id');
                // Clear existing options
                select.empty();
                populateVehicleDataTable(data)

                select.append('<option value="" selected >Select Vehicles</option>');

                $.each(data, function(index, item) {
                    select.append('<option  value="' + item.id + '">' + item.vehicle_no + '</option>');
                });
            }
        });


    }


    function populateVehicleDataTable(data) {

        $('.table-data').addClass('d-none')
        $('.vehicle_table').removeClass('d-none')

        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#myDataTable3')) {
            $('#myDataTable3').DataTable().destroy();
        }

        var dataTable = $('#myDataTable3').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            data: data,
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'business_name',
                    title: 'Business Name'
                },
                {
                    data: 'client_name',
                    title: 'Client Name'
                },
                {
                    data: 'company_name',
                    title: 'Company Name'
                },

                {
                    data: 'department_name',
                    title: 'Department Name'
                },
                {
                    data: 'card_holder_name',
                    title: 'Card Holder Name'
                },
                {
                    data: 'vehicle_no',
                    title: 'Vehicle Number'
                }

                // Add more columns as needed
            ]
        });

        // Move the DataTable buttons container to a specified location
        dataTable.buttons().container().appendTo('#myDataTable2_wrapper .col-md-6:eq(0)');


    }
</script>