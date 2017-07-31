<?php $__env->startSection('title','Categories'); ?>

<?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($category->id); ?></th>
                        <td><?php echo e($category->name); ?></td>
                    </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <div class="col-md-3 ">

                <div class="row">
                    <div class="well">
                        <h2 class="text-center">
                            New Category

                        </h2>
                        <?php echo Form::open(['route'=>'categories.store','method'=>'POST']); ?>

                            <?php echo Form::label('name',"Name: "); ?>

                            <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                        <br>
                        <?php echo Form::submit('Create New Category',['class'=>'btn btn-block btn-primary']); ?>

                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>