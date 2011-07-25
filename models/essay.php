<?php
class Essay extends AppModel {
	var $name = 'Essay';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Revision' => array(
			'className' => 'Revision',
			'foreignKey' => 'essay_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

   function getRecent() {
      return $this->find('all');
   }
   
   function afterSave(boolean $created) {
   	   if($created == true){
   	   	   $userstuff = $this->Essay->User->find('first', array('conditions' => array('User.id' => $this->Authsome->get('id'))));
   	   	   $userUpdate['User']['points'] = $userstuff['User']['points'] - 5;
		   $userUpdate['User']['id'] = $userstuff['User']['id'];   
   	   }
   }
}
?>