<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Edit Router</div>
					<div class="panel-body">
						<form  class="form-horizontal">
							<fieldset>

								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Name</label>
									<div class="col-md-4">
									<input type="text" class="form-control" placeholder="Your name" name="sname" id="sname" value = "<?php echo $data->sname ?>">
									</div>
								</div>
							
								<!-- ssid input-->
								<div class="form-group">
									<label  class="col-md-3 control-label">Service Set Identifier (SSID)</label>
									<div class="col-md-4 inline">
										<input type="text" class="form-control" placeholder="Your SSID" name="ssid" id="ssid" value = "<?php echo $data->ssid ?>" >
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>
								</div>

								<div class="form-group">
									<label  class="col-md-3 control-label">Basic Service Set Identifier</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Your BSSID" name="bssid" id="bssid" value = "<?php echo $data->bssid ?>">
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>

								</div>

								<div class="form-group">
									<label  class="col-md-3 control-label">Password</label>
									<div class="col-md-4">
										<input type="password" class="form-control" placeholder="Your Password"  id="pwd" value = "<?php echo base64_decode($data->pwd) ?>">
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>

								</div>

								<div class="form-group">
									<label  class="col-md-3 control-label">latitude</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Your latitude" name="lat" id="lat" value = "<?php echo $data->lat ?>">
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>

								</div>

								<div class="form-group">
									<label  class="col-md-3 control-label">longitude</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Your longitude" name="long" id="long" value = "<?php echo $data->long ?>">
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>

								</div>

								<div class="form-group">
									<label  class="col-md-3 control-label">Address</label>
									<div class="col-md-4 inline">
										<input type="text" class="form-control" placeholder="Your Wifi Address" name="wifi_address" id="wifi_address" value = "<?php echo $data->wifi_address ?>" >
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>
								</div>
								



								<div class="form-group">
									<label  class="col-md-3 control-label">Owner ID</label>
									<div class="col-md-4">
										<input type="text" class="form-control" placeholder="Your Owner ID" name="ownerid" id="ownerid" value = "<?php echo $data->ownerid ?>">
									</div>
								</div>
								
								<div class="form-group">
   									<label class="col-xs-3 control-label">Is Active</label>
   									<div class="col-xs-9">
    									<div class="radio inline">
     									<label>
      									<input id="is_active" name="is_active" value="1" type="radio" <?php if($data->is_active=='1') { echo "checked='checked'"; } ?> >
      									True</label>
      									<label>
      									<input id="inlineradio2" name="is_active" value="0" type="radio" <?php if($data->is_active=='0') { echo "checked='checked'"; } ?> >
      									 False</label>
    									</div>
   									</div>
  								</div>

  								<div class="form-group">
  								   <label class="col-xs-2"></label>
									<div  class="col-md-5 ">
										<div id ="alertmsg" style = "padding:5px;border-radius: 15px;display:none;" class="alert alert-danger" role="alert">
								
											Error Message
										</div>
									</div>
								</div>


													
								<!-- Form actions -->
								<div class="form-group">
									<div align="center" class="col-md-8 ">
										<a class="btn btn-primary btn-md" onclick="editrouter('<?php echo base64_encode($data->id) ?>');" >Submit</a>
										<a class="btn btn-default btn-md" onclick="window.location.reload();" >Cancel</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
				
			</div>
			