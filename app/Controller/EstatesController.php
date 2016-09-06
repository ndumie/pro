<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');


/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class EstatesController extends AppController {

    public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }


 	public function index() {

		$this->set('estates', $this->Estate->find('all'));
		//$listEstates = $this->Estate->find('list',array('fields'=>array('id','estate_name')));
		//$this->set('listEstates',$listEstates);

	}
    
    public function add(){
     if ($this->Auth->login()) {
     if(!empty($this->request->data)){
     if($this->request->is('post')){
      if($this->Estate->save($this->request->data)){
       $this->Session->setFlash(_("Estate added successful"));
       $this->redirect(array('action' => 'index'));
      }

     }else{

     	$this->Session->setFlash(__('Didn\'t registered succesful. Please, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
     }
    }
        $this->loadModel('Estate');
        $listEstate = $this->Estate->find('list',array('fields' => array('id','estate_name')));
        $this->set('listEstate',$listEstate);

        $this->loadModel('Region');
        $listRegion = $this->Region->find('list',array('fields' => array('id','region_name')));
        $this->set('listRegion',$listRegion);
        
        $this->loadModel('Servicerequeststatus');
        $Servicerequeststatus = $this->Servicerequeststatus->find('list',array('fields' => array('servicerequeststatus_name','servicerequeststatus_name')));
        $this->set('Servicerequeststatus',$Servicerequeststatus);

   }else{

       $this->Session->setFlash(__('Invalid username or password, try again.', null), 
                    'default', 
                             array('class' => 'error-message'));
            return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
   }     

}

	public function delete($id = null) {
        if ($this->Auth->login()) {
		$this->Estate->delete($id);
		$this->redirect( array('action' => 'index'));
        }else{
          $this->Session->setFlash(__('Invalid username or password, try again.', null), 
                    'default', 
                             array('class' => 'error-message'));
            return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));

        }
	}

        public function edit($id = NULL){
         if ($this->Auth->login()) {   
        if(empty($this->data)){
            $this->data = $this->Estate->findById($id);
        }else{
            $this->Estate->save($this->data);
            $this->Session->setFlash("Estate edit successful");
            $this->redirect( array('action' => 'index','controller'=>'Estates' ));
        }
                        $this->loadModel('Estate');
        $listEstate = $this->Estate->find('list',array('fields' => array('id','estate_name')));
        $this->set('listEstate',$listEstate);

        $this->loadModel('Region');
        $listRegion = $this->Region->find('list',array('fields' => array('id','region_name')));
        $this->set('listRegion',$listRegion);
        
        $this->loadModel('Servicerequeststatus');
        $Servicerequeststatus = $this->Servicerequeststatus->find('list',array('fields' => array('servicerequeststatus_name','servicerequeststatus_name')));
        $this->set('Servicerequeststatus',$Servicerequeststatus);
        }else{
          $this->Session->setFlash(__('Invalid username or password, try again.', null), 
                    'default', 
                             array('class' => 'error-message'));
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
                $id=$this->Auth->user('id');
                return $this->redirect($this->Auth->redirect(array('controller' => 'houses', 'action' => 'index')));
            }
            else{
            $this->Session->setFlash(__('Invalid username or password, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
           }
        }
    }

      public function home() {

  }



        public function reporting() {
                         $date = date("Y-m-d H:i:s");
                         $createDate = new DateTime($date);

                         $strip = $createDate->format('Y-m-d');

                         $siteSurvey14 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'Site Survey',
                            'House.estate_id'=>14
                           
                        )
                    ));

                         $siteSurvey15 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'Site Survey',
                            'House.estate_id'=>15
                        )
                    ));


                     $siteSurvey16 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'Site Survey',
                            'House.estate_id'=>16
                        )
                    ));


                     $siteSurvey17 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'Site Survey',
                            'House.estate_id'=>17
                        )
                    ));


                      $activation14 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'activation',
                            'House.estate_id'=>14
                        )
                    ));

                         $activation15 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'activation',
                            'House.estate_id'=>15
                        )
                    ));


                     $activation16 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'activation',
                            'House.estate_id'=>16
                        )
                    ));


                     $activation17 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'activation',
                            'House.estate_id'=>17
                        )
                    ));
    
                     $installation14 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'installation',
                            'House.estate_id'=>14
                        )
                    ));

                         $installation15 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'installation',
                            'House.estate_id'=>15
                        )
                    ));


                     $installation16 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'installation',
                            'House.estate_id'=>16
                        )
                    ));


                     $installation17 = $this->House->find('all', array(
                        'conditions' => array(
                            'House.service_request' => 'installation',
                            'House.estate_id'=>17
                        )
                    ));

        
                $siteSurvey14 = sizeof($siteSurvey14);
                $this->set("siteSurvey14",$siteSurvey14 );

                $siteSurvey15 = sizeof($siteSurvey15);
                $this->set("siteSurvey15",$siteSurvey15 );

                 $siteSurvey16 = sizeof($siteSurvey16);
                $this->set("siteSurvey16",$siteSurvey16 );

                $siteSurvey17 = sizeof($siteSurvey17);
                $this->set("siteSurvey17",$siteSurvey17 );

                 $activation14 = sizeof($activation14);
                $this->set("activation14",$activation14 );

                $activation15 = sizeof($activation15);
                $this->set("activation15",$activation15 );

                 $activation16 = sizeof($activation16);
                $this->set("activation16",$activation16 );

                $activation17 = sizeof($activation17);
                $this->set("activation17",$activation17 );

                $installation14 = sizeof($installation14);
                $this->set("installation14",$installation14 );

                $installation15 = sizeof($installation15);
                $this->set("installation15",$installation15 );

                 $installation16 = sizeof($installation16);
                $this->set("installation16",$installation16 );

                $installation17 = sizeof($installation17);
                $this->set("installation17",$installation17 );
    }




		
  
}
