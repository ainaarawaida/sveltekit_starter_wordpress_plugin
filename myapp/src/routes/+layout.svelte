<script>
	import { datases } from '$lib/store';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	import { assets, base } from '$app/paths';
	import { browser } from '$app/environment';
	import { page } from '$app/stores';
	import { loadScript } from '$lib/document.js';

	let _datases;
	let unsubscribe_data;

	onMount(async () => {
		localStorage.setItem('assetEnv', assets);
		await loadScript(`${assets}/assets/js/jquery-3.5.1.min.js`, `jquery-3.5.1.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather.min.js`, `feather.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather-icon.js`, `feather-icon.js`);
		// await loadScript(`${assets}/assets/js/sidebar-menu.js`, `sidebar-menu.js`);
		await loadScript(`${assets}/assets/js/config.js`, `config.js`);
		await loadScript(`${assets}/assets/js/bootstrap/popper.min.js`, `popper.min.js`);
		await loadScript(`${assets}/assets/js/bootstrap/bootstrap.min.js`, `bootstrap.min.js`);
		await loadScript(`${assets}/assets/js/prism/prism.min.js`, `prism.min.js`);
		await loadScript(`${assets}/assets/js/clipboard/clipboard.min.js`, `clipboard.min.js`);
		await loadScript(`${assets}/assets/js/custom-card/custom-card.js`, `custom-card.js`);
		await loadScript(`${assets}/assets/js/tooltip-init.js`, `tooltip-init.js`);

		await loadScript(`${assets}/assets/js/owlcarousel/owl.carousel.js`, `owl.carousel.js`);
		await loadScript(`${assets}/assets/js/owlcarousel/owl-custom.js`, `owl-custom.js`);
		await loadScript(`${assets}/assets/js/landing_sticky.js`, `landing_sticky.js`);
		await loadScript(`${assets}/assets/js/landing.js`, `landing.js`);
		await loadScript(`${assets}/assets/js/jarallax_libs/libs.min.js`, `libs.min.js`);
		await loadScript(`${assets}/assets/js/script.js`, `script.js`);
		await loadScript(`${assets}/assets/js/theme-customizer/customizer.js`, `customizer.js`);

		window.finishload = true;

		unsubscribe_data = datases.subscribe((value) => {
			_datases = value;
			if (_datases?.auth == true) {
				if ($page.url.pathname == '/') {
					goto(`${base}/admin/dashboard`);
				} else {
					goto($page.url.pathname);
				}
			} else {
				goto(`${base}/login`);
				goto(`${base}/`);
			}
		});
	});
	onDestroy(() => {
		if (browser) {
			unsubscribe_data();
		}
	});
</script>

<svelte:head>
	<!-- Google font-->
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
		rel="stylesheet"
	/>
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
		rel="stylesheet"
	/>
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
		rel="stylesheet"
	/>
	<!-- Font Awesome-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/fontawesome.css" />
	<!-- ico-font-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/icofont.css" />
	<!-- Themify icon-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/themify.css" />
	<!-- Flag icon-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/flag-icon.css" />
	<!-- Feather icon-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/feather-icon.css" />
	<!-- Plugins css start-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/prism.css" />
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/bootstrap.css" />
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/style.css" />
	<link id="color" rel="stylesheet" href="{assets}/assets/css/color-1.css" media="screen" />
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/responsive.css" />
</svelte:head>

<!-- Loader starts-->
<div class="loader-wrapper">
	<div class="theme-loader">
		<div class="loader-p" />
	</div>
</div>
<!-- Loader ends-->

<slot />
