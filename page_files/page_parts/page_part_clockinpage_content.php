<script src="js/easytimer.js"></script>
<script>

  var timer = new Timer();
  timer.addEventListener('secondsUpdated', function (e) {
    $('#showtimer').html(timer.getTimeValues().toString());
  });

</script>

<div class="box box-change_color_background">
  <div class="box-header with-border">
    <h3 class="box-title">Timer <small id="change_time_name"></small></h3><br/>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="center_timer change_color" id="showtimer">00:00:00</div>
  </div>
  <div class=box-footer>
    <div id="clock_in" class="margin_bottom col-lg-4 col-xs-6"><button onclick="button_switch()" class="btn btn-info btn-block btn-sm">Clock in</button></div>
    <div id="clock_out" class="margin_bottom hidden col-lg-4 col-xs-6"><button id="clock_out_button" onclick="button_switch()" class="btn btn-danger btn-block btn-sm">Clock out</button></div>
    <div id="start_coffee"class="margin_bottom col-lg-4 col-xs-6"><button id="coffee_start_button" onclick="button_switch_coffee()" class="btn btn-warning btn-block btn-sm" disabled>Coffee</button></div>
    <div id="finish_coffee" class="margin_bottom hidden col-lg-4 col-xs-6"><button onclick="button_switch_coffee()" class="btn btn-danger btn-block btn-sm">Finish Coffee</button></div>
    <div id="start_lunch" class="margin_bottom col-lg-4 col-xs-12"><button id="lunch_start_button" onclick="button_switch_lunch()" class="btn btn-danger btn-block btn-sm" disabled>Lunch</button></div>
    <div id="finish_lunch" class="margin_bottom hidden col-lg-4 col-xs-12"><button onclick="button_switch_lunch()" class="btn btn-danger btn-block btn-sm">Finish Lunch</button></div>
  </div>
</div>
<div class="box box-change_color_background">
	<div class="box-header with-border">
		<h3 class="box-title">Today's working time</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
	</div>
	<div class="box-body">
	  <div>Work time: <strong id="today_work_time_show"></strong></div>
	  <div>Coffee time: <strong id="today_coffee_time_show"></strong></div>
		<div>Lunch time: <strong id="today_lunch_time_show"></strong></div>
	</div>
</div>

<script>

  function button_switch() {
    if (document.getElementById("clock_in").className.match(/(?:^|\s)hidden(?!\S)/)) {
      document.getElementById("coffee_start_button").disabled = true;
      document.getElementById("lunch_start_button").disabled = true;
      document.getElementById("clock_out").className += " hidden";
      document.getElementById("clock_in").className =
      document.getElementById("clock_in").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
	    var worked_time = document.getElementById("showtimer").innerHTML;
	    document.getElementById("today_work_time_show").innerHTML = worked_time;
	    end_work_time();
    } else {
      document.getElementById("coffee_start_button").disabled = false;
      document.getElementById("lunch_start_button").disabled = false;
      document.getElementById("clock_in").className += " hidden";
      document.getElementById("clock_out").className =
      document.getElementById("clock_out").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
      document.getElementById('change_time_name').innerHTML = 'Working time:';
	    start_work_time();
      }
  }

  function button_switch_coffee() {
    if (document.getElementById("finish_coffee").className.match(/(?:^|\s)hidden(?!\S)/)) {
      document.getElementById("clock_out_button").disabled = true;
      document.getElementById("lunch_start_button").disabled = true;
      document.getElementById("start_coffee").className += " hidden";
      document.getElementById("finish_coffee").className =
      document.getElementById("finish_coffee").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
      document.getElementById('change_time_name').innerHTML = 'Coffee time:';
      start_coffee_time();
    } else {
      document.getElementById("clock_out_button").disabled = false;
      document.getElementById("lunch_start_button").disabled = false;
      document.getElementById("finish_coffee").className += " hidden";
      document.getElementById("start_coffee").className =
      document.getElementById("start_coffee").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
	    end_coffee_time();
      }
  }

  function button_switch_lunch() {
    if ( document.getElementById("finish_lunch").className.match(/(?:^|\s)hidden(?!\S)/) ) {
      document.getElementById("clock_out_button").disabled = true;
      document.getElementById("coffee_start_button").disabled = true;
      document.getElementById("start_lunch").className += " hidden";
      document.getElementById("finish_lunch").className =
      document.getElementById("finish_lunch").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
      document.getElementById('change_time_name').innerHTML = 'Lunch time:';
	    start_lunch_time();
    } else {
      document.getElementById("clock_out_button").disabled = false;
      document.getElementById("coffee_start_button").disabled = false;
      document.getElementById("finish_lunch").className += " hidden";
      document.getElementById("start_lunch").className =
      document.getElementById("start_lunch").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' );
      end_lunch_time();
      }
  }

</script>
<script>

  function start_work_time() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              var start_timer_from = xmlhttp.responseText;
			  start_timer_from = start_timer_from / 60;
			  start_timer_from = start_timer_from * 60;
              timer.stop();
				  timer.start({precision: 'seconds', startValues: {seconds: start_timer_from}});
          }
      };
      xmlhttp.open("GET", "functions/start_work.php", true);
      xmlhttp.send();
  }

  function end_work_time() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("today_work_time_show").innerHTML = xmlhttp.responseText;
		          timer.stop();
          }
      };
      xmlhttp.open("GET", "functions/end_work.php", true);
      xmlhttp.send();
  }

</script>
<script>

  function start_coffee_time() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //var start_timer_from = xmlhttp.responseText;
              timer.stop();
  		        //timer.start({precision: 'seconds', startValues: {seconds: start_timer_from}});
          }
      };
      xmlhttp.open("GET", "functions/start_coffee_time.php", true);
      xmlhttp.send();
  }

  function end_coffee_time() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("today_coffee_time_show").innerHTML = xmlhttp.responseText;
  		        timer.stop();
              start_work_time();
          }
      };
      xmlhttp.open("GET", "functions/end_coffee_time.php", true);
      xmlhttp.send();
  }

</script>
<script>

  function start_lunch_time() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //var start_timer_from = xmlhttp.responseText;
              timer.stop();
    	        //timer.start({precision: 'seconds', startValues: {seconds: start_timer_from}});
          }
      };
      xmlhttp.open("GET", "functions/start_lunch_time.php", true);
      xmlhttp.send();
  }

  function end_lunch_time() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("today_lunch_time_show").innerHTML = xmlhttp.responseText;
    				        timer.stop();
                    start_work_time();
                }
            };
            xmlhttp.open("GET", "functions/end_lunch_time.php", true);
            xmlhttp.send();
  }

</script>
