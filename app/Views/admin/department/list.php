<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Department List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Department List</li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lists as $key => $list) { ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $list['business_name'] ?></td>
                                        <td><?= $list['client_name'] ?></td>
                                        <td><?= $list['company_name'] ?></td>
                                        <td><?= $list['department_name'] ?></td>
                                        <td>
                                            <?php if ($list['status'] == 1) : ?>
                                                <span class="btn btn-sm btn-success"> Active </span>
                                            <?php endif; ?>

                                            <?php if ($list['status'] == 0) : ?>
                                                <span class="btn btn-sm btn-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class=" btn btn-secondary btn-sm" href="<?= site_url('admin/department/edit/' . $list['id']) ?>"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-default<?= $list['id'] ?>"><i class="fas fa-trash"></i></a>
                                        </td>

                                        <div class="modal fade" id="modal-default<?= $list['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Department</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this Department <strong><?= $list['company_name'] ?></strong></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <a href="<?= site_url('admin/company/delete/' . $list['id']) ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S No.</th>
                                    <th>Business Name</th>
                                    <th>Client Name</th>
                                    <th>Company Name</th>
                                    <th>Department Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
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