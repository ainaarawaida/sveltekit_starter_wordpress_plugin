<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount, onDestroy } from 'svelte';
	import { datases, data } from '$lib/store';
	import { browser } from '$app/environment';

	let _data;

	onMount(async () => {});
	onDestroy(() => {
		if (browser) {
			// unsubscribe_data_guest();
		}
	});

	let openlogin = (user) => {
		data.update((value) => {
			_data = value || {};
			_data.loginform = user;
			localStorage.setItem('_data', JSON.stringify(_data));
			return _data;
		});
	};
</script>

<div class="overlayxp d-none">
	<progress class="position-absolute top-50" style="right:45%" />
</div>

<div class="winxplogin00">
	<div class="row g-0 winxplogin01">
		<div class="col" />
	</div>
	<div class="row g-0 winxplogin02" />
	<div class="row g-0 winxplogin03">
		<div class="row g-0">
			<div class="col xphorizontalborder">
				<div class="row g-0">
					<img src="{assets}/logo-my.png" alt="" class="img-fluid" style="width:300px;" />
				</div>
				<div class="row g-0 winxplogin06">To begin, click your user name</div>
			</div>
			<div class="col">
				<div class="d-flex align-items-center" style="height: 100%;">
					<div class="d-flex flex-column p-3">
						<div class="p-3 winxplogin08" on:click|preventDefault={() => openlogin('user')}>
							<div class="d-flex">
								<img
									src="{assets}/winxp/images/profile-picture-duck.jpg"
									alt=""
									class="img-fluid winxplogin07"
									style="width:80px;"
								/>
								<div class="winxplogin09">User</div>
							</div>
						</div>
						<div class="p-3 winxplogin08" on:click|preventDefault={() => openlogin('guest')}>
							<div class="d-flex">
								<img
									src="{assets}/winxp/images/profile-picture-chess.png"
									alt=""
									class="img-fluid winxplogin07"
									style="width:80px;"
								/>
								<div class="winxplogin09">Guest</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row g-0 winxplogin04" />
	<div class="row g-0 winxplogin05">
		<div class="col" />
	</div>
</div>

<slot />

<style>
	.winxplogin09 {
		font-size: 24px;
		color: #fff;
		font-family: sans-serif;
		line-height: 1.15;
		margin: 10px;
	}
	.winxplogin08:hover {
		cursor: pointer;
		background: linear-gradient(90deg, #00489a 60%, rgba(255, 255, 255, 0) 100%);
		background-clip: border-box;
		background-clip: padding-box;
		opacity: 1;

		/* outline: none; */
		cursor: pointer;
		min-width: 400px;
		max-width: 100%;
		padding: 12px;
		border-radius: 8px;
		border-top-right-radius: 8px;
		border-bottom-right-radius: 8px;
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
		border: 1px solid #fff;
		border-right: 0;
		position: relative;
		background-clip: padding-box;
	}
	.winxplogin08 {
		opacity: 0.5;
	}
	.winxplogin07:hover {
		opacity: 1;
		border-color: #ffcc36;
	}
	.winxplogin07 {
		border: 3px solid #fff;
		border-radius: 5px;
		box-shadow: 3px 3px 3px 0 rgba(0, 0, 0, 0.3);
	}
	.winxplogin06 {
		text-align: right;
		font-size: 24px;
		font-family: sans-serif;
		line-height: 1.15;
		margin-top: 25px;
	}

	.winxplogin00 {
		width: 100vw;
		height: 100vh;
		background-color: #004da3;
		color: #fff;
	}

	.winxplogin01 {
		background-color: #004da3;
		height: 100px;
	}

	.winxplogin02 {
		background-color: #004da3;
		border-style: solid;
		border-image-slice: 1;
		border-image-source: linear-gradient(
			90deg,
			#004da3 0%,
			rgba(255, 255, 255, 0.8) 30%,
			rgba(255, 255, 255, 0.9) 40%,
			rgba(255, 255, 255, 0.9) 50%,
			#004da3 100%
		);
		border-width: 0 0 4px 0;
	}

	.winxplogin03 {
		background-color: #508fd9;
		height: 60vh;
		background-image: radial-gradient(
			circle,
			rgba(255, 255, 255, 0.6) -21%,
			rgba(255, 255, 255, 0) 60%,
			rgba(255, 255, 255, 0) 100%
		);
		background-size: 700px 700px;
		background-position: -240px -210px;
		background-repeat: no-repeat;
		z-index: 0;
	}

	.winxplogin04 {
		border-style: solid;
		border-image-slice: 1;
		border-image-source: linear-gradient(
			90deg,
			#004da3 0%,
			#f09644 30%,
			#f09644 40%,
			#f09644 50%,
			#004da3 100%
		);
		border-width: 0 0 4px 0;
	}

	.winxplogin05 {
		background-color: #004da3;
	}

	.xphorizontalborder {
		display: flex;
		flex-direction: column;
		justify-content: center;
		padding-right: 30px;
		align-items: flex-end;
		border-right-width: 1px;
		border-image-source: linear-gradient(
			180deg,
			rgba(255, 255, 255, 0) 0%,
			rgba(255, 255, 255, 0) 5%,
			rgba(255, 255, 255, 0.5) 15%,
			rgba(255, 255, 255, 0.5) 50%,
			rgba(255, 255, 255, 0.5) 85%,
			rgba(255, 255, 255, 0) 95%,
			rgba(255, 255, 255, 0) 100%
		);
		border-image-slice: 0 1 0 0;
		border-right-style: solid;
	}
</style>
