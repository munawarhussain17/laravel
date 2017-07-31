<?php $__env->startSection('title',"$tag->name Tag"); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <h1>Tag: <?php echo e($tag->name); ?><small> Used In:<?php echo e($tag->posts->count()); ?> Posts</small></h1>
        </div>
        <div class="col-md-2 ">
            <br>
            <a href="<?php echo e(route('tags.edit',$tag->id)); ?>" class="btn btn-primary btn-block">Edit</a>
        </div>
        <div class="col-md-2">
            <br>
            <?php echo e(Form::open(['route'=>['tags.destroy',$tag->id], 'method'=>'DELETE'])); ?>

            <?php echo e(Form::submit('Delete',['class'=>'btn btn-danger btn-block'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class=" table table-default">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Posts</th>
                    <th>Tags</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($post->id); ?></th>
                        <td><?php echo e($post->title); ?></td>
                        <td>  <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <span class="label label-default"><?php echo e($tag->name); ?></span>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </td>
                        <td ><a href="<?php echo e(route('posts.show',$post->id)); ?>" class="btn btn-default btn-xm">View</a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>