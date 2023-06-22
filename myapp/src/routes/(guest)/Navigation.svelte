<script>
	import { base, assets } from '$app/paths';
</script>

<!-- header start-->
<header class="landing-header">
	<div class="custom-container">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-light p-0" id="navbar-example2">
					<a class="navbar-brand" href="javascript:void(0)">
						<img class="img-fluid" src="{assets}/assets/images/logo/logo.png" alt="" /></a
					>
					<ul class="landing-menu nav nav-pills">
						<li class="nav-item menu-back">back<i class="fa fa-angle-right" /></li>
						<li class="nav-item"><a class="nav-link" href="{base}/#home">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{base}/#demo">Demo</a></li>
						<li class="nav-item">
							<a class="nav-link" href="{base}/page3">Page3</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{base}/page4">Page4</a>
						</li>
					</ul>
					<div class="buy-block">
						<a class="btn-landing" href="{base}/login">Login</a>
						<div class="toggle-menu"><i class="fa fa-bars" /></div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- header end-->
