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
          	  $this->set('recentEssays', ClassRegistry::init('Essay')->getRecent());
          	  $this->set('recentRevisions', ClassRegistry::init('Revision')->getRecent());
          	  $this->set('userInfo', ClassRegistry::init('User')->find('first', array('conditions' => array('User.id' => $this->Authsome->get('id')))));
          	  //Pagination code here: have to implement in view
          	  $this->paginate = array(
          	  	  'Essay' => array('limit' => 6, 
                           'order' => array('revision_count' => 'asc'))
                          );
                $this->set('essays', $this->paginate());
                $this->paginate = array(
          	  	  'Revision' => array('limit' => 6)
                          );
                $this->set('revisions', $this->paginate());    
          }
    }
?>