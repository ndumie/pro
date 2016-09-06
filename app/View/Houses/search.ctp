    <div class="container">
    <a href='#'><div class="search-tab active_search_tab">Property Search</div></a>

    <div class="col-md-12 purple search_box">
    <?php
    echo $this->Form->create('House', array('type' => 'get'));
    echo $this->Form->input('estate_name');
    echo $this->Form->button('Search', array('class'=>'btn btn-success'));
    echo $this->Form->end();
    ?>
    </div>
    </div>

<div class="houses view">

	<table>
    <tr><th>Estate name</th>
    	<th>Surbub name</th>
    	<th>Service Request</th>
    	<th>Service account name</th>
    	<th>Solution Id</th>
    	<th><td><?php echo $this->Html->link(__('Add Client'), array('action' => 'add','controller'=>'houses'),array('class' => 'btn btn-success')); ?> </td></th>
    </tr>


   
    
    <?php foreach ($listSearch as $house): ?>

    <tr><td><?php echo h($house['House']['estate_name']); ?></td>
    	<td><?php echo h($house['House']['surbub_name']); ?></td>
    	<td><?php echo h($house['House']['service_request']); ?></td>
    	<td><?php echo h($house['House']['service_account_name']); ?></td>
    	<td><?php echo h($house['House']['solution_IDNumber']); ?></td>
    	<td><?php echo h($house['House']['oder_number']); ?></td>
        <td><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => '<li><?php echo $this->Html->link(__('Estate'), array('controller' => 'Estates','action' => 'add')); ?> </li>')). " Delete",
        array('action' => 'delete', $house['House']['id']),
        array('escape'=>false),
    __('Are you sure you want to delete # %s?', $house['House']['id']),
   array('class' => 'btn btn-mini')
);?></td>
 <td><?php echo $this->Html->link(__('Update'), array('action' => 'edit',$house['House']['id'])); ?></td>
    </tr>
    <?php endforeach; ?>

</table>
</div>