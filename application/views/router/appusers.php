<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					App User
												
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-checkbox="false" ></th>
						        <th  data-sortable="true" >First Name</th>
						        <th  data-sortable="true">Last Name</th>
						        <th  data-sortable="true">Email</th>
						        <th  data-sortable="true">Gender</th>
						        <th  data-sortable="true">Sim Id</th>
						        <th  data-sortable="true">Device Id</th>
						        <th  data-sortable="true">Active/Not Active</th>
						    </tr>
						    </thead>
						    <tbody>
						
							<?php
							foreach ($data as $value ) { ?>


							 <tr>
								
						    	<td><?php echo $value->id ?></td>
						    	<td><?php echo $value->first_name ?></td>
						    	<td><?php echo $value->last_name ?></td>
						    	<td><?php echo $value->email ?></td>
						    	<td><?php echo $value->gender ?></td>
						    	<td><?php echo $value->sim_id ?></td>
						    	<td><?php echo $value->device_id ?></td>
  <td>
						  

			<?php  $check = $value->deleted_at; ?>

<input type="checkbox" name="check" <?php echo  ($check == NULL ? 'checked' :'') ?> value="<?php echo $value->id ?>" onclick="active_app_user(<?php echo $value->id ?>);" >
								</td>
						    	</tr>
 <?php } ?>




						    </tbody>
						</table>
					</div>
				</div>
			</div>