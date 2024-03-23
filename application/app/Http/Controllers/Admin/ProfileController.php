<?php
namespace App\Http\Controllers\admin;
use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function account() 
    {
        $id = \Auth::user()->id;

        $user = table::users()->where('id', $id)->first();

        return view('admin.account', ['user' => $user]);
    }

	public function updateUser(Request $request) 
	{
		$v = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
		]);
		
		$id = \Auth::id();

		$name = mb_strtoupper($request->name);

		$email = mb_strtolower($request->email);

		if($id == null) 
        {
            return redirect('account')->with('error', "Whoops, please fill the form completely");
		}
		
		table::users()->where('id', $id)->update([
			'name' => $name,
			'email' => $email,
		]);

		return redirect('account')->with('success', "Your profile is successfully updated");
	}

	public function updatePassword(Request $request) 
	{
		$v = $request->validate([
            'currentpassword' => 'required|max:100',
            'newpassword' => 'required|min:8|max:100',
            'confirmpassword' => 'required|min:8|max:100',
		]);

		$id = \Auth::id();

		$password = \Auth::user()->password;

		$c_password = $request->currentpassword;

		$n_password = $request->newpassword;

		$c_p_password = $request->confirmpassword;

		if($id == null) 
        {
            return redirect('account')->with('error', "Whoops, please fill the form completely");
		}

		if($n_password != $c_p_password) 
		{
			return redirect('account')->with('error', "New password does not match");
		}

		if(Hash::check($c_password, $password)) 
		{
			table::users()->where('id', $id)->update([
				'password' => Hash::make($n_password),
			]);

			return redirect('account')->with('success', "Your password is successfully updated");
		} else {
			return redirect('account')->with('error', "Oops, current password does not match");
		}
	}
} 
