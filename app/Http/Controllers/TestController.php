<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::orderBy('id', 'desc')->paginate(15);
        return view('backend.test_list.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType  = 'create';
        return view('backend.test_list.create',compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
//            'test_id' => 'required',
//            'test_name' => 'required',
//            'amount' => 'required',
//            'entry_date' => 'required',
        ]);

        try{
            $tests = $request->except('entry_date');
            $tests['entry_date'] = date('Y-m-d', strtotime($request->entry_date));
//            $samples['user_name'] = Auth::user()->id;
            Test::create($tests);
            return redirect()->route('tests.create')->with('message', 'Data Inserted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('backend.test_list.show',compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('backend.tests.create',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        try{
            $tests = $request->except('entry_date');
            $tests['entry_date'] = date('Y-m-d', strtotime($request->entry_date));
//            $samples['user_name'] = Auth::user()->id;
            $test->update($tests);
            return redirect()->route('tests.create')->with('message', 'Data Inserted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        try{
            $test->delete();
            return redirect()->route('tests.index')->with('message', 'Data deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
