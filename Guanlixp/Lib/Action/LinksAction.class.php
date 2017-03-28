<?php
class LinksAction extends CommonAction
{
	var $pagecount = 20;
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
            $list = $model->join(C('DB_PREFIX')."game on ".C('DB_PREFIX')."game.id=".C('DB_PREFIX')."friendlink.gid")->field(C('DB_PREFIX').'game.gamename,'.C('DB_PREFIX').'friendlink.*')->order('id desc')->limit($limit)->select();
        }

        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

        $this->assign('list',$list);
        $this->assign('act_title','友情链接管理');
        $this->assign('act','friendlink_update');
        $this->display();
    }
   public function friendlink_add(){
   
    	//查询游戏列表
    	$game = M('game') ->where('status=1')->order('id desc')->field('id,tag,gamename,status')->select();
    	$this->assign('game',$game);
   
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
		
    	//查询游戏列表
    	$game = M('game') ->where('status=1')->order('id desc')->field('id,tag,gamename,status')->select();
    	$this->assign('game',$game);
		
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

   
}