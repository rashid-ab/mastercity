@extends('layouts.app')
@section('title','Plots')
@section('content')
<div class="items-div">

<div class="plot-div">
    <div class="signup-form">
    <form    method="post" role="form">
        <h4><b>Add Plot</b></h4>
        
        <hr>
               {{csrf_field()}}  
               
                <div class="form-group">
            <input type="text" class="form-control plot" name="Plot" placeholder="Plot No" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control plot-category" name="Category" placeholder="Category" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control block" name="Block" placeholder="Block" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control name" name="Name" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="plotform" class="btn btn-primary btn-lg">Add</button>
        </div>
    </form>
    
    </div>
     <div class="table-wrapper">            
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                             
                    </div>
                    <div class="col-sm-4">
                        <h2 class="text-center">Customer <b>Details</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PlotNo <i class="fa fa-sort"></i></th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($display as $dis)
                    <td>{{$dis->id}}</td>
                    <td>{{$dis->Plot}}</td>
                    <td>{{$dis->Name}}</td>
                   
                        <td>
                           
                            <a href="{{url('/items/plotupdate/'.$dis->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="{{url('/items/deletes/'.$dis->id)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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