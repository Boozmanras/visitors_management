<?php
namespace App\Http\Controllers\admin;
use DB;
use Auth;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(Request $request) 
    {
        if (permission::permitted('settings')=='fail'){ return redirect()->route('denied'); }
        
        $data = table::settings()->where('id', 1)->first();

        $ip = $request->ip();
        
    	return view('admin.settings', ['data' => $data, 'ip' => $ip]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('settings-update')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'time_zone' => 'required|max:200',
            'time_format' => 'max:100',
            'iprestriction' => 'max:1600',
        ]);

        $time_zone = $request->time_zone;
        
        $time_format = $request->time_format;
        
        $iprestriction = $request->iprestriction;
        
        if ($time_zone != null) 
        {
            $timezone = table::settings()->where('id', 1)->value('time_zone');

            $path = base_path('.env');
            
            if(file_exists($path)) 
            {
                file_put_contents($path, str_replace('APP_TIMEZONE='.$timezone, 'APP_TIMEZONE='.$time_zone, file_get_contents($path)));
            }
        }

        table::settings()->where('id', 1)->update([
            'time_zone' => $time_zone,
            'time_format' => $time_format,
            'iprestriction' => $iprestriction,
        ]);
        
        return redirect('settings')->with('success', "Update was successful");
    }

}
