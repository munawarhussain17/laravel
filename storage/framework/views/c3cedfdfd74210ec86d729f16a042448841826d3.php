<?php $__env->startSection('stylesheet'); ?>
    

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Edit Comment'); ?>
    <?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Editing Comments</h1>

                <hr>


                <?php echo Form::model($comment,['route'=>['comment.update',$comment->id],'method'=>'PUT']); ?>



                <?php echo Form::label('name',"Name:"); ?>

                <?php echo Form::text('name',null,['class'=>'form-control ','disabled'=>'disabled']); ?>


                <?php echo Form::label('email',"Email:"); ?>

                <?php echo Form::text('email',null,['class'=>'form-control ','disabled'=>'disabled']); ?>


                <?php echo Form::label('comment',"Comment:"); ?>

                <?php echo Form::textarea('comment',null,['class'=>'form-control']); ?>

<br>

                <?php echo Form::submit('Save Changes',['class'=>'btn btn-success btn-block']); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>