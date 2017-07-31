<?php $__env->startSection('title',"$post->slug"); ?>
<?php $__env->startSection('stylesheet'); ?>


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1><?php echo e($post->title); ?></h1>
            <p><?php echo $post->body; ?></p>
            <hr>
            <p><strong>Posted In:<?php echo e($post->category->name); ?></strong></p>



            <p><strong>Posted At:<?php echo e(date('M j, Y h:ia',strtotime($post->created_at))); ?></strong></p>
            <p><strong>Updated At:<?php echo e(date('M j, Y h:ia',strtotime($post->updated_at))); ?></strong></p>


        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="well text-center">All Comments</h2>
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($comment->name); ?></strong><p><?php echo e($comment->created_at); ?></p>

                    <p><?php echo $comment->comment; ?></p>

                    <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>




    </div>
    <div class="row">
        <hr>

        <div class="col-md-8 col-md-offset-2">
            <h2 class="well text-center">Add Your Comment Here</h2>
            <?php echo Form::open(['route'=>['comment.store',$post->id],'method'=>'POST']); ?>

            <?php echo Form::label('name',"Name:"); ?>

            <?php echo Form::text('name',null,['class'=>'form-control']); ?>


            <?php echo Form::label('email',"Email:"); ?>

            <?php echo Form::text('email',null,['class'=>'form-control']); ?>


            <?php echo Form::label('comment',"Comment:"); ?>

            <?php echo Form::textarea('comment',null,['class'=>'form-control']); ?>

            <br>

            <?php echo Form::submit('Post Comment',['class'=>'btn btn-block btn-success']); ?>


            <?php echo Form::close(); ?>


        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>