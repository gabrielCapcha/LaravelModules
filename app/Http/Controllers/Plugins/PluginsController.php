<?php

namespace App\Http\Controllers\Plugins;

use App\Http\Controllers\Controller;
use App\Entity\Plugins\PluginsLogic;
use App\Entity\Utils\UtilsLogic;
use Auth;

class PluginsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            $utils = new UtilsLogic();
            $be = new PluginsLogic();
            $list = $be->getPluginsList();
            $jsonResponse = new \stdClass();
            $jsonResponse->companyObject = $utils->getCompanyById($user->com_companies_id);
            $jsonResponse->user = $user;
            $jsonResponse->plugins = $list;
            $jsonResponse->tittle = 'Lista de plugins';
            $view = view('plugins.plugins', compact('jsonResponse', $jsonResponse));
        } else {
            $view = view('errors.404');
        }
        return $view;
    }
}
