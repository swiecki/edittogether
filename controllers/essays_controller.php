<?php
class EssaysController extends AppController {

	var $name = 'Essays';

	function index() {
		$this->Essay->recursive = 1;
		$this->set('essays', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid essay', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('essay', $this->Essay->read(null, $id));
	}

	function add() {
			$userStuff = $this->Essay->User->find('first', array('conditions' => array('User.id' => $this->Authsome->get('id'))));	
			if (!empty($this->data)) {
				if($userStuff['User']['points'] >= 5){//checks to see if user has more than 5 points
					$this->Essay->create();
					$this->data['Essay']['user_id'] = $userStuff['User']['id'];
					if ($this->Essay->save($this->data)) {
						$this->Session->setFlash(__('The essay has been saved', true));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The essay could not be saved. Please, try again.', true));
						}
					}
				else {
					$this->Session->setFlash(__('You do not have enough points to save your essay.', true));	
			}}
					$users = $this->Essay->User->find('list');
					$this->set(compact('users'));
	}
	function browse() {
		$this->paginate = array(
	'Essay' => array('limit' => 25, 
                           'order' => array('revision_count' => 'asc'))
                          );
                $this->set('essays', $this->paginate());
	}
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid essay', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Essay->save($this->data)) {
				$this->Session->setFlash(__('The essay has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The essay could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Essay->read(null, $id);
		}
		$users = $this->Essay->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for essay', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Essay->delete($id)) {
			$this->Session->setFlash(__('Essay deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Essay was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>