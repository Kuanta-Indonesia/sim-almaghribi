<template>
	<div class="wrapper pa-0">
		<header class="sp-header">
			<div class="sp-logo-wrap pull-left">
				<a href="index.html">
					<img class="brand-img mr-10" src="../../dist/img/kuanta.png" alt="brand" />
					<!-- <span class="brand-text"></span> -->
				</a>
			</div>
			<!-- <div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-success btn-rounded btn-outline" href="signup.html">Sign Up</a>
				</div> -->
			<div class="clearfix"></div>
		</header>

		<!-- Main Content -->
		<div class="page-wrapper pa-0 ma-0 auth-page">
			<div class="container-fluid">
				<!-- Row -->
				<div class="table-struct full-width full-height">
					<div class="table-cell vertical-align-middle auth-form-wrap">
						<div class="auth-form  ml-auto mr-auto no-float">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="mb-30">
										<h3 class="text-center txt-dark mb-10">Sign in to SIM</h3>
										<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
									</div>
									<div class="form-wrap">
										<form @submit.prevent="submit">

										<div v-if="form.errors.email" class="alert alert-danger alert-dismissable">
											{{ form.errors.email }}
										</div>
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputEmail_2">Email
												address</label>
											<input type="email" class="form-control " required=""
												id="exampleInputEmail_2" v-model="form.email" placeholder="Enter email">
										</div>
										<div class="form-group">
											<label class="pull-left control-label mb-10"
												for="exampleInputpwd_2">Password</label>
											<!-- <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a> -->
											<div class="clearfix"></div>
											<input type="password" v-model="form.password" class="form-control" required=""
												id="exampleInputpwd_2" placeholder="Enter pwd">
										</div>

										<div class="form-group text-center">
											<button type="submit" class="btn btn-info btn-success btn-rounded">sign in
											</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

		</div>
		<!-- /Main Content -->

	</div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default {
	name: 'Login',
	setup() {
        const form = useForm({
            email: '',
            password: '',
        });

        const submit = () => {
            form.post('/');
        };

        return {
            form,
            submit,
        };
    },
};
</script>