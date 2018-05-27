<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->email == "monteleoc8@students.rowan.edu" || Auth::user()->email == "fife@rowan.edu"): ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/home')); ?> ">Home</a></li>
                        <li class="active"><span style="color:#c6211b;">Admin Access:</span> Tags List</li>
                    </ul>
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissable show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('delete-status')): ?>
                        <div class="alert alert-info alert-dismissable show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo e(session('delete-status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="flex fd-c">
                        <div class="jcc">
                            <h2>Tags List</h2>
                        </div>
                        <table class="table table-hover" id="sortable">
                            <thead>
                                <tr>
                                    <th>Tag ID</th>
                                    <th>Tag Name</th>
                                    <th>Tag Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($feed->count()): ?>
                                    <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($tag->id); ?>

                                            </td>
                                            <td><?php echo e($tag->name); ?></td>
                                            <td>
                                                <?php switch($tag->type):
                                                    case (0): ?>
                                                        Purpose
                                                    <?php break; ?>

                                                    <?php case (1): ?>
                                                        Problem/Strength
                                                    <?php break; ?>

                                                    <?php case (2): ?>
                                                        Alternative
                                                    <?php break; ?>

                                                    <?php case (3): ?>
                                                        Evidence
                                                    <?php break; ?>

                                                    <?php case (4): ?>
                                                        Future/Imp./Resource
                                                    <?php break; ?>

                                                    <?php default: ?>
                                                        Type not set
                                                <?php endswitch; ?>
                                            </td>
                                            <td><a href="/categories/editor/edit/<?php echo e($tag->id); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                            <td><a href="/categories/editor/discard/<?php echo e($tag->id); ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        Nothing to show yet. Create a tag to get started.
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group flex jc-sa fd-r">
                        <a href="/categories/editor/edit">
                            <div class="btn btn-default btn-info" id="import">
                                Create a New Tag
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/css/table.css">
<script src="js/app.js" defer="false"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous" defer="false"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php else: ?>
    <?php echo e(redirect('/home')); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>