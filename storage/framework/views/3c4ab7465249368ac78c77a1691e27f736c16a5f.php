<?php $__env->startSection('title',"$post->slug"); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1><?php echo e($post->title); ?></h1>
            <p><?php echo e($post->body); ?></p>
            <hr>
            <p>Posted In:<?php echo e($post->category->name); ?></p>

            <p>Posted At:<?php echo e($post->category->created_at); ?></p>
            <p>Updated At:<?php echo e($post->category->updated_at); ?></p>

        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>