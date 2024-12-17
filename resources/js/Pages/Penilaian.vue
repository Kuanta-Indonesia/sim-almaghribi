<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="page-wrapper">
        <div class="container pt-25">
            <div class="row heading-bg pr-20 pl-20">
                <div class="col">
                    <h5 class="txt-dark">Penilaian</h5>
                </div>
                <div class="col">
                    <Link href="/penilaian/create" class="btn btn-primary btn-rounded btn-icon left-icon">
                    <i class="fa fa-plus"></i>
                    Tambahkan</Link>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <!--  -->
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="penilaianTable" class="table table-hover display  pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Instrument</th>
                                                    <th>Performance</th>
                                                    <th>Komponen</th>
                                                    <th>Skor</th>
                                                    <th>Periode</th>
                                                    <th>Asesor</th>
                                                    <th>Ubah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in penilaian" :key="index">
                                                    <td>{{ ++index }}</td>
                                                    <td>{{ item.user.nama }}</td>
                                                    <td>{{ item.score.performance.instrument.nama }}</td>
                                                    <td>{{ item.score.performance.value }}</td>
                                                    <td>
                                                        <p v-for="(item, index) in item.score.performance.component"
                                                            :key="index" class="mb-10"><i
                                                                class="fa  fa-minus-square"></i> {{ item.value }}</p>
                                                    </td>
                                                    <td>{{ item.score.value + ` (` + item.score.deskripsi + `)` }}</td>
                                                    <td>{{ moment(item.periode).format('MMMM') }}</td>
                                                    <td>{{ item.asesor.nama }}</td>
                                                    <td>
                                                        <Link :href="`/penilaian/${item.id}/edit`"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>
                                                        Edit</Link>
                                                    </td>
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
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';
import '/resources/vendors/bower_components/sweetalert/dist/sweetalert.min.js';
import moment from 'moment';
import '/resources/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'
import { onMounted } from 'vue';

export default {
    name: 'Penilaian',

    setup() {
        const page = usePage();
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
        const { penilaian } = usePage().props.value;
        
        onMounted(() => {
            $('#penilaianTable').DataTable();
        });

        return {
            penilaian,
            moment
        }
    }
}
</script>
<style>
@import url('/resources/vendors/bower_components/sweetalert/dist/sweetalert.css');
@import url('/resources/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css');

.row.heading-bg {
    display: flex;
    justify-content: space-between;
}

.row.heading-bg .col:first-child {
    width: 100%;
}
</style>