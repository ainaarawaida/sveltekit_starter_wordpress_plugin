<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';
	import { base, assets } from '$app/paths';
	import { goto } from '$app/navigation';
	import { page } from '$app/stores';

	let _datases;
	let postdata = '';
	let mywinbox;
	onMount(async () => {
		_datases = JSON.parse(localStorage.getItem('_datases'));

		let interval = setInterval(() => {
			if (window.finishload) {
				clearInterval(interval);

				(function ($) {
					$('#draggable').draggable();
				})(jQuery);
			}
		}, 100);
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

	let openApp = async (url) => {
		if ($page.url.pathname == url) {
			if (document.querySelector('.wb-header')) {
				mywinbox.close(true);
			}

			let title = '';
			if (document.querySelector('.titleWindow')) {
				title = document.querySelector('.titleWindow').innerHTML
					? document.querySelector('.titleWindow').innerHTML
					: '';

				mywinbox = new WinBox(title, {
					mount: document.getElementById('dasboard_paparan'),
					index: 1033,
					top: 5,
					right: 5,
					bottom: 5,
					left: 5,
					onminimize: function () {
						document.querySelector(`#${this.id}`).style.left = '120px';
					},
					onmaximize: function () {
						document.querySelector(`#${this.id}`).style.left = '5px';
					}
				});
			}
		} else {
			goto(`${base}${url}`);

			if (document.querySelector('.wb-header')) {
				mywinbox.close(true);
			}
			let title = '';
			if (document.querySelector('.titleWindow')) {
				title = document.querySelector('.titleWindow').innerHTML
					? document.querySelector('.titleWindow').innerHTML
					: '';

				mywinbox = new WinBox(title, {
					mount: document.getElementById('dasboard_paparan'),
					index: 1033,
					top: 5,
					right: 5,
					bottom: 5,
					left: 5,
					onminimize: function () {
						document.querySelector(`#${this.id}`).style.left = '120px';
					},
					onmaximize: function () {
						document.querySelector(`#${this.id}`).style.left = '5px';
					}
				});
			}
		}
	};
</script>

<!-- dashboard login user:
{_datases?.user?.user_display_name}

<a href="/" on:click|preventDefault={() => logout()}>Logout</a>
<br />
<a href="/" on:click|preventDefault={() => fetchDataFunc()}>Fetch Data</a>
<br />
{postdata} -->

<div
	id="draggable"
	class="d-inline ui-widget-content"
	on:dblclick|preventDefault={() => openApp('/mycomputer')}
>
	<img src="{assets}/winxp/images/mycomputer.png" alt="" class="img-fluid" style="width:50px;" />
</div>

<div
	id="draggable"
	class="d-inline ui-widget-content"
	on:dblclick|preventDefault={() => openApp('/admin/dashboard')}
>
	<img src="{assets}/winxp/images/mycomputer.png" alt="" class="img-fluid" style="width:50px;" />
</div>
