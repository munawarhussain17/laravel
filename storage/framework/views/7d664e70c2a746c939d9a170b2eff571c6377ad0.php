<?php $__env->startSection('title','Show Post'); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <?php echo Form::model($post,array('route'=>array('posts.update',$post->id),'method'=>'PATCH')); ?>

        <div class="col-md-8">
            <?php echo Form::label('title',"Title:"); ?>

            <?php echo Form::text('title',null,array('class'=>'form-control')); ?>

            <?php echo Form::label('slug',"Url"); ?>

            <?php echo Form::text('slug',null,['class'=>'form-control']); ?>


            <?php echo Form::label('body',"Body:"); ?>

            <?php echo Form::text('body',null,array('class'=>'form-control')); ?>








        </div>
        <div class="col-md-4">
            <div class="well">

                <dl class="dl">
                    <dt>
                        Created At:
                    </dt>
                    <dd>
                        <?php echo e(date('M j, Y h:ia',strtotime($post->created_at))); ?>

                    </dd>
                </dl>



                <dl class="dl">
                    <dt>
                        Created At:
                    </dt>
                    <dd>
                        <?php echo e(date('M j, Y h:ia',strtotime($post->updated_at))); ?>

                    </dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')); ?>

                    </div>
                    <div class="col-sm-6">
                        <?php echo Form:: submit('Save Changes',array('class'=>'btn btn-success btn-block')); ?>


                    </div>
                </div>


            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>