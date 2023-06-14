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

<div id="paparan" style="display: none">
	<div id="dasboard_paparan">
		<h1>Lorem Ipsum</h1>
		<p>Lorem ipsum [...]</p>
		<p>Duis autem vel [...]</p>
		<p>Ut wisi enim [...]</p>
	</div>
</div>
