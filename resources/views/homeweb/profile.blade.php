@extends('homeweb.layouts.master')
@section('content')

<div class="container-main">
	<div class="profile-space-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="tab-main-dv">
					<h4 class="mb-0 tab-name"  onclick="showTab(0)">Profile</h4>
					<h4 class="mb-0 tab-name"  onclick="showTab(1)">Orders</h4>
					<h4 class="mb-0 tab-name"  onclick="showTab(2)">Addresses</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-main">
	<div class="row">
		<div class="tab-content">
			<div class="col-lg-12">
				<div class="profile-dv tab-pane" id="tab1">
					<form action="/update-profile" method="POST">
                        @foreach ($profile as $prof)
                        <div class="form-group">
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{$prof->name}}">
						</div>
						<div class="form-group">
							<input type="text	" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$prof->mobile}}">
						</div>
						{{-- <div class="form-group">
							<input type="text	" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
						</div> --}}
						<a href="{{ route('update.profile') }}" class="signin-btn-main primary-bg btn text-white text-center mt-4">Update Profile</a>
						<div class="log-out">
							<a href="{{ route('user.logout') }}" class="logout-btn text-center"><i class="ri-logout-box-line"></i> Logout</a>
						</div>
                        @endforeach

					</form>
				</div>
			</div>
			<div class="profile-dv tab-pane" id="tab2">
				<div class="container-main">
					<div class="address-box">
						<div class="product-chekouts">
							<div class="main-dv-chekout">
								<div class="product-dv">
									<img class="checkout-product-image" src="./images/61cZaQiBQKL 1.png" alt="">
								</div>
								<div class="product-name-dv">
									<h4 class="check-product-name">Product 02</h4>
								</div>
							</div>
							<div class="price-dv-checkout">
								<h5 class="check-out-dscnt-price mb-0">₹2,500</h5>
								<h5 class="check-out-orgnl-price mb-0">₹2,500</h5>
								<a href="#" class="primary-color view-product-name">View Product</a>
							</div>
						</div>

					</div>
                    <div class="address-box">
						<div class="product-chekouts">
							<div class="main-dv-chekout">
								<div class="product-dv">
									<img class="checkout-product-image" src="./images/61cZaQiBQKL 1.png" alt="">
								</div>
								<div class="product-name-dv">
									<h4 class="check-product-name">Product 02</h4>
								</div>
							</div>
							<div class="price-dv-checkout">
								<h5 class="check-out-dscnt-price mb-0">₹2,500</h5>
								<h5 class="check-out-orgnl-price mb-0">₹2,500</h5>
								<a href="#" class="primary-color view-product-name">View Product</a>
							</div>
						</div>

					</div>
                    <div class="address-box">
						<div class="product-chekouts">
							<div class="main-dv-chekout">
								<div class="product-dv">
									<img class="checkout-product-image" src="./images/61cZaQiBQKL 1.png" alt="">
								</div>
								<div class="product-name-dv">
									<h4 class="check-product-name">Product 02</h4>
								</div>
							</div>
							<div class="price-dv-checkout">
								<h5 class="check-out-dscnt-price mb-0">₹2,500</h5>
								<h5 class="check-out-orgnl-price mb-0">₹2,500</h5>
								<a href="#" class="primary-color view-product-name">View Product</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="profile-dv tab-pane" id="tab3">
				<div class="container-main">
					<div class="address-box mb-4">
						<div class="addrss-details">
							<h5 class="user-name-address mb-0">Ummer Hashim</h5>
							<h5 class="user-name-address mb-0">2nd Floor, Govt. Cyberpark</h5>
							<h5 class="user-name-address mb-0">Govt. Cyberpark</h5>
							<h5 class="user-name-address mb-0">Calicut, Kerala, 673016</h5>
						</div>
						<div class="addrs-btns">
							<div class="one-btn">
								<a href="#" class="edit-btn text-white">Edit</a>
							</div>
							<div class="two-btn">
								<a href="#" class="btns-addrss dlt-btn">Delete</a>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="add-adrrss-btn">
							<a href="#" class="add-adress-btn"> + Add Address</a>
						</div>
					</div>
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
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 0) {
        quantityInput.value = currentValue - 1;
    }
}

function addQuantity() {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
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
