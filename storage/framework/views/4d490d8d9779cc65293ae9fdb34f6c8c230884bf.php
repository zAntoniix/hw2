

<?php $__env->startSection('title', 'Mia playlist'); ?>

<?php $__env->startSection('external'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/playlist.css')); ?>">
<script>
  const BASE_URL="<?php echo e(url('/playlist')); ?>"
</script>
<script src="<?php echo e(asset('js/playlist.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a><?php echo e($user['username']); ?></a></li>
    <li><a href ="<?php echo e(url('/home')); ?>">Home</a></li>
    <li><a href ="<?php echo e(url('/ricerca')); ?>">Ricerca</a></li>
    <li><a href ="<?php echo e(url('/preferiti')); ?>">Preferiti</a></li>
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
      <li><a href ="<?php echo e(url('/preferiti')); ?>">Preferiti</a></li>
      <li><a href ="<?php echo e(url('/logout')); ?>">Logout</a></li>
    </ul>
  </div>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_page', 'La tua playlist'); ?>

<?php $__env->startSection('content'); ?>
<div id="playlist">
  <h1>Ecco i brani della tua playlist</h1>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
  <div id="playlist-view"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/playlist.blade.php ENDPATH**/ ?>