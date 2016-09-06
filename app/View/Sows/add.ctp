<div class="houses view">
	<h1>Add SOW</h1>
<?php
echo $this->Form->create('Sow',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('description');
echo $this->Form->input('report', array('type' => 'file'));
echo $this->Form->input('order_id', array('type' => 'hidden'));
echo $this->Form->end('Save SOW');
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'Houses','action' => 'home')); ?> </li>
		<li><?php echo $this->Html->link(__('Estate'), array('controller' => 'Estates','action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Orders'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
		<li><?php echo $this->Html->link('Export to excel', array('controller' => 'houses', 'action' => 'export','ext' => 'csv')); ?></li>
     <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
	</ul>
</div>