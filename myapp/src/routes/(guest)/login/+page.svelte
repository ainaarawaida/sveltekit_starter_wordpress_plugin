<script>
	import { assets, base } from '$app/paths';
	import { datases } from '$lib/store.js';
	import { apiDataLogin } from '$lib/apiData.js';
	// import { togglealert } from '$lib/shareFunc.js';
	import { onMount, onDestroy } from 'svelte';
	import { goto } from '$app/navigation';
	let fields = {};
	let _datases = {};
	let alert;

	const submitHandler = async () => {
		alert = '';
		let getpost = await apiDataLogin(fields.username, fields.password);
		if (getpost) {
			alert = `${getpost.message}`;
		}
	};
</script>

<section>
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="login-card">
					<form class="theme-form login-form" on:submit|preventDefault={submitHandler}>
						{#if alert}
							<div class="alert alert-primary alert-dismissible fade show" role="alert">
								{@html alert}
								<button
									class="btn-close"
									type="button"
									data-bs-dismiss="alert"
									aria-label="Close"
								/>
							</div>
							<br />
						{/if}
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
									placeholder="Username"
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
									placeholder="Password"
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
