<?php

namespace App\Http\Controllers\Plugins\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PluginsApiController extends Controller
{
    public function install(Request $request)
    {
        
        $request = $request->all();
        $gitBranch = $request['branch'];
        $output = shell_exec('cd ..\\Modules && git clone' . ' https://github.com/gabrielzz740/Modules.git .');
        return redirect('/');
    }
}
