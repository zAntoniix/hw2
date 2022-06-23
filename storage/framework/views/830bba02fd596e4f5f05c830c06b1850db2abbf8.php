

<?php $__env->startSection('title', 'Login - Accedi'); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/login.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<section class="login">
  <h1>Login</h1>

  <?php if($error === true): ?>
  <span id="error" class="log_error">Username e/o password non corretti, riprova!</span>
  <?php endif; ?>

  <span id="error" class="log_error"></span>
  <form name="login" method="post" action="<?php echo e(url('/login')); ?>">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
    <div class="username">
      <div><label for='username'>Username</label></div>
      <div><input type='text' name='username'></div>
    </div>
    <div class="password">
      <div><label for='password'>Password</label></div>
      <div><input type='password' name='password'></div>
    </div>
    <div class="access">
      <input type='submit' id="submit" value="Accedi">
    </div>
  </form>
  <div class="registrazione">Non hai un account? <a href="<?php echo e(url('/signup')); ?>">Iscriviti</a>
</section>
<?php echo $__env->make('layouts.log_sig', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/login.blade.php ENDPATH**/ ?>