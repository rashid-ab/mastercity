@extends('layouts.app')
@section('title','Perday')
@section('content')
<select class="form-control forms_selection" style="width: 150px;" >
    <option  value="Perday-Form" >Create Form</option>
     <option  value="Party-Form" >Enry Form</option>
</select>
    <!-- Party Form -->
    <div class="party-form">
        <div class="signup-form">
    <form class="form-horizontal1" id="party_form" action=""  method="post" role="form">
        <h4><b>Party Record</b>
        </h4>
        <hr>
               {{csrf_field()}}  
               
    <div class="form-group">
        <input type="text" list="plot" class="form-control pltno" name="plot" placeholder="Plot No" autocomplete="off" required>
        <datalist id="plot"  autocomplete="off">
		    @foreach($display as $disss)
		  		<option value="{{$disss->Plot}}">{{$disss->Plot}}</option>
		  	@endforeach
		</datalist>
    </div>
    <div class="form-group">
        <input placeholder="Name" name='name'  class="form-control item" autocomplete="off" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control company_name" name="shop_name" placeholder="Shop Name" >
    </div>
    <div class="form-group">
        <input type="text" class="form-control mobile_no" name="mobile_no" placeholder="Mobile Number" >
    </div>
    
    </div>      
    <div class="form-group">
        <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addcreate" value="Submit">
    </div>

    </form>
    <form class="edit_party" action="" style="display: none"  method="post" role="form">
        <h4><b>Party Record</b>
         {{-- <select class="amou">
            <option>Total</option>
            <option>Amount</option>
          </select> --}}
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" list="plot" class="form-control update_pltno" name="update_plot" placeholder="Plot No" autocomplete="off" required>
            <input type="hidden"  class="form-control update_id" name="update_id" placeholder="Plot No" autocomplete="off" required>
            <datalist id="plot"  autocomplete="off">
    @foreach($display as $disss)
  <option value="{{$disss->Plot}}">{{$disss->Plot}}</option>
  @endforeach
</datalist>
        </div>
        <div class="form-group">
            <input placeholder="Party update_Name" name='update_client_name'  class="form-control update_client_name" autocomplete="off" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_payment_recieve" name="update_payment_recieve" placeholder="Payment Recieve" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_total_payment" name="update_total_payment" placeholder="Total Payment" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_donation" value="5" name="update_donation" placeholder="Donation" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_reason" name="update_reason" placeholder="Reason" >
        </div>  
        <div class="form-group">
            <input type="text" class="form-control update_feedback" name="update_feedback" placeholder="Feed Back" >
        </div>
      <div class="form-group">
            <input type="text" class="form-control update_date" name="update_date" placeholder="Date"  required>
        </div> 
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addparty" value="Submit">
        </div>

    </form>
    </div>
     <div class="table-wrapper party_table" style="width: 1073px !important; ">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                <form action="" class="party_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                <input type="text" list="plots" class="form-control perday_search" name="plot_search" placeholder="Plot Search&hellip;" autocomplete="off">
                              <datalist id="plots"  autocomplete="off">
                                @foreach($display as $diss)
                              <option value="{{$diss->Plot}}">{{$diss->Plot}}</option>
                              @endforeach
                            </datalist>
                                <input type="text" class="form-control perday_search" name="client_name" placeholder="Name Search&hellip;"></div><div class="form-group" style="float: left;"><input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                  {{-- <span class="party_span" style="margin-left: 40px; display:none">Total:</span><span class="party_total"></span> --}}
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        
            <span class="party_header_total" style="margin-left: 340px;"></span>
            <table class="table table-bordered party_table" id="party_table">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>PlotNo</th>
                        <th>Party Name</th>
                        <th>Payment Recieve</th>
                        <th>Donation</th>
                        <th style="width: 250px;">Reason</th>
                        <th>Feed Back</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th class="dispare">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="perdaytable1">
                </tbody>
                
     <tfoot>
        <tr>
            <td><button class='btn btn-print party_print' style="color: white; display:none">Print</button></td>
            <td></td>
            <td></td>
            <td class="recieve_total"></td>
            <td></td>
            <td></td>
            <td></td>
            <td id="party_total"></td>
            <td class="party_total"></td>
            <td class="party_hids dispare"></td>
        </tr>
    </tfoot>    
        </table>
       
    </div>

    </div>
