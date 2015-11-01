<?php
/**
 * Tickets controller
 *
 * @author  David Carr - dave@daveismyname.com
 * @version 2.2
 * @date    June 27, 2014
 * @date    updated Sept 19, 2015
 */

namespace MyApp\Controllers;

use MyApp\Core\View;
use MyApp\Core\Controller;
use MyApp\Models\TicketsModel;
use MyApp\Library\Data;
use MyApp\Library\SSP;


/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Tickets extends Controller
{
  private $_tickets;

  /**
   * Call the parent construct
   */
  public function __construct() {
    parent::__construct();
    $this->language->load('Tickets');
    /*
    if(Session::get('loggin') == false){
      url::redirect('admin/login');
    }
    */
  }

  /**
   * Define Index page title and load template files
   */
  public function index() {
    $data['title'] = $this->language->get('tickets_text');
    $data['welcome_message'] = $this->language->get('tickets_message');

    View::renderTemplate('header', $data);
    View::render('tickets/index', $data);
    View::renderTemplate('footer', $data);
  }

  /**
   * Define Browse page title and load template files
   */
  public function browse() {
    $data['title'] = $this->language->get('browse_text');
    $data['browse_message'] = $this->language->get('browse_message');
    $data['tickets'] = TicketsModel::get_tickets();
    //Data::pr($data['tickets']);

    View::renderTemplate('header', $data);
    View::render('tickets/browse', $data);
    View::renderTemplate('footer', $data);
  }

  public function add() {
    if (isset($_POST['submit'])) {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      if (empty($firstName)) {
        $error[] = 'Please enter the first name';
      }
      if (empty($lastName)) {
        $error[] = 'Please enter the last name';
      }
      if (!isset($error)) {
        $postdata = array(
          'firstName' => $firstName,
          'lastName'  => $lastName
        );
        $this->_tickets->insert($postdata);
        Url::redirect('tickets');
      }
    }
    $data['title'] = 'Add Ticket';
    $this->view->rendertemplate('header', $data);
    $this->view->render('tickets/add', $data, $error);
    $this->view->rendertemplate('footer', $data);
  }

  function edit($id) {
    if (isset($_POST['submit'])) {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      if (empty($firstName)) {
        $error[] = 'Please enter the first name';
      }
      if (empty($lastName)) {
        $error[] = 'Please enter the last name';
      }
      if (!isset($error)) {
        $postdata = array(
          'firstName' => $firstName,
          'lastName'  => $lastName
        );
        $where = array('id' => $id);
        $this->_tickets->update($postdata, $where);
        Url::redirect('tickets');
      }
    }
    $data['title'] = 'Edit';
    $data['row'] = $this->_tickets->get_ticket($id);
    $this->view->rendertemplate('header', $data);
    $this->view->render('tickets/edit', $data, $error);
    $this->view->rendertemplate('footer', $data);
  }

  function delete($id) {
    $this->_tickets->delete($id);
    Url::redirect('tickets');
  }

  function processtickets() {
// DB table to use
    $table = 'datatables_demo';

// Table's primary key
    $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
    $columns = array(
      array('db' => 'first_name', 'dt' => 0),
      array('db' => 'last_name', 'dt' => 1),
      array('db' => 'position', 'dt' => 2),
      array('db' => 'office', 'dt' => 3),
      array(
        'db'        => 'start_date',
        'dt'        => 4,
        'formatter' => function ($d, $row) {
          return date('jS M y', strtotime($d));
        }
      ),
      array(
        'db'        => 'salary',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
          return '$' . number_format($d);
        }
      )
    );

// SQL server connection information
    $sql_details = array(
      'user' => '',
      'pass' => '',
      'db'   => '',
      'host' => ''
    );


    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */

    //require('ssp.class.php');

    echo json_encode(
      SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );
  }

}