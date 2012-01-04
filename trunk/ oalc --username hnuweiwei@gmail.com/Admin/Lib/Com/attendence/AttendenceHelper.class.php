<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weiwei
 * Date: 11-12-31
 * Time: 上午8:47
 * To change this template use File | Settings | File Templates.
 */

class AttendenceHelper {

    public static function hasAttendence(){
        $map['attdate']=date("Y-m-d");
        $map['userid']=$_SESSION[C('USER_AUTH_KEY')];
        $attendenceModel=D("attendence");
        $result=$attendenceModel->where($map)->find();
        if($result){
            return $result;
        }else{
            return 0;
        }
    }

}
