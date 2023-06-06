<script>
	import { assets, base } from '$app/paths';
	import { datases, data } from '$lib/store.js';
	import { apiDataLogin } from '$lib/apiData.js';
	// import { togglealert } from '$lib/shareFunc.js';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	import { browser } from '$app/environment';
	let fields = {};
	let _datases = {};
	let _data = {};
	let alert;
	let myModal;
	let unsubscribe_data_login;

	const submitHandler = async () => {
		alert = '';
		myModal.toggle();
		document.querySelector('.overlayxp').classList.toggle('d-none');
		let getpost = await apiDataLogin(fields.username, fields.password);
		if (getpost) {
			alert = `${getpost.message}`;
		}
	};

	onMount(async () => {
		let interval = setInterval(() => {
			if (window?.finishload) {
				clearInterval(interval);
				// myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
				// 	backdrop: 'static',
				// 	keyboard: false
				// });
				myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

				unsubscribe_data_login = data.subscribe((value) => {
					_data = value;
					if (_data?.loginform == 'user') {
						myModal.toggle();
					} else if (_data?.loginform == 'guest') {
						myModal.toggle();
					}
				});
			}
		}, 100);
	});

	onDestroy(() => {
		if (browser) {
			unsubscribe_data_login();
		}
	});
</script>

<!-- Modal -->
<div
	class="modal fade"
	id="exampleModal"
	tabindex="-1"
	aria-labelledby="exampleModalLabel"
	aria-hidden="false"
>
	<div class="modal-dialog">
		<div class="window modal-content">
			<div class="title-bar">
				<div class="title-bar-text">Log On To System</div>
			</div>
			<div class="row g-0 xp4">
				<div class="col xp3">
					<img
						src="{assets}/logo-my.png"
						class="img-fluid mx-auto d-block mt-4"
						style="width:100px;"
						alt="logo"
					/>
				</div>
			</div>
			<div id="orangeBar" />
			<form class="theme-form login-form" on:submit|preventDefault={submitHandler}>
				<div class="window-body">
					<div class="row m-2 g-1">
						<div class="col-3">
							<label class="text-end d-block" for="text21">PC User name:</label>
						</div>
						<div class="col">
							<input
								style="width:60%;"
								class="form-control"
								type="text"
								id="username"
								placeholder=""
								bind:value={fields.username}
								required
							/>
						</div>
					</div>

					<div class="row m-2 g-1">
						<div class="col-3">
							<label class="text-end d-block" for="text21">PC Password:</label>
						</div>
						<div class="col">
							<input
								style="width:60%;"
								class="form-control"
								type="password"
								id="password"
								placeholder=""
								bind:value={fields.password}
								required
							/>
						</div>
					</div>
					<br />
					<section class="field-row" style="justify-content: flex-end">
						<button type="submit">Login</button>
					</section>
				</div>
			</form>
		</div>
	</div>
</div>
