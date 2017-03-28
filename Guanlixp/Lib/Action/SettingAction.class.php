<?php
class SettingAction extends CommonAction
{
	var $pagecount = 20;
    protected $item;
    protected function _initialize()
    {
        parent::_initialize();
        $this->item = isset($_REQUEST['item']) ? $_REQUEST['item'] : '0';
        $this->assign('item', $this->item);
    }
    public function basic()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['ai'])) {
	$_POST['ai']['bg']= $_POST['bg'];
    $_POST['ai']['logo'] = $_POST['logo'];
 
                if ($this->_update($_POST['ai'])) {
                    $this->success('基本配置修改成功');
                } else {
                    $this->error('基本配置修改失败');
                }
         
        } else {
            $model = M('Setting');
            $setting = $model->where(('item=\'' . $this->item) . '\'')->getField('item_key,item_value');
            $this->assign('ai', $setting);
            $this->display();
        }
    }

    public function security()
    {
        $this->assign('jumpUrl', '__SELF__');
        if (isset($_POST['security'])) {
            $v = $_POST['security']['admin_log'] == 0 ? 'true' : 'false';
            $tmp = file_get_contents('.'.CONF_PATH . 'debug.php');
            $tmp = preg_replace('/\'LOG_RECORD\'\\s*\\=\\>\\s*(?:true|false)\\,/is', ('\'LOG_RECORD\' => ' . $v) . ',', $tmp);
            if (file_put_contents('.'.CONF_PATH . 'debug.php', $tmp)) {
                @unlink(('.'.RUNTIME_PATH . '~runtime.php'));
                if ($this->_update($_POST['security'])) {
                    $this->success('安全设置修改成功');
                } else {
                    $this->error('安全设置修改失败');
                }
            } else {
                $this->error('安全设置修改失败');
            }
        } else {
            $model = M('Setting');
            $setting = $model->where(('item=\'' . $this->item) . '\'')->getField('item_key,item_value');
            $this->assign('security', $setting);
            $this->display('security_set');
        }
    }
//邮箱设置
   public function emaliadd() {

        if (isset($_REQUEST['ai'])) {
        $this->assign('jumpUrl', '__SELF__');

            $tmp = file_get_contents('.'.CONF_PATH . 'emall.php');
            $tmp = preg_replace('/\'MAIL_ADDRESS\'\\s*\\=\\>\\s*\'.*?\'\\,/is', ('\'MAIL_ADDRESS\' => \'' . $_REQUEST['ai']['ADDRESS']) . '\',', $tmp);
			$tmp = preg_replace('/\'MAIL_SMTP\'\\s*\\=\\>\\s*\'.*?\'\\,/is', ('\'MAIL_SMTP\' => \'' . $_REQUEST['ai']['SMTP']) . '\',', $tmp);
			$tmp = preg_replace('/\'MAIL_LOGINNAME\'\\s*\\=\\>\\s*\'.*?\'\\,/is', ('\'MAIL_LOGINNAME\' => \'' . $_REQUEST['ai']['LOGINNAME']) . '\',', $tmp);
			$tmp = preg_replace('/\'MAIL_PASSWORD\'\\s*\\=\\>\\s*\'.*?\'\\,/is', ('\'MAIL_PASSWORD\' => \'' . $_REQUEST['ai']['PASSWORD']) . '\',', $tmp);
			$tmp = preg_replace('/\'MAIL_SENDER\'\\s*\\=\\>\\s*\'.*?\'\\,/is', ('\'MAIL_SENDER\' => \'' . $_REQUEST['ai']['SENDER']) . '\',', $tmp);
            if (file_put_contents( '.'.CONF_PATH . 'emall.php', $tmp)) {
                @unlink(('.'.RUNTIME_PATH . '~runtime.php'));
                if ($this->_update($_REQUEST['ai'])) {
                    $this->success('邮箱全局设置修改成功');
                } else {
                    $this->error('邮箱全局设置修改失败');
                }
            } else {
                $this->error('邮箱缓存全局设置修改失败');
            }

        } else {
            $model = M('Setting');
            $setting = $model->where(('item=\'' . $this->item) . '\'')->getField('item_key,item_value');
            $this->assign('ai', $setting);
		    $this->assign('act','emaliadd');
		    $this->assign('act_title','密码找回邮箱设置');
            $this->display();
        }
    }
	
	
    protected function _update($settingarr, $item = '')
    {
        if ($item == '') {
            $item = $this->item;
        }
        $setting = M('Setting');
        $setting->where(('item=\'' . $item) . '\'')->delete();
        $data = array();
        foreach ($settingarr as $k => $v) {
            if (is_array($v)) {
                $v = implode(',', $v);
            }
            $data['item'] = $item;
            $data['item_key'] = $k;
            $data['item_value'] = $v;
            $result = $setting->add($data);
            if (false === $result) {
                return false;
            }
        }
        return true;
    }
   /**
    +----------------------------------------------------------
    * 文章管理
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
	
    public function article(){
        //读取新闻
        $model = M('article');
        //参数转化为小写
        $get = get($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );
        
        if($get['cid'] && $get['search']){
            $totalcount = $model->where("cid={$get['cid']} AND title like '%{$get['search']}%'")->order('id desc')->count();
        }elseif($get['cid']){
            $totalcount = $model->where("cid={$get['cid']}")->order('id desc')->count();
        }elseif($get['search']){
            $totalcount = $model->where("title like '%{$get['search']}%'")->order('id desc')->count();
        }else{
            $totalcount = $model->order('id desc')->count();
        }
        
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('cid'=>'' . $get['cid'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('article');
        $limit = $ShowPage->OffSet();

        if($get['cid'] && $get['search']){
            $list = $model->where("cid={$get['cid']} AND title like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }elseif($get['cid']){
            $list = $model->where("cid={$get['cid']}")->order('id desc')->limit($limit)->select();
        }elseif($get['search']){
            $list = $model->where("title like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

    	$this->assign('list',$list);
        $this->assign('get', $get);
		$this->assign('act_title','新闻管理');
        //显示模板
        $this->display();
    }
    //文章添加
    public function article_add(){   
        $model = M('game');
        //查询游戏列表
        $game= $model->where('id<>1 and status=1')->order('id desc')->field('id,tag,gamename,status')->select();
        $this->assign('game',$game);

        $this->assign('act_title','添加新闻');
        $this->assign('act','article_insert');
        $this->display();
    }
    //文章添加插入
    public function article_insert(){
	
        //获取POST值
        $post = $_POST;
        $text=trim(uh($post['content']));
		
        //内容处理
        $post['addtime'] = strtotime($post['addtime']);
        $post['flag'] = implode(',', $post['flags']);
        $post['introduction'] = mysubstr(0,$post['length'],$text);
		
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';

        //插入数据
        $model = M('article');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl',U('article'));
        $this->success("添加成功！");
    }
    //文章编辑查看
    public function article_edit(){
    	//获取ID
    	$id = $_GET['id'];
    	//查询游戏列表
        $model = M('game');
        $game= $model->where('id<>1 and status=1')->order('id desc')->field('id,tag,gamename,status')->select();
        $this->assign('game',$game);
        
    	//查询修改ID信息
    	$news = M('article');
        $list = $news->where("id=$id")->find();
        $flags = explode(',', $list['flag']);
        foreach ($flags as $value){
            $flag[$value] = $value;
        }
        //模板赋值
        $this->assign('act_title','编辑新闻');
        $this->assign('act','article_modify');
        $this->assign('flag',$flag);
        $this->assign('vo',$list);
        //显示模板
        $this->display();
    }
    //文章编辑提交
    public function article_modify(){
    	//获取POST值
    	$post = $_POST;

    	//内容处理
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['flag'] = implode(',', $post['flags']);
        $post['addtime'] = strtotime($post['addtime']);
        
        

        //更新数据
        $model = M('article');
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('article'));
        $this->success("修改成功！");
    }	
	public function article_del(){
        $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
      if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
        $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
        $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
        $Result=D("article")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
        $say='删除成功';
        if($Result===false)
        {	 $this->error('操作失败');	 
		}else{
       $this->assign('jumpUrl',U('article'));
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
    public function game(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('game');
        if($get['category'] && $get['search']){
            $totalcount = $model->where("category={$get['category']} AND gamename like '%{$get['search']}%'")->order('id desc')->count();
        }elseif($get['category']){
            $totalcount = $model->where("category={$get['category']}")->order('id desc')->count();
        }elseif($get['search']){
            $totalcount = $model->where("gamename like '%{$get['search']}%'")->order('id desc')->count();
        }else{
            $totalcount = $model->order('id desc')->count();
        }

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('game');
        $limit = $ShowPage->OffSet();

        if($get['category'] && $get['search']){
            $list = $model->where("category={$get['category']} AND gamename like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }elseif($get['category']){
            $list = $model->where("category={$get['category']}")->order('id desc')->limit($limit)->select();
        }elseif($get['search']){
            $list = $model->where("gamename like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','游戏管理');
        $this->assign('list',$list);
        $this->assign('act','game_update');
        //$this->assign('get', $get);
        $this->display();
    }
    //添加游戏
    public function game_add(){
    	$model = M('game');
        
        $list = $model->count();
        if(empty($list)){
                $arr['sort'] = 1;
        }else{
                $arr['sort'] = $list + 1;
        }
		$bs = M('hunkey')->order('id asc')->select();
		$this->assign('hun',$bs);
        $this->assign('act_title','添加游戏');
        $this->assign('act','game_insert');
        $this->assign('vo',$arr);
	$this->display();
    }
    //写入游戏信息
    public function game_insert(){
    	$post = $_POST;
        
        //内容处理
        if(!isset($post['ispay'])) $post['ispay'] = '0';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['addtime'] = strtotime($post['addtime']);
        $post['flag'] = implode(',', $post['flags']);
        $post['pic'] = json_encode($post['pic']);
        $post['extend'] = json_encode($post['extend']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];

        $model = M('game');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('game'));
        $this->success("添加成功！");
    }
    //编辑游戏
    public function game_edit(){
    	$model = M('game');
    	$id = $_GET['id'];
        $list = $model->where("id=$id")->find();
		
        $bs = M('hunkey')->order('id asc')->select();
		
		
        //自定义属性处理
        $flags = explode(',', $list['flag']);
        foreach ($flags as $value){
            $flag[$value] = $value;
        }
        //图片处理
        $list['pic'] = json_decode($list['pic'],true);
        
        //扩展信息处理
        $list['extend'] = json_decode($list['extend'],true);
        
        $this->assign('act_title','编辑游戏');
        $this->assign('act','game_modify');
        $this->assign('vo',$list);
        $this->assign('hun',$bs);
        $this->assign('flag',$flag);
        $this->display();
    }
    public function game_modify(){
    	$post = $_POST;
     	
        //内容处理
        if(!isset($post['ispay'])) $post['ispay'] = '0';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['addtime'] = strtotime($post['addtime']);
        $post['flag'] = implode(',', $post['flags']);
        $post['pic'] = json_encode($post['pic']);
        $post['extend'] = json_encode($post['extend']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
        $model = M('game');
        $model->save($post);
        
        //成功跳转
        $this->assign('jumpUrl',U('game'));
        $this->success("修改成功！");
    }
	public function game_del(){
       $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
          if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
          $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
          $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
          $Result=D("game")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
          $say='删除成功';
          if($Result===false){	 
		  $this->error('操作失败');	 
		  }else{
          $this->assign('jumpUrl',U('game'));
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
    public function server(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );
        
    	$model = M('game_server');
        if($get['gamename'] && $get['search']){
            $totalcount = $model->where("gamename={$get['gamename']} AND servername like '%{$get['search']}%'")->count();
        }elseif($get['category']){
            $totalcount = $model->where("gamename={$get['gamename']}")->count();
        }elseif($get['search']){
            $totalcount = $model->where("gamename like '%{$get['search']}%' or servername like '%{$get['search']}%'")->count();
        }else{
            $totalcount = $model->count();
        }
        
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('gamename'=>'' . $get['gamename'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('server');
        $limit = $ShowPage->OffSet();

        if($get['gamename'] && $get['search']){
            $list = $model->where("gamename={$get['gamename']} AND sname like '%{$get['search']}%'")->order('begintime desc')->limit($limit)->select();
        }elseif($get['gamename']){
            $list = $model->where("gamename={$get['gamename']}")->order('begintime desc')->limit($limit)->select();
        }elseif($get['search']){
            $list = $model->where("gamename like '%{$get['search']}%' or servername like '%{$get['search']}%'")->order('begintime desc')->limit($limit)->select();
        }else{
            $list = $model->order('begintime desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','服务器管理');
    	$this->assign('list',$list);
        $this->assign('act','server_update');
		$this->display();
    }
    public function server_add(){
    	$model = M('game');
    	//查询游戏列表
    	$gamelist = $model->where('status=1')->order('id desc')->field('id,tag,gamename,status')->select();
    	$this->assign('gamelistname',$gamelist);

    	$this->assign('act_title','添加服务器');
    	$this->assign('act','server_insert');
    	$this->assign('vo',$arr);
	$this->display();
    }
    public function server_insert(){
    	//获取POST值
    	$post = $_POST;
    	
        //查询游戏
    	$model = M('game');
    	$gamelist = $model->where("id={$post['gid']} AND status=1")->order('id desc')->field('id,tag,gamename,status')->find();
        
    	//游戏赋值
        $post['tag'] = $gamelist['tag'];
        $post['gamename'] = $gamelist['gamename'];
        
        //内容处理
        if(!isset($post['ispay'])) $post['ispay'] = '0';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        
        if(is_array($post['flags'])){
        	$post['flag'] = implode(',', $post['flags']);
        }else{
        	$post['flag'] = '';
        }
        
        $post['extend']['repairbegintime'] = strtotime($post['extend']['repairbegintime']);
        $post['extend']['repairendtime'] = strtotime($post['extend']['repairendtime']);
		$post['gameid'] = $post['extend']['gameid'];
		$post['severid'] = $post['extend']['mid'];
        $post['extend'] = json_encode($post['extend']);
    	$post['begintime'] = strtotime($post['begintime']);
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        if(!$post['gameurl']){
            $post['gameurl'] = U('game/login',array('gid'=>$post['gid'],'sid'=>$post['sid']));
        }

	//插入数据
    	$model = M('game_server');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl',U('server'));
        $this->success("添加成功！");
    }
    public function server_edit(){
    	//获取ID
    	$id = $_GET['id'];
    	//查询游戏列表
    	$model = M('game');
    	$gamelist = $model->where('status=1')->order('id desc')->field('id,tag,gamename,status')->select();
    	$this->assign('gamelistname',$gamelist);
        
    	//查询修改ID信息
    	$gameserver = M('game_server');
        $list = $gameserver->where("id=$id")->find();
        //自定义属性处理
        $flags = explode(',', $list['flag']);
        foreach ($flags as $value){
            $flag[$value] = $value;
        }
        
        //扩展信息处理
        $list['extend'] = json_decode($list['extend'],true);
        
        //模板赋值
        $this->assign('act_title','编辑服务器');
        $this->assign('act','server_modify');
        $this->assign('vo',$list);
        $this->assign('flag',$flag);
        //显示模板
        $this->display();
    }
    public function server_modify(){
    	//获取POST值
    	$post = $_POST;

        //查询游戏
    	$model = M('game');
    	$gamelist = $model->where("id={$post['gid']} AND status=1")->order('id desc')->field('id,tag,gamename,status')->find();
        
    	//游戏赋值
        $post['tag'] = $gamelist['tag'];
        $post['gamename'] = $gamelist['gamename'];
        
    	//内容处理
        if(!isset($post['ispay'])) $post['ispay'] = '0';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        if(is_array($post['flags'])){
        	$post['flag'] = implode(',', $post['flags']);
        }else{
        	$post['flag'] = '';
        }      
        $post['extend']['repairbegintime'] = strtotime($post['extend']['repairbegintime']);
        $post['extend']['repairendtime'] = strtotime($post['extend']['repairendtime']);
        $post['extend'] = json_encode($post['extend']);
    	$post['begintime'] = strtotime($post['begintime']);
        $post['modifytime'] = strtotime($post['modifytime']);
        if(!$post['gameurl']){
            $post['gameurl'] = U('game/login',array('gid'=>$post['gid'],'sid'=>$post['sid']));
        }

        //更新数据
        $model = M('game_server');
        $model->save($post);
        
        //成功跳转
        $this->assign('jumpUrl',U('server'));
        $this->success("修改成功！");
    }	
   public function server_del(){
       $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("game_server")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('server'));
            $this->success($say);
            }
       }
    /**
    +----------------------------------------------------------
    * 子域名设置
    +----------------------------------------------------------
	* @author	st
	* @version	2013-04-25 10:12:16
    +----------------------------------------------------------
    */
		
   public function hostup() {

        if (isset($_POST['act'])) {
         
		$dir = $_SERVER ['DOCUMENT_ROOT'];
        $model = M('game');
        $game = $model->select();

		foreach($game as $k=>$v){
			$arr[$v['tag']] = array($v['tag']);
		}

			
            $arr['daquan'] = array ( 'Game' );
	        $arr['hezi']  = array ( 'Hezi' );
            $arr['pay'] = array ( 'Pay' );
            $arr['user'] = array ( 'User' );
            $arr['reg'] = array ( 'Reg' );
            $arr['huodong'] = array ( 'Huodong' );
            $arr['zixun'] = array ( 'Zixun' );
            $arr['gm'] =  array ( 'kefu' );
            $arr['libao'] =  array ( 'Libao' );
            $arr['kaifu'] =  array ( 'Kaifu' );
            $arr['gameplay'] =  array ( 'Gameplay' );
	        $arr['shop'] =  array ( 'Shop' );
		    $arr['fuli'] =  array ( 'Fuli' );
			
		$data['APP_SUB_DOMAIN_RULES'] = $arr;
		F ( 'basic', $data, '.'.CONF_PATH );

		
		
        $tmp = file_get_contents('.'.CONF_PATH . 'basic.php');
        if (file_put_contents('.'.CONF_PATH . 'basic.php', $tmp)) {
        @unlink(('.'.RUNTIME_PATH . '~runtime.php'));
        $this->success('子域名全局设置成功');      
        } else {
         $this->error('子域名缓存设置失败');
        }

        } else {
            $model = M('game');
            $setting = $model->select();
            $this->assign('ai', $setting);
		    $this->assign('act','hostup');
		    $this->assign('act_title','独立官网子域名设置');
            $this->display();
        }
    }
