<script>
	import { datases } from '$lib/store.js';
	import { onMount, onDestroy } from 'svelte';
	import { apiData } from '$lib/apiData.js';
	import { assets, base } from '$app/paths';
	let _datases;
	let postdata = '';
	let mydatatablevar;
	let orderlist = [];

	onMount(async () => {
		_datases = JSON.parse(sessionStorage.getItem('_datases'));
		let getpost = apiData({ action: 'admin/orders' }, _datases.user);
		postdata = (await getpost).post;
		console.log('postdata', postdata);
		mydatatablevar.clear().rows.add(postdata).draw();

		(function ($) {
			mydatatablevar = $('#mydatatable').DataTable({
				ordering: true,
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
						title: `Check All &nbsp;<input class="form-check-input selectDataAll" type="checkbox" value="">`,
						data: function (row, type, val, meta) {
							return meta.row + 1;
						},
						render: function (data, type, row, meta) {
							return '<input class="form-check-input selectData" type="checkbox" value="">';
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
							return row.post_date;
						},
						render: function (data, type, row, meta) {
							return data;
						}
					},
					{
						title: 'Status',
						data: function (row, type, val, meta) {
							return row.post_status;
						},
						render: function (data, type, row, meta) {
							return data;
						}
					},
					{
						title: 'Total',
						data: function (row, type, val, meta) {
							return row._order_total;
						},
						render: function (data, type, row, meta) {
							return data;
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

			document.querySelector('.selectDataAll').addEventListener('change', function (e) {
				let alldata = mydatatablevar.rows().data().toArray();
				if (e.target.closest('.selectDataAll')) {
					let getval = e.target.checked;
					let getdata = document.querySelectorAll('.selectData');
					for (let a = 0; a < getdata.length; a++) {
						if (getval) {
							// getdata[a].setAttribute('checked', 'true');
							getdata[a].checked = true;
						} else {
							// getdata[a].removeAttribute('checked');
							getdata[a].checked = false;
						}
					}
				}
			});

			mydatatablevar.on('change', 'td', function (e) {
				if (e.target.closest('.selectData')) {
					let newdata = mydatatablevar.row(this).data();
					let thisindex = mydatatablevar.row(this).index();
					console.log('newdata', newdata);
				}
			});
		})(jQuery);
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
</script>

<!-- dashboard login user:
{_datases?.user?.user_display_name}

<a href="/" on:click|preventDefault={() => logout()}>Logout</a>
<br />
<a href="/" on:click|preventDefault={() => fetchDataFunc()}>Fetch Data</a>
<br />
{postdata} -->
<div class="row">
	<div class="col">
		<h5 class="d-inline">Orders</h5>
		<a href="{base}/admin/addNewOrder" class="btn btn-primary">Add Order</a>
	</div>
</div>
<div class="row pt-2">
	<div class="col">
		<button type="button" class="btn btn-secondary">All</button>
		<button type="button" class="btn btn-secondary">Pending Payment</button>
		<button type="button" class="btn btn-secondary">On Hold</button>
		<button type="button" class="btn btn-secondary">Completed</button>
	</div>
</div>
<div class="row pt-2">
	<div class="col">
		<select class="" aria-label="Default select example">
			<option selected>Bulk Actions</option>
			<option value="1">Move to Trash</option>
			<option value="2">Change Status To Processing</option>
			<option value="3">Change Status To On Hold</option>
			<option value="4">Change Status To Completed</option>
			<option value="5">Change Status To Cancelled</option>
		</select>
		<button class="btn btn-primary btn-block btn-sm" type="submit">Apply</button>
	</div>
</div>
<div class="row pt-2">
	<div class="col">
		<table id="mydatatable" class="display" style="width:100%" />
	</div>
</div>
