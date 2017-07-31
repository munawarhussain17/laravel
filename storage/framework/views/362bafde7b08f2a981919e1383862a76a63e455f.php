<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">My Blog</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li class="<?php echo e(Request::is('/')?"active":""); ?>"><a href="/">Home <span class="sr-only">(current)</span></a></li>
    <li class="<?php echo e(Request::is('blog')?"active":""); ?>"><a href="/blog">Posts</a></li>
    <li class="<?php echo e(Request::is('about')?"active":""); ?>"><a href="/about">About</a></li>
    <li class="<?php echo e(Request::is('contact')?"active":""); ?>" ><a href="/contact">Contact</a></li>
    
  </ul>
  
    
  <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo e(route('register')); ?>">Registration</a></li>
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('posts.index')); ?>">Posts</a></li>
        <?php if(auth::check()): ?>
        <li><a href="<?php echo e(route('categories.index')); ?>">Categories</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li>
          <a href="<?php echo e(route('logout')); ?>"
             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

          </form>
        </li>      </ul>

    </li>

<hr>
    <?php else: ?>
      <li role="separator" class="divider"></li>
      <li><a href="<?php echo e(route('login')); ?>">LogIn</a></li>
    <?php endif; ?>


  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

