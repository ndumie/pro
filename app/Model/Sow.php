<?php

class Sow extends AppModel {

	public $validate = array(
		'report' => array(
			'rule1' => array(
				'rule' => array(
					'extension', array('docx')),
				'message' => 'Please upload docx file only'
			),
			'rule2' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'File must be less than 1MB'
			)
		),
		'order_id' => array(
			'order_id_not_blank' => array(
				'rule' => 'notEmpty',
				'message' => 'This Sow is missing a order_id'
			),
			'order_id_unique' => array(
				'rule' => 'isUnique',
				'message' => 'A Sow with this title already exists'
			)
		)
	);

}

?>