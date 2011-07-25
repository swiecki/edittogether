<?php
    class DashboardController extends AppController {
 /*
 This controller grabs the necessary data for the dashboard view. The user is sent here
 right after login.
 */
          var $name = 'Dashboard';
          var $uses = array();
 
          function index () {
          	   $this->layout = 'blank';
          	   //$userdata = $this->Authsome->get();
          	   //$userdata = $this -> Session -> read();
               $this->set('recentEssays', ClassRegistry::init('Essay')->getRecent());
               $this->set('recentRevisions', ClassRegistry::init('Revision')->getRecent());
               $this->set('userInfo', ClassRegistry::init('User')->find('first', array('conditions' => array('User.id' => $this->Authsome->get('id')))));
               //$this->set('userInfo', $userdata);
               }
    }
?>