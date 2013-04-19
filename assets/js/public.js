google.load('visualization', '1', {packages: ['motionchart']});

function scrollMe(opt){
  if(opt == 0){
    $('#cnt,body,html').animate({
         scrollTop: $("#home").offset().top
    }, 1000);
    showDrag(0);
  } else if(opt == 1){
    $('#cnt,body,html').animate({
         scrollTop:'700px'
    }, 1000);
    showDrag(0);
  } else if(opt == 2){
    $('#cnt,body,html').animate({
         scrollTop: "1400px"
    }, 1000);
    showDrag(0);
  } else if(opt == 3){
    $('#cnt,body,html').animate({
         scrollTop: "2100px"
    }, 1000);
    showDrag(0);
  }
}
function showDrag(opt){
  tmp = document.getElementById('curr_graph').value;
  if(tmp == 1){
    rc = "<h4>Comparison variable <br/>for the size of bubble:</h4><select id='bubble_select'><option value='1'>Data Mass</option><option value='2'>Application Mass</option><option value='3'>Average Request</option><option value='4'>Latency</option><option value='5'>Average Request Size</option><option value='6'>Bandwidth</option></select><br/><button class='btn btn-large btn-success' onclick='initVisualization(1)' type='button'>Render Graph</button><br/>Compare data gravity between different application by simply selecting the application from the bottom part of the graph";

  } else if(tmp == 2){
    rc = "<h4>MotionChart is used to compare<br/> daily average Data Gravity</h4><br/>&nbsp;&nbsp;&nbsp;-Change <span class='label label-inverse'>Y-Axis</span> paramters on the left part of the graph.<br/>&nbsp;&nbsp;&nbsp;-Change <span class='label label-inverse'>X-Axis</span> paramters on the bottom part of the graph.<br/>&nbsp;&nbsp;&nbsp;-Change <span class='label label-inverse'>Color Representation</span> of the entities in the upper right part of the graph.<br/>&nbsp;&nbsp;&nbsp;-Change <span class='label label-inverse'>Size Representation</span> paramters on the right part of the graph.<br/>&nbsp;&nbsp;&nbsp;-A <span class='label label-inverse'>Time Slider</span> is also provided at the bottom of the graph(Applies only if the duration is <span class='label label-warning'>more than one day</span>).";

  } else if(tmp == 3){
    rc = "<h4>Spline Chart</h4><br/>Spline chart shows patterns and trends on data. Same as in bubble chart, you can zoon in data by <span class='label label-success'>dragging</span> and <span class='label label-info'>selecting</span> the portion in the graph that needed to be zoomed. You can also <span class='label label-inverse'>select</span> vissible <span class='label label-inverse'>application</span> at the bottom of the graph.";
  }

  if(opt == 1){
    $('#root_cnt').empty().html(rc);
    $("#root").fadeIn("fast",function(){
      $('#root').css('display','block');
      $('#dragButton').attr('onclick','showDrag(0)');
    });
  } else if(opt == 0){
    $("#root").fadeOut("slow",function(){
      $('#root').css('display','none');
      $('#dragButton').attr('onclick','showDrag(1)');
    });
  }
}
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
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| Data Gravity: '+ this.y ;
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

function drawBubbleChart(app_arr,opt){
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

        app_i['data'].push([Date.UTC(tmp_date1[0],((tmp_date1[1]*1)-1),tmp_date1[2],tmp_date2[0],tmp_date2[1],tmp_date2[2]),tmp_data[0]*1,tmp_data[opt]*1]);

      }
      ser.push(app_i);
    }
    if(opt == 1){
      t_label = "Data Mass(MB)";
    } else if(opt == 2){
      t_label = "Application Mass(MB)";
    } else if(opt == 3){
      t_label = "Average Request per Second";
    } else if(opt == 4){
      t_label = "Latency(seconds)";
    } else if(opt == 5){
      t_label = "Average Request Size(MB)";
    } else if(opt == 6){
      t_label = "Bandwidth(MBs)";
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
                text: 'Comparison of Data Gravity by each Application | Bubble Size ::'+t_label
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
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| Data Gravity: '+ this.y +" | " + t_label+":"+ this.point.z ;
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
      document.getElementById("curr_graph").value='1';
      tmp = document.getElementById('bubble_select');
      if(tmp){
        bub = tmp.value;
      }else{
        bub = 2;
        showDrag(0);
      }

      drawBubbleChart(app_arr,bub);
    } else if(opt==2){
      document.getElementById("curr_graph").value='2'; 
      $('#visualization').fadeOut('slow',function(){
        $('#visualization').css("display",'none');
        $('#visualization').css("width",'78%');

        drawMotionChart(app_arr);
        $('#visualization').fadeIn('slow',function(){
              $('#visualization').css("display",'block');
              $('#visualization').css("width",'80%');
        });
      });
      showDrag(0);
    } else if(opt==3){
      document.getElementById("curr_graph").value='3';
      drawLineChart(app_arr);
      showDrag(0);
    }
  });


}

