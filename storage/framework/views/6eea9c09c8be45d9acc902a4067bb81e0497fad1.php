<html>
  <head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta data="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <?php echo $__env->yieldContent('external'); ?>
  </head>
  <body>
    <?php echo $__env->yieldContent('navbar'); ?>
    <header>
      <div id="overlay"></div>
      <h1>
        <strong><?php echo $__env->yieldContent('title_page'); ?></strong></br>
      </h1>
    </header>
      
    <section>
      <?php echo $__env->yieldContent('content'); ?>
    </section>

    <footer>
      <p>Antonio Zarbo O46002167</p>
    </footer>
  </body>
</html><?php /**PATH D:\UNI\Databases and Web Programming\Web Programming\hw2\resources\views/layouts/base.blade.php ENDPATH**/ ?>