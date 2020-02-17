<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $banners = Banner::all();
        return view('banners.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $banner = Banner::create([
            'title' => $request->title,
            'content' => $request->content,
            'banner-trixFields' => request('banner-trixFields')
        ]);

        return redirect()->route('banners.index')
            ->with('class', 'success')
            ->with('message', 'Le billboard a bien été ajouté.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('banners.edit', [
            'banner' => $banner
        ]);
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
        $banner = Banner::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'banner-trixFields' => request('banner-trixFields')
        ]);

        return redirect()->route('banners.index')
            ->with('class', 'success')
            ->with('message', 'Le billboard a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id)->delete();

        return redirect()->route('banners.index')
            ->with('class', 'danger')
            ->with('message', 'Le billboard a bien été supprimé.');

    }
}
