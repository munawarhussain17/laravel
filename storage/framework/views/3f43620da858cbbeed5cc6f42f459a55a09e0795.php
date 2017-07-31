<?php $__env->startSection('title','Homepage'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
                  <div class="jumbotron">
                <h1>My Blog!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud e.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>

              </div>
</div>

    <div class="container">
      <div class="row">
      <div class="col-md-8">
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <h2><?php echo e($post->title); ?></h2>
          <p><?php echo e(substr($post->body,0,300)); ?><?php echo e(strlen($post->body)>300?"...":""); ?></p>

          <a href="<?php echo e(route('slug.single',$post->slug)); ?>" class="btn btn-primary">Read More</a><hr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="container">
      <div class="row">
      <div class="col-md-3 col-md-offset-1">


      <h2>SideBar</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut .</p>
      </div>
      </div>
      </div>


      </div>
        <div class="text-center">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>