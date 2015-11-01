<?php

namespace MyApp\Models;

use MyApp\Core\Model;
use MyApp\Library\Database;

class TicketsModel extends Model
{
  var $fields = "";

  public function __construct() {
    parent::__construct();
  }

  /**
   * @return mixed
   */
  public function get_tickets() {

    if (!isset($this->_db))
      $this->_db = Database::get();

/*
[ID] => 0000000002
[BUGNR] => 1
[NAAM] => Website fout
[OFFERTENR] => 257
[CONTACTPERS] =>
[KLANTID] => 0000000005
[CATAGORYID] => 23
[SERVERTY] => Major
[STATUS] => Afgesloten
[PRIORITY] => Normaal
[PERSONEELSLID] => 1
[PERSONEELSLID2] => 0000000001
[PERSONEELSLID3] => 0000000005
[REPORTDATUM] => 2005-09-28
[UPDATEDATUM] => 2006-10-16
[ESCALATIEDATUM] =>
[DEADLINE] =>
[TIJD] =>
[BESTAND] =>
[BEDRIJFSID] => 1
[KOPPELING] =>
[GELEZEN] =>
[RESOURCESNODIG] =>
[RESOURCESGEREGELD] =>
[EXCHANGESTATUS] =>
[EXCHANGEID] =>
[RAW] =>
[URENBEGROOT] =>
[VOLGORDE] =>
[CONTACTPERSOON] =>
[CONTACTTEL] =>
[CONTACTEMAIL] =>
 **/
      $fields = "ID*1, BUGNR, NAAM, OFFERTENR, KLANTID, STATUSID, STATUS, SEVERITY, PRIORITY, PERSONEELSLID, REPORTDATUM, UPDATEDATUM, ESCALATIEDATUM, DEADLINE, KOPPELING, CONTACTPERS, CONTACTPERSOON, CONTACTEMAIL";


      return $this->_db->select("SELECT ".$fields." FROM " . PREFIX . "tickets ORDER BY id LIMIT 10");
  }

  public function get_ticket($id) {
    return $this->_db->select("SELECT * FROM " . PREFIX . "tickets WHERE id =:id", array(':id' => $id));
  }

  public function insert($data) {
    $this->_db->insert(PREFIX . "tickets", $data);
  }

  public function update($data, $where) {
    $this->_db->update(PREFIX . "tickets", $data, $where);
  }

  public function delete($id) {
    $this->_db->delete(PREFIX . "tickets", array('id' => $id));
  }

}
