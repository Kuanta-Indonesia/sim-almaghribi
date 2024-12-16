<template>
	<Navbar></Navbar>
	<Sidebar></Sidebar>
	<div class="page-wrapper">
		<div class="container-fluid pt-25">
			<div class="profile">
				<div class="row">

					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												<input class="upload" type="file">
											</div>
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="#" alt="user" />
												<div class="fileupload btn btn-default">
													<span class="btn-text">edit</span>
													<input class="upload" type="file">
												</div>
											</div>
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger">{{
												form.nama }}</h5>
											<h6 class="block capitalize-font pb-20">{{ user.role.nama }}</h6>
										</div>
										<div class="social-info">
											<div class="row">
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span
															class="counter-anim">345</span></span>
													<span class="counts-text block">post</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span
															class="counter-anim">246</span></span>
													<span class="counts-text block">followers</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span
															class="counter-anim">898</span></span>
													<span class="counts-text block">tweets</span>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pb-0">
									<div class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li role="presentation" class=""><a data-toggle="tab" id="settings_tab_8"
													role="tab" href="#settings_8" aria-expanded="false"><span>Edit
														profile</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_8">

											<div id="settings_8" class="tab-pane fade" role="tabpanel">
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


export default {
	name: 'Profile',
	setup() {
		const { user } = usePage().props.value;

		const form = useForm({
			nama: user.nama,
			email: user.email,
			no_hp: user.no_hp,
			password: user.password,
		});

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
	methods: {
		// Add your methods here
	},
	mounted() {
		// Add your mounted logic here
	}
};
</script>

<style scoped></style>