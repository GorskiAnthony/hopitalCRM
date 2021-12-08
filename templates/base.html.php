<!DOCTYPE html>
<html lang="en">
<?php include_once 'templates/includes/head.php'; ?>
<body class="min-h-screen">
  <?php include_once 'templates/includes/nav.php'; ?>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mx-auto ">
      <h1 class="sm:text-3xl text-2xl font-extrabold title-font mb-4 text-gray-900 text-center pt-16"><?= $titre ?></h1>
      <?= $pageContent ?>
    </div>
  </div>
  
<?php
include_once 'templates/includes/script.php';
include_once 'templates/includes/footer.php';
?>
</body>
</html>