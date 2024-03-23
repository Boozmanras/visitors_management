<?php
namespace App\Http\Controllers\admin;
use DB;
use Storage;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Models\Tag; 


class ReasonsController extends Controller
{
    public function index()
    {
        if (permission::permitted('reason-for-visits') == 'fail') {
            return redirect()->route('denied');
        }

        $tags = Tag::all();
        return view('admin.reason-for-visits', ['tags' => $tags]);
    }

	public function addReason(Request $request)
	{
		if (permission::permitted('tags-add') == 'fail') {
			return redirect()->route('denied');
		}
	
		$v = $request->validate([
			'tag_no' => 'required|max:200|unique:tags,tag_no',
			'status' => 'required',
		]);
	
		$tag_no = mb_strtoupper($request->tag_no);
		$status = $request->status;
	
		Tag::create([
			'tag_no' => $tag_no,
			'status' => $status,
		]);
	
		return redirect('reason-for-visits')->with('success', "New tag has been added");
	}

    public function deleteReason($id, Request $request)
    {
        if (permission::permitted('tags-delete') == 'fail') {
            return redirect()->route('denied');
        }

        Tag::findOrFail($id)->delete(); // Find the Tag by id and delete it
        return redirect('reason-for-visits')->with('success', "Tag is successfully deleted");
    }
    function csvToArray($filename)
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = $row;
                }
            }
            fclose($handle);
        }

        return $data;
    }

    public function importCsv()
    {
        if (permission::permitted('tags-import') == 'fail') {
            return redirect()->route('denied');
        }

        return view('admin.import-reasons-for-visit');
    }

    function importReasons(Request $request)
    {
        if (permission::permitted('tags-import') == 'fail') {
            return redirect()->route('denied');
        }

        $uploadedfile = $request->file('csv');
        if ($uploadedfile != null) {
            $name = $request->file('csv')->getClientOriginalName();
            $destinationPath = storage_path() . '/app/';
            $uploadedfile->move($destinationPath, $name);
            $file = storage_path('app/' . $name);
            $array = $this->csvToArray($file);

            foreach ($array as $value) {
                Table::tags()->insert([
                    ['id' => $value[0], 'tag_no' => $value[1], 'status' => $value[2]],
                ]);
            }

            return redirect('reason-for-visits');
        } else {
            return redirect('reason-for-visits')->with('error', "Whoops, please upload a csv file");
        }
    }

    function exportReasons(Request $request)
    {
        if (permission::permitted('tags-export') == 'fail') {
            return redirect()->route('denied');
        }

        $date = date('Y-m-d');
        $time = date('h-i-sa');
        $file = 'tags-' . $date . 'T' . $time . '.csv';
        $c = Table::tags()->get();
        Storage::put($file, '', 'private');

        foreach ($c as $d) {
            Storage::prepend($file, $d->id . ',' . $d->tag_no . ',' . $d->status);
        }

        Storage::prepend($file, '"ID","TAG_NO","STATUS"');
        return Storage::download($file);
    }
}