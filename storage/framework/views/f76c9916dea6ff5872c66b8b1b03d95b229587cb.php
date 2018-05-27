<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/home')); ?> ">Home</a></li>
                        <li><a href="<?php echo e(url('/categories/editor/list')); ?> ">Admin Access: Tags List</a></li>
                        <li class="active"><span style="color:#c6211b;">Admin Access:</span> Tag Editor</li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="flex fd-c">
                        <div class="jcc">
                            <h2>Tags Editor</h2>
                        </div>
                        <?php if($update): ?>
                            <form id="doi_field" action="/categories/editor/edit/update" method="POST">
                        <?php else: ?>
                            <form id="doi_field" action="/categories/editor/edit/create" method="POST">
                        <?php endif; ?>
                            <div class="form-group padded">
                                <?php echo e(csrf_field()); ?>

                                <?php if($update): ?>
                                    <input type="hidden" name="id" value="<?php echo e($update->id); ?>">
                                    <div class="form-group grey">
                                        <h4>Tag Name Value</h4>
                                        <input class="form-control f-o" type="text" name="name" placeholder="a-new-tag" aria-label="New Tag" value="<?php echo e($update->name); ?>"/>
                                        <?php if($errors->first('name')): ?>
                                            <div class="alert alert-danger alert-dismissable show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group grey">
                                    <h4>Category</h4>
                                    <?php switch($update->type):
                                        case (0): ?>
                                            <input type="radio" name="type" value="0" checked> Purpose<br>
                                            <input type="radio" name="type" value="1"> Problem/Strength<br>
                                            <input type="radio" name="type" value="2"> Alternative<br>
                                            <input type="radio" name="type" value="3"> Evidence<br>
                                            <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                        <?php break; ?>

                                        <?php case (1): ?>
                                            <input type="radio" name="type" value="0"> Purpose<br>
                                            <input type="radio" name="type" value="1" checked> Problem/Strength<br>
                                            <input type="radio" name="type" value="2"> Alternative<br>
                                            <input type="radio" name="type" value="3"> Evidence<br>
                                            <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                        <?php break; ?>

                                        <?php case (2): ?>
                                            <input type="radio" name="type" value="0"> Purpose<br>
                                            <input type="radio" name="type" value="1"> Problem/Strength<br>
                                            <input type="radio" name="type" value="2" checked> Alternative<br>
                                            <input type="radio" name="type" value="3"> Evidence<br>
                                            <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                            <input type="radio" name="type" value="0"> Purpose<br>
                                            <input type="radio" name="type" value="1"> Problem/Strength<br>
                                            <input type="radio" name="type" value="2"> Alternative<br>
                                            <input type="radio" name="type" value="3" checked> Evidence<br>
                                            <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                        <?php break; ?>

                                        <?php case (4): ?>
                                            <input type="radio" name="type" value="0"> Purpose<br>
                                            <input type="radio" name="type" value="1"> Problem/Strength<br>
                                            <input type="radio" name="type" value="2"> Alternative<br>
                                            <input type="radio" name="type" value="3"> Evidence<br>
                                            <input type="radio" name="type" value="4" checked> Future Direction/Implementation/Resource<br>
                                        <?php break; ?>

                                        <?php default: ?>
                                            <input type="radio" name="type" value="0"> Purpose<br>
                                            <input type="radio" name="type" value="1"> Problem/Strength<br>
                                            <input type="radio" name="type" value="2"> Alternative<br>
                                            <input type="radio" name="type" value="3"> Evidence<br>
                                            <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                    <?php endswitch; ?>
                                    <?php if($errors->first('type')): ?>
                                        <div class="alert alert-danger alert-dismissable show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php echo e($errors->first('type')); ?>

                                        </div>
                                    <?php endif; ?>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Update Tag">
                                <?php else: ?>

                                    <input type="hidden" name="id" value="">
                                    <div class="form-group grey">
                                        <h4>Tag Name Value</h4>
                                        <input type="text" name="name" placeholder="a-new-tag" aria-label="New Tag"/>
                                        <?php if($errors->first('name')): ?>
                                            <div class="alert alert-danger alert-dismissable show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group grey">
                                        <h4>Category</h4>
                                        <input type="radio" name="type" value="0"> Purpose<br>
                                        <input type="radio" name="type" value="1"> Problem/Strength<br>
                                        <input type="radio" name="type" value="2"> Alternative<br>
                                        <input type="radio" name="type" value="3"> Evidence<br>
                                        <input type="radio" name="type" value="4"> Future Direction/Implementation/Resource<br>
                                        <?php if($errors->first('type')): ?>
                                            <div class="alert alert-danger alert-dismissable show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <?php echo e($errors->first('type')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Insert Tag">
                                <?php endif; ?>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>