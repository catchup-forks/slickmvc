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

}
