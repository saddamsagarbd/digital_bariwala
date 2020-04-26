@extends('master')
@section('page-title')
Apartment List
@endsection
@section('page-label')
Apartment List
@endsection
@section('content')
<div class="row">
    <div class="col-12">
    	<div class="card">
            <div class="card-body">
            	<span id="submit_result"></span>
            	<button type="button" id="apartmentBtn" class="btn btn-primary" data-toggle="modal" data-target="#apartmentModal" style="color:#ffffff;">
				  <i class="fa fa-plus"></i>&nbsp;Add Apartment
				</button>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Unit Name</th>
                                <th>Details</th>
                                <th>Advance</th>
                                <th>Monthly Rent</th>
                                <th>Avaiability</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach($apartments as $apartment){?>
                            <tr>
                                <td><?=$apartment['unit_name']?></td>
                                <td>
                                <p>Bed room: <?=$apartment['bed_room']?></br>
                                Wash room: <?=$apartment['wash_room']?></br>
                                Drawing/Dining: <?=($apartment['drawing_dining'] == 1)?'Attached':'Separate';?></br>
                                Measurement: <?=$apartment['unit_size']."sqft"?></p>
                                </td>
                                <td><?=$apartment['unit_advance']."Tk.";?></td>
                                <td><?=$apartment['monthly_rent']."Tk.";?></td>
                                <td><?=($apartment['is_occupied'] == 0)?'<label class="badge badge-success">Available</label>':'<label class="badge badge-danger">Occupied</label>';?></td>
                                <td>
                                	<button id="edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                	<?php
                                		if($apartment['is_occupied'] == 0){
                                	?>
                                	<a href="<?php echo url('').'/to-rent/'.$apartment['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;To-rent</a>
                                	<?php

                                		}
                                	?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal bd-example-modal-lg" id="apartmentModal" tabindex="-1" role="dialog" aria-labelledby="apartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="apartmentModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="apartment_form" enctype="multipart/form-data" action="javascript:void(0)" method="post">
      		<div class="row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    <label class="form-control-label" for="floor">Floor</label>
	                    <select name="floor" id="floor" class="form-control">
	                    	<option value="">-- Select floor --</option>
	                    	@for($i=1; $i<= $user->floors; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    	@endfor                  	
	                    </select>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    <label class="form-control-label" for="unit">Unit</label>
	                    <select name="unit" id="unit" class="form-control">
	                    	<option value="">-- Select unit --</option>
	                    	@for($i=1; $i<= $user->units; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    	@endfor                  	
	                    </select>
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    <label class="form-control-label" for="unit_name">Unit Name</label>
	                    <input type="text" class="form-control" name="unit_name" id="unit_name" value="" placeholder="e.g: 1-A, 2-B, 3-C">
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-lg-4">
	                <div class="form-group">
	                    <label class="form-control-label" for="bedroom">How many Bedroom have?</label>
	                    <input type="number" class="form-control" name="bed_room" id="bed_room" value="">
	                </div>
	            </div>
	            <div class="col-lg-4">
	                <div class="form-group">
	                    <label class="form-control-label" for="washroom">How many washroom have?</label>
	                    <input type="number" class="form-control" name="wash_room" id="wash_room" value="">
	                </div>
	            </div>
	            <div class="col-lg-4">
	        		<div class="form-group">
	                    <label class="form-control-label" for="kitchen">Drawing-Dining condition?</label>
		        		<div class="form-check">
					      <label class="form-check-label" for="radio1">
					        <input type="radio" class="form-check-input" id="radio1" name="drawing_dining" id="drawing_dining" value="1" checked>Attached
					      </label>
					      <label class="form-check-label" for="radio2" style="margin-left: 30px;">
					        <input type="radio" class="form-check-input" id="radio2" name="drawing_dining" id="drawing_dining" value="2">Seperate
					      </label>
					    </div>
					</div>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">How many kitchen-room have?</label>
	                    <input type="number" class="form-control" name="kitchen_room" id="kitchen_room" value="">
	                </div>	        	
                </div>
                <div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">How many belcony have?</label>
	                    <input type="number" class="form-control" name="belcony" id="belcony" value="">
	                </div>	        	
                </div>
                <div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">Unit measurement? <span>(sqft)</span></label>
	                    <input type="number" class="form-control" name="unit_size" id="unit_size" value="">
	                </div>	        	
                </div>	        	
	        </div> 
	        <div class="row">
	        	<div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">Unit Advance?</label>
	                    <input type="number" class="form-control" name="unit_advance" id="unit_advance" value="0.00">
	                </div>	        	
                </div>
                <div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">Unit monthly rate?</label>
	                    <input type="number" class="form-control" name="monthly_rent" id="monthly_rent" value="0.00">
	                </div>	        	
                </div>
                <div class="col-lg-4">
		        	<div class="form-group">
	                    <label class="form-control-label" for="kitchen">Unit Meter/Prepaid-Card No?</label>
	                    <input type="text" class="form-control" name="meter_no" id="meter_no" value="" placeholder="M123456789">
	                </div>	        	
                </div>	        	
	        </div>         
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        
	        <input type="submit" id="actionBtn" class="btn btn-success">
	      </div>
	    </div>
    </form>
  </div>
</div>
<!-- modal end -->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#apartmentModal').on('show.bs.modal', function (event) {
		    var button  = $(event.relatedTarget); 
		    // Button that triggered the modal 
		    var modal       = $(this);
		    modal.find('.modal-title').text('Apartment Unit Details')
		    $("#actionBtn").val('Save');
		    $("#apartment_form")[0].reset();
		});
		//form submit
		$("#apartment_form").on('submit', function(){
			/*Ajax Request Header setup*/
		   	$.ajaxSetup({
		      	headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      	}
		  	});
			var apartmentDetails = {
				'floor'			: $("#floor").val(),
				'unit'			: $("#unit").val(),
				'unit_name'		: $("#unit_name").val(),
				'bed_room'		: $("#bed_room").val(),
				'wash_room'		: $("#wash_room").val(),
				'drawing_dining': $('input[name="drawing_dining"]:checked').val(),
				'kitchen_room'	: $("#kitchen_room").val(),
				'belcony'		: $("#belcony").val(),
				'unit_size'		: $("#unit_size").val(),
				'unit_advance'	: $("#unit_advance").val(),
				'monthly_rent'	: $("#monthly_rent").val(),
				'meter_no'		: $("#meter_no").val(),
			};
			$.ajax({
				url:"{{ route('aparmentinfo-save') }}",
				method:"POST",
				data: apartmentDetails,
				dataType:"JSON",
				success:function(response){
					console.log(response);
					var html = "";
					if(response.status == "error"){
						html +="<div class='alert alert-danger'>"+
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
						"<span aria-hidden='true'>&times;</span></button>"+
						"<ul>";
						for(var count=0; count< response.errors.length; count++){
							html +="<li>"+response.errors[count]+"</li>";
						}
						html +="</ul></div>";
					}else if(response.status == "success"){
						html +="<div class='alert alert-success'>"+
						"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
						"<span aria-hidden='true'>&times;</span></button>"+"<p style='color:#FFFFF'>"+ response.message +"</p></div>";
						$("#apartment_form")[0].reset();
						$("#apartmentModal").modal('hide')
						// refresh datatable data
					}
					$("#submit_result").html(html);
				}
			});
		});
	});
</script>
@endsection