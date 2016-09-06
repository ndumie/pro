<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
    <legend>
        <?php echo __('Please enter your username and password'); ?>
    </legend>
    <?php echo $this->Form->input('username');
    echo $this->Form->input('password');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Login')); ?> or, <?php echo $this->Html->link(__('Register'), array('action' => 'add')); ?>
</div>
//add style that will override cakephp css.
<style>
fieldset legend {
    color: #e32;
    font-size: 100%;
    font-weight: bold;
}

input, textarea {
    clear: both;
    font-size: 140%;
    font-family: "frutiger linotype", "lucida grande", "verdana", sans-serif;
    padding: 1%;
    width: 32%;
}
</style>
