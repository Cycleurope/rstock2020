<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LabelsImport;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::all();
        return view('labels.index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $label = Label::create([
            'reference' => $request->reference,
            'designation' => $request->designation
        ]);

        Product::where('mmitno', 'LIKE', $request->reference.'%')->update(['label' => $request->designation]);

        return redirect()->route('labels.index')
            ->with('message', 'Le label ' . $request->reference. ' - ' .$request->designation. ' a bien été ajouté.')
            ->with('class', 'success');
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
        $label = Label::find($id);

        return view('labels.edit', [
            'label' => $label
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
        $label = Label::find($id);
        $label->designation = $request->designation;
        $label->save();

        Product::where('mmitno', 'LIKE', $label->reference.'%')->update(['label' => $request->designation]);

        return redirect()->route('labels.index')
            ->with('message', 'Le label ' . $request->reference. ' - ' .$request->designation. ' a bien été mis à jour.')
            ->with('class', 'primary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = Label::find($id);
        $label->delete();

        Product::where('mmitno', 'LIKE', $label->reference.'%')->update(['label' => null]);

        return redirect()->route('labels.index')
            ->with('message', 'Le label ' . $label->reference. ' - ' .$label->designation. ' a bien été supprimé')
            ->with('class', 'danger');
    }

    public function importForm()
    {
        return view('labels.import-file');
    }

    public function import(Request $request)
    {
        ini_set('max_execution_time', 300);
        Excel::import(new LabelsImport, $request->file('file'));
        return redirect()->route('labels.index');
    }
}
