
<?php



defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Activitytracker extends REST_Controller 
{
    function activityTracker_post() 
    {
        $this->load->model('activitytrackermodel');
        $a = $this->activitytrackermodel->activityTracker($this->post('dbname'),$this->post('userNameSession'),$this->post('logParameter'),$this->post('tableName'),$this->post('idOfEntity'),$this->post('changedValue'),$this->post('autoincrementedParameter'));
        $this->response($a);
    }

 }