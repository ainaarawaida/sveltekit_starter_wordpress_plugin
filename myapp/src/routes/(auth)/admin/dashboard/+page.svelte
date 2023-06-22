<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';
	import { base, assets } from '$app/paths';

	let _datases;
	let postdata = '';
	onMount(async () => {
		_datases = JSON.parse(localStorage.getItem('_datases'));

		let interval = setInterval(() => {
			if (window.finishload) {
				clearInterval(interval);
			}
		}, 100);
	});
</script>

<div class="p-1">
	<div class="titleWindow d-none">Dashboard</div>
	<div class="row g-0">
		<div class="col">Dashboard</div>
	</div>
</div>
