<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<br>
		<ul class="nav menu">
			<li><a href="dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<?php 
			 if ($this->session->userdata('app_id')=='0')
			 {
			 ?>
			<li><a href="router"><span class="glyphicon glyphicon-hand-right"></span> Routers</a></li>
			<li><a href="appusers"><span class="glyphicon glyphicon-hand-right"></span> App User</a></li>

			<li><a href="faq"><span class="glyphicon glyphicon-hand-right"></span>FAQ</a></li>
			<?php } ?>
			<li role="presentation" class="divider"></li>
		</ul>
		<!-- <div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a></div> -->
	</div><!--/.sidebar-->