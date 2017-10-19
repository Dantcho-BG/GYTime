function start_work_time(time) {
  if (time == "00:00:00") {
      document.getElementById("today_work_time_show").innerHTML = "";
      return;
  } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("today_work_time_show").innerHTML = xmlhttp.responseText;
          }
      };
      xmlhttp.open("GET", "functions/start_work_time.php?time=" + time, true);
      xmlhttp.send();
  }
}

	function end_work_time(time) {
    if (time == "00:00:00") {
        document.getElementById("today_work_time_show").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("today_work_time_show").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "functions/end_work_time.php?time=" + time, true);
        xmlhttp.send();
    }
	}
