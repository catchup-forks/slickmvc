<?php
/**
 * Sample layout
 */

use MyApp\Core\Language;

?>

<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['tickets_message'] ?></p>

<a class="btn btn-md btn-success" href="<?php echo DIR;?>tickets/browse">
	<?php echo Language::show('browse_tickets', 'Tickets'); ?>
</a>
