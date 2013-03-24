google.load('visualization', '1', {packages: ['motionchart']});

function drawMotionChart(app_arr) {
  var data = new google.visualization.DataTable();




  var ser = [];
  for(i=0;i<app_arr.length;i++){
    
    app_n = ($.trim(app_arr[i])).split("@@");
    app_name = app_n[0];
    app_data = ($.trim(app_n[1])).split("\n");
    

    for(j=0;j<app_data.length;j++){
      tmp = ($.trim(app_data[j])).split('|');
      tmp_date = ($.trim(tmp[0])).split(' ');
      tmp_date1 = ($.trim(tmp_date[0])).split('-');
      tmp_date2 = ($.trim(tmp_date[1])).split(':');
      tmp_data = ($.trim(tmp[1])).split(',');
      ser.push([app_name,new Date(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[0]*1,tmp_data[2]*1,tmp_data[1]*1,tmp_data[4]*1,tmp_data[3]*1,tmp_data[5]*1,tmp_data[6]*1]);

    }
  }
  data.addColumn('string', 'Application');
  data.addColumn('date', 'Date');
  data.addColumn('number', 'Data Gravity');
  data.addColumn('number', 'Data Mass(MB)');
  data.addColumn('number', 'Application Mass(MB)');
  data.addColumn('number', 'Request per Seconds');
  data.addColumn('number', 'Latency(seconds)');
  data.addColumn('number', 'Average Request Size(MB)');
  data.addColumn('number', 'Bandwidth(MBps)');
  data.addRows(ser);

  var motionchart = new google.visualization.MotionChart(
  document.getElementById('visualization'));
  var options = {};
  options['state'] = {"iconKeySettings":[],"stateVersion":3,"time":"notime","xAxisOption":"_NOTHING","playDuration":15,"iconType":"BUBBLE","sizeOption":"_NOTHING","xZoomedDataMin":null,"xZoomedIn":false,"duration":{"multiplier":1,"timeUnit":"hours"},"yZoomedDataMin":null,"xLambda":1,"colorOption":"_NOTHING","nonSelectedAlpha":0.4,"dimensions":{"iconDimensions":[]},"yZoomedIn":false,"yAxisOption":"_NOTHING","yLambda":1,"yZoomedDataMax":null,"showTrails":true,"xZoomedDataMax":null};
  //options['state'] = {"uniColorForNonSelected":false,"iconKeySettings":[],"yAxisOption":"3","nonSelectedAlpha":0.4,"time":"notime","showTrails":true,"xAxisOption":"2","yZoomedDataMin":131.39472294,"yLambda":1,"yZoomedDataMax":139.39472294,"orderedByY":false,"xZoomedDataMin":0.0039856908062182,"yZoomedIn":false,"orderedByX":false,"playDuration":15000,"xZoomedIn":false,"iconType":"BUBBLE","xLambda":1,"colorOption":"4","duration":{"timeUnit":"hours","multiplier":2},"xZoomedDataMax":974519.53811087,"dimensions":{"iconDimensions":["dim0"]},"sizeOption":"2"};

  options['width'] = 1000;
  options['height'] = 550;
  motionchart.draw(data, options);
}

function drawLineChart(app_arr){

    var ser = [];
    for(i=0;i<app_arr.length;i++){
      var app_i = {name:'',data:[]};

      app_n = ($.trim(app_arr[i])).split("@@");
      app_name = app_n[0];
      app_data = ($.trim(app_n[1])).split("\n");
      app_i['name']=app_name;
      
      for(j=0;j<app_data.length;j++){
  
        tmp = ($.trim(app_data[j])).split('|');
        tmp_date = ($.trim(tmp[0])).split(' ');
        tmp_date1 = ($.trim(tmp_date[0])).split('-');
        tmp_date2 = ($.trim(tmp_date[1])).split(':');
        tmp_data = ($.trim(tmp[1])).split(',');

        app_i['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[0]*1]);

      }
      ser.push(app_i);
    }

    $('#visualization').fadeOut('slow',function(){
        $('#visualization').css("display",'none');
        $('#visualization').css("width",'78%');

    
          $('#visualization').highcharts({
            chart: {
                type: 'spline',
                zoomType: 'xy'
            },
            title: {
                text: 'Data Gravity Chart'
            },
            subtitle: {
                text: 'Comparison of Data Gravity by each Application'
            },
            xAxis: {
                type: 'datetime',
                maxZoom: 3600,
                dateTimeLabelFormats: { // don't display the dummy year
                  month: '%e. %b',
                  year: '%b'
                }
            },
            yAxis: {
                title: {
                  text: 'Data Gravity'
                },
                min: 0
            },
            tooltip: {
                formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| value: '+ this.y ;
                }
            },
            series:ser
          });
          $('#visualization').fadeIn('slow',function(){
              $('#visualization').css("display",'block');
              $('#visualization').css("width",'80%');
          });

    });

}

function drawBubbleChart(app_arr){
    var ser = [];
    for(i=0;i<app_arr.length;i++){
      var app_i = {name:'',data:[]};

      app_n = ($.trim(app_arr[i])).split("@@");
      app_name = app_n[0];
      app_data = ($.trim(app_n[1])).split("\n");
      app_i['name']=app_name;
      
      for(j=0;j<app_data.length;j++){
  
        tmp = ($.trim(app_data[j])).split('|');
        tmp_date = ($.trim(tmp[0])).split(' ');
        tmp_date1 = ($.trim(tmp_date[0])).split('-');
        tmp_date2 = ($.trim(tmp_date[1])).split(':');
        tmp_data = ($.trim(tmp[1])).split(',');

        app_i['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[0]*1,tmp_data[4]*1]);

      }
      ser.push(app_i);
    }
    console.log(ser);
    $('#visualization').fadeOut('slow',function(){
        $('#visualization').css("display",'none');
        $('#visualization').css("width",'78%');

    
          $('#visualization').highcharts({
            chart: {
                type: 'bubble',
                zoomType: 'xy'
            },
            title: {
                text: 'Data Gravity Chart'
            },
            subtitle: {
                text: 'Comparison of Data Gravity by each Application'
            },
            xAxis: {
                type: 'datetime',
                maxZoom: 3600,
                dateTimeLabelFormats: { // don't display the dummy year
                  month: '%e. %b',
                  year: '%b'
                }
            },
            yAxis: {
                title: {
                  text: 'Data Gravity'
                },
                min: 0
            },
            tooltip: {
                formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| value: '+ this.y ;
                }
            },
            series:ser
          });
          $('#visualization').fadeIn('slow',function(){
              $('#visualization').css("display",'block');
              $('#visualization').css("width",'80%');
          });

    });
}

function initVisualization(opt){  
  

  $.get("/dgrav/core/api/index.php/public/allgrav",function(data){
    var obj = $.parseJSON(data);
    app = obj['data'];
    app_arr = ($.trim(app)).split("<!>");
    
    if(opt==1){
      $("#curr_graph").value='1';
      drawBubbleChart(app_arr);
    } else if(opt==2){
      $("#curr_graph").value='2';
        drawMotionChart(app_arr);
    } else if(opt==3){
      $("#curr_graph").value='3';
        drawLineChart(app_arr);
    }
  });


}

function loadSingleApp(id,appName){

  $.get("/dgrav/core/api/index.php/public/app/"+id,function(data){
    var obj = $.parseJSON(data);
    app = obj['data'];
 
    // !! maglagay d2 ng pangcheck kung walang laman or meron...!!

    app_arr = ($.trim(app)).split("\n");
    
    var gravity = {
      name: 'Data Gravity',
      data: []
    };
    var app_mass = {
      name: 'Application Mass(MB)',
      data: []
    };
    var data_mass = {
      name: 'Data Mass(MB)',
      data: []
    };
    var latency = {
      name: 'Latency(Seconds)',
      data: []
    };
    var ave_req = {
      name: 'Average Request per Second',
      data: []
    };
    var ave_req_size = {
      name: 'Average Request Size(MB)',
      data: []
    };
    var bw = {
      name: 'Bandwidth(MBs)',
      data: []
    };
    var ser_data = [];

    for(i=0;i<app_arr.length;i++){
      tmp = ($.trim(app_arr[i])).split('|');
      tmp_date = ($.trim(tmp[0])).split(' ');
      tmp_date1 = ($.trim(tmp_date[0])).split('-');
      tmp_date2 = ($.trim(tmp_date[1])).split(':');
      tmp_data = ($.trim(tmp[1])).split(',');

      gravity['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[0]*1]);
      app_mass['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[2]*1]);
      data_mass['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[1]*1]);
      latency['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[4]*1]);
      ave_req['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[3]*1]);
      ave_req_size['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[5]*1]);
      bw['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[6]*1]);
    }
    ser_data.push(gravity,app_mass,data_mass,latency,ave_req,ave_req_size,bw);

    
    $('#app_graph').fadeOut('slow',function(){
        $('#app_graph').css("display",'none');
        $('#app_graph').css("width",'78%');

    
          $('#app_graph').highcharts({
            chart: {
                type: 'spline',
                zoomType: 'xy'
            },
            title: {
                text: 'Data Gravity Chart :: '+appName
            },
            subtitle: {
                text: 'Data Graviry Log Of An Application'
            },
            xAxis: {
                type: 'datetime',
                maxZoom: 3600,
                dateTimeLabelFormats: { // don't display the dummy year
                  month: '%e. %b',
                  year: '%b'
                }
            },
            yAxis: {
                title: {
                  text: 'Values'
                },
                min: 0
            },
            tooltip: {
                formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| value: '+ this.y ;
                }
            },
            series:ser_data
          });
          $('#app_graph').fadeIn('slow',function(){
              $('#app_graph').css("display",'block');
              $('#app_graph').css("width",'80%');
              $.pageslide.close();
          });

    });

  });
  
}

function loadApp(){

  $.get("/dgrav/core/api/index.php/public/allapp",function(data){
    var obj = $.parseJSON(data);
    apps = obj['data'];

    $('#a_list').empty();
    for(i=0;i<apps['result_count'] ;i++){
      //console.log("<li>"+apps[i]['name']+"</li>");
      $('#a_list').append("<li onclick=\"loadSingleApp('"+apps[i]['id']+"','"+apps[i]['name']+"')\">"+apps[i]['name']+"</li>");
    }

    //show some loading here..display all app if not failed
    $.pageslide({ direction: 'left', href: '#modal' }); 
  });
 
}


function preLoad(){

  initVisualization(1);
}