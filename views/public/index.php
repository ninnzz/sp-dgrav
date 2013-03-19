<!DOCTYPE html>
<html>
<head>
<title>dGrav :: Data Gravity Monitoring Application</title>
<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" >
<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
<style>
*	{
		margin:0;
		padding:0;
		color:#fff;
	}
body{
	background-color:#111;
	padding:10px;
}
a{
	color:#000;
	-webkit-transition: color 0.2s linear;
}
a:hover{
	text-decoration: none;
	color:#8293BA;
	-webkit-transition: color 0.2s linear;
}
#hdr{
	height:250px;
	margin-top:200px;
	/*border-radius: 20px;
	background-color:rgba(20,20,20,0.3);*/
}
#m_logo{
	width:250px;
}

#menu_list{
	margin-top:10px;
	list-style-type: none;
}
#menu_list li{
	margin-bottom:10px;
}
#home_cnt1{
	background-color: #eee;
	width:500px;
	height:500px;
	margin-top:60px;
	margin-left:15%;
	text-align: center;
	color:#8293BA;
	font-family: Century Gothic;
	border:10px double #000;
	border-radius: 300px;
}
.trans_item{
	color:#CFCFCF;
	font-family: 'Electrolize', sans-serif;
	font-weight: bold;
	font-size: 20px;
	width:200px;
	opacity: 0.3;
	-webkit-transition: opacity 0.3s linear;
}
.trans_item:hover{
	color:#CECDD4;
	text-decoration: none;
	opacity: 1;
	-webkit-transition: opacity 0.3s linear;
}
.div_ent{
	height:650px;
	font-family: Iceland;
}

</style>

</head>
<body>

<div class="container-fluid" id="content">
  <div class="row-fluid" >
  	<div id="hdr" class="span2">
	<div id="m_logo">
		<a href="" class="trans_item"><img src="../../assets/images/dgrav2.png" width=180/></a>
	</div>

	<ul id='menu_list'>
		<li><a href="#monitor" class="trans_item">Monitoring</a></li>
		<li><a href="#applist" class="trans_item">Applications</a></li>
		<li><a href="#about" class="trans_item">About</a></li>
		<li><a href="#contact" class="trans_item">Contacts</a></li>
	</ul>

	</div>
	<div id="cnt" class="span10" style="height:650px;overflow-y:hidden;">
	    <div id="home" class="div_ent">
	    	<div id="home_cnt1">
	    		<img src="../../assets/images/dgrav1.png" style="margin-top:20px;"/>
				<h2>Visualizing Data Gravity</h2>
				<br/>
				<a href='http://blog.mccrory.me/2010/12/07/data-gravity-in-the-clouds/' target='new'><i class="icon-edit"></i>Data Gravity Defined</a>
				<br/>
				<br/>
				<i class="icon-arrow-down"></i>
				<br/>
				<br/>
				<a href='http://datagravity.org/' target='new'><i class="icon-cog"></i>Data Gravity Formula</a>
				<br/>
				<br/>
				<i class="icon-arrow-down"></i>
				<br/>
				<br/>
				<a href='https://www.facebook.com/pprmint' target='new'><i class="icon-leaf"></i>pprmint</a>

	    	</div>
	    	<div style="float:right;">
	    		<p>
	    			You can't blame gravity for falling in love.
	    			<br/>-Albert Einstein
	    		</p>
	    	</div>
	    </div>
	   
	    <div id="monitor" class="div_ent">
	    	<h2>Monitor</h2>
	    	<div id="visualization">
	    	</div>
		</div>
  	</div>
  </div>
</div>


<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/dygraph-combined.js"></script>
<script src="../../assets/js/public.js"></script>
<script type='text/javascript'>
</script>

</body>
</html>