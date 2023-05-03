<script>
	import { assets, base } from '$app/paths';
	let fields = {};
	const submitHandler = async () => {
		let apidata = new Promise(function (myResolve, myReject) {
			let dataArray = new FormData();
			dataArray.append('action', 'Login');
			dataArray.append('username', fields.username);
			dataArray.append('password', fields.password);

			console.log('base', base);

			fetch(
				`${import.meta.env.VITE_MYBASE}/wp-json/jwt-auth/v1/token?username=${
					fields.username
				}&password=${fields.password}`,
				{
					method: 'POST',
					body: dataArray
				}
			)
				.then((response) => {
					// console.log("response", response);
					if (response.ok) {
						return response.json();
					} else {
						alert('salah username atau password');
					}
				})
				.then((result) => {
					myResolve(result);
				})
				.catch((error) => console.log('error', error));
		});

		console.log(await apidata);
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
