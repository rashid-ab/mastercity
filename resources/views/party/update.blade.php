@extends('layouts.app')
@section('title','Perday')
@section('content')
<div class="signup-form">
    <form  method="post" role="form">
		<h4><b>Add Perday Record</b></h4>
		
		<hr>
               {{csrf_field()}}  
               
				<div class="form-group">
        	<input type="text" list="plots" class="form-control pltno" name="id" placeholder="ID" value="{{$dis->id}}" required="required">
        	
        </div>
				<div class="form-group">
        	<input type="text" list="plots" class="form-control pltno" name="plot" placeholder="Plot No" value="{{$dis->plot}}" required="required">
        	
        </div>
        <div class="form-group">
        	<input placeholder="Name" value="{{$dis->client_name}}" name='client_name' list="items" class="form-control">
    </div>
        <div class="form-group">
        	<input type="text" class="form-control quantityy" name="payment_recieved" placeholder="Payment Recieved" value="{{$dis->payment_recieve}}" >
        </div>
		<div class="form-group">
            <input type="text" class="form-control datee" name="total_payment" placeholder="Total Payment" value="{{$dis->total_payment}}" >
        </div>
		<div class="form-group">
            <input type="text" class="form-control timee" name="date" placeholder="Date" value="{{$dis->date}}" required="required">
        </div>       

      <div class="form-group">
            <input type="text" class="form-control pricee" name="time" placeholder="Time" value="{{$dis->time}}" required="required">
        </div> 
        <div class="form-group">
            <button type="submit" name="party" class="btn btn-primary btn-lg">Update</button>
        </div>
		
    </form>
	</div>
	@endsection