<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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

    /**
     * Show the files listing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
		session()->put('authuser', $user->id);
		$data = DB::table('uploads')->select('uploads.*','users.name')
				->join('users','users.id','=','uploads.user_id')->get();
        return view('afiles',compact('data'));
    }
		
	/**
     * Show the users listing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $data = User::paginate(3);
        return view('users',compact('data'));
    }
	
	/**
     * Show the create user page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createuser()
    {
        $data = Role::all();
		return view('create',compact('data'));
    }
	
	/**
     * Submit the user form.
     *
     * @return \Illuminate\Http\Response
     */
    public function submituser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
		DB::table('users_roles')->insert([
            'user_id' => $user->id,
			'role_id' => $request->userRole,
        ]);
		
		return redirect('users');
    }
	
	
	
}
