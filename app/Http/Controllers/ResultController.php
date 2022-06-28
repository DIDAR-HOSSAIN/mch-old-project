<?php

namespace App\Http\Controllers;

use App\Result;
use App\Sample;
use Illuminate\Http\Request;
use App\Dopereg;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::OrderBY("ID","DESC")->paginate();
        return view('backend.result.index',compact('results'));
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
        $samples = Sample::orderBy('id')->pluck('id', 'id');
        return view('backend.result.create',compact('formType','doperegs','samples'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        $this->validate($request, [
//            'pid' => 'required',
//            'sid' => 'required',
//            'name' => 'required',
//            'entry_date' => 'required',
//            'date_of_test_result' => 'required',
//            'result' => 'required',
//            'delivery_status' => 'required',
//            'remarks' => 'required',
//        ]);

        try{
            $results = $request->except('entry_date');
            $results['entry_date'] = date('Y-m-d', strtotime($request->entry_date));
            $results['date_of_test_result'] = date('Y-m-d', strtotime($request->date_of_test_result));
//            $samples['user_name'] = Auth::user()->id;
            Result::create($results);

            return redirect()->route('results.create')->with('message', 'Data Inserted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('backend.result.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $formType = 'edit';
        return view('backend.result.create',compact('formType','result'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        try{
            $date = date('Y-m-d', strtotime($request->entry_date));
            $results = $request->except('entry_date');
            $results['entry_date'] = $date;
//            $samples['user_name'] = Auth::user()->id;
            $result->update($results);
            return redirect()->route('results.index')->with('message', "Sample updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        try{
            $result->delete();
            return redirect()->route('results.index')->with('message', 'Sample deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
