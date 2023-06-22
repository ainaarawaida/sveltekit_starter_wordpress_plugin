<script>
	import { assets, base } from '$app/paths';
	import { page } from '$app/stores';
	import { onMount, onDestroy, tick } from 'svelte';

	let _datases;
	onMount(async () => {
		_datases = JSON.parse(localStorage.getItem('_datases'));
	});
</script>

<!-- Page Sidebar Start-->
<header class="main-nav">
	<nav>
		<div class="main-navbar">
			<div id="mainnav">
				<ul class="nav-menu custom-scrollbar">
					<li class="back-btn">
						<div class="mobile-back text-end">
							<span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true" />
						</div>
					</li>
					<li class="dropdown">
						<a class="nav-link menu-title" href="../theme/index.html" target="_blank"
							><i data-feather="home" /><span>Dashboard</span></a
						>
					</li>
					<li class="dropdown">
						<a class="nav-link menu-title" href="javascript:void(0)"
							><i data-feather="anchor" /><span>Starter kit</span></a
						>
						<ul class="nav-submenu menu-content">
							<li>
								<a class="submenu-title" href="javascript:void(0)"
									>color version<span class="sub-arrow"><i class="fa fa-chevron-right" /></span></a
								>
								<ul class="nav-sub-childmenu submenu-content">
									<li><a href="index.html">Layout Light</a></li>
									<li><a href="layout-dark.html">Layout Dark</a></li>
								</ul>
							</li>
							<li>
								<a class="submenu-title" href="javascript:void(0)"
									>Page layout<span class="sub-arrow"><i class="fa fa-chevron-right" /></span></a
								>
								<ul class="nav-sub-childmenu submenu-content">
									<li><a href="boxed.html">Boxed</a></li>
									<li><a href="layout-rtl.html">RTL </a></li>
								</ul>
							</li>
							<li>
								<a class="submenu-title" href="javascript:void(0)"
									>Footers<span class="sub-arrow"><i class="fa fa-chevron-right" /></span></a
								>
								<ul class="nav-sub-childmenu submenu-content">
									<li><a href="footer-light.html">Footer Light</a></li>
									<li><a href="footer-dark.html">Footer Dark</a></li>
									<li><a href="footer-fixed.html">Footer Fixed</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title"
							href="http://support.pixelstrap.com/help-center"
							target="_blank"><i data-feather="headphones" /><span>Raise Support</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title"
							href="https://docs.pixelstrap.com/viho/document/"
							target="_blank"><i data-feather="file-text" /><span>Documentation </span></a
						>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- Page Sidebar Ends-->
