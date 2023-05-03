<script>
	import { datases } from '../../lib/store';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	import { assets, base } from '$app/paths';

	let _datases;
	let unsubscribe_data;

	onMount(async () => {
		unsubscribe_data = datases.subscribe((value) => {
			_datases = value;
		});
	});
	onDestroy(() => {
		unsubscribe_data;
	});

	console.log('dd', assets);

	$: console.log('_datases', _datases?.auth);
	$: if (_datases?.auth == true) {
		goto(`${base}/dashboard`);
	} else {
		goto(`${base}/login`);
	}
</script>

main
<slot />
