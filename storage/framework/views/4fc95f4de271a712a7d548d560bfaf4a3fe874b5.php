<?php $__env->startSection('content'); ?>
     <div class="container-fluid app-body">
        <h3>Code Test  </h3>
         <div id="app">

         </div>
        <div class="row">
            <div id="historyData">

                <Codetestcomponent></Codetestcomponent>

            </div>
        </div>
    </div>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>