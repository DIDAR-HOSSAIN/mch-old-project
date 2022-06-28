<?php

namespace App\Http\Controllers;

use App\Dopereg;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;
use Dompdf\CanvasFactory;
use Dompdf\Exception;
use Dompdf\FontMetrics;
use Dompdf\Options;

use FontLib\Font;
class MoneyReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $dopes =Dopereg:: orderBy('id','DESC')->paginate(15);
////        return view('backend.money_receipt.index',compact('dopes'));
//        $pdf = PDF::loadView('backend.money_receipt.index',compact('dopes'));
//        return $pdf->stream('dopes.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $invoices = Dopereg::find($id);
        $alldatas = Dopereg::all();
//return $invoices;
//        return view('backend.money_receipt.index', compact('invoices','alldatas'));
        $pdf = PDF::loadView('backend.money_receipt.invoice', compact('invoices','alldatas'));
        return $pdf->stream('Money Receipt.pdf');




//        $pdf = PDF::loadView('backend.money_receipt.index',compact('id'));
//        return $pdf->stream('dopes.pdf');
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
//        return view('backend.dope_reg.show', compact('dopereg'));
    }
}
