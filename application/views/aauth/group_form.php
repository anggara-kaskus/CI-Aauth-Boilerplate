<h3><?php echo isset($edit) ? 'Update' : 'Add';?> Group</h3>

<?php echo form_open_multipart($action);?>
<?php echo $error;?>

<div>
	<input type="text" placeholder="Group Name" name="name" value="<?php echo set_value('name', $edit['name']);?>" />
	<?php echo form_error('name', '<span>', '</span>'); ?>
</div>
<div>
	<textarea placeholder="Group Definition" name="definition" rows="5"><?php echo set_value('definition', $edit['definition'])?></textarea>
</div>
<div>
	<b><label>Permision</label></b>
</div>

<?php foreach ($perms as $k => $v) :?>
	<div> 
		<label>
			<?php echo form_checkbox('perms[]', $perms[$k]->name, in_array($perms[$k]->id, $perms_edit));?>
			<?php echo ucwords(str_replace('_', ' ', $perms[$k]->name));?>
		</label>
		 <?php echo form_error('perms', '<span>', '</span>'); ?>
	</div>
<?php endforeach;?>

<div>
	<button type="submit"><?php echo isset($edit) ? 'Update' : 'Save';?></button>
</div>

<?php echo form_close(); ?>
