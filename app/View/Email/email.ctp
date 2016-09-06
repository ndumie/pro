<?php $this->Html->addCrumb('New Email', '#'); ?>

<div id="email_page" class="span12">
    <div class="row">

    <?php 
        echo $this->Form->create('Email', array('controller'=>'person', 'action'=>'email_send'));
        echo $this->Form->input('email', array('class'=>'email_form','label'=>'To: ','value'=>$email['Person']['primEmail']));
        echo $this->Form->input('subject', array('class'=>'email_form','label'=>'Subject: '));
        echo $this->Form->input('message', array('class'=>'email_form email_body', 'type'=>'textarea','label'=>'Message: '));
        echo $this->Form->end('Send', array('class'=>'pull-right')); 
    ?>

    </div>
</div>