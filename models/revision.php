<?php
class Revision extends AppModel {
	var $name = 'Revision';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Essay' => array(
			'className' => 'Essay',
			'foreignKey' => 'essay_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);
	
	var $hasMany = array(
		'Revisionreview' => array(
			'className' => 'Revisionreview',
			'foreignKey' => 'revision_id',
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
}
?>