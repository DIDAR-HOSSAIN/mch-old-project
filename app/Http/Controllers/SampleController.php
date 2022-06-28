<?php

namespace App\Http\Controllers;

use App\Sample;
use App\Dopereg;
use Illuminate\Http\Request;
class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::orderBy('id','DESC')->paginate(15);
//        dd($samples);
        return view('backend.sample_collection.index',compact('samples'));
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
        return view('backend.sample_collection.create',compact('formType','doperegs'));
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
//            'name' => 'required',
//            'sample_collected_by' => 'required',
//            'symptom' => 'required',
//            'sample_classification' => 'required',
//            'specimen_details' => 'required',
//            'sample_collection_date' => 'required',
//            'remarks' => 'required',
//        ]);


//        try{
//            $input = $request->except('sample_collection_date');
////            dd($samples);
//            $input['sample_collection_date'] = date('Y-m-d', strtotime($request->sample_collection_date));
////            $samples['user_name'] = Auth::user()->id;
//            $input['specimen_details'] = $request->input('specimen_details');
//            Sample::create($input);
//            return redirect()->route('samples.create')->with('message', 'Data Inserted Successfully');
//        }catch (QueryException $e){
//            return redirect()->back()->withInput()->withErrors($e->getMessage());
//        }

        try{
        Sample::create([
            'pid'         => $request->pid,
            'name'   => $request->name,
            'sample_collected_by'   => $request->sample_collected_by,
            'symptom'    => json_encode($request->symptom),
            'sample_classification'    => json_encode($request->sample_classification),
            'specimen_details'    => json_encode($request->specimen_details),
//            'sample_collection_date'   => $request->sample_collection_date,
//            $input = $request->except('sample_collection_date'),
//            $input['sample_collection_date'] = date('Y-m-d', strtotime($request>sample_collection_date)),
//            $samples['user_name'] = Auth::user()->id,
            'remarks'   => $request->remarks
        ]);

         return redirect()->route('samples.create')->with('message', 'Data Inserted Successfully');
        }catch (QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        return view('backend.sample_collection.show', compact('sample'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        $formType = 'edit';
        $doperegs = Dopereg::orderBy('id')->pluck('id', 'id');
        return view('backend.sample_collection.create', compact('formType','doperegs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample $sample)
    {
        try{
            $date = date('Y-m-d', strtotime($request->sample_collection_date));
            $samples = $request->except('sample_collection_date');
            $samples['sample_collection_date'] = $date;
//            $samples['user_name'] = Auth::user()->id;
            $sample->update($samples);
            return redirect()->route('samples.index')->with('message', "Sample updated successfully");
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        try{
            $sample->delete();
            return redirect()->route('samples.index')->with('message', 'Sample deleted successfully');
        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
