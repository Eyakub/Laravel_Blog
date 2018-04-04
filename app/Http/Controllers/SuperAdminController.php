<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->super_admin_auth_check();
        $dashboard_home=view('admin.pages.dashboard_home');
        return view('admin.admin_master')
                    ->with('admin_main_content', $dashboard_home);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category()
    {
        $this->super_admin_auth_check();
        $add_category=view('admin.pages.add_category');
        return view('admin.admin_master')
                    ->with('admin_main_content', $add_category);
    }
    /**
     * 
     * @param Request $request
     * to save data from the FORM to database
     * @return mixed
     */
    public function save_category(Request $request)
    {
        $this->super_admin_auth_check();
        $data = array();
        $data['category_name'] = $request->category_name; //first category_name = database table column
                                                          //2nd || = form field name
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = date("y-m-d H:i:s");
        Db::table('tbl_category')->insert($data);
        Session::put('message', 'Save category information successfull');
        return redirect::to('add-category');
        
    }         
    
    /**
     * manage created category
     */
    public function manage_category()
    {
        $this->super_admin_auth_check();
        $all_category = DB::table('tbl_category')
                ->select('*')
                ->get();
//        echo '<pre>';
//        print_r($all_category);
//        exit();
        $manage_category = view('admin.pages.manage_category')
                ->with('all_category', $all_category);
        return view('admin.admin_master')
                ->with('admin_main_content', $manage_category);
    }


    /**
     * @param $category_id to pass id to change publication_status
     * @return mixed
     */
    public function unpublished_category($category_id)
    {
        $this->super_admin_auth_check();
        $data = array();
        $data['publication_status'] = 0;
        DB::table('tbl_category')
            //->set('publication_status', 0)
            ->where('category_id', $category_id)
            ->update($data);
        return Redirect::to('/manage-category');
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function published_category($category_id)
    {
        $this->super_admin_auth_check();
        $data = array();
        $data['publication_status'] = 1;
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update($data);
        return Redirect::to('/manage-category');
    }


    /**
     * @param $category_id
     * @return mixed
     */
    public function delete_category($category_id)
    {
        $this->super_admin_auth_check();
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->delete();
        return Redirect::to('/manage-category');
    }


    /**
     * @param $category_id
     * @return $this
     */
    public function edit_category($category_id)
    {
        $this->super_admin_auth_check();
        $category_info_by_id=DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->first();
        $edit_category=view('admin.pages.edit_category')
            ->with('category_info', $category_info_by_id);

        return view('admin.admin_master')
            ->with('admin_main_content', $edit_category);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function update_category(Request $request)
    {
        $this->super_admin_auth_check();
        $data = array();
        $category_id = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update($data);

        return Redirect::to('manage-category');
    }


    /**
     * @return $this
     */
    public function add_blog()
    {
        $this->super_admin_auth_check();

        $publish_category = DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();

        $add_blog = view('admin.pages.add_blog')
            ->with('publish_category', $publish_category);

        return view('admin.admin_master')
            ->with('admin_main_content', $add_blog);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function save_blog(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['author_name'] = Session::get('admin_name');
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        //$data['blog_image'] = ;
        $data['publication_status'] = $request->publication_status;
        $image = $request ->file('blog_image');

//        echo '<pre>';
//        print_r($image);
//        exit();

        if($image)
        {
            $image_name = str_random(20);
            $ext = strtolower($image ->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'blog_image/'; //folder name that created into public
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data['blog_image'] = $image_url;
                DB::table('tb1_blog') ->insert($data);
                Session::put('message', 'Saved Information Successfully');
                return Redirect::to('add-blog');
            }
        }
        else{
            DB::table('tb1_blog')->insert($data);
            Session::put('message', 'Saved Information Successfully');
            return Redirect::to('/add-blog');
        }

    }
    
    public function logout()
    {
        Session::put('admin_id', '');
        Session::put('admin_name', '');
        Session::put('message', 'You are successfully logout.');
        return redirect::to('admin-panel');
    }
    
    public function super_admin_auth_check()
    {
        session_start();
        $admin_id = Session::get('admin_id');
//        echo $admin_id;
//        exit();
        if($admin_id == NULL)
        {
            //check kortese admin login already , if not thn admin-panel ei thakbe
            //echo "in superadmin";
            return redirect::to('admin-panel')->send();
        }

    }
    
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
