<?php
$template = "<h4>Application Settings Setting :: ".$name[1]." </h4><table class='table table-bordered'>
		<tr><td>Name (serve as ID)</td><td><input type='text' id='$id-appName' placeholder='Application Name' value='".$name[1]."' disabled/> <a href='#' onclick=\"deleteApp('$id')\"><i class='icon-trash'></i>Delete</a></td></tr>
		<tr><td>Database</td><td><input type='text' id='$id-database' placeholder='Database Name' value='".$db_name[1]."'/></td></tr>
		<tr><td>Path</td><td><input type='text' id='$id-path' placeholder='ex. appName/index.php' value='".$path[1]."'/></td></tr>
		<tr><td>Host IP</td><td><input type='text' id='$id-serverIP' placeholder='202.12.45.10' value='".$host[1]."'/> </td></tr>
		<tr><td> <input type='checkbox' id='$id-samedbserver' $same/>Same server as data?</td><td><input type='checkbox' id='$id-browser' $ubrowser/>Uses a web browser?</td></tr>
		<tr><td>Size on Disk(MB)</td><td><input type='text' id='$id-diskspace' placeholder='greater than 0' value='".$sizeDisk[1]."'/></td></tr>
		<tr><td>Compression 	Ratio on Memory</td><td><input type='text' id='$id-compression-ratio-memory' placeholder='Usually 1' value='".$cr_mem[1]."'/></td></tr>
		<tr><td>Compression Ratio on Disk</td><td><input type='text' id='$id-compression-ratio-disk' placeholder='Usually 1' value='".$cr_disk[1]."'/></td></tr>
		<tr><td>CPU Utilization</td><td><input type='text' id='$id-cpu-util' placeholder='GHz' value='".$cpu[1]."'/></td></tr>
		<tr><td>Memory Consumption</td><td><input type='text' id='$id-memory-used' placeholder='MB' value='".$mem_con[1]."'/></td></tr>";
