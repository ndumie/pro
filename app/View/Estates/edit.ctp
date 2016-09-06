<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="users form">
<?php echo $this->Form->create('Estate'); ?>
    <fieldset>
        <legend><?php echo __('Update Estate'); ?></legend>
    <?php
        echo $this->Form->input('spoc_name');
        echo $this->Form->input('spoc_Address');
        echo $this->Form->input('estate_name');
        echo $this->Form->input('region_id', array('type' =>'select', 'options'=>$listRegion ));
        echo $this->Form->input('cell_number');
        echo $this->Form->input('work_tel_number');
        echo $this->Form->input('email_address');
         echo $this->Form->input('id');
        echo $this->Form->input('created_at');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Home'), array('action' => 'home')); ?> </li>
        <li><?php echo $this->Html->link(__('Estate'),  array('action' => 'index','controller' => 'Estates')); ?> </li>
        <li><?php echo $this->Html->link(__('Orders'), array('action' => 'index','controller' => 'houses')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
    </ul>
</div>