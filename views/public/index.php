<!DOCTYPE html>
<html>
<head>
<title>dGrav :: Data Gravity Monitoring Application</title>
<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<link href="../../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" >
<link href="../../assets/css/jquery.pageslide.css" rel="stylesheet" >
<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
<style>
*	{
		margin:0;
		padding:0;
		color:#000;
	}
body{
	background-color:#111;
	padding:10px;
}
a{
	color:#000;
	-webkit-transition: color 0.2s linear;
	-moz-transition: color 0.3s linear;

}
a:hover{
	text-decoration: none;
	color:#8293BA;
	-webkit-transition: color 0.2s linear;
	-moz-transition: color 0.3s linear;
}
#applist a{
	color:#9f9f9f;
	-webkit-transition: color 0.2s linear;
	-moz-transition: color 0.3s linear;
}
#applist a:hover{
	text-decoration: none;
	color:#8293BA;
	-webkit-transition: color 0.2s linear;
	-moz-transition: color 0.3s linear;	
}
#hdr{
	height:250px;
	margin-top:200px;
	color:#fff;
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
#modal, #modal2 { 
	display: none;
	font-family: Iceland;
}
#pageslide{
	background-color: #fff;
	box-shadow: none;
}
#a_list{
	list-style-type: none;
	font-family: 'Electrolize', sans-serif;
}
#a_list li{
	margin-bottom:5px;
	border-left: 10px #fff solid;
	padding-left:5px;
	-webkit-transition: border-left 0.2s linear;
	-moz-transition: border-left 0.3s linear;	
}
#a_list li:hover{
	cursor: pointer;
	border-left: 10px #8293BA solid;
	-webkit-transition: border-left 0.2s linear;
	-moz-transition: border-left 0.3s linear;	
}
#inst2{
	background-color: #fff;
	width:40%;
	margin-left: auto;
	margin-right: auto;
	padding-bottom:10px;
	text-align: center;
	border-bottom-left-radius: 100px; 
	border-bottom-right-radius: 100px; 
}
p, label{
	color:#fff;
}
.trans_item{
	color:#CFCFCF;
	font-family: 'Electrolize', sans-serif;
	font-weight: bold;
	font-size: 20px;
	width:200px;
	opacity: 0.3;
	-webkit-transition: opacity 0.3s linear;
	-moz-transition: opacity 0.3s linear;
}
.trans_item:hover{
	color:#CECDD4;
	text-decoration: none;
	opacity: 1;
	-webkit-transition: opacity 0.3s linear;
	-moz-transition: opacity 0.3s linear;

}
.div_ent{
	height:650px;
	font-family: Iceland;
	color:#222;
}
.small_circle{
	background-color: #fff;
	width:18px;
	height:20px;
	padding-left:5px;
	padding-bottom:2px;
	border-radius: 50px;
	margin-left:10px;
	-webkit-transition: background-color 0.2s linear;
	-moz-transition: background-color 0.3s linear;
}
.small_circle:hover{
	background-color: #8293BA;
	-webkit-transition: background-color 0.2s linear;
	-moz-transition: background-color 0.3s linear;
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
		<li><a href="#monitor" class="trans_item" onclick="initVisualization()">Monitoring</a></li>
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
	    	<div>
		    	<h2 style="color:#fff;">Monitor</h2>
		    	<a href="javascript:$.pageslide({ direction: 'left', href: 'https://google.com' }); " style="float:right" class='small_circle'><i class="icon-arrow-left"></i></a>
		    	<a href="#" style="float:right" class='small_circle'><i class="icon-question-sign"></i></a>
				<div style="margin-left:10px; width:20%;" >
					<input type="hidden" id="curr_graph" value='1'/>
					<div class="btn-group" data-toggle="buttons-radio">
						<button type="button" class="btn" onclick="initVisualization(1)">Bubble Chart</button>
						<button type="button" class="btn" onclick="initVisualization(2)">Motion Graph(daily interval)</button>
						<button type="button" class="btn" onclick="initVisualization(3)">Spline</button>
					</div>
				</div>
	    	</div>
	    	<div id="visualization" style='width:1000px;height:550px;'>
	    	</div>

		</div>

		<div id="applist" class="div_ent">

			<h2 style="color:#fff;">Applications</h2>
			<a href="javascript:loadApp()"><i class="icon-list-alt icon-white"></i>Show Applications</a>
			<div id="app_cnt" style="width:100%;">
				<div id="app_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>

				<div id="inst2">
				<i class="icon-arrow-up"></i>Select/Deslect items to be vied by clicking on its label.<br/>
				<i class="icon-zoom-in"></i>Zoom by selecting portions of the graph screen.
				</div>
			</div>
			<div id="modal" class="span2">
	            <h2>Application List</h2>
	            <hr/>
	            <ul id="a_list" style="color:#111">

	            </ul>
	            <hr/>
	            <a href="javascript:$.pageslide.close()"><i class="icon-remove"></i>Close</a>
        	</div>
		</div>
  	</div>
  </div>
</div>


<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/jquery.pageslide.min.js"></script>
<script src="../../assets/js/highcharts.js"></script>
<script src="../../assets/js/highcharts-more.js"></script>
<script src="../../assets/js/exporting.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="../../assets/js/public.js"></script>
<script type='text/javascript'>
	window.load = preLoad();
</script>

</body>
</html>