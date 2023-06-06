<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';
	import { assets, base } from '$app/paths';

	let _datases;
	const logout = () => {
		datases.update((value) => {
			_datases = value;
			delete _datases.auth;
			localStorage.setItem('_datases', JSON.stringify(_datases));
			return _datases;
		});
	};
</script>

<button class="btn btn-primary-light" type="button"
	><a href="/" on:click|preventDefault={() => logout()}><i data-feather="log-out" />Log out</a
	></button
>
