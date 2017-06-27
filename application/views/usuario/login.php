<?php echo validation_errors(); ?>
<?php echo form_open('login/index'); ?>
<?php echo form_input('email'); ?>
<?php echo form_password('senha'); ?>
<?php echo form_submit('submit', 'Logar'); ?>
<?php echo form_close() ?>