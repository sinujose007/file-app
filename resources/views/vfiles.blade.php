@include('layouts.header')
	<section class="jumbotron text-center p-3">
		<div class="container">
			<h2 class="jumbotron-heading">File List</h1>
		 </div>
	</section>
	<div class="container mb-4">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<div class="col-3 float-right"><a href="{{ url('/createfile') }}" class="btn btn-sm btn-block btn-success text-uppercase nav-link">Upload File</a></div>											</div>
					<table class="table table-striped">
						<thead>
							<tr>
								
								<th scope="col">Name</th>
								<th scope="col">Owner</th>
								<th scope="col" class="text-right">Actions</th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
						
							@if(!empty($data))
								@foreach($data as $key => $value)
									<tr>
										
										<td>{{ $value->path }}</td>
										<td>{{ $value->name }}</td>
										<td class="text-right">
											@if($value->user_id == Session::get('authuser'))
												<a href="{{ url('/editfile', [$value->id]) }}"  class="text-uppercase nav-link float-left">Edit</a>
												<a href="{{ url('/deletefile', [$value->id]) }}" class="text-uppercase nav-link float-left">Delete</a>
											@endif	
												<a href="{{ $value->path }}" target="_blank" class="text-uppercase nav-link">View/Download</a>
										</td>
									</tr>
							    @endforeach
							@else
								<tr><td colspan="4">There are no data.</td></tr>
							@endif					
						</tbody>
					</table>
					
				</div>
			</div>
			
		</div>
	</div>
@include('layouts.footer')
