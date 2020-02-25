@extends('layouts.app')
@section('title','CD')
@section('content')
<select class="form-control forms_selections" style="width: 150px;" >
        <option value="client-form" >Create Form</option>
        <option  value="purchase-form" >Purchase Form</option>
</select>
    <!-- Client Form -->
<div class="client-form">
        <div class="signup-form">
    <form class="client_form" id="client_form" action=""  method="post" role="form">
        <h4><b>Client Record</b>
        </h4>
        <hr>
               {{csrf_field()}}  
    <div class="form-group">
        <input placeholder="Name" name='client_name'  class="form-control client_name" autocomplete="off" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control shop_name" name="shop_name" placeholder="Shop Name" >
    </div>
    <div class="form-group">
        <input type="text" class="form-control mobile_no" name="mobile_number" placeholder="Mobile Number" >
    </div>
    <div class="form-group">
        <input type="submit" style="background-color: #f50000; color:white;" class="btn" name="addcreate" value="Submit">
    </div>

    </form>
    <form class="edit_client" action="" style="display: none"  method="post" role="form">
        <h4><b>Update Client Record</b>
        </h4>
        <hr>
               {{csrf_field()}}  
        <div class="form-group">
            <input type="hidden"  class="form-control update_id" name="update_id" placeholder="id" autocomplete="off" required>
        </div>
        <div class="form-group">
            <input placeholder="Client Name" name='update_client_name'  class="form-control update_client_name" autocomplete="off" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_shop_name" name="update_shop_name" placeholder="Company Name" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_mobile_no" name="update_mobile_number" placeholder="Mobile Number" >
        </div>
        <div class="form-group">
            <input type="submit" style="background-color: #f50000; width: 100%;color:white;" class="btn" name="addparty" value="Submit">
            <input style="background-color: #f50000; width: 100%;margin-top:5px;color:white;" class="btn" name="addparty" value="Cancel">
        </div>

    </form>
    </div>
     <div class="table-wrapper client_table" style="width: 1073px !important; ">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                <form action="" class="party_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                <input type="text" class="form-control client_search" name="client_name" placeholder="Name Search&hellip;"></div><div class="form-group" style="float: left;"><input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                  
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        
            <span class="party_header_total" style="margin-left: 340px;"></span>
            <table class="table table-bordered client_table" id="client_table">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Shop Name</th>
                        <th>Mobile Number</th>
                        <th class="dispare">Action</th>
                    </tr>
                </thead>
                <tbody class="client_body">
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <td><button class='btn btn-print party_print' style="color: white; display:none">Print</button></td>
                        <td></td>
                        <td></td>
                        <td class="recieve_total"></td>
                        <td></td>
                    </tr>
                </tfoot>   -->  
            </table>
       
    </div>

    </div>
<!-- Purchase Form -->
<div class="purchase-form" style="display: none">
<div class="signup-form">
    <form class="form-horizontal" id="perday_form" action=""  method="post" role="form">
        <h4><b>Purchase Record</b></h4>
            <div class="form-group">
                  <select class="amou form-control">
                    <option>Purchase</option>
                    <option>Payment</option>
                  </select>
            </div>
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
    <form class="edit_client" action="" style="display: none"  method="post" role="form">
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
 
    
    </div>
  
    <script type="text/javascript">
$(document).ready(function(){
    // $('.forms_selection').val('Create Form');
    $('.forms_selections').on('change', function() {

        $value = $(this).val();
        if ($value == "client-form") {
            $('.purchase-form').hide();
            $('.client-form').fadeIn(500);
        }

        if ($value == "purchase-form") {
            $('.client-form').hide();
            $('.purchase-form').fadeIn(500);
        }
    });
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
  $( "#client_form").submit(function(e){
    e.preventDefault();
    $('#client_table').DataTable().destroy();
  // var aa=parseInt($('.var').val());
  // var aaa=parseInt($('.varr').val());
  //    var aaaa=aa+aaa;
  $.ajax({
        type:'post',

        url:'add_client',
         dataType:'json',
        data:$(this).serialize(),
        success:function(data){
          if(data=='already_exist'){
                    toastr.warning('Client Already Exist');
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
      $('.client_body').append(
                '<tr id=row'+data.suc.id+'>'+
                         '<td class=id'+data.suc.id+'>'+data.suc.id+'</td>'+
                         '<td class=client_name'+data.suc.id+'>'+data.suc.client_name+'</td>'+
                         '<td class=shop_name'+data.suc.id+'>'+data.suc.shop_name+'</td>'+
                         '<td class=mobile_no'+data.suc.id+'>'+data.suc.mobile_number+'</td>'+
                         '<td class="perday_hid dispare">'+
                          //  '<a href="home/shows/'+data.suc.id+'" class="delete"'+
                          //   'title="Show"'+
                          // 'data-toggle="tooltip"><i'+ 
                          // ' class="fas fa-eye-alt"></i></a>'+
                          '<a  class=editclient'+data.suc.id+' title="Edit"'+
                          'data-toggle="tooltip"><i'+ 
                          ' class="fas fa-pencil-alt"></i></a>'+
                          '<a class=delete_client'+data.suc.id+
                           ' title="Delete"'+
                          'data-toggle="tooltip"><i class="fas fa-trash">'+
                          '</i></a>'+
                          '</td>'+
                '</tr>'
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
       }
       $('#perday_tbl').DataTable();
       $('.editclient'+data.suc.id).click(function() {
                        // alert('val.Date');return false;
                        $('#client_form').hide();
                        $('.edit_client').show();
                        console.log(data.suc.client_name)
                        $('.update_id').val(data.suc.id);
                        $('.update_client_name').val(data.suc.client_name);
                        $('.update_shop_name').val(data.suc.shop_name);
                        $('.update_mobile_no').val(data.suc.mobile_number);
                    });
       $('.delete_client'+data.suc.id).click(function(e){
        e.preventDefault();
        $('#row'+data.suc.id).fadeOut(200);
       $.ajax({
            type:'get',
            url:'delete_client/'+data.suc.id,
            dataType:'json',
            success:function(data){
            toastr.warning('Delete Successfully');

        }
        });
   });
        },
      });
    });
  });
      $( ".edit_client").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',
        url:'client_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
          if(data=='already_exist'){
                    toastr.warning('Client Name Already Exist');
                    return false;
                }
            $('.client_name'+data.data.id).html(data.data.client_name);
            $('.shop_name'+data.data.id).html(data.data.shop_name);
            $('.mobile_no'+data.data.id).html(data.data.mobile_number);
            toastr.success('Updated');
        },
        
    });


     $('.perday_inputs').keyup(function(){
        alert('asd');
     });

 });
</script>
@endsection

