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
               <tr><td style="font-size: 1.3em;">PlotNo</td> <td style="font-size: 1.3em;">{{$dis->plot}}</td></tr>
                <tr><td style="font-size: 1.3em;">Name</td><td style="font-size: 1.3em;">{{$dis->client_name}}</td></tr>
               <tr><td style="font-size: 1.3em;">Payment Recieved</td> <td style="font-size: 1.3em;">{{$dis->payment_recieve}}</td></tr>
               
               <tr><td style="font-size: 1.3em;">Date</td> <td style="font-size: 1.3em;">{{$dis->date}}</td>    </tr>
               <tr><td style="font-size: 1.3em;">Time</td> <td style="font-size: 1.3em;">{{$dis->time}}</td>    </tr>
       </tbody>
       <<tfoot>
         <tr>
           <td><a href="{{url('prints/'.$dis->id)}}"></a></td>
         </tr>
       </tfoot>        
        </table>
        </div>
	
	@endsection