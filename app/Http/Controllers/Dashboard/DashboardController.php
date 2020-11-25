<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Entity\Utils\UtilsLogic;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            $utils = new UtilsLogic();
            $jsonResponse = new \stdClass();
            $jsonResponse->companyObject = $utils->getCompanyById($user->com_companies_id);
            $jsonResponse->user = $user;
            $jsonResponse->tittle = 'Dashboard';
            $view = view('dashboard.dashboard', compact('jsonResponse', $jsonResponse));
        } else {
            $view = view('errors.404');
        }
        return $view;
    }
}
