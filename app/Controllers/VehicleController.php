<?php

namespace App\Controllers;

use App\Models\Business;
use App\Models\Vehicle;

class VehicleController extends BaseController
{
    public function addVehicles()
    {
        $business = new Business();
        $data['business'] = $business->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/vehicle/add.php';
        return view('index', $data);
    }

    public function storeVehicle()
    {
        $request = service('request');
        $postData = $request->getPost();
        $input = $this->validate([
            'business_id' => 'required',
            'client_id' => 'required',
            'company_id' => 'required',
            'department_id' => 'required',
            'card_holder_name' => 'required',
            'vehicle_no' => 'required|min_length[4]|is_unique[vehicles.vehicle_no]',
        ]);

        if (!$input) {
            return redirect()->route('admin/add-vehicles')->withInput()->with('errors', $this->validator);
        } else {
            $vehicle = new Vehicle();

            $data = [
                'business_id' => $this->request->getVar('business_id'),
                'client_id' => $this->request->getVar('client_id'),
                'company_id' => $this->request->getVar('company_id'),
                'department_id' => $this->request->getVar('department_id'),
                'card_holder_name'  => trim($this->request->getVar('card_holder_name')),
                'vehicle_no'  => trim($this->request->getVar('vehicle_no')),
                'status' => 1
            ];
            $vehicle->insert($data);
            $session = session();
            $session->setFlashdata('success', 'Vehicle Added Successfully');
            return redirect()->route('admin/list-vehicles');

        }
    }

    public function listVehicles()
    {
        $vehicle = new Vehicle();
        $data['lists'] = $vehicle
            ->select('vehicles.*,departments.department_name, business.business_name,clients.client_name,companies.company_name') // Adjust fields as needed
            ->join('business', 'business.id = vehicles.business_id', 'left') // Left join condition
            ->join('clients', 'clients.id = vehicles.client_id', 'left') // Left join condition
            ->join('companies', 'companies.id = vehicles.company_id', 'left') // Left join condition
            ->join('departments', 'departments.id = vehicles.department_id', 'left') // Left join condition
            ->where('vehicles.is_delete', 0)
            ->findAll();

        $data['page'] = 'admin/vehicle/list.php';
        return view('index', $data);
    }
}
