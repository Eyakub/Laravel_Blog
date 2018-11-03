<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class AdminController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
//        echo "construct";
//        session_start();
//        $admin_id = Session::get('admin_id');
//        echo $admin_id;
    }
    
    public function index()
    {
        //echo "in index";
        //exit();
        $this->auth_check();
        return view('admin.admin_login');
    }

    
    public function admin_login_check(Request $request)
    {
        $email_address=$request->email_address;
        $admin_password=$request->admin_password;
        
        $result = DB::table('tb1_admin')->select('*')
                              ->where('email_address', $email_address)
                              ->where('admin_password', md5($admin_password))
                              ->first();
        
//        echo '<pre>';
//        print_r($result);
//        exit();
        
        if($result)
        {
            //return view('admin.admin_master');
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return redirect::to('dashboard');
        }
        else
        {
            Session::put('message', 'Your user ID or Password Invalid...!!!');
            return redirect::to('admin-panel');
        }
    }
    
    public function auth_check()
    {
        session_start(); //eta dite hoyeche ekhne nahole login korar por back korle
        //login page e chole jeto
        $admin_id = Session::get('admin_id');
        if($admin_id != NULL)
        {
            //echo "in id admin check auth".$admin_id;
            return redirect::to('dashboard')->send();
        }
//        echo '-------'.$admin_id;
//        exit();
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
