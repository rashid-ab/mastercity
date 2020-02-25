<?php

namespace App\Http\Controllers;

use App\CD;
use App\Plot;
use App\Item;
use App\Perday;
use App\Client;
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
        $items=Item::all();
        $perday=Perday::select('Items')->groupBy('Items')->get();
        $dataa=Item::select('Items')->get();
        $reset=new Perday;
        $total=DB::table('perdays')->sum('Price');
        $total_pay=DB::table('parties')->sum('total_payment');
        $total_rec=DB::table('parties')->sum('payment_recieve');
        $act_total=$total_pay-$total_rec;
      return view('CD.index',compact('perday','dataa','display','reset','total','total_pay','act_total','items'));
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
    public function add_client(Request $request)
    {
        $check_client=Client::where('client_name',$request->client_name)->first();
        if(!is_null($check_client)){
            return response()->json('already_exist');
        }
        else{
            $data=Client::create([
                    'client_name'       => $request->client_name,
                    'shop_name'         => $request->shop_name,
                    'mobile_number'     => $request->mobile_number,
            ]);
            return response()->json(['suc'=>$data]);
        }
    } 
    public function client_update(Request $request)
    {
        $check_client=Client::where('id',$request->update_client_name)->first();
        if(!is_null($check_client)){
            return response()->json('already_exist');
        }
        else{
            Client::find($request->update_id)->update([
                    'client_name'       => $request->update_client_name,
                    'shop_name'         => $request->update_shop_name,
                    'mobile_number'     => $request->update_mobile_number,
            ]);
            $data=Client::find($request->update_id);
            return response()->json(['data'=>$data]);
        }
    } 
    public function delete_client($id)
    {
            Client::find($id)->delete();
            return response()->json('Delete');
        
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
