<?php

namespace App\Http\Controllers\SaleDocument;

use App\Http\Controllers\Controller;
use App\Entity\Utils\UtilsLogic;
use Illuminate\Http\Request;
use Auth;

class SaleDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utils = new UtilsLogic();
        $user = Auth::user();
        if (!is_null($user)) {
            $jsonResponse = new \stdClass();
            $jsonResponse->companyObject = $utils->getCompanyById($user->com_companies_id);
            $jsonResponse->user = $user;
            $jsonResponse->products = $utils->getProductForSale();
            $jsonResponse->tittle = 'Nueva Venta';
            $view = view('sales.sale-document', compact('jsonResponse', $jsonResponse));
        } else {
            $view = view('errors.404');
        }
        return $view;
    }
    public function createSales(Request $request)
    {
        $user = Auth::user();
        $be = new SalesLogic();
        $Sales = $be->createSales($request->all());
        return $Sales;
    }
    public function updateSales(Request $request)
    {
        $user = Auth::user();
        $be = new SalesLogic();
        $Sales = $be->updateSales($request->all());
        return $Sales;
    }
    public function deleteSales($id)
    {
        $user = Auth::user();
        $be = new SalesLogic();
        $Sales = $be->deleteSales($id);
        return $Sales;
    }
}
