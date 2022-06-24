

<?php $__env->startSection('title', 'Ricerca brani'); ?>

<?php $__env->startSection('external'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/ricerca.css')); ?>">
<script>
  const BASE_URL="<?php echo e(url('/ricerca')); ?>"
</script>
<script src="<?php echo e(asset('js/ricerca.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
<nav>
  <div id="nome">Recording Studio</div>
  <ul id="links">
    <li><a><?php echo e($user['username']); ?></a></li>
    <li><a href ="<?php echo e(url('/home')); ?>">Home</a></li>
    <li><a href ="<?php echo e(url('/preferiti')); ?>">Preferiti</a></li>
    <li><a href ="<?php echo e(url('/myplaylist')); ?>">Playlist</a></li>
    <li><a href ="<?php echo e(url('/logout')); ?>">Logout</a></li>
  </ul>
  <div id="menu" onclick="mobileMenu(this)">
    <div></div>
    <div></div>
    <div></div>
    <ul class="links_mobile">
      <li><a><?php echo e($user['username']); ?></a></li>
      <li><a href ="<?php echo e(url('/home')); ?>">Home</a></li>
      <li><a href ="<?php echo e(url('/preferiti')); ?>">Preferiti</a></li>
      <li><a href ="<?php echo e(url('/myplaylist')); ?>">Playlist</a></li>
      <li><a href ="<?php echo e(url('/logout')); ?>">Logout</a></li>
    </ul>
  </div>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title_page', 'Ricerca brani e testi'); ?>

<?php $__env->startSection('content'); ?>
<div id="searchbox">
  <form id="spotify">
    Inserisci il titolo della canzone che vuoi cercare
    <input type="text" id="song">
    <input type="submit" id="submit" value="Cerca">
  </form>
  
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
  <div id="result-view"></div>
  <div id="navigazione">
    <a id="prec" class="hidden">Precedente</a>
    <a id="succ" class="hidden">Successiva</a>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/ricerca.blade.php ENDPATH**/ ?>