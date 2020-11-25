<?php

namespace App\Http\Controllers\Plugins\Api;

use App\Http\Controllers\Controller;
use App\Entity\Company\CompanyLogic;
use Illuminate\Http\Request;
use Auth;

class PluginsApiController extends Controller
{
    public function install(Request $request)
    {
        $request = $request->all();
        $plugins = [
            [
                "id" => 1,
                "name" => ["flag_report" => true]
            ],
            [
                "id" => 2,
                "name" => ["flag_a4_document" => true]
            ]
        ];
        foreach ($plugins as $key => $value) {
            if($value['id'] == $request['id']) {
                $flag = $value['name'];
            }
        }
        $company = new CompanyLogic();
        $company->updateCompany($request['companyId'], $flag);
        $output = shell_exec('cd ..\\Modules && git clone' . ' https://github.com/gabrielzz740/Modules.git .');
        return 'instalado';
    }
    
    public function uninstall(Request $request)
    {
        $request = $request->all();
        $plugins = [
            [
                "id" => 1,
                "name" => ["flag_report" => false]
            ],
            [
                "id" => 2,
                "name" => ["flag_a4_document" => false]
            ]
        ];
        foreach ($plugins as $key => $value) {
            if($value['id'] == $request['id']) {
                $flag = $value['name'];
            }
        }
        $company = new CompanyLogic();
        $company->updateCompany($request['companyId'], $flag);
        return 'desinstalado';
    }
}
