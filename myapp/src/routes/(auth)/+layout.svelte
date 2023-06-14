<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount, onDestroy } from 'svelte';
	import Header from './Header.svelte';
	import Sidebar from './Sidebar.svelte';
	import Navigation from './Navigation.svelte';
	import Desktop from './Desktop.svelte';
	import Footer from './Footer.svelte';

	let clock_interval;
	let clock = new Intl.DateTimeFormat('en-US', {
		timeStyle: 'medium'
	}).format(new Date());

	onMount(async () => {
		clock_interval = setInterval(() => {
			clock = new Intl.DateTimeFormat('en-US', {
				timeStyle: 'medium'
			}).format(new Date());
		}, 1000);
	});

	onDestroy(() => {
		clearInterval(clock_interval);
	});
</script>

<div class="overlayxp d-none">
	<progress class="position-absolute top-50" style="right:45%" />
</div>

<div
	class="min-vh-100"
	style="background-image: url('{assets}/winxp/images/Wallpapers/Azul.jpg');background-size: 100vw 100vh;"
>
	<div class="row g-0">
		<div class="col m-3">
			<Desktop />
			<div id="paparan" style="display: none">
				<div id="dasboard_paparan">
					<slot />
				</div>
			</div>
		</div>
	</div>

	<div class="footer fixed-bottom" style="background-color:#0055ea;">
		<div class="dropup">
			<div class="d-inline">
				<img
					src="{assets}/winxp/images/XPButton.png"
					class="start-button img-fluid"
					style="width:120px;"
					id="start-button"
					alt=""
					data-bs-toggle="dropdown"
					aria-expanded="false"
					on:mouseover={(e) => {
						e.target.src = `${assets}/winxp/images/XPButtonHover.png`;
					}}
					on:mouseleave={(e) => {
						e.target.src = `${assets}/winxp/images/XPButton.png`;
					}}
				/>

				<ul
					class="winxpmenu01 dropdown-menu rounded-right rounded-3 xp0"
					style="width:400px;"
					on:mouseover={(e) => {
						document.querySelector(
							'#start-button'
						).src = `${assets}/winxp/images/XPButtonClicked.png`;
					}}
					on:mouseleave={(e) => {
						document.querySelector('#start-button').src = `${assets}/winxp/images/XPButton.png`;
					}}
				>
					<Navigation />
				</ul>
			</div>
			<div class="d-inline minfieldxp position-fixed p-1 w-5">&nbsp;</div>

			<div class="float-end winxpclock" style="">
				<img src="{assets}/winxp/images/Untitled1.png" alt="" />
				<img src="{assets}/winxp/images/Untitled2.png" alt="" />
				<img src="{assets}/winxp/images/Untitled3.png" alt="" /> &nbsp;<span id="clock"
					>{clock}</span
				>
			</div>
		</div>
	</div>
</div>
