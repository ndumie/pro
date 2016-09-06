<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class HousesController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}

	public function export() {

		$this->response->download("export.csv");
		$this->loadModel('Header');
		$header = $this->Header->find('all');

		$data = $this->House->find('all');

		$this->set(compact('header'));
		$this->set(compact('data'));

		$this->layout = 'ajax';

		return;
	}

	public function check() {
		if (isset($this->params['url']['search'])) {
			echo 'search text has been found';
		}
	}

	public function index() {

		if ($this->Auth->login()) {
			$id = $this->Auth->user('id');
//			   $options['joins'] = array(array('table' => 'estates','alias' => 'estate',
//			       'type' => 'INNER','conditions' => array('estate.id = House.estate_id')));
//			 $options['fields'] = array('House.id','House.street_name','estate.estate_name',
//			 'House.surbub_name', 'House.service_request', 'House.service_account_name',
//			 'House.solution_IDNumber', 'House.oder_number', 'House.contact_number', 
//			 'House.first_appointment_date', 'House.second_appointment_date');

			$this->set("houses", $this->House->find('all'));
		} else {
			$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
	}

	function search() {
		if (isset($this->params->query['estate_name'])) {
			$keyword = $this->params->query['estate_name']; //get keyword from querystring//
			//used simpme or condition with singe value checking
			//replace ModelName with actual name of your Appmodel
			$cond = array('OR' => array("House.estate_name LIKE '%$keyword%'"));

			$list = $this->House->find('all', array('conditions' => $cond));
			$this->set("listSearch", $list);
		}
	}

	function searchResults() {
		if (isset($this->params->query['estate_name'])) {
			$keyword = $this->params->query['estate_name']; //get keyword from querystring//
			//used simpme or condition with singe value checking
			//replace ModelName with actual name of your Appmodel
			$cond = array('OR' => array("House.estate_name LIKE '%$keyword%'"));

			$list = $this->House->find('all', array('conditions' => $cond));
		}
	}

	public function add() {
		if ($this->Auth->login()) {
			if (!empty($this->request->data)) {
				if ($this->request->is('post')) {
					if ($this->House->save($this->request->data)) {
						$this->Session->setFlash(_("Estate added successful"));
					}
				} else {

					$this->Session->setFlash(__('Didn\'t registered succesful. Please, try again.', null), 'default', array('class' => 'error-message'));
				}
			}
			$this->loadModel('Estate');
			$listEstate = $this->Estate->find('list', array('fields' => array('id', 'estate_name')));
			$this->set('listEstate', $listEstate);

			$this->loadModel('Region');
			$listRegion = $this->Region->find('list', array('fields' => array('id', 'region_name')));
			$this->set('listRegion', $listRegion);

			$this->loadModel('Servicerequeststatus');
			$Servicerequeststatus = $this->Servicerequeststatus->find('list', array('fields' => array('servicerequeststatus_name', 'servicerequeststatus_name')));
			$this->set('Servicerequeststatus', $Servicerequeststatus);

			if (isset($this->params->query['estate_id'])) {
				$keyword = $this->params->query['estate_id'];
				$cond = array('OR' => array("House.estate_id LIKE '%$keyword%'"));

				$list = $this->House->find('all', array('conditions' => $cond));
				$this->set("listSearch", $list);
				$this->redirect(array('action' => 'addOder/' . $this->params->query['estate_id'], 'controller' => 'Houses'));
			}
		} else {

			$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
	}

	public function delete($id = null) {
		if ($this->Auth->login()) {
			$this->House->delete($id);
			$this->redirect(array('action' => 'index', 'controller' => 'Houses'));
		} else {
			$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
	}

	public function edit($id = NULL) {
		if ($this->Auth->login()) {
			if (empty($this->data)) {

				$this->data = $this->House->findById($id);
			} else {
				$this->House->save($this->data);
				$this->Session->setFlash("Estate edit successful");
				$this->redirect(array('action' => 'index', 'controller' => 'Houses'));
			}
			
			    $options['joins'] = array(
				array('table' => 'sows',
					'conditions' => array(
						'sows.order_id = House.id' ,
						'sows.order_id = '.$id
						
					)
				)
			);
			$options['fields'] = array('sows.id','sows.description','sows.report','sows.order_id');
			$this->set("sowdocuments", $this->House->find('all', $options));
			
			$options['joins'] = array(
				array('table' => 'sows',
					'conditions' => array(
						'House.id = '.$id
						
					)
				)
			);
			$options['fields'] = array('sows.id','sows.description','sows.report','sows.order_id','House.id');
			$this->set("houses", $this->House->find('all', $options));
			$this->loadModel('Estate');
			$listEstate = $this->Estate->find('list', array('fields' => array('id', 'estate_name')));
			$this->set('listEstate', $listEstate);

			$this->loadModel('Region');
			$listRegion = $this->Region->find('list', array('fields' => array('id', 'region_name')));
			$this->set('listRegion', $listRegion);

			$this->loadModel('Servicerequeststatus');
			$Servicerequeststatus = $this->Servicerequeststatus->find('list', array('fields' => array('servicerequeststatus_name', 'servicerequeststatus_name')));
			$this->set('Servicerequeststatus', $Servicerequeststatus);
		} else {
			$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
	}

	public function saveOrder($id = NULL) {

		if (!empty($this->request->data['Estate']['id']))
			$this->request->data['House']['estate_id'] = $this->request->data['Estate']['id'];
		if (!empty($this->request->data['Estate']['spoc_name']))
			$this->request->data['House']['spoc_name'] = $this->request->data['Estate']['spoc_name'];
		if (!empty($this->request->data['Estate']['estate_name']))
			$this->request->data['House']['estate_name'] = $this->request->data['Estate']['estate_name'];
		if (!empty($this->request->data['Estate']['spoc_Address']))
			$this->request->data['House']['spoc_Address'] = $this->request->data['Estate']['spoc_Address'];
		if (!empty($this->request->data['Estate']['work_tel_number']))
			$this->request->data['House']['work_tel_number'] = $this->request->data['Estate']['work_tel_number'];
		if (!empty($this->request->data['Estate']['email_address']))
			$this->request->data['House']['email_address'] = $this->request->data['Estate']['email_address'];
		if (!empty($this->request->data['Estate']['service_account_name']))
			$this->request->data['House']['service_account_name'] = $this->request->data['Estate']['service_account_name'];
		if (!empty($this->request->data['Estate']['spoc_name']))
			$this->request->data['House']['solution_IDNumber'] = $this->request->data['Estate']['spoc_name'];
		if (!empty($this->request->data['Estate']['oder_number']))
			$this->request->data['House']['oder_number'] = $this->request->data['Estate']['oder_number'];
		if (!empty($this->request->data['Estate']['contact_number']))
			$this->request->data['House']['contact_number'] = $this->request->data['Estate']['contact_number'];
		if (!empty($this->request->data['Estate']['second_appointment_date']))
			$this->request->data['House']['second_appointment_date'] = $this->request->data['Estate']['second_appointment_date'];
		if (!empty($this->request->data['Estate']['comments']))
			$this->request->data['House']['comments'] = $this->request->data['Estate']['comments'];
		if (!empty($this->request->data['Estate']['intellview_status']))
			$this->request->data['House']['intellview_status'] = $this->request->data['Estate']['intellview_status'];
		if (!empty($this->request->data['Estate']['service_request']))
			$this->request->data['House']['service_request'] = $this->request->data['Estate']['service_request'];
		if (!empty($this->request->data['Estate']['order_number']))
			$this->request->data['House']['order_number'] = $this->request->data['Estate']['order_number'];

		if (!empty($this->request->data['Estate']['ont_s_/_n']))
			$this->request->data['House']['ont_s_/_n'] = $this->request->data['Estate']['ont_s_/_n'];
		elseif (!empty($this->request->data['House']['ont_s_/_n']))
			$this->request->data['House']['ont_s_/_n'] = $this->request->data['Estate']['ont_s_/_n'];
		if (!empty($this->request->data['Estate']['ont_mac']))
			$this->request->data['House']['ont_mac'] = $this->request->data['Estate']['ont_mac'];
		elseif (!empty($this->request->data['House']['ont_mac']))
			$this->request->data['House']['ont_mac'] = $this->request->data['Estate']['ont_mac'];
		if (!empty($this->request->data['Estate']['router_s_/_n']))
			$this->request->data['House']['router_s_/_n'] = $this->request->data['Estate']['router_s_/_n'];
		elseif (!empty($this->request->data['House']['router_s_/_n']))
			$this->request->data['House']['router_s_/_n'] = $this->request->data['Estate']['router_s_/_n'];
		if (!empty($this->request->data['Estate']['cac_rec']))
			$this->request->data['House']['cac_rec'] = $this->request->data['Estate']['cac_rec'];
		elseif (!empty($this->request->data['House']['cac_rec']))
			$this->request->data['House']['cac_rec'] = $this->request->data['Estate']['cac_rec'];

		if (!empty($this->request->data['House']['estate_id'])) {
			if ($this->House->saveAll($this->request->data)) {
				$this->Session->setFlash(_("Estate added successful"));
				$this->redirect(array('controller' => 'Houses', 'action' => 'index'));
			} else {

				$this->Session->setFlash(__('Didn\'t registered succesful. Please, try again.', null), 'default', array('class' => 'error-message'));
			}
		}
	}

	public function addOder($id = NULL) {
		if ($this->Auth->login()) {
			if (empty($this->data)) {

				$this->loadModel('Estate');
				$this->data = $this->Estate->findById($id);
			} else {
				$this->House->save($this->data);
				$this->Session->setFlash("Estate edit successful");
				$this->redirect(array('action' => 'index', 'controller' => 'Houses'));
			}
			$this->loadModel('Estate');
			$listEstate = $this->Estate->find('list', array('fields' => array('id', 'estate_name')));
			$this->set('listEstate', $listEstate);

			$this->loadModel('Region');
			$listRegion = $this->Region->find('list', array('fields' => array('id', 'region_name')));
			$this->set('listRegion', $listRegion);

			$this->loadModel('Servicerequeststatus');
			$Servicerequeststatus = $this->Servicerequeststatus->find('list', array('fields' => array('servicerequeststatus_name', 'servicerequeststatus_name')));
			$this->set('Servicerequeststatus', $Servicerequeststatus);
		} else {
			$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
	}

	public function logout() {
		//return $this->redirect($this->Auth->logout());
		return $this->redirect($this->Auth->logout($this->Auth->redirect(array('controller' => 'Posts', 'action' => 'visitors'))));
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$id = $this->Auth->user('id');
				return $this->redirect($this->Auth->redirect(array('controller' => 'houses', 'action' => 'index')));
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again.', null), 'default', array('class' => 'error-message'));
			}
		}
	}

	public function home() {
		$this->loadModel('Menus');
		$listEstate = $this->Menus->find('all');
		$this->set('listEstate', $listEstate);
	}

	public function reporting() {
		$date = date("Y-m-d H:i:s");
		$createDate = new DateTime($date);

		$strip = $createDate->format('Y-m-d');

		$siteSurvey14 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'Site Survey',
				'House.estate_id' => 14
			)
		));

		$siteSurvey15 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'Site Survey',
				'House.estate_id' => 15
			)
		));


		$siteSurvey16 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'Site Survey',
				'House.estate_id' => 16
			)
		));


		$siteSurvey17 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'Site Survey',
				'House.estate_id' => 17
			)
		));


		$activation14 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'activation',
				'House.estate_id' => 14
			)
		));

		$activation15 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'activation',
				'House.estate_id' => 15
			)
		));


		$activation16 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'activation',
				'House.estate_id' => 16
			)
		));


		$activation17 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'activation',
				'House.estate_id' => 17
			)
		));

		$installation14 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'installation',
				'House.estate_id' => 14
			)
		));

		$installation15 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'installation',
				'House.estate_id' => 15
			)
		));


		$installation16 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'installation',
				'House.estate_id' => 16
			)
		));


		$installation17 = $this->House->find('all', array(
			'conditions' => array(
				'House.service_request' => 'installation',
				'House.estate_id' => 17
			)
		));


		$siteSurvey14 = sizeof($siteSurvey14);
		$this->set("siteSurvey14", $siteSurvey14);

		$siteSurvey15 = sizeof($siteSurvey15);
		$this->set("siteSurvey15", $siteSurvey15);

		$siteSurvey16 = sizeof($siteSurvey16);
		$this->set("siteSurvey16", $siteSurvey16);

		$siteSurvey17 = sizeof($siteSurvey17);
		$this->set("siteSurvey17", $siteSurvey17);

		$activation14 = sizeof($activation14);
		$this->set("activation14", $activation14);

		$activation15 = sizeof($activation15);
		$this->set("activation15", $activation15);

		$activation16 = sizeof($activation16);
		$this->set("activation16", $activation16);

		$activation17 = sizeof($activation17);
		$this->set("activation17", $activation17);

		$installation14 = sizeof($installation14);
		$this->set("installation14", $installation14);

		$installation15 = sizeof($installation15);
		$this->set("installation15", $installation15);

		$installation16 = sizeof($installation16);
		$this->set("installation16", $installation16);

		$installation17 = sizeof($installation17);
		$this->set("installation17", $installation17);
	}

}
