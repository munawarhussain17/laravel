<?php $__env->startSection('title','ContactUs'); ?>
<?php $__env->startSection('content'); ?>

  <h2>Contact Us</h2>
  <form class="form-horizontal" action="<?php echo e(url('contact')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input  class="form-control" id="email"  name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" name="subject">Subject:</label>
      <div class="col-sm-10">          
        <input  class="form-control" id="subject"  name="subject">
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-2" name="message" >Message:</label>
      <div class="col-sm-10"> 
      <textarea class="form-control" rows="5" id="message" name="message"></textarea></div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Send Message</button>
      </div>
    </div>
  </form>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>