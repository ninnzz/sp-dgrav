<!DOCTYPE html>
<html>
<head>
<title>[Data :: APP] Configuration</title>
<style>
*	{
		margin:0;
		padding:0;
		color:#000;
	}
body{
		padding:10px;
}
.active-custom{
	background-color:#222;
}
#data-conf{
	display:block;
}
#app-settings{
	display:none;
}
</style>

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" style='color:#fff' href="http://localhost/dgrav/views/private/index.php">dGrav</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="#" class="navbar-link">Admin</a>
            </p>
            <ul class="nav">
              <li class="divider-vertical"></li>	
              <li><a href="http://localhost/dgrav/views/private/dgrav-app-data-config.php">Data/App Config</a></li>
              <li class="divider-vertical"></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid" >
		<div class="row-fluid">
        	<div class="span7">
        		<h2>Data Gravity Monitoring</h2>
        		<p><button class='btn btn-info' id='main_button' onclick='toggleMainMonitor'>TURN OFF OVERALL MONITORING</button></p>
        		<table id='main_list' class="table table-bordered">
        		<tr><th>Application</th><th>Status</th></tr>

        		</table>
      	  	</div>

       	</div>
	</div> 

<script src="../../assets/js/jquery.min.js"></script>
<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" >
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/admin.js"></script>
<script type='text/javascript'>
	window.load = preLoad(0);
</script>

</body>
</html>