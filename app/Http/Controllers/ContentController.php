<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $content = Content::all();
         return view('backend.content.show_content_list')->with('allContentList',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.content.content_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('fileimage');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        $Content = new Content;

        $Content->content_name = $request->input('content_name');
        $Content->content_description = $request->input('content_description');
        $Content->sports = $request->input('sports');
        $Content->content_active = $request->input('content_active');
        $Content->fileimage = $input['imagename'];
        $Content->save();
        return redirect()->route('content.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);
        return view('backend.content.edit_content')->with('singleDataEdit',$content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $content)
    {
       $image = $request->file('fileimage');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $Content = Content::find($content);
        $Content->content_name = $request->input('content_name');
        $Content->content_description = $request->input('content_description');
        $Content->sports = $request->input('sports');
        $Content->content_active = $request->input('content_active');
        $Content->fileimage = $input['imagename'];
        $Content->save();
        return redirect()->route('content.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($content)
    {
        Content::destroy($content);
        return redirect()->route('content.index');
    }
}
