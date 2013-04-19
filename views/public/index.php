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
#content{
	display:none;
}
#loading{
	width:100%;
	height:100%;
	background-color:#fff;
	position:absolute;
	top:0px;
	left:0px;
	text-align: center;
}
#clear{
	width:100%;
	height:100%;
	background-color:#2e2f2e;
	position:absolute;
	top:0px;
	left:0px;
	text-align: center;
	display:none;
	z-index:100; 
}
#root {
	position:absolute;
	height:400px;
	width:400px;
	background-color:#F4F4F4;
	border:10px solid rgba(20,20,20,0.5);
	border-radius: 300px;
	text-align: center;
	-moz-border-radius: 300px;
	-webkit-border-radius: 300px;

}
#handle {
	margin-left:auto;
	margin-right:auto;
	padding:2px;
	color:white;
	font-weight: bold;
	width:19%;
	cursor:move;
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

<div id="loading">
	<img src="../../assets/images/loading.gif" style="width:40%;height:40%;margin-left:auto;margin-right:auto;margin-top:100px;" />
	<br/>
	<p style="color:#000;font-family: Iceland;">Taking too long?<br/>
	<i class="icon-refresh"></i><a href="" title="Check you internet connection or network">Refresh</a>
	</p>
	
</div>

<input type="hidden" id="curr_graph" value='1'/>
<div class="container-fluid" id="content">
  <div class="row-fluid" >
  	<div id="hdr" class="span2">
	<div id="m_logo">
		<a href="#" class="trans_item" onclick="scrollMe(0)"><img src="../../assets/images/dgrav2.png" width=180/></a>
	</div>

	<ul id='menu_list'>
		<li><a href="#" id="monitor_click" class="trans_item"  onclick="scrollMe(1)" >Monitoring</a></li>
		<li><a href="#" id="applist_click" class="trans_item" onclick="scrollMe(2)" >Applications</a></li>
		<li><a href="#" id="compapp_click" class="trans_item" onclick="scrollMe(3)" >Compare App</a></li>
		
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
				<br/>
				<br/>
				<a href="#mainModal" role="button" data-toggle="modal" ><i class="icon-question-sign"></i></a>

	    	</div>
	    	<div style="float:right;">
	    		<p>
	    			You can't blame gravity for falling in love.
	    			<br/>-Albert Einstein
	    		</p>
	    	</div>
    		<!-- Modal -->
			<div id="mainModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<h3 id="myModalLabel">Welcome!</h3>
					</div>
					<div class="modal-body">
						<p  style="color:#111;font-size:16px;font-family: Century Gothic;">&nbsp;&nbsp;&nbsp;Data gravity is concept coined by <a href="http://blog.mccrory.me/" target="new">Dave McCrory</a>. It gives the idea that data and applications can be treated as entities that exerts force(gravity) over each other.<br/>
						&nbsp;&nbsp;&nbsp;This application provides tools and ways of visualizing and enterpreting data gravity.
						<br/><br/>
						<span class="label label-success">Monitoring</span> Tab provides the overall preview of data gravity of applications that dGrav monitors. It provides options on effective comparison between variables and factors that affect Data Gravity.
		            	<br/><br/>
						<span class="label label-info">Applications</span> Tab allows the user to view information of a <em>specific</em> application. It shows the logs of an application in terms of latency, bandwidth, and other factors that affect Data Gravity.
						<br/><br/>
						&nbsp;&nbsp;&nbsp;For <span class="label label-important">instructions</span> and <span class="label label-important">information</span> on a specific function, the <i class="icon-question-sign"></i> icon will provide a window that states the instruction and user guide on a specific part of the application.
		            	</p>
					</div>
				<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>
	    </div>
	   
	    <div id="monitor" class="div_ent">
	    	<div>
		    	<h2 style="color:#fff;">Monitor</h2>
		    	<a href="javascript:$.pageslide({ direction: 'left', href: 'instructions.html' }); " style="float:right" class='small_circle'><i class="icon-arrow-left"></i></a>
		    	<a href="#" id="dragButton" style="float:right" class='small_circle' onclick="showDrag(1)"><i class="icon-question-sign"></i></a>
				<div style="margin-left:10px; width:20%;" >
					<div class="btn-group" data-toggle="buttons-radio">
						<button type="button" class="btn" onclick="initVisualization(1)">Bubble Chart</button>
						<button type="button" class="btn" onclick="initVisualization(2)">Motion Graph(daily interval)</button>
						<button type="button" class="btn" onclick="initVisualization(3)">Spline</button>
					</div>
				</div>
	    	</div>
	    	<div id="visualization" style='width:1000px;height:550px;'>
	    	</div>
			<div id="root" style="left:550px; top:100px;display:none;background-color:#eee;z-index:200;">
				<div id="handle"><span class="label label-important" style="font-size:20px;">Drag Me</span></div>
				<a href="#" class="small_circle" onclick="showDrag(0)">Close<i class="icon-remove-circle"></i></a>
				<div id='root_cnt' style="padding-left:20px;padding-right:20px;margin-top:25px;font-size:15px;font-family: Century Gothic;">
				</div>
			</div>

		</div>

		<div id="applist" class="div_ent" style="margin-top:20px;">

			<h2 style="color:#fff;">Applications</h2>
			<a href="#myModal" role="button" data-toggle="modal" style="float:right" class='small_circle'><i class="icon-question-sign"></i></a>
			<a href="javascript:loadApp()" title="Shows all the available application"><i class="icon-list-alt icon-white"></i>Show Applications</a>
				
			<div id="app_cnt" style="width:100%;height:520px;overflow-y:auto">
				<div id="app_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="data_mass_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="app_mass_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="latency_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="bw_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="ave_req_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>
				<div id="req_size_graph" style="max-width:80%;margin-top:20px;height:500px;">
				<!--<img src="../../assets/images/arrow.png" class="trans_item"/>-->
				</div>

			</div>
				<div id="inst2" style="color:#F53649;">
				<i class="icon-arrow-up"></i>Select/Deslect items to be vied by clicking on its label.<br/>
				<i class="icon-zoom-in"></i>Zoom by selecting portions of the graph screen.
				</div>
			
			<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<h3 id="myModalLabel">Instructions</h3>
					</div>
					<div class="modal-body">
						<p  style="color:#111;font-size:16px;font-family: Century Gothic;">Data gravity is computed using the ff:<br/>
		            		&nbsp;&nbsp;&nbsp;-Application Mass<br/>
		            		&nbsp;&nbsp;&nbsp;-Data Mass<br/>
		            		&nbsp;&nbsp;&nbsp;-Latency<br/>
		            		&nbsp;&nbsp;&nbsp;-Average Request Size<br/>
		            		&nbsp;&nbsp;&nbsp;-Average Request<br/>
		            		&nbsp;&nbsp;&nbsp;-Bandwidth<br/>
		            		
		            		<br/>
		            		You can <span class="label label-important">compare the parameters</span> by enabling and disabling the corresponding variable on the <span class="label label-important">bottom part</span> of the graph.
		            		<br/>
		            		<br/>
		            		Choose application by clicking <span class="label label-inverse"><i class="icon-list-alt icon-white"></i>Show Apllication</span> link on the upper left corner of the screen.
		            	</p>
					</div>
				<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
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
		<div id="compare_app" class="div_ent">
			<h2 style="color:#fff;">Select Between Application</h2>
			<select id="app1_select">
			</select>
			<select id="app2_select">
			</select>
			<br/>
			<button class='btn btn-success btn-large' onclick="showComparison()">Show Comparison Between Application</button>
			<div id="clear">
				<h3>Comparison Between</h3><br/>
				
				<div id="app_compare" style="width:100%;height:600px;overflow-y:auto;">
					<div id="block1">
						<div id="app1_g" style="max-width:45%;float:left;"></div><div id="app2_g" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block2">
						<div id="app1_a" style="max-width:45%;float:left"></div><div id="app2_a" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block3">
						<div id="app1_d" style="max-width:45%;float:left"></div><div id="app2_d" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block4">
						<div id="app1_l" style="max-width:45%;float:left"></div><div id="app2_l" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block5">
						<div id="app1_b" style="max-width:45%;float:left"></div><div id="app2_b" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block6">
						<div id="app1_ar" style="max-width:45%;float:left"></div><div id="app2_ar" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>
					<div id="block7">
						<div id="app1_ars" style="max-width:45%;float:left"></div><div id="app2_ars" style="max-width:45%;float:left;margin-left:10px;"></div>
					</div>

				</div>
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
<script src="../../assets/js/dom-drag.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="../../assets/js/public.js"></script>
<script type='text/javascript'>
	window.load = preLoad();
</script>

</body>
</html>