@extends('layouts.app')
@section('title','Master')
@section('content')
<div class="container">
   <!--  <div class="form-group">
        <label for="search">Search Data</label>
        <input type="text" class="form-control" name="search" id="search">

    </div> -->
            <table class="table table-bordered" id="master_table">
                <thead>
                    <tr>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>PlotNo <i class="fa fa-sort"></i></th>
                        <th>Recievable Amount</th>
                        <th>Total Expenses</th>
                        <th>Date</th>
                        <th>Benefit</th>
                    </tr>
                </thead>
                <tbody>
                   
				@foreach($master_array as $mast)


				<tr>
				<td>{{$mast['name']}}</td>
				<td>{{$mast['plot']}}</td>
				<td>{{$mast['total_payment']}}</td>
        <td>{{$mast['total_expense']}}</td>
				<td>{{$mast['date']}}</td>
				<td>{{$mast['benefit']}}</td>
				</tr>
				@endforeach
        <tfoot>
      <td><button class='btn btn-print master_print' style="color: white;">Print</button></td>
      <td>Total</td>
      <td>{{$total}}</td>
      <td>{{$total_exp}}</td>
      <td></td>
      
      
    </tr>
  </tfoot>  

	</tbody>		
		</table>
   
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('#master_table').DataTable();
   $('.master_print').click(function() {
                    window.print();
                });
});
</script>		@endsection