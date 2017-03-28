<?php
class CpsAction extends CommonAction
{
	var $pagecount = 20;
   /**
    +----------------------------------------------------------
    * 渠道查询
    +----------------------------------------------------------
	* @author	st
	* @version	2015-05-03 08:04:09
    +----------------------------------------------------------
    */
    public function qudao(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mid');
        if($get['search']){
            $totalcount = $model->where("mname like '%{$get['search']}%'")->count();
        }else{
            $totalcount = $model->count();
        }

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount ; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('search'=>'' . $get['search']); //加其他的参数
        $limit = $ShowPage->OffSet();

        if($get['search']){
            $list = $model->where("mname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','渠道查询');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
    }
   /**
    +----------------------------------------------------------
    * 渠道统计
    +----------------------------------------------------------
	* @author	st
	* @version	2015-05-03 08:04:09
    +----------------------------------------------------------
    */
    public function qudao_tongji(){
 //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mid');
        if($get['search']){
            $totalcount = $model->where("mname like '%{$get['search']}%'")->count();
        }else{
            $totalcount = $model->count();
        }
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount ; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('search'=>'' . $get['search']); //加其他的参数
        $limit = $ShowPage->OffSet();

        if($get['search']){
            $list = $model->where("mname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }
      foreach($list as $k=>$v){
		$v1 = $v['mid'];
    	$zong = M("member_info")->where("mid=$v1")->count();
    	$arr = M("pay_togame")->where("tid=$v1")->getField("payamount",true);
		
	    $get['begintime'] = strtotime(date('Y-m-d',$_SERVER['REQUEST_TIME']) . ' 00:00:00');
		$get['begintime3'] = strtotime(date('Y-m-d',strtotime('-3 day')) . ' 00:00:00');
		$get['begintime7'] = strtotime(date('Y-m-d',strtotime('-7 day')) . ' 00:00:00');
        $get['endtime'] = strtotime(date('Y-m-d',$_SERVER['REQUEST_TIME']) . ' 23:59:59');
        $condition['regtime'] = array('between',array($get['begintime'],$get['endtime']));
	    $condition['mid'] = array('eq',$v1);
		$condition1['regtime'] = array('between',array($get['begintime3'],$get['endtime']));
		$condition1['mid'] = array('eq',$v1);
		$condition7['regtime'] = array('between',array($get['begintime3'],$get['endtime']));
		$condition7['mid'] = array('eq',$v1);
        $dtzc = M('register_log')->where($condition)->order(C('DB_PREFIX').'register_log.id desc')->count(); //取得总记录数
        $stzc = M('register_log')->where($condition1)->order(C('DB_PREFIX').'register_log.id desc')->count(); //取得总记录数
		$qthy = M('login_log')->where($condition7)->order(C('DB_PREFIX').'login_log.id desc')->count(); //取得总记录数

	  foreach($arr as $val){
		$count +=$val;
	   }
   	    $list[$k]['money'] = $list[$k]['money'];
	    $list[$k]['zong'] = $zong;
	    $list[$k]['tong'] = $count;
		$list[$k]['dtzc'] = $dtzc;
		$list[$k]['stzc'] = $stzc;
		$list[$k]['qthy'] = $qthy;
		$list[$k]['yu'] = $count - ($list[$k]['fid'] + $list[$k]['jump']);
      }
		
		
		
		
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','渠道统计');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
    }
    public function qudao_xiaoguo(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mid_sucai');
        $totalcount = $model->count();
      

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount ; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('search'=>'' . $get['search']); //加其他的参数
        $limit = $ShowPage->OffSet();

   
        $list = $model->order('id desc')->limit($limit)->select();


        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','广告效果');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
	
        $this->display();
    }
	
    public function qudao_sucai_add(){
		
    	$model = M('mid_sucai');
        
        $list = $model->max('mid');
        if(empty($list)){
                $arr['mid'] = 1;
        }else{
                $arr['mid'] = $list + 1;
        }

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加广告素材');
        $this->assign('act','qudao_sucai_insert');
        $this->assign('vo',$arr);
		$this->display();
		

    }
    public function qudao_sucai_insert(){
    	//获取POST值
    	$post = $_POST;
    	
        $post['addtime'] = strtotime($post['addtime']);
		
    	$model = M('mid_sucai');
        //判断链接是否已经添加
        $qdcount = $model->where("mid='{$post['mid']}' or urlname='{$post['urlname']}'")->count();
        
        if($qdcount>0){
		$this->assign('jumpUrl',U('qudao_sucai_add'));
		$this->error('渠道MID或渠道名称已存在！');	
        }
        
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('qudao_xiaoguo'));
		$this->success("添加成功");
    }
	public function qudao_genurl(){
    	$model = M('mid');

        $qdlist = $model->where("1=1")->select();
        $this->assign('qdlist',$qdlist);
		
    	$model = M('mid_sucai');
        $swfurl = $model->where("1=1")->select();
        $this->assign('swfurl',$swfurl);		
		
		
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','推广广告链接生成');
        $this->assign('act','qudao_genurl_insert');
        //$this->assign('vo',$arr);
		$this->display();
    }
	public function qudao_edit(){
		$id = $_GET['id'];

    	$model = M('mid');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加渠道信息');
        $this->assign('act','qudao_modify');
        $this->assign('vo',$list);
		$this->display();
    }

    public function qudao_modify(){
    	//获取POST值
    	$p = $_POST;
		
	    if($p['password']){
        $p['password'] = md5($p['mid'].$p['password']);
        }
   		$model = M('mid');
        //更新数据
		
        $model->save($p);

        //成功跳转
        $this->assign('jumpUrl',U('qudao'));
        $this->success("修改成功！");
    }
	

   
}