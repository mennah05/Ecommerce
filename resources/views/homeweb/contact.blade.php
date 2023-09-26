@extends('homeweb.layouts.master')
@section('content')



	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="signin-main-dv">
					<h3 class="text-center mb-0 signin-text">Contact Us</h3>
					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea placeholder="Describe your Concern" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
						</div>
						<a href="#" class="signin-btn-main primary-bg btn text-white text-center">Submit</a>
					</form>
				</div>
			</div>
		</div>
	</div>

    @endsection


