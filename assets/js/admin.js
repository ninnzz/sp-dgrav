function showAppSettings(){
	$('.active').removeClass('active');
	$('#app-settings').empty().html("<h4>Application Settings Setting(Add new Application)</h4><table class='table table-bordered'><tr><td>Name (serve as ID)</td><td><input type='text' id='app-appName' placeholder='Application Name'/></td></tr><tr><td>Database</td><td><input type='text' id='app-database' placeholder='Database Name'/></td></tr><tr><td>Path</td><td><input type='text' id='app-path' placeholder='ex. appName/index.php'/></td></tr><tr><td>Host IP</td><td><input type='text' id='app-serverIP' placeholder='202.12.45.10' /> </td></tr><tr><td> <input type='checkbox' id='app-samedbserver' />Same server as data?</td><td><input type='checkbox' id='app-browser' />Uses a web browser?</td></tr><tr><td>Size on Disk(MB)</td><td><input type='text' id='app-diskspace' placeholder='greater than 0'/></td></tr><tr><td>Compression Ratio on Memory</td><td><input type='text' id='app-compression-ratio-memory' placeholder='Usually 1'/></td></tr><tr><td>Compression Ratio on Disk</td><td><input type='text' id='app-compression-ratio-disk' placeholder='Usually 1' /></td></tr><tr><td>CPU Utilization</td><td><input type='text' id='app-cpu-util' placeholder='GHz'/></td></tr><tr><td>Memory Consumption</td><td><input type='text' id='app-memory-used' placeholder='MB'/></td></tr><tr><td colspan='2' style='text-align:center;'><button class='btn btn-danger' onclick=\"addApplication('app',0)\">Add Application</button></td></tr></table>");
	$('#data-settings').css('display','none');
	$('#app-settings').css('display','block');
}
function showDataSettings(obj){
	$('.active').removeClass('active');
	$('#data-settings').css('display','block');
	$('#app-settings').css('display','none');
	$(obj.parentNode).addClass('active');	
}
function updateDataServerSettings(){
	db_host = $('#db-host').val();
	bandwidth = $('#db-sever-bandwidth').val();
	compression = $('#data-compression').val();
	mysql_username = $('#mysql-username').val();
	mysql_password = $('#mysql-password').val();
	db_name = $('#mysql-db').val();
	
	$.post("/dgrav/core/file_IO/conf_writer.php",{host:db_host, bandwidth:bandwidth, compression:compression, username:mysql_username,password:mysql_password, db:db_name},function(data){
		alert(data);
		//console.log(data);
	});
}
function addApplication(id,opt){
//alert('here');
	same_server = false;
	use_browser = false;
	name 		= $('#'+id+'-appName').val();
	db_name 	= $('#'+id+'-database').val();
	path 		= $('#'+id+'-path').val();
	host 		= $('#'+id+'-serverIP').val();
	sizeDisk 	= $('#'+id+'-diskspace').val();
	cr_mem 		= $('#'+id+'-compression-ratio-memory').val();
	cr_disk 	= $('#'+id+'-compression-ratio-disk').val();
	cpu 		= $('#'+id+'-cpu-util').val();
	mem_con 	= $('#'+id+'-memory-used').val();
	if($('#'+id+'-samedbserver').is(':checked'))
		same_server = true;	
	if($('#'+id+'-browser').is(':checked'))
		use_browser = true;	

	//alert(name+' '+db_name+' '+path+' '+host+' '+sizeDisk+' '+cr_mem+' '+cr_disk+' '+cpu+' '+mem_con+' '+same_server+' '+use_browser);		
	$.post("/dgrav/core/api/index.php/admin/newapp",{id:id, opt:opt, name:name, db_name:db_name, path:path, host:host, sizeDisk:sizeDisk, cr_mem:cr_mem, cr_disk:cr_disk, cpu:cpu, mem_con:mem_con, same_server:same_server, use_browser:use_browser},function(data){
		var obj = $.parseJSON(data);
		console.log(obj);
		alert(obj['meta']['message']);
		if(obj['meta']['code'] == '200'){
			if(opt == 0)
				document.location.reload(true);
		}
	});
}
function getAppConfig(id,obj2){
	$.post("/dgrav/core/api/index.php/admin/getapp",{appId:id},function(data){
		var obj = $.parseJSON(data);
		console.warn(obj);
		
		$('.active').removeClass('active');
		$('#data-settings').css('display','none');
		$('#app-settings').css('display','block');
		
		$(obj2.parentNode).addClass('active');	
		$('#app-settings').empty().html(obj['data']+"<tr><td colspan='2' style='text-align:center;'><button class='btn btn-danger' onclick=\"addApplication('"+id+"',1)\">Update Application</button></td></tr></table>");
	});
}
function deleteApp(id){
	if(confirm('Are you sure you want to delete data?')){
		$.post("/dgrav/core/api/index.php/admin/delete",{appId:id},function(data){
			alert(data);
			document.location.reload(true);
		});
	}
}
function getDataServerInfo(){
	$('#data-settings').load("/dgrav/core/templates/data-setting.php",function(data){

		//alert(data);
	});
}
function toggleMonitor(obj,opt,id){
	
	$.post("/dgrav/core/api/index.php/admin/monitor",{monitoring:opt,id:id},function(data){
		if(opt == 1){
			$(obj).removeClass('btn btn-danger');
			$(obj).attr('onclick','toggleMonitor(this,0)');
			$(obj).html('Monitoring');
			$(obj).addClass('btn btn-success');				
		} else if(opt == 0){
			$(obj).removeClass('btn btn-success');
			$(obj).attr('onclick','toggleMonitor(this,1)');
			$(obj).html('&nbsp;Stopped&nbsp;&nbsp;');
			$(obj).addClass('btn btn-danger');	
		}

	});

}
function getAllApp(opt){

	$.get("/dgrav/core/api/index.php/admin/allapp",function(data){
		var obj = $.parseJSON(data);
		apps = obj['data'];
			console.warn(apps);


		for(i=0;i<apps['result_count'] ;i++){
			console.log(apps[i]);
			if(opt == 1){
				$('#main_list').append(" <li class=''><a href='#' onclick=\"getAppConfig('"+apps[i]['id']+"',this)\">"+apps[i]['name']+"</a></li>");
			} else if(opt == 0){
				if(apps[i]['monitoring'] == '1'){
					btn = "<button class='btn btn-success' onclick=\"toggleMonitor(this,0,'"+apps[i]['id']+"')\">Monitoring</button>";
				} else{
					btn = "<button class='btn btn-danger' onclick=\"toggleMonitor(this,1,'"+apps[i]['id']+"')\"> Stopped </button>";
				}
				$('#main_list').append("<tr class=''><td><h5>"+apps[i]['name']+"</h5></td><td>"+btn+"</td></tr>");
			}
		}

	});
}
function preLoad(opt){
	if(opt == 1){
		getDataServerInfo();
	}
	
	getAllApp(opt);
}
					
