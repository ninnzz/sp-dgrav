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
	background-color:#040612;
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
          <a class="brand" href="http://localhost/dgrav/views/private/dgrav-admin-index.php">dGrav</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="#" class="navbar-link">Admin</a>
            </p>
            <ul class="nav">
              <li class="divider-vertical"></li>	
              <li class="active"><a href="http://localhost/dgrav/views/private/dgrav-app-data-config.php">Data/App Config</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#about">Constants</a></li>
              <li class="divider-vertical"></li>
              <li><a href="#contact">About</a></li>
              <li class="divider-vertical"></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid" >
		<div class="row-fluid">
        	<div class="span2">
        		<h4>Configurations</h4>
        		<div class="well sidebar-nav">
	            	<ul class="nav nav-list" id='main_list'>
						<li class="nav-header">Data</li>
						<li class="active"><a href="#" onclick='showDataSettings(this)'>Server Config</a></li>
						
						<li class="nav-header">Applications <a href='#' onclick='showAppSettings()'><i class="icon-plus"></i>New Application</a></li>

					</ul>
      		    </div><!--/.well -->
      	  	</div>

        	<div class="span7" id='data-settings'>
        		<h4>Data Server Setting</h4>
        		<table class="table table-bordered">
					<tr><td>Host</td><td><input type='text' id='db-host' placeholder='ex. 127.0.0.1'/> </td></tr>
					<tr><td>Bandwidth(within same server)</td><td><input type='text' id='db-sever-bandwidth' placeholder='MBps' value='' /></td></tr>
					<tr><td>Compression Ratio</td><td><input type='text' id='data-compression' placeholder=' (0-1]' /></td></tr>
					<tr><td>Mysql User(for dgrav)</td><td><input type='text' id='mysql-username' /></td></tr>
					<tr><td>Mysql password</td><td><input type='password' id='mysql-password' /></td></tr>
					<tr><td>Database Name</td><td><input type='text' id='mysql-db' /></td></tr>
					<tr><td colspan='2'><button class='btn btn-danger' onclick='updateDataServerSettings()'>Update Settigs</button></td>
					</tr>
				</table>
        	</div>

        	<div class="span7" id='app-settings'>
        		<h4>Application Settings Setting</h4>
        		<table class="table table-bordered">
					<tr><td>Name (serve as ID)</td><td><input type='text' id='app-appName' placeholder='Application Name'/></td>
					</tr>
					<tr><td>Database</td><td><input type='text' id='app-database' placeholder='Database Name'/></td>
					</tr>
					<tr><td>Path</td><td><input type='text' id='app-path' placeholder='ex. appName/index.php'/></td>
					</tr>	
					<tr><td>Host IP</td><td><input type='text' id='app-serverIP' placeholder='202.12.45.10' /> </td>
					</tr>	
					<tr><td> <input type='checkbox' id='app-samedbserver' />Same server as data?</td><td><input type='checkbox' id='app-browser' />Uses a web browser?</td>
					</tr>
					<tr><td>Size on Disk(MB)</td><td><input type='text' id='app-diskspace' placeholder='greater than 0'/></td>
					</tr>	
					<tr><td>Compression Ratio on Memory</td><td><input type='text' id='app-compression-ratio-memory' placeholder='Usually 1'/></td>
					</tr>	
					<tr><td>Compression Ratio on Disk</td><td><input type='text' id='app-compression-ratio-disk' placeholder='Usually 1' /></td>
					</tr>	
					<tr><td>CPU Utilization</td><td><input type='text' id='app-cpu-util' placeholder='GHz'/></td>
					</tr>	
					<tr><td>Memory Consumption</td><td><input type='text' id='app-memory-used' placeholder='MB'/></td>		
					</tr>
					<tr><td colspan='2' style='text-align:center;'><button class='btn btn-danger' onclick="addApplication('app',0)">Add Application</button></td>
					</tr>
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
	window.load = preLoad(1);
</script>

</body>
</html>