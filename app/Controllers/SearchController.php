<?php

namespace App\Controllers;

use App\Models\Business;

class SearchController extends BaseController
{
    public function search()
    {
        $business = new Business();
        $data['business'] = $business->where('is_delete', 0)->findAll();
        $data['page'] = 'admin/search.php';
        return view('index', $data);
    }
}