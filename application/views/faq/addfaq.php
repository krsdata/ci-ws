<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Add FAQ</div>
					<div class="panel-body">
						<form  class="form-horizontal">
							<fieldset>

								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Question</label>
									<div class="col-md-4">
									<input type="text" class="form-control" placeholder="Your Question" name="question" id="question" >
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
									</div>
								</div>
							
								<!-- ssid input-->
								<div class="form-group">
									<label  class="col-md-3 control-label">Answer</label>
									<div class="col-md-4 inline">
										<input type="text" class="form-control" placeholder="Your Answer" name="answer" id="answer" >
									</div>
									<div>
									<label style="color:red;font-size:20px;"><b>*<b></label>
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
										<a class="btn btn-primary btn-md" onclick="addfaq();" >Submit</a>
										<a class="btn btn-default btn-md" onclick="window.location.reload();" >Cancel</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
				
			</div>
			