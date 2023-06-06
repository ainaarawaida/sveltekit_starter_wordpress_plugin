<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';

	let _datases;
	let postdata = '';
	onMount(async () => {
		_datases = JSON.parse(localStorage.getItem('_datases'));
	});

	const logout = () => {
		datases.update((value) => {
			_datases = value;
			delete _datases.auth;
			localStorage.setItem('_datases', JSON.stringify(_datases));
			return _datases;
		});
	};

	const fetchDataFunc = async () => {
		let getpost = apiData({ action: 'GetPost' }, _datases.user);
		postdata = (await getpost).post[0].post_content;
		console.log('getpost', await getpost);
	};
</script>

dashboard login user:
{_datases?.user?.user_display_name}

<a href="/" on:click|preventDefault={() => logout()}>Logout</a>
<br />
<a href="/" on:click|preventDefault={() => fetchDataFunc()}>Fetch Data</a>
<br />
{postdata}

settings
