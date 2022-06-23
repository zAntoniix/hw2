

<?php $__env->startSection('title', 'Preferiti'); ?>

<?php $__env->startSection('external'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/preferiti.css')); ?>">
<script>
  const BASE_URL="<?php echo e(url('/preferiti')); ?>"
</script>
<script src="<?php echo e(asset('js/preferiti.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a><?php echo e($user['username']); ?></a></li>
    <li><a href ="<?php echo e(url('/home')); ?>">Home</a></li>
    <li><a href ="<?php echo e(url('/ricerca')); ?>">Ricerca</a></li>
    <li><a href ="<?php echo e(url('/playlist')); ?>">Playlist</a></li>
    <li><a href ="<?php echo e(url('/logout')); ?>">Logout</a></li>
  </ul>
  <div id="menu" onclick="mobileMenu(this)">
    <div></div>
    <div></div>
    <div></div>
    <ul class="links_mobile">
      <li><a><?php echo e($user['username']); ?></a></li>
      <li><a href ="<?php echo e(url('/home')); ?>">Home</a></li>
      <li><a href ="<?php echo e(url('/ricerca')); ?>">Ricerca</a></li>
      <li><a href ="<?php echo e(url('/playlist')); ?>">Playlist</a></li>
      <li><a href ="<?php echo e(url('/logout')); ?>">Logout</a></li>
    </ul>
  </div>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_page', 'Brani preferiti'); ?>

<?php $__env->startSection('content'); ?>
<div id="preferiti">
  <h1>Ecco i tuoi brani preferiti</h1>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
  <div id="preferiti-view"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/preferiti.blade.php ENDPATH**/ ?>