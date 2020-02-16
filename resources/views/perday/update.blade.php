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
        	<input type="text" list="plots" class="form-control pltno" name="PlotNo" placeholder="Plot No" value="{{$dis->PlotNo}}" required="required">
        	
        </div>
        <div class="form-group">
        	<input placeholder="Items" value="{{$dis->Items}}" name='Items' list="items" class="form-control">


	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control quantityy" name="Quantity" placeholder="Quantity" value="{{$dis->Quantity}}" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control datee" name="Date" placeholder="Date" value="{{$dis->Date}}" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control timee" name="Time" placeholder="Time" value="{{$dis->Time}}" required="required">
        </div>       

      <div class="form-group">
            <input type="text" class="form-control pricee" name="Price" placeholder="Price" value="{{$dis->Price}}" required="required">
        </div> 
		<div class="form-group">
            <button type="submit" name="perday" class="btn btn-primary btn-lg">Update</button>
        </div>
    </form>
	</div>
	@endsection