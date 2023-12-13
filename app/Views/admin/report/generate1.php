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
                     
                  
                     <!-- /.row -->

                     <div class="row">
                         <div class="col-lg-6">
                             <div class="card">
                                 <div class="card-header border-0">
                                     <div class="d-flex justify-content-between">
                                         <h3 class="card-title">Fuel Consumption</h3>
                                         <a href="javascript:void(0);">View Report</a>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <div class="d-flex">
                                         <p class="d-flex flex-column">
                                             <span class="text-bold text-lg">820</span>
                                             <span>Visitors Over Time</span>
                                         </p>
                                         <p class="ml-auto d-flex flex-column text-right">
                                             <span class="text-success">
                                                 <i class="fas fa-arrow-up"></i> 12.5%
                                             </span>
                                             <span class="text-muted">Since last week</span>
                                         </p>
                                     </div>
                                     <!-- /.d-flex -->

                                     <div class="position-relative mb-4">
                                         <canvas id="visitors-chart" height="200"></canvas>
                                     </div>

                                     <div class="d-flex flex-row justify-content-end">
                                         <span class="mr-2">
                                             <i class="fas fa-square text-primary"></i> This Week
                                         </span>

                                         <span>
                                             <i class="fas fa-square text-gray"></i> Last Week
                                         </span>
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
                                         <a href="javascript:void(0);">View Report</a>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <div class="d-flex">
                                         <p class="d-flex flex-column">
                                             <span class="text-bold text-lg">$18,230.00</span>
                                             <span>Sales Over Time</span>
                                         </p>
                                         <p class="ml-auto d-flex flex-column text-right">
                                             <span class="text-success">
                                                 <i class="fas fa-arrow-up"></i> 33.1%
                                             </span>
                                             <span class="text-muted">Since last month</span>
                                         </p>
                                     </div>
                                     <!-- /.d-flex -->

                                     <div class="position-relative mb-4">
                                         <canvas id="sales-chart" height="200"></canvas>
                                     </div>

                                     <div class="d-flex flex-row justify-content-end">
                                         <span class="mr-2">
                                             <i class="fas fa-square text-primary"></i> This year
                                         </span>

                                         <span>
                                             <i class="fas fa-square text-gray"></i> Last year
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.card -->


                         </div>
                         <!-- /.col-md-6 -->
                     </div>


                     <!-- Table row -->
                     <div class="row">
                         <div class="col-12 table-responsive ">
                             <table class="table table-bordered invoice-table">
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
                                        foreach ($reports as $report) {
                                        ?>
                                         <tr>
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