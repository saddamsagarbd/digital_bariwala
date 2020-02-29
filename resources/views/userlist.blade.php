@extends('master')
@section('page-title')
User
@endsection
@section('page-label')
User
@endsection
@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
				  <i class="fa fa-plus"></i>&nbsp;Add new
				</button>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->first_name }}&nbsp; {{ $user->last_name }}</td>
                                <td>{{ $user->mobile_no }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                	<button class="edit btn btn-success btn-sm"  id="{{$user->id}}">
                                		<i class="fa fa-edit"></i> Edit
                                	</button>
                            		<button class="details btn btn-primary btn-sm"  id="{{$user->id}}">
                                		<i class="fa fa-eye"></i> Details
                                	</button>
                            		<button class="impersionate btn btn-success btn-sm"  id="{{$user->id}}">
                                		<i class="fa fa-sign-in"></i> Impersionate
                                	</button>
                                </td>         
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Modal -->
<div class="modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<span id="form_result"></span>
      	<form id="user_form" enctype="multipart/form-data" action="javascript:void(0)" method="post">
            <div class="form-body">
                <div class="row p-t-20">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" placeholder="John doe">
                            <small class="form-control-feedback"> This is inline help </small> </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" id="last_name" class="form-control form-control-danger" placeholder="12n">
                            <small class="form-control-feedback"> This field has error. </small> </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-success">
                            <label class="control-label">Gender</label>
                            <select id="gender" class="form-control custom-select">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <small class="form-control-feedback"> Select your gender </small> </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mobile number</label>
                            <input type="text" class="form-control" id="mobile_no" placeholder="01700000000">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea class="textarea_editor form-control" rows="5" id="address" placeholder="Put you address ..." style="height:150px"></textarea>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Number of Floors</label>
                            <input type="number" id="floors" class="form-control form-control-danger" placeholder="3">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Unit in each floor</label>
                            <input type="number" id="units" class="form-control" placeholder="3">
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>
        
	      </div>
	      <div class="modal-footer">
	      	<input type="hidden" id="action" value="save">
	      	<input type="hidden" id="id" value="{{$user->id}}">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        
	        <button type="submit" id="actionBtn" class="btn btn-success"> Save</button>
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
		$("#user_form").on("submit", function(e){
			e.preventDefault();
			/*Ajax Request Header setup*/
		   	$.ajaxSetup({
		      	headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      	}
		  	});
			var formData = {
				'first_name' : $('#first_name').val(),
				'last_name' : $('#last_name').val(),
				'gender' : $('#gender').val(),
				'mobile_no' : $('#mobile_no').val(),
				'address' : $('#address').val(),
				'floors' : $('#floors').val(),
				'units' : $('#units').val(),
				'action': $('#action').val(),
				'id': $('#id').val(),
			};
			$.ajax({
				url: "{{ route('create-user') }}",
				method: "POST",
				data: formData,
				dataType: "json",
				success: function(data){
					var html = "";
					if(data.errors){
						html +="<div class='alert alert-danger'><ul>";
						for(var count=0; count< data.errors.length; count++){
							html +="<li>"+data.errors[count]+"</li>";
						}
						html +="</ul></div>";
					}
					if(data.success){
						html +="<div class='alert alert-success'>"+ data.success +"</div>";
						$("#user_form")[0].reset();
						$("#userModal").modal('hide')
						// refresh datatable data
					}
					$("#form_result").html(html);
				}

			})
		});
	});
	$(document).on("click", ".edit", function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"getuserbyid/"+ id + "/edit",
			dataType:"json",
			success:function(data){
				$("#first_name").val(data.data.first_name);
				$("#last_name").val(data.data.last_name);
				$("#gender").val(data.data.gender);
				$("#mobile_no").val(data.data.mobile_no);
				$("#address").val(data.data.address);
				$("#floors").val(data.data.floors);
				$("#units").val(data.data.units);
				$("#actionBtn").html("Update");
				$('#id').val(data.data.id);
				$('#action').val("update");
				$("#userModal").modal('show');
			}
		});

	});
</script>
@endsection