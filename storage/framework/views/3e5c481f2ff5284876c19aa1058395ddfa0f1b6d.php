<?php $__env->startSection('title','| New Post'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <?php echo Html::style('css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="row">
<div class="col-md-8 col-md-offset-2">
<h1>Create New Post</h1>
<hr>
<?php echo Form::open(['route' => 'posts.store','data-parsley-validate'=>'' ]); ?>

    <?php echo e(Form::label('title','Title:')); ?>

    <?php echo e(Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))); ?>


    <?php echo e(Form::label('slug','Slug:')); ?>

    <?php echo e(Form::text('slug',null,array('class'=>'form-control','required'=>'','munlength:5','maxlength'=>'255'))); ?>


    <?php echo e(Form::label('body','Post Body:')); ?>

    <?php echo e(Form::textarea('body',null,array('class'=>'form-control','required'=>''))); ?>





    <?php echo e(Form::submit('Submit New Post',array('class'=> 'btn btn-lg btn-success btn-block' ,'style'=>'margin-top:20px '))); ?>

<?php echo Form::close(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo Html::script('js/parsley.min.css'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>