<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="page-wrapper">
        <div class="container pt-25">
            <div class="panel panel-default card-view">
                <div class="panel-heading txt-dark">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5>Ubah KPI</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li>
                                    <Link href="/kpi">Kpi</Link>
                                </li>
                                <li class="active"><a><span>Edit Kpi</span></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form @submit.prevent="submit">
                            <div class="form-group mb-20">
                                <label class="control-label mb-10 text-left">Nama Instrument</label>
                                <select v-if="!isNew" required v-model="form.instrument" name="" id=""
                                    class="form-control">
                                    <option v-for="item in kpiAll" :value="item.id">{{ item.nama }}</option>
                                </select>
                                <input v-if="isNew" required v-model="form.instrument" type="text"
                                    class="form-control mb-10">
                                <label v-if="isNew" class="control-label mb-10 text-left">Deskripsi Instrument</label>
                                <textarea required v-if="isNew" v-model="form.deskripsiInstrument"
                                    class="form-control"></textarea>
                                <span v-if="!isNew" @click="switchNew"
                                    class="help-block mt-10 mb-0 cursor-pointer">Ingin merubah detail ? <span
                                        class="txt-primary ">Ubah disini</span></span>
                                <span v-if="isNew" @click="switchNew" class="help-block mt-10 mb-0 cursor-pointer">Ingin
                                    memilih yang sudah ada ? <span class="txt-primary">Pilih instrument</span></span>
                            </div>
                            <div class="form-group mb-20">
                                <label class="control-label mb-10 text-left">Nama Performance</label>
                                <input type="text" required v-model="form.performance" class="form-control">

                            </div>
                            <div class="form-group mb-20">
                                <label class="control-label mb-10 text-left">Komponen</label>
                                <input type="text" required class="form-control mb-10"
                                    v-for="(item, index) in form.komponen" :key="index" v-model="item.value">
                                <span @click="addKomponen" class="help-block cursor-pointer txt-primary"> <i
                                        class="fa fa-plus"></i>
                                    Tambah komponen</span>
                                <span v-if="form.komponen.length > 1" @click="subtractKomponen"
                                    class="help-block cursor-pointer txt-primary"> <i class="fa fa-minus"></i>
                                    Kurangi komponen</span>
                            </div>
                            <div class="form-group mb-20">
                                <label class="control-label mb-10 text-left">Score</label>

                                <div v-for="(item, index) in form.scores" :key="index" class="input-group">
                                    <div class="input-group-btn" style="width: 10%;">
                                        <input type="number" required v-model="item.value" min="0" placeholder="score"
                                            class="form-control mb-20">
                                    </div>
                                    <input type="text" required v-model="item.deskripsi" class="form-control"
                                        placeholder="deskripsi score">
                                </div>
                                <span @click="addScore" class="help-block cursor-pointer txt-primary"> <i
                                        class="fa fa-plus"></i>
                                    Tambah Score</span>
                                <span v-if="form.scores.length > 1" @click="subtractScore"
                                    class="help-block cursor-pointer txt-primary"> <i class="fa fa-minus"></i>
                                    Kurangi Score</span>

                            </div>
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import { useForm } from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

export default {
    name: 'Edit-Kpi',
    setup() {
        let isNew = ref(false);
        const { kpiAll, kpi } = usePage().props.value;
        
        const form = useForm({
            instrument: kpi.instrument.id,
            deskripsiInstrument: kpi.instrument.deskripsi,
            komponen: kpi.component,
            scores: kpi.score,
            performance: kpi.value
        });
        const switchNew = () => {
            if (isNew.value) {
                form.instrument = kpi.instrument.id;
            } else {
                form.instrument = kpi.instrument.nama;
            }
            isNew.value = !isNew.value;
        }
        const addScore = () => {
            form.scores.push({ score: '', deskripsi: '' });
        };
        const subtractScore = () => {
            form.scores.pop();
        };
        const addKomponen = () => {
            form.komponen.push({ komponen: '' });
        };
        const subtractKomponen = () => {
            form.komponen.pop();
        };
        const submit = () => {
            form.put('/kpi/' + kpi.id);
        }
        return {
            isNew,
            kpi,
            kpiAll,
            form,
            switchNew,
            addScore,
            addKomponen,
            subtractScore,
            subtractKomponen,
            submit
        }
    }
}
</script>
<style>
.cursor-pointer {
    cursor: pointer;
}

.row.heading-bg .col:first-child {
    width: 100%;
}
</style>
