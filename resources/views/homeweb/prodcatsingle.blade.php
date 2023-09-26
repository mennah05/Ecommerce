@extends('homeweb.layouts.master')
@section('content')

	<!-- desease detail section  -->
	<div class="desease-single-main-div">
		<div class="container-main">
			<div class="row">
				<div class="col-lg-5">
					<div class="img-box-desease">
						<img src="{{asset($pcsingle->image)}}" alt="">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="disease-detail">
						<h3 class="mb-0 desease-name">{{ $pcsingle->title_eng }}</h3>
						<p class="mb-0 sub-txt-desease">{!! $pcsingle->description_eng !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- desease detail section end -->
	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h5 class="mb-0 trending-text">PRODUCTS</h5>
				</div>
			</div>
			@foreach ($pc_products as $pcprod)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="product-box">
					<a href="{{ route('product.single',$pcprod->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($pcprod->image1)}}" alt="">
                </div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$pcprod->name_english}}</h5>
							<h5 class="mb-0 product-price">2000</h5>
						</div>
						<div class="btn-cart">
							<a href="{{ route('product.single',$pcprod->id) }}" class="add-to-cart primary-bg btn text-white">View Details</a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

    @endsection

