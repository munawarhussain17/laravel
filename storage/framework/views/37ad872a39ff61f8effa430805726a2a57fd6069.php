<?php $__env->startSection('title','Homepage'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
                  <div class="well well">
                <h1>My Blog!</h1>
                      <p>A blog (a truncation of the expression "weblog")[1] is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries ("posts"). Posts are typically displayed in reverse chronological order, so that the most recent post appears first, at the top of the web page. Until 2009, blogs were usually the work of a single individual,[citation needed] occasionally of a small group, and often covered a single subject or topic. In the 2010s, "multi-author blogs" (MABs) have developed, with posts written by large numbers of authors and sometimes professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other "microblogging" systems helps integrate MABs and single-author blogs into the news media. Blog can also be used as a verb, meaning to maintain or add content to a blog.</p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>

              </div>
</div>

    <div class="container">
      <div class="row">
      <div class="col-md-8">
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <h2><?php echo e($post->title); ?></h2>
          <p><?php echo e(substr(strip_tags($post->body),0,300)); ?><?php echo e(strlen(strip_tags($post->body))>300?"...":""); ?></p>

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