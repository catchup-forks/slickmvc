<?php
/**
 * Sample layout
 */

use MyApp\Library\Assets;
use MyApp\Library\Url;
use MyApp\Library\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

  <!-- Site meta -->
  <meta charset="utf-8">
  <?php
  //hook for plugging in meta tags
  $hooks->run('meta');
  ?>
  <title><?php echo $data['title'] . ' - ' . SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

  <!-- CSS -->
  <?php
  Assets::css(array(
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
    Url::templatePath() . 'css/style.css',
  ));

  Assets::js(array(
    'https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.9,b-1.0.3,cr-1.2.0,fc-3.1.0,r-1.0.7/datatables.min.css',
    'https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.9,b-1.0.3,cr-1.2.0,fc-3.1.0,r-1.0.7/datatables.min.js"',
  ));

  //hook for plugging in css
  $hooks->run('css');
  ?>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#example').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/processtickets"
      } );
    } );
  </script>


</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>

<div class="container">
