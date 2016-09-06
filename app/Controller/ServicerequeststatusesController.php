<?php

class RegionsController  extends AppController{

  public function index(){

    $this->set('servicerequeststatuses',$this->Region->find("all"));

  }

}