@extends('layouts.app')
@section('title','Items')
@section('content')
<div class="items-div">
<div class="signup-form">
    <form   method="post" role="form">
		<h4><b>Update Items</b></h4>
		
		<hr>
               {{csrf_field()}}  
               <div class="form-group">
            <input type="text" class="form-control item-items" name="id" placeholder="ID" value="{{$edited->id}}" required="required">
        </div>
				<div class="form-group">
        	<input type="text" value="{{$edited->Items}}" class="form-control item-items" name="Items" placeholder="Items"  required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="itemsform" class="btn btn-primary btn-lg">Update</button>
        </div>
    </form>
    
	</div>
   
            
	@endsection