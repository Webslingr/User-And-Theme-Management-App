<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('check.theme.manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name'=> ['required', 'unique:themes,name', 'max:50'],
            'cdn_url'=> ['required', 'unique:themes,cdn_url', 'max:255', 'url']
        ]);



        $theme = new Theme;
        $theme->name = $request->name;
        $theme->cdn_url = $request->cdn_url;
        $theme->created_by = auth()->user()->id;
        $theme->save();



        return redirect(route('themes.index'))->with('status', 'Created Theme');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name'=> ['required', 'unique:themes,name,' . $theme->id, 'max:50'],
            'cdn_url'=> ['required', 'unique:themes,cdn_url,' . $theme->id, 'max:255', 'url']
        ]);



        $theme->name = $request->name;
        $theme->cdn_url = $request->cdn_url;
        $theme->updated_by = auth()->id();
        $theme->save();



        //redirect to list
        return redirect(route('themes.index'))->with('status', 'Theme Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect(route('themes.index'))->with('status', 'Theme Deleted');
    }
}
