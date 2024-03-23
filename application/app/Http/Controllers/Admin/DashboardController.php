<?php
namespace App\Http\Controllers\admin;
use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) 
    {
        if (permission::permitted('dashboard')=='fail'){ return redirect()->route('denied'); }
        
        $datenow = date("Y-m-d");

        $settings = table::settings()->where('id', 1)->first();

        $visitors_in_today = table::visitorlog()->where("date", $datenow)->where("timein", "!=", "null")->count();
        
        $visitors_out_today = table::visitorlog()->where("date", $datenow)->where("timeout", "!=", "null")->count();

        $jan = table::visitorlog()->whereBetween("date", [date("Y-01-01"), date("Y-01-31")])->count();
        $feb = table::visitorlog()->whereBetween("date", [date("Y-02-01"), date("Y-02-31")])->count();
        $mar = table::visitorlog()->whereBetween("date", [date("Y-03-01"), date("Y-03-31")])->count();
        $apr = table::visitorlog()->whereBetween("date", [date("Y-04-01"), date("Y-04-31")])->count();
        $may = table::visitorlog()->whereBetween("date", [date("Y-05-01"), date("Y-05-31")])->count();
        $jun = table::visitorlog()->whereBetween("date", [date("Y-06-01"), date("Y-06-31")])->count();
        $jul = table::visitorlog()->whereBetween("date", [date("Y-07-01"), date("Y-07-31")])->count();
        $aug = table::visitorlog()->whereBetween("date", [date("Y-08-01"), date("Y-08-31")])->count();
        $sep = table::visitorlog()->whereBetween("date", [date("Y-09-01"), date("Y-09-31")])->count();
        $oct = table::visitorlog()->whereBetween("date", [date("Y-10-01"), date("Y-10-31")])->count();
        $nov = table::visitorlog()->whereBetween("date", [date("Y-11-01"), date("Y-11-31")])->count();
        $dec = table::visitorlog()->whereBetween("date", [date("Y-12-01"), date("Y-12-31")])->count();

        $chart_data = "$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec";

		$visitors = table::visitorlog()->whereBetween("date", [date("Y-01-01"), date("Y-12-31")])->get(); 

        $reasonlabel = null; 

        foreach ($visitors as $data) 
        { 
            $array[] = $data->reasonforvisit;

            $reasonlabel = array_count_values($array); 
        }

		$reasonstats = ($reasonlabel == null) ? null : implode(",", $reasonlabel) . ',' ;

        return view('admin.dashboard', [
            'visitors_in_today' => $visitors_in_today,
            'visitors_out_today' => $visitors_out_today,
            'settings' => $settings,
            'chart_data' => $chart_data,
            'reasonstats' => $reasonstats,
            'reasonlabel' => $reasonlabel,
        ]);
    }
}
