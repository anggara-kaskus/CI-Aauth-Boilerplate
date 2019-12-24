<h3>List User</h3>
<a href="<?php echo site_url('/aauthuser/add'); ?>">Add User</a>

<table>
	<thead align="center">
		<tr>
			<th>Email</th>
			<th>Name</th>
			<th>Last Login</th>
			<th>Group</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody align="center">
		<?php
		foreach ($data as $key => $value) {
			$group = $this->aauth->get_user_groups($data[$key]->id);
			if (1 == $group[0]->id && !acl_admin()) {
				continue;
			} ?>
			<tr>
				<td>
					<?php echo $data[$key]->email; ?>
				</td>
				<td>
					<?php echo $data[$key]->name; ?>
				</td>

				<td align="center">
					last login: <?php echo $data[$key]->last_login; ?><br />
					last activity: <?php echo $data[$key]->last_activity; ?>
				</td>
				<td>
					<label>
						<?php foreach ($group as $k2 => $v2) {
				echo '<i></i> ' . $group[$k2]->name;
			} ?>
					</label>
				</td>
				<td>   
					<a href="<?php echo site_url('/aauthuser/banned/' . $data[$key]->id . '/' . $data[$key]->banned); ?>">
						<?php echo 0 == $data[$key]->banned ? 'Ban' : 'Unban'; ?>
					</a>
				</td>
				<td>
					<a href="<?php echo site_url('/aauthuser/edit/' . $data[$key]->id); ?>">Edit</a> 
					<a href="<?php echo site_url('/aauthuser/delete/' . $data[$key]->id); ?>" onclick="return confirm('Sure?');">Delete</a>
				</td>

			</tr>
		<?php
		} ?>
	</tbody>
</table>
