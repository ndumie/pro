<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class Estate extends AppModel {

    public $validate = array(
        'spoc_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A spoc_name is required'
            )
        ),
        'spoc_Address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A spoc_Address is required'
            )
        ),'estate_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A estate_name is required'
            )
        ),'region_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A region is required'
            )
        ),'cell_number' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A  cell_number is required'
            )
        ),
        'email_address' => array(
           
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

}
