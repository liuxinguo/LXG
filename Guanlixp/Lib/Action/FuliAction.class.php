<?php
class FuliAction extends CommonAction
{
	var $pagecount = 20;
	
	
 /**
    +----------------------------------------------------------
    * 福利任务
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function flrw(){
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('game');
        $totalcount = $model->order('id desc')->count();

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('game');
        $limit = $ShowPage->OffSet();
		
        $list = $model->order('id desc')->limit($limit)->select();

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','游戏任务状态');
        $this->assign('list',$list);
        $this->assign('act','game_update');
        //$this->assign('get', $get);
        $this->display();
    }
    /**
    +----------------------------------------------------------
    * 首冲任务
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function scrw(){
       $model = M('scrw_list');
        $list = $model->alias('glist')->join(C('DB_PREFIX').'game game on game.id=glist.gid')->field('game.gamename,glist.*')->order('gid DESC')->select();
        $this->assign('countnum',count($list));
        $this->assign('act_title','首冲福利管理');
        $this->assign('list',$list);
        $this->display();
    }
   public function scrw_add(){
	    $post = array_change_key_case($_REQUEST);
        $model = M('game');
    	$gamelist = $model->field('id,tag,gamename')->where("id=%d",$post['gid'])->select();
		
        $this->assign('gamelist',$gamelist);
        $this->assign('act_title','添加首冲福利信息');
        $this->assign('act','scrw_insert');
		$this->display();
    }
    public function scrw_insert(){
    	$post = array_change_key_case($_REQUEST);
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $post['kstime'] = strtotime($post['kstime']);
        $post['jstime'] = strtotime($post['jstime']);

		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();

    	$model = M('scrw_list');
        $qdcount = $model->where("gid=%d",$post['gid'])->count();
        if($qdcount>0){
		$this->assign('jumpUrl',U('scrw'));
		$this->error('对应的游戏首冲信息已存在！');	
        }
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();
        //成功跳转
		$this->assign('jumpUrl',U('scrw'));
        $this->success('首冲信息添加成功！');
    }
    public function scrw_edit(){
		
    	$gid  = $_GET['gid'];
    	$model = M('game');
    	$gamelist = $model->field('id,tag,gamename')->where('id=%d',$gid)->select();
        $this->assign('gamelist',$gamelist);
		
    	$model = M('scrw_list');
        $vo = $model->where("gid=%d",$gid)->find();
		if(empty($vo)){
		
			redirect(U('scrw_add',array('gid'=>$gid)));
			
		}
	
        $this->assign('act_title','编辑首冲信息');
        $this->assign('act','scrw_modify');
        $this->assign('vo123',$vo);
        $this->display();
    }
	
    public function scrw_modify(){
		
        $post = array_change_key_case($_REQUEST);
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $post['kstime'] = strtotime($post['kstime']);
        $post['jstime'] = strtotime($post['jstime']);
		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();

    	$model = M('scrw_list');
        $qdcount = $model->where("gid=%d",$post['gid'])->count();
        if($qdcount<1){
		$this->assign('jumpUrl',U('scrw'));
		$this->error('对应的游戏首冲信息不存在！gid='.$post['gid'], U('scrw'));	
        }
        $model->create();
        $model->save($post);
		
	
		
        $this->success('首冲信息修改成功！');
    }
	
	
	   public function scrw_del(){
                  $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("scrw_list")->execute('DELETE FROM __TABLE__ where `gid` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('scrw'));
            $this->success($say);
            }
       }	
	   
 /**
    +----------------------------------------------------------
    * 游戏管理
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function djrw_list(){
		$post = array_change_key_case($_REQUEST);
     
        //加载分页类
        import ( "@.ORG.ShowPage" );

		$model = M('djrw_list');
		if($post['gid']){
            $totalcount = $model->where("gid=%d",$post['gid'])->order('id desc')->count();
        }else{
            $totalcount = $model->order('gid desc')->count();
        }
  
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('djrw_list');
        $limit = $ShowPage->OffSet();
		
        if($post['gid']){
            $list = $model->alias('glist')->join(C('DB_PREFIX').'game game on game.id=glist.gid')->field('game.gamename,game.tag,glist.*')->where("glist.gid=%d",$post['gid'])->order('gid DESC')->limit($limit)->select();
        }else{
           $list = $model->alias('glist')->join(C('DB_PREFIX').'game game on game.id=glist.gid')->field('game.gamename,game.tag,glist.*')->order('gid DESC')->limit($limit)->select();
        }

        $this->assign('gid',$post['gid']);
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','等级任务列表');
        $this->assign('list',$list);
        $this->assign('act','game_update');
        //$this->assign('get', $get);
        $this->display();
    }
   public function djrw_add(){
	    $post = array_change_key_case($_REQUEST);
        $model = M('game');
		
		 if($post['gid']){
         $gamelist = $model->field('id,tag,gamename')->where("id=%d",$post['gid'])->select();
        }else{
         $gamelist = $model->field('id,tag,gamename')->select();
        }

        $this->assign('gamelist',$gamelist);
        $this->assign('act_title','添加等级任务信息');
        $this->assign('act','djrw_insert');
		$this->display();
    }
    public function djrw_insert(){
    	$post = array_change_key_case($_REQUEST);
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);

		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();

    	$model = M('djrw_list');
        $qdcount = $model->where("gid=%d and dj=%d",$post['gid'],$post['dj'])->count();
        if($qdcount>0){
		 $this->assign('jumpUrl', '/');
         $this->error('对应的游戏等级任务已存在！','javascript:url_return();','0','3000');
	
        }
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();
        //成功跳转
		$this->assign('jumpUrl',U('djrw_list',array('gid'=>$post['gid'])));
        $this->success('首冲信息添加成功！');
    }
    public function djrw_edit(){
		
    	$id  = $_GET['id'];

    	$model = M('djrw_list');
        $vo = $model->where("id=%d",$id)->find();
		
        $model = M('game');
    	$gamelist = $model->field('id,tag,gamename')->where('id=%d',$vo['gid'])->select();
        $this->assign('gamelist',$gamelist);
	
        $this->assign('act_title','编辑首冲信息');
        $this->assign('act','djrw_modify');
        $this->assign('vo123',$vo);
        $this->display();
    }
	
    public function djrw_modify(){
		
        $post = array_change_key_case($_REQUEST);
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();

    	$model = M('djrw_list');
        $qdcount = $model->where("gid=%d",$post['gid'])->count();
        if($qdcount<1){
		$this->assign('jumpUrl',U('djrw'));
		$this->error('对应的游戏等级信息不存在！', U('djrw'));	
        }
        $model->create();
        $model->save($post);
		
	
		$this->assign('jumpUrl',U('djrw_list',array('gid'=>$post['gid'])));
        $this->success('首冲信息修改成功！');
    }
	   public function djrw_del(){
                  $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("djrw_list")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('djrw_list'));
            $this->success($say);
            }
       }	
 /**
    +----------------------------------------------------------
    * 游戏管理
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function danbirw_list(){
		$post = array_change_key_case($_REQUEST);
     
        //加载分页类
        import ( "@.ORG.ShowPage" );

		$model = M('fanli_list');
		
        $totalcount = $model->order('shuzhi ASC')->count();
       
  
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('danbirw_list');
        $limit = $ShowPage->OffSet();
		
        
        $list = $model->order('shuzhi ASC')->limit($limit)->select();
       
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','单笔返利列表');
        $this->assign('list',$list);
        $this->assign('act','game_update');
        //$this->assign('get', $get);
        $this->display();
	}	
	
   public function danbirw_add(){

        $this->assign('act_title','添加单笔返利信息');
        $this->assign('act','danbirw_insert');
		$this->display();
    }
	
	
    public function danbirw_insert(){
    	$post = array_change_key_case($_REQUEST);
 
    	$model = M('fanli_list');
        $qdcount = $model->where("shuzhi=%d",$post['shuzhi'])->count();
        if($qdcount>0){
		 $this->assign('jumpUrl', '/');
         $this->error('对应的单笔数已存在！','javascript:url_return();','0','3000');
	
        }
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();
        //成功跳转
		$this->assign('jumpUrl',U('danbirw_list'));
        $this->success('信息添加成功！');
    }
	
	    public function danbirw_edit(){
		
    	$id  = $_GET['id'];

    	$model = M('fanli_list');
        $vo = $model->where("id=%d",$id)->find();
		
	
        $this->assign('act_title','编辑单笔信息');
        $this->assign('act','danbirw_modify');
        $this->assign('vo',$vo);
        $this->display();
    }
	
    public function danbirw_modify(){
		
        $post = array_change_key_case($_REQUEST);
     
    	$model = M('fanli_list');
        $qdcount = $model->where("id=%d",$post['id'])->count();
        if($qdcount<1){
		$this->assign('jumpUrl',U('danbirw_list'));
		$this->error('对应的游戏等级信息不存在！', U('djrw_edit',array('id'=>$post['id'])));
        }
        $model->create();
        $model->save($post);
		
	
		$this->assign('jumpUrl',U('danbirw_list'));
        $this->success('信息修改成功！');
    }
		
	   public function danbirw_del(){
                  $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("fanli_list")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('danbirw_list'));
            $this->success($say);
            }
       }
 /**
    +----------------------------------------------------------
    * 游戏管理
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function viprw_list(){
		$post = array_change_key_case($_REQUEST);
     
        //加载分页类
        import ( "@.ORG.ShowPage" );

		$model = M('vip_list');
		
        $totalcount = $model->order('level ASC')->count();
       
  
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('danbirw_list');
        $limit = $ShowPage->OffSet();
		
        
        $list = $model->order('level ASC')->limit($limit)->select();
       
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','vip等级返利列表');
        $this->assign('list',$list);
        $this->assign('act','game_update');
        //$this->assign('get', $get);
        $this->display();
    }	
	
   public function viprw_add(){

        $this->assign('act_title','添加VIP等级信息');
        $this->assign('act','viprw_insert');
		$this->display();
    }
	
	
    public function viprw_insert(){
    	$post = array_change_key_case($_REQUEST);
 
    	$model = M('vip_list');
        $qdcount = $model->where("level=%d",$post['level'])->count();
        if($qdcount>0){
		 $this->assign('jumpUrl', '/');
         $this->error('对应的VIP等级已存在！','javascript:url_return();','0','3000');
	
        }
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();
        //成功跳转
		$this->assign('jumpUrl',U('viprw_list'));
        $this->success('信息添加成功！');
    }
	
	    public function viprw_edit(){
		
    	$id  = $_GET['id'];

    	$model = M('vip_list');
        $vo = $model->where("id=%d",$id)->find();
		
	
        $this->assign('act_title','编辑VIP等级信息');
        $this->assign('act','viprw_modify');
        $this->assign('vo',$vo);
        $this->display();
    }
	
    public function viprw_modify(){
		
        $post = array_change_key_case($_REQUEST);
     
    	$model = M('vip_list');
        $qdcount = $model->where("id=%d",$post['id'])->count();
        if($qdcount<1){
		$this->assign('jumpUrl',U('viprw_list'));
		$this->error('对应的VIP等级信息不存在！', U('viprw_edit',array('id'=>$post['id'])));
        }
        $model->create();
        $model->save($post);
		
	
		$this->assign('jumpUrl',U('viprw_list'));
        $this->success('信息修改成功！');
    }
		
	   public function viprw_del(){
                  $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("vip_list")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('viprw_list'));
            $this->success($say);
            }
       }
	
	
	 /**
    +----------------------------------------------------------
    * 任务开关
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
	  public function rw_kg(){   
		$post = array_change_key_case($_REQUEST);

	
    	$model = M('game');
        $model->create();
        $Result = $model->save($post);
		 if($Result==false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('flrw'));
            $this->success('信息修改成功！');
            }	
       
       }
	
/**
    +-首冲充值记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
	    public function sc_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
		
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
	   $begintime = $get['begintime'];
	   $endtime   = $get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
           $condition[C('DB_PREFIX').'pay_sc.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_sc.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_sc.sid'] = array('eq',$get['sid']);
       }
	   

       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_sc.uname'] = array('eq',$get['uname']);
       }
       
   

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_sc');
       $condition[C('DB_PREFIX').'pay_sc.status'] = array('eq','1');
       $condition[C('DB_PREFIX').'pay_sc.process'] = array('eq','1,1,1');
	   $condition[C('DB_PREFIX').'pay_sc.paytype'] = array('eq','1');
       
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_sc.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'uid'=>$get['uid'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
        $limit = $ShowPage->OffSet();  
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_sc.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_sc.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."mid on ".C('DB_PREFIX')."pay_sc.operater=".C('DB_PREFIX')."mid.mid")->
		field(C('DB_PREFIX')."pay_sc.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."mid.mname")->
		where($condition)->order(C('DB_PREFIX').'pay_sc.id desc')->limit($limit)->select();

		$ShowPage->LinkUrl = U('sc_log');

 	    $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('money'));
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','首冲任务领取记录');
        $this->assign('get',$get);
		$this->display();
 
    }
	
/**
    +-等级任务领取记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
	    public function dj_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
		
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
	   $begintime = $get['begintime'];
	   $endtime   = $get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
           $condition[C('DB_PREFIX').'pay_dj.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_dj.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_dj.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_dj.uname'] = array('eq',$get['uname']);
       }
       
          if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_dj.paytype'] = array('eq',$get['paytype']);
       }
	   
       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_dj');
       $condition[C('DB_PREFIX').'pay_dj.status'] = array('eq','1');
       $condition[C('DB_PREFIX').'pay_dj.process'] = array('eq','1,1,1');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_dj.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'uid'=>$get['uid'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
        $limit = $ShowPage->OffSet();
		$ShowPage->LinkUrl = '?';   
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_dj.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_dj.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."mid on ".C('DB_PREFIX')."pay_dj.operater=".C('DB_PREFIX')."mid.mid")->
		field(C('DB_PREFIX')."pay_dj.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."mid.mname")->
		where($condition)->order(C('DB_PREFIX').'pay_dj.id desc')->limit($limit)->select();

		$ShowPage->LinkUrl = U('dj_log');

 	    $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('money'));
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','等级任务领取记录');
        $this->assign('get',$get);
		$this->display();
 
    }
	
	
/**
    +-返利任务领取记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
	    public function fl_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
		         
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
           $condition['smtime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
  
       
       //查询用户名
       if($get['uname']){
           $condition['uname'] = array('eq',$get['uname']);
       }
 
       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_fanli');
       $condition['status'] = array('eq','1');
       $condition['process'] = array('eq','1,1,1');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order('id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'uid'=>$get['uid'],'uname'=>$get['uname']); //加其他的参数
        $limit = $ShowPage->OffSet();
        $list = $model->where($condition)->order('id desc')->limit($limit)->select();
		$ShowPage->LinkUrl = U('fl_log');

 	    $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('money'));
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','等级任务领取记录');
        $this->assign('get',$get);
		$this->display();
 
    }
	

    public function znq(){
        $get = array_change_key_case($_REQUEST);
            //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
           $condition['smtime'] = array('between',array($get['begintime'],$get['endtime']));
        }
 
       if($get['name']){
           $condition['name'] = array('eq',$get['name']);
       }
 
       if($get['paytype']){
           $condition['paytype'] = array('eq',$get['paytype']);
       }
       
       if($get['wid']){
           $condition['wid'] = array('eq',$get['wid']);
       }
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('prize');
        
        $totalcount = $model->where($condition)->order('id ASC')->count();
       
  
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
        $ShowPage->LinkUrl = U('znq');
        $limit = $ShowPage->OffSet();
        
        
        $list = $model->where($condition)->order('id ASC')->limit($limit)->select();
       
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','周年庆获奖列表');
        $this->assign('list',$list);
        $this->assign('get', $get);
        $this->display();
    }   

    public function znq_del(){
                  $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("prize")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {    
            $this->error('操作失败');    
            }else{
            $this->assign('jumpUrl',U('znq'));
            $this->success($say);
            }
       }
	
   
}