<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Business;
use App\Models\Department;
use App\Controllers\BaseController;

class DepartmentController extends BaseController
{

    public function __construct()
    {
    }


    public function addDepartment(): string
    {
        $business = new Business();
        $data['business'] = $business->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/department/add.php';
        return view('index', $data);
    }

    public function storeDepartment()
    {
        $request = service('request');
        $postData = $request->getPost();
       
        $input = $this->validate([
            'business_id' => 'required',
            'client_id' => 'required',
            'company_id' => 'required',
            'department_name' => 'required|min_length[4]|is_unique[departments.department_name]',
        ]);

        if (!$input) {
            return redirect()->route('admin/add-department')->withInput()->with('errors', $this->validator);
        } else {
            $department = new Department();
            $data = [
                'business_id' => $this->request->getVar('business_id'),
                'client_id' => $this->request->getVar('client_id'),
                'company_id' => $this->request->getVar('company_id'),
                'department_id' => 'duid_' . $this->create_slug(
                    trim($this->request->getVar('department_name'))
                ),
                'department_name'  => trim($this->request->getVar('department_name')),
                'status' => 1
            ];
            $department->insert($data);
            $session = session();
            $session->setFlashdata('success', 'Department Added Successfully');
            return redirect()->route('admin/list-department');
        }
    }

    public function listDepartment()
    {
        $department = new Department();
        $data['lists'] = $department
            ->select('departments.*, business.business_name,clients.client_name,companies.company_name') // Adjust fields as needed
            ->join('business', 'business.id = departments.business_id', 'left') // Left join condition
            ->join('clients', 'clients.id = departments.client_id', 'left') // Left join condition
            ->join('companies', 'companies.id = departments.company_id', 'left') // Left join condition
            ->where('departments.is_delete', 0)
            ->findAll();
       
        // $data['lists'] = $client->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/department/list.php';
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

    public function editDepartment($id = 0)
    {
        $department = new Department();
        $department_exists = $department->where('id', $id)->first();
      
        if ($department_exists) {
            $business = new Business();
            $client = new Client();
            $data['business'] = $business->where('is_delete', 0)->findAll();
            $data['department'] = $department->where('id', $id)->first();
            $data['client'] = $client->where('is_delete', 0)->findAll();
            $data['department'] = $department->where('id', $id)->first();
            $data['page'] = 'admin/department/edit.php';
            return view('index', $data);
        } else {
            return redirect()->route('admin/list-department');
        }
    }

    public function editDataDepartment()
    {
        $request = service('request');
        $postData = $request->getPost();
       
        $department = new Department();

        $department_exists = $department->where('id', $this->request->getVar('id'))->first();

        if ($department_exists) {
            $nameExists =  $department->where('id !=', $this->request->getVar('id'))->where(['department_name'=> trim($this->request->getVar('department_name')),'company_id'=> $this->request->getVar('company_id')])->first();
         
            if ($nameExists) {
                $session = session();
                $session->setFlashdata('err', 'Department Name Already Exist');
                return redirect()->back();
            } else {
                $data = [
                    'business_id' => $this->request->getVar('business_id'),
                    'client_id' => $this->request->getVar('client_id'),
                    'company_id' => $this->request->getVar('company_id'),
                    'department_name' => trim($this->request->getVar('department_name')),
                    'department_id' => 'duid_' . $this->create_slug(
                        trim($this->request->getVar('department_name'))
                    ),
                    'status' => $this->request->getVar('status')
                ];

                // ## Update record
                if ($department->update($this->request->getVar('id'), $data)) {
                    session()->setFlashdata('success', 'Department Details Updated Successfully!');
                    return redirect()->route('admin/list-department');
                } else {
                    session()->setFlashdata('err', 'Data not saved!');
                    return redirect()->back()->withInput();
                }
            }
        } else {

            return redirect()->route('admin/list-department');
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