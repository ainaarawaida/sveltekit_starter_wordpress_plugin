<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount } from 'svelte';
	import Header from './Header.svelte';
	import Sidebar from './Sidebar.svelte';
	import Navigation from './Navigation.svelte';
	import Footer from './Footer.svelte';

	onMount(async () => {});
</script>

<div class="overlayxp d-none">
	<progress class="position-absolute top-50" style="right:45%" />
</div>

<div
	class="min-vh-100"
	style="background-image: url('{base}/winxp/images/Wallpapers/Azul.jpg');background-size: 100vw 100vh;"
>
	<div class="row g-0">
		<div class="col">
			<slot />
		</div>
	</div>
	<div class="footer fixed-bottom" style="background-color:#0055ea;">
		<div class="btn-group dropup">
			<img
				src="{base}/winxp/images/XPButton.png"
				class="start-button img-fluid"
				style="width:120px;"
				id="start-button"
				alt=""
				data-bs-toggle="dropdown"
				aria-expanded="false"
				on:mouseover={(e) => {
					e.target.src = `${base}/winxp/images/XPButtonHover.png`;
				}}
				on:mouseleave={(e) => {
					e.target.src = `${base}/winxp/images/XPButton.png`;
				}}
			/>

			<ul
				class="dropdown-menu rounded-right rounded-3 xp0"
				style="background-color:#0256e9;width:400px;"
				on:mouseover={(e) => {
					document.querySelector('#start-button').src = `${base}/winxp/images/XPButtonClicked.png`;
				}}
				on:mouseleave={(e) => {
					document.querySelector('#start-button').src = `${base}/winxp/images/XPButton.png`;
				}}
			>
				<Navigation />
			</ul>
		</div>
	</div>
</div>
