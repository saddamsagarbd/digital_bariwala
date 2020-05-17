@extends('master')
@section('page-title')
Apartment To-Let
@endsection
@section('page-label')
Apartment To-Let
@endsection
@section('content')

<div class="row">
	<div class="col-md-12">
		<form id="rental_form">
			<input type="hidden" readonly class="form-control-plaintext" name="apartment_id" value="{{ $apartment_id }}">
			<div class="form-group">
				<label for="staticEmail" class="col-sm-4 col-form-label">Name<span style="color:#FF0000;">&nbsp;*(required)</span></label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tanent_name" value="">
				</div>
			</div>
			<div class="form-group">
				<label for="personal_no" class="col-sm-4 col-form-label">Contact No 1<span style="color:#FF0000;">&nbsp;*(required)</span></label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="personal_no">
				</div>
			</div>
			<div class="form-group">
				<label for="optional" class="col-sm-4 col-form-label">Contact No 2<span>&nbsp;(optional)</span></label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="optional">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-4 col-form-label">Email<span style="color:#FF0000;">&nbsp;*(required)</span></label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="email">
				</div>
			</div>
			<div class="form-group">
				<label for="indentity_type" class="col-sm-4 col-form-label">Identification type<span style="color:#FF0000;">&nbsp;*(required)</span></label>
				<div class="col-sm-8">
					<select class="form-control" name="indentity_type" id="indentity_type">
						<option value="">select type</option>
						<option value="1">NID</option>
						<option value="2">Driving LC</option>
						<option value="3">Passport</option>
					</select>
				</div>
			</div>
			<div class="form-group" id="indentification_no_block">
				<label for="indentification_no" class="col-sm-4 col-form-label">Identification No</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="indentification_no">
				</div>
			</div>
			<input type="submit" style="float: right;" name="submit" class="btn btn-primary btn-md btn-round" value="Save changes">
		</form>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$("#indentification_no_block").hide();

		$("#indentity_type").on("change", function(){
			$("#indentification_no_block").show();
		});

		$("#rental_form").on("submit", function(e){
			e.preventDefault();

			/*Ajax Request Header setup*/
		   	$.ajaxSetup({
		      	headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      	}
		  	});

			let formData = $( this ).serialize();

			$.ajax({
				url: "{{ route('rent-apartment') }}",
				type:"POST",
				data: formData,
				dataType:"JSON",
				success: function(response){
					window.location.href = "{{ route('apartment-details') }}"
				}
			});

		});
		
	});
</script>
@endsection