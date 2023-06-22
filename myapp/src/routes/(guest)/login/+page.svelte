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
	import { loadScript } from '$lib/document.js';

	const submitHandler = async () => {
		alert = '';
		let getpost = await apiDataLogin(fields.username, fields.password);

		if (getpost) {
			window.alert(`${getpost.message}`);
		}
	};

	onMount(async () => {
		let interval = setInterval(async () => {
			if (window?.finishload) {
				clearInterval(interval);

				await loadScript(`${assets}/assets/js/icons/feather-icon/feather.min.js`, `feather.min.js`);
				await loadScript(
					`${assets}/assets/js/icons/feather-icon/feather-icon.js`,
					`feather-icon.js`
				);

				unsubscribe_data_login = data.subscribe((value) => {
					_data = value;
				});
			}
		}, 100);
	});

	onDestroy(() => {
		if (browser) {
			unsubscribe_data_login;
		}
	});
</script>

<!-- page-wrapper Start-->
<section class="mt-5">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="login-card">
					<form class="theme-form login-form" on:submit|preventDefault={submitHandler}>
						<h4>Login</h4>
						<h6>Welcome back! Log in to your account.</h6>
						<div class="form-group">
							<label>Email Address</label>
							<div class="input-group">
								<span class="input-group-text"><i class="icon-email" /></span>
								<input
									class="form-control"
									type="text"
									id="username"
									placeholder=""
									bind:value={fields.username}
									required
								/>
							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
								<span class="input-group-text"><i class="icon-lock" /></span>

								<input
									class="form-control"
									type="password"
									id="password"
									placeholder=""
									bind:value={fields.password}
									required
								/>
								<div class="show-hide"><span class="show" /></div>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<input id="checkbox1" type="checkbox" />
								<label for="checkbox1">Remember password</label>
							</div>
							<a class="link" href="forget-password.html">Forgot password?</a>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" type="submit">Sign in</button>
						</div>
						<div class="login-social-title">
							<h5>Sign in with</h5>
						</div>
						<div class="form-group">
							<ul class="login-social">
								<li>
									<a href="https://www.linkedin.com/login" target="_blank"
										><i data-feather="linkedin" /></a
									>
								</li>
								<li>
									<a href="https://www.linkedin.com/login" target="_blank"
										><i data-feather="twitter" /></a
									>
								</li>
								<li>
									<a href="https://www.linkedin.com/login" target="_blank"
										><i data-feather="facebook" /></a
									>
								</li>
								<li>
									<a href="https://www.instagram.com/login" target="_blank"
										><i data-feather="instagram" /></a
									>
								</li>
							</ul>
						</div>
						<p>Don't have account?<a class="ms-2" href="log-in.html">Create Account</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
