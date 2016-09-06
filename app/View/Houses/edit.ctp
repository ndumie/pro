<div class="users form">
    <fieldset>
        <legend><?php echo __('Update Order'); ?></legend>
		<?php if(count($sowdocuments)>0){ foreach ($sowdocuments as $sowdocument): ?>
		<p><?php if(isset($sowdocument['sows']['id'])){echo $this->Html->link('View SOW',array('controller' => 'sows','action' => 'view',$sowdocument['sows']['id'],false));}?></p>
		<?php
        endforeach;
		}else{
			foreach ($houses as $house):
				echo $this->Html->link(__('Add SOW'), array('controller'=>'sows','action' => 'add',$house['House']['id']));
			endforeach;
		}
	    ?>

<?php  $intellview_status = array('Scheduled'=>'Scheduled' ,'Completed'=>'Completed' );
        echo $this->Form->create('House', array('url'=>array('controller'=>'Houses', 'action'=>'edit')));
        echo $this->Form->input('spoc_name');
        echo $this->Form->input('estate_name');
        echo $this->Form->input('spoc_Address');
        echo $this->Form->input('cell_number');
        echo $this->Form->input('work_tel_number');
        echo $this->Form->input('email_address');
        echo $this->Form->input('service_request',array('type' =>'select', 'options'=>$Servicerequeststatus ));
        echo $this->Form->input('comments',array('type' =>'textarea'));
        echo $this->Form->input('intellview_status',array('type' =>'select', 'options'=>$intellview_status));
        echo $this->Form->input('id');
        echo $this->Form->end('Save Order');
?>

    </fieldset>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Home'), array('action' => 'home')); ?> </li>
        <li><?php echo $this->Html->link(__('Estate'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
    </ul>
</div>