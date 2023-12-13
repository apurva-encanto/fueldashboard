<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url("public/plugins/fontawesome-free/css/all.min.css"); ?>">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/adminlte.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/style.css"); ?>">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo base_url("public/dist/img/AdminLTELogo.png") ?> alt=" AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url("public/dist/img/user2-160x160.jpg") ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php include_once('layouts/sidebar.php') ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include($page); ?>
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <?php include_once('layouts/footer.php'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url("public/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("public/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url("public/dist/js/adminlte.js") ?>"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url("public/plugins/chart.js/Chart.min.js") ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url("public/dist/js/pages/dashboard3.js") ?>"></script>
    <script src="<?php echo base_url("public/js/validation-form.js") ?>"></script>

    <!-- jquery-validation -->
    <script src="<?php echo base_url("public/plugins/jquery-validation/jquery.validate.min.js") ?>"></script>
    <script src="<?php echo base_url("public/plugins/jquery-validation/additional-methods.min.js") ?>"></script>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#exampleSearch").DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging":false,
                "autoWidth": false,
              
            });
        });
    </script>
    <script>
        $(function() {

            $('#addBusiness').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a Business Name",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#addClient').validate({
                rules: {
                    business_id: {
                        required: true,
                    },
                    client_name: {
                        required: true,
                    },
                },
                messages: {
                    business_id: {
                        required: "Please select Business Name",
                    },
                    client_name: {
                        required: "Please enter a Client Name",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#addCompany').validate({
                rules: {
                    business_id: {
                        required: true,
                    },
                    client_id: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                },
                messages: {
                    business_id: {
                        required: "Please select Business Name",
                    },
                    client_id: {
                        required: "Please select Client Name",
                    },
                    company_name: {
                        required: "Please enter a Company Name",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#addDepartment').validate({
                rules: {
                    business_id: {
                        required: true,
                    },
                    client_id: {
                        required: true,
                    },
                    company_id: {
                        required: true,
                    },
                    department_name: {
                        required: true,
                    },
                },
                messages: {
                    business_id: {
                        required: "Please select Business Name",
                    },
                    client_id: {
                        required: "Please select Client Name",
                    },
                    company_id: {
                        required: "Please select Company Name",
                    },
                    department_name: {
                        required: "Please enter a Department Name",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


            $('#addVehicle').validate({
                rules: {
                    business_id: {
                        required: true,
                    },
                    client_id: {
                        required: true,
                    },
                    company_id: {
                        required: true,
                    },
                    department_id: {
                        required: true,
                    },
                    card_holder_name: {
                        required: true,
                    },
                    vehicle_no: {
                        required: true,
                    },
                },
                messages: {
                    business_id: {
                        required: "Please select Business Name",
                    },
                    client_id: {
                        required: "Please select Client Name",
                    },
                    company_id: {
                        required: "Please select Company Name",
                    },
                    department_id: {
                        required: "Please select Department Name",
                    },
                    card_holder_name: {
                        required: "Please enter a Car Holder Name",
                    },
                    vehicle_no: {
                        required: "Please enter a Vehicle Number",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $('#generateReport').validate({
                rules: {
                    business_id: {
                        required: true,
                    },

                },
                messages: {
                    business_id: {
                        required: "Please select Business Name",
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


        });

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
                    select.append('<option value="" selected >Select Client</option>');

                    $.each(data, function(index, item) {
                        select.append('<option value="' + item.id + '">' + item.client_name + '</option>');
                    });
                }
            });
        }

        function getCompanies() {
            var client_id = $('#c_client_id').val()
            console.log(client_id);
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
                    select.append('<option value="" selected >Select Company</option>');
                    $.each(data, function(index, item) {
                        select.append('<option value="' + item.id + '">' + item.company_name + '</option>');
                    });
                }
            });
        }

        function getDepartment() {

            var company_id = $('#c_company_id').val()
            console.log("client_id", company_id);
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
                    select.append('<option value="" selected >Select Department</option>');

                    $.each(data, function(index, item) {
                        select.append('<option  value="' + item.id + '">' + item.department_name + '</option>');
                    });
                }
            });
        }
    </script>
</body>

</html>