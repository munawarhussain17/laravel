<?php $__env->startSection('title','Delete Post'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p><strong>Posted By:</strong><?php echo e($comment->name); ?></p>

        <p><strong>Comment:</strong><?php echo e($comment->comment); ?></p>


        <?php echo Form:: open(['route'=>['comment.destroy',$comment->id],'method'=>'DELETE']); ?>

        <?php echo Form::submit('Delete' ,['class'=>'btn btn-danger btn-block']); ?>


    </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>