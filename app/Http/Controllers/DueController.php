<?php

namespace App\Http\Controllers;

use App\Dopereg;
use App\Due;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dues = Due::OrderBy('id','desc')->paginate(15);
        return view ('backend.due_collect.index',compact('dues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        $doperegs = Dopereg::orderBy('id')->pluck('id', 'id');
        return view('backend.due_collect.create',compact('formType','doperegs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $dues = $request->all();
            $dues = $request->except('entry_date');
            $dues['entry_date'] = date('Y-m-d', strtotime($request->entry_date));
            $dues = $request->except('collection_date');
            $dues['collection_date'] = date('Y-m-d', strtotime($request->collection_date));
            //            $data['user_name'] = Auth::user()->id;
            Due::create($dues);
            return redirect()->route('dues.create')->with('message', "Due Collection Successfully");
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function show(Due $due)
    {
        return view('backend.due_collect.show',compact('due'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function edit(Due $due)
    {
        $formType ='edit';
        return view('backend.due_collect.create',compact('due','formType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Due $due)
    {
        try {
            $dues = $request->except('entry_date');
            $dues['entry_date'] = date('Y-m-d', strtotime($request->entry_date));
            $dues = $request->except('collection_date');
            $dues['collection_date'] = date('Y-m-d', strtotime($request->collection_date));
            //            $data['user_name'] = Auth::user()->id;
            $due->update($dues);
            return redirect()->route('dues.index')->with('message', "Due Collection Updated Successfully");
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function destroy(Due $due)
    {
        try{
            $due->delete();
            return redirect()->route('dues.index')->with('message',"Data Deleted Successfully");
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
