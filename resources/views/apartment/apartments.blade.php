@extends('layout.app')
@section('page-title')
Apartments
@endsection
@section('page-content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-8">
				<h3 style="padding-bottom: 3rem;">List of Apartments</h3>
			</div>
			<div class="col-4">
				<a href="{{ url('/add-apartment')}}" class="btn btn-outline-primary btn-md" style="float: right;"><i class="fa fa-building fa-fw"></i>Add Apartment</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				@if (session('success'))
				    <div class="col-sm-12">
				        <div class="alert  alert-success alert-dismissible fade show" role="alert">
				            {{ session('success') }}
				                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
				        </div>
				    </div>
				@endif
				<div class="table-responsive">
					<table id="order-listing" class="table">
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
										<td><?=($apartment['is_occupied'] == 0)?'<label class="badge badge-outline-success">Available</label>':'<label class="badge badge-outline-danger">Occupied</label>';?></td>
										<td>
											<a href="<?php echo url('').'/edit/'.$apartment['id'];?>" class="btn btn-outline-primary btn-sm">Edit</a>
											<?php
											if($apartment['is_occupied'] == 0){
												?>
												<a href="<?php echo url('').'/to-rent/'.$apartment['id'];?>" class="btn btn-outline-success btn-sm">To-rent</a>
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
	@endsection