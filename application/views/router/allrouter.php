<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					Routers
						
						<a class="btn btn-primary" href="addrouter" style="float:right">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  						Add Router
						</a>
						
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-checkbox="false" ></th>
						        <th  data-sortable="true" >Name</th>
						        <th  data-sortable="true">Service Set Identifier (SSID)</th>
						        <th  data-sortable="true">BSSID</th>
						        <th  data-sortable="true">Password</th>
						        <th  data-sortable="true">latitude</th>
						        <th  data-sortable="true">longitude</th>
						        <th data-sortable="true" >Address</th>
						    </tr>
						    </thead>
						    <tbody>
						   <?php foreach ($data['results'] as $value) { ?>
								<tr>
								<td>
								<a class="btn btn-success"  href="editrouter?id=<?php echo base64_encode($value->id) ?>">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

								</a>
								<a class="btn btn-primary"  href="editrouterimage?id=<?php echo base64_encode($value->id) ?>">
									<span class="glyphicon glyphicon-upload" aria-hidden="true"></span>

								</a>
								</td>
						    	<td><?php echo $value->sname ?></td>
						    	<td><?php echo $value->ssid ?></td>
						    	<td><?php echo $value->bssid ?></td>
						    	<td><?php echo $value->pwd ?></td>
						    	<td><?php echo $value->lat ?></td>
						    	<td><?php echo $value->long ?></td>
						    	<td><?php echo $value->wifi_address ?></td>
						    	</tr>
						    	
						    <?php } ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>