<?php
class Events_model extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }



    public function insertevent()
	{


		$date = date("Y-m-d H:i:s");
        $event = isset($_REQUEST['event']) ? $_REQUEST['event'] : '';
        $sdate = isset($_REQUEST['sdate']) ? $_REQUEST['sdate'] : '';
        $edate = isset($_REQUEST['edate']) ? $_REQUEST['edate'] : '';
        $occ = isset($_REQUEST['occ']) ? $_REQUEST['occ'] : '';
        $span = isset($_REQUEST['span']) ? $_REQUEST['span'] : '';

        $query1 = $this->db->query("SELECT * FROM events WHERE tite= ? ", array($event));
        if($this->db->affected_rows()>0){
        echo 2;
        exit;
    }
         $query1 = $this->db->query("SELECT * FROM events WHERE sdate between '$sdate' And '$edate' or (edate between'$sdate' And '$edate')");
       if($this->db->affected_rows()>0){
        echo 3;
        exit;
    }

    	


        $query = $this->db->query("INSERT INTO events(`tite`, `sdate`, `edate`, `span`, `occurence`, `created_date`) VALUES (?,?,?,?,?,?)", array($event,$sdate,$edate,$span,$occ,$date));

        if($this->db->affected_rows()){

        	echo 1;
        }
        else{

        	echo 4;
        }
    
        
   }



 public function getevents()
 {



 	$query = $this->db->query("SELECT * FROM `events`");



 	$array1 = array();
        $array2 = array();
        foreach ($query->result() as $row) {
            $data = array();
            $data['title'] = $row->tite;
            $data['dates'] = $row->sdate . ' to  ' . $row->edate;
            $data['Occurence'] = '';
            $data['span1'] = '';
            $data['span'] = '';

              if($row->occurence == 1)
              {
              	$data['span1'] = "Every";
              }
              elseif($row->occurence == 2)
              {
              	$data['span1'] = "Every Other";
              }
              elseif($row->occurence == 3)
              {
              	$data['span1'] = "Every Third";
              }
              else
              {
              	$data['span1'] = "Every Fourth";
              }


                if($row->span == 1)
              {
              	$data['span'] = "Day";
              }
              elseif($row->span == 2)
              {
              	$data['span'] = "Week";
              }
              elseif($row->span == 3)
              {
              	$data['span'] = "Month";
              }
              else
              {
              	$data['span'] = "Year";
              }

            
              $data['Occurence'] = $data['span1']." ".$data['span'];
             
              $data['action']='<i class="edit" data-toggle="modal" title="Edit" style="cursor:pointer"  data-sid="' . $row->id . '"
                     data-id="' . $row->id . '"
                     data-title="' . $row->tite . '"
                     data-sdate="' . $row->sdate . '"
                     data-edate="' . $row->edate . '"
                     data-occurence="' . $row->occurence . '"
                     data-span="' . $row->span . '"
                     
                   data-target="#edit" >edit</i>

                     <i class="delete" id="del1" data-toggle="modal" data-target="#delete" style="cursor:pointer"     data-aid="' . $row->id . '"  title="Delete" >Delete</i>
                    ';


           
            $array2[] = $data;
        }
        $array1['data'] = $array2;
        $this->db->close();
        echo json_encode($array1);
        return false;
 }




 public function deleteevents()
 {

$did = isset($_REQUEST['aid']) ? $_REQUEST['aid'] : '';



$query = $this->db->query("DELETE FROM `events` WHERE id = $did ");

if($this->db->affected_rows()){


	echo 1;
}

else{


	echo 2;
}



 }





public function editevent(){

		$id= isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
        $event = isset($_REQUEST['etitle']) ? $_REQUEST['etitle'] : '';
        $sdate = isset($_REQUEST['sdate']) ? $_REQUEST['sdate'] : '';
        $edate = isset($_REQUEST['edate']) ? $_REQUEST['edate'] : '';
        $occ = isset($_REQUEST['occur']) ? $_REQUEST['occur'] : '';
        $span = isset($_REQUEST['duration']) ? $_REQUEST['duration'] : '';

//echo $id."<br>";
// echo $event."<br>";
// echo $sdate ."<br>";
// echo $edate."<br>";
// // echo $occ."<br>";
// // echo $span;

// exit;


        $query =  $this->db->query("UPDATE `events`  SET `tite`= '$event',`sdate`= '$sdate',`edate`= '$edate',`span`=$span,`occurence`=$occ WHERE id= $id;");
      // var_dump($this->db->last_query());
      // exit;

       if($this->db->affected_rows()>0){

       	echo 1;
       }
       else{

       	echo 2;
       }

}







}