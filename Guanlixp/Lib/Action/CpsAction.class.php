<?php
class CpsAction extends CommonAction
{
	var $pagecount = 20;
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
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        
       if($get['mname']){
          $mname ="WHERE mname ='{$get['mname']}'";  
       }
       //查询时间
       $begintime=$get['begintime'];
       $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
        $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');    
        }else{
         $paytime      ="BETWEEN ".$get['begintime']." AND ".$get['endtime'];
         $registertime ="BETWEEN ".$get['begintime']." AND ".$get['endtime']; 
        }
   //查询游戏
       if($get['gid']){
            $gid      ="AND gid=".$get['gid'];
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
            $sid      ="AND sid=".$get['sid'];
       }
            $paysql      ="WHERE ai_pay_togame.paytime $paytime $gid $sid";
            $registersql ="WHERE ai_register_log.regtime  $registertime  $gid $sid"; 
            $neichongsql ="WHERE ai_mid_neichong.successtime  $registertime  $gid $sid"; 
    
    
        $Model = new Model ();
    
        $list =  $Model->query ( "SELECT ai_mid_qudao.* FROM  ai_mid_qudao $mname ORDER BY id  DESC" );
 
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount ; //每页显示记录
        $ShowPage->Total = count( $list); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'mname'=>'' . $get['mname'],'gid'=>'' . $get['gid'],'sid'=>'' . $get['sid']); //加其他的参数
        $ShowPage->LinkUrl = U('qudao_tongji');
        $limit = $ShowPage->OffSet();
 
        $list =  $Model->query ( "SELECT F.*,IFNULL(E.paycs,0) paycs,IFNULL(E.moneysum,0) moneysum,IFNULL(E.regcs,0) regcs,IFNULL(E.regip,0) regip,IFNULL(E.moneysum*F.bili,0) ticheng,IFNULL(B.ncmoney,0) ncmoney,IFNULL(IFNULL(E.moneysum*F.bili,0)-B.ncmoney,IFNULL(E.moneysum*F.bili,0)) yingde
FROM ai_mid_qudao 
F
LEFT JOIN (SELECT MID,SUM(".C('DB_PREFIX')."mid_neichong.money)*0.35 ncmoney FROM ".C('DB_PREFIX')."mid_neichong $neichongsql GROUP BY MID) AS B
ON F.id=B.mid
LEFT JOIN( 
  SELECT qid,IFNULL(SUM(paycs),0) paycs,IFNULL(SUM(moneysum),0) moneysum,IFNULL(SUM(regcs),0) regcs,IFNULL(SUM(regip),0) regip
    FROM 
        (
        SELECT ai_mid.mid,ai_mid.qid,IFNULL(A.paycs,0) paycs,IFNULL(A.moneysum,0) moneysum,IFNULL(C.regcs,0) regcs,IFNULL(C.regip,0) regip
        FROM  ai_mid
            LEFT JOIN 
            (
                SELECT ai_pay_togame.tid ,COUNT(ai_pay_togame.id)  paycs,SUM(ai_pay_togame.payamount) moneysum FROM  ai_pay_togame $paysql GROUP BY ai_pay_togame.tid 
             ) AS A
            ON ai_mid.mid=A.tid
            LEFT JOIN 
            ( 
                SELECT MID,COUNT(".C('DB_PREFIX')."register_log.id) regcs,COUNT(DISTINCT ".C('DB_PREFIX')."register_log.regip) regip FROM ".C('DB_PREFIX')."register_log $registersql GROUP BY MID
             ) AS C
            ON ai_mid.mid=C.mid
            
         ) AS D GROUP BY qid
          
     ) AS E
        
ON F.id=E.qid
$mname
ORDER BY id  DESC
LIMIT $limit
 " );
    
    $zf=$Model->query ( "SELECT F.*,IFNULL(SUM(B.ncmoney),0) sumncmoney,IFNULL(SUM(E.moneysum),0) summoneysum,IFNULL(SUM(IFNULL(E.moneysum*F.bili,0)),0) sumticheng,IFNULL(SUM(IFNULL(IFNULL(E.moneysum*F.bili,0)-B.ncmoney,IFNULL(E.moneysum*F.bili,0))),0) sumyingde
FROM ai_mid_qudao 
F
LEFT JOIN (SELECT MID,SUM(".C('DB_PREFIX')."mid_neichong.money)*0.35 ncmoney FROM ".C('DB_PREFIX')."mid_neichong $neichongsql GROUP BY MID) AS B
ON F.id=B.mid
LEFT JOIN( 
  SELECT qid,IFNULL(SUM(paycs),0) paycs,IFNULL(SUM(moneysum),0) moneysum,IFNULL(SUM(regcs),0) regcs,IFNULL(SUM(regip),0) regip
    FROM 
        (
        SELECT ai_mid.mid,ai_mid.qid,IFNULL(A.paycs,0) paycs,IFNULL(A.moneysum,0) moneysum,IFNULL(C.regcs,0) regcs,IFNULL(C.regip,0) regip
        FROM  ai_mid
            LEFT JOIN 
            (
                SELECT ai_pay_togame.tid ,COUNT(ai_pay_togame.id)  paycs,SUM(ai_pay_togame.payamount) moneysum FROM  ai_pay_togame $paysql GROUP BY ai_pay_togame.tid 
             ) AS A
            ON ai_mid.mid=A.tid
            LEFT JOIN 
            ( 
                SELECT MID,COUNT(".C('DB_PREFIX')."register_log.id) regcs,COUNT(DISTINCT ".C('DB_PREFIX')."register_log.regip) regip FROM ".C('DB_PREFIX')."register_log $registersql GROUP BY MID
             ) AS C
            ON ai_mid.mid=C.mid
            
         ) AS D GROUP BY qid
          
     ) AS E
        
ON F.id=E.qid
$mname
ORDER BY id  DESC
LIMIT $limit
        ");
        
        
        $this->assign('zf',$zf[0]);
        
        $this->assign('get',$get);
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','会长冲值查询');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
    }
  /**
    +----------------------------------------------------------
    * 会长管理
    +----------------------------------------------------------
	* @author	st
	* @version	2015-05-03 08:04:09
    +----------------------------------------------------------
    */
    public function qudao_huizhang(){
 //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );
		
       if($get['search']){
          $search ="WHERE mname LIKE '%".$get['search']."%'";  
       }
	
	    $Model = new Model ();
    
        $list =  $Model->query ( "SELECT ai_mid_qudao.* FROM  ai_mid_qudao $search ORDER BY id  DESC" );
 
		
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount ; //每页显示记录
        $ShowPage->Total = count( $list); //取得总记录数
        $ShowPage->LinkAry = array('search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('qudao_tongji');
        $limit = $ShowPage->OffSet();


	      $list =  $Model->query ( "SELECT F.*,IFNULL(E.paycs,0) paycs,IFNULL(E.moneysum,0) moneysum,IFNULL(E.regcs,0) regcs,IFNULL(E.regip,0) regip,IFNULL(E.moneysum/E.regip,0) regcb
FROM ai_mid_qudao F
LEFT JOIN
(
	SELECT qid,IFNULL(SUM(paycs),0) paycs,IFNULL(SUM(moneysum),0) moneysum,IFNULL(SUM(regcs),0) regcs,IFNULL(SUM(regip),0) regip
	FROM 
		(
		SELECT ai_mid.mid,ai_mid.qid,IFNULL(A.paycs,0) paycs,IFNULL(A.moneysum,0) moneysum,IFNULL(C.regcs,0) regcs,IFNULL(C.regip,0) regip
		FROM  ai_mid
		 LEFT  JOIN
	          (
			SELECT ai_pay_togame.tid ,COUNT(ai_pay_togame.id)  paycs,SUM(ai_pay_togame.payamount) moneysum FROM  ai_pay_togame  WHERE tid IS NOT NULL GROUP BY  ai_pay_togame.tid ) AS A
			ON ai_mid.mid=A.tid
			LEFT JOIN (SELECT MID,COUNT(".C('DB_PREFIX')."register_log.id) regcs,COUNT(DISTINCT ".C('DB_PREFIX')."register_log.regip) regip FROM ".C('DB_PREFIX')."register_log GROUP BY MID) AS C
			ON ai_mid.mid=C.mid
		 ) AS D
	 GROUP BY qid) AS E
ON F.id=E.qid
$search
ORDER BY id  DESC
LIMIT $limit
 " );
	
		
	
        $this->assign('search',$get['search']);
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','渠道统计');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
    }
   /**
    +----------------------------------------------------------
    * 渠道查询
    +----------------------------------------------------------
	* @author	st
	* @version	2015-05-03 08:04:09
    +----------------------------------------------------------
    */
    public function qudao_url(){
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
		$ShowPage->LinkUrl = U('qudao');
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
		$ShowPage->LinkUrl = U('qudao_xiaoguo');
        $limit = $ShowPage->OffSet();

   
        $list = $model->order('id desc')->limit($limit)->select();
 
       foreach($list as $k=>$v){
		
	    $condition['swfid'] = array('eq',$list[$k]['mid']);

        $zcs = M('register_log')->where($condition)->order(C('DB_PREFIX').'register_log.id desc')->count(); //取得总记录数
        $list[$k]['zcs'] = $zcs;
      }
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
	
	public function qudao_sucai_edit(){
		$id = $_GET['id'];

    	$model = M('mid_sucai');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加渠道信息');
        $this->assign('act','qudao_sucai_modify');
        $this->assign('vo',$list);
		$this->display();
    }

    public function qudao_sucai_modify(){
    	//获取POST值
    	$p = $_POST;
		
   		$model = M('mid_sucai');
        //更新数据
		
        $model->save($p);

        //成功跳转
        $this->assign('jumpUrl',U('qudao'));
        $this->success("修改成功！");
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

        $model = M('mid_qudao');
        $list = $model->where("id=$id")->find();
        
    
        $this->assign('act_title','修改渠道信息');
        $this->assign('act','qudao_modify');
        $this->assign('vo',$list);
        $this->display();
    }

    public function qudao_modify(){
        //获取POST值
        $post = $_POST;
        
        if($post['password']){
        $p['password'] = md5($post['password']);
        }
        if($post['twopassword']){
                $p['twopassword'] = $post['twopassword'];
        }
        
        $p['payee'] = $post['payee'];
        $p['cardno'] = $post['cardno'];
        $p['bankaccount'] = $post['bankaccount'];
        $p['phone'] = $post['phone'];
        $p['email'] = $post['email'];
        $p['check'] = $post['check'];
        $p['name'] = $post['name'];
        $p['mname'] = $post['mname'];
        $p['bili'] = $post['bili'];
        $p['status'] = $post['status'];
        $p['id'] = $post['id'];
        
        $model = M('mid_qudao');
        //更新数据
        
        $model->save($p);
        //成功跳转
        $this->assign('jumpUrl',U('qudao_tongji'));
        $this->success("修改成功！");
    }
	
/**
    +-工会首冲充值记录
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
	    public function qudao_sc(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
  
		$hunuser = M('mid')->order('id asc')->select();
        $this->assign('hunuser',$hunuser);
		
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
        
       //查询类型
       if($get['mid']){
           $condition[C('DB_PREFIX').'pay_sc.operater'] = array('eq',$get['mid']);
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
       
       $condition[C('DB_PREFIX').'pay_sc.process'] = array('eq','1');
       
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_sc.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'uid'=>$get['uid'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
        $limit = $ShowPage->OffSet();
		$ShowPage->LinkUrl = '?';   
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_sc.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_sc.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."mid on ".C('DB_PREFIX')."pay_sc.operater=".C('DB_PREFIX')."mid.mid")->
		field(C('DB_PREFIX')."pay_sc.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."mid.mname")->
		where($condition)->order(C('DB_PREFIX').'pay_sc.id desc')->limit($limit)->select();

		$ShowPage->LinkUrl = U('qudao_sc');
		
		
		
 	    $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('money'));
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','首冲成功记录');
        $this->assign('get',$get);
        if(!$get['daochu']){
		$this->display();
		}else{
	    $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_sc.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_sc.sid=".C('DB_PREFIX')."game_server.sid")->
		join(C('DB_PREFIX')."mid on ".C('DB_PREFIX')."pay_sc.operater=".C('DB_PREFIX')."mid.mid")->
		field(C('DB_PREFIX')."pay_sc.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."mid.mname")->
		where($condition)->order(C('DB_PREFIX').'pay_sc.id desc')->limit($ShowPage->Total)->select();
	  foreach($list as $k=>$v){
	    $l[$k]['id']=   $list[$k]['id'];
		$l[$k]['paysn']=$list[$k]['paysn'];
		$l[$k]['name']= $list[$k]['uname'];
		$l[$k]['money']=$list[$k]['money'];
		$l[$k]['gid']=  $list[$k]['gamename'];
		$l[$k]['sid']=  $list[$k]['sid']."服";
		$l[$k]['time']= date('Y-m-d H:i:s',$list[$k]['paytime']);
		$l[$k]['ip']=   $list[$k]['payip'];
		$l[$k]['mid']=  $list[$k]['mname'];
	
		
      } 
	     if($get['mid'] && $get['gid']){
		    $gname = $begintime."至".$endtime."日".$list[0]['mname'].'渠道-'.$list[0]['gamename'];
		 }else if($get['mid']){
			$gname = $begintime."至".$endtime."日".$list[0]['mname'].'渠道';
		 }else if($get['gid']){
			$gname = $begintime."至".$endtime.'日渠道'.$list[0]['gamename'];
		 }else{
			$gname = $begintime."至".$endtime."日渠道";
	     }
		
		$this->exportexcel($l,array('id','订单号','账户','游戏币','游戏名称','服务器名称','充值时间','充值IP','操作渠道'),$gname."-首冲统计");
		}
 
    }
	
	
    function scpay(){
		
        $this->assign('act','scpay_add');
		$this->display();
	 }
	   
    function scpay_add(){


        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        $get['mid']=$_SESSION['mid'];
		
	
		$get['gid'] ="101";
		$get['sid'] ="1";
		
		
		
		//取登陆帐户信息
		$model = M('member_info');
        $user  = $model->where("uname='{$get['uname']}'")->find();
		$payorder['uid']    = $user['uid'];
		$payorder['uname']  = $user['uname'];
	    $payorder['paysn']  = date ( 'Ymd' ) . date ( 'His' ) ;
		$payorder['paytime']   = time();
	    $payorder['successtime']   = time();
		$payorder['payip']    =     get_client_ip();
		$payorder['operater'] = $user['mid']; 
		$payorder['process']  = 0;
		
        //设置平台币转换
	    //获取充值游戏的充值配置
        $model = M('game');
        $paygame = $model->where("id={$get['gid']}")->find();
		$payorder['gamename'] = $paygame['gamename'];
        $payorder['gametag'] = $paygame['tag'];
        $payorder['unit'] = $paygame['unit'];  //金币元宝
        $payorder['rate'] = $paygame['rate']; //比例
		//首冲
		 $get['pay_amount'] = $paygame['sc'];
		 
        //计算游戏币：充值金额 x 比率 x 充值渠道折扣/100(折扣按百分比)
        $lastpaytogame = $get['pay_amount'] * $paygame['rate'];  //前面是1元=1平台币转换后

        //记录虚拟币使用
        $payorder['payamount'] = $lastpaytogame/$paygame['rate']; //除10人民币比例
        $payorder['money'] = $lastpaytogame;  //游戏币实际比例后

		$payorder['remark'] = '管理员'. session('adminname') .'通过工会后台为账号['.$payorder['uname'].']充值['.$payorder['payamount'].']元，获得'.$payorder['gamename'].'['. $payorder['money'].']'.$payorder['unit'];
		
      //获取服务器配置扩展信息
        $game_server = M('game_server');
        $server = $game_server->where("gid={$get['gid']} AND sid={$get['sid']} AND status=1")->find();
        //服务器扩展处理
        $server['extend'] = json_decode($server['extend'],true);
        
        $payorder['gameid'] = $server['extend']['gameid'];   
        $payorder['mid']    = $server['extend']['mid']; 
        $payorder['tag']    = $server['tag'];  
		$payorder['sb']     = session('adminname')."管理后台添加";
		$payorder['gid']    = $get['gid'];
		$payorder['sid']    = $server['extend']['mid']; 
		

        //产品通用接口充值游戏处理
        $import = import('Source.Game.'.$paygame['bs']);
        //判断是否加载成功
        if(!$import){
            $this->assign('jumpUrl', '/');
            $this->error("游戏充值接口加载失败！");
        }
		
        //初始化接口类
        $pay = new $paygame['bs'];
        //判断方法是否存在
        if(!method_exists($pay,'PayToGame')){
            $this->assign('jumpUrl', '/');
            $this->error("游戏充值接口操作方法不存在！");
        }
		
		
		
		
      
        //判断订单号有冲突另生成订单号
        $model = M('pay_sc');
        //判断订单号是否重复
        $paylog = $model->where("paysn='{$payorder['paysn']}'")->find();
         if($paylog){
              $payorder['paysn'] = date ( 'Ymd' ) . String::rand_string ( 1,5) . date ( 'His' ) . String::rand_string ( 1,5);
         }

        $data = $pay->PayToGame($payorder);

        if ($data['status'] == 1) {
		//更新数据库 成功
	        $payorder['process']  = 1;
			$payorder['status']   = 1;
            $model->add($payorder);

			
		//成功跳转
        $this->assign('jumpUrl', '');
		$this->success("首冲充值成功，请返回游戏查看", 'javascript:window.close();');

        }else{
		//写入默认失败
		 $model->add($payorder);
            //充值游戏失败
		$this->assign('jumpUrl','exchange.html');
		$this->error('首冲充值失败，错误代码：' . rtrim($data['status']) . ' - ' . rtrim($data['messages']) . '，请联系客服处理！');
        }

    }
	
/**
    * 导出数据为excel表格
    *@param $data    一个二维数组,结构如同从数据库查出来的数组
    *@param $title   excel的第一行标题,一个数组,如果为空则没有标题
    *@param $filename 下载的文件名
    *@examlpe 
    $stu = M ('User');
    $arr = $stu -> select();
    exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
*/
 function exportexcel($data=array(),$title=array(),$filename='report'){
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");  
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "GB2312",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);
            
        }
        echo implode("\n",$data);
    }
 }


public function qudao_yxqu_tj(){
 //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);

        $mid = M('mid_qudao')->order('id asc')->select();
        $this->assign('mid',$mid);

       $mid_tid = M('mid')->where("qid={$get['qid']}")->order('id asc')->select();
    
        foreach($mid_tid as $k => $v){
        if($k!=0){
        $tid .=',';
        }
        $tid .=$v['mid'];
        } 
        
       //查询游戏
       if($get['qid']){
            $lqid      ="AND mid IN(".$tid.")";
            $pqid      ="AND tid IN(".$tid.")";
       }
       //查询时间
       $begintime=$get['begintime'];
       $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
        $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');    
        }else{
         $paytime      ="BETWEEN ".$get['begintime']." AND ".$get['endtime'];
         $regtime      ="BETWEEN ".$get['begintime']." AND ".$get['endtime']; 
        }
      //查询游戏
       if($get['gid']){
            $gid      ="AND gid=".$get['gid'];
            $sgid      ="WHERE  F.gid=".$get['gid'];
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
            $paysql      ="WHERE sid  IS NOT NULL and paytime $paytime $gid $pqid";
            $regsql      ="WHERE sid>0 and regtime $regtime $gid $lqid"; 
        $Model = new Model ();
        $list =  $Model->query ( "SELECT F.gid,F.sid,F.gamename,F.servername,IFNULL(A.paycs,0) paycs,IFNULL(A.moneysum,0) moneysum,IFNULL(C.regcs,0) regcs,IFNULL(C.regip,0) regip
          FROM  ai_game_server
             F
               LEFT OUTER JOIN 
            (
                SELECT ai_pay_togame.gid ,ai_pay_togame.sid ,COUNT(ai_pay_togame.id)  paycs,SUM(ai_pay_togame.payamount) moneysum FROM  ai_pay_togame $paysql GROUP BY  ai_pay_togame.gid,ai_pay_togame.sid
             ) AS A ON F.gid=A.gid AND  F.sid=A.sid
            
            LEFT OUTER  JOIN 
            ( 
                SELECT gid,sid,COUNT(1) regcs,COUNT(DISTINCT ai_register_log.regip) regip FROM ai_register_log $regsql  GROUP BY gid,sid
             ) AS C ON C.gid=F.gid  AND  C.sid=F.sid
$sgid
ORDER BY gid desc,sid desc" );

        $this->assign('get',$get);
        $this->assign('act_title','会长冲值查询');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        if(!$get['daochu']){
        $this->display();
        }else{
        $qudaoid = M('mid_qudao')->where("id={$get['qid']}")->find();

        $this->exportexcel($list,array('gid','sid','游戏','区服','充值数量','充值总额','注册总数','去重注册'),$qudaoid['mname']."渠道-全区注册充值统计");
        }
    }


   
}
