@extends('homeweb.layouts.master')
@section('content')


<div class="product-single-page">
	<div class="container-main">
		<div class="row">
			<div class="col-lg-5">
				<div class="main-dv-p">
					<div class="product-main-image-dv">
						<img class="prodcut-single-image" src="{{asset($prod->image1)}}" alt="Product Image">
					</div>
					<div class="small-image">
						<img src="{{asset($prod->image1)}}" class="product-thumbnail" alt="Thumbnail 1" onclick="changeImage({{asset($prod->image1)}})">
						<img src="{{asset($prod->image2)}}" class="product-thumbnail" alt="Thumbnail 1" onclick="changeImage('{{asset($prod->image2)}}')">
						<img src="{{asset($prod->image3)}}" class="product-thumbnail" alt="Thumbnail 1" onclick="changeImage('{{asset($prod->image3)}}')">
						<img src="{{asset($prod->image4)}}" class="product-thumbnail" alt="Thumbnail 1" onclick="changeImage('./images/images.jpeg')">
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="product-details-dv-main">
					<h4 class="mb-0 product-main-name">{{$prod->name_english}}</h4>
                    <p class="mb-0 product-main-subtxt">{!!$prod->description_eng!!}</p>
					<div class="single-page-price" id="unpricediv">
						<h4 class="mb-0 single-orgnl-price">₹{{$defaultunit->offer_price}}</h4>
						<h4 class="mb-0 single-dcnt-price">₹{{$defaultunit->price}}</h4>
					</div>
                    <div class="qnt-unt">
                        <div class="qntity">
                            <h5 class="mb-0 symbol-q" onclick="subtractQuantity()">-</h5>
                            <input type="number" class="text-center" id="quantity" value="1" min="1">
                            <h5 class="mb-0 symbol-q" onclick="addQuantity()">+</h5>
                        </div>

                        <form class="option-select-product" action="">
                            <select name="products" id="products" onchange="getprice(this.value)">
                                <option value=" ">Units</option>
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}" @if ($unit->default=1) selected

                                @endif> {{$unit->name}}</option>
                        @endforeach
                            </select>
                        </form>
                    </div>
					<div class="btns-p-single">
						<a href="#" class="btn buy-now-btn text-white primary-bg">Buy Now</a>
						<a href="/add-to-cart/{pid}" class="btn cart-btn">Add to Cart</a>
					</div>
					<div class="dropdown-dv">
						<div id="accordion">
							<div class="card">
								<div class="card-header" id="headingOne">
									<i class="ri-add-fill"></i>
									<h5 class="mb-0 qstn-dropdown" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How to Use?</h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<p class="anser-drpdown">{!!$prod->how_to_use_eng!!}</p>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	<!-- products  -->
	<div class="container-main mt-4">
		<div class="row">
			<div class="col-lg-12">
				<div class="related-products">
					<h4 class="rel-txt mb-0">Related Products</h4>
				</div>
			</div>
            @foreach ($relatedprod as $reltdprd)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<div class="product-box">
					<a href="{{ route('product.single',$reltdprd->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{ asset ($reltdprd->image1) }}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$reltdprd->name_english}}</h5>
							<h5 class="mb-0 product-price">₹ 20,000</h5>
						</div>
						<div class="btn-cart">
							<a href="{{ route('product.single',$reltdprd->id) }}" class="add-to-cart primary-bg btn text-white">View Details</a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</div>
<script>
    function getprice(val)
    {

        $.post("/get-price", {
            unit_id: val,
            _token: "{{ csrf_token() }}"
        }, function(result) {

            $('#unpricediv').html(result);
        });

    }

    function subtractQuantity() {
            var cur_qty=$('input#quantity').val();
            if (cur_qty > 1) {
                qty = parseInt(cur_qty) - 1;
                $('#quantity').val(qty);
            }
        }

        function addQuantity() {
            var cur_qty=$('input#quantity').val();
                qty = parseInt(cur_qty) + 1;
                $('#quantity').val(qty);

        }

        function changeImage(newImage) {
	document.getElementById('main-image').src = newImage;
}
</script>
@endsection


