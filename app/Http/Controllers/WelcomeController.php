<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_published_blog = DB::table('tb1_blog')
            ->where('publication_status', 1)
            ->orderBy('blog_id', 'desc')
            ->get();

        //calling this function from web.php under @routes
        $home_content = view('pages.home_content')
            ->with('all_published_blog', $all_published_blog);
        $sidebar = 1;
        return view('master')
                ->with('main_content', $home_content)
                ->with('sidebar', $sidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function contact()
    {
        $contact = view('pages.contact');
        $sidebar = 0;
        return view('master')
                ->with('main_content', $contact)
                ->with('sidebar', $sidebar);
    }
    
    public function blog_details($blog_id)
    {
        $blog_info = DB::table('tb1_blog')
            ->where('blog_id', $blog_id)
            ->first();

//        echo '<pre>';
//        print_r($blog_info);
//        exit();
        $data = array();
        $data['hit_count'] = $blog_info->hit_count + 1;
        DB::table('tb1_blog')
            ->where('blog_id', $blog_id)
            ->update($data);

        $blog_new_info = DB::table('tb1_blog')
            ->where('blog_id', $blog_id)
            ->first();

        $blog_details = view('pages.blog_details')
            ->with('blog_info', $blog_new_info);

        $sidebar = 1;
        return view('master')
                ->with('main_content', $blog_details)
                ->with('sidebar', $sidebar);
    }

    public function blog_by_category($category_id)
    {
        $all_published_blog_by_category = DB::table('tb1_blog')
            ->where('publication_status', 1)
            ->where('category_id', $category_id)
            ->orderBy('blog_id', 'desc')
            ->get();

        //calling this function from web.php under @routes
        $home_content = view('pages.home_content')
            ->with('all_published_blog', $all_published_blog_by_category);
        $sidebar = 1;
        return view('master')
            ->with('main_content', $home_content)
            ->with('sidebar', $sidebar);
    }
    
    public function save_comments(Request $request)
    {
        $data = array();
        $data['user_id'] = $request->id;
        $data['blog_id'] = $request->blog_id;
        $data['comments'] = $request->comments;

        DB::table('tbl_comments')
            ->insert($data);
        Session::put('message', 'Comment submitted to admin approval');

        return Redirect::to('/blog-details/'.$request->blog_id);
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
