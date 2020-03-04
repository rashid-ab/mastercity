<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perday;
use App\Item;
use DB;
use App\Plot;
use App\Expense;
use Carbon\Carbon;
use Session;
use App\Party;
use App\Purchase;
use Validator;
use App\Thekedar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
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
      return view('perday.index',compact('perday','dataa','display','party','reset','total','total_pay','act_total','items'));
    }
   
      public function store(Request $request)
    { 
        
        
       // if($request->has('addperday')){
           $validator = Validator::make($request->all(), [
            'PlotNo' => 'required',
            'Items' => 'required',
            'Date' => 'required',
            'Price' => 'required'

        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else{
            date_default_timezone_set("Asia/Karachi");
            $price=$request->Price;
            $plot=Plot::where('Plot',$request->PlotNo)->first();
            $item=Item::where('Items',$request->Items)->first();
              if(is_null($plot)){
                return response()->json('empty');
                }
                if(is_null($item)){
                return response()->json('item_empty');
                }
            $data=Perday::create([
                 
                  'PlotNo'=>$request->PlotNo,
                  'Items'=>$request->Items,
                  'Quantity'=>$request->Quantity,
                  'Date'=>$request->Date,
                  'Price'=>$request->Price,
                    ]);
           
      
     
      return response()->json(['suc'=>$data,'success','Add successfully']);

        }
     
        

    }
public function party(Request $request){
       $validators = Validator::make($request->all(), [
            'plot' => 'required',
            'client_name' => 'required'
        ]);
        if ($validators->fails()) {
            return response()->json(['errors'=>$validators->errors()]);
        }
        else{
           date_default_timezone_set("Asia/Karachi");
            $total=DB::table('parties')->sum('total_payment');
            $plot=Plot::where('Plot',$request->plot)->first();
              if(is_null($plot)){
                return response()->json('empty');
                }
                if($request->payment_recieve){
                  $donation=round($request->payment_recieve*$request->donation/100);
                  
                }
                else{
                  $donation='';
                }
            $data=Party::create([
                 
                  'plot'=>$request->plot,
                  'client_name'=>$request->client_name,
                  'payment_recieve'=>$request->payment_recieve,
                  'total_payment'=>$request->total_payment,
                  'donation'=>$donation,
                  'feedback'=>$request->feedback,
                  'reason'=>$request->reason,
                  'date'=>$request->date,
                   ]);
      
      Session::flash('success','Add successfully'); 
     
      return response()->json($data);
}
}
public function search(Request $request){
  if($request->plot_search && $request->Items){
  $search=Perday::where('PlotNo',$request->plot_search)->where('Items',$request->Items)->get();
  $totalamount=Perday::where('PlotNo',$request->plot_search)->where('Items',$request->Items)->sum('Price');
 return response()->json(['success'=>$search,'total'=>$totalamount]);
 }
  if($request->plot_search){
  $search=Perday::where('PlotNo',$request->plot_search)->get();
  $totalamount=Perday::where('PlotNo',$request->plot_search)->sum('Price');
 return response()->json(['success'=>$search,'total'=>$totalamount]);
 }
  if($request->Items){
  $search=Perday::where('Items',$request->Items)->get();
  $totalamount=Perday::where('Items',$request->Items)->sum('Price');
 return response()->json(['success'=>$search,'total'=>$totalamount]);
 }
  
 
}
public function searchs(Request $request){
  if($request->plot_search && $request->client_name){
  $search=Party::where('plot',$request->plot_search)->where('client_name',$request->client_name)->get();
  $totalamount=Party::where('plot',$request->plot_search)->where('client_name',$request->client_name)->sum('total_payment');
  $totalamount1=Party::where('plot',$request->plot_search)->where('client_name',$request->client_name)->sum('payment_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['success'=>$search,'total'=>$totalamount,'total_amount'=>$totalamount1,'remaining'=>$total]);
  }
  if($request->plot_search){
    $search=Party::where('plot',$request->plot_search)->get();
  $totalamount=Party::where('plot',$request->plot_search)->sum('total_payment');
  $totalamount1=Party::where('plot',$request->plot_search)->sum('payment_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['success'=>$search,'total'=>$totalamount,'total_amount'=>$totalamount1,'remaining'=>$total]);
  }
  if($request->client_name){
    $search=Party::where('client_name',$request->client_name)->get();
  $totalamount=Party::where('client_name',$request->client_name)->sum('total_payment');
  $totalamount1=Party::where('client_name',$request->client_name)->sum('payment_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['success'=>$search,'total'=>$totalamount,'total_amount'=>$totalamount1,'remaining'=>$total]);
  }
}
public function storees(Request $request){
  $validators = Validator::make($request->all(), [
            'plots' => 'required',
            'thekedar_name' => 'required'
        ]);
        if ($validators->fails()) {
            return response()->json(['errors'=>$validators->errors()]);
        }
        else{
           date_default_timezone_set("Asia/Karachi");
            // $total=DB::table('thekedars')->sum('total_payment');
             $plot=Plot::where('Plot',$request->plots)->first();
              if(is_null($plot)){
                return response()->json('empty');
                }
            $data=Thekedar::create([
                 
                  'plots'=>$request->plots,
                  'thekedar_name'=>$request->thekedar_name,
                  'payments_recieve'=>$request->payments_recieve,
                  'totals_payment'=>$request->totals_payment,
                  'dates'=>$request->dates,
                  ]);
      
      Session::flash('success','Add successfully'); 
     
      return response()->json($data);
}
}
public function searches(Request $request){
  if($request->plot_search && $request->thekedar_name){
  $search=Thekedar::where('plots',$request->plot_search)->where('thekedar_name',$request->thekedar_name)->get();
  $totalamount=Thekedar::where('plots',$request->plot_search)->where('thekedar_name',$request->thekedar_name)->sum('totals_payment');
  $totalamount1=Thekedar::where('plots',$request->plot_search)->where('thekedar_name',$request->thekedar_name)->sum('payments_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['data'=>$search,'total'=>$total,'total_amount'=>$totalamount,'total_recieve'=>$totalamount1]);
  }
  if($request->plot_search){
    $search=Thekedar::where('plots',$request->plot_search)->get();
  $totalamount=Thekedar::where('plots',$request->plot_search)->sum('totals_payment');
  $totalamount1=Thekedar::where('plots',$request->plot_search)->sum('payments_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['data'=>$search,'total'=>$total,'total_amount'=>$totalamount,'total_recieve'=>$totalamount1]);
  }
  if($request->thekedar_name){
    $search=Thekedar::where('thekedar_name',$request->thekedar_name)->get();
  $totalamount=Thekedar::where('thekedar_name',$request->thekedar_name)->sum('totals_payment');
  $totalamount1=Thekedar::where('thekedar_name',$request->thekedar_name)->sum('payments_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['data'=>$search,'total'=>$total,'total_amount'=>$totalamount,'total_recieve'=>$totalamount1]);
  }
}

public function add_office(Request $request){
  
  $office=Expense::create([
    'expense'=>$request->expense,
    'amount'=>$request->amount,
    'dates'=>$request->dates,
  ]);
  return response()->json($office);
}

public function office_search(Request $request){
  date_default_timezone_set("Asia/Karachi");
  $date = str_replace('/', '-', $request->dates );
  $dates = date("Y-m-d", strtotime($date));
  $search=Expense::where('dates',$dates)->get();
  $total=Expense::where('dates',$dates)->sum('amount');
  // $totalamount1=Thekedar::where('plots',$request->plot_search)->where('thekedar_name',$request->thekedar_name)->sum('payments_recieve');
  // $total=$totalamount-$totalamount1;
  
  return response()->json(['data'=>$search,'total'=>$total]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
         $dis=Perday::find($dis->id);
        return view('perday.update',compact('dis'));
    }
public function shows($id)
    {
       
         $dis=Party::find($id);
        return view('party.show',compact('dis'));
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
    public function perday_update(Request $request)
    {
      $plot=Plot::where('Plot',$request->update_PlotNo)->first();
      $plot_info=Perday::where('id',$request->update_id)->first();
      if(is_null($plot)){
        return response()->json('empty');
      }
      $item=Item::where('Items',$request->update_Items)->first();
    //   return $item;
 if(is_null($item)){
                return response()->json('item_empty');
                }
        Perday::where('id',$request->update_id)->update([
          'PlotNo'=>$request->update_PlotNo,
          'Items'=>$request->update_Items,
          'Quantity'=>$request->update_Quantity,
          'Date'=>$request->update_Date,
          'Price'=>$request->update_Price,
        ]);
        if($plot_info->cd_id!='Null' || !is_null($plot->cd_id)){
          Purchase::where('id',$plot_info->cd_id)->update([
          'PlotNo'=>$request->update_PlotNo,
          'Items'=>$request->update_Items,
          'Quantity'=>$request->update_Quantity,
          'Date'=>$request->update_Date,
          'credit'=>$request->update_Price,
        ]);
        }
        $total=Perday::where('PlotNo',$request->update_PlotNo)->sum('Price');
        $data=Perday::where('id',$request->update_id)->first();
        return response()->json(['data'=>$data,'total'=>$total]);
    }

    public function party_update(Request $request)
    {
      $plot=Plot::where('Plot',$request->update_plot)->first();
      if(is_null($plot)){
        return response()->json('empty');
      }
      

      if($request->update_payment_recieve){
        if($request->update_payment_recieve==''){
          $recieve=0;
        }
        else{$recieved=$request->update_payment_recieve;}
                  $donation=round($recieved*$request->update_donation/100);
                  
                }
                else{
                  $donation='';
                }
                
        Party::where('id',$request->update_id)->update([
          'plot'=>$request->update_plot,
          'client_name'=>$request->update_client_name,
          'payment_recieve'=>$recieved,
          'donation'=>$donation,
          'reason'=>$request->update_reason,
          'feedback'=>$request->update_feedback,
          'date'=>$request->update_date,
          'total_payment'=>$request->update_total_payment,
        ]);
        $total=Party::where('plot',$request->update_plot)->sum('payment_recieve');
        $total_payment=Party::where('plot',$request->update_plot)->sum('total_payment');
        $remaining=$total_payment-$total;
        $data=Party::where('id',$request->update_id)->first();
        return response()->json(['data'=>$data,'remaining'=>$remaining,'total'=>$total,'total_payment'=>$total_payment]);
    }

     public function thekedar_update(Request $request)
    {
      $plot=Plot::where('Plot',$request->update_plots)->first();
      if(is_null($plot)){
        return response()->json('empty');
      }
        Thekedar::where('id',$request->update_id)->update([
          'plots'=>$request->update_plots,
          'thekedar_name'=>$request->update_thekedar_name,
          'payments_recieve'=>$request->update_payments_recieve,
          'dates'=>$request->update_dates,
          'totals_payment'=>$request->update_totals_payment,
        ]);
        $total=Thekedar::where('id',$request->update_id)->sum('payments_recieve');
        $total_payment=Thekedar::where('id',$request->update_id)->sum('totals_payment');
        $remaining=$total_payment-$total;
        $data=Thekedar::where('id',$request->update_id)->first();
        return response()->json(['data'=>$data,'total'=>$total,'remaining'=>$remaining,'total_payment'=>$total_payment]);
    }

     public function office_update(Request $request)
    {
        Expense::where('id',$request->update_id)->update([
          'expense'=>$request->update_expense,
          'amount'=>$request->update_amount,
          'dates'=>$request->update_dates,
        ]);
        $total=Expense::where('dates',$request->update_dates)->sum('amount');
        $data=Expense::where('id',$request->update_id)->first();
        return response()->json(['data'=>$data,'total'=>$total]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function dis(){
        $master=Party::select('plot')->groupBy('plot')->get();
        $master_array=array();
       foreach($master as $mast){
        $data=Party::select('client_name','date','plot')->where('plot',$mast->plot)->first();
        $total_payment=Party::where('plot',$mast->plot)->sum('payment_recieve');
        $total_expense=Perday::where('PlotNo',$mast->plot)->sum('Price');
        $benefit=$total_payment-$total_expense;
        $master_array[]=array(
                  'name'           => $data->client_name,
                  'plot'           => $data->plot,
                  'date'           => $data->date,
                  'total_expense'  => $total_expense,
                  'total_payment'  => $total_payment,
                  'benefit'  => $benefit,
        );
       }
       $total=DB::table('parties')->sum('payment_recieve');
       $total_exp=DB::table('perdays')->sum('Price');
        return view('master.index',compact('master_array','total','total_exp'));
    }
     public function diss($id){
        
         $total=DB::table('thekedars')->delete($id);
        return redirect('perday');
    }
    public function item_index(){
      $display = Item::paginate(10);
      return view('perday.items',compact('display'));
    }
    public function add_item(Request $request){
      $itemss=Item::where('Items',$request->items)->first();
      if(!is_null($itemss)){
        return response()->json('have');
      }
      $add_item=Item::create([
          'Items' => $request->items
      ]);
      return redirect('get_item')->with('success' , 'Item Add');
    }
    public function edit_item($id){
      $item = Item::find($id);
      return view('perday.update_item',compact('item'));
    }
    public function update_item(Request $request){
      $add_item=Item::where('id',$request->id)->update([
          'Items' => $request->items
      ]);
      return redirect('get_item')->with('success' , 'Item Add');
    }
    public function get_items(Request $request){
      $items=Perday::select('Items')->where('PlotNo',$request->dummy_plot_search)->groupBy('Items')->get();
      return response()->json($items);
    }
}
