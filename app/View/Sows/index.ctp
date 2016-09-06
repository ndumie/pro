<div class="houses view">
	<h1>Reports</h1>
<table>
    <tr>
     
     
        <th>Description</th>
        <th>Document Name</th>
        <th>Date added</th>
		<th colspan="2">Actions</th>
    </tr>
    <?php foreach ($Reports as $Report): ?>
    <tr>
        
        <td><?php echo $Report['Sow']['description']; ?></td>
        <td><?php echo $Report['Sow']['report']; ?></td>
        <td><?php echo $Report['Sow']['created']; ?></td>
		<td><?php echo $this->Html->link('View Details', array('controller' => 'sows', 'action' => 'view', $Report['Sow']['id']));?></td>
        <td><?php echo $this->Html->link('Download', array('controller' => 'sows', 'action' => 'viewdown', $Report['Sow']['id'],true));?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
	<td><?php echo $this->Html->link('Back', array('controller' => 'houses', 'action' => 'edit', $Report['Sow']['order_id']));?></td>
</table>
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
