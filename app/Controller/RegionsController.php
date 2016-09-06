<?php

class RegionsController  extends AppController{

  public function index(){

    $this->set('regions',$this->Region->find("all"));

  }

}