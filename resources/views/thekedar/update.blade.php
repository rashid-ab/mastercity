@extends('layouts.app')
@section('title','Perday')
@section('content')
<div class="signup-form">
    <form  method="post" role="form">
		<h4><b>Add Perday Record</b></h4>
		
		<hr>
               {{csrf_field()}}  
               
				<div class="form-group">
        	<input type="text" list="plots" class="form-control pltno" name="id" placeholder="Plot No" value="{{$dis->id}}" required="required">
        	
        </div>
				<div class="form-group">
        	<input type="text" list="plots" class="form-control pltno" name="plots" placeholder="Plot No" value="{{$dis->plots}}" required="required">
        	
        </div>
        <div class="form-group">
        	<input placeholder="Name" value="{{$dis->thekedar_name}}" name='thekedar_name' list="items" class="form-control">


	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control quantityy" name="payments_recieve" placeholder="Payment Recieve" value="{{$dis->payments_recieve}}" >
        </div>
		<div class="form-group">
            <input type="text" class="form-control datee" name="totals_payment" placeholder="Total Payment" value="{{$dis->totals_payment}}" >
        </div>
		<div class="form-group">
            <input type="text" class="form-control timee" name="dates" placeholder="Date" value="{{$dis->dates}}" required="required">
        </div>       

      <div class="form-group">
            <input type="text" class="form-control pricee" name="times" placeholder="Time" value="{{$dis->times}}" required="required">
        </div> 
		<div class="form-group">
            <button type="submit" name="perday" class="btn btn-primary btn-lg">Update</button>
        </div>
    </form>
	</div>
	@endsection