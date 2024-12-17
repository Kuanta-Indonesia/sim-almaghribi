<template>
	<Navbar></Navbar>
	<Sidebar></Sidebar>
	<div class="page-wrapper">
		<div class="container-fluid pt-25">
			<div class="profile">
				<div class="row">

					<div class="col-lg-12 col-xs-12">
						<div class="panel panel-default  card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pb-0">
									<div class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li role="presentation" class=""><a data-toggle="tab" id="settings_tab_8"
													role="tab" href="#settings_1" aria-expanded="false"><span>Edit
														profile</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_1">

											<div id="settings_8" class="tab-pane active" role="tabpanel">
												<!-- Row -->
												<div class="row">
													<div class="col-lg-12">
														<div class="">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="col-sm-12 col-xs-12">
																		<div class="form-wrap">
																			<form @submit.prevent="updateProfile">
																				<div class="form-body overflow-hide">
																					<div class="form-group">
																						<label
																							class="control-label mb-10"
																							for="nama">Nama</label>
																						<div class="input-group">
																							<div
																								class="input-group-addon">
																								<i
																									class="icon-user"></i>
																							</div>
																							<input type="text"
																								v-model="form.nama"
																								class="form-control"
																								id="nama">
																						</div>
																					</div>
																					<div class="form-group">
																						<label
																							class="control-label mb-10"
																							for="email">Email
																							address</label>
																						<div class="input-group">
																							<div
																								class="input-group-addon">
																								<i
																									class="icon-envelope-open"></i>
																							</div>
																							<input type="email"
																								v-model="form.email"
																								class="form-control"
																								id="email">
																						</div>
																					</div>
																					<div class="form-group">
																						<label
																							class="control-label mb-10"
																							for="no_hp">Contact
																							number</label>
																						<div class="input-group">
																							<div
																								class="input-group-addon">
																								<i
																									class="icon-phone"></i>
																							</div>
																							<input type="text"
																								v-model="form.no_hp"
																								class="form-control"
																								id="no_hp">
																						</div>
																					</div>
																					<div class="form-group">
																						<label
																							class="control-label mb-10"
																							for="password">Password</label>
																						<div class="input-group">
																							<div
																								class="input-group-addon">
																								<i
																									class="icon-lock"></i>
																							</div>
																							<input type="password"
																								v-model="form.password"
																								class="form-control"
																								id="password">
																						</div>
																					</div>

																					<!-- <div class="form-group">
																						<label class="control-label mb-10">Role</label>
																						<select class="form-control" data-placeholder="Choose a Category" tabindex="1">
																							<option value="Category 1">USA</option>
																							<option value="Category 2">Austrailia</option>
																							<option value="Category 3">India</option>
																							<option value="Category 4">UK</option>
																						</select>
																					</div> -->
																				</div>
																				<div class="form-actions mt-10">
																					<button type="submit"
																						class="btn btn-success mr-10 mb-30">Update
																						profile</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import '/resources/vendors/bower_components/sweetalert/dist/sweetalert.min.js';



export default {
	name: 'Profile',
	setup() {
		const { user,flash } = usePage().props.value;
		console.log(flash);
		const form = useForm({
			nama: user.nama,
			email: user.email,
			no_hp: user.no_hp,
			password: user.password,
		});
		if (flash.success) {
			$.toast({
				heading: 'Success',
				text: flash?.success,
				showHideTransition: 'slide',
				icon: 'success',
				position: 'top-right'
			});
		}
		if (flash.error) {
			$.toast({
				heading: 'error',
				text: flash?.error,
				showHideTransition: 'slide',
				icon: 'error',
				position: 'top-right'
			});
		}
		const updateProfile = () => {
			form.put('/profile', {
				onSuccess: () => {
					Inertia.visit('/profile', {
						only: ['user'],
						onFinish: () => {
							Inertia.visit('/profile', {
								only: ['user'],
							});
						}
					});
				}
			});
		};

		return {
			form,
			updateProfile,
			user,
		};
	},
	
};
</script>

<style scoped>
@import url('/resources/vendors/bower_components/sweetalert/dist/sweetalert.css');

</style>