<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/home')); ?> ">Home</a></li>
                        <li class="active">View Entries</li>
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
                    <div class="flex fd-c">
                        <div class="jcc">
                            <h2>Viewing All Entries</h2>
                        </div>
                        <table class="table table-hover" id="sortable">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Year</th>
                                    <th>Comments</th>
                                    <th>Tags</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($feed->count()): ?>
                                    <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if(isset($article->doi)): ?>
                                                    <a target="_blank" href="https://rowan.summon.serialssolutions.com/search?ho=t&l=en&q=(DOI:(<?php echo e($article->doi); ?>))"><?php echo e($article->name); ?></a>
                                                <?php else: ?>
                                                    <abbr title="No DOI record to link."><?php echo e($article->name); ?></abbr>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($article->year); ?></td>
                                            <td><a href="/comments/<?php echo e($article->id); ?>"><?php echo e($article->comments()->count()); ?> <?php echo e(str_plural('comment', $article->comments()->count())); ?></a></td>
                                            <td><a href="/categories/<?php echo e($article->id); ?>"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></a></td>
                                            <td><a href="/discard/<?php echo e($article->id); ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        Nothing to show yet. Import an article to get started.
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group flex jc-sa fd-r">
                        <?php if(Auth::user()->email == "monteleoc8@students.rowan.edu" || Auth::user()->email == "fife@rowan.edu"): ?>
                            <a href="<?php echo e(url('/categories/editor/list')); ?>"><div class="btn btn-danger">Admin: Tag Manager</div></a>
                        <?php endif; ?>
                        <a href="/new-entry">
                            <div class="btn btn-default btn-info" id="import">
                                Import An Article
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/css/table.css">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous" defer="false"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>