@extends('homeweb.layouts.master')
@section('content')


	<!-- shop disease  -->
	<div class="container-main">
		<div class="space-dv">
			<div class="row">
				<div class="col-lg-12">
					<div class="shop-dv-heading">
						<h3 class="mb-0 shop-text text-center">Shop By Disease</h3>
					</div>
				</div>
                @foreach ($diseases as $disease)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
					<div class="disese-box">
						<a href="{{ route('disease.single',$disease->id)}}">
							<img class="disese-img" src="{{$disease->image}}" alt="">
							<h5 class="mb-0 disease-name">{{$disease->title_english}}</h5>
						</a>
					</div>
				</div>

                @endforeach
			</div>
		</div>
	</div>

    @endsection
