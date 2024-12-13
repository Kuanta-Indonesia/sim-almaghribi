<template>
    <div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar pt-5">
				<li class="mt-20">
					<Link href="/dashboard" :class="{'active':isActive('/dashboard')}">
						<div class="pull-left">
							<i class="zmdi zmdi-landscape mr-20"></i>
							<span class="right-nav-text">Dashboard</span>
						</div>
						<div class="clearfix"></div>
					</Link>
				</li>
				<li class="mt-10">
					<Link href="/kpi" :class="{'active':isActive('/kpi')}">
						<div class="pull-left">
							<i class="ti-clipboard mr-20"></i>
							<span class="right-nav-text">KPI</span>
						</div>
						<div class="clearfix"></div>
					</Link>
				</li>

				
				
				
			</ul>
		</div>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    name: 'Sidebar',
	setup() {
		const role = usePage().props.value.auth.user.role.nama;
        const url = usePage().url.value;
        const isActive = (route) => {
            return url && url.startsWith(route);
        };

        return {
            isActive,
            role
        };		
	}
}
</script>
<style>

</style>