<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount } from 'svelte';

	onMount(async () => {
		await loadScript(`${assets}/assets/js/jquery-3.5.1.min.js`, `jquery-3.5.1.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather.min.js`, `feather.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather-icon.js`, `feather-icon.js`);
		await loadScript(`${assets}/assets/js/sidebar-menu.js`, `sidebar-menu.js`);
		await loadScript(`${assets}/assets/js/config.js`, `config.js`);
		await loadScript(`${assets}/assets/js/bootstrap/popper.min.js`, `popper.min.js`);
		await loadScript(`${assets}/assets/js/bootstrap/bootstrap.min.js`, `bootstrap.min.js`);
		await loadScript(`${assets}/assets/js/script.js`, `script.js`);
	});
</script>

<svelte:head>
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
