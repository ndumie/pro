<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add Estate'); ?></legend>
	<?php
		echo $this->Form->input('Street Number');
		echo $this->Form->input('Street Name');
		echo $this->Form->input('Estate Name');
		echo $this->Form->input('Surbub Name');
		echo $this->Form->input('Service Request');
		echo $this->Form->input('Service Account name');
		echo $this->Form->input('Solution ID');
		echo $this->Form->input('Order Number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><li><?php echo $this->Html->link(__('Home'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Estates'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Other users'), array('action' => 'listUsers')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Users', 'action' => 'logout')); ?></li>
	</ul>
</div>
