@include('layouts.header')
	<section class="jumbotron text-center p-3">
		<div class="container">
			<h2 class="jumbotron-heading">Create New User</h1>
		 </div>
	</section>
	<div class="container mb-4">
		<div class="d-flex justify-content-center form-center">
			
			<div class="col-12 row">
				<div class="col">
					
					@if (Session::has('success'))
                        <div class="alert alert-primary text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
					 <x-auth-validation-errors class="mb-4" :errors="$errors" />
					<form enctype="multipart/form-data" role="form" action="{{ route('submitfiles') }}" method="post" class="">
                            @csrf
							
							<div class='form-row row'>
                                <div class='col-md-12 hide error form-group'>
                                    <div class='alert-danger alert'></div>
                                </div>
                            </div>
							<div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Upload File [ pdf,xlx,csv,jpg,png ]</label> 
									<input id="fname" name="fname" required class='required form-control'  size='20' type='file'>
                                </div>
                            </div>
                           
								
							<div class='form-row row'>
                                <div class='col-xs-12 form-group  required'>
                                    <label class='control-label'>Select Users</label> 
									<select multiple name="users[]" id="users"  required  style="width:200px;" class='required form-control'>
									@if(!empty($data))
										@foreach($data as $key => $value)
										<option value="{{ $value->id }}">{{ $value->name }}</option>
										@endforeach
									@endif
									</select>
                                </div>
                            </div>  

                           

                            <div class="row col-md-4 ">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Upload File</button>
                            </div>

                        </form>
				</div>
				
			</div>
			
		</div>
	</div>
	
		
@include('layouts.footer')
