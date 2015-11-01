<?php
/**
 * Sample layout
 */

use MyApp\Core\Error;

?>
<div class="container content">
  <div class="row">
    <div class="col-md-12">

      <h1><?php echo $data['title'];?></h1>

      <?php echo $data['error']; ?>

      <hr/>

      <h3>Error</h3>

      <p>Error Long message</p>

      <h3>Troubleshooting</h3>

      <ul>
        <li>Troubleshooting</li>
      </ul>

    </div>
  </div>
</div>
