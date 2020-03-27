<?php $__env->startSection('content'); ?>
     <div class="container-fluid app-body">
        <h3>History  </h3>

        <div class="row">
            <div id="historyData">
                <data-component></data-component>
            </div>
        </div>
    </div>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>