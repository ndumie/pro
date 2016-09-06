<div class="houses view">

	<table>
    <tr><th>Region</th>
    	<th>Estate</th>
    	<th>Survey</th>
    	<th>Installations</th>
    	<th>Activations</th>
    	
    </tr>

    <tr><td><?php echo 'Gauteng'?></td>
    	<td><?php echo 'Meyersdal Eco Estate'?></td>
    	<td><?php echo $siteSurvey14?></td>
    	<td><?php echo $installation14?></td>
    	<td><?php echo $activation14?></td>
    	
    </tr>

    <tr><td><?php echo 'Kwa-Zulu Natal'?></td>
        <td><?php echo 'Clifton Hills Estate'?></td>
        <td><?php echo $siteSurvey15?></td>
        <td><?php echo $installation15?></td>
        <td><?php echo $activation15?></td>
        
    </tr>

    <tr><td><?php echo 'Western Cape'?></td>
        <td><?php echo 'Dennegeur'?></td>
        <td><?php echo $siteSurvey16?></td>
        <td><?php echo $installation16?></td>
        <td><?php echo $activation16?></td>
      
    </tr>
    
     <tr><td>Western Cape</td>
        <td>De Wijnlanden</td>
        <td><?php echo $siteSurvey17?></td>
        <td><?php echo $installation17?></td>
        <td><?php echo $activation17?></td>
       
    </tr>
   
</table>
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
