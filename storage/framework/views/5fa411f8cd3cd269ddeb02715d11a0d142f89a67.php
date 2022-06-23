

<?php $__env->startSection('title', 'Signup - Registrati'); ?>

<?php $__env->startSection('script'); ?>
<script>
  const BASE_URL ="<?php echo e(url('/signup')); ?>"
</script>
<script src="<?php echo e(asset('js/signup.js')); ?>" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<section class="signup_form">
  <h1>Signup</h1>
  <span id="error"></span>
  <form name="signup" method="post" action="<?php echo e(url('/signup')); ?>">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
    <div class="nome">
      <div><label for='nome'>Nome</label></div>
      <div><input type='text' name='nome'></div>
      <span></span>
    </div>
    <div class="cognome">
      <div><label for='cognome'>Cognome</label></div>
      <div><input type='text' name='cognome'></div>
      <span></span>
    </div>
    <div class="username">
      <div><label for='username'>Username</label></div>
      <div><input type='text' name='username'></div>
      <span></span>
    </div>
    <div class="email">
      <div><label for='email'>Email</label></div>
      <div><input type='text' name='email'></div>
      <span></span>
    </div>
    <div class="password">
      <div><label for='password'>Password</label></div>
      <div><input type='password' name='password'></div>
      <span></span>
    </div>
    <div class="conferma_password">
      <div><label for='conferma_password'>Conferma Password</label></div>
      <div><input type='password' name='conferma_password'></div>
      <span></span>
    </div>
    <div class="register">
      <input type='submit' id="submit" value="Registrati">
    </div>
  </form>
  <div class="accesso">Hai già un account? <a href="<?php echo e(url('/login')); ?>">Accedi</a>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.log_sig', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/signup.blade.php ENDPATH**/ ?>