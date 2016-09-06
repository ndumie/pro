<div class="users form">
    <fieldset>
        <legend><?php echo __('Add Order'); ?></legend>
<?php
        echo $value;
    
?>

    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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