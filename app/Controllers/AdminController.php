<?php

namespace App\Controllers;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Company;
use App\Models\Vehicle;
use App\Models\Business;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
    }

    public function index(): string
    {
        $business = new Business();
        $client = new Client();
        $companies = new Company();
        $vehicles = new Vehicle();

        $data['business']= count($business->where('is_delete', 0)->findAll());
        $data['client'] = count($client->where('is_delete', 0)->findAll());
        $data['companies'] = count($companies->where('is_delete', 0)->findAll());
        $data['vehicle'] = count($vehicles->where('is_delete', 0)->findAll());
        $data['page'] = 'dashboard.php';

        return view('index',$data);
    }

    public function getTest(): void
    {
        echo "test";
    }

    public function addBusiness(): string
    {        
        $data['page'] = 'admin/business/add.php';
        return view('index', $data);
    }

    public function storeBusiness()
    {
        $request = service('request');
        $postData = $request->getPost();
      
        $input = $this->validate([
            'name' => 'required|min_length[4]|is_unique[business.business_name]',           
        ]);
        if (!$input) {
            return redirect()->route('admin/add-business')->withInput()->with('errors', $this->validator);
        } else {

            $business = new Business();
            $data = [
                'business_id' => 'buid_'. $this->create_slug(
                    trim($this->request->getVar('name'))),
                'business_name'  => trim($this->request->getVar('name')),
                'parent_id'=>0,
                'status'=>1
            ];
            $business->insert($data);
            $session = session();
            $session->setFlashdata('success', 'Business Added Successfully');
            return redirect()->route('admin/list-business');
         }

    }

    public function listBusiness()
    {
        $business = new Business();
        $data['lists']= $business->where('is_delete',0)->findAll();
        $data['page'] = 'admin/business/list.php';
        return view('index', $data);
    }

    function create_slug($str) {
    // Convert the string to lowercase
       $str = strtolower($str);

    // Replace spaces with dashes
        $str = str_replace(' ', '-', $str);
        // Remove special characters
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);

        return $str;
    }

    public function editBusiness($id = 0)
    {
        $business = new Business();
        $business_exists = $business->where('id', $id)->first();

        if ($business_exists) {
            $data['business'] = $business->where('id',$id)->first();
            $data['page'] = 'admin/business/edit.php';
            return view('index', $data);
        }else
        {
            return redirect()->route('admin/list-business');

        }
    }

    public function EditDataBusiness()
    {
        $request = service('request');
        $postData = $request->getPost();
        $business = new Business();

       $business_exists= $business->where('id', $this->request->getVar('id'))->first();

        if($business_exists)
        {
            $nameExists=  $business->where('id !=', $this->request->getVar('id'))->where('business_name', trim($this->request->getVar('name')))->first();
            if($nameExists)
            {
                $session = session();
                $session->setFlashdata('err', 'Business Name Already Exist');
                return redirect()->back(); 
            }else{

                $data = [
                    'business_name' => trim($this->request->getVar('name')),
                    'business_id' => 'buid_' . $this->create_slug(
                        trim($this->request->getVar('name'))
                    ),
                    'status'=> $this->request->getVar('status')
                ];

                ## Update record
                if ($business->update($this->request->getVar('id'), $data)) {
                    session()->setFlashdata('success', 'Business Details Updated Successfully!');
                    return redirect()->route('admin/list-business');
                } else {
                    session()->setFlashdata('err', 'Data not saved!');
                    return redirect()->back()->withInput();
                }

          
            }
        }else{

            return redirect()->route('admin/list-business');
        }
    }

    public function deleteBusiness($id = 0)
    {
        $business = new Business();

        $business_exists = $business->where('id', $id)->first();
        if($business_exists)
        {

            $data = [
                'is_delete' => 1,                
            ];

            ## Update record
            if ($business->update($id, $data)) {
                session()->setFlashdata('success', 'Business Details Deleted Successfully!');
                return redirect()->route('admin/list-business');
            } else {
                session()->setFlashdata('err', 'Data not saved!');
                return redirect()->back()->withInput();
            }

        }else{
            return redirect()->back(); 

        }
    }

    public function profile()
    {
        $admin =new Admin();
        $data['user']= $admin->where('id',session()->get('id'))->first();   
        $data['page'] = 'admin/profile.php';
        return view('index', $data);
    }

    public function profile_update()
    {
        $update=[];
        $request = service('request');
        $postData = $request->getPost();
        $update['name']= $this->request->getVar('name');
        $update['email']= $this->request->getVar('email');
        $update['phone'] = $this->request->getVar('phone');
        if ($password = $this->request->getVar('password')) 
        {
            $update['password']= password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $file = $this->request->getFile('file');

            // Process the uploaded file
            $fileName = $file->getName(); // Get the original file name
            $fileSize = $file->getSize(); // Get the file size
            $fileType = $file->getClientMimeType(); // Get the file type

            $file->move('public/images', $fileName);

            $filepath = base_url() . "/public/images/" . $fileName;
            $update['profile_img']= $filepath;
            $data['profile_img']= $filepath;
            session()->set($data);
        }
        $admin = new Admin();

        if ($admin->update(session('id'), $update)) {
        session()->setFlashdata('success', 'Profile Updated Successfully!');
        return redirect()->back();
        }
    }

}