//接口数据
    public function gamejiekou(){
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('hunkey');
        $totalcount = $model->order('id asc')->count();
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl= U('gamejiekou');
        $limit = $ShowPage->OffSet();
        $list = $model->order('id asc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','接口管理');
        $this->assign('list',$list);
        $this->assign('act','gamejiekou');
        $this->display();
    }	
   //添加接口数据
    public function gamejiekou_add(){
    	$model = M('hunkey');
        $list = $model->count();
        $this->assign('act_title','添加接口');
        $this->assign('act','gamejiekou_insert');
        $this->assign('vo',$arr);
	$this->display();
    }
    //写入接口数据
    public function gamejiekou_insert(){
    	$post = $_POST;
        
        //内容处理
        $model = M('hunkey');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('game'));
        $this->success("添加成功！");
    }
    //编辑接口数据
    public function gamejiekou_edit(){
    	$model = M('hunkey');
    	$id = $_GET['id'];
        $list = $model->where("id=$id")->find();

        $this->assign('act_title','编辑接口');
        $this->assign('act','gamejiekou_modify');
        $this->assign('vo',$list);
        $this->display();
    }
    public function gamejiekou_modify(){
    	$post = $_POST;
        //内容处理
        $model = M('hunkey');
        $model->save($post);
        //成功跳转
        $this->assign('jumpUrl',U('gamejiekou'));
        $this->success("修改成功！");
    }
///主题数据
    public function gamezhuti(){
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('zhuti');
        $totalcount = $model->order('id asc')->count();
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('gamezhuti');
        $limit = $ShowPage->OffSet();
        $list = $model->order('id asc')->limit($limit)->select();

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('list',$list);
        $this->assign('act_title','官网主题管理');
        $this->assign('act','gamezhuti');
        $this->display();
    }	
   //添加主题数据
    public function gamezhuti_add(){
    	$model = M('zhuti');
        $list = $model->count();
        $this->assign('act_title','添加游戏');
        $this->assign('act','gamezhuti_insert');
        $this->assign('vo',$arr);
	$this->display();
    }
    //写入接口数据
    public function gamezhuti_insert(){
    	$post = $_POST;
        
        //内容处理
        $model = M('zhuti');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('game'));
        $this->success("添加成功！");
    }
    //编辑主题数据
    public function gamezhuti_edit(){
    	$model = M('zhuti');
    	$id = $_GET['id'];
        $list = $model->where("id=$id")->find();

        $this->assign('act_title','编辑游戏');
        $this->assign('act','gamezhuti_modify');
        $this->assign('vo',$list);
        $this->display();
    }
    public function gamezhuti_modify(){
    	$post = $_POST;
        //内容处理
        $model = M('zhuti');
        $model->save($post);
        //成功跳转
        $this->assign('jumpUrl',U('gamejiekou'));
        $this->success("修改成功！");
    }
