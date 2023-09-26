@extends('homeweb.layouts.master')
@section('content')

	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h4 class="mb-0 trending-text">Featured Products</h4>
				</div>
			</div>
            @foreach ($featrdprods as $featprod)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
				<div class="product-box">
					<a href="{{ route('prodcat.single',$featprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($featprod->image)}}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$featprod->title_eng}}</h5>
							<h5 class="mb-0 product-price">₹ 20,000</h5>
						</div>
						<div class="btn-cart">
							<a href="#" class="add-to-cart primary-bg btn text-white">Add to Cart </a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

@endsection


