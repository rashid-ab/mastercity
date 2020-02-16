@extends('layouts.app')
@section('title','Items')
@section('content')
<div class="items-div">

<div class="plot-div">
    <div class="signup-form">
    <form  method="post" role="form">
        <h4><b>Update Item</b></h4>
        
        <hr>
               {{csrf_field()}}  
               
        <div class="form-group">
            <input type="hidden" class="form-control plot" name="id"value="{{$item->id}}" placeholder="ID" required="required">
            <input type="text" class="form-control plot" name="items"value="{{$item->Items}}" placeholder="Item" required="required">
        </div>
         
        <div class="form-group">
            <button type="submit" name="plotform" class="btn btn-primary btn-lg">Update Item</button>
        </div>
    </form>
    
    </div>
     </div>
   </div>
   <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    // Animate select box length
    var searchInput = $(".search-box input");
    var inputGroup = $(".search-box .input-group");
    var boxWidth = inputGroup.width();
    searchInput.focus(function(){
        inputGroup.animate({
            width: "300"
        });
    }).blur(function(){
        inputGroup.animate({
            width: boxWidth
        });
    });
});
</script>
	@endsection