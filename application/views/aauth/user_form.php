<h3><?php echo isset($edit) ? 'Update' : 'Add';?> User</h3>
<?php echo form_open_multipart($action); ?>
<?php echo $error; ?>

		<div>
			<div>
				<div>
								<!--a href="<?php echo site_url(PATH.'aauthuser/data') ?>">

									<i aria-hidden="true"></i> Data User

								</a-->
							</div>
						</div>   

						<div>
							<div>
								<div>
									<b><label><i aria-hidden="true"></i> Email</label></b>
									
									<?php if(get_instance()->router->fetch_class() != "admprofile"): ?>
										<input type="email" placeholder="" 
										name="email" value="<?php echo (isset($edit))?'':set_value('email')?>"/>
									<?php endif; ?>
									<?php echo isset($edit) ? '<span><label>email saved</label> '.$edit->email.'</span>': '' ?>
									<?php echo form_error('email', '<span>', '</span>'); ?>


								</div>

								<div>
									<b><label><i aria-hidden="true"></i> Password</label></b>
									
									<input type="password" name="password" />
									<?php echo form_error('password', '<span>', '</span>'); ?>
								</div>

								<div>
									<b> <label><i aria-hidden="true"></i > Password Repeat</label></b>
									<input type="password" name="password_repeat" />
									<?php echo form_error('password_repeat', '<span>', '</span>'); ?>
								</div>
							</div>

							<div>
								
								<div>
									<b><label><i aria-hidden="true"></i> Name</label></b>
									<input type="text" placeholder="" required 
									name="name" value="<?php echo (isset($edit))?$edit->name:set_value('name')?>"/>
									<?php echo form_error('name', '<span>', '</span>'); ?>
								</div>
								<div>
									<b><label><i aria-hidden="true"></i> Phone</label></b>
									<input type="text" placeholder="" 
									name="phone" value="<?php echo (isset($edit))?$this->aauth->get_user_var('phone',$edit->id):set_value('phone')?>"/>
									<?php echo form_error('phone', '<span>', '</span>'); ?>
								</div>
								<?php if(isset($groups)): ?>
									<div >
										<b> <label> <i aria-hidden="true"></i> Group</label></b>
										<div>
											<?php
											foreach ($groups as $key => $value): 
												if($groups[$key]->id == 1){ if (!acl_admin()) { continue; } }
											$checked = (isset($edit) ? ($group_saved == $groups[$key]->name ? 'checked' : '') : set_radio('group', $groups[$key]->name));
											echo "<div class='radio'>";
											echo "<label><input type='radio' name='group' style='margin-left:-5px;' value='" . $groups[$key]->name . "' " . $checked . " style='display:none'> " . $groups[$key]->name . '</label>';
											echo "</div>";
											endforeach;
											?>
											<?php echo form_error('group', '<span>', '</span>'); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
							

						</div>

						<div>

							
							<div>
								<button type="submit">
									<?php echo isset($edit)?'Update':'Save' ?>
								</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>




			