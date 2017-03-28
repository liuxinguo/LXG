<?php
class ManageAction extends CommonAction
{
    public function index()
    {
   
        $model = M('admin');
        //加载分页类
        import ( "@.ORG.ShowPage" );
        
       $totalcount = $model->join(C('DB_PREFIX')."admin_cate on ".C('DB_PREFIX')."admin.cata=".C('DB_PREFIX')."admin_cate.id")->field(C('DB_PREFIX')."admin.*,".C('DB_PREFIX')."admin_cate.name,".C('DB_PREFIX')."admin_cate.id")->order(C('DB_PREFIX').'admin.adminid desc')->count();
      
        //实例化类
        $ShowPage = new ShowPage;
        $ShowPage->PageSize = 20; //每页显示记录
        $ShowPage->Total = $totalcount; //取得总记录数
        $ShowPage->LinkAry = array('cid'=>'' . $get['cid'],'search'=>'' . $get['search']); //加其他的参数
		$ShowPage->LinkUrl = U('index');
        $limit = $ShowPage->OffSet();

        $list = $model->join(C('DB_PREFIX')."admin_cate on ".C('DB_PREFIX')."admin.cata=".C('DB_PREFIX')."admin_cate.id")->field(C('DB_PREFIX')."admin.*,".C('DB_PREFIX')."admin_cate.name,".C('DB_PREFIX')."admin_cate.id")->order(C('DB_PREFIX').'admin.adminid desc')->limit($limit)->select();
       
        $this->assign('countnum',count($list));
        $this->assign('ShowPage',$ShowPage->ShowLink());

    	$this->assign('list',$list);
        $this->assign('get', $get);
		$this->assign('act_title','角色管理');
        //显示模板
        $this->display();
    }

	    //文章添加
    public function Manage_add(){   
	
        $cate = M('admin_cate')->order('id asc')->select();
        $this->assign('categame',$cate);
		
        $this->assign('act_title','添加角色');
        $this->assign('act','Manage_insert');
        $this->display();
    }
    //文章添加插入
    public function Manage_insert(){
	
        //获取POST值
        $post = $_POST;
        $post['adminpassword'] = md5($post['adminpassword']);
        //插入数据
        $model = M('admin');
        $model->create();
        $insert = $model->data($post)->add();

        //成功跳转
        $this->assign('jumpUrl',U('Manage/index'));
        $this->success("添加成功！");
    }
    //文章编辑查看
    public function Manage_edit(){
    	//获取ID
    	$id = $_GET['id'];
		
        $cate = M('admin_cate')->order('id asc')->select();
        $this->assign('categame',$cate);
		
    	//查询修改ID信息
    	$news = M('admin');
        $list = $news->where("adminid=$id")->find();
        $flags = explode(',', $list['flag']);
        foreach ($flags as $value){
            $flag[$value] = $value;
        }
        //模板赋值
        $this->assign('act_title','编辑角色信息');
        $this->assign('act','Manage_modify');
        $this->assign('flag',$flag);
        $this->assign('vo',$list);
        //显示模板
        $this->display();
    }
    //文章编辑提交
    public function Manage_modify(){
    	//获取POST值
    	$post = $_POST;
		if($post['password']){
        $post['adminpassword'] = md5($post['password']);
		 } else {
		$post['adminpassword'] = $post['adminpassword'];

		}

        //更新数据
        $model = M('admin');
        $model->save($post);

        //成功跳转
        $this->assign('jumpUrl',U('manage/index'));
        $this->success("修改成功！");
    }	
	
	
	
	
	
	
	
    public function del()
    {
        if (!$_GET['id']) {
            $this->assign('jumpUrl', '__URL__');
            $this->error('数据不存在！');
        }
        if ($model = M('admin')->where('adminid=' . $_GET['id'])->delete()) {
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
        $Result=D("admin")->execute('DELETE FROM __TABLE__ where `adminid` IN ('.$id.')');
        $say='删除成功';
        if($Result===false)
        {	 $this->error('操作失败');	 
		}else{
       $this->assign('jumpUrl',U('Manage/index'));
       $this->success($say);
       }
     }
	
}