<?php $__env->startSection('title','ContactUs'); ?>
<?php $__env->startSection('content'); ?>
  <h2>Horizontal form</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="subjrct">subject:</label>
      <div class="col-sm-10">          
        <input type="subject" class="form-control" id="subjrct" placeholder="Subject" name="subjrct">
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-2" >Message:</label>
      <div class="col-sm-10"> 
      <textarea class="form-control" rows="5" id="message"></textarea></div>
    </div>
  </form>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>