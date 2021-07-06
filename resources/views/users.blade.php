@include('layouts.header')
	<section class="jumbotron text-center p-3">
		<div class="container">
			<h2 class="jumbotron-heading">Users List</h1>
		 </div>
	</section>
	<div class="container mb-4">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<div class="col-3 float-right"><a href="{{ url('/createuser') }}" class="btn btn-sm btn-block btn-success text-uppercase nav-link">Create User</a></div>											</div>
					<table class="table table-striped">
						<thead>
							<tr>
								
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col" class="text-right">Actions</th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
						
							@if(!empty($data) && $data->count())
								@foreach($data as $key => $value)
									<tr>
										
										<td>{{ $value->name }}</td>
										<td>{{ $value->email}}</td>
										<td class="text-right">
											<a href="{{ url('/edituser', [$value->id]) }}"  class="text-uppercase nav-link float-left">Edit</a>
											<a href="{{ url('/deleteuser', [$value->id]) }}" class="text-uppercase nav-link">Delete</a>
										</td>
									</tr>
							    @endforeach
							@else
								<tr><td colspan="4">There are no data.</td></tr>
							@endif					
						</tbody>
					</table>
					@if(!empty($data) && $data->count())
						{!! $data->links("pagination::bootstrap-4") !!}
					@endif		
				</div>
			</div>
			
		</div>
	</div>
@include('layouts.footer')
