<h3>Data Permission</h3>
<a href="<?php echo site_url('/aauthperms/add') ?>">Add Permission</a>

<table>
	<thead align="center">
		<tr>
			<th>Name</th>
			<th>Definition</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value): ?>
			<tr>
				<td><?php echo $data[$key]->name ?></td>
				<td><?php echo $data[$key]->definition ?></td>
				<td align="center">
					<a href="<?php echo site_url('/aauthperms/edit/' . $data[$key]->id);?>">Edit</a> 
				</td>
				<td align="center">
					<a onclick="return confirm('Sure?')" href="<?php echo site_url('/aauthperms/delete/' . $data[$key]->id);?>">Delete</a> 
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
