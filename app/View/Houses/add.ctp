<div class="users form">
<?php echo $this->Form->create('House', array('type' => 'get')); ?>
    <fieldset>
        <legend><?php echo __('Add Estate'); ?></legend>
    <?php
        echo $this->Form->input('estate_id', array('type' =>'select', 'options'=>$listEstate,'onChange'=>'javascript:this.form.submit()' ));
    ?>
    </fieldset>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Home'), array('action' => 'home')); ?> </li>
        <li><?php echo $this->Html->link(__('Estate'), array('action' => 'index','controller' => 'houses')); ?> </li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index','controller' => 'houses')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
    </ul>
</div>