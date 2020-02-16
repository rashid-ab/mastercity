<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perday;
use App\Item;
use App\Plot;
use App\Master;
class PerdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $display=Plot::get();
       return $display;
        $dataa=Item::select('Items')->get();
        $page=Perday::paginate(10);
        $reset=new Perday;
       
      
      return view('perday.index',compact('dataa','display','reset','page'));
      
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
     
      
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if($request->has('perdays')){
       Perday::create([
                  'PlotNo'=>$request->PlotNo,
                  'Items'=>$request->Items,
                  'Quantity'=>$request->Quantity,
                  'Date'=>$request->Date,
                  'Time'=>$request->Time,
                  'Price'=>$request->Price
                    ]);
       
     
      return redirect('/home');
}

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
        //
    }
    public function dis(){
        $mast=Master::paginate(10);
        return view('master.index',compact('mast'))->with('success','Deleted');
    }
  //  public function dis2(Request $request){
   //     if($request->ajax()){

   //         $dataa='';
   //         $searchdata=DB::table('masters')->where('PlotNo',$request->PlotNo)->orWhere('Items',$request->Items)->get();
    //        if($searchdata){
    //             foreach($searchdata as $searches){
    //        $dataa.='<tr>'
     //       .'<td>'.$searches->id.'</td>'
    //        .'<td>'.$searches->PlotNo.'</td>'
      //      .'<td>'.$searches->Items.'</td>'
      //      .'<td>'.$searches->Category.'</td>'
       //     .'<td>'.$searches->Date.'</td>'
      //      .'<td>'.$searches->Time.'</td>'
        //    .'<td>'.$searches->Price.'</td>'
        //    .'</tr>';
//}
//return view('master.index',compact('dataa'));
//           }
      //  }


   // }
}
