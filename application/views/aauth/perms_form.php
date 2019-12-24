<h3><?php echo isset($edit) ? 'Update' : 'Add';?> Permission</h3>
<?php echo form_open_multipart($action); ?>
<?php echo $error; ?>
<div>
	<input type="text" placeholder="Permission Name" name="name" value="<?php echo set_value('name', $edit['name']);?>" />
	<?php echo form_error('name', '<span>', '</span>'); ?>
</div>
<div>
	<textarea placeholder="Permission Definition" name="definition" rows="5"><?php echo set_value('definition', $edit['definition'])?></textarea>
</div>
<div>
	<button type="submit"><?php echo isset($edit) ? 'Update' : 'Save';?></button>
</div>
<?php echo form_close(); ?>