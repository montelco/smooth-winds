<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="flex aic jc-sa">
                        <a href="<?php echo e(url('/new-entry')); ?>"><div class="btn btn-success">New Entry</div></a>
                        <a href="<?php echo e(url('/view-entries')); ?>"><div class="btn btn-info">Edit Existing</div></a>
                    <?php if(Auth::user()->email == "monteleoc8@students.rowan.edu" || Auth::user()->email == "fife@rowan.edu"): ?>
                        <a href="<?php echo e(url('/categories/editor/list')); ?>"><div class="btn btn-danger">Admin: Tag Manager</div></a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>