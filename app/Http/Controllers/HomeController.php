<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Session;

class HomeController extends Controller
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

    /**
     * Show the files listing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
		session()->put('authuser', $user->id);
		$uid =  $user->id;
		$data = DB::select("select users.name,uploads.* from uploads join users on uploads.user_id = users.id where uploads.user_id = $uid OR FIND_IN_SET($uid, users)");
		
		return view('vfiles',compact('data'));
    }
	
	/**
     * Show the files listing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upload()
    {
        //echo Session::get('roleName');  
		$data = DB::table('users')->select('users.id','users.name')
				->join('users_roles','users.id','=','users_roles.user_id')
				->join('roles','users_roles.role_id','=','roles.id')
				->where(['roles.name' => 'NormalUser'])->get();
        return view('cfile',compact('data'));
    }
	
	/**

     * files Upload action.
     *
     * @return \Illuminate\Http\Response
     */

    public function submitfiles(Request $request)
    {
        $request->validate([
            'fname' => 'required|mimes:pdf,xlx,csv,jpg,png|max:2048',
        ]);  

        $fileName = time().'.'.$request->fname->extension(); 
        $request->fname->move(public_path('uploads'), $fileName);	
		$user = auth()->user();
		$rPath = $fileName;		
		DB::table('uploads')->insert([
            'user_id' => $user->id,
			'path' => $rPath,
			'users' => implode(",",$request->users),
			'created_at' => now(),
			'updated_at' => now(),
        ]);
        return back()->with('success','You have successfully upload file.')->with('fname',$fileName);
    }
	
}
