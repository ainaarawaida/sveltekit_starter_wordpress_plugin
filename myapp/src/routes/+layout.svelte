<script>
	import { datases } from '$lib/store';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	import { assets, base } from '$app/paths';
	import { browser } from '$app/environment';
	import { page } from '$app/stores';

	let _datases;
	let unsubscribe_data;

	onMount(async () => {
		localStorage.setItem('assetEnv', assets);

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
