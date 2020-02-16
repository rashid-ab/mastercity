<?php

namespace App\Http\Controllers;

use App\Thekedar;
use Illuminate\Http\Request;

class ThekedarController extends Controller
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
        $validators = Validator::make($request->all(), [
            'plots' => 'required',
            'thekedar_name' => 'required'
        ]);
        if ($validators->fails()) {
            return response()->json(['errors'=>$validators->errors()]);
        }
        else{
           date_default_timezone_set("Asia/Karachi");
            $total=DB::table('thekedars')->sum('total_payment');
            
            $data=Thekedar::create([
                 
                  'plots'=>$request->plots,
                  'thekedar_name'=>$request->thekedar_name,
                  'payments_recieve'=>$request->payments_recieve,
                  'totals_payment'=>$request->totals_payment,
                  'dates'=>Date('d-m-y'),
                  'times'=>Date('H-i-sa'),
                    ]);
      
      Session::flash('success','Add successfully'); 
     
      return response()->json([ 
        'success'=>'<tr>'.
                          '<td>'.$data->id.'</td>'.
                          '<td>'.$data->plots.'</td>'.
                          '<td>'.$data->thekedar_name.'</td>'.
                          '<td>'.$data->payments_recieve.'</td>'.
                          '<td>'.$data->totals_payment.'</td>'.
                          '<td>'.$data->dates.'</td>'.
                          '<td>'.$data->times.'</td>'.
                          '<td>'.
                          '<a href="{{url("home/update/"'.$data->id.')}}" class="editperday"
                           title="Edit"
                          data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>'.
                          '<a href="{{url("home/delete/"'.$data->id.')}}" class="delete" title="Delete"
                          data-toggle="tooltip"><i class="material-icons">&#xE872;
                          </i></a>'.
                          '</td></tr>'  ]
      );
}
    }
    public function searches(Request $request){
  $search=Thekedar::where('plots','like',$request->plot_search.'%')->where('thekedar_name','like',$request->payment_search.'%')->get();
  $totalamount=Thekedar::where('plots','like',$request->plot_search.'%')->where('thekedar_name','like',$request->payment_search.'%')->sum('total_payment');
  $totalamount1=Thekedar::where('plots','like',$request->plot_search.'%')->where('thekedar_name','like',$request->payment_search.'%')->sum('payment_recieve');
  $total=$totalamount-$totalamount1;
  
  return response()->json(['success'=>$search,'total'=>$total]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Thekedar  $thekedar
     * @return \Illuminate\Http\Response
     */
    public function show(Thekedar $thekedar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thekedar  $thekedar
     * @return \Illuminate\Http\Response
     */
    public function edit(Thekedar $thekedar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thekedar  $thekedar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thekedar $thekedar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thekedar  $thekedar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thekedar $thekedar)
    {
        //
    }
}
