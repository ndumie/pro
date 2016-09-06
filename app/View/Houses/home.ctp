<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="houses view">
    
	<span class="home-background"><div id="header">
   <a class="fa fa-home fa-lg"><?php echo $this->Html->link(__('Home'), array('action' => 'home')); ?></a>
   <a class="fa fa-map "><?php echo $this->Html->link(__('Estate'), array('action' => 'index','controller'=>'Estates')); ?></a>
   <a class="fa fa-shopping-cart fa-lg"><?php echo $this->Html->link(__('Orders'), array('action' => 'index')); ?></a>
    </div></span>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Home'), array('action' => 'home'),array('class' => 'fa fa-home fa-lg')); ?> </li>
		<li><?php echo $this->Html->link(__('Estate'), array('action' => 'index','controller'=>'Estates'),array('class' => 'fa fa-map fa-lg')); ?> </li>
		<li><?php echo $this->Html->link(__('Orders'), array('action' => 'index'),array('class' => 'fa fa-shopping-cart fa-lg')); ?> </li>
        <li><?php echo $this->Html->link(__('Admin'), array('action' => 'listhouses'),array('class' => 'fa fa-user fa-lg')); ?> </li>
        <li><?php echo $this->Html->link(__('Reporting'), array('action' => 'listhouses'),array('class' => 'fa fa-bar-chart fa-lg')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'houses', 'action' => 'logout'),array('class' => 'fa fa-sign-out fa-lg')); ?></li>
	</ul>
</div>
<style type="text/css">
a{

	text-decoration: none;
}

</style>

