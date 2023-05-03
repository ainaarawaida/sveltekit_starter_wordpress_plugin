<script>
	import { assets, base } from '$app/paths';
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	let fields = {};
	let _datases = {};
	const submitHandler = async () => {
		let dataArray = new FormData();
		dataArray.append('action', 'Login');
		dataArray.append('username', fields.username);
		dataArray.append('password', fields.password);

		let getFetch = await fetch(
			`${import.meta.env.VITE_AUTHURL}/wp-json/jwt-auth/v1/token?username=${
				fields.username
			}&password=${fields.password}`,
			{
				method: 'POST',
				body: dataArray
			}
		);

		if (getFetch.ok == true) {
			let getFetchData = await getFetch.json();
			datases.update((value) => {
				_datases = value || {};
				_datases.auth = true;
				_datases.user = getFetchData;
				sessionStorage.setItem('_datases', JSON.stringify(_datases));
				return _datases;
			});
			goto(`${base}/dashboard`);
		} else {
			alert('error');
		}
	};
</script>

<form on:submit|preventDefault={submitHandler}>
	<input
		type="text"
		id="username"
		class="form-control form-control-xl"
		placeholder="Username"
		bind:value={fields.username}
		required
	/>

	<input
		type="password"
		id="password"
		class="form-control form-control-xl"
		placeholder="Password"
		bind:value={fields.password}
		required
	/>

	<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5 translateX" type="submit"
		>Sign in</button
	>
</form>
