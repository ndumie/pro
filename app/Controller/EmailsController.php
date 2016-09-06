<?php

class EmailsController extends AppController{

  

public function email() 
{
  //add this
  if ($this->request->is('post')) {
  $post_array = $this->request->data;

  $email    = new CakeEmail();
  $email->viewVars(array('message' => $post_array['Email']['message'] ));
  $email->template('contactForm');
  $email->emailFormat('html');
  $email->config(array('from' => 'test@test.com' ,'to' => $post_array['Email']['email']));
  $email->subject ($post_array['Email']['subject']);
  $email->send();

 }
}

}
