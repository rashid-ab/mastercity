@extends('layouts.app')
@section('title','Items')
@section('content')
<div class="items-div">

<div class="plot-div">
    <div class="signup-form">
    <form  method="post" class="items" role="form">
        <h4><b>Add Item</b></h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" class="form-control plot" name="items" placeholder="Item" required="required">
        </div>
         
        <div class="form-group">
            <button type="submit" name="plotform" class="btn btn-primary btn-lg">Add Item</button>
        </div>
    </form>
    
    </div>
     <div class="table-wrapper">            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item <i class="fa fa-sort"></i></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($display as $dis)
                    <td>{{$dis->id}}</td>
                    <td>{{$dis->Items}}</td>
                    <td>
                           
                            <a href="{{url('/edit_item/'.$dis->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="{{url('/delete_items/'.$dis->id)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>   
                    @endforeach     
                </tbody>
            </table>
            {{$display->links()}}
        </div>
   </div>
   <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.items').submit(function(e){
 e.preventDefault();
        $.ajax({
        type:'post',

        url:'get_item',
         dataType:'json',
        data:$(this).serialize(),
        success:function(data){
          if(data=='have'){
                    e.preventDefault();
                }
});
    });
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