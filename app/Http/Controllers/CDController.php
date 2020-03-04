<?php

namespace App\Http\Controllers;

use App\CD;
use App\Plot;
use App\Item;
use App\Perday;
use App\Client;
use App\Purchase;
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
        $clients=Client::orderBy('id','DESC')->get();
        $total=DB::table('perdays')->sum('Price');
        $total_pay=DB::table('parties')->sum('total_payment');
        $total_rec=DB::table('parties')->sum('payment_recieve');
        $act_total=$total_pay-$total_rec;
      return view('CD.index',compact('perday','dataa','display','reset','total','total_pay','act_total','items','clients'));
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
            $client_get=Client::orderBy('id','DESC')->get();
            return response()->json(['suc'=>$data,'clients'=>$client_get]);
        }
    } 
    public function client_update(Request $request)
    {
        $check_client=Client::where('client_name',$request->update_client_name)->first();
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
    public function add_cd(Request $request)
    {
        $balance=Purchase::select('balance')->orderBy('id','DESC')->first();
        if(!is_null($balance)){
            $bal=$balance->balance;
        }
        else {
            $bal=0;
        }
        if($request->category=='Purchase'){
            $cd=Purchase::create([
                'client_name'   => $request->client_name,
                'PlotNo'        => $request->PlotNo,
                'Items'         => $request->Items,
                'Quantity'      => $request->Quantity,
                'Date'          => $request->Date,
                'credit'        => $request->Price,
                'balance'       => $bal+$request->Price,
            ]);
            Perday::create([
                'cd_id'         => $cd->id,
                'PlotNo'        => $request->PlotNo,
                'Items'         => $request->Items,
                'Quantity'      => $request->Quantity,
                'Date'          => $request->Date,
                'Price'         => $request->Price,
            ]);
        }
        if($request->category=='Payment'){
            $cd=Purchase::create([
                'client_name'   => $request->client_name,
                'PlotNo'        => $request->PlotNo,
                'Date'          => $request->Date,
                'debit'         => $request->Price,
                'balance'       => $bal-$request->Price,
            ]);
        }
        return response()->json(['suc'=>$cd]);
    } 

    public function cd_update(Request $request)
    {

        if($request->category=='Purchase'){
            Purchase::where('id',$request->update_id)->update([
                'client_name'   => $request->update_client_name,
                'PlotNo'        => $request->update_PlotNo,
                'Items'         => $request->update_Items,
                'Quantity'      => $request->update_Quantity,
                'Date'          => $request->update_Date,
                'credit'        => $request->update_Price,
            ]);
            Perday::where('cd_id',$request->update_id)->update([
                'PlotNo'        => $request->update_PlotNo,
                'Items'         => $request->update_Items,
                'Quantity'      => $request->update_Quantity,
                'Date'          => $request->update_Date,
                'Price'         => $request->update_Price,
            ]);
            $cd=Purchase::where('id',$request->update_id)->first();
        }
        if($request->category=='Payment'){
            $cd=Purchase::where('id',$request->update_id)->update([
                'client_name'   => $request->update_client_name,
                'PlotNo'        => $request->update_PlotNo,
                'Date'          => $request->update_Date,
                'debit'         => $request->update_Price,
            ]);
            $cd=Purchase::where('id',$request->update_id)->first();
        }
        return response()->json(['data'=>$cd]);
    } 


    /**
     * Display the specified resource.
     *
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function get_clients()
    {
        $clients=Client::orderBy('id','DESC')->get();
        return response()->json($clients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CD  $cD
     * @return \Illuminate\Http\Response
     */
    public function delete_cd($id)
    {
        Purchase::find($id)->delete();
        return response()->json('Delete Successfully!');
    }

    public function client_search(Request $request){
        $client=Client::where('client_name',$request->client_name)->first();
        return response()->json($client);
    }
    public function cd_search(Request $request){
        $client=Purchase::where('client_name',$request->client_name)->orderBy('id','DESC')->get();
        return response()->json(['suc'=>$client]);
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
