<?php
include 'libs/load.php'
?>

<!doctype html>
<html lang="en">

    
  <?php load_templates("_head");?>


  <body>
    
  <?php load_templates("_navbar");?>


<main>

<?php load_templates("_banner");?>

<?php load_templates("_photogram");?>

</main>

<?php load_templates("_footer");?>

    <script src= "<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>  
  </body>
</html>
