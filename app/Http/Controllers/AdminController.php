<?php namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\EditAdminRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'create', 'store', 'edit','destroy', 'update']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins = User::where('user_type', '=', '1')->get();

		return view('pages.superadmin',compact('admins'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('pages.createadmin');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminRequest $request)
	{
        $password = Hash::make($request->password);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password
        ]);

        $user->user_type = 1;
        $user->save();

        return redirect('superadmin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where("id", "=" , $id)->firstOrFail();

		return view('pages.editadmin',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditAdminRequest $request)
	{
		$admin = User::where("id", "=" , $id)->firstOrFail();

		$admin->update($request->all());

		return redirect('superadmin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin = User::where("id", "=" , $id)->firstOrFail();

		$admin->delete();

		return redirect('superadmin');
	}

}
