<script setup>
import { Link } from '@inertiajs/vue3'

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
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label mb-10">Nama Guru:</label>
                                            <input type="text" class="form-control" id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label mb-10">Email:</label>
                                            <input type="email" class="form-control" id="message-text1"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label mb-10">Password:</label>
                                            <input type="password" class="form-control" id="message-text1"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label mb-10">Kode:</label>
                                            <input type="text" class="form-control" id="recipient-name1">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label mb-10">No Hp:</label>
                                            <input type="text" class="form-control" id="recipient-name1">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
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
                                            <tfoot>
                                            <tr>
                                                <th>Nama Guru</th>
                                                <th>No Telp</th>
                                                <th>Tahun Masuk</th>
                                                <th>Performa</th>
                                                <th>Gajo Pokok</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">John Doe</a></td>
                                                <td>087613216</td>
                                                <td>2009</td>
                                                <td>83%</td>
                                                <td>Rp. 4.000.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Jane Smith</a></td>
                                                <td>098712345</td>
                                                <td>2010</td>
                                                <td>91%</td>
                                                <td>Rp. 6.000.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Alice Johnson</a></td>
                                                <td>076543210</td>
                                                <td>2008</td>
                                                <td>87%</td>
                                                <td>Rp. 5.500.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Michael Brown</a></td>
                                                <td>065432198</td>
                                                <td>2012</td>
                                                <td>88%</td>
                                                <td>Rp. 4.800.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Emily Davis</a></td>
                                                <td>054321987</td>
                                                <td>2011</td>
                                                <td>85%</td>
                                                <td>Rp. 4.200.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Chris Wilson</a></td>
                                                <td>043219876</td>
                                                <td>2007</td>
                                                <td>92%</td>
                                                <td>Rp. 7.000.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Jessica Miller</a></td>
                                                <td>032198765</td>
                                                <td>2013</td>
                                                <td>86%</td>
                                                <td>Rp. 4.900.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">David Moore</a></td>
                                                <td>021987654</td>
                                                <td>2005</td>
                                                <td>89%</td>
                                                <td>Rp. 5.100.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Sophia Taylor</a></td>
                                                <td>019876543</td>
                                                <td>2006</td>
                                                <td>90%</td>
                                                <td>Rp. 6.200.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Liam Anderson</a></td>
                                                <td>012345678</td>
                                                <td>2014</td>
                                                <td>87%</td>
                                                <td>Rp. 4.300.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Olivia Thomas</a></td>
                                                <td>011223344</td>
                                                <td>2015</td>
                                                <td>84%</td>
                                                <td>Rp. 4.600.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">William Jackson</a></td>
                                                <td>022334455</td>
                                                <td>2016</td>
                                                <td>88%</td>
                                                <td>Rp. 5.800.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Isabella White</a></td>
                                                <td>033445566</td>
                                                <td>2004</td>
                                                <td>92%</td>
                                                <td>Rp. 6.500.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">James Harris</a></td>
                                                <td>044556677</td>
                                                <td>2003</td>
                                                <td>91%</td>
                                                <td>Rp. 5.700.000</td>
                                            </tr>
                                            <tr>
                                                <td class="title"><a href="javascript:void(0)">Mia Martin</a></td>
                                                <td>055667788</td>
                                                <td>2017</td>
                                                <td>89%</td>
                                                <td>Rp. 5.000.000</td>
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
