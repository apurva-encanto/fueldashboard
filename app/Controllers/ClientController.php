<?php

namespace App\Controllers;

use App\Models\Business;
use App\Models\Client;
use App\Controllers\BaseController;


class ClientController extends BaseController
{
    public function __construct()
    {
    }


    public function addClient(): string
    {
        $business =new Business();
        $data['business'] = $business->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/client/add.php';
        return view('index', $data);
    }

    public function storeClient()
    {
        $request = service('request');
        $postData = $request->getPost();

        $input = $this->validate([
            'business_id' => 'required',
            'client_name' => 'required|min_length[4]|is_unique[clients.client_name]',
        ]);
        if (!$input) {
            return redirect()->route('admin/add-client')->withInput()->with('errors', $this->validator);
        } else {

            $client = new Client();
            $data = [
                'business_id'=> $this->request->getVar('business_id'),
                'client_id' => 'cuid_' . $this->create_slug(
                    trim($this->request->getVar('client_name'))
                ),
                'client_name'  => trim($this->request->getVar('client_name')),
                'status' => 1
            ];
            $client->insert($data);
            $session = session();
            $session->setFlashdata('success', 'Client Added Successfully');
            return redirect()->route('admin/list-client');
        }
    }

    public function listClient()
    {
        $client = new Client();
        $data['lists'] = $client
        ->select('clients.*, business.business_name') // Adjust fields as needed
        ->join('business', 'business.id = clients.business_id', 'left') // Left join condition
        ->where('clients.is_delete', 0)
        ->findAll();

        // $data['lists'] = $client->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/client/list.php';
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

    public function editClient($id = 0)
    {
        $client = new Client();
        $client_exists = $client->where('id', $id)->first();

        if ($client_exists) {
            $business = new Business();
            $data['business'] = $business->where('is_delete', 0)->findAll();
            $data['client'] = $client->where('id', $id)->first();
            $data['page'] = 'admin/client/edit.php';
            return view('index', $data);
        } else {
            return redirect()->route('admin/list-client');
        }
    }

    public function editDataClient()
    {
        $request = service('request');
        $postData = $request->getPost();
        $client = new Client();

        $business_exists = $client->where('id', $this->request->getVar('id'))->first();

        if ($business_exists) {
            $nameExists =  $client->where('id !=', $this->request->getVar('id'))->where('client_name', trim($this->request->getVar('client_name')))->first();
            if ($nameExists) {
                $session = session();
                $session->setFlashdata('err', 'CLient Name Already Exist');
                return redirect()->back();
            } else {

                $data = [
                    'business_id' => $this->request->getVar('business_id'),
                    'client_name' => trim($this->request->getVar('client_name')),
                    'client_id' => 'cuid_' . $this->create_slug(
                        trim($this->request->getVar('client_name'))
                    ),
                    'status' => $this->request->getVar('status')
                ];

                ## Update record
                if ($client->update($this->request->getVar('id'), $data)) {
                    session()->setFlashdata('success', 'CLient Details Updated Successfully!');
                    return redirect()->route('admin/list-client');
                } else {
                    session()->setFlashdata('err', 'Data not saved!');
                    return redirect()->back()->withInput();
                }
            }
        } else {

            return redirect()->route('admin/list-business');
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
