<?php
namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard'); 
    }

    public function communityRecords()
    {
        return view('admin/community-records'); 
    }

    public function lendingAssets()
    {
        return view('admin/lending-assets'); 
    }
    public function events()
    {
        return view('admin/events'); 
    }
    public function services()
    {
        return view('admin/services'); 
    }
    public function officials()
    {
        return view('admin/officials'); 
    }
    public function incidentReports()
    {
        return view('admin/incident-report'); 
    }
    public function manageUsers()
    {
        return view('admin/users'); 
    }
    public function accountSettings()
    {
        return view('admin/account'); 
    }


}
