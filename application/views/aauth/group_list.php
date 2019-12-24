<h3>Group</h3>
<a href="<?php echo site_url('/aauthgroup/add') ?>">Add Group</a>

<table>
	<thead align="center">
		<tr>
			<th>Name</th>
			<th>Definition</th>
			<th>Permissions</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody >
		<?php foreach ($data as $key => $value):?>
		<?php if($data[$key]->id == 1 && !acl_admin()) continue;?>
		 <tr>
		 	<td><?php echo $data[$key]->name ?></td>
		 	<td><?php echo $data[$key]->definition ?></td>
		 	<td>
		 		<?php
		 			$perms = $this->aauth->get_group_perms($data[$key]->id);
			 		foreach ($perms as $v) {
			 			echo '<label>'.$v->name.'</label> ';
			 		}
		 		?>
		 	</td>
		 	<td align="center">
		 		<a href="<?php echo site_url('/aauthgroup/edit/' . $data[$key]->id); ?>">Edit</a>
		 		<a href="<?php echo site_url('/aauthgroup/delete/' . $data[$key]->id); ?>" onclick="return confirm('Sure?')">
		 			Delete
		 		</a>
		 	</td>
		 </tr>
		<?php endforeach; ?>
	</tbody>
</table>
