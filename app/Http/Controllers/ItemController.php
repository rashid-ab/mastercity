<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Plot;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         
         $item=Item::paginate(4);
         $itemss=new Item;
         $display=Plot::paginate(5);
        $plot=new Plot;
        return view('items.index',compact('item','display','plot','itemss'));
       
    }
    public function dat()
    {
         $items=Item::all();
         return response()->Json($items,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        Plot::create([
           'Plot'=>$request->Plot.'/'.$request->Category.'/'.$request->Block,
           'Name'=>$request->Name,
           
        ]);
 return redirect('items');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $display=Plot::paginate(5);
        $plot=new Plot;
        return view('items.plot',compact('display'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edited=Item::findOrFail($id);
       return view('items.itemupdate',compact('edited'));
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
       Item::find($id)->update([
            'Items'=>$request->Items

        ]);
        return redirect('items');
    }
public function edits($id)
{
    $edit=Plot::findOrFail($id);
    return view('items.plotupdate',compact('edit'));
}
public function updates(Request $request, $id)
    {
       Plot::find($id)->update([
            'Plot'=>$request->Plot.'/'.$request->Category.'/'.$request->Block,
            'Name'=>$request->Name,

        ]);
        return redirect('items');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
Item::destroy($id);
return redirect('items');
    }
    public function destroys($id)
    {
Plot::destroy($id);
return redirect('items');
    }
}