function loadSingleApp(id,appName,opt){

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

    if(opt == 1){
      loadAppVariables("#app1_g",appName,"Data Gravity","data gravity",[gravity,data_mass,app_mass,latency,bw,ave_req,ave_req_size]);
      // loadAppVariables("#app_graph",appName,"Data Gravity","data gravity",[gravity]);
      loadAppVariables("#app1_a",appName,"Data Mass","MB",[data_mass]);
      loadAppVariables("#app1_d",appName,"Application Mass","MB",[app_mass]);
      loadAppVariables("#app1_l",appName,"Latency","Seconds",[latency]);
      loadAppVariables("#app1_b",appName,"Bandwidth","MBps",[bw]);
      loadAppVariables("#app1_ar",appName,"Average Requests","Requests per second",[ave_req]);
      loadAppVariables("#app1_ars",appName,"Average Request Size","MB",[ave_req_size]);

    } else if(opt == 2){
      loadAppVariables("#app2_g",appName,"Data Gravity","data gravity",[gravity,data_mass,app_mass,latency,bw,ave_req,ave_req_size]);
      // loadAppVariables("#app_graph",appName,"Data Gravity","data gravity",[gravity]);
      loadAppVariables("#app2_a",appName,"Data Mass","MB",[data_mass]);
      loadAppVariables("#app2_d",appName,"Application Mass","MB",[app_mass]);
      loadAppVariables("#app2_l",appName,"Latency","Seconds",[latency]);
      loadAppVariables("#app2_b",appName,"Bandwidth","MBps",[bw]);
      loadAppVariables("#app2_ar",appName,"Average Requests","Requests per second",[ave_req]);
      loadAppVariables("#app2_ars",appName,"Average Request Size","MB",[ave_req_size]);

    } else{
      loadAppVariables("#app_graph",appName,"Data Gravity","data gravity",[gravity,data_mass,app_mass,latency,bw,ave_req,ave_req_size]);
      // loadAppVariables("#app_graph",appName,"Data Gravity","data gravity",[gravity]);
      loadAppVariables("#data_mass_graph",appName,"Data Mass","MB",[data_mass]);
      loadAppVariables("#app_mass_graph",appName,"Application Mass","MB",[app_mass]);
      loadAppVariables("#latency_graph",appName,"Latency","Seconds",[latency]);
      loadAppVariables("#bw_graph",appName,"Bandwidth","MBps",[bw]);
      loadAppVariables("#ave_req_graph",appName,"Average Requests","Requests per second",[ave_req]);
      loadAppVariables("#req_size_graph",appName,"Average Request Size","MB",[ave_req_size]);
    }
  });
  
}


function loadAppVariables(targetDiv,appName,varName,varUnit,ser_data){    
    $(targetDiv).fadeOut('slow',function(){
        $(targetDiv).css("display",'none');
        $(targetDiv).css("width",'75%');
    
          $(targetDiv).highcharts({
            chart: {
                type: 'spline',
                zoomType: 'xy'
            },
            title: {
                text: 'Data Gravity Chart :: '+appName+' :: '+varName
            },
            subtitle: {
                text: varName+' Log of Application'
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
                  text: varUnit
                },
                min: 0
            },
            tooltip: {
                formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  Highcharts.dateFormat('%e. %b %H:%M:%S:', this.x) +'| '+varName+': '+ this.y ;
                }
            },
            series:ser_data
          });
          $(targetDiv).fadeIn('slow',function(){
              $(targetDiv).css("display",'block');
              $(targetDiv).css("width",'75%');
              $.pageslide.close();
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
      $('#a_list').append("<li onclick=\"loadSingleApp('"+apps[i]['id']+"','"+apps[i]['name']+"',0)\">"+apps[i]['name']+"</li>");
    }

    //show some loading here..display all app if not failed
    $.pageslide({ direction: 'left', href: '#modal' }); 
  });
 
}
function initCompApp(){
  $.get("/dgrav/core/api/index.php/public/allapp",function(data){
    var obj = $.parseJSON(data);
    apps = obj['data'];

    $('#app1_select').empty();
    $('#app2_select').empty();
    for(i=0;i<apps['result_count'] ;i++){
      //console.log("<li>"+apps[i]['name']+"</li>");
      $('#app1_select').append("<option value='"+apps[i]['id']+"|"+apps[i]['name']+"'>"+apps[i]['name']+"</option>");
      $('#app2_select').append("<option value='"+apps[i]['id']+"|"+apps[i]['name']+"'>"+apps[i]['name']+"</option>");
    }
  });

}
function showComparison(){
  $('#clear').fadeIn().css('display','block');
  app1 = document.getElementById("app1_select").value;
  app2 = document.getElementById("app2_select").value;
  app1 = app1.split('|');
  app2 = app2.split('|');
 
  loadSingleApp(app1[0],app1[1],1)
  loadSingleApp(app2[0],app2[1],2)
}


function preLoad(){
  
  $('#loading').animate({
    opacity:'0'
    },1000,function(){
      $('#mainModal').modal({keyboard: false});       
      $('#loading').css('display','none'); 
      $('#content').css('display','block'); 
      $('#content').animate({opacity:'1'},1000,function(){
        initVisualization(1);
        initCompApp();
        var theHandle = document.getElementById("handle");
        var theRoot   = document.getElementById("root");
        Drag.init(theHandle, theRoot,25,850,25,250);

      });

  });

 
}