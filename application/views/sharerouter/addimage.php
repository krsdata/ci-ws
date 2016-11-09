<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Add Image</div>
					<div class="panel-body">
						<form action="router/addimage" method="post" enctype="multipart/form-data"  class="form-horizontal" onsubmit ="return validate();" >
							<fieldset>

								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Select Image Name :</label>
									<div class="col-md-4">
									 <div class="col-md-8">
									 	<input type="file" style="margin-top:4px;" name="fileToUpload" id="fileToUpload" accept="image/*" />
									 </div>
									 <div class="col-md-2" >
									 	<input class = "btn btn-success" type="submit" value="Upload Image" name="submit">
										
									 </div>
									 <br>
									
									</div>
									<input id = "imgid" name = "imgid" type="hidden" value= "<?php echo $this->input->get()['id']; ?>"/>
									 <label id ="lblerror" class="col-md-3 control-label" style="color:red;display:none;"><em>*<em>Please Choose Image First</label>
								</div>
				 								
							</fieldset>
						</form>
					</div>
				</div>
				
				
			</div>
		<script type="text/javascript">
		 function validate() 
		 {
		 
		   if(!$('#fileToUpload').val())
		   {
		   	$('#lblerror').show();
		   	return false;
		   }
		 	
		 
		 } 

		</script>	