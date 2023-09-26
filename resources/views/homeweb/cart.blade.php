@extends('homeweb.layouts.master')
@section('content')


	<!-- cart  -->
	<div class="container-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="cart-main-head-div">
					<h3 class="mb-0 shop-text text-center">Cart Items</h3>
				</div>
			</div>
		</div>
		<div class="cart-main-dv">
			<div class="row">

                @foreach ($products as $prod)
                <div class="col-lg-12">
					<div class="cart-box">
						<div class="cart-img-box">
							<img class="cart-product-image" src="{{$prod->image1}}" alt="">
						</div>
						<div class="cart-content-box">
							<h4 class="mb-0 cart-product-name">{{$prod->name_english}}</h4>
							<p class="mb-0 cart-sub-text">{!! $prod->description_eng !!}</p>
							<div class="cart-price-dv">
								<h3 class="cart-price mb-0">₹2,500</h3>
								<h3 class="mb-0 discount-price-cart">₹4,500</h3>
							</div>
							<div class="quantity-delet-icon">
								<div class="qntity">
									<h5 class="mb-0 symbol-q" onclick="subtractQuantity()">-</h5>
									<input type="text" class="text-center" id="quantity" value="1" min="1">
									<h5 class="mb-0 symbol-q" onclick="addQuantity()">+</h5>
								</div>
								<div class="delete-icon">
									<a href="{{ route('delete.cartitem') }}"><i class="ri-delete-bin-line"></i></a>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
                @endforeach

				<!-- price  -->
				<div class="col-lg-12">
					<div class="sub-total-dv">
						<h4 class="cart-sub-total-text">Sub Total(2 Items): <span>₹5,000</span></h4>
						<a href="#" class="btn proceed-btn primary-bg text-white">Proceed to Buy</a>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script>

        function toggleCartt(){
            document.querySelector('.sidebar').classList.toggle('open-cart');
            }
        // add quantity product script
        let quantityInput = document.getElementById('quantity');

        function subtractQuantity() {
            var cur_qty=$('input#quantity').val();
            if (cur_qty > 1) {
                qty = cur_qty - 1;
                $('#quantity').val(qty);
            }
        }

        function addQuantity() {
            var cur_qty=$('input#quantity').val();
                qty = cur_qty + 1;
                $('#quantity').val(qty);

        }

        document.addEventListener("DOMContentLoaded", function () {
            // Show the content of the first tab when the page loads
            showTab(0);
        });

        function showTab(tabIndex) {
            // Get all tab name elements
            const tabNames = document.querySelectorAll('.tab-name');

            // Remove the 'active' class from all tab names
            tabNames.forEach(tabName => {
                    tabName.classList.remove('active');
            });

            // Add the 'active' class to the selected tab name
            tabNames[tabIndex].classList.add('active');

            // Get all tab content elements
            const tabContents = document.querySelectorAll('.tab-pane');

            // Hide all tab content
            tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active');
            });

            // Show the selected tab content
            tabContents[tabIndex].classList.add('active');
        }
        // image changing



        function changeImage(newImage) {
            document.getElementById('main-image').src = newImage;
        }


        </script>


@endsection

