<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Edit Department <i class="fas fa-building"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Department</li>
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
                        <h6 class="card-title"> <small>Edit Department</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addDepartment" method="post" action="<?= site_url('admin/editDataDepartment') ?>">

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
                                                <option value="<?= $budines['id'] ?>" <?php echo ($budines['id'] == $department['business_id']) ? 'selected' : ''; ?>><?= $budines['business_name'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Client</label>
                                        <select class="form-control" name="client_id" id="c_client_id" onchange="getCompanies()">
                                            <option value="" disabled selected> Select Client</option>
                                            <?php
                                            foreach ($client as $clients) {
                                            ?>
                                                <option value="<?= $clients['id'] ?>" <?php echo ($clients['id'] == $department['client_id']) ? 'selected' : ''; ?>><?= $clients['client_name'] ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Company</label>
                                        <select class="form-control" name="company_id" id="c_company_id">
                                            <option value="" disabled selected> Select Company</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $department['id'] ?>">



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Department Name</label>
                                        <input type="text" name="department_name" class="form-control" id="exampleInputEmail1" value="<?= $department['department_name'] ?>" placeholder="Enter Department Name">
                                        <?php
                                        // Check if there are validation errors
                                        if (session()->has('errors')) {
                                            $validation = session('errors');
                                            if ($validation->getError('department_name')) {
                                        ?>
                                                <div class='text-danger mb-1'>
                                                    <?= $error = $validation->getError('department_name'); ?>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>



                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Department Status</label>
                                        <br>
                                        <input type="radio" name="status" value="1" id="" <?php if ($department['status'] == 1) { ?> checked <?php } ?>> Active
                                        <input type="radio" name="status" value="0" id="" <?php if ($department['status'] == 0) { ?> checked <?php } ?>> Inactive
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

<script src="<?php echo base_url("public/plugins/jquery/jquery.min.js") ?>"></script>
<script>
    getCompanies()


    function getClients() {
        let business_id = $('#c_business_id').val()
        console.log('business_id', business_id);
        $.ajax({
            url: '<?php echo base_url('admin/company/getClient'); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                business_id: business_id
            },
            success: function(data) {
                console.log(data);
                
                var select = $('#c_client_id');
                // Clear existing options
                select.empty();
                let client_id = <?= $department['client_id'] ?>;
                select.append('<option value="" selected >Select Client</option>');

                $.each(data, function(index, item) {
                    var selectedAttribute = (client_id == item.id) ? 'selected' : ''
                    select.append('<option ' + selectedAttribute + ' value="' + item.id + '">' + item.client_name + '</option>');
                });


            }
        });
    }

    function getCompanies() {
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
                console.log(data);
                var select = $('#c_company_id');
                // Clear existing options
                select.empty();
                let company_id = <?= $department['company_id'] ?>;
                console.log('company_id', company_id);

                select.append('<option value="" selected >Select Company</option>');

                $.each(data, function(index, item) {
                    var selectedAttribute = (company_id == item.id) ? 'selected' : ''
                    select.append('<option ' + selectedAttribute + ' value="' + item.id + '">' + item.company_name + '</option>');
                });
            }
        });
    }
</script>