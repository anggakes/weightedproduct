@extends('template.backend')

@section('content')

<div class='row'>
	<div class='span8'>
		<img src="{!! asset('assets/images/gmapnk.jpg') !!}" style='width:700px' />
	</div>
	<div class='span3'>
			
				<h3>Login</h3> <hr>
				
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="" role="form" method="POST" action="{{ url('/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Sebagai</label>
							<div class="col-md-6">
								<select type="password" class="form-control" name="roles">
						<option value='admin'>admin</option>
						<option value='manajer'>manajer</option>

								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Login
								</button>

								
							</div>
						</div>
					</form>
				
	</div>
</div> <!-- /span 4 login -->	
@endsection
