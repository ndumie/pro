<h1>Add Report</h1>
<?php
echo $this->Form->create('Sow',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('title');
echo $this->Form->input('description');
echo $this->Form->input('report', array('type' => 'file'));
echo $this->Form->end('Save Report');
?>