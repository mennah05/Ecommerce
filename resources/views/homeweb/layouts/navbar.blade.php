<body>
	<header>
    <div class="container-main">
			<div class="navbar-main-dv">
				<div class="logo-dv">
					<a href="./index.html">
						<img class="logo-main" src="{{asset('homeweb/images/Logo.png')}}" alt="logo">
					</a>
				</div>
				<div class="nav-items">
					<ul class="mb-0">
						<li><a href="{{route('index')}}" class="nav-linkss">Home</a></li>
						<li><a href="{{route('disease')}}" class="nav-linkss">Shop By Disease</a></li>
						<li><a href="{{route('product')}}" class="nav-linkss">Shop By Product</a></li>
						<li><a href="{{route('about')}}" class="nav-linkss">About</a></li>
						<li><a href="{{route('contact')}}" class="nav-linkss">Contact Us</a></li>
					</ul>
				</div>
				<div class="nav-profl-login">
					<a href="{{ route('profile') }}"><i class="ri-user-line text-white"></i></a>
					<a href="{{ route('cart') }}"><i class="ri-shopping-cart-2-line text-white"></i></a>
					<div class="menulogo d-md-block d-lg-none" onclick="toggleCartt()"><i class="ri-menu-2-line text-white"></i></div>
				</div>
			</div>
			<div class="serach-box">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search...">
					<div class="input-group-append">
						<button class="btn bg-white" type="button">
							<i class="ri-search-line primary-color"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header end  -->
	<!-- sidebar  -->
	<div class="sidebar">
		<div class="navbar-sidebar">
			<ul>
				<li><a class="active" href="{{route('index')}}">Home</a></li>
				<li><a class="active" href="{{route('disease')}}">Shop By Disease</a></li>
				<li><a class="active" href="{{route('product')}}">Shop By Product</a></li>
				<li><a class="active" href="{{route('about')}}">About</a></li>
				<li><a class="active" href="{{route('contact')}}">Contact Us</a></li>
				<li><a class="active" href="./profile.html">Profile</a></li>
				<li><a class="active" href="./cart.html">Cart</a></li>
				<li><a class="active" href="./signin.html">Sign in</a></li>
				<li><a class="active" href="./signup.html">Sign up</a></li>
			</ul>
		</div>
		<div class="d-inline closse" onclick="toggleCartt()"><i class="ri-close-circle-line"></i></div>
	</div>





    <script>

function toggleCartt(){
	document.querySelector('.sidebar').classList.toggle('open-cart');
	}
    </script>
