<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount, onDestroy } from 'svelte';
	import { datases, data } from '$lib/store';
	import { browser } from '$app/environment';
	import Navigation from './Navigation.svelte';
	import Footer from './Footer.svelte';

	let _data;

	onMount(async () => {});
	onDestroy(() => {
		if (browser) {
			// unsubscribe_data_guest();
		}
	});
</script>

<div class="landing-wrraper">
	<!-- tap on top starts-->
	<div class="tap-top"><i data-feather="chevrons-up" /></div>
	<!-- tap on tap ends-->
	<!-- page-wrapper Start-->
	<div class="page-wrapper landing-page">
		<!-- Page Body Start-->
		<div class="page-body-wrapper">
			<Navigation />
			<slot />

			<Footer />
		</div>
	</div>
</div>
