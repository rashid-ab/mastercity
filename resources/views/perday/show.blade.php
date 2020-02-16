@extends('layouts.app')
@section('title','Perday')
@section('content')
<div class="container" style="padding-top: 50px">
 <table class="table table-bordered mastdata">
                <thead>
                    <tr class="mastrow" style="background: #f50000; color: white">
                        <th style="font-size: 1.3em;">Column Names</th>
                        <th style="font-size: 1.3em;">Record</th>
                    </tr>
                   
                </thead>
                <tbody>
                 <tr>
               <tr> <td style="font-size: 1.3em;">ID</td><td style="font-size: 1.3em;">{{$dis->id}}</td></tr>
               <tr><td style="font-size: 1.3em;">PlotNo</td> <td style="font-size: 1.3em;">{{$dis->PlotNo}}</td></tr>
                <tr><td style="font-size: 1.3em;">Items</td><td style="font-size: 1.3em;">{{$dis->Items}}</td></tr>
               <tr><td style="font-size: 1.3em;">Quantity</td> <td style="font-size: 1.3em;">{{$dis->Quantity}}</td></tr>
               <tr><td style="font-size: 1.3em;">Date</td> <td style="font-size: 1.3em;">{{$dis->Date}}</td></tr>
              
               <tr><td style="font-size: 1.3em;">Price</td> <td style="font-size: 1.3em;">{{$dis->Price}}</td>    </tr>
       </tbody>
       <tfoot>
         <tr>
           <td colspan="2"><a href="{{url('home/show/'.$dis->id)}}" class="btn btn_print" style="color: white">Print</a></td>
         </tr>
       </tfoot>         
        </table>
        </div>
	
	@endsection
