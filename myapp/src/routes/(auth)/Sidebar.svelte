<script>
	import { assets, base } from '$app/paths';
	import { page } from '$app/stores';
	import { onMount, onDestroy, tick } from 'svelte';

	let _datases;
	onMount(async () => {
		_datases = JSON.parse(localStorage.getItem('_datases'));
	});
</script>

<!-- Page Sidebar Start-->
<header class="main-nav">
	<div class="sidebar-user text-center">
		<a class="setting-primary" href="javascript:void(0)"><i data-feather="settings" /></a><img
			class="img-90 rounded-circle"
			src="{assets}/assets/images/dashboard/1.png"
			alt=""
		/>
		<div class="badge-bottom">
			<span class="badge badge-primary">{_datases?.user?.roles?.[0]}</span>
		</div>
		<a href="/"> <h6 class="mt-3 f-14 f-w-600">{_datases?.user?.user_display_name}</h6></a>
		<p class="mb-0 font-roboto">&nbsp;</p>
		<ul>
			<li>
				<span><span class="counter">19.8</span>k</span>
				<p>Follow</p>
			</li>
			<li>
				<span>2 year</span>
				<p>Experince</p>
			</li>
			<li>
				<span><span class="counter">95.2</span>k</span>
				<p>Follower</p>
			</li>
		</ul>
	</div>
	<nav>
		<div class="main-navbar">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left" /></div>
			<div id="mainnav">
				<ul class="nav-menu custom-scrollbar">
					<li class="back-btn">
						<div class="mobile-back text-end">
							<span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true" />
						</div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6>My account</h6>
						</div>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('user/dashboard')
								? `active`
								: ``}"
							href="{base}/user/dashboard"><i data-feather="home" /><span>Dashboard</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('user/orders')
								? `active`
								: ``}"
							href="{base}/user/orders"><i data-feather="message-circle" /><span>Orders</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('user/subscriptions')
								? `active`
								: ``}"
							href="{base}/user/subscriptions"
							><i data-feather="shopping-bag" /><span>Subscriptions</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes(
								'user/account-details'
							)
								? `active`
								: ``}"
							href="{base}/user/account-details"
							><i data-feather="users" /><span>Account details</span></a
						>
					</li>

					<li class="sidebar-main-title">
						<div>
							<h6>Admin</h6>
						</div>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('admin/dashboard')
								? `active`
								: ``}"
							href="{base}/admin/dashboard"><i data-feather="home" /><span>Dashboard</span></a
						>
					</li>

					<li class="dropdown">
						<a
							class="nav-link menu-title {$page.url.pathname.includes('admin/orders')
								? `active`
								: ``}"
							href="{base}/admin/orders"
							on:click|preventDefault><i data-feather="box" /><span>Orders</span></a
						>
						<ul class="nav-submenu menu-content">
							<li>
								<a
									class={$page.url.pathname.includes('admin/orders') ? `active` : ``}
									href="{base}/admin/orders">Order List</a
								>
							</li>
							<li>
								<a
									class={$page.url.pathname.includes('admin/addNewOrder') ? `active` : ``}
									href="{base}/admin/addNewOrder">New Order</a
								>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes(
								'admin/subscriptions'
							)
								? `active`
								: ``}"
							href="{base}/admin/subscriptions"
							><i data-feather="layout" /><span>Subscriptions</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('admin/customers')
								? `active`
								: ``}"
							href="{base}/admin/customers"><i data-feather="box" /><span>Customers</span></a
						>
					</li>
					<li class="dropdown">
						<a
							class="nav-link menu-title link-nav {$page.url.pathname.includes('admin/settings')
								? `active`
								: ``}"
							href="{base}/admin/settings"><i data-feather="anchor" /><span>Settings</span></a
						>
					</li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right" /></div>
		</div>
	</nav>
</header>
<!-- Page Sidebar Ends-->
