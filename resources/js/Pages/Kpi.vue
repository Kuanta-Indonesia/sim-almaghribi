<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="page-wrapper">
        <div class="container pt-25">
            <div class="row heading-bg pr-20 pl-20">
                <div class="col">
                    <h5 class="txt-dark">KPI</h5>
                </div>
                <div class="col">
                    <Link href="/kpi/create" class="btn btn-primary btn-rounded btn-icon left-icon">
                    <i class="fa fa-plus"></i>
                    Tambahkan</Link>
                </div>
            </div>
            <div v-for="(kpiInstrument, index) in kpi" :key="index">
                <h5 class="txt-dark  ">{{ kpiInstrument.nama }}</h5>
                <p class="mb-20 ">{{ kpiInstrument.deskripsi }}</p>

                <div class="row ">
                    <div v-for="(kpiPerformance, index) in kpiInstrument.performance" :key="index"
                        class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">{{ kpiPerformance.value }}</h6>
                                </div>
                                <div class="pull-right">
                                    <a class="pull-left inline-block mr-15" data-toggle="collapse"
                                        :href="`#collapse_` + kpiPerformance.id" aria-expanded="true">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                        <i class="zmdi zmdi-chevron-up"></i>
                                    </a>
                                    <div class="pull-left inline-block dropdown mr-15">
                                        <Link :href="`/kpi/` + kpiPerformance.id + `/edit`" class="dropdown-toggle"
                                            aria-expanded="false" role="button"><i class="fa fa-pencil"></i>
                                        </Link>
                                    </div>
                                    <!-- <a href="#" class="pull-left inline-block refresh mr-15">
                                        <i class="zmdi zmdi-replay"></i>
                                    </a>
                                    <a href="#" class="pull-left inline-block full-screen mr-15">
                                        <i class="zmdi zmdi-fullscreen"></i>
                                    </a> -->
                                    <a @click="deleteKpi(kpiPerformance.id)" class="pull-left inline-block close-panel">
                                        <i class="zmdi zmdi-close"></i>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div :id="`collapse_` + kpiPerformance.id" class="panel-wrapper collapse ">
                                <div class="panel-body">
                                    <div class="mb-10" v-for="(kpiComponent, index) in kpiPerformance.component"
                                        :key="index">
                                        <p><i class="fa  fa-minus-square"></i> {{ kpiComponent.value }}</p>

                                    </div>

                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Score</th>
                                                <th>Desc</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(kpiScore, index) in kpiPerformance.score" :key="index">
                                                <td>{{ ++index }}</td>
                                                <td>{{ kpiScore.value }}</td>
                                                <td>{{ kpiScore.deskripsi }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

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
import { Link } from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';
import '/resources/vendors/bower_components/sweetalert/dist/sweetalert.min.js';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'Kpi',
    setup() {
        const page = usePage();
        const form = useForm()
        if (page.props.value.flash.success) {
            $.toast({
                heading: 'Success',
                text: page.props.value.flash?.success,
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right'
            });
        }
        if (page.props.value.flash.error) {
            $.toast({
                heading: 'error',
                text: page.props.value.flash?.error,
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-right'
            });
        }
        const { kpi } = usePage().props.value;

        const deleteKpi = (id) => {
            swal({
                title: "Apakah anda yakin untuk menghapus data?",
                text: "anda tidak dapat menghapus jika data sudah digunakan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f0c541",
                confirmButtonText: "Ya saya tahu!",
                closeOnConfirm: true
            }, function () {
                form.delete(`/kpi/${id}`, {
                    onSuccess: (res) => {
                        Inertia.visit('/kpi',{
                            only:['kpi']
                        });
                        
                    }
                });
                
            });
        }

        return {
            kpi,
            deleteKpi
        }
    }
}
</script>
<style>
@import url('/resources/vendors/bower_components/sweetalert/dist/sweetalert.css');

.row.heading-bg {
    display: flex;
    justify-content: space-between;
}

.row.heading-bg .col:first-child {
    width: 100%;
}
</style>