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
				<li v-if="role=='admin'" class="mt-10">
					<Link  href="/kpi" :class="{'active':isActive('/kpi')}">
						<div class="pull-left">
							<i class="ti-clipboard mr-20"></i>
							<span class="right-nav-text">KPI</span>
						</div>
						<div class="clearfix"></div>
					</Link>
				</li>
				<li v-if="role=='admin'" class="mt-10">
					<Link  href="/guru" :class="{'active':isActive('/guru')}">
						<div class="pull-left">
							<i class="ti-user mr-20"></i>
							<span class="right-nav-text">Guru</span>
						</div>
						<div class="clearfix"></div>
					</Link>
				</li>
				<li v-if="role=='admin'" class="mt-10">
					<Link href="/penilaian" :class="{'active':isActive('/penilaian')}">
						<div class="pull-left">
							<i class="ti-pencil-alt mr-20"></i>
							<span class="right-nav-text">Penilaian</span>
						</div>
						<div class="clearfix"></div>
					</Link>
				</li>
				<li v-if="role=='kepala sekolah'" class="mt-10">
					<Link href="/coaching" :class="{'active':isActive('/coaching')}">
						<div class="pull-left">
							<i class="ti-user mr-20"></i>
							<span class="right-nav-text">Coaching</span>
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