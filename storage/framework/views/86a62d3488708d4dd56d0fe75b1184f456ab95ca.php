<?php $__env->startSection('title','Show Post'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <?php echo Html::style('css/parsley.css'); ?>

    <?php echo Html::style('css/select2.min.css'); ?>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea'
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <?php echo Form::model($post,array('route'=>array('posts.update',$post->id),'method'=>'PUT')); ?>

        <div class="col-md-8">
            <?php echo Form::label('title',"Title:"); ?>

            <?php echo Form::text('title',null,array('class'=>'form-control')); ?>

            <?php echo Form::label('slug',"Url"); ?>

            <?php echo Form::text('slug',null,['class'=>'form-control']); ?>

            <?php echo Form::label('category_id',"Category"); ?>

            <select class="form-control" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>


            <?php echo Form::label('tags','Tag:'); ?>

            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>


            <?php echo Form::label('body',"Body:"); ?>

            <?php echo Form::textarea('body',null,array('class'=>'form-control')); ?>








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
<?php $__env->startSection('scripts'); ?>
    <?php echo Html::script('js/parsley.min.js'); ?>

    <?php echo Html::script('js/select2.min.js'); ?>

    <script type="text/javascript">
        $('.select2-multi').select2();

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>