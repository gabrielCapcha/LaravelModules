<?php
namespace App\Entity\Utils;
use App\Entity\SaleDocument\SaleDocumentLogic;
use App\Entity\Product\ProductLogic;

class UtilsLogic
{
    public function getProductForSale()
    {
        $be = new ProductLogic();
        $list = $be->getProductForSale();
        return $list;
    }
}