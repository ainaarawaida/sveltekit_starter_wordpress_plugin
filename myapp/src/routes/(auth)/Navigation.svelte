<script>
	import { datases } from '$lib/store.js';
	import { assets, base } from '$app/paths';
	import { page } from '$app/stores';
	import { onMount, onDestroy, tick } from 'svelte';

	let _datases;
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
</script>

<div class="row xp1 g-0">
	<div class="col">
		<div class="m-1">
			<img
				src="{assets}/winxp/images/xpIcons/user1.png"
				class="img-fluid border border-white border-2 mx-1 rounded-3"
				alt=""
				width="50px;"
			/> <span class="xp2">User</span>
		</div>
	</div>
</div>
<div class="row g-0 mx-1">
	<div class="col-6">
		<div class="w-100 winxpmainmenuleft">
			<div class="row g-0 p-1">
				<div class="col-2">
					<img src="{assets}/winxp/images/browser.png" class="img-fluid" alt="" />
				</div>
				<div class="col-10 winxpmenu">
					<div>Internet</div>
					<span>Internet Explorer</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="w-100 winxpmainmenuright">
			<div class="row g-0 p-1">
				<div class="col-2">
					<img src="{assets}/winxp/images/browser.png" class="img-fluid" alt="" />
				</div>
				<div class="col-10 winxpmenu">
					<div class="align-middle">Internet</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row xp1 g-0">
	<div class="col">
		<div class="m-1">
			<div class="row">
				<div class="col">
					<div class="float-end p-1">
						<div class="d-inline btn" on:click|preventDefault={() => logout()}>
							<img src="{assets}/winxp/images/logoff.png" class="img-fluid m-1" alt="" />
							<div class="d-inline text-light">Log Off</div>
						</div>
						<div class="d-inline btn" on:click|preventDefault={() => logout()}>
							<img src="{assets}/winxp/images/shutdown.png" class="img-fluid m-1" alt="" />
							<div class="d-inline text-light">Turn Off</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
