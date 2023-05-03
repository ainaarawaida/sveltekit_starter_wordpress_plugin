<script>
	import { datases } from '$lib/store';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	import { assets, base } from '$app/paths';
	import { browser } from '$app/environment';

	let _datases;
	let unsubscribe_data;

	onMount(async () => {
		unsubscribe_data = datases.subscribe((value) => {
			_datases = value;
			if (_datases?.auth == true) {
				goto(`${base}/dashboard`);
			} else {
				goto(`${base}/login`);
			}
		});
	});
	onDestroy(() => {
		if (browser) {
			unsubscribe_data();
		}
	});
</script>

<slot />
