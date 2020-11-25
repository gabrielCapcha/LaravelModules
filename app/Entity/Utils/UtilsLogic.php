<?php
namespace App\Entity\Utils;
use App\Entity\SaleDocument\SaleDocumentLogic;
use App\Entity\Product\ProductLogic;
use App\Entity\Company\CompanyLogic;

class UtilsLogic
{
    public function getProductForSale()
    {
        $be = new ProductLogic();
        $list = $be->getProductForSale();
        return $list;
    }
    public function getCompanyById($id)
    {
        $be = new CompanyLogic();
        $list = $be->getCompanyById($id);
        return $list;
    }
}