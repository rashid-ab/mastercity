<?php

namespace App\Http\Controllers;

use App\CD;
use App\Plot;
use App\Item;
use App\Perday;
use App\Party;
use DB;
use Illuminate\Http\Request;

class CDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pm=Perday::orderBy('Price','DESC')->get();
        $display=Plot::get();
        $party=Party::all();
        $items=Item::all();
        $perday=Perday::select('Items')->groupBy('Items')->get();
        $dataa=Item::select('Items')->get();
        $reset=new Perday;
        $total=DB::table('perdays')->sum('Price');
        $total_pay=DB::table('parties')->sum('total_payment');
        $total_rec=DB::table('parties')->sum('payment_recieve');
        $act_total=$total_pay-$total_rec;
      return view('CD.index',compact('perday','dataa','display','party','reset','total','total_pay','act_total','items'));
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
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function show(CD $cD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function edit(CD $cD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CD $cD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function destroy(CD $cD)
    {
        //
    }
}
