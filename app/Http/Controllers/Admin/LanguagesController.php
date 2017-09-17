<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language ;
class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $languages = Language::all();
        return view('admin.languages.index')->withLanguages($languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.languages.create');
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

//        dd($request);
        $this->validate($request,[
            'name' => 'required|unique:languages,name|max:100',
            'label' => 'required|unique:languages,label|max:20',
//            'status' => 'required'
        ]);
        $lanuguage = new Language();
        $lanuguage->name = $request->name ;
        $lanuguage->label = $request->label ;
        $lanuguage->status = $request->status ;
        $lanuguage->save();
        session()->flash('message' , 'new language added successfully');
        return redirect()->route('languages.index');
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
        $language = Language::find($id);

        return view('admin.languages.edit')->withLanguage($language);
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
        $this->validate($request,[
            'language_name' => 'required|max:100',
            'language_label' => 'required|max:20',
            'status' => 'required'
        ]);
        $lanuguage = Language::find($id);
        $lanuguage->name = $request->language_name ;
        $lanuguage->label = $request->language_label ;
        $lanuguage->status = $request->status ;
        $lanuguage->save();
        session()->flash('message' , 'language has been updated successfully');
        return redirect()->route('languages.index');
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
        Language::destroy($id);
        session()->flash('message' , 'language has been deleted successfully');
        return redirect()->route('languages.index');
    }
}
