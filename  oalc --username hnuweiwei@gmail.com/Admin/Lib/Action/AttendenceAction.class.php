<?php
import ( "@.Com.attendence.AttendenceHelper" );

class AttendenceAction   extends CommonAction {

    	function _filter(&$map){

            if($_POST['attdate']==null){
                $_POST['attdate']=date("Y-m");
            }
		  $map['attdate'] = array('like',"%".$_POST['attdate']."%");
            $map['userid']=$_SESSION [C ( 'USER_AUTH_KEY' )];
	    }

    public function index(){
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ($name);
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
        $attenstate=AttendenceHelper::hasAttendence();
        $this->assign("hasAttendence",$attenstate);
        if($attenstate!=0){
            $this->assign("status",$attenstate['status']);
        }else{
            $this->assign("status",-1000);
        }
		$this->display ();
    }
}
