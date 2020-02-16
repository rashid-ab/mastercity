@extends('layouts.app')
@section()
  <div class="party-form">
        <div class="signup-form">
    <form class="form-horizontal1" action=""  method="post" role="form">
        <h4><b>Party Record</b>
         <select class="amou">
            <option>Total</option>
            <option>Amount</option>
          </select>
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" list="plot" class="form-control pltno" name="plot" placeholder="Plot No" >
            <datalist id="plot" >
    @foreach($display as $disss)
  <option value="{{$disss->Plot}}">
  @endforeach
</datalist>
        </div>
        <div class="form-group">
            <input placeholder="Name" name='client_name' list="name" class="form-control item">

<datalist id="name" >
    @foreach($display as $dat)
  <option value="{{$dat->Name}}">
  @endforeach
</datalist>

    
        </div>
        <div class="form-group">
            <input type="text" class="form-control amount_rec" name="payment_recieve" placeholder="Payment Recieve" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control total_pay" name="total_payment" placeholder="Total Payment" >
        </div>    
      <div class="form-group">
            <input type="text" class="form-control pricee" name="date" placeholder="Date"  >
        </div> 
        <div class="form-group">
            <input type="text" class="form-control pricee" name="time" placeholder="Time"  >
        </div> 
        
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addparty" value="Submit">
        </div>

    </form>
    </div>
     <div class="table-wrapper">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                
                                <form action="" class="party_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                  <input type="text" class="form-control perday_search" name="plot_search" placeholder="Plot Search&hellip;">
                                <input type="text" class="form-control perday_search" name="item_search" placeholder="Name Search&hellip;"></div><div class="form-group" style="float: left;"><input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                  <span class="party_span" style="margin-left: 40px; display:none">Total:</span><span class="party_total"></span>
                                </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
        
            
            <table class="table table-bordered">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>PlotNo</th>
                        <th>Name</th>
                        <th>Payment Recieve</th>
                        <th>Date</th>
                        <th>Time</th>  
                        <th class="party_hid">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="perdaytable1">
                </tbody>
                <tbody class="perdaytable12">
                </tbody>
     <tfoot>
        <tr>
            <td><button class='btn btn-print party_print' style="color: white; display:none">Print</button></td>
            <td><button class='btn btn-print party_action' style="color: white; display:none">Action</button></td>
            <td></td>
            <td id="party_total"></td>
            <td></td>
            <td ></td>
            <td class="party_hid"></td>
        </tr>
    </tfoot>    
        </table>
       
    </div>

    </div>
@endsection