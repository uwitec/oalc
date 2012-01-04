<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weiwei
 * Date: 11-12-28
 * Time: 上午10:47
 * To change this template use File | Settings | File Templates.
 */
 
class BegoffAction extends CommonAction{
    
    	function _filter(&$map){
            $map['userid']=$_SESSION [C ( 'USER_AUTH_KEY' )];
	    }

    
}
