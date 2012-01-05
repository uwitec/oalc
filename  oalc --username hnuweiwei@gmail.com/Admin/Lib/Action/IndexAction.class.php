<?php
import("@.Com.common.email");
class IndexAction extends CommonAction {
	
	// 框架首页
	public function index() {
		if (isset ( $_SESSION [C ( 'USER_AUTH_KEY' )] )) {
			//显示菜单项
			$menu = array ();

             //读取应用分组 by 万维网
            $gmodel = M("Group");
            $gwhere ['status'] = 1;
            $gwhere ['show'] = 1;
            $appgrouplist = $gmodel->where($gwhere)->field('id,name,title')->order('sort asc')->select();
            $this->assign('appgroup', $appgrouplist);


			//读取数据库模块列表生成菜单项
			$node = M ( "Node" );
			$id = $node->getField ( "id" );
			$where ['level'] = 2;
			$where ['status'] = 1;
			$where ['pid'] = $id;
			$list = $node->where ( $where )->field ( 'id,name,group_id,title' )->order ( 'sort asc' )->select ();
			$accessList = $_SESSION ['_ACCESS_LIST'];
			foreach ( $list as $key => $module ) {
				if (isset ( $accessList [strtoupper ( APP_NAME )] [strtoupper ( $module ['name'] )] ) || $_SESSION ['administrator']) {
					//设置模块访问权限
					$module ['access'] = 1;
					$menu [$key] = $module;
				}
			}
			
			if (! empty ( $_GET ['tag'] )) {
				$this->assign ( 'menuTag', $_GET ['tag'] );
			}
			//dump($menu);
			$this->assign ( 'menu', $menu );
		}
//        dump($appgrouplist);
//        dump($menu);
		C ( 'SHOW_RUN_TIME', false ); // 运行时间显示
		C ( 'SHOW_PAGE_TRACE', false );

           $result=M()->query('show columns from user');

		$this->display ();
	}

}
?>