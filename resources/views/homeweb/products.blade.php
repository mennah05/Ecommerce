@extends('homeweb.layouts.master')
@section('content')

	<!-- products  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="trending-products-dv">
					<h4 class="mb-0 trending-text">Shop By Product</h4>
					<form class="option-select-product" action="">
						<select name="products" id="products">
							<option value="volvo">Sort By</option>
							<option value="saab">Diseases</option>
							<option value="opel">Product category</option>
						</select>
					</form>
				</div>
			</div>
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
				<div class="product-box">
					<a href="{{ route('product.single',$product->id) }}"><div class="prdct-img-box">
						<img class="product-image" src="{{asset($product->image1)}}" alt="">
					</div></a>
					<div class="price-detail-dv">
						<div class="price-dv">
							<h5 class="mb-0 product-name">{{$product->name_english}}</h5>
							<h5 class="mb-0 product-price">₹ 20,000</h5>
						</div>
						<div class="btn-cart">
							{{-- <a href="/add-to-cart/{{$product->id}}" class="add-to-cart primary-bg btn text-white">Add To Cart</a> --}}
							<a href="{{ route('product.single',$product->id) }}" class="add-to-cart primary-bg btn text-white">View Details</a>
						</div>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>

    <script>
        function AddToCart(prod_id)
        {
            data = new FormData();
            data.append('prod_id',prod_id);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({

                type: "POST",
                url: "/add-to-cart",
                data: data,
                dataType: "json",
                contentType: false,
                //cache: false,
                processData: false,

                success: function(data) {
                    if (data['success']) {

                        Swal.fire({
                            title: 'Added to cart  Successfully',
                            // text: "You won't be able to revert this!",
                            icon: 'success',
                            // showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =  window.location.href;
                            }
                        })
                    }
                }
            })

        }
    </script>

@endsection


