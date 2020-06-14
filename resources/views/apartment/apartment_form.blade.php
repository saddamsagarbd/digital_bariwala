@extends('layout.app')
@section('page-title')
Apartments
@endsection
@section('page-content')
<div class="card">
	<div class="card-body">
		<h3 style="padding-bottom: 3rem;">Listing Your Apartment</h3>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form class="form-sample" action="{{ url('/aparmentinfo-save') }}" method="post">
			@csrf
			<input type="hidden" name="apartment_id" value="<?php echo (isset($apartment->id))?$apartment->id:'';?>">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Floor</label>
						<div class="col-sm-9">
							<select name="floor" id="floor" required="required" class="form-control">
		                    	<option value="">-- Select floor --</option>
		                    	@for($i=1; $i<= $user->floors; $i++)
		                    	<option value="{{ $i }}" <?php echo (isset($apartment->floor) && $apartment->floor == $i)?'selected':'';?>>{{ $i }}</option>
		                    	@endfor                  	
		                    </select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Unit</label>
						<div class="col-sm-9">
							<select name="unit" id="unit" required="required" class="form-control">
		                    	<option value="">-- Select unit --</option>
		                    	@for($i=1; $i<= $user->units; $i++)
		                    	<option value="{{ $i }}" <?php echo (isset($apartment->unit) && $apartment->unit == $i)?'selected':'';?>>{{ $i }}</option>
		                    	@endfor                  	
		                    </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Unit Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="unit_name" id="unit_name" required="required" value="<?php echo (isset($apartment->unit_name))?$apartment->unit_name:'';?>" placeholder="e.g: 1-A, 2-B, 3-C" />
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Bedroom?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="bed_room" id="bed_room" required="required" value="<?php echo (isset($apartment->bed_room))?$apartment->bed_room:'';?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Belcony?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="belcony" id="belcony" required="required" value="<?php echo (isset($apartment->belcony))?$apartment->belcony:'';?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Kitchen?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="kitchen_room" id="kitchen_room" required="required" value="<?php echo (isset($apartment->kitchen_room))?$apartment->kitchen_room:'';?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Drawing-Dining?</label>
						<div class="col-sm-4">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="drawing_dining" required="required" id="drawing_dining" value="1" <?php echo (isset($apartment->drawing_dining) && $apartment->drawing_dining == 1)?'checked':'';?>>
									Attached
								</label>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="drawing_dining" required="required" id="drawing_dining" value="2" <?php echo (isset($apartment->drawing_dining) && $apartment->drawing_dining == 2)?'checked':'';?>>
									Saperate
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Washroom?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="wash_room" id="wash_room" required="required" value="<?php echo (isset($apartment->wash_room))?$apartment->wash_room:'';?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Unit Advance?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="unit_advance" id="unit_advance" required="required" value="<?php echo (isset($apartment->unit_advance))?$apartment->unit_advance:'';?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Monthly rate?</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="monthly_rent" id="monthly_rent" required="required" value="<?php echo (isset($apartment->monthly_rent))?$apartment->monthly_rent:'';?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Unit size? <span>(sqft)</span></label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="unit_size" id="unit_size" required="required" value="<?php echo (isset($apartment->unit_size))?$apartment->unit_size:'';?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Meter/Prepaid-Card No?</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="meter_no" id="meter_no" value="<?php echo (isset($apartment->meter_no))?$apartment->meter_no:'';?>" required="required" placeholder="M123456789">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4" style="text-align: right;">
					<input type="reset" name="reset" class="btn btn-warning btn-sm" value="Cancel">
					<input type="submit" name="submit" class="btn btn-success btn-sm" value="Save Apartment">
				</div>
			</div>
		</form>
	</div>
</div>          
@endsection