<?php
namespace App\Entity\Product;

use App\Models\Product;

class ProductLogic
{
    #private functions
    #public functions
    public function getProductForSale($params = [])
    {
        $list = Product::select(Product::TABLE_NAME . '.*')
            ->whereNull(Product::TABLE_NAME . '.deleted_at')
            ->get();
        $services = [];
        $products = [];
        if (count($list) > 0) {
            foreach ($list as $key => $value) {
                if ($value['category'] == 1) {
                    array_push($services, $value);
                } else {
                    array_push($products, $value);
                }
            }
        }
        $jsonResponse = new \stdClass();
        $jsonResponse->products = $products;
        $jsonResponse->services = $services;
        return $jsonResponse;
    }
    public function getProductList($params = [])
    {
        $list = Product::select(Product::TABLE_NAME . '.*')
            ->whereNull(Product::TABLE_NAME . '.deleted_at');
        if (isset($params['category'])) {
            $list = $list->where(Product::TABLE_NAME . '.category', $params['category']);
        }
        $list = $list->get();
        return $list;
    }
    public function getProductById($id)
    {
        $object = Product::find($id)
            ->whereNull(Product::TABLE_NAME . '.deleted_at')
            ->first();
        return $object;
    }
    public function createProduct($params = [])
    {
        $object = Product::create($params);
        return $object;
    }
    public function updateProduct($id, $params = [])
    {
        $object = Product::find($id);
        $object->fill($params);
        $object->save();
        return $object;
    }
    public function deleteProduct($id)
    {
        $object = Product::find($id);
        $object->flag_active = Product::STATE_INACTIVE;
        $object->deleted_at = date("Y-m-d H:i:s");
        $object->save();
        return $object;
    }
}