<?php $__env->startSection('title','Show Post'); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-8">
            <h1><?php echo e($post->title); ?></h1>
            <p class="lead"><?php echo $post->body; ?></p>
            <hr>
            <p ><strong>Tags:</strong></p>
            <div class="tags">
                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="label label-default"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <br>
            <h2 class="well text-center">Comments</h2>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($comment->name); ?></td>
                        <td><?php echo e($comment->email); ?></td>
                        <td><?php echo $comment->comment; ?></td>
                        <td>
                            <a href="<?php echo e(route('comment.edit',$comment->id)); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?php echo e(route('comment.delete',$comment->id)); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

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
                    Category:
                </dt>
                <dd>
                    <?php echo e($post->category->name); ?>

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