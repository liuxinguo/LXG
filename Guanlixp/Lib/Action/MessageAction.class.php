<?php
class MessageAction extends CommonAction
{
    public function message_manage()
    {
   
        $model = M('Message');
        //加载分页类
        import ( "@.ORG.ShowPage" );
        
       $totalcount = $model->order('id desc')->count();
      
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = 20; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('cid'=>'' . $get['cid'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('message_manage');
        $limit = $ShowPage->OffSet();

        $list = $model->order('id desc')->limit($limit)->select();
       
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

    	$this->assign('list',$list);
        $this->assign('get', $get);
		$this->assign('act_title','新闻管理');
        //显示模板
        $this->display();
    }

	    //文章添加
    public function Message_add(){   
   
        $this->assign('act_title','添加新闻');
        $this->assign('act','Message_insert');
        $this->display();
    }
    //文章添加插入
    public function Message_insert(){
	
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
        $model = M('Message');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl',U('message_manage'));
        $this->success("添加成功！");
    }
    //文章编辑查看
    public function Message_edit(){
    	//获取ID
    	$id = $_GET['id'];

    	//查询修改ID信息
    	$news = M('Message');
        $list = $news->where("id=$id")->find();
        $flags = explode(',', $list['flag']);
        foreach ($flags as $value){
            $flag[$value] = $value;
        }
        //模板赋值
        $this->assign('act_title','编辑新闻');
        $this->assign('act','Message_modify');
        $this->assign('flag',$flag);
        $this->assign('vo',$list);
        //显示模板
        $this->display();
    }
    //文章编辑提交
    public function Message_modify(){
    	//获取POST值
    	$post = $_POST;

    	//内容处理
        if(!isset($post['isdisplay'])) $post['isdisplay'] = '0';
        if(!isset($post['status'])) $post['status'] = '0';
        $post['flag'] = implode(',', $post['flags']);
        $post['addtime'] = strtotime($post['addtime']);
        
        

        //更新数据
        $model = M('Message');
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('message_manage'));
        $this->success("修改成功！");
    }	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function del()
    {
        if (!$_GET['id']) {
            $this->assign('jumpUrl', '__URL__');
            $this->error('数据不存在！');
        }
        if ($model = M('Message')->where('id=' . $_GET['id'])->delete()) {
            $this->success('删除成功！');
        } else {
            $this->error('删除失败!');
        }
    }
	
	public function message_del(){
        $getid=$_POST['duoxuanHidden'];//获取选择的复选框的值
      if (!$getid) $this->error('未选择记录') ;//没选择就提示信息
        $getids=implode(',',$getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
        $id = is_array($getid)?$getids:$getid;//如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值最后进行数据操作,例如你的是
        $Result=D("Message")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
        $say='删除成功';
        if($Result===false)
        {	 $this->error('操作失败');	 
		}else{
       $this->assign('jumpUrl',U('message_manage'));
       $this->success($say);
       }
     }
	
}