<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount } from 'svelte';
	import Header from './Header.svelte';
	import Sidebar from './Sidebar.svelte';
	import Footer from './Footer.svelte';

	onMount(async () => {
		await loadScript(`${assets}/assets/js/jquery-3.5.1.min.js`, `jquery-3.5.1.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather.min.js`, `feather.min.js`);
		await loadScript(`${assets}/assets/js/icons/feather-icon/feather-icon.js`, `feather-icon.js`);
		await loadScript(`${assets}/assets/js/sidebar-menu.js`, `sidebar-menu.js`);
		await loadScript(`${assets}/assets/js/config.js`, `config.js`);
		await loadScript(`${assets}/assets/js/bootstrap/popper.min.js`, `popper.min.js`);
		await loadScript(`${assets}/assets/js/bootstrap/bootstrap.min.js`, `bootstrap.min.js`);

		await loadScript(`${assets}/assets/js/chart/chartist/chartist.js`, `chartist.js`);
		await loadScript(
			`${assets}/assets/js/chart/chartist/chartist-plugin-tooltip.js`,
			`chartist-plugin-tooltip.js`
		);
		await loadScript(`${assets}/assets/js/chart/knob/knob.min.js`, `knob.min.js`);
		await loadScript(`${assets}/assets/js/chart/knob/knob-chart.js`, `knob-chart.js`);
		// await loadScript(`${assets}/assets/js/chart/apex-chart/apex-chart.js`, `apex-chart.js`);
		// await loadScript(`${assets}/assets/js/chart/apex-chart/stock-prices.js`, `stock-prices.js`);
		await loadScript(`${assets}/assets/js/prism/prism.min.js`, `prism.min.js`);
		await loadScript(`${assets}/assets/js/clipboard/clipboard.min.js`, `clipboard.min.js`);
		await loadScript(
			`${assets}/assets/js/counter/jquery.waypoints.min.js`,
			`jquery.waypoints.min.js`
		);
		await loadScript(
			`${assets}/assets/js/counter/jquery.counterup.min.js`,
			`jquery.counterup.min.js`
		);
		await loadScript(`${assets}/assets/js/counter/counter-custom.js`, `counter-custom.js`);
		await loadScript(`${assets}/assets/js/custom-card/custom-card.js`, `custom-card.js`);
		await loadScript(
			`${assets}/assets/js/notify/bootstrap-notify.min.js`,
			`bootstrap-notify.min.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js`,
			`jquery-jvectormap-2.0.2.min.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js`,
			`jquery-jvectormap-world-mill-en.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js`,
			`jquery-jvectormap-us-aea-en.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js`,
			`jquery-jvectormap-uk-mill-en.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-au-mill.js`,
			`jquery-jvectormap-au-mill.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js`,
			`jquery-jvectormap-chicago-mill-en.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-in-mill.js`,
			`jquery-jvectormap-in-mill.js`
		);
		await loadScript(
			`${assets}/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js`,
			`jquery-jvectormap-asia-mill.js`
		);
		// await loadScript(`${assets}/assets/js/dashboard/default.js`, `default.js`);
		await loadScript(`${assets}/assets/js/notify/index.js`, `index.js`);
		await loadScript(
			`${assets}/assets/js/datepicker/date-picker/datepicker.js`,
			`date-picker/datepicker.js`
		);
		await loadScript(
			`${assets}/assets/js/datepicker/date-picker/datepicker.en.js`,
			`datepicker.en.js`
		);
		await loadScript(
			`${assets}/assets/js/datepicker/date-picker/datepicker.custom.js`,
			`datepicker.custom.js`
		);
		await loadScript(`${assets}/assets/js/script.js`, `script.js`);
		await loadScript(`${assets}/assets/js/theme-customizer/customizer.js`, `customizer.js`);

		/////////////////////////////////
		//Datatable start
		await loadScript(
			`${assets}/assets/js/jquery.dataTables.min.js`,
			`${assets}jquery.dataTables.min.js`
		);
		await loadScript(`${assets}/assets/js/dataTables.buttons.min.js`, `dataTables.buttons.min.js`);
		await loadScript(`${assets}/assets/js/jszip.min.js`, `jszip.min.js`);
		await loadScript(`${assets}/assets/js/pdfmake.min.js`, `pdfmake.min.js`);
		await loadScript(`${assets}/assets/js/vfs_fonts.js`, `vfs_fonts.js`);
		await loadScript(`${assets}/assets/js/buttons.html5.min.js`, `buttons.html5.min.js`);
		await loadScript(`${assets}/assets/js/buttons.print.min.js`, `buttons.print.min.js`);
		await loadScript(`${assets}/assets/js/dataTables.select.min.js`, `dataTables.select.min.js`);
		await loadScript(`${assets}/assets/js/buttons.colVis.min.js`, `buttons.colVis.min.js`);

		//Datatable end
		/////////////////////////////////

		/////////////////////////////////
		//select2 start

		await loadScript(`${assets}/assets/js/select2/select2.full.min.js`, `select2.full.min.js`);

		//select2 end
		/////////////////////////////////

		// finishload = true;
		window.finishload = true;
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
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/chartist.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/date-picker.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/prism.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/vector-map.css" />
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/bootstrap.css" />
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/style.css" />
	<link id="color" rel="stylesheet" href="{assets}/assets/css/color-1.css" media="screen" />
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/datatables.css" />
	<link rel="stylesheet" type="text/css" href="{assets}/assets/css/datatable-extension.css" />
</svelte:head>

<!-- Loader starts-->
<div class="loader-wrapper">
	<div class="theme-loader">
		<div class="loader-p" />
	</div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
	<Header />
	<div class="page-body-wrapper sidebar-icon">
		<Sidebar />

		<div class="page-body">
			<!-- Container-fluid starts-->
			<div class="container-fluid dashboard-default-sec">
				<slot />
			</div>
		</div>
		<Footer />
	</div>
</div>
