<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	let _datases;
	onMount(async () => {
		_datases = JSON.parse(sessionStorage.getItem('_datases'));
	});

	const logout = () => {
		datases.update((value) => {
			_datases = value;
			delete _datases.auth;
			sessionStorage.setItem('_datases', JSON.stringify(_datases));
			return _datases;
		});
	};
</script>

dashboard login user:
{_datases?.user?.user_display_name}

<a href="/" on:click|preventDefault={() => logout()}>Logout</a>
