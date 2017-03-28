<?php
class HunfuAction extends CommonAction
{
	var $pagecount = 20;
    protected $item;
    protected function _initialize()
    {
        parent::_initialize();
        $this->item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';
        $this->assign('item', $this->item);
    }
  /**
    +----------------------------------------------------------
    * 渠道列表
    +----------------------------------------------------------
	* @author	st
	* @version	2013-04-22 13:44:09
    +----------------------------------------------------------
    */
    public function hunfu(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mixserver_user');
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
		$ShowPage->LinkUrl = U('hunfu');
        $limit = $ShowPage->OffSet();

        if($get['search']){
            $list = $model->where("mname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }
		for($i=0;$i<$totalcount;$i++){
		
		   $a1= date('Y-m').'-01';
		   $a2= date('Y-m-d');
		   $begintime = strtotime($a1 . ' 00:00:00');
           $endtime = strtotime($a2 . ' 23:59:59');
		   $congzhiy['paytime'] = array('between',array($begintime,$endtime));
		   $congzhiy['mid'] = array('eq',$list[$i]['unid']);
		   $congzhiy['process'] = array('eq','1,1,1');
		   $list[$i]['yc'] = $zcs[$i] = number_format( M('mixserver_pay')->where($congzhiy)->order('id desc')->sum('payamount'),2,".","");// 月冲值
		   
           $zhuces['regtime'] = array('between',array($begintime,$endtime));
		   $zhuces['mid'] = array('eq',$list[$i]['unid']);
		   $list[$i]['yzhuce'] = M('mixserver_member')->where($zhuces)->count();// 月注册人数
		   
		   
		   
		   $begintime ="";
		   $congzhiy['paytime'] = array('between',array($begintime,$endtime));
		   $congzhiy['mid'] = array('eq',$list[$i]['unid']);
		   $list[$i]['zc'] = $zcs[$i] = number_format( M('mixserver_pay')->where($congzhiy)->order('id desc')->sum('payamount'),2,".","");// 总冲值
		   
		   $zhuces['regtime'] = array('between',array($begintime,$endtime));
		   $zhuces['mid'] = array('eq',$list[$i]['unid']);
		   $list[$i]['zzhuce'] = M('mixserver_member')->where($zhuces)->count();// 总注册人数
		
		
		}
	
		  
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','混服商列表');
        $this->assign('list',$list);
        $this->assign('act','hunfu_update');
        $this->display();
    }
	public function hunfu_add(){
    	$model = M('mixserver_user');
        
        $list = $model->max('id');
        if(empty($list)){
                $arr['id'] = 1;
        }else{
                $arr['id'] = $list + 1;
        }

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加渠道信息');
        $this->assign('act','hunfu_insert');
        $this->assign('vo',$arr);
		$this->display();
    }

	public function hunfu_edit(){
		$id = $_GET['id'];

    	$model = M('mixserver_user');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','混服用户基本信息修改');
        $this->assign('act','hunfu_modify');
        $this->assign('vo',$list);
		$this->display();
    }
	public function hunfu_editlj(){
		$id = $_GET['id'];

    	$model = M('mixserver_user');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','混服用户游戏通用连接修改');
        $this->assign('act','hunfu_modifylj');
        $this->assign('vo',$list);
		$this->display();
    }
    public function hunfu_modify(){
    	//获取POST值
    	$post = $_POST;
		
        $p['id'] = $post['id'];
        $p['unid'] = $post['unid'];
		$p['name'] = $post['name'];
		$p['url'] = $post['url'];
		$p['qq'] = $post['qq'];
		$p['tel'] = $post['tel'];
		$p['email'] = $post['email'];
		$p['title'] = $post['title'];
		$p['bank'] = $post['bank'];
		$p['bank_name'] = $post['bank_name'];
		$p['bank_account'] = $post['bank_account'];
		$p['loginkey'] = $post['loginkey'];
		$p['paykey'] = $post['paykey'];
		$p['ip'] = $post['ip'];
				
		$p['bili'] = $post['bili'];
		$p['status'] = $post['status'];
        $p['addtime'] = strtotime($post['addtime']);
	 if($post['password']){
        $p['password'] = md5($post['name'].$post['password']);
      }
   		$model = M('mixserver_user');
        //更新数据
		
        $model->save($p);

        //成功跳转
        $this->assign('jumpUrl',U('hunfu'));
        $this->success("修改成功！");
    }

   public function hunfu_modifylj(){
    	//获取POST值
    	$post = $_POST;
		
       
   		$model = M('mixserver_user');
        //更新数据
		
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('hunfu'));
        $this->success("修改成功！");
    }


    public function hunfu_insert(){
    	//获取POST值
    	$post = $_POST;
    	
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        $post['password']	=md5($post['mid'].$post['password']);
    	$model = M('mixserver_user');
        //判断链接是否已经添加
        $qdcount = $model->where("mid='{$post['mid']}' or mname='{$post['mname']}'")->count();
        
        if($qdcount>0){
		$this->assign('jumpUrl',U('hunfu_add'));
		$this->error('渠道MID或渠道名称已存在！');	
        }
        
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('hunfu'));
		$this->success("添加成功");
    }
  
