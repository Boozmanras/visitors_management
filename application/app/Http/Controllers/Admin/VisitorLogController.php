<?php
namespace App\Http\Controllers\admin;
use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class VisitorLogController extends Controller
{

    public function index(Request $request) 
    {
        if (permission::permitted('visitor-log')=='fail'){ return redirect()->route('denied'); }

        $visitors = table::visitorlog()->orderBy('date', 'desc')->take(250)->get();

        return view("admin.visitor-log", ['visitors' => $visitors]);
    }

    public function filter(Request $request) 
    {
        if (permission::permitted('visitor-log')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'start' => 'required|max:255',
            'end' => 'required|max:255'
        ]);

        $start = $request->start;
        
        $end = $request->end;

        $visitors = table::visitorlog()->whereBetween('date', ["$start", "$end"])->get();

        return view("admin.visitor-log", ['visitors' => $visitors]);
    }

    public function add(Request $request) 
    {
        if (permission::permitted('visitor-log-add')=='fail'){ return redirect()->route('denied'); }

        $reasons = table::reasons()->get();

        return view("admin.visitor-log-add", ['reasons' => $reasons]);
    }

    public function store(Request $request)
    {
        if (permission::permitted('visitor-log-add')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'date' => 'required|max:20',
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            //'reasonforvisit' => 'required|max:200',
            'visitorfrom' => 'required|max:100',
            'timein' => 'max:15',
            'timeout' => 'max:15',
        ]);

        $firstname = mb_strtoupper($request->firstname);
        $lastname = mb_strtoupper($request->lastname);
       // $reasonforvisit = mb_strtoupper($request->reasonforvisit);
        $visitorfrom = mb_strtoupper($request->visitorfrom);

    	table::visitorlog()->insert([
    		[
                'date' => $request->date,
                'firstname' => $firstname,
				'lastname' => $lastname,
				//'reasonforvisit' => $reasonforvisit,
				'visitorfrom' => $visitorfrom,
				'timein' => $request->timein,
				'timeout' => $request->timeout,
            ],
    	]);

    	return redirect("/visitor-log/add")->with("success", "New visitor record added successfully");
    }

    public function edit(Request $request) 
    {
        if (permission::permitted('visitor-log-edit')=='fail'){ return redirect()->route('denied'); }

        $id = $request->id;

        $visitor = table::visitorlog()->where('id', $id)->first();

        $reasons = table::reasons()->get();

        return view("admin.visitor-log-edit", ['visitor' => $visitor,'reasons' => $reasons]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('visitor-log-edit')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'reference' => 'required|max:20',
            'date' => 'required|max:20',
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
           // 'reasonforvisit' => 'required|max:200',
            'timein' => 'max:15',
            'timeout' => 'max:15',
        ]);

        $firstname = mb_strtoupper($request->firstname);
        $lastname = mb_strtoupper($request->lastname);
      //  $reasonforvisit = mb_strtoupper($request->reasonforvisit);
        $id_type = $request->id_type;
        $id_no = $request->id_no;
        $person_to_see = $request->person_to_see;
        $phone = $request->phone;
        $tag_no = $request->tags;


        table::visitorlog()->where('id', $request->reference)->update([
            'date' => $request->date,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'id_type' => mb_strtoupper($id_type),
            'id_no' => $id_no,
           // 'reasonforvisit' => $reasonforvisit,
            'timein' => $request->timein,
            'timeout' => $request->timeout,
            'person_to_see' => $person_to_see,
            'phone' => $phone,
            'tag_no' => $tag_no,
        ]);

        return redirect("/visitor-log")->with("success", "Update was successful");
    }

    public function delete($id, Request $request) 
    {
        if (permission::permitted('visitor-log-delete')=='fail'){ return redirect()->route('denied'); }

        table::visitorlog()->where('id', $id)->delete();

        return redirect("/visitor-log")->with("success", "Visitor record is successfully deleted");
    }

    public function timeline(Request $request) 
    {   
        if (permission::permitted('timeline')=='fail'){ return redirect()->route('denied'); }
        
        $currentdate =  date("Y-m-d");

        $data = table::visitorlog()->where("date", $currentdate)->get(); 

        return  view("admin.visitor-timeline", ['data' => $data]);
    }

    public function kioskCheckin(Request $request)
    {
        //$reasons = table::reasons()->get();

        $visitor_checkout = table::visitorlog()->where("timeout", NULL)->get();

        $tags = Tag::where('status', '!=', 1)->get();
      
        $settings = table::settings()->where('id', 1)->first();

        return view("admin.visitor-kiosk-check-in", ['tags' => $tags, 'visitor_checkout' => $visitor_checkout, 'settings' => $settings]); 
    }
    
    public function kioskCheckout(Request $request)
    {
        $reasons = table::reasons()->get();

        $visitor_checkout = table::visitorlog()->where("timeout", NULL)->get();

        $settings = table::settings()->where('id', 1)->first();
        

        return view("admin.visitor-kiosk-check-out", ['reasons' => $reasons, 'visitor_checkout' => $visitor_checkout, 'settings' => $settings]);
    }

    public function getVisitor(Request $request) 
    {
        if($request->id == null) {
            return response()->json([
                "error" => "Invalid request!"
            ]);
        }

        $id = $request->id;

        $data = table::visitorlog()->where('id', $id)->get();

        foreach ($data as $d) 
        {
            $id = $d->id;
            $date = $d->date;
            $firstname = $d->firstname;
            $lastname = $d->lastname;
           // $reasonforvisit = $d->reasonforvisit;
            $visitorfrom = $d->visitorfrom;
            $timein = $d->timein;
        }

        return response()->json([
            "id" => $id,
            "date" => $date,
            "firstname" => $firstname,
            "lastname" => $lastname,
            //"reasonforvisit" => $reasonforvisit,
            "visitorfrom" => $visitorfrom,
            "timein" => $timein,
        ]);
    }


    public function visitorCheckin(Request $request) 
    {
        $v = $request->validate([
            'date' => 'required|max:20',
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
           // 'reasonforvisit' => 'required|max:200',
            'time' => 'max:15',
    
        ]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $id_type = $request->id_type;
        $id_no = $request->id_no;
       // $reasonforvisit = $request->reasonforvisit;
        $date = date("Y-m-d", strtotime($request->date));
        $time = date("h:i A", strtotime($request->time));
        $person_to_see = $request->person_to_see;
        $phone = $request->phone;
        $tag_no = $request->tags;

        table::visitorlog()->insert([
            'date' => $date,
            'firstname' => mb_strtoupper($firstname),
            'lastname' => mb_strtoupper($lastname),
            'id_type' => mb_strtoupper($id_type),
            'id_no' => $id_no,
          //  'reasonforvisit' => mb_strtoupper($reasonforvisit),
            'timein' => $time,
            'person_to_see' => $person_to_see,
            'phone' => $phone,
            'tag_no' => $tag_no,
        ]);

        $tag = Tag::findOrFail($tag_no);
        $tag->status = 1;
        $tag->save();

        return redirect("/visitor-kiosk/check-in")->with("success", "Check-in was successful");
    }

    public function visitorCheckout(Request $request) 
    {
        $v = $request->validate([
            'id' => 'required|max:20',
            'time' => 'max:15',
        ]);

        $id = $request->id;

        $time = date("h:i A", strtotime($request->time));

        table::visitorlog()->where('id', $id)->update([
            'timeout' => $time,
        ]);
        $tag_no = '2';
        $tag = Tag::findOrFail($tag_no);
        $tag->status = 0;
        $tag->save();


        return redirect("/visitor-kiosk/check-out")->with("success", "Check-out was successful");
    }

}
