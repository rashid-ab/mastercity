<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perday;
use Session;
use App\Party;
use App\Thekedar;
class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    {//dd($dis);
         $dis=Perday::find($id);
         
        return view('perday.show',compact('dis'));
   
    }
     public function showss($id)
    {//dd($dis);
         $dis=Thekedar::find($id);
         
        return view('thekedar.show',compact('dis'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dis=Perday::find($id);
         
        return view('perday.update',compact('dis'));
    }
     public function editss($id)
    {
         $dis=Thekedar::find($id);
         
        return view('thekedar.update',compact('dis'));
    }
     public function edits($id)
    {
         $dis=Party::find($id);
         
        return view('party.update',compact('dis'));
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
        $dis=Perday::find($id)->update([
          'PlotNo'=>$request->PlotNo,
                  'Items'=>$request->Items,
                  'Quantity'=>$request->Quantity,
                  'Date'=>$request->Date,
                  'Time'=>$request->Time,
                  'Price'=>$request->Price
        ]);
        return redirect('home');
            }
             public function updates(Request $request, $id)
    {
        $dis=Party::find($id)->update([
          'plot'=>$request->plot,
                  'client_name'=>$request->client_name,
                  'payment_recieve'=>$request->payment_recieved,
                  'total_payment'=>$request->total_payment,
                  'date'=>$request->date,
                  'time'=>$request->time
        ]);
        return redirect('home');
            }
            public function updatess(Request $request, $id)
    {
        $dis=Thekedar::find($id)->update([
          'plots'=>$request->plots,
                  'thekedar_name'=>$request->thekedar_name,
                  'payments_recieve'=>$request->payments_recieve,
                  'totals_payment'=>$request->totals_payment,
                  'dates'=>$request->dates,
                  'times'=>$request->times
        ]);
        return redirect('home');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Perday::destroy($id);
       Session::flash('warning','Delete Successfully');
       return redirect('home');
    }
     public function destroys($id)
    {
       Party::destroy($id);
       Session::flash('warning','Delete Successfully');
       return redirect('home');
    }
    public function destroyss($id)
    {
       Thekedar::destroy($id);
       Session::flash('warning','Delete Successfully');
       return redirect('home');
    }
}
