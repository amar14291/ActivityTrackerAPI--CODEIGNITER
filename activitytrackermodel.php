<?php

class Activitytrackermodel extends CI_Model {


    function activityTracker($dbname,$usernamesession,$logparameter,$tablename,$idofentity,$changedValue,$autoincrementedParameter)
    {
       

        $sql = "SELECT * FROM $dbname.$tablename WHERE $autoincrementedParameter = $idofentity";
        $res = $this->db->query($sql);
        $resvalue = $res->row();
        $matchstring=$resvalue->$logparameter;

        if(trim($changedValue) != trim($matchstring))
        {
            $data = array('datetime'=>date('Y-m-d H:i:s'), 'changed_by'=>$usernamesession,'old_value'=>$matchstring, 'new_value'=>$changedValue, 'remarks'=> $usernamesession.' has changed the value of '.$logparameter.' from '. $matchstring.' to '.$changedValue);
            $this->db->insert($dbname.'.activity_tracker', $data);
            return array('Code'=>200,'Msg'=>'The activity has been captured');
        }
        else
        {
        	 return array('Code'=>100,'Msg'=>'No value changed found in the activity');
        }
       
    }



  }