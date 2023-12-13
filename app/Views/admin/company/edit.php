<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Edit Company <i class="fas fa-building"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Company</li>
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
                        <h6 class="card-title"> <small>Edit Company</small></h6>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="addCompany" method="post" action="<?= site_url('admin/editDataCompany') ?>">

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
                                                <option <?php if ($company['business_id'] ==  $budines['id']) { ?> selected <?php } ?> value="<?= $budines['id'] ?>"><?= $budines['business_name'] ?></option>
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
                                        <input type="hidden" name="id" value="<?= $company['id'] ?>">
                                        <label for="exampleInputEmail1">Company Name</label>
                                        <input type="text" name="company_name" value="<?= $company['company_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
                                        <?php if (session()->getFlashdata('err')) : ?>
                                            <div class="text-danger">
                                                <?= session()->getFlashdata('err') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Business Status</label>
                                        <br>
                                        <input type="radio" name="status" value="1" id="" <?php if ($company['status'] == 1) { ?> checked <?php } ?>> Active
                                        <input type="radio" name="status" value="0" id="" <?php if ($company['status'] == 0) { ?> checked <?php } ?>> Inactive
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
    getClients()

    function getClients() {
        let business_id = $('#c_business_id').val()
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
                $.each(data, function(index, item) {
                    let company_id = <?= $company['id'] ?>;
                    var selectedAttribute = (company_id == item.id) ? 'selected' : ''
                    select.append('<option ' + selectedAttribute + ' value="' + item.id + '">' + item.client_name + '</option>');
                });
            }
        });
    }
</script>