	 	 public function hunfu_del(){
             $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("mixserver_user")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('hunfu'));
            $this->success($say);
            }
     }
   /**
    +----------------------------------------------------------
    * 混服商用户登陆记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
public function login_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询推广ID
        $mid = M('mixserver_login')->where("mid <> ''")->group('mid')->field('mid')->select();
        $this->assign('mid',$mid);
        
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
            $condition['time'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询游戏
       if($get['gid']){
           $condition['gameid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition['serverid'] = array('eq',$get['sid']);
       }

       //用户名
       if($get['uname']){
           $condition['username'] = array('eq',$get['uname']);
       }
       
       //推荐ID
       if($get['mid']){
	  
           $condition['mid'] = array('eq',$get['mid']);
       }
       
       //注册IP
       if($get['loginip']){
           $condition['ip'] = array('eq',$get['loginip']);
       }

 
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mixserver_login');
   
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'mixserver_login.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>'' . $get['gid'],'sid'=>'' . $get['sid'],'uid'=>'' . $get['uid'],'uname'=>'' . $get['uname'],'mid'=>'' . $get['mid'],'loginip'=>'' . $get['loginip'],'referer'=>'' . $get['referer'],'remark'=>''.$get['remark']); //加其他的参数
		$ShowPage->LinkUrl = U('login_log');
        $limit = $ShowPage->OffSet();
       //$list = $model->where($condition)->order('id desc')->limit($limit)->select();
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."mixserver_login.gameid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."mixserver_login.serverid=".C('DB_PREFIX')."game_server.sid")->
		field(C('DB_PREFIX')."mixserver_login.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername")->
		where($condition)->order(C('DB_PREFIX').'mixserver_login.id desc')->limit($limit)->select();
		
		
		
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总注册人数
        $this->assign('sumpay',$ShowPage->Total);
        $this->assign('act_title','混服登陆记录查询');
        $this->assign('get',$get);        
        $this->display();
    }
   /**
    +----------------------------------------------------------
    * 混服商用户注册记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
public function register_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询推广ID
        $mid = M('mixserver_member')->where("mid <> ''")->group('mid')->field('mid')->select();
        $this->assign('mid',$mid);
        
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
            $condition['regtime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询游戏
       if($get['gid']){
           $condition['gameid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition['serverid'] = array('eq',$get['sid']);
       }

       //用户名
       if($get['uname']){
           $condition['username'] = array('eq',$get['uname']);
       }
       
       //推荐ID
       if($get['mid']){
	  
           $condition['mid'] = array('eq',$get['mid']);
       }
       
       //注册IP
       if($get['loginip']){
           $condition['ip'] = array('eq',$get['loginip']);
       }
      
 
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mixserver_member');
   
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'mixserver_member.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>'' . $get['gid'],'sid'=>'' . $get['sid'],'uid'=>'' . $get['uid'],'uname'=>'' . $get['uname'],'mid'=>'' . $get['mid'],'memberip'=>'' . $get['memberip'],'referer'=>'' . $get['referer'],'remark'=>''.$get['remark']); //加其他的参数
		$ShowPage->LinkUrl = U('member_log');
        $limit = $ShowPage->OffSet();
       //$list = $model->where($condition)->order('id desc')->limit($limit)->select();
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."mixserver_member.gameid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."mixserver_member.serverid=".C('DB_PREFIX')."game_server.sid")->
		field(C('DB_PREFIX')."mixserver_member.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername")->
		where($condition)->order(C('DB_PREFIX').'mixserver_member.id desc')->limit($limit)->select();
		
		
		
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总注册人数
        $this->assign('sumpay',$ShowPage->Total);
        $this->assign('act_title','混服登陆记录查询');
        $this->assign('get',$get);        
        $this->display();
    }
	
 
   /**
    +----------------------------------------------------------
    * 混服商游戏直冲充值记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
	    public function pay_game_nei(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
		$hunuser = M('mixserver_user')->order('id asc')->select();
        $this->assign('hunuser',$hunuser);
		
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
	   $begintime=$get['begintime'];
	   $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           die(ShowMsg('结束时间不能小于开始时间！', 'javascript:history.back();'));
        }else{
            $condition[C('DB_PREFIX').'mixserver_pay.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['unid']){
           $condition[C('DB_PREFIX').'mixserver_pay.mid'] = array('eq',$get['unid']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'mixserver_pay.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'mixserver_pay.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'mixserver_pay.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'mixserver_pay.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('mixserver_pay');
       
       $condition[C('DB_PREFIX').'mixserver_pay.process'] = array('eq','1,1,1');
       
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'mixserver_pay.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'unid'=>$get['unid'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
        $ShowPage->LinkUrl = U('pay_game_nei');
		$limit = $ShowPage->OffSet();
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."mixserver_pay.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."mixserver_pay.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."mixserver_pay.paytype=".C('DB_PREFIX')."pay_type.id")->
	    join(C('DB_PREFIX')."mixserver_user on ".C('DB_PREFIX')."mixserver_pay.mid=".C('DB_PREFIX')."mixserver_user.unid")->
		field(C('DB_PREFIX')."mixserver_pay.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname,".C('DB_PREFIX')."mixserver_user.title")->
		where($condition)->order(C('DB_PREFIX').'mixserver_pay.id desc')->limit($limit)->select();
   

       for($i=0;$i<count($list);$i++){
		   $list[$i]['name'] = preg_replace('/'.$list[$i]['mid'].'/', '', $list[$i]['uname'], 1);// 总注册人数
		}
		
 	    $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','直冲成功记录');
        $this->assign('get',$get);
        
        if(!$get['daochu']){
		$this->display();
		}else{
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."mixserver_pay.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."mixserver_pay.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."mixserver_pay.paytype=".C('DB_PREFIX')."pay_type.id")->
		join(C('DB_PREFIX')."mixserver_user on ".C('DB_PREFIX')."mixserver_pay.mid=".C('DB_PREFIX')."mixserver_user.unid")->
		field(C('DB_PREFIX')."mixserver_pay.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname,".C('DB_PREFIX')."mixserver_user.title")->
		where($condition)->order(C('DB_PREFIX').'mixserver_pay.id desc')->limit($ShowPage->Total)->select();

	  foreach($list as $k=>$v){
	    $l[$k]['id']=   $list[$k]['id'];
		$l[$k]['paysn']=$list[$k]['paysn'];
		$l[$k]['name']= $list[$k]['pname'];
		$l[$k]['payamount']=$list[$k]['payamount'];
		$l[$k]['money']=$list[$k]['money'];
		$l[$k]['gid']=  $list[$k]['gamename'];
		$l[$k]['sid']=  $list[$k]['sid']."服";
		$l[$k]['time']= date('Y-m-d H:i:s',$list[$k]['paytime']);
		$l[$k]['ip']=   $list[$k]['payip'];
		$l[$k]['mid']=  $list[$k]['title'];
	
		
      } 
	     if($get['unid'] && $get['gid']){
		    $gname = $begintime."至".$endtime."日-".$list[0]['title'].'混服-'.$list[0]['gamename'];
		 }else if($get['unid']){
			$gname = $begintime."至".$endtime."日-".$list[0]['title'].'混服';
		 }else if($get['gid']){
			$gname = $begintime."至".$endtime.'日混服渠道'.$list[0]['gamename'];
		 }else{
			$gname = $begintime."至".$endtime."日混服渠道";
	     }
		
		exportexcel($l,array('id','订单号','账户','充值金额','游戏币','游戏名称','服务器名称','充值时间','充值IP','混服渠道'),$gname."-冲值统计");
		}
    }
	

 
}
?>