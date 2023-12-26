<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::adminLogin');
$routes->get('/admin', 'Login::adminLogin');
$routes->get('/test', 'Home::getTest');
$routes->get('/logout', 'Login::logout');
$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {

    $routes->get('dashboard','AdminController::index');

    $routes->get('add-business','AdminController::addBusiness');
    $routes->get('list-business', 'AdminController::listBusiness');
    $routes->post('storeBusiness', 'AdminController::storeBusiness');
    $routes->post('editDataBusiness', 'AdminController::editDataBusiness');
    $routes->get('business/edit/(:num)', 'AdminController::editBusiness/$1');
    $routes->get('business/delete/(:num)', 'AdminController::deleteBusiness/$1');



    $routes->get('add-client', 'ClientController::addClient');
    $routes->get('list-client', 'ClientController::listClient');
    $routes->post('storeClient', 'ClientController::storeClient');
    $routes->post('editDataClient', 'ClientController::editDataClient');
    $routes->get('client/edit/(:num)', 'ClientController::editClient/$1');
    $routes->get('client/delete/(:num)', 'ClientController::deleteClient/$1');


    $routes->get('add-company', 'CompanyController::addCompany');
    $routes->get('list-company', 'CompanyController::listCompany');
    $routes->post('storeCompany', 'CompanyController::storeCompany');
    $routes->post('editDataCompany', 'CompanyController::editDataCompany');
    $routes->get('company/edit/(:num)', 'CompanyController::editCompany/$1');
    $routes->get('company/delete/(:num)', 'CompanyController::deleteCompany/$1');

    $routes->post('company/getClient', 'CompanyController::getClient');
    $routes->post('company/getCompanies', 'CompanyController::getCompanies');
    $routes->post('company/getDepartments', 'CompanyController::getDepartments');
    $routes->post('company/getVehicles', 'CompanyController::getVehicles');

    

    $routes->get('add-department', 'DepartmentController::addDepartment');
    $routes->get('list-department', 'DepartmentController::listDepartment');
    $routes->post('storeDepartment', 'DepartmentController::storeDepartment');
    $routes->post('editDataDepartment', 'DepartmentController::editDataDepartment');
    $routes->get('department/edit/(:num)', 'DepartmentController::editDepartment/$1');
    $routes->get('department/delete/(:num)', 'DepartmentController::deleteDepartment/$1');

    $routes->get('search', 'SearchController::search');


    $routes->get('report/add', 'ReportController::reportAdd');
    $routes->get('report/import', 'ReportController::getReportImport');
    $routes->post('report/import', 'ReportController::reportImportBulkData');
    $routes->get('report/generate', 'ReportController::generateReportData');
    $routes->get('report/download', 'ReportController::exportReport');
    $routes->get('list-report', 'ReportController::listReport');
    
    $routes->get('add-vehicles', 'VehicleController::addVehicles');
    $routes->get('list-vehicles', 'VehicleController::listVehicles');
    $routes->post('storeVehicle', 'VehicleController::storeVehicle');

    $routes->get('profile', 'AdminController::profile');
    $routes->post('profile_update', 'AdminController::profile_update');


});
$routes->get('/admin/login', 'Login::adminLogin',['as' => 'admin/login']);
$routes->post('/admin/login-verify', 'Login::adminLoginValidate');
$routes->get('forgot-password', 'Login::forgotPassword');
$routes->post('forgot-password', 'Login::resetLink');


