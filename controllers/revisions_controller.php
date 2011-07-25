<?php
class RevisionsController extends AppController {

	var $name = 'Revisions';

	function index() {
		$this->Revision->recursive = 0;
		$this->set('revisions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid revision', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('revision', $this->Revision->read(null, $id));
	}

	function add() {
		$userstuff = $this->Revision->User->find('first', array('conditions' => array('User.id' => $this->Authsome->get('id'))));
		if (!empty($this->data)) {
			$this->Revision->create();
			/*
			Edits the $this-data array to automatically fix in the user id
			*/
			$this->data['Revision']['user_id'] = $userstuff['User']['id'];
			$userUpdate['User']['points'] = $userstuff['User']['points'] + 2;
			$userUpdate['User']['id'] = $userstuff['User']['id'];
			if ($this->Revision->save($this->data)) {
				$this->Revision->User->save($userUpdate);
				$this->Session->setFlash(__('The revision has been saved. You have gained 2 points.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The revision could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Revision->User->find('list');
		$essays = $this->Revision->Essay->find('list');
		$this->set(compact('users', 'essays'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid revision', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Revision->save($this->data)) {
				$this->Session->setFlash(__('The revision has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The revision could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Revision->read(null, $id);
		}
		$users = $this->Revision->User->find('list');
		$essays = $this->Revision->Essay->find('list');
		$this->set(compact('users', 'essays'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for revision', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Revision->delete($id)) {
			$this->Session->setFlash(__('Revision deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Revision was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>