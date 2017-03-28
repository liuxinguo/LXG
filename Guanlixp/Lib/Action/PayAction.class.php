<?php

class PayAction extends CommonAction {
  //虚拟币充值记录
    public function plapay(){
       $get = array_change_key_case($_REQUEST);

                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
          $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition['paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       
       //查询用户名
       if($get['uname']){
           $condition['uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition['paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('mid_neichong');
     
       $condition['process'] = array('eq','2,2,2');
       $condition['pay_platform'] = array('eq','platform');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = 20; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order('id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay/plapay');
        $limit = $ShowPage->OffSet();
        $list = $model->where($condition)->order('id desc')->limit($limit)->select();
        
		$this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = $model->where($condition)->order('id desc')->sum('money');
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','平台币内冲记录');
        $this->assign('get',$get);
        
        $this->display();
    }
	
	
    public function plapay_add(){
			
        $this->assign('act_title','增加平台币');
        $this->assign('act','plapay_insert');
        $this->display();
	 }
	  
	  
    //平台币充值补单
    public function plapay_insert(){
      //获取POST值
        $post = array_change_key_case($_REQUEST);

        $paycurrency = M('member_info')->where("uname='{$post['uname']}'")->find(); 
        if(!$paycurrency){
			$this->error('用户名不存在，请检查后再充值！','javascript:history.go(-1)','0','3000');
        }
	   //写冲值定单
        $payorder['uname']        = $post['uname'];
        $payorder['paysn']        = date ( 'Ymd' ) . date ( 'His' );
        $payorder['payamount']    = $post['money']/10;
        $payorder['money']        = $post['money'];
        $payorder['paytime']      = time();
        $payorder['successtime']  = strtotime($post['lastlogintime']);
        $payorder['remark']       = '账号['.$post['uname'].']冲值后台手动游戏币['. $post['money'] .']';
        $payorder['process']      = '2,2,2';
        $payorder['status']       = '0';
        $payorder['payip']        = get_client_ip();
        $payorder['operater']     = session('adminname');
		$payorder['pay_platform'] = 'platform';
		$model= M('mid_neichong');
		$payokwrite = $model->add($payorder);
		
  
		 if(!$payokwrite){
			$this->error('冲值失败','javascript:history.go(-1)','0','3000');
        }

        $paycurrency['money'] += $post['money'];
        $updatemoney = M('member_info') ->where("uid={$paycurrency['uid']}")->save($paycurrency);
		   
		$this->success('虚拟币补单提交成功！' , U('pay/plapay',array('sn'=>$paysn)),0,5000);
        
	
    }
    //游戏充值补单
    public function bdgamepay(){

            //获取订单号
            $paysn = $this->_get('paysn');
            
            //查询订单日志
            $paylog = M('pay_log');
            $pay_log = $paylog->where("paysn='{$paysn}'")->find();
            if(!$pay_log){
			 $this->error('日志订单号不存在！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
       
            }
            
            //订单状态设置
            $updatepayorder['process'] = '1,1,1';
            $updatepayorder['status'] = '0';
            $updatepayorder['operater'] = session('adminname');;
            
            //日志订单不成功的更新为成功
            if($pay_log['process'] != '1,1,1'){
                //更新日志订单
                $pay_log_result = $paylog->where("paysn='{$pay_log['paysn']}'")->setField($updatepayorder);
                if(!$pay_log_result){
                    //订单失败提示
					$this->error('日志订单更新失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                }
            }
            
            //虚拟币订单
            $payok = M('pay_ok');
            $pay_ok = $payok->where("paysn='{$paysn}'")->find();
            if($pay_ok){
			
                //订单号存在,判断是否需要更新
                if($pay_ok['process'] != '1,1,1'){
                    //更新日志订单
                    $pay_ok_result = $payok->where("paysn='{$pay_log['paysn']}'")->setField($updatepayorder);
                    if(!$pay_ok_result){
                        //订单失败提示
						$this->error('虚拟币订单更新失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                    }
					
                }
				
            }else{
			
                //订单号不存在,插入订单号
                $payok->create();
                $pay_ok_insert = $payok->data($pay_log)->add();
                if(!$pay_ok_insert){
                    //订单失败提示
					$this->error('虚拟币订单插入失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                }
                //插入成功更新状态
                if($pay_log['gid'] == 1){
                    //充值虚拟币补单,状态为1,1,0
                    $updatepayok['process'] = '1,1,0';
                    $updatepayok['status'] = '0';
                    $updatepayok['remark'] = '补单';
                    $updatepayok['operater'] = session('adminname');;
                    $pay_ok_result = $payok->where("paysn='{$pay_log['paysn']}'")->setField($updatepayorder);
                    if(!$pay_ok_result){
                        //订单失败提示
						$this->error('虚拟币订单更新失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                    }
				$this->success('虚拟币补单提交成功！', 'javascript:window.close();');
                }else{
                    //充值游戏补单,状态为1,1,1
                    $updatepayok['process'] = '1,1,1';
                    $updatepayok['status'] = '0';
                    $updatepayok['remark'] = '补单';
                    $updatepayok['operater'] = session('adminname');;
                    $pay_ok_result = $payok->where("paysn='{$pay_log['paysn']}'")->setField($updatepayorder);
                    if(!$pay_ok_result){
                        //订单失败提示
						$this->error('虚拟币订单更新失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                    }
                }
            }
        
            //充值虚拟币处理
            if($pay_log['gid'] == 1){
                $this->bd_pay_to_ok($pay_ok);
            }else{
			
                //掉单充值信息
                $paytogame = M('pay_togame');
                $pay_togame = $paytogame->where("paysn='{$pay_log['paysn']}'")->find();
                if($pay_togame){
                    //订单号存在,补单充值到游戏

                    $this->bd_pay_to_game($pay_togame);
                }else{
				
                    //订单号不存在,插入订单
                    $paytogame->create();
                    $pay_togame_insert = $paytogame->data($pay_log)->add();
                    if(!$pay_togame_insert){
                        //订单失败提示
						$this->error('游戏订单插入失败！' , U('pay/payok',array('sn'=>$paysn)),0,5000);
                    }
					$this->success('游戏补单提交成功！', 'javascript:history.window.close();');
                }
            }
  
}	
	
    //补单充值到虚拟币

    public function bd_pay_to_ok($payorder){

        //判断订单状态
        if($payorder['process'] == '1,1,1'){
		$this->success('充值成功！',U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);

        }
                
        //写入充值虚拟货币
        $model = M('member_info');
        $paycurrency = $model->where("uid={$payorder['uid']}")->find();
        $paycurrency['money'] += $payorder['money'];
        $paycurrency['scores'] += $payorder['payamount'];
        $updatemoney = $model->where("uid={$payorder['uid']}")->save($paycurrency);
        if(!$updatemoney){
			$this->error('虚拟币更新失败！' , U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);
        }
        
        //更新订单信息
        $paylog = M('pay_log');
        $payorder['succtime'] = $_SERVER['REQUEST_TIME'];
        if(!$payorder['remark']){
            $payorder['remark'] = '补单';
        }
        $pay_log_result = $paylog->save($payorder);
        if(!$pay_log_result){
		$this->error('日志更新失败！' , U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);
        }

        //更新虚拟币成功记录
        $payok = M('pay_ok');
        $payorder['process'] = '1,1,1';
        $pay_ok_result = $pay_log->save($payorder);
        
        if(!$pay_ok_result){
		$this->error('虚拟币记录更新失败！', 'javascript:history.back();');
 
        }
        //记录补单成功文本日志
        $Public = A("Public");
        $Public->wirte_log(array('data'=>$payorder,'file'=>'bd_pay_ok','split'=>' '));
		
		$this->success('补单成功！',U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);
    }

    //补单充值到游戏
    public function bd_pay_to_game($payorder){
        //直充虚拟币判断
        if($payorder['gid'] == 1){
			$this->success('充值成功，请查看虚拟币数量！',U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);
        }
        
        //判断订单状态
        if($payorder['process'] == '1,1,1'){
		$this->success('充值成功！',U('pay/payok',array('sn'=>$payorder['paysn'])),0,5000);
		die();
        }
        

        //获取充值游戏的充值配置
        $model = M('game');
        $paygame = $model->where("id={$payorder['gid']}")->find();

		//echo "<pre>";
		//print_r($paygame);
		//echo "</pre>";
		
        //获取服务器配置扩展信息
        $game_server = M('game_server');
        $server = $game_server->where("gid={$payorder['gid']} AND sid={$payorder['sid']} AND status=1")->find();
        //服务器扩展处理
        $server['extend'] = json_decode($server['extend'],true);
        
        //读取混服编号
        $payorder['mid'] = $server['extend']['mid'];
       

        //写入充值虚拟货币
        $model2 = M('member_info');
        $paycurrency2 = $model2->where("uid={$payorder['uid']}")->find();
        // 加入游戏充值账号
        $payorder['gameusername'] = $paycurrency2['gameusername'];


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

		$data = $pay->PayToGame($payorder);
			//print_r ($payorder);
	//die($payorder['process']);
		if ($data['status'] == 1) {
			$this->bd_successupdate($payorder);
		}else{
			//充值游戏失败
			$this->error('充值游戏失败，错误代码：' . rtrim($data['status']) . ' - ' . rtrim($data['messages']) . '，请联系客服处理！'  , U('pay/payok',array('sn'=>$payorder['paysn'])) ,0,5000);
			
		}
    }
    /**
    +----------------------------------------------------------
    * 补单成功更新订单
    +----------------------------------------------------------
    * @access private
    * @name bd_successupdate
    * @category PayAction
    +----------------------------------------------------------
    * @param Array $payorder
    +----------------------------------------------------------
    * @return Location
    * @author Leon Chan<276360843@qq.com> 2012-05-10
    +----------------------------------------------------------
    */


    public function bd_successupdate($payorder){
        //设置虚拟币使用流程状态
        $payorder['process'] = '1,1,1';
        $payorder['status'] = '0';
        $payorder['operater'] = session('adminname');;
        $model = M('pay_togame');
        $model->where("paysn='{$payorder['paysn']}'")->save($payorder);
//
        $model = M('member_info');
        $member= $model->where("uid={$payorder['uid']}")->find();
       if($member['mid']==148){//奇趣
		   $payorder['agent_id']  = $member['aid'];
		   $payorder['place_id']  = $member['sc'];
		   
	         $import = import ( "Source.Cpl.qiqu" );
           //判断是否加载成功
             if(!$import){
             $this->assign('jumpUrl', '/');
             $this->error("游戏接口加载失败！(工会充值返回)");
             }
		    $bangding = new qiqu;
		    $data = $bangding->pay($payorder);
			
			$Public = A("Public");
			
		if ($data['status'] == 1) {
             //返回值
			 $payorder['messages'] = "成功返回值：".$data['messages'];
	         $Public->wirte_log(array('data'=>$payorder,'file'=>'gonghui_OK','split'=>' '));
	   
            $api_url = U('pay/payok',array('sn'=>$payorder['paysn']));
		}else {
			
			$payorder['messages'] = "失败返回值：".$data['messages'];
			
			$Public->wirte_log(array('data'=>$payorder,'file'=>'gonghui_NO','split'=>' '));
			
			$api_url = U('pay/payok',array('sn'=>$payorder['paysn']));
        }
		}
        //补单成功提示
		header("Location:".$api_url);
        
    }
	
   /**
    +----------------------------------------------------------
    * 充值成功显示
    +----------------------------------------------------------
    * @access public
    * @name payok
    * @category PayAction
    +----------------------------------------------------------
    * @param Array $_GET
    +----------------------------------------------------------
    * @return Display
    * @author Leon Chan<276360843@qq.com> 2012-05-10
    +----------------------------------------------------------
    */
    public function payok(){
        //参数转化为小写
        $get = get($_REQUEST);
        
        //初始化Public类
        $Public = A("Public");
        
        //读取充值游戏列表
        $model = M('game');
        $game = $model->where('ispay=1 and status=1')->order('sort desc')->select();
        
        //充值游戏列表
        $Public->get_game_list($game,array('variablename'=>'game'));
        
        //读取充值成功订单信息
        $model = M('pay_togame');
        $payokgame = $model->where("paysn='{$get['sn']}'")->find();
        if(!$payokgame){
            //充值订单号不存在
            die(ShowMsg('订单号不存在！'  , '/',0,5000));
        }
        
        //读取游戏信息
        $game = $Public->get_game_list($game,array('variablename'=>'game','gid'=>$payokgame['gid'],'return'=>true));
        
        //读取服务器信息
        $model = M('game_server');
        $payserver = $model->where("gid={$payokgame['gid']} and sid={$payokgame['sid']}")->find();
        
        //读取充值渠道信息
        $model = M('pay_type');
        $paytype = $model->where("id={$payokgame['paytype']}")->find();
        
        $pay_type= $model->where("isdisplay='1' and status='1'")->order('sort asc')->select();
        $this->assign('pay_type',$pay_type);
        
        $payokgame['gamename'] = $payserver['gamename'];
        $payokgame['servername'] = $payserver['servername'];
        $payokgame['unit'] = $game[0]['unit'];
        $payokgame['pic'] = $game[0]['pic'];
        $payokgame['line'] = $payserver['line'];
        $payokgame['money'] = floor($payokgame['money']);
        $payokgame['payname'] = $paytype['payname'];
        $this->assign('payorder',$payokgame);
        
        //显示模板
        $this->display();
    }
	
}
?>