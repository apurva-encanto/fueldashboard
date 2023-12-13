<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\ReportModel;
use App\Models\Vehicle;
use App\Models\Business;
use App\Models\Department;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ReportController extends BaseController
{
    public function reportAdd()
    {
        $company=new Company();
        $data['companies']= $company->findAll();
        $data['page'] = 'admin/report/add.php';
        echo "<pre>";

        print_r($data);
        exit;
        return view('index', $data);
    }
    function create_slug($str)
    {
        // Convert the string to lowercase
        $str = strtolower($str);

        // Replace spaces with dashes
        $str = str_replace(' ', '-', $str);
        // Remove special characters
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);

        return $str;
    }

     public function reportDepartmentImport()
     {
        if ($file = $this->request->getFile('file')) {
            $file = $this->request->getFile('file');

            if ($file && $file->isValid() && $file->getExtension() == 'xlsx') {
                $spreadsheet = IOFactory::load($file->getPathname());
                $worksheet = $spreadsheet->getActiveSheet();
                $data = $worksheet->toArray();
                $data = array_slice($data, 2);
                echo "<pre>";

                foreach ($data as $detail) {


                    $vehicle = new Vehicle();

                        $data = [
                            'business_id' => 1,
                            'client_id' => 1,
                            'company_id' => $this->returnClientId($detail[3]),
                            'department_id' => $this->returnDepartmentId($detail[4]),
                            'card_holder_name'  => trim($detail[0]),
                            'vehicle_no'  => trim($detail[1]),
                            'status' => 1
                         
                        ];
                    

                        $vehicle->insert($data);

                   

                
                }
                return redirect()->back();

            }
        }
     }
    public function reportImportDepartment()
    {

        if ($file = $this->request->getFile('file')) {
            $file = $this->request->getFile('file');

            if ($file && $file->isValid() && $file->getExtension() == 'xlsx') {
                $spreadsheet = IOFactory::load($file->getPathname());
                $worksheet = $spreadsheet->getActiveSheet();
                $data = $worksheet->toArray();
                // Skip the first 9 rows
                $data = array_slice($data, 2);
                echo "<pre>";
                
                foreach($data as $detail)
                {
                    // echo $detail[3];
                   print_r($this->returnClientId($detail[3]));
                    $department = new Department();

                   $department_exixts=$department->where(['company_id'=> $this->returnClientId($detail[3]), 'department_name'=> $detail[4]])->first();
                   if(empty($department_exixts))
                   {
                        $data = [
                            'business_id' => 1,
                            'client_id' => 1,
                            'company_id' => $this->returnClientId($detail[3]),
                            'department_id' => 'duid_' . $this->create_slug(
                                trim($detail[4])
                            ),
                            'department_name'  => trim($detail[4]),
                            'status' => 1
                        ];
                        $department->insert($data);

                   }
                    echo '<br>';
                    print_r($detail[4]);

                }
               



                $batchSize = 20; // Adjust the batch size as needed
           
                exit;

                // Process $data as needed (e.g., insert into database)

            } else {
                return redirect()->to('/')->with('error', 'Invalid Excel file. Please upload a valid .xlsx file.');
            }


        }

    }

    public function returnClientId($name)
    {

        $company =new Company();
        $companyid= $company->where('company_name',$name)->first();  
    
            return $companyid['id'];
    
    }

    public function returnDepartmentId($name)
    {

        $department = new Department();
        $departmentid = $department->where('department_name', $name)->first();

        
            return $departmentid['id'];
       
    }

    public function getReportImport()
    {
        $company = new Client();
        $data['companies'] = $company->findAll();


        $data['page'] = 'admin/report/add.php';
  
        return view('index', $data);
    }

    public function reportImportBulkData()
    {

        $request = service('request');
        $postData = $request->getPost();

        $givenDate = $this->request->getVar('report_month');
        // Convert the given date to the first day of the month
        $startDate = date('Y-m-01', strtotime($givenDate));
        // Convert the given date to the last day of the month
        $endDate = date('Y-m-26', strtotime($givenDate));
        $report = new ReportModel();
        // Build the query
        $reportExists = $report->where('report_date >=', $startDate)
        ->where('report_date <=', $endDate)
        ->countAllResults() > 0;
        $session = session();

        if ($reportExists) {
            session()->setFlashdata('err', "Reports exist for the month  ". date('M', strtotime($givenDate)));
            return redirect()->back()->withInput();
        }else{
            if ($file = $this->request->getFile('file')) {
                $file = $this->request->getFile('file');

                if ($file && $file->isValid() && $file->getExtension() == 'xlsx') {
                    $spreadsheet = IOFactory::load($file->getPathname());
                    $worksheet = $spreadsheet->getActiveSheet();
                    $data = $worksheet->toArray();
                    $data = array_slice($data, 9);


                    foreach ($data as $details) {
                        if(count($details) <40)
                        {
                            $session->setFlashdata('err', 'Please Upload a Valid Report');
                            return redirect()->route('admin/report/import');
                        }

                        $data = [
                            'external_id_no' => $details[0],
                            'sold_to' => $details[1],
                            'payer' => $details[2],
                            'p_customer_acc_no' => $details[3],
                            'customer_name' => $details[4],
                            'card_number' => $details[5],
                            'vehicle_no' => $this->returnVehicleId($details[6]),
                            'card_holder_name' => $details[7],
                            'transaction_date' => $this->datetimeChange($details[8]),
                            'transaction_time' => $details[9],
                            'processing_time' => $details[11],
                            'processing_date' => $this->datetimeChange($details[10]),
                            'invoice_number' => $details[12],
                            'invoice_date' => $details[13],
                            've_sst_acc_no' => $details[14],
                            'p_ss_no' => $details[15],
                            'service_st_name' => $details[16],
                            'receipt' => $details[19],
                            'transaction_type' => $details[20],
                            'p_s_no' => $details[21],
                            'p_s_name' => $details[22],
                            'quantity' => $details[23],
                            'terminal_price' => $details[24],
                            'discount_rate' => $details[25],
                            'customer_price' => $details[26],
                            'terminal_t_amt' => $details[27],
                            'discount_amount' => $details[28],
                            'customer_amount' => $details[29],
                            'p_odo_reading' => $details[30],
                            'c_odo_reading' => $details[31],
                            'distance_travel' =>($details[32] == null) ? 0 : $details[32] ,
                            'fuel_capacity' => $details[33],
                            'transaction_litres' => $details[34],
                            'v_max_consumption' => $details[35],
                            'consumption_liters' => ($details[36] == null) ? 0 : $details[36],
                            'cost' => $details[37],
                            'v_tag_no' => $details[38],
                            'v_reg_no_tag' => $details[39],
                            'v_desc_no_tag' => $details[40],
                            'driver_tag_no' => $details[41],
                            'driver_tag_name' => $details[42],
                            'status' => 0,
                            'is_delete' => 0,
                            'company_id' => $this->request->getVar('company_id'),
                            'report_date' => $this->request->getVar('report_month'),
                        ];
                        $report->insert($data);
                    }

                    $session->setFlashdata('success', 'Report Added Successfully');
                    return redirect()->route('admin/report/import');

                }
            }
        }
        

      

    }

    public function returnVehicleId($name)
    {

        $vehicle = new Vehicle();
        $vehicle = $vehicle->where('vehicle_no', $name)->first();
        if($vehicle)
        {
            return $vehicle['id'];


        }else{
            return $name;

        }


    }

    public function returnCardHolderNameId($name)
    {

        $vehicle = new Vehicle();
        $vehicle = $vehicle->where('card_holder_name', $name)->first();

        if ($vehicle) {
            return $vehicle['id'];
        } else {
            return $name;
        }
    }

    public function generateReportData()
    {
        $where=[];

        $request = service('request');
        $postData = $request->getPost();

        $data = [
            'search' => [
                'business_id' => $this->request->getVar('business_id'),
                'client_id' => $this->request->getVar('client_id'),
                'company_id' => $this->request->getVar('company_id'),
                'vehicle_id' =>  $this->request->getVar('vehicle_id')
            ]

        ];

        // Set values in the session
        session()->set($data);

        if(!empty($this->request->getVar('business_id')))
        {
            $where['v1.business_id'] = $this->request->getVar('business_id');
        }

        if (!empty($this->request->getVar('client_id'))) {
            $where['v1.client_id'] = $this->request->getVar('client_id');
        }

        if (!empty($this->request->getVar('company_id'))) {
            $where['v1.company_id'] = $this->request->getVar('company_id');
        }

        if (!empty($this->request->getVar('vehicle_id'))) {
            $where['reports.vehicle_no'] = $this->request->getVar('vehicle_id');
        }

        if (!empty($this->request->getVar('vehicle_id'))) {
            $where['reports.vehicle_no'] = $this->request->getVar('vehicle_id');
        }
        // Assuming you have a model named ReportModel
        $reportModel = new ReportModel();
        $db = \Config\Database::connect();  
        // Build the query using the Query Builder
        $query  = $reportModel->select('reports.*,c1.company_name,v1.vehicle_no as vehicle_name,cl.client_name as client_name,d.department_name,')
            ->join('vehicles v1', 'v1.id = reports.vehicle_no', 'left')
            ->join('companies c1', 'c1.id = v1.company_id', 'left')
            ->join('clients cl', 'cl.id = c1.client_id', 'left')
            ->join('departments d', 'd.id = v1.department_id', 'left')
            ->where('reports.vehicle_no !=',null)
            ->where($where);



        $perPage = 10;
        // Get the total number of records
        // Get the total number of records
        $totalRows = $query->countAllResults(false);
        if($totalRows >0){

        // Add pagination
        $results = $query->paginate($perPage);
        $data['pager'] = $reportModel->pager;
        // $reports= $report->where('vehicle_no', $this->request->getVar('vehicle_id'))->orderBy('transaction_date')->findAll();
        $data['reports']= $results;

            $data['charts'] = $reportModel->select('ROUND(sum(terminal_price),2) as sum_terminal,ROUND(sum(discount_rate),2) as discount_rate_amt,ROUND(sum(customer_price),2) as customer_price_val,sum(distance_travel) as distance,ROUND(sum(consumption_liters),2) as liters')
            ->join('vehicles v1', 'v1.id = reports.vehicle_no', 'left')
            ->join('companies c1', 'c1.id = v1.company_id', 'left')
            ->join('clients cl', 'cl.id = c1.client_id', 'left')
            ->join('departments d', 'd.id = v1.department_id', 'left')
            ->where('reports.vehicle_no !=', null)
            ->where($where)
            ->findAll();
   

        $data['page'] = 'admin/report/generate.php';
        return view('index', $data);
        }else{
             $session = session();
            $session->setFlashdata('err', 'Report Not Found');
            return redirect()->route('admin/search');
        }
    }

    function datetimeChange($date)
    {
        $timestamp = strtotime(str_replace('/', '-', $date));
        $formattedDate = date('Y-m-d', $timestamp);

        return $formattedDate;
    }

    public function exportReport()
    {
        $where = [];

        if (!empty(session('search.business_id'))) {
            $where['vehicles.business_id'] = session('search.business_id');
        }

        if (!empty(session('search.client_id'))) {
            $where['vehicles.client_id'] = session('search.client_id');
        }

        if (!empty(session('search.company_id'))) {
            $where['vehicles.company_id'] = session('search.company_id');
        }

        if (!empty(session('search.vehicle_id'))) {
            $where['vehicles.vehicle_no'] = session('search.vehicle_id');
        }
        $reportModel = new ReportModel();

        $query  = $reportModel->select('reports.*,companies.company_name,vehicles.vehicle_no as vehicle_name,clients.client_name as client_name,departments.department_name,')
        ->join('vehicles', 'vehicles.id = reports.vehicle_no', 'left')
        ->join('companies', 'companies.id = vehicles.company_id', 'left')
        ->join('clients', 'clients.id = companies.client_id', 'left')
        ->join('departments', 'departments.id = vehicles.department_id', 'left')
        ->where('vehicles.vehicle_no !=', null)
            ->where($where)->findAll();


        $fileName = 'Report-'.date('d-m-Y').'.xlsx';
        $spreadsheet = new Spreadsheet();
        $defaultWidth = 15;
        $defaultBackgroundColor = '43078c'; // Blue
        $defaultFontColor = 'FFFFFF'; // White


        $sheet = $spreadsheet->getActiveSheet();
        $columnHeaders = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V'];
        $columnHeadersName = [
            'Receipt #', 'Client Name', 'Company Name', 'Card Number',
            'Card Holder Details', 'Vehicle Registration Number on Card',
            'Transaction Date/Time', 'Service Station Account Number',
            'Service Station Name', 'Transaction Type', 'Product/Service Number',
            'Product/Service Name', 'Quantity', 'Terminal Price', 'Discount Rate',
            'Discount Amount', 'Previous Odometer Reading', 'Current Odometer Reading',
            'Distance Travelled', 'Transaction Litres', 'Consumption Litres/100km', 'Cost/Km'
        ];
        foreach ($columnHeaders as $key=>$column) {
            $cellCoordinate = $column . '1';
            $sheet->setCellValue($cellCoordinate, $columnHeadersName[$key]);
            $style = $sheet->getStyle($cellCoordinate);
            $style->getFont()->setBold(true);
            $sheet->getColumnDimension($column)->setWidth($defaultWidth);

            // Set background color
            $style->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
            $style->getFill()->getStartColor()->setARGB($defaultBackgroundColor);

            // Set font color
            $style->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE));


        }

        $rows = 2;
        foreach ($query as $val) {
            $sheet->setCellValue('A' . $rows, $val['receipt']);
            $sheet->setCellValue('B' . $rows, $val['client_name']);
            $sheet->setCellValue('C' . $rows, $val['company_name']);
            $sheet->setCellValue('D' . $rows, $val['card_number']);
            $sheet->setCellValue('E' . $rows, $val['card_holder_name']);
            $sheet->setCellValue('F' . $rows, $val['vehicle_name'] );
            $sheet->setCellValue('G' . $rows, $val['transaction_date'] . ' ' . $val['transaction_time'] );
            $sheet->setCellValue('H' . $rows, $val['ve_sst_acc_no']);
            $sheet->setCellValue('I' . $rows, $val['service_st_name']);
            $sheet->setCellValue('J' . $rows, $val['transaction_type']);
            $sheet->setCellValue('K' . $rows, $val['p_s_no']);
            $sheet->setCellValue('L' . $rows, $val['p_s_name']);
            $sheet->setCellValue('M' . $rows, $val['quantity']);
            $sheet->setCellValue('N' . $rows, $val['terminal_price']);
            $sheet->setCellValue('O' . $rows, $val['discount_rate']);
            $sheet->setCellValue('P' . $rows, $val['discount_amount']);
            $sheet->setCellValue('Q' . $rows, $val['p_odo_reading']);
            $sheet->setCellValue('R' . $rows, $val['c_odo_reading']);
            $sheet->setCellValue('S' . $rows, $val['distance_travel']);
            $sheet->setCellValue('T' . $rows, $val['transaction_litres']);
            $sheet->setCellValue('U' . $rows, $val['consumption_liters']);
            $sheet->setCellValue('V' . $rows, $val['cost']);
            $rows++;
        }
        // Save the file to a temporary location
        $tempFilePath = "public/csvfile/" . $fileName;
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFilePath);

        // Set headers for file download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        // Read the file and output it to the browser
        readfile($tempFilePath);
        // Delete the temporary file
        unlink($tempFilePath);      

    }

}
?>