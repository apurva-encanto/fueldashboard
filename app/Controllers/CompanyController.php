<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Vehicle;
use App\Models\Business;
use App\Models\Department;
use App\Controllers\BaseController;

class CompanyController extends BaseController
{
    public function __construct()
    {
    }


    public function addCompany(): string
    {
        $business = new Business();
        $data['business'] = $business->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/company/add.php';
        return view('index', $data);
    }

    public function getClient()
    {
        $request = service('request');
        $client = new Client();
        $businessId = $this->request->getVar('business_id');
        // Use alias for table names to improve readability
        $data['client'] = $client
        ->select('clients.*, business.business_name as business_name')
        ->join('business', 'business.id = clients.business_id', 'left')
        ->where([
            'clients.business_id' => $businessId,
            'clients.status' => 1,
            'clients.is_delete' => 0
        ])
            ->findAll();
        return json_encode($data['client']);
    }
    public function getCompanies()
    {
        $request = service('request');
        $company = new Company();

        $data['company'] =
        $company
        ->select('companies.*, business.business_name, clients.client_name as client_name') // Adjust fields as needed
        ->join('business', 'business.id = companies.business_id', 'left') // Left join condition
        ->join('clients', 'clients.id = companies.client_id', 'left') // Left join condition
        ->where('companies.is_delete', 0)
        ->where('business.is_delete', 0)
        ->where('clients.is_delete', 0)
        ->where('companies.client_id', $this->request->getVar('client_id'))
        ->findAll();
        return json_encode($data['company']);
    }
    public function getDepartments()
    {
        $request = service('request');
        $department = new Department();

        $data['department'] = $department
        ->select('departments.*, companies.company_name as company_name, business.business_name, clients.client_name as client_name')
        ->join('companies', 'companies.id = departments.company_id', 'left') // Updated join condition
        ->join('business', 'business.id = companies.business_id', 'left')
        ->join('clients', 'clients.id = companies.client_id', 'left')
        ->where('companies.is_delete', 0)
        ->where('business.is_delete', 0)
        ->where('clients.is_delete', 0)
        ->where('departments.company_id', $this->request->getVar('company_id'))
        ->findAll();

        // Remove the $ sign from the key in the $data array
        return json_encode($data['department']);

    }

    public function getVehicles()
    {
        $request = service('request');

        $vehicle = new Vehicle();
        $data['vehicle'] = $vehicle
            ->select('vehicles.*,departments.department_name, business.business_name,clients.client_name,companies.company_name') // Adjust fields as needed
            ->join('business', 'business.id = vehicles.business_id', 'left') // Left join condition
            ->join('clients', 'clients.id = vehicles.client_id', 'left') // Left join condition
            ->join('companies', 'companies.id = vehicles.company_id', 'left') // Left join condition
            ->join('departments', 'departments.id = vehicles.department_id', 'left') // Left join condition
            ->where('vehicles.is_delete', 0)
            -> distinct('card_holder_name')
            -> where('vehicles.department_id', $this->request->getVar('department_id'))
            ->findAll();       

        // Remove the $ sign from the key in the $data array
        return json_encode($data['vehicle']);
    }

    public function storeCompany()
    {
        $request = service('request');
        $postData = $request->getPost();
       
        $input = $this->validate([
            'business_id' => 'required',
            'client_id' => 'required',
            'company_name' => 'required|min_length[4]|is_unique[companies.company_name]',
        ]);
        if (!$input) {
            return redirect()->route('admin/add-company')->withInput()->with('errors', $this->validator);
        } else {
          
            $company = new Company();
            $data = [
                'business_id' => $this->request->getVar('business_id'),
                'client_id' => $this->request->getVar('client_id'),
                'company_id' => 'cuid_' . $this->create_slug(
                    trim($this->request->getVar('company_name'))
                ),
                'company_name'  => trim($this->request->getVar('company_name')),
                'status' => 1
            ];
            $company->insert($data);
            $session = session();
            $session->setFlashdata('success', 'Company Added Successfully');
            return redirect()->route('admin/list-company');
        }
    }

    public function listCompany()
    {
        $company = new Company();

        $data['lists'] = $company
        ->select('companies.*, business.business_name, clients.client_name as client_name') // Adjust fields as needed
        ->join('business', 'business.id = companies.business_id', 'left') // Left join condition
        ->join('clients', 'clients.id = companies.client_id', 'left') // Left join condition
        ->where('companies.is_delete', 0)
        ->where('business.is_delete', 0)
        ->where('clients.is_delete', 0)
        ->findAll();

        // $data['lists'] = $client->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/company/list.php';
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

    public function editCompany($id = 0)
    {
        $company = new Company();
        $company_exists = $company->where('id', $id)->first();

        if ($company_exists) {
            $business = new Business();
            $data['business'] = $business->where('is_delete', 0)->findAll();
            $data['company'] = $company->where('id', $id)->first();
            $data['page'] = 'admin/company/edit.php';
            return view('index', $data);
        } else {
            return redirect()->route('admin/list-company');
        }
    }

    public function editDataCompany()
    {
        $request = service('request');
        $postData = $request->getPost();
        $company = new Company();

        $company_exists = $company->where('id', $this->request->getVar('id'))->first();

        if ($company_exists) {
            $nameExists =  $company->where('id !=', $this->request->getVar('id'))->where('company_name', trim($this->request->getVar('company_name')))->first();
            if ($nameExists) {
                $session = session();
                $session->setFlashdata('err', 'Company Name Already Exist');
                return redirect()->back();
            } else {

                $data = [
                    'business_id' => $this->request->getVar('business_id'),
                    'client_id' => trim($this->request->getVar('client_id')),
                    'company_name' => trim($this->request->getVar('company_name')),
                    'company_id' => 'cuid_' . $this->create_slug(
                        trim($this->request->getVar('company_name'))
                    ),
                    'status' => $this->request->getVar('status')
                ];

                ## Update record
                if ($company->update($this->request->getVar('id'), $data)) {
                    session()->setFlashdata('success', 'Company Details Updated Successfully!');
                    return redirect()->route('admin/list-company');
                } else {
                    session()->setFlashdata('err', 'Data not saved!');
                    return redirect()->back()->withInput();
                }
            }
        } else {

            return redirect()->route('admin/list-company');
        }
    }

    public function deleteClient($id = 0)
    {
        $client = new Client();

        $client_exists = $client->where('id', $id)->first();
        if ($client_exists) {

            $data = [
                'is_delete' => 1,
            ];

            ## Update record
            if ($client->update($id, $data)) {
                session()->setFlashdata('success', 'Client Details Deleted Successfully!');
                return redirect()->route('admin/list-client');
            } else {
                session()->setFlashdata('err', 'Data not saved!');
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->back();
        }
    }
}
