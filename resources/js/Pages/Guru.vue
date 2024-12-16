<script setup>
import { Link } from '@inertiajs/vue3'
import {useForm, usePage} from "@inertiajs/inertia-vue3";
const page = usePage();

const guruForm =useForm({
    nama: '',
    email: '',
    password: '',
    kode: '',
    role_id: 6,
    no_hp: '',
});
async function addGuru(){
    guruForm.post('/submitUser', {
        onSuccess: ()=> {
            $('#exampleModal').modal('hide');
            guruForm.reset();

            $.toast({
                heading: 'Success',
                text: page.props.value.flash?.success,
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right'
            });
        }, onError: ()=>{
            $.toast({
                heading: 'error',
                text: page.props.value.flash?.error,
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-right'
            });
        }
    })
}

const { teachers } = usePage().props.value;

</script>

<template>
    <Navbar></Navbar>
    <Sidebar></Sidebar>
    <div class="page-wrapper">
        <div class="container-fluid pt-25">
            <div class="row heading-bg">
                <div class="col-sm-2 flex">
                    <div class="container">
                        <div class=" col pull-left">
                            <h5>Data Guru</h5>
                        </div>
                        <div class=" col pull-right">
                            <button type="button" class="btn btn-primary btn-rounded btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fa fa-heart"></i> <span>add guru</span></button>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h5 class="modal-title" id="exampleModalLabel1">Add new teacher</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label mb-10">Nama Guru:</label>
                                        <input type="text" class="form-control" v-model="guruForm.nama" />
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label mb-10">Email:</label>
                                        <input type="email" class="form-control" v-model="guruForm.email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label mb-10">Password:</label>
                                        <input type="password" class="form-control" v-model="guruForm.password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label mb-10">Kode:</label>
                                        <input type="text" class="form-control" v-model="guruForm.kode" >
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label mb-10">No Hp:</label>
                                        <input type="text" class="form-control" v-model="guruForm.no_hp">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="addGuru">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                            <thead>
                                            <tr>
                                                <th>Nama Guru</th>
                                                <th>No Telp</th>
                                                <th>Tahun Masuk</th>
                                                <th>Performa</th>
                                                <th>Gajo Pokok</th>
                                            </tr>
                                            </thead>
<!--                                            <tfoot>-->
<!--                                            <tr>-->
<!--                                                <th>Nama Guru</th>-->
<!--                                                <th>No Telp</th>-->
<!--                                                <th>Tahun Masuk</th>-->
<!--                                                <th>Performa</th>-->
<!--                                                <th>Gajo Pokok</th>-->
<!--                                            </tr>-->
<!--                                            </tfoot>-->
                                            <tbody>
                                            <tr v-for="(item, index) in teachers" :key="index">
                                                <td>{{item.nama}}</td>
                                                <td>{{item.no_hp}}</td>
                                                <td>{{item.email}}</td>
                                                <td>83%</td>
                                                <td>Rp. 4.000.000</td>
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

<style scoped>

</style>
