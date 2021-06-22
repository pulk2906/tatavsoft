<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




	<meta charset="utf-8">
	<title>Event Creation</title>

	<div class="jumbotron text-center">
  <h1>Create Event</h1>
  
</div>

<div class="container">
  <div class="row">
  	<form role="form1">
  		<div class = "col-sm-12">
    <div class="col-sm-4">
     <div class="form-group ">
         <label class="control-label"><span class="red">Event Title*</span></label>
         <input type="text" id="etitle" class="form-control" >                           
     </div>
    </div>
</div>
<div class = "col-sm-12">
    <div class="col-sm-4">
      <label class="control-label">Start Date<span class="red">*</span></label>
                                    <input type="date" id="sdate" class="form-control datepicker" >
    </div>
</div>
<div class = "col-sm-12">
    <div class="col-sm-4">
      <label class="control-label">End Date<span class="red">*</span></label>
                                    <input type="date" id="edate" class="form-control datepicker"  >
    </div>
</div>
<div class = "col-sm-12">
    <div class="col-sm-4">
    	<label class="control-label">Occurence<span class="red">*</span></label>
          <select id="occur" class="form-control ">
            <option selected="selected" value="1">EveryDay</option>
			<option value="2">Every Other</option>
			<option value="3">Every Third</option>
			<option value="4">Every Fourth</option>
                                        
           </select>

           <select id="duration" class="form-control" style="margin-top:10px;">
			<option selected="selected" value="1">Day</option>
			<option value="2">Week</option>
			<option value="3">Month</option>
			<option value="4">Year</option>
		</select>

    </div>
</div>
<div class = "col-sm-12" style="margin-top:15px;">
<div class="col-sm-4">
     <button type="button" id="save" class="btn btn-success">Save</button>
    </div>
</div>

</form>
  </div>
</div>

</body>

<script>


	$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   // alert(maxDate);
    $('#sdate').attr('min', maxDate);
     $('#edate').attr('min', maxDate);
});

 $('#save').click(function() {
 	//alert("test");
 	//return false;


 	    var event = $('#etitle').val();
        var sdate = $('#sdate').val();
        var edate = $('#edate').val();
        var occ = $('#occur').val();
        var span = $('#duration').val();

      if (event == '') {
           
           alert("Event Title Cannot Be Empty");
           return false;
        }
        if (sdate == '') {
           
           alert("Start Date Cannot Be Empty");
           return false;
        }
        if (edate == '') {
           
           alert("End Date Cannot Be Empty");
           return false;
        }

        if(sdate > edate){

alert("End Date Cannot Be Lesser Than Start Date");
           return false;


        }

      


        $.ajax({
            url: "http://localhost/tatavsoft/index.php/events/insertevent",
            data: {
                "event": event,
                "sdate": sdate,
                "edate": edate,
                "occ": occ,
                "span": span
            },
            success: function(result) {
                //alert(result);
                if (result == 1) {
                    
                    alert("Event Inserted Successfully.");
                    window.location.href = 'http://localhost/tatavsoft/index.php/events/viewevents';

                }
                else if(result == 2){

                	alert("Event Title Already Exists.");

                } 
                else if(result == 3){

                	alert("Event Between this Daterange Already Exists.");

                }else {
                    
                    alert("Event Creation Failed.");
                }

            },
            error: function(result) {
                alert("Error while insertion of event.");
            }
        });
          
  



  });

        </script>
        }
</html>