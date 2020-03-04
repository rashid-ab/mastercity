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
            <input type="submit" style="background-color: #f50000; width: 100%;color:white;" class="btn" name="addparty" value="Update">
            <input style="background-color: #f50000; width: 100%;margin-top:5px;color:white;" class="btn cancel" name="addparty" value="Cancel">
        </div>

    </form>
    </div>
     <div class="table-wrapper client_table" style="width: 1073px !important; ">            
            <div class="table-title">
               <div class="">
                        <div class="search-box">
                            <div class="input-group" >
                                <form action="" class="client_search" method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                <input type="text" list="clients_list" class="form-control client_search" name="client_name" placeholder="Name Search&hellip;"></div><div class="form-group" style="float: left;"><input type="submit" class="btn btn-danger" style="background: #f50000;border-radius: 5px;"  />
                                <datalist id="clients_list"  autocomplete="off">
                                    @foreach($clients as $client)
                                        <option value="{{$client->client_name}}" autocomplete="off">{{$client->client_name}}</option>
                                    @endforeach
                                </datalist>
                                  
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
    <form class="cd_form" id="cd_form" action=""  method="post" role="form">
        <h4><b>Purchase Record</b></h4>
            <div class="form-group">
                  <select name='category' class="cd_type">
                        <option value="Purchase">Purchase</option>
                        <option value="Payment">Payment</option>
                  </select>
            </div>
        	   <hr>
               {{csrf_field()}} 
        <div class="form-group">
            <input type="text" list="client_name" class="form-control client_name" name="client_name" placeholder="Client Name" autocomplete="off">
            <datalist id="client_name"  autocomplete="off">
            </datalist>
        </div> 
        <div class="form-group">
            <input type="text" list="plots" class="form-control plotno" name="PlotNo" placeholder="Plot No" autocomplete="off">
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
  	    <div class="form-group">
            <input type="text" class="form-control quantity" name="Quantity" placeholder="Quantity" >
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
    <form class="edit_cd" action="" style="display: none"  method="post" role="form">
        <h4><b>Update Perday Record</b></h4>
        <select class="updated_cd_type" name="category">
        </select>
        <hr>
               {{csrf_field()}}  
        <div class="form-group">
            <input type="text" class="form-control update_client_name" name="update_client_name" placeholder="Client Name" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" list="plots" class="form-control update_PlotNo we" name="update_PlotNo" placeholder="Plot No" autocomplete="off">
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
        	<div class="form-group">
            <input type="text" class="form-control update_Quantity" name="update_Quantity" placeholder="Quantity" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control update_Date" name="update_Date" placeholder="Date" >
        </div>    
      	<div class="form-group">
            <input type="text" class="form-control update_Price" name="update_Price" placeholder="Price"  >
        </div> 
        
        <div class="form-group">
            <input type="submit" class="btn adp submit" style="background-color: #f50000; color: white;" name="addperday" value="Submit">
            <input class="btn cd_cancel submit" style="background-color: #f50000;width:50%;margin-top: 5px; color: white;" name="addperday" value="Cancel">
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
                                <form action="" class="cd_search"  method="post" accept-charset="utf-8">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="float: left;">
                                        
                                <input type="text"  list="clients_name" style="width: 204px" class="form-control items_recieve" name="client_name" placeholder="Client Name&hellip;" autocomplete="off">
                                
                                <datalist id="clients_name"  autocomplete="off">
                                     @foreach($clients as $client_name)
                                <option value="{{$client_name->client_name}}">{{$client_name->client_name}}</option>
                                @endforeach
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
            <table class="table table-bordered cd_table" id="cd_tbl">
                <thead>
                    <tr class="table_bottom">
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>PlotNo</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance</th>
                        <th class="perday_action dispare">Action</th>
                    </tr>
                </thead>
            <tbody class="cd_body">
            </tbody>    
            <tfoot class="cd_footer">
                <tr>
                    <td><button class='btn btn-print perday_print' style="color: white; display:none">Print</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td ><span id="search_credit"></span><span id="credit_total"></span></td>
                    <td class="dispare"><span id="search_debit"></span><span id="debit_total"></span></td>
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
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        $('.datee').val(today);
        $.ajax({
        type:'get',
        url:"{{url('get_clients')}}",
        success:function(data){
            console.log(data);
        $.each(data, function(key, val) {

                $('#client_name').append(
                    '<option value="'+val.client_name+'">'+val.client_name+'</option>'
                    );
            });
        },
    });

        $('.cd_search').submit(function(e) {

        e.preventDefault();
        $('.cd_table').DataTable().destroy();
        $.ajax({
            type: 'post',
            url: 'cd_search',
            data: $(this).serialize(),
            success: function(data) {
                
                $('.cd_body').html('');
                $.each(data.suc, function(key, data) {
                if(data.credit=="undefined" || data.credit=="undefined"){
                    data.credit=0;
                }
                if(data.debit=="undefined"){
                    data.debit=0;
                }
                $('.cd_body').append(
                '<tr id=row'+data.id+'>'+
                         '<td class=id'+data.id+'>'+data.id+'</td>'+
                         '<td class=client_name'+data.id+'>'+data.client_name+'</td>'+
                         '<td class=PlotNo'+data.id+'>'+data.PlotNo+'</td>'+
                         '<td class=Items'+data.id+'>'+data.Items+'</td>'+
                         '<td class=Quantity'+data.id+'>'+data.Quantity+'</td>'+
                         '<td class=Date'+data.id+'>'+data.Date+'</td>'+
                         '<td class=credit'+data.id+'>'+data.credit+'</td>'+
                         '<td class=debit'+data.id+'>'+data.debit+'</td>'+
                         '<td class="perday_hid dispare">'+
                              '<a  class=editcd'+data.id+' title="Edit"'+
                              'data-toggle="tooltip"><i'+ 
                              ' class="fas fa-pencil-alt"></i></a>'+
                              '<a class=delete_cd'+data.id+
                               ' title="Delete"'+
                              'data-toggle="tooltip"><i class="fas fa-trash">'+
                              '</i></a>'+
                          '</td>'+
                '</tr>'
        );
                    $('.editcd'+data.id).click(function() {
                        // alert('val.Date');return false;
                        $('#cd_form').hide();
                        $('.edit_cd').show();
                        $('.update_id').val(data.id);
                        $('.update_client_name').val(data.client_name);
                        $('.update_PlotNo').val(data.PlotNo);
                        if(data.credit != undefined){
                        $('.update_Items').val(data.Items);
                        $('.update_Quantity').val(data.Quantity);
                        }
                        $('.update_Date').val(data.Date);
                        if(data.credit != undefined){
                            $('.update_Price').val(data.credit);
                            $('.updated_cd_type').html('');
                            $('.updated_cd_type').append(
                            '<option value="Purchase">Purchase</option>'
                            );
                            $('.update_Items').show();
                            $('.update_Quantity').show();
                        }
                        if(data.debit != undefined){
                            $('.update_Price').val(data.debit);
                            $('.updated_cd_type').html('');
                            $('.updated_cd_type').append(
                            '<option value="Payment">Payment</option>'
                            );
                            $('.update_Items').hide();
                            $('.update_Quantity').hide();
                        }
                    });
                    
                });
                var creditTotal = 0;
            // $(".cd_body td:nth-child(7)").each(function () {
            // var credit_value=$(this).text();

            //     if(credit_value=="undefined" || !isNaN(credit_value)){
            //     credit_value=credit_value.replace("undefined","0");
            // }
            // // var credit_val = credit_value.replace(" ", "").replace(",-", "");
            // creditTotal += parseInt(credit_value);
            // console.log(creditTotal);
            // });
            // $('#credit_total').html(creditTotal);
            // var debitTotal = 0;
            // $(".cd_body td:nth-child(8)").each(function () {
            //     var debit_value=$(this).text();
            //     if($(this).text()=="undefined" || $(this).text()=="null" || !isNan(debit_value)){
            //     debit_value=debit_value.replace("undefined","0");
            // }
            // // var debit_val = debit_value.replace(" ", "").replace(",-", "");
            // debitTotal += parseInt(debit_value);
            // });
            // $('#debit_total').html(debitTotal);
       $('.delete_client'+data.suc.id).click(function(e){
        e.preventDefault();
        $('#row'+data.suc.id).fadeOut(200);
       $.ajax({
            type:'get',
            url:'delete_cd/'+data.suc.id,
            dataType:'json',
            success:function(data){
            toastr.warning('Delete Successfully');

        }
        });
   });
 $( ".edit_cd").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',
        url:'cd_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
            $('.client_name'+data.data.id).html(data.data.client_name);
            $('.PlotNo'+data.data.id).html(data.data.PlotNo);
            $('.Date'+data.data.id).html(data.data.Date);
            if(data.data.credit!=undefined){
                $('.credit'+data.data.id).html(data.data.credit);
                $('.Items'+data.data.id).html(data.data.Items);
                $('.Quantity'+data.data.id).html(data.data.Quantity);
                var creditTotal = 0;
            $(".cd_body td:nth-child(7)").each(function () {
            var value=$(this).text();
                if($(this).text()=="undefined"){
                value=value.replace("undefined","0");
            }
            var val = value.replace(" ", "").replace(",-", "");
            creditTotal += parseInt(val);
            });
            $('#credit_total').html(creditTotal);
            }
            if(data.data.debit!=undefined){
                $('.debit'+data.data.id).html(data.data.debit);
                var debitTotal = 0;
            $(".cd_body td:nth-child(8)").each(function () {
                var value=$(this).text();
                if($(this).text()=="undefined"){
                value=value.replace("undefined","0");
            }
            var val = value.replace(" ", "").replace(",-", "");
            debitTotal += parseInt(val);
            });
            $('#debit_total').html(debitTotal);
            }
            toastr.success('Updated');
            $('#cd_form').show();
            $('.edit_cd').hide();
        },
        
    });

    
 });
 var table=$('.cd_table').DataTable();
 table.columns( 6 ).every( function () {
    var sum = this
        .data()
        .reduce( function (a,b) {
            // if(b!="undefined" || b!="null"){
            return parseInt(a) + parseInt(b);
            // }
        } );
        $("#credit_total").html(sum);
  
} );
 table.columns( 7 ).every( function () {
    var sum = this
        .data()
        .reduce( function (a,b) {
            // if(b!="undefined" || b!="null"){
            return parseInt(a) + parseInt(b);
            // }
        } );
        $("#debit_total").html(sum);
  
} );
       

            },

        });

    });
    
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
     $('.cd_type').on('change', function() {

        $value = $(this).val();
        if ($value == "Payment") {
            console.log($(this).attr("name"));
            $('.item').hide();
            $('.quantity').hide();
            // $( '#cd_form' ).each(function(){
            //     // if($('input[name!="Date"]')){
            //         console.log('asd');
            //     this.reset();
            //     // }
            // });
        }

        if ($value == "Purchase") {
            console.log($(this).attr("name"));
            $('.item').show();
            $('.quantity').show();
            // $( '#cd_form' ).each(function(){
            //     if($('input[name!="Date"]')){
            //         console.log('asd')
            //     this.reset();
            //     }
            // });
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

//Client Ajax
    $('.cancel').click(function(){
        $('#client_form').show();
        $('.edit_client').hide();
    });
    $('.cd_cancel').click(function(){
        $('#cd_form').show();
        $('.edit_cd').hide();
    })
  $( "#client_form").submit(function(e){
    e.preventDefault();
    $('#client_table').DataTable().destroy();
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
                          '<a class=delete_cd'+data.suc.id+
                           ' title="Delete"'+
                          'data-toggle="tooltip"><i class="fas fa-trash">'+
                          '</i></a>'+
                          '</td>'+
                '</tr>'
        );
        toastr.success('Success');
        $('#client_name').empty();
        $.each(data.clients, function(key, val) {

                $('#client_name').append(
                    '<option value="'+val.client_name+'">'+val.client_name+'</option>'
                    );
            });
       }
       $('#perday_tbl').DataTable();
       $('.editclient'+data.suc.id).click(function() {
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
});



$( ".client_search").submit(function(e){
    e.preventDefault();
    $('#client_table').DataTable().destroy();
  $.ajax({
        type:'post',

        url:'client_search',
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
                '<tr id=row'+data.id+'>'+
                         '<td class=id'+data.id+'>'+data.id+'</td>'+
                         '<td class=client_name'+data.id+'>'+data.client_name+'</td>'+
                         '<td class=shop_name'+data.id+'>'+data.shop_name+'</td>'+
                         '<td class=mobile_no'+data.id+'>'+data.mobile_number+'</td>'+
                         '<td class="perday_hid dispare">'+
                          //  '<a href="home/shows/'+data.suc.id+'" class="delete"'+
                          //   'title="Show"'+
                          // 'data-toggle="tooltip"><i'+ 
                          // ' class="fas fa-eye-alt"></i></a>'+
                          '<a  class=editclient'+data.id+' title="Edit"'+
                          'data-toggle="tooltip"><i'+ 
                          ' class="fas fa-pencil-alt"></i></a>'+
                          '<a class=delete_cd'+data.id+
                           ' title="Delete"'+
                          'data-toggle="tooltip"><i class="fas fa-trash">'+
                          '</i></a>'+
                          '</td>'+
                '</tr>'
        );
        toastr.success('Success');
        $('#client_name').empty();
       }
       $('#client_table').DataTable();
       $('.editclient'+data.id).click(function() {
                        $('#client_form').hide();
                        $('.edit_client').show();
                        console.log(data.client_name)
                        $('.update_id').val(data.id);
                        $('.update_client_name').val(data.client_name);
                        $('.update_shop_name').val(data.shop_name);
                        $('.update_mobile_no').val(data.mobile_number);
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
  // });
     

//CD Ajax
// function clients(){
        
    


  $("#cd_form").submit(function(e){
    e.preventDefault();
    $('#cd_table').DataTable().destroy();
  $.ajax({
        type:'post',
        url:'add_cd',
         dataType:'json',
        data:$(this).serialize(),
        success:function(data){
        $('.perday_searchs').html('');
        if(data.errors){
            alert('Errors')
          }
 else{
    if(data.suc.credit=="undefined" || data.suc.credit==undefined){
                    data.suc.credit=0;
                }
                if(data.suc.debit=="undefined" || data.suc.debit==undefined){
                    data.suc.debit=0;
                }
      $('.cd_body').append(
                '<tr id=row'+data.suc.id+'>'+
                         '<td class=id'+data.suc.id+'>'+data.suc.id+'</td>'+
                         '<td class=client_name'+data.suc.id+'>'+data.suc.client_name+'</td>'+
                         '<td class=PlotNo'+data.suc.id+'>'+data.suc.PlotNo+'</td>'+
                         '<td class=Items'+data.suc.id+'>'+data.suc.Items+'</td>'+
                         '<td class=Quantity'+data.suc.id+'>'+data.suc.Quantity+'</td>'+
                         '<td class=Date'+data.suc.id+'>'+data.suc.Date+'</td>'+
                         '<td class=credit'+data.suc.id+'>'+data.suc.credit+'</td>'+
                         '<td class=debit'+data.suc.id+'>'+data.suc.debit+'</td>'+
                         '<td class=balance'+data.suc.id+'>'+data.suc.balance+'</td>'+
                         '<td class="perday_hid dispare">'+
                              '<a  class=editcd'+data.suc.id+' title="Edit"'+
                              'data-toggle="tooltip"><i'+ 
                              ' class="fas fa-pencil-alt"></i></a>'+
                              '<a class=delete_cd'+data.suc.id+
                               ' title="Delete"'+
                              'data-toggle="tooltip"><i class="fas fa-trash">'+
                              '</i></a>'+
                          '</td>'+
                '</tr>'
        );
          
          
           
        toastr.success('Success');
        $('#search_total').html('');
       }
       $('.editcd'+data.suc.id).click(function() {
        console.log($('tr > td:nth-child(8)').nextAll().text());
                        // alert('val.Date');return false;
                        $('#cd_form').hide();
                        $('.edit_cd').show();
                        $('.update_id').val(data.suc.id);
                        $('.update_client_name').val(data.suc.client_name);
                        $('.update_PlotNo').val(data.suc.PlotNo);
                        if(data.suc.credit != undefined){
                        $('.update_Items').val(data.suc.Items);
                        $('.update_Quantity').val(data.suc.Quantity);
                        }
                        $('.update_Date').val(data.suc.Date);
                        if(data.suc.credit != undefined){
                            $('.update_Price').val(data.suc.credit);
                            $('.updated_cd_type').html('');
                            $('.updated_cd_type').append(
                            '<option value="Purchase">Purchase</option>'
                            );
                            $('.update_Items').show();
                            $('.update_Quantity').show();
                        }
                        if(data.suc.debit != undefined){
                            $('.update_Price').val(data.suc.debit);
                            $('.updated_cd_type').html('');
                            $('.updated_cd_type').append(
                            '<option value="Payment">Payment</option>'
                            );
                            $('.update_Items').hide();
                            $('.update_Quantity').hide();
                        }
                    });
       $('.delete_cd'+data.suc.id).click(function(e){
        e.preventDefault();
        $('#row'+data.suc.id).fadeOut(200);
       $.ajax({
            type:'get',
            url:'delete_cd/'+data.suc.id,
            dataType:'json',
            success:function(data){
            toastr.warning('Delete Successfully');

        }
        });
   });
       var table=$('.cd_table').DataTable();
         table.columns( 6 ).every( function () {
            var sum = this
                .data()
                .reduce( function (a,b) {
                    // if(b!="undefined" || b!="null"){
                    return parseInt(a) + parseInt(b);
                    // }
                } );
                $("#credit_total").html(sum);
          });
         table.columns( 7 ).every( function () {
            var sum = this
                .data()
                .reduce( function (a,b) {
                    // if(b!="undefined" || b!="null"){
                    return parseInt(a) + parseInt(b);
                    // }
                } );
                $("#debit_total").html(sum);
          });
        },
      });
   
  
      $( ".edit_cd").submit(function(e){
    e.preventDefault();
     $.ajax({
        type:'post',
        url:'cd_update',
        dataType:'json',
        data:$(this).serialize(),
        success:function(data){
            $('.client_name'+data.data.id).html(data.data.client_name);
            $('.PlotNo'+data.data.id).html(data.data.PlotNo);
            $('.Date'+data.data.id).html(data.data.Date);
            if(data.data.credit!=undefined){
                $('.credit'+data.data.id).html(data.data.credit);
                $('.Items'+data.data.id).html(data.data.Items);
                $('.Quantity'+data.data.id).html(data.data.Quantity);
                
            }
            if(data.data.debit!=undefined){
                $('.debit'+data.data.id).html(data.data.debit);
                
            }
            toastr.success('Updated');
            $('#cd_form').show();
            $('.edit_cd').hide();
        },
        
    });

    
 });
});
</script>
@endsection

