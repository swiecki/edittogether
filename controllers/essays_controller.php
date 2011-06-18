<?php
class EssaysController extends AppController {

	var $name = 'Essays';

	function index() {
		$this->Essay->recursive = 0;
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
		if (!empty($this->data)) {
			$this->Essay->create();
			if ($this->Essay->save($this->data)) {
				$this->Session->setFlash(__('The essay has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The essay could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Essay->User->find('list');
		$this->set(compact('users'));
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