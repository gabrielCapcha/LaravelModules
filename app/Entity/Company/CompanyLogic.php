<?php
namespace App\Entity\Company;

use App\Models\Company;

class CompanyLogic
{
    #private functions
    #public functions
    public function getCompanyById($id)
    {
        $object = Company::find($id)
            ->whereNull(Company::TABLE_NAME . '.deleted_at')
            ->first();
        return $object;
    }
    public function createCompany($params = [])
    {
        $object = Company::create($params);
        return $object;
    }
    public function updateCompany($id, $params = [])
    {
        $object = Company::find($id);
        $object->fill($params);
        $object->save();
        return $object;
    }
    public function deleteCompany($id)
    {
        $object = Company::find($id);
        $object->flag_active = Company::STATE_INACTIVE;
        $object->deleted_at = date("Y-m-d H:i:s");
        $object->save();
        return $object;
    }
}