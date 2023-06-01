<script>
	import { onMount, onDestroy, tick } from 'svelte';
	import { apiData } from '$lib/apiData.js';
	import { datases } from '$lib/store.js';
	import { page } from '$app/stores';
	import { invalidateAll, invalidate, goto } from '$app/navigation';
	import { assets, base } from '$app/paths';

	let _datases;
	let postdata = '';
	let orderid;
	let now = new Date();
	now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
	let fields = {
		dateCreated: now.toISOString().slice(0, 16),
		customer: '',
		productName: '',
		productQuantity: '',
		feeCost: '',
		wc_order_action: '',
		order_status: 'wc-pending',
		productIndex: '',
		feeIndex: ''
	};
	let customers = [];
	let getProduct = [];
	let itemLists = [];
	let feeLists = [];
	let ordernotes = [];
	let exampleModal;
	let ordertotal = 0;
	let feetotal = 0;
	let user_display_name = '';
	let mode = 'Add';
	let getpost;
	// let pageload = false;

	onMount(async () => {
		_datases = JSON.parse(sessionStorage.getItem('_datases'));
		user_display_name = _datases?.user?.user_display_name;

		if ($page.params?.postId) {
			mode = 'Edit';
			getpost = apiData(
				{ action: 'admin/addNewOrder', process: 'getOrder', postId: $page?.params?.postId },
				_datases.user
			);
		} else {
			getpost = apiData({ action: 'admin/addNewOrder' }, _datases.user);
		}
		orderid = (await getpost).post;
		customers = (await getpost).customers;
		getProduct = (await getpost).getProduct;
		for (let a = 0; a < customers.length; a++) {
			customers[a].id = customers[a].ID;
			customers[a].text = customers[a].data.display_name;
		}

		for (let a = 0; a < getProduct.length; a++) {
			getProduct[a].id = getProduct[a].ID;
			getProduct[a].text = getProduct[a].post_title;
		}

		let interval = setInterval(() => {
			if (window.finishload) {
				clearInterval(interval);
				//////////////////////
				// code start
				(function ($) {
					$('#customer').select2({
						data: customers,
						tags: false,
						placeholder: 'Guest',
						allowClear: true
					});

					$('#productName').select2({
						data: getProduct,
						tags: false,
						dropdownParent: $('#exampleModal'),
						placeholder: 'Search For a Product..',
						allowClear: true
					});

					$('#productName').on('change', function (e) {
						fields.productName = e.target.value;
						if (e.target.value) {
							e.target.removeAttribute('required');
						} else {
							e.target.setAttribute('required', 'required');
						}
					});
				})(jQuery);

				// code end
				//////////////////////
			}
		}, 100);

		document.querySelector('.addItemsBtn').addEventListener('click', function (e) {
			document.querySelector('#tab1').classList.toggle('d-none');
			document.querySelector('#tab2').classList.toggle('d-none');
		});
		document.querySelector('.canceltab2Btn').addEventListener('click', function (e) {
			document.querySelector('#tab1').classList.toggle('d-none');
			document.querySelector('#tab2').classList.toggle('d-none');
		});
		document.querySelector('.savetab2Btn').addEventListener('click', function (e) {
			document.querySelector('#tab1').classList.toggle('d-none');
			document.querySelector('#tab2').classList.toggle('d-none');
		});
	});

	const submitHandler = async () => {
		console.log('productIndex', fields.productIndex);
		ordertotal = 0;
		let index = getProduct.findIndex((x) => x.ID == fields.productName);
		if (fields.productIndex !== '') {
			console.log('salam', fields.productIndex);
			itemLists[fields.productIndex].productID = getProduct[index].id;
			itemLists[fields.productIndex].productName = getProduct[index].text;
			itemLists[fields.productIndex].productQuantity = fields.productQuantity;
			itemLists[fields.productIndex].productCost = getProduct[index].cost;
		} else {
			itemLists.push({
				productID: getProduct[index].id,
				productName: getProduct[index].text,
				productQuantity: fields.productQuantity,
				productCost: getProduct[index].cost
			});
		}

		itemLists = itemLists;
		document.querySelector('#myCheck').click();
		fields.productName = '';
		fields.productQuantity = '';
		fields.productIndex = '';
		(function ($) {
			$('#productName').val(null).trigger('change');
		})(jQuery);
	};

	const submitHandlerModalFee = async () => {
		feetotal = 0;
		console.log('sss', fields.feeIndex);
		if (fields.feeIndex !== '') {
			feeLists[fields.feeIndex].feeName = `RM ${fields.feeCost} fee`;
			feeLists[fields.feeIndex].feeCost = fields.feeCost;
		} else {
			feeLists.push({
				feeName: `RM ${fields.feeCost} fee`,
				feeCost: fields.feeCost
			});
		}

		feeLists = feeLists;
		document.querySelector('#modalFeeClose').click();
		fields.feeCost = '';
		fields.feeIndex = '';
		// console.log('feeLists', feeLists);
	};

	let incrementCount = (order, fee) => {
		ordertotal += order;
		feetotal += fee;
		return ''; //return empty string, so `undefined` isn't returned and in turn rendered in HTML
	};

	let updateOrder = async () => {
		let getpost = apiData(
			{
				action: 'admin/addNewOrder',
				process: 'updateOrder',
				dateCreated: fields.dateCreated,
				order_status: fields.order_status,
				customer: fields.customer,
				itemLists,
				ordernotes,
				orderid
			},
			_datases.user
		);
		console.log('getpost', await getpost);
		// goto('/').then(() => goto(`${base}/admin/addNewOrder/${orderid}`));
		goto(`${base}/admin/addNewOrder/${orderid}`);
		mode = 'Edit';
		// console.log('salam');
	};
