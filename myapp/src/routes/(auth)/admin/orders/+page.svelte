<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';

	let _datases;
	let postdata = '';
	let mydatatablevar;
	let orderlist = [];

	onMount(async () => {
		_datases = JSON.parse(sessionStorage.getItem('_datases'));
		let getpost = apiData({ action: 'admin/orders' }, _datases.user);
		postdata = (await getpost).post;
		mydatatablevar.clear().rows.add(postdata).draw();
	});
	onDestroy(() => {
		let mytableremove = document.querySelector('#mydatatable_wrapper');
		if (mytableremove) {
			mytableremove.remove();
		}
	});

	const logout = () => {
		datases.update((value) => {
			_datases = value;
			delete _datases.auth;
			sessionStorage.setItem('_datases', JSON.stringify(_datases));
			return _datases;
		});
	};

	const fetchDataFunc = async () => {
		let getpost = apiData({ action: 'GetPost' }, _datases.user);
		postdata = (await getpost).post[0].post_content;
		console.log('getpost', await getpost);
	};

	let interval = setInterval(() => {
		if (window.finishload) {
			clearInterval(interval);
			(function ($) {
				mydatatablevar = $('#mydatatable').DataTable({
					ordering: false,
					dom: 'Bfrtip',
					select: true,
					scrollX: true,
					scrollY: '500px',
					scrollCollapse: true,
					lengthMenu: [
						[10, 25, 50, -1],
						['10 rows', '25 rows', '50 rows', 'Show all']
					],
					buttons: ['csv', 'excel', 'pdf', 'print', 'colvis', 'pageLength'],
					initComplete: function (settings, json) {
						$('#loading').hide();
					},
					data: orderlist,
					columns: [
						{
							title: 'Select',
							data: function (row, type, val, meta) {
								return meta.row + 1;
							},
							render: function (data, type, row, meta) {
								return '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">';
							}
						},
						{
							title: 'Order',
							data: function (row, type, val, meta) {
								// console.log("row", meta.row);
								return meta.row + 1;
							}
						},
						{
							title: 'Date',
							data: function (row, type, val, meta) {
								return meta.row + 1;
							},
							render: function (data, type, row, meta) {
								return '<a href="' + data + '">Download</a>';
							}
						},
						{
							title: 'Status',
							data: function (row, type, val, meta) {
								return meta.row + 1;
							},
							render: function (data, type, row, meta) {
								return '<a href="' + data + '">Download</a>';
							}
						},
						{
							title: 'Total',
							data: function (row, type, val, meta) {
								return meta.row + 1;
							},
							render: function (data, type, row, meta) {
								return '<a href="' + data + '">Download</a>';
							}
						},
						{
							title: 'Actions',
							data: function (row, type, val, meta) {
								return meta.row + 1;
							},
							render: function (data, type, row, meta) {
								return '<a href="' + data + '">Download</a>';
							}
						}
					],
					pageLength: -1
				});
			})(jQuery);
		}
	}, 100);
</script>

dashboard login user:
{_datases?.user?.user_display_name}

<a href="/" on:click|preventDefault={() => logout()}>Logout</a>
<br />
<a href="/" on:click|preventDefault={() => fetchDataFunc()}>Fetch Data</a>
<br />
{postdata}

Orders
<table id="mydatatable" class="display" style="width:100%" />