<!-- Perday Form -->
<div class="perday-form">
<div class="signup-form">
    <form class="form-horizontal" id="perday_form" action=""  method="post" role="form">
        <h4><b>Add Perday Record</b></h4>
        	<hr>
               {{csrf_field()}}  
            <div class="form-group">
            <input type="text" list="plots" class="form-control pltno we" name="PlotNo" placeholder="Plot No" autocomplete="off">
            <datalist id="plots"  autocomplete="off">
				    @foreach($display as $diss)
				  <option value="{{$diss->Plot}}">{{$diss->Plot}}</option>
				  @endforeach
			</datalist>
        </div>
        <div class="form-group">
            <input placeholder="Items" name='Items' list="items" class="form-control item">
			<datalist id="items" >
			   @foreach($items as $item)
					<option value="{{ $item->Items }}">{{ $item->Items }}</option>
			   @endforeach
			</datalist>
        </div>
  	        <input type="hidden" class="form-control var" value="-1" name="var" placeholder="Quantity" >
  	        <input type="hidden" class="form-control varr" value="1" name="var" placeholder="Quantity" >
        <div class="form-group">
            <input type="text" class="form-control quantityy" name="Quantity" placeholder="Quantity" >
        </div>
        <div class="form-group">
            <input type="date" class="form-control datee" name="Date" placeholder="Date" >
        </div>    
	    <div class="form-group">
            <input type="text" class="form-control pricee" name="Price" placeholder="Price"  >
        </div> 
        <div class="form-group">
            <input type="submit" class="btn adp submit" style="background-color: #f50000; color: white;" name="addperday" value="Submit">
        </div>
    </form>
    <form class="edit_perday" action="" style="display: none"  method="post" role="form">
        <h4><b>Update Perday Record</b></h4>
        
        <hr>
               {{csrf_field()}}  
               
        <div class="form-group">
            <input type="text" list="plots" class="form-control update_pltno we" name="update_PlotNo" placeholder="Plot No" autocomplete="off">
            <input type="hidden" class="form-control update_id" name="update_id" placeholder="Plot No" autocomplete="off">
            <datalist id="plots"  autocomplete="off">
			    @foreach($display as $diss)
			  		<option value="{{$diss->Plot}}">{{$diss->Plot}}</option>
			  	@endforeach
			</datalist>
        </div>
        <div class="form-group">
            <input placeholder="Items" name='update_Items' list="items" class="form-control update_Items">

			<datalist id="items" >
			   @foreach($items as $item)
			   		<option value="{{ $item->Items }}">{{ $item->Items }}</option>
			   @endforeach
			</datalist>
        </div>
        	<input type="hidden" class="form-control var" value="-1" name="var" placeholder="Quantity" >
        	<input type="hidden" class="form-control varr" value="1" name="var" placeholder="Quantity" >
        <div class="form-group">
            <input type="text" class="form-control update_quantityy" name="update_Quantity" placeholder="Quantity" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_datee" name="update_Date" placeholder="Date" >
        </div>    
      	<div class="form-group">
            <input type="text" class="form-control update_pricee" name="update_Price" placeholder="Price"  >
        </div> 
        
        <div class="form-group">
            <input type="submit" class="btn adp submit" style="background-color: #f50000; color: white;" name="addperday" value="Submit">
        </div>





    </form>
    </div>
     <div class="table-wrapper">            
            <div class="table-title">
                <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                
                                <form  id="get_items" method="post" >
                                    {{ csrf_field() }}
                                <input type="hidden" class="form-control dummy_perday_search" name="dummy_plot_search" autocomplete="off">
                                </form>
                                <form action="" class="per_search"  method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                        
                                <input type="text"  list="plots" class="form-control perday_search perday_inputs" name="plot_search" placeholder="Plot Search&hellip;" autocomplete="off">
                                
                                <datalist id="plots"  autocomplete="off">
                                @foreach($display as $diss)
                                <option value="{{$diss->Plot}}">{{$diss->Plot}}</option>
                                @endforeach
                                </datalist>
                                <input type="text"  list="Items" style="width: 204px" class="form-control items_recieve" name="Items" placeholder="Items&hellip;" autocomplete="off">
                                
                                <datalist id="Items"  autocomplete="off">
                        
                                </datalist>
                                 </div>
                                 <div class="form-group" style="float: left;">
                                    
                                    <input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />

                                </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
         
            <span class="header_total" style="margin-left: 340px;"></span>
            <table class="table table-bordered perday_table" id="perday_tbl">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>PlotNo</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th class="perday_action dispare">Action</th>
                    </tr>
                </thead>
               {{--  <tbody class="perdaytable">
         </tbody>     --}}
    <tbody class="perdaytables">
