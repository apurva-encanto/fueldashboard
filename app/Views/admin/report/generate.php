 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>Invoice</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Invoice</li>
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
                 <!-- <div class="callout callout-info">
                     <h5><i class="fas fa-info"></i> Note:</h5>
                     This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                 </div> -->


                 <!-- Main content -->
                 <div class="invoice p-3 mb-3">
                     <!-- title row -->
                     <div class="row mb-3">
                         <div class="col-12">
                             <h4>
                                 <i class="fas fa-building"></i> LOGIDIS LTD
                                 <small class="float-right">Date:<?= date('d/m/Y') ?></small>
                             </h4>
                         </div>
                         <!-- /.col -->
                     </div>
                     <!-- info row -->
                     <div class="row invoice-info mb-2">
                         <div class="col-sm-4 invoice-col">

                             <strong>Total Amount</strong><span class="mx-3"> Rs. <?= $charts[0]['sum_terminal']; ?></span> <br>
                             <strong>Discount Amount</strong> <span class="mx-3">Rs. <?= $charts[0]['discount_rate_amt']; ?></span> <br>
                             <strong>Customer Amount </strong> <span class="mx-3">Rs. <?= $charts[0]['customer_price_val']; ?></span>

                         </div>
                         <!-- /.col -->
                         <div class="col-sm-4 invoice-col">
                             <strong>Total Distance Travel</strong><span class="mx-3"> <?= $charts[0]['distance']; ?></span> km<br>
                             <strong>Total Consumption Liters</strong> <span class="mx-3"><?= $charts[0]['liters']; ?></span> lts. <br>


                         </div>
                         <!-- /.col -->
                         <div class="col-sm-4 invoice-col">
                             <b>Invoice #007612</b><br>
                             <b>Order ID:</b> 4F3S8J<br>
                             <b>Payment Due:</b> 2/22/2014<br>
                             <b>Account:</b> 968-34567
                         </div>
                         <!-- /.col -->
                     </div>
                     <!-- /.row -->

                     <div class="row">
                         <div class="col-lg-6">
                             <div class="card">
                                 <div class="card-header border-0">
                                     <div class="d-flex justify-content-between">
                                         <h3 class="card-title">Fuel Consumption</h3>
                                     </div>
                                 </div>
                                 <div class="card-body">

                                     <!-- /.d-flex -->

                                     <div class="position-relative mb-4">
                                         <canvas id="myChart" height="145"></canvas>
                                     </div>


                                 </div>
                             </div>
                             <!-- /.card -->


                             <!-- /.card -->
                         </div>
                         <!-- /.col-md-6 -->
                         <div class="col-lg-6">
                             <div class="card">
                                 <div class="card-header border-0">
                                     <div class="d-flex justify-content-between">
                                         <h3 class="card-title">Spend Analytics</h3>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <canvas id="doughnutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                                 </div>
                             </div>
                             <!-- /.card -->


                         </div>
                         <!-- /.col-md-6 -->
                     </div>

                     <!-- Table row -->
                     <div class="row">
                         <div class="col-12 table-responsive ">
                             <a href="<?= base_url('admin/report/download') ?>" class="btn btn-secondary mb-2">Export Report</a>
                             <table id="exampleSearch" class="table table-bordered invoice-table">
                                 <thead>
                                     <tr>
                                         <th>Receipt #</th>
                                         <th>Client Name</th>
                                         <th>Company Name</th>
                                         <th>Card Number</th>
                                         <th>Card Holder Details</th>
                                         <th>Vehicle Registration Number on Card</th>
                                         <th>Transaction Date/Time</th>
                                         <th>Service Station Account Number</th>
                                         <th>Service Station Name</th>
                                         <th>Transaction Type</th>
                                         <th>Product/Service Number</th>
                                         <th>Product/Service Name</th>
                                         <th>Quantity</th>
                                         <th>Terminal Price</th>
                                         <th>Discount Rate</th>
                                         <th>Discount Amount</th>
                                         <th>Previous Odometer Reading</th>
                                         <th>Current Odometer Reading</th>
                                         <th>Distance Travelled</th>
                                         <th>Transaction Litres</th>
                                         <th>Consumption Litres/100km</th>
                                         <th>Cost/Km</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $terminalPrice = 0;
                                        foreach ($reports as $report) {
                                        ?>
                                         <tr>
                                             <?php $terminalPrice = $terminalPrice + $report['terminal_price']; ?>
                                             <td><?= $report['receipt']; ?></td>
                                             <td><?= $report['client_name']; ?></td>
                                             <td><?= $report['company_name']; ?></td>
                                             <td><?= $report['card_number']; ?></td>
                                             <td><?= $report['card_holder_name']; ?></td>
                                             <td><?= $report['vehicle_name']; ?></td>
                                             <td><?= $report['transaction_date'] . ' ' . $report['transaction_time']; ?></td>
                                             <td><?= $report['ve_sst_acc_no']; ?></td>
                                             <td><?= $report['service_st_name']; ?></td>
                                             <td><?= $report['transaction_type']; ?></td>
                                             <td><?= $report['p_s_no']; ?></td>
                                             <td><?= $report['p_s_name']; ?></td>
                                             <td><?= $report['quantity']; ?></td>
                                             <td><?= $report['terminal_price']; ?></td>
                                             <td><?= $report['discount_rate']; ?></td>
                                             <td><?= $report['discount_amount']; ?></td>
                                             <td><?= $report['p_odo_reading']; ?></td>
                                             <td><?= $report['c_odo_reading']; ?></td>
                                             <td><?= $report['distance_travel']; ?></td>
                                             <td><?= $report['transaction_litres']; ?></td>
                                             <td><?= $report['consumption_liters']; ?></td>
                                             <td><?= $report['cost']; ?></td>


                                         </tr>
                                     <?php
                                        } ?>

                                 </tbody>
                             </table>
                         </div>
                         <div class="justify-content-center">
                             <div>
                                 <?= $pager->links(); ?>
                             </div>
                         </div>
                         <!-- /.col -->
                     </div>
                     <!-- /.row -->


                     <!-- /.row -->

                     <!-- this row will not appear when printing -->

                 </div>
                 <!-- /.invoice -->
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->

 <script src="<?php echo base_url("public/plugins/jquery/jquery.min.js") ?>"></script>

 <script src="<?php echo base_url("public/plugins/chart.js/Chart.min.js") ?>"></script>
 <script>
     const xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
     const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];
     const sum_amt = <?= $charts[0]['sum_terminal']; ?>;
     const discount_amt = <?= $charts[0]['discount_rate_amt']; ?>;
     const customer_pay_amt = <?= $charts[0]['customer_price_val']; ?>;
     const total_distance_covered = <?= $charts[0]['distance']; ?>;
     const total_liters_petrol_used = <?= $charts[0]['liters']; ?>;

     new Chart("myChart", {
         type: "line",
         data: {
             labels: xValues,
             datasets: [{
                 fill: false,
                 lineTension: 0,
                 backgroundColor: "rgba(0,0,255,1.0)",
                 borderColor: "rgba(0,0,255,0.1)",
                 data: yValues
             }]
         },
         options: {
             legend: {
                 display: false
             },
             scales: {
                 yAxes: [{
                     ticks: {
                         min: 6,
                         max: 16
                     }
                 }],
             }
         }
     });
     var doughnutData = {
         labels: ['Asked Amount', 'Discount Amount', 'Customer Pay Amount', 'Total Distance Covered', 'Total Liters Petrol Used'],
         datasets: [{
             data: [sum_amt, discount_amt, customer_pay_amt, total_distance_covered, total_liters_petrol_used],
             backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#3498db', '#95a5a6'],
         }]
     };

     // Get context with jQuery - using jQuery's .get() method.
     var doughnutChartCanvas = $('#doughnutChart').get(0).getContext('2d');
     var doughnutOptions = {
         maintainAspectRatio: false,
         responsive: true,
         cutoutPercentage: 50, // Adjust the hole size as needed
     };

     // Create doughnut chart
     new Chart(doughnutChartCanvas, {
         type: 'doughnut',
         data: doughnutData,
         options: doughnutOptions
     });
 </script>