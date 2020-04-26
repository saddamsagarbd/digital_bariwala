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
		<form>
			<input type="hidden" readonly class="form-control-plaintext" name="apartment_id" value="{{ $apartment_id }}">
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-4 col-form-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tanent_name" value="" placeholder="put name here...">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-4 col-form-label">Mobile No:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="mobile_no" placeholder="put mobile no....">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-4 col-form-label">Email Address:</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="email" placeholder="put email address....">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-4 col-form-label">NID/Driving Licence No:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="identification_no" placeholder="put NID/Driving LC no....">
				</div>
			</div>
			<input type="submit" style="float: right;" name="submit" class="btn btn-primary btn-sm" value="Save changes">
		</form>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
@endsection