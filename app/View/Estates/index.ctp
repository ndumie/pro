<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="houses view">

	<table>
    <tr><th>Estate name</th>
    	<th>Customer name(Spoc)</th>
    	<th>Contact number</th>
    	<th>Email address</th>
    	<th>Customer Address</th>
    	<th><td><?php echo $this->Html->link(__('Add Estate'), array('action' => 'add','controller'=>'Estates'),array('class' => 'btn btn-success')); ?> </td></th>
    </tr>

    <?php foreach ($estates as $house): ?>

    <tr><td><?php echo h($house['Estate']['estate_name']); ?></td>
    	<td><?php echo h($house['Estate']['spoc_name']); ?></td>
    	<td><?php echo h($house['Estate']['cell_number']); ?></td>
    	<td><?php echo h($house['Estate']['email_address']); ?></td>
        <td><?php echo h($house['Estate']['spoc_Address']); ?></td>
        <td><?php echo $this->Html->link(__('Update'), array('action' => 'edit',$house['Estate']['id'])); ?></td>
        <td><?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => '')). " Delete",
        array('action' => 'delete', $house['Estate']['id']),
        array('escape'=>false),
    __('Are you sure you want to delete # %s?', $house['Estate']['id']),
   array('class' => 'btn btn-mini')
);?></td>


    </tr>
    <?php endforeach; ?>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Home'), array('action' => 'home')); ?> </li>
		<li><?php echo $this->Html->link(__('Estate'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Orders'), array('action' => 'index','controller' => 'houses')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'reporting')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout')); ?></li>
	</ul>
</div>
<style>
	.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
a{text-decoration: none;}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

a {
    color: #337ab7;
    text-decoration: none;
}
.glyphicon-remove:before {
    content: "\e014";
}
</style>