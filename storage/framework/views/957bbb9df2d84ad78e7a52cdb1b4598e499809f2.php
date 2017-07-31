<?php $__env->startSection('title','|Blog'); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>



    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2><?php echo e($post->title); ?></h2>
                <h4>Published: <?php echo e(date('M j,Y', strtotime($post->created_at))); ?></h4>
                <p><?php echo e(substr(strip_tags($post->body),0,250)); ?><?php echo e(strlen(strip_tags($post->body))>250 ?"...":""); ?></p>
                <a href="<?php echo e(route('slug.single',$post->slug)); ?> " class="btn btn-primary">Read More</a>

                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="text-center">
        <?php echo e($posts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>