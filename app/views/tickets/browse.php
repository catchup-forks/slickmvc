<?php
/**
 * Sample layout
 */

use MyApp\Core\Language;

?>

<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['browse_message'] ?></p>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
  <thead>
  <tr>
    <th width="20%">Rendering engine</th>
    <th width="25%">Browser</th>
    <th width="25%">Platform(s)</th>
    <th width="15%">Engine version</th>
    <th width="15%">CSS grade</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td colspan="5" class="dataTables_empty">Loading data from server</td>
  </tr>
  </tbody>
  <tfoot>
  <tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
  </tr>
  </tfoot>
</table>