</script>

<div class="row pb-2">
	<div class="col">
		{#if mode == 'Add'}
			<h5 class="d-inline">Add New Order</h5>
		{:else}
			<h5 class="d-inline">Edit Order</h5>
			&nbsp;
			<a
				class="btn btn-primary btn-sm"
				href="/"
				on:click|preventDefault={async () => {
					// window.location.replace(`${base}/admin/addNewOrder`);
					goto(`${base}/admin/addNewOrder`);
					getpost = apiData({ action: 'admin/addNewOrder' }, _datases.user);
					orderid = (await getpost).post;
					itemLists = [];
					feeLists = [];
					ordernotes = [];
					ordertotal = 0;
					feetotal = 0;
					mode = 'Add';
				}}>Add order</a
			>
		{/if}
	</div>
</div>

<div class="row">
	<div class="col-8">
		<div class="row">
			<div class="col">
				<div class="card">
					<h5 class="card-header">Order #{orderid} details</h5>
					<div class="card-body">
						<div class="row">
							<div class="col"><h5>General</h5></div>
						</div>
						<div class="row">
							<div class="col">
								<label for="dateCreated">Date Created {fields.dateCreated}</label>
								<div class="input-group">
									<input
										class="form-control"
										type="datetime-local"
										id="dateCreated"
										placeholder="dateCreated"
										bind:value={fields.dateCreated}
										required
									/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="dateCreated">Status</label>
								<div class="input-group">
									<select class="form-select" name="order_status" bind:value={fields.order_status}>
										<option value="wc-pending">Pending</option>
										<option value="wc-on-hold">On hold</option>
										<option value="wc-completed">Completed</option>
										<option value="wc-cancelled">Cancelled</option>
										<option value="wc-refunded">Refunded</option>
										<option value="wc-failed">Failed</option>
										<option value="wc-checkout-draft">Draft</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="dateCreated">Customer</label>
								<div class="input-group">
									<select
										class="form-select"
										id="customer"
										name="customer"
										bind:value={fields.customer}
									>
										<option value="" />
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered border-primary">
							<thead>
								<tr>
									<th scope="col">Item</th>
									<th scope="col">Cost</th>
									<th scope="col">Qty</th>
									<th scope="col">Total</th>
									<th scope="col">Action</th>
								</tr>
							</thead>

							{#if itemLists.length > 0 || feeLists.length > 0}
								<tbody>
									{#each itemLists as itemList, index}
										<tr>
											<th scope="row">{itemList.productName}</th>
											<td>RM {itemList.productCost}</td>
											<td>x {itemList.productQuantity}</td>
											<td
												>RM {parseFloat(itemList.productCost) *
													parseFloat(itemList.productQuantity)}</td
											>
											<td
												><a
													href="/"
													on:click|preventDefault={() => {
														fields.productIndex = index;
														fields.productName = itemList.productID;
														fields.productQuantity = itemList.productQuantity;

														(function ($) {
															$('#productName').val(fields.productName).trigger('change');
															$('#exampleModal').modal('show');
														})(jQuery);
													}}><i class="fa fa-edit" /></a
												>&nbsp;<a
													href="/"
													class="text-danger"
													on:click|preventDefault={() => {
														if (confirm('Are Your sure?') == true) {
															itemLists = itemLists.filter(function (el, i) {
																return i != index;
															});
															ordertotal = 0;
														} else {
															return;
														}
													}}><i class="fa fa-trash-o" /></a
												></td
											>
										</tr>
										{incrementCount(
											parseFloat(itemList.productCost) * parseFloat(itemList.productQuantity),
											0
										)}
									{/each}
									<tr>
										<td colspan="5" />
									</tr>
									{#each feeLists as feeList, index}
										<tr>
											<th colspan="3" scope="row">{feeList.feeName}</th>

											<td>RM {feeList.feeCost}</td>
											<td
												><a
													href="/"
													on:click|preventDefault={() => {
														// alert('edit');
														fields.feeIndex = index;
														fields.feeCost = feeList.feeCost;
														(function ($) {
															$('#modalFee').modal('show');
														})(jQuery);
													}}><i class="fa fa-edit" /></a
												>&nbsp;<a
													href="/"
													class="text-danger"
													on:click|preventDefault={() => {
														if (confirm('Are Your sure?') == true) {
															feeLists = feeLists.filter(function (el, i) {
																return i != index;
															});
															feetotal = 0;
														} else {
															return;
														}
													}}><i class="fa fa-trash-o" /></a
												></td
											>
										</tr>
										{incrementCount(0, parseFloat(feeList.feeCost))}
									{/each}
									<tr>
										<td colspan="5" />
									</tr>
								</tbody>
							{/if}
							<tfoot>
								<tr>
									<th colspan="5" />
								</tr>
								<tr>
									<th colspan="2" />
									<th scope="col">Order Total:</th>
									<th colspan="2">RM {ordertotal + feetotal}</th>
								</tr>
							</tfoot>
						</table>
					</div>

					<div class="card-footer text-muted">
						<div id="tab1">
							<button type="button" class="btn btn-primary btn-sm addItemsBtn">Add Items</button>
						</div>
						<div id="tab2" class="d-none">
							<button
								type="button"
								class="btn btn-primary btn-sm"
								data-bs-toggle="modal"
								data-bs-target="#exampleModal"
							>
								Add products
							</button>
							<button
								type="button"
								class="btn btn-primary btn-sm"
								data-bs-toggle="modal"
								data-bs-target="#modalFee"
							>
								Add fee
							</button>
							<button type="button" class="btn btn-primary btn-sm canceltab2Btn">Cancel</button>
							<button type="button" class="btn btn-primary btn-sm savetab2Btn">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5>Order Actions</h5>
						<select
							class="form-select"
							aria-label="Default select example"
							name="wc_order_action"
							bind:value={fields.wc_order_action}
						>
							<option value="">Choose an action...</option>
							<option value="send_order_details">Email invoice / order details to customer</option>
							<option value="send_order_details_admin">Resend new order notification</option>
						</select>

						<a class="btn btn-primary mt-2" href="/" on:click|preventDefault={() => updateOrder()}
							>{mode == 'Add' ? 'Create' : 'Update'}</a
						>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="">Order Notes</h5>
						{#if ordernotes.length > 0}
							{#each ordernotes as ordernote, index}
								<div class="bg-secondary bg-gradient p-1 rounded">{ordernote.text}</div>
								<span class="" style="font-size:10px;"
									>added on {ordernote.date} by {ordernote.name}</span
								>
								<a
									class="text-danger d-block mb-2"
									style="font-size:10px;"
									href="/"
									on:click|preventDefault={() => {
										ordernotes = ordernotes.filter(function (el, i) {
											return i != index;
										});
									}}>Delete note</a
								>
							{/each}
						{:else}
							There are no notes yet
						{/if}

						<hr />
						<label for="exampleFormControlTextarea1" class="form-label">Add Note</label>
						<textarea
							name="add_order_note"
							class="form-control"
							id="exampleFormControlTextarea1"
							rows="3"
							bind:value={fields.add_order_note}
						/>
						<div class="row">
							<div class="col">
								<select
									class="mt-2 d-inline"
									aria-label="Default select example"
									name="order_note_type"
									bind:value={fields.order_note_type}
								>
									<option value="">Private note</option>
									<option value="customer">Note to customer</option>
								</select>
								<button
									type="submit"
									class="btn btn-primary mt-2 btn-sm"
									on:click|preventDefault={() => {
										ordernotes.push({
											text: fields.add_order_note,
											date: new Date().toLocaleString(),
											name: user_display_name
										});
										ordernotes = ordernotes;
										fields.add_order_note = '';
									}}>Add</button
								>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div
	class="modal fade"
	id="exampleModal"
	tabindex="-1"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<form id="addProductForm" class="theme-form" on:submit|preventDefault={submitHandler}>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add products</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-9">Product</div>
						<div class="col-3">Quantity</div>
					</div>
					<div class="row">
						<div class="col-9">
							<input type="hidden" name="productID" bind:value={fields.productIndex} />
							<select
								class="form-select"
								id="productName"
								name="productName"
								required
								bind:value={fields.productName}
							>
								<option value="" />
							</select>
						</div>
						<div class="col-3">
							<input
								class="form-control"
								type="number"
								name="productQuantity"
								id="productQuantity"
								bind:value={fields.productQuantity}
								required
							/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="myCheck" data-bs-dismiss="modal"
						>Close</button
					>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Modal  Fee-->
<div
	class="modal fade"
	id="modalFee"
	tabindex="-1"
	aria-labelledby="modalFeeLabel"
	aria-hidden="true"
>
	<form id="modalFeeForm" class="theme-form" on:submit|preventDefault={submitHandlerModalFee}>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalFeeLabel">Add fees</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" />
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">Enter a fixed amount or percentage to apply as a fee.</div>
					</div>
					<div class="row">
						<div class="col">
							<input
								class="form-control"
								type="number"
								name="feeCost"
								id="feeCost"
								bind:value={fields.feeCost}
								required
							/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="modalFeeClose" data-bs-dismiss="modal"
						>Close</button
					>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</form>
</div>
