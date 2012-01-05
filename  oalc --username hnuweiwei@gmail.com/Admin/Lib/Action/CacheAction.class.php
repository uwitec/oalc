<?php
class CacheAction   extends CommonAction {

        function index() {
         $this->assign("cache", array(
            "Cache" => array("Cache" => "./Runtime/Cache", "Temp" => "./Runtime/Temp", "Logs" => "./Runtime/Logs", "Data" => "./Runtime/Data/_fields"),
            "Runtime" => array("Runtime" => "./Runtime")
         ));
        $this->display();
    }


        function clearCache() {
        $dirs = $_POST['dir'];
        foreach ($dirs as $value) {
            $current_dir = @opendir($value);
            while ($entryname = readdir($current_dir)) {
                if (is_file($value . "/" . $entryname)) {
                    @unlink($value . "/" . $entryname);
                }
            }
            @closedir($current_dir);
        }
        $this->success(L('_OPTIONS_CLEARCACHE_SUCCESS_'));
    }
    
}
