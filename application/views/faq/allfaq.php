<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					FAQ
						
						<a class="btn btn-primary" href="addfaq" style="float:right">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  						Add FAQ
						</a>
						
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-checkbox="false" ></th>
						        <th  data-sortable="true" >Question</th>
						        <th  data-sortable="true">Answer</th>
						        <th  data-sortable="true">Created at</th>
						    </tr>
						    </thead>
						    <tbody>
						   <?php foreach ($data['results'] as $value) { ?>
								<tr>
								<td>
								<a class="label label-success" style="float:right" href="editfaq?id=<?php echo base64_encode($value->id) ?>">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

								</a>
								</td>
						    	<td><?php echo strlen($value->question) > 30 ? substr($value->question, 0, 30) . '..' : $value->question; ?></td>
						    	<td><?php echo strlen($value->answer) > 30 ? substr($value->answer, 0, 30) . '..' : $value->answer;  ?></td>
						    	<td><?php echo $value->created_at ?></td>
						    	
						    	</tr>
						    	
						    <?php } ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>