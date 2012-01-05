<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weiwei
 * Date: 12-1-5
 * Time: 下午2:34
 * To change this template use File | Settings | File Templates.
 */
 
class BacksqlAction   extends CommonAction {
    
 	function index()
	{
		$DB = new Model();
		$list = $DB->query("SHOW TABLE STATUS");
		$this->assign("list",$list);
//        dump($list);
		$this->assign("bakfile",date("Ymdhi",time()));
		$this->display();
	}

    	function Backup(){
			$bakfile	=	"./Backup/".date("Ymdhis")."_backup.sql";
			if (file_exists($bakfile)) {
				$this->error("抱歉，备份数据已经存在");
			}
			$sqlinfo = "#Data Dump\n"
					."#长沙庐成软件开发有限公司管理平台\n"
					."# -------------------------------------------------------------------\n"
					."# 主机 : ".$_SERVER[SERVER_ADDR]."\n"
					."# 生成日期 : ".date("Y-m-d h:i",time())."\n";
		    	if($_POST['type'] == 'server'){
						$sql_data=$sqlinfo.BackupData();
		    		$filehandle = fopen($bakfile,"w");
		    		fwrite($filehandle,$sql_data);
		    		fclose($filehandle);
//						$this->assign("jumpUrl",__URL__);
//						$this->success("备份数据成功!");
                    $this->redirect("index/index",array(),2,
                                    "<div style='margin:30px auto;  font-size:30px; ' align='center'><span style='color:green;'>succeed,please wait 2 seconds</span></div>");

		    	}else{
						$sql_data=$sqlinfo.BackupData();
						$filename=date("Ymdhis")."_backup.sql";
						if($_POST['zip']=="gzip"){
							$sql_data =gzencode($sql_data, 9);
							$filename.=".zip";
						}
						header('Content-Encoding: none');
                        //   Header("Content-type: application/octet-stream");
						header('Content-Type: '.(strpos($HTTP_SERVER_VARS['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
						header('Content-Disposition: '.(strpos($HTTP_SERVER_VARS['HTTP_USER_AGENT'], 'MSIE') ? 'attachment; ' : 'attachment; ').'filename="'.$filename.'"');
                        //header("Content-Disposition:attachment; filename=".date( 'YmdHis ').".sql");
						header('Content-Length: '.strlen($sql_data));  //fix: 备份文件长度计算逻辑错误
						header('Pragma: no-cache');
						header('Expires: 0');
						echo $sql_data;die;
					}
				die;
			}

}
