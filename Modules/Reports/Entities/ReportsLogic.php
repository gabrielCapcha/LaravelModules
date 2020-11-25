<?php
namespace Modules\Reports\Entities;
use App\Models\SaleDocument;
use App\Models\SaleDocumentDetail;
use App\Models\Product;

class ReportsLogic
{
    #private functions
    #public functions
    public function getSaleDocumentList($params = [])
    {
        $list = SaleDocument::select(SaleDocument::TABLE_NAME . '.*')
            ->whereNull(SaleDocument::TABLE_NAME . '.deleted_at')
            ->get();
        return $list;    
    }
    public function getSaleDocumentById($id)
    {
        $object = SaleDocument::find($id)
            ->whereNull(SaleDocument::TABLE_NAME . '.deleted_at')
            ->first();
        return $object;
    }
    public function deleteSaleDocument($id)
    {
        $object = SaleDocument::find($id);
        $object->flag_active = SaleDocument::STATE_INACTIVE;
        $object->deleted_at = date("Y-m-d H:i:s");
        $object->save();
        return $object;
    }
}