</tbody>    
    <tfoot class="perday_footer">
        <tr>
            <td><button class='btn btn-print perday_print' style="color: white; display:none">Print</button></td>
            {{-- <td><button class='btn btn-print perday_action' style="color: white; display:none">Action</button></td> --}}
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ><span id="search_total"></span><span id="add_total"></span></td>
            <td class="dispare"></td>
        </tr>
    </tfoot>

        </table>
        
    </div>

    </div>
    



    <!-- Thekedar Form -->

    <div class="thekedar-form">
        <div class="signup-form">
    <form class="thekedar-forms" action=""  method="post" role="form">
        <h4><b>Thekedar Record</b>
         <select class="amou_t">
            <option>Total</option>
            <option>Amount</option>
          </select>
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" list="plot" class="form-control pltno" name="plots" placeholder="Plot No" required>
            
        </div>
        <div class="form-group">
            <input placeholder="Thekedar Name" name='thekedar_name' class="form-control item" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control amou_rec" name="payments_recieve" placeholder="Payment Recieve" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control tot_amo" name="totals_payment" placeholder="Total Payment" >
        </div>    
      <div class="form-group">
            <input type="date" class="form-control pricee datee" name="dates" placeholder="Date"  required>
        </div> 
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addthekedar" value="Submit">
        </div>

    </form>

    <form class="edit_thekedar" action="" style="display: none" method="post" role="form">
        <h4><b>Update Thekedar Record</b>
         {{-- <select class="amou_t">
            <option>Total</option>
            <option>Amount</option>
          </select> --}}
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" list="plot" class="form-control update_pltno" name="update_plots" placeholder="Plot No" required>
            <input type="hidden"  class="form-control update_id" name="update_id" placeholder="Plot No" required>
            
        </div>
        <div class="form-group">
            <input placeholder="Thekedar Name" name='update_thekedar_name' class="form-control update_thekedar_name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_payments_recieve" name="update_payments_recieve" placeholder="Payment Recieve" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_totals_payment" name="update_totals_payment" placeholder="Total Payment" >
        </div>    
      <div class="form-group">
            <input type="date" class="form-control update_dates" name="update_dates" placeholder="Date"  required>
        </div> 
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addthekedar" value="Submit">
        </div>

    </form>
    </div>
     <div class="table-wrapper">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                
                                <form action="" class="thekedar_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                       <input type="text" list="plots" class="form-control perday_search" name="plot_search" placeholder="Plot Search&hellip;" autocomplete="off">
                                        <datalist id="plots"  autocomplete="off">
                                @foreach($display as $diss)
                              <option value="{{$diss->Plot}}">{{$diss->Plot}}</option>
                              @endforeach
                            </datalist>
                               <input type="text" class="form-control perday_search" name="thekedar_name" placeholder="Name Search&hellip;"></div><div class="form-group" style="float: left;"><input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
        
            <span class="thekedar_header_total" style="margin-left: 340px;"></span>
            <table class="table table-bordered" id="thekedar_table">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>PlotNo</th>
                        <th>Thekedar Name</th>
                        <th>Payment Recieve</th>
                        <th>Total Payment</th>
                        <th>Date</th>
                        <th class="dispare">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="perdaytable2">
                </tbody>
                

    <tfoot>
        <tr>
            <td><button class='btn btn-print thekedar_print' style="color: white; display:none">Print</button></td>
            {{-- <td><button class='btn btn-print thekedar_action' style="color: white; display:none">Action</button></td> --}}
            <td></td>
            <td></td>
            <td id="total_recieve"></td>
            <td id="total_payment"></td>
            <td></td>
            <td class="party_hids dispare"></td>
        </tr>
    </tfoot>   
        </table>
        
    </div>

    </div>

    {{-- Office Module --}}

    <div class="office-form" style="display: none">
        <div class="signup-form">
    <form class="office-forms" action=""  method="post" role="form">
        <h4><b>Office Record</b>
        
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" class="form-control expense" name="expense" placeholder="Expense" required>
            
        </div>
        <div class="form-group">
            <input placeholder="Amount" name='amount' class="form-control amount" required>
        </div>
       <div class="form-group">
            <input type="date" class="form-control date datee" name="dates" placeholder="Date" required >
        </div> 
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addthekedar" value="Submit">
        </div>

    </form>

    <form class="edit_office" action="" style="display: none"  method="post" role="form">
        <h4><b>Office Record</b>
        
        </h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" class="form-control update_expense" name="update_expense" placeholder="Expense" required>
            <input type="hidden" class="form-control update_id" name="update_id" placeholder="Expense" required>
            
        </div>
        <div class="form-group">
            <input placeholder="Amount" name='update_amount' class="form-control update_amount" required>
        </div>
       <div class="form-group">
            <input type="date" class="form-control update_dates" name="update_dates" placeholder="Date" required >
        </div> 
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addthekedar" value="Submit">
        </div>

    </form>
    </div>
     <div class="table-wrapper">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                
                                <form action="" class="office_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                      <input type="date" class="form-control perday_search datee" name="dates" placeholder="Date&hellip;"></div>
                               <div class="form-group" style="float: left;">
                                <input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
        
            <span class="office_header_total" style="margin-left: 340px;"></span>
            <table class="table table-bordered" id="office_table">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>Expense</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th class="party_hids dispare">Action</th>
                        
                    </tr>
                </thead>
                <tbody class="office_perdaytable2">
                </tbody>
                <tbody class="office_perdaytable21">
                </tbody>

    <tfoot>
        <tr>
            <td><button class='btn btn-print office_print' style="color: white; display:none">Print</button></td>
            <td><button class='btn btn-print thekedar_action' style="color: white; display:none">Action</button></td>
            <td></td>
            <td></td>
            <td></td>
           
        </tr>
    </tfoot>    
         </table>
        
    </div>

    </div>
  
    <script type="text/javascript">
