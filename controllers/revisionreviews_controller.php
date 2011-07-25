<?php
class RevisionreviewsController extends AppController {

	var $name = 'Revisionreviews';

	function index() {
		$this->Revisionreview->recursive = 0;
		$this->set('revisionreviews', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid revisionreview', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('revisionreview', $this->Revisionreview->read(null, $id));
	}

	function add($revid, $stars) {
		//prevents higher than 5 stars
		if($stars > 5){
			$stars = 5;	
		}
		//$some_var = $this->params['named']['revid'];
		$thisUserId = $this->Authsome->get('id');
		$findDuplicate = $this->Revisionreview->find('count', array( 'conditions' => array('Revisionreview.user_id' => $thisUserId, 'Revisionreview.revision_id' => $revid)));
		$revisionInQuestion = $this->Revisionreview->Revision->find('first', array( 'conditions' => array('Revision.id' => $revid)));
		/*
		Does some checking to of the revision's rating.
		*/
		//first: is this revision the users who is trying to rate it? dont let them.
		if($revisionInQuestion['User']['id'] == $thisUserId){
			$this->Session->setFlash(__('You cannot rate your own revision.', true));
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
		else{//second: have they already posted a rating? dont let them if they have.
			if ($findDuplicate < 1){
				if (!empty($this->data) || ($revid && $stars)) {//if everything is in order, post it.
					$this->Revisionreview->create();
					$this->data['Revisionreview']['revision_id'] = $revid;
					$this->data['Revisionreview']['stars'] = $stars;
					$this->data['Revisionreview']['user_id'] = $thisUserId;
					if ($this->Revisionreview->save($this->data)) {
						//if the save worked, update points values according to the rating
						$userStuff = $this->Revisionreview->User->find('first', array('conditions' => array('User.id' => Authsome::get('id'))));
   	   		  			$userUpdate['User']['points'] = $userStuff['User']['points'];
			  			$userUpdate['User']['id'] = $userStuff['User']['id'];  
						switch($stars){
						case 0:
							//subtracts points
							$userUpdate['User']['points'] -= 2;
							break;
						case 1:
							//leaves points the same
							break;
						case 2:
							//adds one point
							$userUpdate['User']['points'] += 1;
							break;
						case 3:
							//adds two points
							$userUpdate['User']['points'] += 2;
							break;
						case 4:
							//adds three points
							$userUpdate['User']['points'] += 3;
							break;
						case 5:
							//adds four points
							$userUpdate['User']['points'] += 4;
							break;	
						}
						$this->Revisionreview->User->save($userUpdate);
						$this->Session->setFlash(__('The revisionreview has been saved', true));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The revisionreview could not be saved. Please, try again.', true));
					}
				}
				}
				else{
					$this->Session->setFlash(__('You have already rated this revision.', true));
					$this->redirect(array('controller' => 'revisions', 'action' => 'index'));	
				}
		}
		$users = $this->Revisionreview->User->find('list');
		$revisions = $this->Revisionreview->Revision->find('list');
		$this->set(compact('users', 'revisions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid revisionreview', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Revisionreview->save($this->data)) {
				$this->Session->setFlash(__('The revisionreview has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The revisionreview could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Revisionreview->read(null, $id);
		}
		$users = $this->Revisionreview->User->find('list');
		$revisions = $this->Revisionreview->Revision->find('list');
		$this->set(compact('users', 'revisions'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for essay', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Revisionreview->delete($id)) {
			$this->Session->setFlash(__('Review deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Review was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>