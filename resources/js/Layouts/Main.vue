<template>


    <div id="main-wrap" class="wrapper theme-1-active pimary-color-green ">
        <slot></slot>
    </div>
</template>

<script>
import '../../vendors/bower_components/jquery/dist/jquery.min.js';

import '../../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js';
import '../../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js';



import '../../dist/js/dropdown-bootstrap-extended.js';
import '../../dist/js/jquery.slimscroll.js';
import '../../dist/js/init.js';

export default {
    name: "Main",
    
};

</script>

<style lang="css">
@import url('/resources/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css');
@import url('/resources/dist/css/style.css');
</style>
