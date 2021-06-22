
<html>

<head>
  <title>Events</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>



       
 </head>

<body>


	<table id="events" class="table" style="width:100%;">
        <thead>
          <tr>
            <th >Title</th>
            <th >Dates</th>
            <th >Occurence</th>
            <th >Action</th>
           </thead>
       </table>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         				<input type="hidden" id="sid" />
                        <input type="hidden" id="title" />
                        <input type="hidden" id="dates" />
                       <input type="hidden" id="Occurence">

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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>












<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><a class="a" href="javascript:void(0);" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" style="font-size: 1rem;"></i>&nbsp;Delete
                            Event</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="del_aid" />
                        <input type="hidden" id="del_att" />

                        <p>Delete Event?</p>
                        
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="unchk" class="btn btn-light" data-dismiss="modal" style="width:7rem;">Cancel</button>
                    <button type="button" id="deleteeve" class="btn btn-success" style="width:7rem;">Save</button>
                </div>
            </div>
        </div>
    </div>






      


 </body>

 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



      <script>

      	
      	$(document).ready(function(){
      	var table=$('#events').DataTable({
						"aaSorting": [],
						"scrollX": true,
						"contentType": "application/json",
						/* "fixedColumns":   {
            			 leftColumns: 1,
            			 rightColumns:1
        				}, */
        				dom: 'Bfrtip',
						"contentType": "application/json",
						
						buttons: [
					    'pageLength',
						{
	                    extend: 'excelHtml5',
	                    exportOptions: {
	                        columns: [ 0, 1, 2, 3 ]
	                    }
	                    },
					    'colvis', 
                    
                    
						],
						"ajax": "http://localhost/tatavsoft/index.php/events/getevents",

						"columns": [
							{ "data": "title" },
							{ "data": "dates" },
							{ "data": "Occurence" },
							{ "data": "action" }
							
						]
                    });
      	  });






      </script>

      <script>



 $(document).on("click", ".edit", function() {



 $('#id').val($(this).data('id'));
            $('#sid').val($(this).data('sid'));
            $('#etitle').val($(this).data('title'));
            $('#sdate').val($(this).data('sdate'));
            $('#edate').val($(this).data('edate'));
            $('#occur').val($(this).data('occurence'));
            $('#duration').val($(this).data('span'));

        });
            

      	
$('#update').click(function() {
        

         var id = $('#sid').val();
         //alert(id);
        var title = $('#etitle').val();
       // alert(title);
        var sdate = $('#sdate').val();
        var edate = $('#edate').val();
        var occurence = $('#occur').val();
        //alert(occurence);
        var duration = $('#duration').val();
        //alert(duration);



        $.ajax({
            url: "http://localhost/tatavsoft/index.php/events/editevent",
            data: {
                "sid": id,
                "etitle": title,
                "sdate": sdate,
                "edate": edate,
                "occur": occurence,
                "duration": duration,
                
              
            },
            success: function(result) {
                if (result == 1) {
                   
                    alert("edited successfully");
                    window.location.href = 'http://localhost/tatavsoft/index.php/events/viewevents';
                }  else {
                    alert("error updating event")
                }
            },
            error: function(result) {
                
            }

        });
    });


</script>


<script>







$(document).on("click", ".delete", function() {
	
            
            $('#del_aid').val($(this).data('aid'));
           

        });


$(document).on("click", "#deleteeve", function() {
        var id = $('#del_aid').val();
        
        $.ajax({
            url: "http://localhost/tatavsoft/index.php/events/deleteevents",
            data: {
                "aid": id,
                
            },
            success: function(result) {
                if (result == 1) {
                    alert("Deleted Successfully");
                    window.location.href = 'http://localhost/tatavsoft/index.php/events/viewevents';
                } else {
                    alert("error while deleting event");
                }

            },
            error: function(result) {
                alert("error");
            }
        });
    });


      </script>