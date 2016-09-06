<div class="houses view">
<p><small>Description: <?php echo $Report['Sow']['description']; ?></small></p>
<p><small>Created: <?php echo $Report['Sow']['created']; ?></small></p>
<p><small>File Name:</small><?php echo h($Report['Sow']['report']); ?></p>
<p><?php echo $this->Html->link('View File',array('controller' => 'sows','action' => 'viewdown',$Report['Sow']['id'],false),array('target'=>'_blank'));?></p>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Home'), array('controller' => 'Estates','action' => 'home')); ?> </li>
		<li><?php echo $this->Html->link(__('Estate'), array('controller' => 'Estates','action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Orders'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
		<li><?php echo $this->Html->link('Export to excel', array('controller' => 'houses', 'action' => 'export','ext' => 'csv')); ?></li>
     <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
	</ul>
</div>