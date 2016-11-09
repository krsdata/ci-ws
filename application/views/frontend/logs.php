<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					Logs
						
					</div>
					<div class="panel-body">
						<table  data-toggle="table" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						      
						        <th  data-sortable="true">Device Id</th>
						        <th  data-sortable="true">Wifi Name</th>
						        <th  data-sortable="true">Created At</th>
						      
						    </tr>
						    </thead>
						    <tbody>
						   <?php foreach ($data['results'] as $value) { ?>
								<tr>
								
						    	<td><?php echo $value->device_id ?></td>
						    	<td><?php echo $value->sname ?></td>
						    	<td><?php echo $value->created_date ?></td>
						    	
						    	</tr>
						    	
						    <?php } ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>