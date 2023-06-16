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
		await loadScript(`${assets}/winxp/js/jquery-ui.js`, `jquery-ui.js`);

		await loadScript(`${assets}/winxp/js/bootstrap.bundle.min.js`, `bootstrap.bundle.min.js`);

		await loadScript(`${assets}/winxp/js/interactive.min.js`, `interactive.min.js`);

		await loadScript(`${assets}/winxp/js/winbox.min.js`, `winbox.min.js`);

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
	<link href="{assets}/winxp/css/bootstrap.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="{assets}/winxp/css/XP.css" />
	<link rel="stylesheet" href="{assets}/winxp/css/customwinxp.css" />

	<link href="{assets}/winxp/css/interactive.min.css" rel="stylesheet" />

	<link href="{assets}/winxp/css/winbox.min.css" rel="stylesheet" />
</svelte:head>

<slot />
