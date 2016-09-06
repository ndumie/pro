<div class="users form">
    <fieldset>
        <?php $intellview_status = array('scheduled' => 'scheduled','completed' => 'completed');?>
        <legend><?php echo __('Add Order'); ?></legend>
     <?php echo $this->Form->create('Estate', array('url'=>array('controller'=>'Houses', 'action'=>'saveOrder')));?>
     <td><?php echo $this->Form->input('id');?></td>
        <table>
      <tr> 
     <td><?php   echo $this->Form->input('estate_name', array('type' => 'text',
'readonly' => 'readonly'));?></td>
     <td><?php   echo $this->Form->input('spoc_name', array('type' => 'text',
'readonly' => 'readonly'));?></td>
     <td><?php    echo $this->Form->input('cell_number', array('type' => 'text',
'readonly' => 'readonly'));?></td>
     <td><?php   echo $this->Form->input('email_address', array('type' => 'text',
'readonly' => 'readonly'));?></td>

     </tr> 


    <tr><td><?php   echo $this->Form->input('service_request',array('type' =>'select', 'options'=>$Servicerequeststatus ));?></td>
        <td><?php echo $this->Form->input('service_account_name');?></td> 
        <td><?php echo $this->Form->input('contact_details');?></td><td><?php echo $this->Form->input('service_address',array('type'=>'textarea'));?></td></tr>

    <tr><td><?php echo $this->Form->input('solution_IDNumber');?></td><td><?php echo $this->Form->input('order_number');?></td><td><?php echo $this->Form->input('first_appointment_date');?></td>
    <td><?php echo $this->Form->input('second_appointment_date');?></td>
   </tr>   
    
    <tr>
    <td><?php echo $this->Form->input('ont_s_/_n');?></td>
    <td><?php echo $this->Form->input('ont_mac');?></td>    
    <td><?php echo $this->Form->input('router_s_/_n');?></td>
    <td><?php echo $this->Form->input('cac_rec');?></td>
    </tr>
     <tr><td><?php echo $this->Form->input('speed_test');?></td><td><?php echo $this->Form->input('intellview_status', array('type' => 'select','options'=>$intellview_status ));?></td></tr>
     </table>
     <td><?php   echo $this->Form->input('comments',array('type' =>'textarea'));?></td>
     <td><?php   echo $this->Form->end('Save Order');?></td>
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