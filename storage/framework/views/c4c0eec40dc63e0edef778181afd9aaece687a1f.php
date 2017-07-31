<?php $__env->startSection('title','Show Post'); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-8">
            <h1><?php echo e($post->title); ?></h1>
            <p class="lead"><?php echo e($post->body); ?></p>

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
                        Updated At:
                    </dt>
                    <dd>
                        <?php echo e(date('M j, Y h:ia',strtotime($post->updated_at))); ?>

                    </dd>
                </dl>
            <hr>
            <dl class="dl">
                <dt>
                    Url:
                </dt>

                <dd>
                    <a href=" <?php echo e(route('slug.single',$post->slug)); ?>"><?php echo e(route('slug.single',$post->slug)); ?></a>
                </dd>
            </dl>
<hr>
            <div class="row">
                <div class="col-sm-6">
                    <?php echo Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')); ?>

                </div>
                <div class="col-sm-6">
                    <?php echo Form:: open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']); ?>

                    <?php echo Form::submit('Delete' ,['class'=>'btn btn-danger btn-block']); ?>


                </div>
            </div>
            <div class="row">
<br>
                <div class="col-sm-12">
                    <?php echo Html::linkRoute('posts.index',"All Posts>>",[],['class'=>'btn btn-default btn-block ']); ?>

                </div>
            </div>


        </div>
        </div>
        </div>




    <?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>