public function clear_cache() {
		$st = deldir ($_SERVER ['DOCUMENT_ROOT'] . '/Runtime');
		$admin = C ( 'ADMIN_PATH' );
		$this->assign ( 'jumpUrl', U ( 'main' ) );
		$this->success ( '更新缓存成功!' );
}	

    /**
    +----------------------------------------------------------
    * 新手卡
    +----------------------------------------------------------
	* @author	st
	* @version	2013-04-25 10:12:16
    +----------------------------------------------------------
    */

    public function card_detail(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        $infinitygid = array( 18,26,11,29,31 );	//接口申请cdkey列表  //18神仙道		26海贼无双		11醉西游	29蓬莱奇谭	31热血海贼王

       //查询记录 
       $model = M('card_detail');
       
	   //实例化类
       import ( "@.ORG.ShowPage" );
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->count(); //取得总记录数
        $ShowPage->LinkAry = array('gid'=>'' . $get['gid'],'sid'=>'' . $get['sid']); //加其他的参数
		$ShowPage->LinkUrl = U('card_detail');
        $limit = $ShowPage->OffSet();
        $list = $model->alias('card_detail')->join('left join '.C('DB_PREFIX').'game as game ON game.id=card_detail.gid')->where($condition)->field('game.gamename,card_detail.*')->order('gid desc')->limit($limit)->select();

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
		//加载剩余数量
		$model = M('card');
		$remainlist = $model->where('1=1')->group('cid')->field('cid,count(id) as ct')->select();
			foreach($list as &$cdetail){
				
		if( in_array( $cdetail['gid'], $infinitygid ) ){
				$cdetail['remain']=9999;
		}else{
				$cdetail['remain']=0;
				foreach($remainlist as $value){
					if($cdetail['id']==$value['cid']){
						$cdetail['remain']=$value['ct'];
						break;
					}
				}
		}
			}
			unset($cdetail);
		$this->assign('list',$list);
        $this->assign('act_title','新手卡大类管理');
        $this->assign('get',$get);
        $this->display();
    }
	public function card_detail_add(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加大游戏新手卡');
        $this->assign('act','card_detail_insert');
        $this->assign('vo',$arr);

		$this->display();
    }

	public function card_detail_insert(){
    	//获取POST值
    	$post = $_POST;
    	
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
    	$model = M('card_detail');
        //判断链接是否已经添加
        $qdcount = $model->where("gid='{$post['gid']}' and title='{$post['title']}'")->count();
        
        if($qdcount>0){
		$this->assign('jumpUrl',U('card_detail_add') );
		$this->error("此游戏卡类已添加过！");

        }
        
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
		$this->assign('jumpUrl',U('card_detail') );
		$this->success("游戏卡类添加成功！");

    }
	
    public function card_detail_edit(){
    	//获取ID
    	$id = $_GET['id'];
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);
        
    	//查询修改ID信息
    	$model = M('card_detail');
        $list = $model->where("id=$id")->find();
        
        //模板赋值
        $this->assign('act_title','编辑大游戏新手卡');
        $this->assign('act','card_detail_modify');
        $this->assign('vo',$list);
        //显示模板
        $this->display();
    }
    public function card_detail_modify(){
    	//获取POST值
    	$post = $_POST;

   		$model = M('card_detail');
        //更新数据
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('card_detail'));
        $this->success("修改成功！");
    }


    public function card_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
          $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
			$condition['date'] = array('between',array(date('Y-m-d',$get['begintime']),date('Y-m-d',$get['endtime'])));
			
        }
        
       //查询游戏
       if($get['gid']){
           $condition['card_log.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $gameserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('gameserver',$gameserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition['card_log.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition['card_log.username'] = array('eq',$get['uname']);
		   unset($condition['date']);
       }
       
       //查询cdkey
       if($get['card']){
           $condition['card_log.card'] = array('eq',$get['card']);
		   unset($condition['date']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('card_log');
       
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('card_log');
        $limit = $ShowPage->OffSet();
        //$list = $model->where($condition)->order('id desc')->limit($limit)->select();
		
        $list = $model->alias('card_log')->join('left join '.C('DB_PREFIX').'game as game ON game.id=card_log.gid')->join('left join '.C('DB_PREFIX').'card_detail as cardetail ON cardetail.id=card_log.cid')->where($condition)->field('game.gamename,cardetail.title,card_log.*')->order('id desc')->limit($limit)->select();
        
        $this->assign('list',$list);
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('sumcount',$ShowPage->Total);
		
        $this->assign('get',$get);
        $this->assign('act_title','新手卡发放记录');
        $this->display();
    }

    public function card_unused(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

  
			//查询游戏
		   if($get['gid']){
			   $condition[C('DB_PREFIX').'card.gid'] = array('eq',$get['gid']);
				//读取充值服务器列表
				$model = M('game_server');
				$gameserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
				$this->assign('gameserver',$gameserver);
		   }
		   
		   //查询服务器
		   if($get['sid']){
			   $condition[C('DB_PREFIX').'card.sid'] = array('eq',$get['sid']);
		   }
		   
		   //查询cdkey
		   if($get['card']){
			   $condition[C('DB_PREFIX').'card.card'] = array('eq',$get['card']);
		   }

		   //加载分页类
		   import ( "@.ORG.ShowPage" );
		   
		   //充值记录 
		   $model = M('card');
		   
			//实例化类
			$ShowPage = new ShowPage;
			$ShowPage->PageSize = $this->pagecount; //每页显示记录
			$ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'card.id desc')->count(); //取得总记录数
			$ShowPage->LinkAry = array('gid'=>$get['gid'],'sid'=>$get['sid']); //加其他的参数
            $ShowPage->LinkUrl = U('card_unused');
			$limit = $ShowPage->OffSet();
			//$list = $model->alias('card')->join('left join '.C('DB_PREFIX').'game as game ON game.id=card.gid')->join('left join '.C('DB_PREFIX').'card_detail as cardetail ON cardetail.id=card.cid')->where($condition)->field('game.gamename,cardetail.title,card.*')->order('card.id desc')->limit($limit)->select();
            //$list = $model->join(C('DB_PREFIX')."game on ".C('DB_PREFIX')."game.id=".C('DB_PREFIX')."card.gid")->join(C('DB_PREFIX')."card_detail as ".C('DB_PREFIX')." on ".C('DB_PREFIX')."cardetail.id=".C('DB_PREFIX')."card.cid")->field(C('DB_PREFIX')."card.*,".C('DB_PREFIX')."cardetail.title,".C('DB_PREFIX')."game.gamename")->where($condition)->order(C('DB_PREFIX').'card.id desc')->limit($limit)->select();

              $list = $model->join(C('DB_PREFIX')."game on ".C('DB_PREFIX')."game.id=".C('DB_PREFIX')."card.gid")->join(C('DB_PREFIX')."card_detail on ".C('DB_PREFIX')."card_detail.id=".C('DB_PREFIX')."card.cid")->field(C('DB_PREFIX').'game.gamename,'.C('DB_PREFIX').'card_detail.title,'.C('DB_PREFIX').'card.*')->where($condition)->order(C('DB_PREFIX').'card.id desc')->limit($limit)->select();
        
			$this->assign('list',$list);
			$this->assign('countnum',count($list));
			$this->assign('ShowPage',$ShowPage->ShowLink());
			$this->assign('sumcount',$ShowPage->Total);
			
			$this->assign('get',$get);
        $this->assign('act_title','新手卡库存记录');
       
        $this->display();
    }
	
	public function card_add(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);
		$gid = $get['gid'];

		if(isset($get['gid'])||$gid>0){
            $model = M('game_server');
            $gameserver= $model->where("gid=%d",$gid)->order('sid desc')->select();
            $this->assign('gameserver',$gameserver);

			$model = M('card_detail');
			$cardlist = $model->where("gid=%d",$gid)->select();
			if(empty($cardlist)){
				$this->assign('jumpUrl',U('card_detail') );
				$this->error("游戏未设置新手卡");
			}
			$this->assign('cardlist',$cardlist);
		}

        $this->assign('gid',$get['gid']);
        $this->assign('sid',$get['sid']);
        $this->assign('act_title','批量导入新手卡');
        $this->assign('act','card_insert');
        $this->assign('vo',$arr);

		$this->display();
    }
	
		public function card_insert(){
    	//获取POST值
    	$post = $_POST;
    	
        $post['date'] = $post['date'];	//strtotime(
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];

		$cardarr = explode("\r\n",$post['cdkeys'] );
		$data = array();

		foreach ($cardarr as $vo) {
			if ($vo != ''){
				$vv['status'] = 1;
				$vv['date'] = $post['date'];
				$vv['gid'] = $post['gid'];
				$vv['sid'] = $post['sid'];
				$vv['cid'] = $post['cid'];
				$vv['card'] = $vo;
				$data[] = $vv;
			}
		}

    	$model = M('card');
        //插入数据
        $model->create();
        $insert = $model->addAll($data);

        //成功跳转
		$this->assign('jumpUrl',U('card_unused',array('gid'=>$post['gid'],'sid'=>$post['sid'],'cid'=>$post['cid'])));
		$this->success('游戏(gid='.$post['gid'].',sid='.$post['sid'].',cid='.$post['cid'].')的新手卡导入成功！');

    }
	
	   public function card_del(){
	   
       $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("card_detail")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('card_detail'));
            $this->success($say);
            }
       }
	
	
  /**
    +----------------------------------------------------------
    * 充值渠道
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function paytype(){   
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('pay_type');
        if($get['category'] && $get['search']){
            $totalcount = $model->where("id={$get['category']} AND payname like '%{$get['search']}%'")->order('id desc')->count();
        }elseif($get['category']){
            $totalcount = $model->where("id={$get['category']}")->order('id desc')->count();
        }elseif($get['search']){
            $totalcount = $model->where("payname like '%{$get['search']}%'")->order('id desc')->count();
        }else{
            $totalcount = $model->order('id desc')->count();
        }

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('paytype');
        $limit = $ShowPage->OffSet();

        if($get['category'] && $get['search']){
            $list = $model->where("id={$get['category']} AND payname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }elseif($get['category']){
            $list = $model->where("id={$get['category']}")->order('id desc')->limit($limit)->select();
        }elseif($get['search']){
            $list = $model->where("payname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','充值渠道管理');
        $this->assign('list',$list);
        $this->display();
    }
    //添加充值渠道
    public function paytype_add(){   
    	$model = M('pay_type');
        
        $list = $model->count();
        if(empty($list)){
                $arr['sort'] = 1;
        }else{
                $arr['sort'] = $list + 1;
        }
        
        $this->assign('act_title','添加充值渠道');
        $this->assign('act','paytype_insert');
        $this->assign('vo',$arr);

	$this->display();
    }
    //添加充值渠道插入
    public function paytype_insert(){
        //参数转化为小写
        $post = array_change_key_case($_REQUEST);
        
        //数据处理
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
        //写入数据
        $model = M('pay_type');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('paytype'));
        $this->success("添加成功！");
    }
    //充值渠道编辑
    public function paytype_edit(){
    	$id = $_GET['id'];
        $model = M('pay_type');
        $list = $model->where("id=$id")->find();
        
        $this->assign('act_title','编辑充值渠道');
        $this->assign('act','paytype_modify');
        $this->assign('vo',$list);
        $this->display();
    }
    //充值渠道编辑写入
    public function paytype_modify(){
        //参数转化为小写
        $post = array_change_key_case($_REQUEST);
    	
        //数据处理
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
        //写入修改数据
        $model = M('pay_type');
        $model->save($post);
        //成功跳转
        $this->assign('jumpUrl', U('paytype'));
        $this->success("修改成功！");
    }
	
	   public function paytype_del(){
       $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("pay_type")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('card_detail'));
            $this->success($say);
            }
       }

  /**
    +----------------------------------------------------------
    * 充值管理
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    //虚拟币充值记录
    public function pay_record(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
           $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_ok.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_ok.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_ok.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_ok.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_ok.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_ok.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_ok');
       
       $condition[C('DB_PREFIX').'pay_ok.process'] = array('eq','1,1,1');
       $condition[C('DB_PREFIX').'pay_ok.pay_platform'] = array('eq','platform');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_record');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_ok.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_ok.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_ok.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_ok.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','查看虚拟币充值记录');
        $this->assign('get',$get);
        
        $this->display();
    }
    //游戏充值记录
    public function pay_game_record(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
 
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
         
		$qdlist = M('mid')->where("1=1")->select();
        $this->assign('qdlist',$qdlist);
		 
       //查询时间
	   $begintime=$get['begintime'];
	   $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
          $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_togame.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_togame.paytype'] = array('eq',$get['paytype']);
       }
	   
       //推广 ID
       if($get['unid']){
           $condition[C('DB_PREFIX').'pay_togame.tid'] = array('eq',$get['unid']);
       } 
	   
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_togame.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
  
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_togame.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_togame.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_togame.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_togame');
       
       $condition[C('DB_PREFIX').'pay_togame.process'] = array('eq','1,1,1');
       $condition[C('DB_PREFIX').'pay_togame.pay_platform']     = array('eq','game');
	 //echo "<pre>";
  // print_r( $condition);
	// echo "</pre>";
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'unid'=>$get['unid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_game_record');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_togame.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_togame.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_togame.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_togame.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->limit($limit)->select();
        
		$this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','查看游戏充值记录');
        $this->assign('get',$get);
        
      if(!$get['daochu']){
		$this->display();
		}else{
         $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_togame.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_togame.sid=".C('DB_PREFIX')."game_server.sid")->
		 join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_togame.paytype=".C('DB_PREFIX')."pay_type.id")->
         join(C('DB_PREFIX')."mid on ".C('DB_PREFIX')."pay_togame.tid=".C('DB_PREFIX')."mid.mid")->
         field(C('DB_PREFIX')."pay_togame.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname,".C('DB_PREFIX')."mid.mname")->
		 where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->limit($ShowPage->Total)->select();
        


	  foreach($list as $k=>$v){
	    $l[$k]['id'   ] =   $k+1;
		$l[$k]['paysn']  = $list[$k]['paysn'];
		$l[$k]['name']  = $list[$k]['uname'];
		$l[$k]['paytype']  = $list[$k]['payname'];
		$l[$k]['money'] = $list[$k]['payamount'];
		$l[$k]['gid']   =  $list[$k]['gamename'];
		$l[$k]['sid']   =  $list[$k]['sid']."服";
		$l[$k]['time']  = date('Y-m-d H:i:s',$list[$k]['paytime']);
	    $l[$k]['mname']  = $list[$k]['mname'];
		
      } 
	     if($get['unid'] && $get['gid']){
		    $gname = $begintime."至".$endtime."日";
		 }else if($get['mid']){
			$gname = $begintime."至".$endtime."日";
		 }else if($get['gid']){
			$gname = $begintime."至".$endtime.'日';
		 }else{
			$gname = $begintime."至".$endtime."日";
	     }
		
		exportexcel($l,array('id','订单号','账户','支付方式','充值金额','游戏名称','服务器名称','充值时间','充值渠道'),$gname."-充值统计");
		}
		
    }
    //充值日志订单记录
    public function pay_record_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_log.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_log.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_log.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_log.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_log.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_log.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_log');
       $condition[C('DB_PREFIX').'pay_log.pay_platform']     = array('eq','game');
       //$condition[C('DB_PREFIX').'pay_log.process'] = array('neq','1,1,1');
       
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_log.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_record_log');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_log.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_log.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_log.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_log.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_log.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','充值日志订单查询');
        $this->assign('get',$get);
        
        $this->display();
    }
    //批量查询
    public function pay_batchuser(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
        //查询时间
        $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
        $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_togame.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
        //查询类型
        if($get['paytype']){
            $condition[C('DB_PREFIX').'pay_togame.paytype'] = array('eq',$get['paytype']);
        }
       
        //查询游戏
        if($get['gid']){
            $condition[C('DB_PREFIX').'pay_togame.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
        }
       
        //查询服务器
        if($get['sid']){
            $condition[C('DB_PREFIX').'pay_togame.sid'] = array('eq',$get['sid']);
        }
       
        //查询用户名
        if($get['uname']){
            $batuser = explode("\r\n",$get['uname']);
            if (count($batuser) > 1)
                $condition[C('DB_PREFIX').'pay_togame.uname'] = array('in',$batuser);
            else
                $condition[C('DB_PREFIX').'pay_togame.uname'] = array('eq',$get['uname']);
        }

        //查询订单号
        if($get['paysn']){
            $condition[C('DB_PREFIX').'pay_togame.paysn'] = array('eq',$get['paysn']);
        }

        //加载分页类
        import ( "@.ORG.ShowPage" );

        //充值记录 
        $model = M('pay_togame');

        $condition[C('DB_PREFIX').'pay_togame.process'] = array('eq','1,1,1');

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_batchuser');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_togame.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_togame.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_togame.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_togame.*,count(".C('DB_PREFIX')."pay_togame.id) paycount,sum(".C('DB_PREFIX')."pay_togame.payamount) paysum,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->group(C('DB_PREFIX').'pay_togame.sid,'.C('DB_PREFIX').'pay_togame.uname')->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());

        //查询总充值金额
        $sumpay = $model->where($condition)->order('id desc')->sum('payamount');
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','批量查询充值');
        $this->assign('get',$get);

        $this->display();
    }
    //虚拟币充值掉单
    public function pay_fall(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_ok.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_ok.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_ok.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_ok.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_ok.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_ok.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_ok');
       
       $condition[C('DB_PREFIX').'pay_ok.process'] = array('neq','1,1,1');
       $condition[C('DB_PREFIX').'pay_ok.pay_platform'] = array('eq','platform');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_fall');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_ok.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_ok.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_ok.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_ok.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','虚拟币充值掉单');
        $this->assign('get',$get);
        
        $this->display();
    }
    //游戏充值掉单
    public function pay_game_fall(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_togame.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_togame.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_togame.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_togame.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_togame.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_togame.paysn'] = array('eq',$get['paysn']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_togame');
       
       $condition[C('DB_PREFIX').'pay_togame.process'] = array('neq','1,1,1');
	   $condition[C('DB_PREFIX').'pay_togame.pay_platform']     = array('eq','game');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_game_fall');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_togame.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_togame.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_togame.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_togame.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','游戏充值掉单');
        $this->assign('get',$get);
        
        $this->display();
    }
    //虚拟币补单记录查询
    public function pay_reissue(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询操员
        $operater = M('pay_ok')->where("operater <> ''")->group('operater')->field('operater')->select();
        $this->assign('operater',$operater);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_ok.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_ok.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_ok.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_ok.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_ok.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_ok.paysn'] = array('eq',$get['paysn']);
       }
       
       //查询操作员
       if($get['operater']){
           $condition[C('DB_PREFIX').'pay_ok.operater'] = array('eq',$get['operater']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_ok');
       
       $condition[C('DB_PREFIX').'pay_ok.status'] = array('eq','0');
       $condition[C('DB_PREFIX').'pay_ok.pay_platform'] = array('eq','platform');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname'],'operater'=>$get['operater']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_reissue');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_ok.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_ok.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_ok.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_ok.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_ok.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','补单记录查询');
        $this->assign('get',$get);
        
        $this->display();
    }
	
    //游戏补单记录查询
    public function pay_game_reissue(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

        //充值渠道
        $paytyep = M('pay_type')->order('id asc')->select();
        $this->assign('paytype',$paytyep);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询操员
        $operater = M('pay_togame')->where("operater <> ''")->group('operater')->field('operater')->select();
        $this->assign('operater',$operater);
                      
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
		   $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'pay_togame.paytime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //查询类型
       if($get['paytype']){
           $condition[C('DB_PREFIX').'pay_togame.paytype'] = array('eq',$get['paytype']);
       }
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'pay_togame.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'pay_togame.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'pay_togame.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'pay_togame.paysn'] = array('eq',$get['paysn']);
       }
       
       //查询操作员
       if($get['operater']){
           $condition[C('DB_PREFIX').'pay_togame.operater'] = array('eq',$get['operater']);
       }

       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('pay_togame');
       
       $condition[C('DB_PREFIX').'pay_togame.status'] = array('eq','0');
       $condition[C('DB_PREFIX').'pay_togame.process'] = array('eq','1,1,1');
	   $condition[C('DB_PREFIX').'pay_togame.pay_platform']     = array('eq','game');
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'paytype'=>$get['paytype'],'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname'],'operater'=>$get['operater']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_game_reissue');
        $limit = $ShowPage->OffSet();
        $list = $model->join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."pay_togame.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."pay_togame.sid=".C('DB_PREFIX')."game_server.sid")->join(C('DB_PREFIX')."pay_type on ".C('DB_PREFIX')."pay_togame.paytype=".C('DB_PREFIX')."pay_type.id")->field(C('DB_PREFIX')."pay_togame.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername,".C('DB_PREFIX')."pay_type.payname")->where($condition)->order(C('DB_PREFIX').'pay_togame.id desc')->limit($limit)->select();
        
		$this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('payamount'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','补单记录查询');
        $this->assign('get',$get);
        
        $this->display();
    }
    //更新订单状态
    public function pay_updateorder(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        if(isset($get['paytable']) && isset($get['paysn'])){
            //获取订单号
            $paysn = $get['paysn'];
            
            //读取日志订单信息
            $paylog= M('pay_log');
            $pay_log = $paylog->where("paysn='{$paysn}'")->find();
            
            if(!$pay_log){
				$this->error('日志订单号不存在！', 'javascript:history.back();');
            }
            
            //读取订单信息
            $model = M($get['paytable']);
            $payorder = $model->where("paysn='{$paysn}'")->find();
            
            if(!$payorder){
				$this->error('订单号不存在！', 'javascript:history.back();');
            }
            
            if($payorder['process'] == '1,1,1'){
				$this->error('订单已成功,无须更新！', 'javascript:history.back();');	
            }
            
            //订单状态设置
            $updatepayorder['process'] = '1,1,1';
            $updatepayorder['status'] = '0';
            $updatepayorder['operater'] = $this->userinfo['uname'];
            
            //日志订单不成功的更新为成功
            if($pay_log['process'] != '1,1,1'){
                //更新日志订单
                $pay_log_result = $paylog->where("paysn='{$payorder['paysn']}'")->setField($updatepayorder);
                if(!$pay_log_result){
                    //订单失败提示
					$this->error('日志订单更新失败！', U('pay_updateorder') ,0,3000);	
                }
            }
            
            //更新订单状态
            $result = $model->where("paysn='{$payorder['paysn']}'")->setField($updatepayorder);
//            print_r($result);
//            echo '<hr>';
//            echo $model->getLastSql();
//            die;
            if($result){
                //订单更新提示
				$this->success('订单更新成功！', U('pay_updateorder') ,0,3000);
            }else{
                //订单更新提示
				$this->error('订单更新失败！', U('pay_updateorder') ,0,3000);	
            }
        }
        $this->assign('act_title','手动处理订单');
        $this->display();
    }
	
	
    //虚拟币消费日志
    public function pay_platform_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);

  
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
                      
       //查询时间
	   $begintime=$get['begintime'];
	   $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
            $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition[C('DB_PREFIX').'platform.time'] = array('between',array($get['begintime'],$get['endtime']));
        }
  
       
       //查询游戏
       if($get['gid']){
           $condition[C('DB_PREFIX').'platform.gid'] = array('eq',$get['gid']);
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //查询服务器
       if($get['sid']){
           $condition[C('DB_PREFIX').'platform.sid'] = array('eq',$get['sid']);
       }
       
       //查询用户名
       if($get['uname']){
           $condition[C('DB_PREFIX').'platform.uname'] = array('eq',$get['uname']);
       }
       
       //查询订单号
       if($get['paysn']){
           $condition[C('DB_PREFIX').'platform.paysn'] = array('eq',$get['paysn']);
       }
       


       //加载分页类
       import ( "@.ORG.ShowPage" );
       
       //充值记录 
       $model = M('platform');

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->order(C('DB_PREFIX').'platform.id desc')->count(); //取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>$get['gid'],'sid'=>$get['sid'],'uname'=>$get['uname']); //加其他的参数
		$ShowPage->LinkUrl = U('pay_platform_log');
        $limit = $ShowPage->OffSet();
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."platform.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."platform.sid=".C('DB_PREFIX')."game_server.sid")->
		field(C('DB_PREFIX')."platform.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername")->
		where($condition)->order(C('DB_PREFIX').'platform.id desc')->limit($limit)->select();
        $this->assign('countnum',count($list));
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
       // echo $model->getLastSql();
      // die;
        
        //查询总充值金额
        $sumpay = number_format($model->where($condition)->order('id desc')->sum('paymoney'),2);
        $this->assign('sumpay',$sumpay);
        $this->assign('act_title','平台币消费统计');
        $this->assign('get',$get);
		
      if(!$get['daochu']){
		$this->display();
		}else{
        $list = $model->
		join(C('DB_PREFIX')."game_server on ".C('DB_PREFIX')."platform.gid=".C('DB_PREFIX')."game_server.gid and ".C('DB_PREFIX')."platform.sid=".C('DB_PREFIX')."game_server.sid")->
		field(C('DB_PREFIX')."platform.*,".C('DB_PREFIX')."game_server.gamename,".C('DB_PREFIX')."game_server.servername")->
		where($condition)->order(C('DB_PREFIX').'platform.id desc')->select();
        
         
	  foreach($list as $k=>$v){ 
	    $l[$k]['id'   ]  =   $k+1;
		$l[$k]['paysn']  = $list[$k]['paysn'];
		$l[$k]['name']   = $list[$k]['uname'];
		$l[$k]['mid']    = $list[$k]['mid'];
		$l[$k]['paytype']  = $list[$k]['money'];
		$l[$k]['money'] = $list[$k]['money'];
		$l[$k]['gid']   =  $list[$k]['gamename'];
		$l[$k]['sid']   =  $list[$k]['sid']."服";
		$l[$k]['time']  = date('Y-m-d H:i:s',$list[$k]['time']);
	

      } 
	     if($get['unid'] && $get['gid']){
		    $gname = $begintime."至".$endtime."日";
		 }else if($get['mid']){
			$gname = $begintime."至".$endtime."日";
		 }else if($get['gid']){
			$gname = $begintime."至".$endtime.'日';
		 }else{
			$gname = $begintime."至".$endtime."日";
	     }
		
		exportexcel($l,array('id','订单号','账户','渠道','消费平台币金额','获得游戏币','游戏名称','服务器名称','消费时间'),$gname."-平原台消费统计");
		}
    }
	
  /**
    +----------------------------------------------------------
    * 会员管理
    +----------------------------------------------------------
    * @access public
    * @author Leon Chan<276360843@qq.com> 2012-06-10
    +----------------------------------------------------------
    */   
    public function member(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        
       //查询时间
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
		   $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	
        }else{
            $condition['regtime'] = array('between',array($get['begintime'],$get['endtime']));
        }
        
       //等级
       if($get['level']){
           $condition['level'] = array('eq',$get['level']);
       }
       
       //UID
       if($get['uid']){
           $condition['uid'] = array('eq',$get['uid']);
       }
       
       //用户名
       if($get['uname']){
           $condition['uname'] = array('eq',$get['uname']);
       }
       
       //真实姓名
       if($get['idname']){
           $condition['idname'] = array('eq',$get['idname']);
       }
       
       //身份证号码
       if($get['idcard']){
           $condition['idcard'] = array('eq',$get['idcard']);
       }
       
       //gameusername
      // if($get['gameusername']){
      //     $condition['gameusername'] = array('eq',$get['gameusername']);
      // }

       //电子邮箱
       if($get['email']){
           $condition['email'] = array('eq',$get['email']);
       }
       
       //手机号码
       if($get['mobile']){
           $condition['mobile'] = array('eq',$get['mobile']);
       }
        
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('member_info');

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $model->where($condition)->count(1); //取得总记录数
        $ShowPage->LinkAry = array('level'=>'' . $get['level'],'idname'=>'' . $get['idname'],'idcard'=>'' . $get['idcard']); //加其他的参数
		$ShowPage->LinkUrl = U('member');
        $limit = $ShowPage->OffSet();

        $list = $model->where($condition)->order('uid desc')->limit($limit)->select();

        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总注册人数
        $this->assign('sumpay',$ShowPage->Total);
        $this->assign('get',$get);    
        $this->assign('act_title','全部会员列表');  
        $this->display();
    }



   public function member_edit() {
        $map  = array_change_key_case($_REQUEST);
		
		$model = M('mid');
        $qdlist = $model->where("1=1")->select();
        $this->assign('qdlist',$qdlist);
		
		$conn = M ( 'member_info' );
		$arr ['uid'] = $_REQUEST ['uid'];
		$info = $conn->where ( $arr )->find ();
		$this->assign ( 'info', $info );
		$this->assign ( 'uid', $arr ['uid'] );
		if ($_REQUEST ['dosubmit']) {
			$map ['email'] = trim ( $_REQUEST ['email'] );
			$map ['nickname'] = trim ( $_REQUEST ['nickname'] );
			$map ['status'] = trim ( $_REQUEST ['user_status'] );
			$arr1 ['uid'] = trim ( $_REQUEST ['uid'] );
			$username = trim ( $_REQUEST ['username'] );
			$newpw = trim ( $_REQUEST ['password'] );
			if ($map ['email']) {
			  if (! preg_match ( "/\b(^(\S+@).+((\.com)|(\.net)|(\.org)|(\.info)|(\.edu)|(\.mil)|(\.gov)|(\.biz)|(\.ws)|(\.us)|(\.tv)|(\.cc)|(\..{2,2}))$)\b/", $map ['email'] )) {
				$this->error ( '您提交的数据有误:邮箱格式不正确,请检查您的输入!' );
			  }
			}
			if ($newpw) {
				if (strlen ( $newpw ) < 6 || strlen ( $newpw ) > 22) {
					$this->error ( '您提交的数据有误:密码长度为6到22位的字符,请检查您的输入!' );
				}
				$flag = uc_user_edit( $username, '', $newpw, $map ['email'], 1 );
			}else{
			uc_user_edit($username,'','',$map ['email'],1);
			}
			$st = $conn->where ( $arr1 )->save ( $map ); // 根据条件保存修改的数据
											 
		   $model = M('register_log');
           $li = $model->where("uname='{$username}'")->find();					 
		   $li ['mid'] = trim ( $_REQUEST ['mid'] );
		   $s  = $model->save ( $li ); // 修改注册日志数据恢复CPS后台首冲操作

           $this->success('修改成功!' , U('member'));
			
		}else{
        $this->assign('act_title','会员账号信息修改');
		$this->display();
		}
	}
    /**
    +----------------------------------------------------------
    * 友情链接
    +----------------------------------------------------------
    * @access public
    +----------------------------------------------------------
    */
    public function friendlink(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('friendlink');
        if($get['category'] && $get['search']){
            $totalcount = $model->where("category={$get['category']} AND webname like '%{$get['search']}%'")->order('id desc')->count();
        }elseif($get['category']){
            $totalcount = $model->where("category={$get['category']}")->order('id desc')->count();
        }elseif($get['search']){
            $totalcount = $model->where("webname like '%{$get['search']}%'")->order('id desc')->count();
        }else{
            $totalcount = $model->order('id desc')->count();
        }

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('category'=>'' . $get['category'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('friendlink');
        $limit = $ShowPage->OffSet();

        if($get['category'] && $get['search']){
            $list = $model->where("category={$get['category']} AND webname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }elseif($get['category']){
            $list = $model->where("category={$get['category']}")->order('id desc')->limit($limit)->select();
        }elseif($get['search']){
            $list = $model->where("webname like '%{$get['search']}%'")->order('id desc')->limit($limit)->select();
        }else{
            $list = $model->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

        $this->assign('list',$list);
        $this->assign('act_title','友情链接管理');
        $this->assign('act','friendlink_update');
        $this->display();
    }
   public function friendlink_add(){
    	$model = M('friendlink');
        
        $list = $model->count();
        if(empty($list)){
                $arr['sort'] = 1;
        }else{
                $arr['sort'] = $list + 1;
        }
        
        $this->assign('act_title','添加友情链接');
        $this->assign('act','friendlink_insert');
        $this->assign('vo',$arr);

	$this->display();
    }
    public function friendlink_insert(){
    	//获取POST值
    	$post = $_POST;
    	
    	//内容处理
        if(!isset($post['flag'])) $post['flag'] = '';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
    	$model = M('friendlink');
        //判断链接是否已经添加
        $link = $model->where("website='{$post['website']}'")->order('id desc')->field('id')->select();
        
        if($link){
			$this->error('链接已存在！', 'javascript:history.back();');		 
        }
        
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('friendlink'));
        $this->success("添加成功");
    }
    public function friendlink_edit(){
    	//获取ID
    	$id = $_GET['id'];
        
    	//查询修改ID信息
    	$model = M('friendlink');
        $list = $model->where("id=$id")->find();
        
        //模板赋值
        $this->assign('act_title','编辑友情链接');
        $this->assign('act','friendlink_modify');
        $this->assign('vo',$list);
        //显示模板
        $this->display();
    }
    public function friendlink_modify(){
    	//获取POST值
    	$post = $_POST;

    	//内容处理
        if(!isset($post['flag'])) $post['flag'] = '';
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';

        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        
   		$model = M('friendlink');
        //更新数据
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('friendlink'));
        $this->success("修改成功！");
    }
	
	
	   public function friendlink_del(){
       $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("friendlink")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('friendlink'));
            $this->success($say);
            }
       }

	
    /**
    +----------------------------------------------------------
    * 注册日志查询
    +----------------------------------------------------------
    * @access public
    * @author Leon Chan<276360843@qq.com> 2012-06-10
    +----------------------------------------------------------
    */  
    public function register_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询推广ID
        $mid = M('mid')->where("1=1")->select();
 
		
        $this->assign('mid',$mid);
        
       //查询时间
	   $begintime=$get['begintime'];
	   $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
		$this->error('结束时间不能小于开始时间！', 'javascript:history.back();');	

        }else{
            $sqltime      ="and F.regtime BETWEEN ".$get['begintime']." AND ".$get['endtime'];
        }
        
       //查询游戏
       if($get['gid']){
           $sqlgid      ="AND F.gid=".$get['gid'];
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //用户名
       if($get['uname']){
           $sqluname  ="and F.uname='".$get['uname']."'";
       }
       
       //推荐ID
       if($get['mid']){
           $sqlmid   ="and F.mid=".$get['mid'];
       }
       
       //注册IP
       if($get['regip']){
         $sqlregip    ="and F.regip='".$get['regip']."'";
       }

       //注册来源
       if($get['referer']){
          $sqlreferer    ="and F.referer like '%".$get['referer']."%'";
       }
       
        
        //加载分页类
        import ( "@.ORG.ShowPage" );

       if($get['sid']){
         $sqlsid      ="F.sid=".$get['sid'];
         $sql  ="WHERE $sqlsid $sqluname $sqlgid $sqlmid $sqlreferer $sqlregip $sqlremark $sqltime";
       }else{
         $sql  ="WHERE F.sid>0 $sqluname $sqlgid $sqlmid $sqlreferer $sqlregip $sqlremark $sqltime";

       }
       

        $Model = new Model ();

        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $list =  $Model->query ( "SELECT F.id FROM  ai_register_log F $sql ORDER BY id  DESC " );
        $ShowPage->Total = count( $list);//取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>'' . $get['gid'],'sid'=>'' . $get['sid'],'uid'=>'' . $get['uid'],'uname'=>'' . $get['uname'],'mid'=>'' . $get['mid'],'regip'=>'' . $get['regip'],'referer'=>'' . $get['referer'],'remark'=>''.$get['remark']); //加其他的参数
        $ShowPage->LinkUrl = U('register_log');
        $limit = $ShowPage->OffSet();

        $list =  $Model->query ( "SELECT C.mname,F.regtime,F.referer,F.regip,F.zhuansheng,F.dengji,F.jiaose,F.gid,F.sid,F.uname, F.mid,F.remark, B.servername , B.gamename
        FROM  ai_register_log
        F
            LEFT  JOIN(
                SELECT gid,sid,gamename,servername FROM  ai_game_server  
            ) AS B ON  F.gid=B.gid and F.sid=B.sid

           LEFT  JOIN(
                 SELECT mname,mid FROM  ai_mid
            ) AS C ON  F.mid=C.mid 
  
        $sql ORDER BY id  DESC LIMIT $limit" );


 

        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总注册人数
        $this->assign('sumpay',$ShowPage->Total);
        $this->assign('act_title','注册记录查询');
        $this->assign('get',$get); 
date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        if(!$get['daochu']){
		$this->display();
		}else{
        $Model = new Model ();
        $list =  $Model->query ( "SELECT F.uname,IFNULL(A.moneysum,0) moneysum,B.gamename,B.servername,F.jiaose,F.dengji,F.zhuansheng, FROM_UNIXTIME( F.regtime, '%Y-%m-%d %H:%i:%s' ) rtime,F.regip,C.mname
        FROM  ai_register_log
        F
            LEFT  JOIN(
                SELECT gid,sid,gamename,servername FROM  ai_game_server  
            ) AS B ON  F.gid=B.gid and F.sid=B.sid

           LEFT  JOIN(
                 SELECT mname,mid FROM  ai_mid
            ) AS C ON  F.mid=C.mid 

           LEFT  JOIN(
                SELECT uname,uid,SUM(payamount) moneysum FROM  ai_pay_togame  GROUP BY uname
            ) AS A ON  F.uname=A.uname

        $sql ORDER BY id  DESC

 " );


//WHERE ai_register_log.sid>0 AND ( ai_register_log.mid = '149' ) and ai_register_log.regtime BETWEEN 1451577600 AND 1479743999

	     if($get['unid'] && $get['gid']){
		    $gname = $begintime."至".$endtime."日-".$list[0]['mname'];
		 }else if($get['mid']){
			$gname = $begintime."至".$endtime."日-".$list[0]['mname'];
		 }else if($get['gid']){
			$gname = $begintime."至".$endtime.'日-'.$list[0]['mname'];
		 }else{
			$gname = $begintime."至".$endtime."日";
	     }
		exportexcel($list,array('账户','充值金额','游戏名称','服务器名称','玩家名字','等级','转生','注册时间','注册IP','渠道'),$gname."-渠道统计");
		}
		

		
    }


    public function login_log(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        
        //充值游戏
        $paygame = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('paygame',$paygame);
        
        //查询推广ID
        $mid = M('mid')->where("1=1")->select();
        $this->assign('mid',$mid);
        
   
       
       //UID
       if($get['uid']){
           $condition['uid'] = array('eq',$get['uid']);
       }
       
 

       //注册来源
       if($get['referer']){
           $condition['referer'] = array('like','%'.$get['referer'].'%');
       }
       
    

     //查询时间
       $begintime=$get['begintime'];
       $endtime=$get['endtime'];
       $get['begintime'] = strtotime($get['begintime'] . ' 00:00:00');
       $get['endtime'] = strtotime($get['endtime'] . ' 23:59:59');

        if($get['begintime'] > $get['endtime']){
        $this->error('结束时间不能小于开始时间！', 'javascript:history.back();');    

        }else{
            $sqltime      ="and F.logintime BETWEEN ".$get['begintime']." AND ".$get['endtime'];
        }
        
       //查询游戏
       if($get['gid']){
           $sqlgid      ="AND F.gid=".$get['gid'];
            //读取充值服务器列表
            $model = M('game_server');
            $payserver= $model->where("gid={$get['gid']}")->order('sid desc')->select();
            $this->assign('payserver',$payserver);
       }
       
       //用户名
       if($get['uname']){
           $sqluname  ="and F.uname='".$get['uname']."'";
       }
       
       //推荐ID
       if($get['mid']){
           $sqlmid   ="and F.mid=".$get['mid'];
           $msql   ="WHERE mid=".$get['mid'];
       }
       
       //注册IP
       if($get['loginip']){
         $sqlregip    ="and F.loginip='".$get['loginip']."'";
       }

       //注册来源
       if($get['referer']){
          $sqlreferer    ="and F.referer like '%".$get['referer']."%'";
       }
       
        
        //加载分页类
        import ( "@.ORG.ShowPage" );

       if($get['sid']){
         $sqlsid      ="F.sid=".$get['sid'];
         $sql  ="WHERE $sqlsid $sqluname $sqlgid $sqlmid $sqlreferer $sqlregip $sqlremark $sqltime";
       }else{
         $sql  ="WHERE F.sid>0 $sqluname $sqlgid $sqlmid $sqlreferer $sqlregip $sqlremark $sqltime";
       }

        //加载分页类
        import ( "@.ORG.ShowPage" );

        $Model = new Model ();
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        //$ShowPage->Total = $model->where($condition)->order('id desc')->count(); //取得总记录数
        $list =  $Model->query ( "SELECT COUNT(*) AS count FROM  ai_login_log F $sql ORDER BY id desc LIMIT 1" );
        $ShowPage->Total =  $list[0]['count'];//取得总记录数
        $ShowPage->LinkAry = array('begintime'=>date('Y-m-d',$get['begintime']),'endtime'=>date('Y-m-d',$get['endtime']),'gid'=>'' . $get['gid'],'sid'=>'' . $get['sid'],'uid'=>'' . $get['uid'],'uname'=>'' . $get['uname'],'mid'=>'' . $get['mid'],'loginip'=>'' . $get['loginip'],'referer'=>'' . $get['referer'],'remark'=>''.$get['remark']); //加其他的参数
		$ShowPage->LinkUrl = U('login_log');
        $limit = $ShowPage->OffSet();


       
        $list =  $Model->query ( "SELECT D.logintime,D.referer,D.loginip,D.gid,D.sid,D.mid,D.remark,D.uname,C.mname,B.servername,B.gamename 
FROM 
(SELECT F.id,F.logintime,F.referer,F.loginip,F.gid,F.sid,F.mid,F.remark,F.uname FROM ai_login_log F $sql) AS D 

LEFT JOIN
( SELECT gid,sid,gamename,servername FROM ai_game_server ) AS B
 ON D.gid=B.gid AND D.sid=B.sid

  LEFT JOIN
( SELECT mname,MID FROM ai_mid $msql ) AS C 
ON D.mid=C.mid  

ORDER BY D.id DESC LIMIT $limit

 " );
/**大数据优化

*/
        $this->assign('list',$list);
        $this->assign('ShowPage',$ShowPage->ShowLink());
        
//        echo $model->getLastSql();
//        die;
        
        //查询总注册人数
        $this->assign('sumpay',$ShowPage->Total);
        $this->assign('act_title','登陆记录查询');
        $this->assign('get',$get);        
        $this->display();
    }
    /**
    +----------------------------------------------------------
    * 游戏官网
    +----------------------------------------------------------
	* @author	st
	* @version	2013-05-16 15:12:35
    +----------------------------------------------------------
    */
    
    public function gamesitelist(){
        $model = M('gamesite_list');
        //$list = $model->order('gid DESC')->select();
        $list = $model->alias('glist')->join(C('DB_PREFIX').'game game on game.id=glist.gid')->field('game.gamename,glist.*')->order('gid DESC')->select();
        $this->assign('countnum',count($list));
        $this->assign('act_title','游戏官网管理');
        $this->assign('list',$list);
        $this->display();
    }
    
    public function gamesitelist_add(){
    	$model = M('game');
    	$gamelist = $model->field('id,tag,gamename')->where('id not in (select gid from '.C('DB_PREFIX').'gamesite_list)')->select();
		$zhuti = M('zhuti')->order('id DESC')->select();
        $this->assign('gamelist',$gamelist);
        $this->assign('vopic_banner',$vo['pic_banner']);
        $this->assign('zhuti',$zhuti);
        $this->assign('act_title','添加游戏官网信息');
        $this->assign('act','gamesitelist_insert');
		$this->display();
    }
	
    public function gamesitelist_edit(){
	    $gid  = $_GET['gid'];
    	$model = M('game');
    	$gamelist = $model->field('id,tag,gamename')->where('id=%d',$gid)->select();
		$zhuti = M('zhuti')->order('id DESC')->select();
        $this->assign('gamelist',$gamelist);
    	$model = M('gamesite_list');
        $vo = $model->where("gid=%d",$gid)->find();
		if(empty($vo)){
			$this->assign('jumpUrl',U('gamesitelist') );
			$this->error("无记录");
		}
	
		
        $vo['pic_banner'] = json_decode($vo['pic_banner'],true);
        $vo['pic_nav'] = json_decode($vo['pic_nav'],true);
        $vo['pic_snap'] = json_decode($vo['pic_snap'],true);
		$vo['pic_list'] = json_decode($vo['pic_list'],true);
		$vo['pic_bg'] = json_decode($vo['pic_bg'],true);
		$vo['meiti'] = json_decode($vo['meiti'],true);
		
  
		
        $this->assign('vopic_bg',$vo['pic_bg']);
        $this->assign('vopic_list',$vo['pic_list']);
        $this->assign('vopic_snap',$vo['pic_snap']);
        $this->assign('vopic_nav',$vo['pic_nav']);
        $this->assign('vopic_banner',$vo['pic_banner']);
        $this->assign('meiti',$vo['meiti']);
		
        $this->assign('zhuti',$zhuti);
        $this->assign('act_title','编辑官网信息');
        $this->assign('act','gamesitelist_modify');
        $this->assign('vo123',$vo);
        $this->display();
    }
	
    public function gamesitelist_insert(){
        $get = array_change_key_case($_REQUEST);
        $post['addtime'] = $get['addtime'];
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$post['gid'] = $get['gid'];
		$post['zhuti'] = $get['zhuti'];
		$post['listzhuti'] = $get['listzhuti'];
		$post['sitename'] = $get['sitename'];
		$post['title'] = $get['title'];
		$post['keywords'] = $get['keywords'];
		$post['description'] = $get['description'];
		
		$post['pic_banner'] = json_encode($get['pic_banner']);
		$post['pic_nav'] = json_encode($get['pic_nav']);
		$post['pic_snap'] = json_encode($get['pic_snap']);
       	$post['pic_list'] = json_encode($get['pic_list']);
		$post['pic_bg']  = json_decode($get['pic_bg']);
		$post['meiti']  = json_decode($get['meiti']);

		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();
		$bs = ucfirst($game['tag']);
		/////////////////////////写官网
	    $dir = $_SERVER ['DOCUMENT_ROOT'];
	    if (! $dir . '/Source/Lib/Action/'.$bs.'Action.class.php') {
	    $this->write_file ( $dir . '/Source/Lib/Action/'.$bs.'Action.class.php', "<?php
define('tag', '".$bs."'); 
class ".$bs."Action extends homeCommonAction {
}
?>");
		}
		//////////////////////
    	$model = M('gamesite_list');
        $qdcount = $model->where("gid=%d",$post['gid'])->count();
        if($qdcount>0){
		$this->assign('jumpUrl',U('gamesitelist'));
		$this->error('对应的游戏官网信息已存在！');	
        }
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();
        //成功跳转
		$this->assign('jumpUrl',U('gamesitelist'));
        $this->success('官网信息添加成功！');
	}
	
    public function gamesitelist_modify(){
	
        $get = array_change_key_case($_REQUEST);
        $post['modifytime'] = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$post['gid'] = $get['gid'];
		$post['zhuti'] = $get['zhuti'];
		$post['listzhuti'] = $get['listzhuti'];
		$post['sitename'] = $get['sitename'];
		$post['title'] = $get['title'];
		$post['keywords'] = $get['keywords'];
		$post['description'] = $get['description'];
		$post['pic_banner'] = json_encode($get['pic_banner']);
		$post['pic_nav'] = json_encode($get['pic_nav']);
		$post['pic_snap'] = json_encode($get['pic_snap']);
       	$post['pic_list'] = json_encode($get['pic_list']);
       	$post['pic_bg'] = json_encode($get['pic_bg']);
		$post['meiti']  = json_encode($get['meiti']);

		$model = M('game');
    	$game = $model->where('id=%d',$post['gid'])->find();
		
		$bs = ucfirst($game['tag']);
		/////////////////////////写官网
	    $dir = $_SERVER ['DOCUMENT_ROOT'];
		
	    if (! $dir . '/Source/Lib/Action/'.$bs.'Action.class.php') {
	    $this->write_file ( $dir . '/Source/Lib/Action/'.$bs.'Action.class.php', "<?php
define('tag', '".$bs."'); 
class ".$bs."Action extends homeCommonAction {
}
?>");
		}
         ////////////////////
    	$model = M('gamesite_list');
        $qdcount = $model->where("gid=%d",$post['gid'])->count();
        if($qdcount<1){
		$this->assign('jumpUrl',U('gamesitelist'));
		$this->error('对应的游戏官网信息不存在！gid='.$post['gid'], U('gamesitelist'));	
        }
        $model->create();
        $model->save($post);
		
	echo "<pre>";
	    print_r($post['meiti']);
		echo "</pre>";
		
		
        $this->success('官网信息修改成功！');

	}

    public function gamepublish(){
	$get = array_change_key_case($_REQUEST);
	
    	import ( "@.ORG.ShowPage" );
    	$cate = $this->gamepublish_cate();
    	$this->assign('cate',$cate);
    	//die($this->_get);
        $model = M('game');
    	$game = $model->field('id,gamename')->select(); 
        foreach($game as $value){
    		$tpl_game[$value['id']] = $value['gamename'];
    	}
    	$this->assign('game',$game);
    	$this->assign('tpl_game',$tpl_game);   	   	
    	
    	$model = M('gamesite_title');
    	
    	$where = "1 = 1";
    	if($get['game']){
    		$where .= " AND gid=".$get['game'];
    	}
    	if($get['cate']){
    		$where .= " AND cate=".$get['cate'];
    	}
    	$totalcount = $model->where($where)->order('id')->count();
    	    	
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = $this->pagecount; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数 
        $ShowPage->LinkAry = array();
        $limit = $ShowPage->OffSet();
     	$ShowPage->LinkUrl = U('gamepublish');
        $list = $model->where($where)->order('id DESC')->limit($limit)->select();

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

        $this->assign('list',$list);
        $this->assign('act','friendlink_update');
        
        $this->assign('get_game', $get['game']);
        $this->assign('get_cate', $get['cate']);
        $this->display();
    }
    
     public function gamepublishadd(){
     	$cate = $this->gamepublish_cate();
     	$this->assign('cate',$cate);
     	
        $model = M('game');
    	$game = $model->where('isdisplay=1 and status=1')->field('id,gamename')->select(); 
    	$this->assign('game',$game);
     	     		
     	if($_POST){
     		$arr[title] 	= $this->_post('title') ? $this->_post('title') : $this->error('标题不能为空');
     		$arr[color] 	= $this->_post('color');
     		$arr[cate] 		= $this->_post('cate') ? $this->_post('cate') : $this->error('类别不能为空');
     		$arr[gid] 		= $this->_post('game') ? $this->_post('game') : $this->error('游戏不能为空');
     		$arr[target]	= $this->_post('target');
     		$arr[author] 	= $this->_post('author');
     		$arr[redirect]	= $this->_post('url');
     		$arr[click_num]	= $this->_post('clicknum');
     		$arr[status]	= $this->_post('status');
			$arr[pic]   = $this->_post('pic');
			$arr[ccontent]   = $this->_post('ccontent');
			$arr[content] = str_replace('background:#FFFFFF;','',$this->_post('content'));
			$arr[content] = str_replace('background-color:#FFFFFF;','',$this->_post('content'));
     		$arr[time]		= strtotime($this->_post('addtime'));
  		
     		$model = M('gamesite_title');
     		$id = $model->add($arr);
     		
     		
     		$this->success("添加成功！");
     		return;
     	}   	
        $this->assign('act_title','添加官网信息');
     	$this->display();
     }
     
     public function gamepublishedit(){
     	$cate = $this->gamepublish_cate();
     	$this->assign('cate',$cate);
     	
        $model = M('game');
    	$game = $model->where('isdisplay=1 and status=1')->field('id,gamename')->select(); 
    	$this->assign('game',$game);
     	
     	$id = $this->_get('id');
     	$model = M('gamesite_title');
     	$title = $model->where("id={$id}")->find();
     	

    	$this->assign('title',$title);
     	$this->assign('content',$title);
     	     	     	
     	if($_POST){
     		$arr[id]		= $this->_post('id');
     		$arr[title] 	= $this->_post('title') ? $this->_post('title') : $this->error('标题不能为空');
     		$arr[color] 	= $this->_post('color');
     		$arr[cate] 		= $this->_post('cate') ? $this->_post('cate') : $this->error('类别不能为空');
     		$arr[gid] 		= $this->_post('game') ? $this->_post('game') : $this->error('游戏不能为空');
     		$arr[target]	= $this->_post('target');
     		$arr[author] 	= $this->_post('author');
     		$arr[redirect]	= $this->_post('url');
     		$arr[click_num]	= $this->_post('clicknum');
     		$arr[status]	= $this->_post('status');
			$arr[pic]   = $this->_post('pic');
			$arr[ccontent]  = $this->_post('ccontent');
			$arr[content]   = str_replace('background:#FFFFFF;','',$this->_post('content'));
			$arr[content]   = str_replace('background-color:#FFFFFF;','',$this->_post('content'));
     		$arr[time]		= strtotime($this->_post('addtime'));
  		
     		$model = M('gamesite_title');
     		$id = $model->save($arr);


     		
     		$this->success("修改成功！", U('gamepublish'));
     		return;
     	}   	
        $this->assign('act_title','官网信息修改');
     	$this->display();
     }
     
     public function gamepublish_cate(){
     	return array(1=>'新闻公告', 2=>'游戏活动', 3=>'媒体资讯', 4=>'合区资讯', 5=>'游戏攻略', 6=>'游戏资料(日常活动)', 7=>'新手指引', 8=>'高手进阶', 9=>'特色玩法', 10=>'游戏图片');
     }
	 
	 public function gamesitelist_del(){
             $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("gamesite_list")->execute('DELETE FROM __TABLE__ where `gid` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('gamesitelist'));
            $this->success($say);
            }
     }
	 
	 	 public function gamepublish_del(){
             $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("gamesite_title")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('gamepublish'));
            $this->success($say);
            }
     }

    /**
    +----------------------------------------------------------
    * 渠道结算列表
    +----------------------------------------------------------
	* @author	st
	* @version	2013-04-22 13:44:09
    +----------------------------------------------------------
    */
	 public function qudaotongji(){
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

    public function jiesuan(){
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
    	$arr = M("pay_togame")->where("tid=$v1 and process='1,1,1' ")->getField("payamount",true);
	  foreach($arr as $val){
		$count +=$val;
	   }
	    $list[$k]['tong'] = $count;
		$list[$k]['fencheng'] = $count*$list[$k]['bili'];
		$list[$k]['yu'] = $count*$list[$k]['bili'] - ($list[$k]['fid'] + $list[$k]['jump']);
		$count='0';
      }
		
		
		
		
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','结算管理');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
		
    }
	public function jiesuan_edit(){
		$id = $_GET['id'];

    	$model = M('mid');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加渠道信息');
        $this->assign('act','jiesuan_modify');
        $this->assign('vo',$list);
		$this->display();
    }
public function jiesuan_modify(){
    	//获取POST值
    	$post = $_POST;
		
   		$model = M('mid');
        //更新数据
		
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('jiesuan'));
        $this->success("修改成功！");
    }

    public function jiesuangl(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        //加载分页类
        import ( "@.ORG.ShowPage" );

        $model = M('mid_jiesuan');
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
    	$arr = M("pay_togame")->where("tid=$v1 and process='1,1,1' ")->getField("payamount",true);
		$m = M("mid")->where("mid=$v1")->order('id desc')->find();
		
	  foreach($arr as $val){
		$count +=$val;
	   }

	    $list[$k]['fid'] = $m['fid'];
		$list[$k]['jump'] = $m['jump'];
		$list[$k]['bili'] = $m['bili'];
	    $list[$k]['tong'] = $count;
		$list[$k]['fencheng'] = $count*$m['bili'];
		$list[$k]['yu'] = $count*$m['bili'] - ($list[$k]['fid'] + $list[$k]['jump']);
		$count= '0';
      }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());
        $this->assign('act_title','结算信息统计');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
		
    }
	public function jiesuangl_edit(){
		$id = $_GET['id'];

    	$model = M('mid_jiesuan');
        $list = $model->where("id=$id")->find();
        
        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','结算帐户信息查看');
        $this->assign('act','jiesuan_modify');
        $this->assign('vo',$list);
		$this->display();
    }
	 	 public function jiesuangl_del(){
             $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("mid_jiesuan")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('jiesuangl'));
            $this->success($say);
            }
     }
	 
    /**
    +----------------------------------------------------------
    * 渠道列表
    +----------------------------------------------------------
	* @author	st
	* @version	2013-04-22 13:44:09
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
        $this->assign('act_title','渠道列表');
        $this->assign('list',$list);
        $this->assign('act','qudao_update');
        $this->display();
    }
    public function qudao_add(){
        $model = M('mid_qudao');
        
        $list = $model->max('mid');
        if(empty($list)){
                $arr['mid'] = 1;
        }else{
                $arr['mid'] = $list + 1;
        }

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','添加渠道信息');
        $this->assign('act','qudao_insert');
        $this->assign('vo',$arr);
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
    	$post = $_POST;
		
        $p['id'] = $post['id'];
        $p['mid'] = $post['mid'];
		$p['mname'] = $post['mname'];
		$p['bili'] = $post['bili'];
		$p['status'] = $post['status'];
        $p['addtime'] = strtotime($post['addtime']);
	 if($post['password']){
        $p['password'] = md5($post['mid'].$post['password']);
      }
   		$model = M('mid');
        //更新数据
		
        $model->save($p);

        //成功跳转
        $this->assign('jumpUrl',U('qudao'));
        $this->success("修改成功！");
    }




    public function qudao_insert(){
        //获取POST值
        $post = $_POST;
        
        
        $post['addtime'] = strtotime($post['addtime']);
        $post['modifytime'] = $_SERVER['REQUEST_TIME'];
        $post['password']   =md5($post['password']);
        $model = M('mid_qudao');
        //判断链接是否已经添加
        $qdcount = $model->where("id='{$post['id']}' or mname='{$post['mname']}'")->count();
        
        if($qdcount>0){
        $this->assign('jumpUrl',U('qudao_add'));
        $this->error('渠道MID或渠道名称已存在！'); 
        }
        
        //插入数据
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl', U('qudao'));
        $this->success("添加成功");
    }
    
	public function qudao_genurl(){
    	$model = M('mid');

        $qdlist = $model->where("1=1")->select();
        $this->assign('qdlist',$qdlist);

        //游戏列表
        $gamelist = M('game')->where('id >1')->order('id asc')->select();
        $this->assign('gamelist',$gamelist);

        $this->assign('act_title','推广广告链接生成');
        $this->assign('act','qudao_genurl_insert');
        //$this->assign('vo',$arr);
		$this->display();
    }
	 	 public function qudao_del(){
             $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
            if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
            $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
            $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
            $Result=D("mid")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
            $say='删除成功';
            if($Result===false) {	 
			$this->error('操作失败');	 
			}else{
            $this->assign('jumpUrl',U('qudao'));
            $this->success($say);
            }
     }
	
	
	 
  public function server_list1(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        $tag = $get['tag'];
        
        if($tag){
            //读取充值游戏列表
            $model = M('game_server');
			
            $payserver= $model->where("tag='{$tag}' AND status=1")->order('sid desc')->select();
            echo "<option value=0>--请选择服务器--</option>\r\n";
            foreach ($payserver as $v){
                echo "<option value={$v['sid']}>{$v['line']}{$v['sid']}区 {$v['servername']}</option>\r\n";
            }
        }else{
            echo "<option value=0>--请选择服务器--</option>\r\n";
        }
    }
  public function server_list(){
        //参数转化为小写
        $get = array_change_key_case($_REQUEST);
        $gid = $get['gid'];
        
        if($gid){
            //读取充值游戏列表
            $model = M('game_server');
			
            $payserver= $model->where("gid='{$gid}' AND status=1")->order('sid desc')->select();
            echo "<option value=0>--请选择服务器--</option>\r\n";
            foreach ($payserver as $v){
                echo "<option value={$v['sid']}>{$v['line']}{$v['sid']}区 {$v['servername']}</option>\r\n";
            }
        }else{
            echo "<option value=0>--请选择服务器--</option>\r\n";
        }
    }
//批量配服
	 	public function server_pladd(){
    	//获取POST值
    	$post = $_REQUEST;
      if($post['cdkeys']){

          $post['date'] = $post['date'];	//strtotime(

		  $cardarr = explode("\r\n\r\n",$post['cdkeys'] );
		  
	foreach ($cardarr as $vo) {
		  $i= $i+1;
			if ($vo != ''){
		       $plarr = explode("\r\n",$vo );
		       $data = array();
		    	   foreach ($plarr as $k => $v) { $vv[$k] = trim($v);}
				    $mc  = preg_replace('/游戏名称:/', '', $vv[0]); 
			        $qf  = preg_replace('/新开区服:/', '', $vv[1]); 
					$gid = preg_replace('/混服GID:/', '', $vv[2]); 
					$sid = preg_replace('/混服SID:/', '', $vv[3]); 
			        $sj  = preg_replace('/开服时间:/', '', $vv[4]); 
					//时间格式判断
				   $sjpd  = preg_match("/^[0-9]{4}(\-|\/)[0-9]{1,2}(\\1)[0-9]{1,2}(|\s+[0-9]{1,2}(|:[0-9]{1,2}(|:[0-9]{1,2})))$/",$sj);
				if(!$sjpd){
				   $this->assign('jumpUrl','javascript:history.back();');
		           $this->assign('waitSecond','4');
				   $this->error('第'.$i.'条开服时间有错误，请检查！');	
				 }
				 //新开区服判断
				 $qfpd = is_numeric($qf); //数字=1 //否则=空
				if(!$qfpd){
				   $this->assign('jumpUrl','javascript:history.back();');
		           $this->assign('waitSecond','4');
				   $this->error('第'.$i.'条区服配置有错误，请检查！');	
				 }
				 //混服SID判断
				 $sidpd = is_numeric($sid); //数字=1 //否则=空
				if(!$sidpd){
				   $this->assign('jumpUrl','javascript:history.back();');
		           $this->assign('waitSecond','4');
				   $this->error('第'.$i.'条混服SID配置有错误，请检查！');	
				 }
    	            $model = M('game');
    	            $gamelist = $model->where("gamename='{$mc}'")->order('id desc')->field('id,tag,gamename,status')->find();
				if (!$gamelist){
				   $this->assign('jumpUrl','javascript:history.back();');
		           $this->assign('waitSecond','4');
				   $this->error('第'.$i.'条游戏名称错误，请与游戏管理查看是否有此游戏信息！');	 
				}	
			}				
		 }
		  
		  
		  $i= 0;
		  foreach ($cardarr as $vo) {
		  $i= $i+1;
			if ($vo != ''){
		       $plarr = explode("\r\n",$vo );
		       $data = array();
		    	   foreach ($plarr as $k => $v) {
			        $vv[$k] = trim($v);
		           }
				    $mc  = preg_replace('/游戏名称:/', '', $vv[0]); 
			        $qf  = preg_replace('/新开区服:/', '', $vv[1]); 
					$gid = preg_replace('/混服GID:/', '', $vv[2]); 
					$sid = preg_replace('/混服SID:/', '', $vv[3]); 
			        $sj  = preg_replace('/开服时间:/', '', $vv[4]); 

			        $vv['status'] = 1;
			        $vv['isdisplay'] = 1;
			        $vv['ispay'] = 1;
			        $vv['ismix'] = 1;
			        $vv['line'] = "双线";
			        $vv['addtime'] = strtotime($post['date']);  //添加时间
				    //以上固定		
						
    	            $model = M('game');
    	            $gamelist = $model->where("gamename='{$mc}'")->order('id desc')->field('id,tag,gamename,status')->find();
				    $vv['gamename'] = $gamelist['gamename'];
				    $vv['gid']      = $gamelist['id'];
				    $vv['tag']      = $gamelist['tag'];
				    $vv['sid']      = $qf;
				    $vv['servername'] = '双线'.$qf.'服';
				    //以上自动识别
				
				    $vv['gameid'] = $gid;
				    $vv['severid'] = $sid;
				    $vv['extend'] = '{"repairmessage":"","repairbegintime":1392876000,"repairendtime":1392876000,"gameid":"'.$gid.'","mid":"'.$sid.'"}';
			        $vv['begintime'] = strtotime($sj); //开服时间
			     }
	         $data[] = $vv; 	
    	     $model = M('game_server');
             //插入数据
             $model->create();
             $insert = $model->addAll($data);
	      }
        //成功跳转
        $this->assign('jumpUrl',U('server'));
		$this->assign('waitSecond','5');
        $this->success("添加成功，本次共添加".$i."条开服信息！");
		die();
		}
        $this->assign('act','server_pladd');
        //成功跳转
		$this->assign('act_title','批量配置服务器');
       	$this->display();
    }	 
	 

// 写入文件
function write_file($l1, $l2 = '') {
	$dir = dirname ( $l1 );
	
	if (! is_dir ( $dir )) {
		
		mkdirss ( $dir );
	}
	
	return @file_put_contents ( $l1, $l2 );
}
// 递归创建文件
function mkdirss($dirs, $mode = 0777) {
	if (! is_dir ( $dirs )) {
		
		mkdirss ( dirname ( $dirs ), $mode );
		
		return @mkdir ( $dirs, $mode );
	}
	
	return true;
}

//结束
}
?>