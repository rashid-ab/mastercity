@extends('layouts.app')
@section('title','Items')
@section('content')


    <div class="signup-form">
    <form    method="post" role="form">
        <h4><b>Add Plot</b></h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" class="form-control plot" name="Plot" placeholder="Plot No" value="" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control plot-category" name="Category" placeholder="Category" value="" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control block" value="" name="Block" placeholder="Block" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control block" value="" name="Name" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="plotform" class="btn btn-primary btn-lg">Add</button>
        </div>
    </form>
    
    </div>

	@endsection