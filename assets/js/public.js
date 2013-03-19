google.load('visualization', '1', {packages: ['motionchart']});

    function drawVisualization() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Application');
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Data Gravity');
      data.addColumn('number', 'Data Mass(MB)');
      data.addColumn('number', 'Application Mass(MB)');
      data.addColumn('number', 'Request per Seconds');
      data.addColumn('number', 'Latency(seconds)');
      data.addColumn('number', 'Average Request Size(MB)');
      data.addColumn('number', 'Bandwidth(MBps)');
      data.addRows([

        ['Usc-csc-elections', new Date(2013,03,17,01,16,53), 0.0039856908062182,138.72732639,442.64,0.00029920411704865,0,37274.4,549],
        ['Usc-csc-elections', new Date(2013,03,17,18,57,25), 974519.53811087,138.18092060,442.64,3,0,293.33333333333,676],
        ['Usc-csc-elections', new Date(2013,03,17,19,03,44), 23337.702467234,138.18263340,442.64,0.125,0,404.66666666667,707],
        ['Usc-csc-elections', new Date(2013,03,18,19,04,29), 8299.2679005081,138.19342899,442.64,0.12,0,642.33333333333,683],
        ['Usc-csc-elections', new Date(2013,03,18,19,05,00), 1387.3303853396,138.22898197,442.64,0.10309278350515,0,1656.8,777],
        ['Usc-csc-elections', new Date(2013,03,19,19,06,32), 821.33456626359,138.23799992,442.64,0.058823529411765,0,1597.2727272727,763],
        ['Usc-csc-elections', new Date(2013,03,19,20,06,13), 28.332190609032,138.37633610,442.64,0.0066418703506908,0,2398.64,633],
        
        ['Get-14', new Date(2013,03,16,20,06,13), 27.528223542466,138.39472294,442.64,0.0063387423935091,0,2478.8,660],
        ['Get-14', new Date(2013,03,16,20,06,13), 27.195559243275,138.39472294,442.64,0.0063387423935091,0,2478.8,656],
        ['Get-14', new Date(2013,03,17,20,06,13), 26.782572694033,138.39472294,442.64,0.0063387423935091,0,2478.8,651],
        ['Get-14', new Date(2013,03,18,20,06,13), 28.708474008212,138.39472294,442.64,0.0063387423935091,0,2478.8,674],
        ['Get-14', new Date(2013,03,19,20,06,13), 28.538350092289,138.39472294,442.64,0.0063387423935091,0,2478.8,672],
        ['Get-14', new Date(2013,03,19,20,06,13), 34.793500611649,138.39472294,442.64,0.0063387423935091,0,2478.8,742],
        ['Get-14', new Date(2013,03,20,20,06,13), 31.946958432991,138.39472294,442.64,0.0063387423935091,0,2478.8,711],
       
      ]);
    
    	var motionchart = new google.visualization.MotionChart(
          document.getElementById('visualization'));
	    var options = {};
		//options['state'] = '{"iconKeySettings":[],"stateVersion":3,"time":"notime","xAxisOption":"_NOTHING","playDuration":15,"iconType":"BUBBLE","sizeOption":"_NOTHING","xZoomedDataMin":null,"xZoomedIn":false,"duration":{"multiplier":1,"timeUnit":"hours"},"yZoomedDataMin":null,"xLambda":1,"colorOption":"_NOTHING","nonSelectedAlpha":0.4,"dimensions":{"iconDimensions":[]},"yZoomedIn":false,"yAxisOption":"_NOTHING","yLambda":1,"yZoomedDataMax":null,"showTrails":true,"xZoomedDataMax":null};';
		options['width'] = 1000;
		options['height'] = 550;
      	motionchart.draw(data, options);
    }
    

    google.setOnLoadCallback(drawVisualization);