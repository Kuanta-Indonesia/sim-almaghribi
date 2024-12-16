<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="page-wrapper">
        <div class="container pt-25">
            <div class="row heading-bg pr-20 pl-20">
                <div class="col">
                    <h5 class="txt-dark">Tambahkan Penilaian</h5>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li>
                            <Link href="/penilaian">Penilaian</Link>
                        </li>
                        <li class="active"><span>Tambahkan Penilaian</span></li>
                    </ol>
                </div>
            </div>
            <form @submit.prevent="submit">
                <div v-if="pageNumber==1" v-for="(kpiInstrument, index) in kpi" :key="index">
                    <h5 class="txt-dark  ">{{ kpiInstrument.nama }}</h5>
                    <p class="mb-20 ">{{ kpiInstrument.deskripsi }}</p>

                    <div class="row ">
                        <div v-for="(kpiPerformance, index) in kpiInstrument.performance" :key="index"
                            class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div @click="selectPerformance(kpiPerformance.id,kpiPerformance.score)" class="panel panel-default  card-view panel-refresh">
                                <div class="refresh-container">
                                    <div class="la-anim-1"></div>
                                </div>
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">
                                            <input type="radio" name="performance" :checked="form.performance==kpiPerformance.id">
                                            {{ kpiPerformance.value }}
                                        </h6>
                                    </div>
                                    <div class="pull-right">
                                        <a class="pull-left inline-block mr-15" data-toggle="collapse"
                                            :href="`#collapse_` + kpiPerformance.id" aria-expanded="true">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                            <i class="zmdi zmdi-chevron-up"></i>
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
                <div v-if="pageNumber==2" class=" mb-20">
                    <div class="form-group mr-15 mb-15">
                        <label class="control-label mr-10 mb-10" >Pilih Tendik</label>

                        <select required class="form-control" v-model="form.user">
                            <option v-for="(item, index) in user" :value="item.id" :key="index">{{ item.nama }}</option>
                        </select>
                    </div>
                    <div class="form-group mr-15 mb-15">
                        <label class="control-label mr-10 mb-10" >Pilih Periode</label>

                        <select required class="form-control" v-model="form.periode">
                            <option v-for="(item, index) in periode" :value="item.id" :key="index">{{ item.nama +" "+ moment().format("YYYY") }} </option>
                        </select>
                    </div>
                    <div class="from-group">
                        <label class="control-label mr-10 mb-10" >Pilih Score</label>

                        <select class="form-control" required v-model="form.score">
                            
                            <option v-for="(item, index) in listScore" :value="item.id"  :key="index">{{ item.value + " ("+item.deskripsi+") " }}</option>
                        </select>
                    </div>
                    
                </div>
                <div class="" >
                    <button v-if="pageNumber==2" @click="changePage(1)" class="btn btn-default mr-15" type="button">Back</button>
                    <button v-if="pageNumber==1" @click="changePage(2)" class="btn btn-primary" type="button">Next</button>
                    <button v-if="pageNumber==2" class="btn btn-primary" type="submit">Tambahkan</button>
                </div>
            </form>

        </div>
    </div>
</template>
<script>
import { usePage } from '@inertiajs/inertia-vue3';
import '/resources/vendors/bower_components/sweetalert/dist/sweetalert.min.js';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import moment from 'moment';

export default {
    name: 'Kpi',
    setup() {
        const pageNumber = ref(1);
        const listScore = ref([]);
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
        const { kpi, user } = usePage().props.value;

        const periode = [
            { id: 1, nama: 'Januari' },
            { id: 2, nama: 'Februari' },
            { id: 3, nama: 'Maret' },
            { id: 4, nama: 'April' },
            { id: 5, nama: 'Mei' },
            { id: 6, nama: 'Juni' },
            { id: 7, nama: 'Juli' },
            { id: 8, nama: 'Agustus' },
            { id: 9, nama: 'September' },
            { id: 10, nama: 'Oktober' },
            { id: 11, nama: 'November' },
            { id: 12, nama: 'Desember' },
        ];
        const form = useForm({
            performance: '',
            user: '',
            score:'',
            periode: ''
        });

        const changePage = (number)=>{
            if (number==2) {
                if (form.performance == '') {
                    return swal('Pilih performance terlebih dahulu')
                }
                pageNumber.value =2
            }
            number ==1 ? pageNumber.value=1:'';
        }
        const selectPerformance = (id, score) => {
            form.performance = id;
            listScore.value = score;
        }

        const submit = () => {
            // alert(form.performance);
            form.post('/penilaian');
        }

        return {
            kpi,
            user,
            form,
            submit,
            pageNumber,
            listScore,
            selectPerformance,
            changePage,
            periode,
            moment
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