$(document).ready(function(){
$('.perday_inputs').change(function(e){
        $('.dummy_perday_search').val($('.perday_inputs').val());
        $( "#get_items").delay(100).submit();
     });
$( "#get_items").submit(function(e){
    e.preventDefault();
 $.ajax({
        type:'post',
        url:"{{url('get_itemss')}}",
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
        $.each(data, function(key, val) {
                $('#Items').append(
                    '<option value="'+val.Items+'">'+val.Items+'</option>'
                    );
            });
        },
    });
});
var now = new Date();

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

// $('#datePicker').val(today);
$('.datee').val(today);
  $( ".form-horizontal").submit(function(e){
    e.preventDefault();
    $('#perday_tbl').DataTable().destroy();
  // var aa=parseInt($('.var').val());
  // var aaa=parseInt($('.varr').val());
  //    var aaaa=aa+aaa;
  $.ajax({
        type:'post',

        url:'home',
         dataType:'json',
        data:$(this).serialize(),
        success:function(data){
          if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
                if(data=='item_empty'){
                    toastr.warning('Item Not Exist');
                    return false;
                }

        $('.perday_searchs').html('');
        $('.header_total').hide();
        $('.perdaytables').addClass('single_data');
        $('.perdaytables').removeClass('perday_searchs');
   
          if(data.errors){
            alert('Errors')
          }
 else{

   
      $('.perdaytables').append(
        '<tr>'+
        '<td class=id'+data.suc.id+'>'+data.suc.id+'</td>'+
                         '<td class=PlotNo'+data.suc.id+'>'+data.suc.PlotNo+'</td>'+
                         '<td class=Items'+data.suc.id+'>'+data.suc.Items+'</td>'+
                         '<td class=Quantity'+data.suc.id+'>'+data.suc.Quantity+'</td>'+
                         '<td class=Date'+data.suc.id+'>'+data.suc.Date+'</td>'+
                         '<td class="Price'+data.suc.id+'">'+data.suc.Price+'</td>'+
                         '<td class="perday_hid dispare">'+
                           '<a href="home/shows/'+data.suc.id+'" class="delete"'+
                            'title="Show"'+
                          'data-toggle="tooltip"><i'+ 
                          ' class="fas fa-eye-alt"></i></a>'+
                          '<a  class="editperday"'+
                          'title="Edit"'+
                          'data-toggle="tooltip"><i'+ 
                          ' class="fas fa-pencil-alt"></i></a>'+
                          '<a href="home/deletes/'+data.suc.id+'" class="delete"'+
                           'title="Delete"'+
                          'data-toggle="tooltip"><i class="fas fa-trash">'+
                          '</i></a>'+
                          '</td></tr>'
        );
        toastr.success('Success');
        $('#search_total').html('');
        var as=$('#add_total').html();
        if(as==''){
        var asd=parseInt(data.suc.Price);
        var asx=as+asd;
        $('#add_total').html(asx);
        }
        else{
          var assd=parseInt($('#add_total').html());
           var asd=parseInt(data.suc.Price);
        var asx=assd+asd;
        $('#add_total').html(asx);
        }
       }$('#perday_tbl').DataTable();
       $('.editperday').click(function() {
                        // alert(val.Date);return false;s
                        $('#perday_form').hide();
                        $('.edit_perday').show();
                        $('.update_id').val(data.suc.id);
                        $('.update_Items').val(data.suc.Items);
                        $('.update_pltno').val(data.suc.PlotNo);
                        $('.update_quantityy').val(data.suc.Quantity);
                        $('.update_datee').val(data.suc.Date);
                        $('.update_pricee').val(data.suc.Price);
                        $('.id'+val.id).css('background-color','yellow');
                        $('.PlotNo'+data.data.id).css('background-color','yellow');
                        $('.Items'+data.data.id).css('background-color','yellow');
                        $('.Quantity'+data.data.id).css('background-color','yellow');
                        $('.Date'+data.data.id).css('background-color','yellow');
                        $('.Price'+data.data.id).css('background-color','yellow');
                    });
       


        },
         
      });
    });
  });
      $( ".edit_perday").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',

        url:'perday_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
          if(data=='empty'){
                    toastr.warning('Plot Not Exist');
                    return false;
                }
          if(data=='item_empty'){
                    toastr.warning('Item Not Exist');
                    return false;
                }
            $('.PlotNo'+data.data.id).html(data.data.PlotNo);
            $('.Items'+data.data.id).html(data.data.Items);
            $('.Quantity'+data.data.id).html(data.data.Quantity);
            $('.Date'+data.data.id).html(data.data.Date);
            $('.Price'+data.data.id).html(data.data.Price);
            $('.header_total').html('Total:'+data.total);
            $('#add_total').html('Total:'+data.total);
            $('td').css('background-color','white');
            toastr.success('Updated');
        },
        
    });


     $('.perday_inputs').keyup(function(){
        alert('asd');
     });

 });
</script>
@endsection

