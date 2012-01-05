<?php
 import("@.ORG.Dir");
class SettingAction  extends CommonAction{

    function index() {
        $web_config = require APP_PATH . "/siteconfig.inc.php";
        foreach ($web_config as $key => $value) {
            if ($value === true)
                $web_config[$key] = "true";
            if ($value === false)
                $web_config[$key] = "false";
        }
        $this->assign("web_config", $web_config);
        $this->display();
    }

     /**
      +----------------------------------------------------------
     * 保存配置到数据库和config文件
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     */
    function save() {
        //db_siteurl和EXTRA_UPLOAD_PATH这两个值如果用户在最后写上了/,把/去掉
        if (substr($_POST["SITE_HOST"], strlen($_POST["SITE_HOST"]) - 1) == '/')
            $_POST["SITE_HOST"] = substr($_POST["SITE_HOST"], 0, strlen($_POST["SITE_HOST"]) - 1);

        $web_config = "<?php\r\nif (!defined('THINK_PATH')) exit();\r\nreturn array(\r\n";
        foreach ($_POST as $key => $value) {
            if (strtolower($value) == "true" || strtolower($value) == "false" || is_numeric($value))
                $web_config .= "\t'" . $key . "'=>$value,\r\n";
            else
                $web_config .= "\t'" . $key . "'=>'$value',\r\n";
        }
        $web_config .= ");\r\n?>";

        file_put_contents (APP_PATH . "/siteconfig.inc.php", $web_config);
        $dir=new Dir("./Runtime");
        $dir->del("./Runtime");
        $this->success(L('_OPTIONS_SAVE_SUCCESS_'));
    }
    
}
