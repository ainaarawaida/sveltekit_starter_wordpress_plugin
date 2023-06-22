<script>
	import { base, assets } from '$app/paths';
	import { loadScript } from '$lib/document.js';
	import { onMount, onDestroy } from 'svelte';
	onMount(async () => {
		let interval = setInterval(async () => {
			if (window.finishload) {
				clearInterval(interval);
				await loadScript(`${assets}/assets/js/script.js`, `script.js`);
			}
		}, 100);
	});
</script>

<section class="landing-home section-pb-space" id="home">
	<img
		class="img-fluid bg-img-cover"
		src="{assets}/assets/images/landing/landing-home/home-bg2.jpg"
		alt=""
	/>
	<div class="custom-container">
		<div class="row">
			<div class="col-12">
				<div class="landing-home-contain">
					<div>
						<div class="landing-logo">
							<img
								class="img-fluid"
								src="{assets}/assets/images/landing/landing-home/logo.png"
								alt=""
							/>
						</div>
						<h6>clean design</h6>
						<h2>viho Bootstrap <span>Admin Template</span></h2>
						<p>
							When it comes to dashboard or web apps. one of the first impression you consider is
							the design. It needs to be high quality enough otherwise you will lose potential users
							due to bad design.
						</p>
						<a class="btn-landing btn-lg" href="index.html" target="_blank">view demo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="position-block">
		<div class="circle1 opicity3" />
		<div class="star"><i class="fa fa-asterisk" /></div>
		<div class="star star1"><i class="fa fa-asterisk" /></div>
		<div class="star star2 opicity3"><i class="fa fa-asterisk" /></div>
		<div class="star star3"><i class="fa fa-times" /></div>
		<div class="star star4 opicity3"><i class="fa fa-times" /></div>
		<div class="star star5 opicity3"><i class="fa fa-times" /></div>
		<ul class="animat-block">
			<li>
				<img
					class="img-fluid img-parten top-parten"
					src="{assets}/assets/images/landing/landing-home/home-position/img-parten.png"
					alt=""
				/>
				<div>
					<img
						class="img-fluid img1 v-align-t m-t-30"
						src="{assets}/assets/images/landing/landing-home/home-position/img-1.jpg"
						alt=""
					/><img
						class="img-fluid img2 v-align-t"
						src="{assets}/assets/images/landing/landing-home/home-position/img-2.jpg"
						alt=""
					/><img
						class="img-fluid img3 v-align-b"
						src="{assets}/assets/images/landing/landing-home/home-position/img-3.jpg"
						alt=""
					/><img
						class="img-fluid img4 v-align-b"
						src="{assets}/assets/images/landing/landing-home/home-position/img-4.jpg"
						alt=""
					/>
				</div>
			</li>
			<li>
				<div>
					<img
						class="img-fluid img5"
						src="{assets}/assets/images/landing/landing-home/home-position/img-5.png"
						alt=""
					/><img
						class="img-fluid img6 v-align-c"
						src="{assets}/assets/images/landing/landing-home/home-position/img-6.jpg"
						alt=""
					/>
				</div>
			</li>
			<li>
				<img
					class="img-fluid img-parten bottom-parten"
					src="{assets}/assets/images/landing/landing-home/home-position/img-parten.png"
					alt=""
				/>
				<div>
					<img
						class="img-fluid img7 v-align-t"
						src="{assets}/assets/images/landing/landing-home/home-position/img-7.jpg"
						alt=""
					/><img
						class="img-fluid img8 v-align-t"
						src="{assets}/assets/images/landing/landing-home/home-position/img-8.jpg"
						alt=""
					/><img
						class="img-fluid img9"
						src="{assets}/assets/images/landing/landing-home/home-position/img-9.jpg"
						alt=""
					/>
				</div>
			</li>
		</ul>
	</div>
</section>
