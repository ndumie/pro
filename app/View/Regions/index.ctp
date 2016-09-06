<div class="Estates view">

	<table>
    <tr><th>Provinces</th>
    	
    </tr>

    <?php foreach ($regions as $region): ?>

    <tr><td><?php echo h($region['Region']['region_name']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Estate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Other Houses'), array('action' => 'listHouses')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $region['Region']['id']), array(), __('Are you sure you want to delete # %s?', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'Houses', 'action' => 'logout')); ?></li>
	</ul>
</div>
