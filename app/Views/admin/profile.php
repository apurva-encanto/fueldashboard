<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Change Profile <i class="fas fa-key"></i> </h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Change Profile</li>
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

                <div class="" id="loader">
                </div>
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title"> <small>Change Password</small></h6>
                    </div>
                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger m-2">
                            <?= session()->getFlashdata('err') ?>

                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success m-2">
                            <?= session()->getFlashdata('success') ?>
                            <script>
                                $(window).load(function() {
                                    $('.loader').fadeOut();
                                });
                            </script>

                        </div>
                    <?php endif; ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="" method="post" enctype="multipart/form-data" action="<?= site_url('admin/profile_update') ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admin Name</label>
                                        <input type="text" class="form-control" required name="name" id="" value="<?= $user['name']; ?>" placeholder="Enter Admin Name" aria-describedby="fileHelpId">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admin Email</label>
                                        <input type="email" class="form-control" required name="email" id="" value="<?= $user['email']; ?>" placeholder="Enter Admin Email" aria-describedby="fileHelpId">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admin Password</label>
                                        <input type="password" class="form-control" name="password" id="" placeholder="Enter Admin Password" aria-describedby="fileHelpId">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admin Phone</label>
                                        <input type="text" class="form-control" required name="phone" value="<?= $user['phone']; ?>" id="" placeholder="Enter Admin Phone" aria-describedby="fileHelpId">
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admin Profile</label>
                                        <input type="file" class="form-control-file" name="file" id="" placeholder="" aria-describedby="fileHelpId">
                                        <!-- <small id="fileHelpId" class="form-text text-muted">Help text</small> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="<?= $user['profile_img']; ?>" width="150" height="150" alt="">
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