<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(url('/home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('/view-entries')); ?>">View Entries</a></li>
                        <li class="active">Tags: <?php echo e($article['0']->name); ?></li>
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
                            <h2>Tags for <small><?php echo e($article['0']->name); ?></small></h2>
                            <hr>
                        </div>
                        <?php if($tags->count()): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span style="flex: 0; display: inline-block; margin-bottom: 2px; background: rgba(0,0,0,0.8); color: white; border-radius: 2px; padding: 6px;"><?php echo e($tag); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12" id="purpose">
                                <form id="article_categories_0" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group grey">
                                        <h4>Purpose</h4>
                                        <section class="grid-container">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="0">
                                            <input type="hidden" name="article" value="<?php echo e($article['0']->id); ?>">
                                            <?php $__currentLoopData = $all_tags[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($tag, $tags->toArray())): ?>
                                                    <div class="no-bm">
                                                        <input type="checkbox" name="name[]" value="<?php echo e($tag); ?>" checked><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-bm">
                                                        <input class="list" type="checkbox" name="name[]" value="<?php echo e($tag); ?>"><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="problems">
                                <form id="article_categories_1" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group grey">
                                        <h4>Problems/Strengths of NHST</h4>
                                        <section class="grid-container">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="article" value="<?php echo e($article['0']->id); ?>">
                                            <?php $__currentLoopData = $all_tags[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($tag, $tags->toArray())): ?>
                                                    <div class="no-bm">
                                                        <input type="checkbox" name="name[]" value="<?php echo e($tag); ?>" checked><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-bm">
                                                        <input class="list" type="checkbox" name="name[]" value="<?php echo e($tag); ?>"><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="alternatives">
                                <form id="article_categories_2" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group grey">
                                        <h4>Alternatives</h4>
                                        <section class="grid-container">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="2">
                                            <input type="hidden" name="article" value="<?php echo e($article['0']->id); ?>">
                                            <?php $__currentLoopData = $all_tags[2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($tag, $tags->toArray())): ?>
                                                    <div class="no-bm">
                                                        <input type="checkbox" name="name[]" value="<?php echo e($tag); ?>" checked><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-bm">
                                                        <input class="list" type="checkbox" name="name[]" value="<?php echo e($tag); ?>"><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="evidence">
                                <form id="article_categories_3" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group grey">
                                        <h4>Evidence</h4>
                                        <section class="grid-container">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="3">
                                            <input type="hidden" name="article" value="<?php echo e($article['0']->id); ?>">
                                            <?php $__currentLoopData = $all_tags[3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($tag, $tags->toArray())): ?>
                                                    <div class="no-bm">
                                                        <input type="checkbox" name="name[]" value="<?php echo e($tag); ?>" checked><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-bm">
                                                        <input class="list" type="checkbox" name="name[]" value="<?php echo e($tag); ?>"><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="future">
                                <form id="article_categories_4" class="col-xs-12 col-md-12" action="/categories" method="POST">
                                    <div class="form-group grey">
                                        <h4>Future Direction, Implementation, or Resources Needed</h4>
                                        <section class="grid-container">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="type" value="4">
                                            <input type="hidden" name="article" value="<?php echo e($article['0']->id); ?>">
                                            <?php $__currentLoopData = $all_tags[4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($tag, $tags->toArray())): ?>
                                                    <div class="no-bm">
                                                        <input type="checkbox" name="name[]" value="<?php echo e($tag); ?>" checked><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-bm">
                                                        <input class="list" type="checkbox" name="name[]" value="<?php echo e($tag); ?>"><label class= "list" for="name[<?php echo e($tag); ?>]"><?php echo e($tag); ?></label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                        <input type="submit" class="btn btn-success" value="Add Tags">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>