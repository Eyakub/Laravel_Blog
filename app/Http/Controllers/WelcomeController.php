<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
    
    public function blog_details()
    {
        $blog_details = view('pages.blog_details');
        $sidebar = 1;
        return view('master')
                ->with('main_content', $blog_details)
                ->with('sidebar', $sidebar);
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
