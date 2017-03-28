<?
/******** Last Modified **********
* $Author: Night $ 
* $Modtime: 08-07-16 00:20 $ 
* $Revision: V1.0 $ 
* $Explain: Show Page Class
*/
 class ShowPage extends Think {
    var $PageSize;     //每页显示的记录数
    var $Total;        //记录总数
    var $LinkUrl;      //链接地址
    var $LinkAry;      //Url参数数组，对于复合条件查询分页显示情况非常好用
    
    function __construct() {
//        echo '<pre>';
//        print_r($_SERVER);
        if ($_SERVER['QUERY_STRING']) {
                $u = $_SERVER['QUERY_STRING'];
                if (strstr($u,"page")) {
                        $tmp = explode("page",$u);
                        $u = $tmp[0];
                }
        } else {
                $u = "";
        }
        if (empty($u)) {
                $u = "?";
        } else {
                if (substr($u,strlen($u)-1) == "&") {
                        $u = "?".$u;
                } else {
                        $u = "?".$u."&";
                }
        }
        strstr($u,"page") and $t = explode("page".$u);
        $this -> LinkUrl = str_replace($u.$t[0], $_SERVER['QUERY_STRING'], '?');
    }

    //取得总页数
    function PageCount() {
          $TotalPage = ($this->Total % $this->PageSize == 0) ? floor($this->Total / $this->PageSize) :  floor($this->Total / $this->PageSize)+1;
          return $TotalPage;
    }

    //取得当前页
    function PageNum() {
          $page =  (isset( $_GET['page'])!="") ? $_GET['page'] :  $page = 1; 
          return $page;
    }

    //查询语句定位指针 For Mysql
    function OffSet() {
          if ($this->PageNum() > $this->PageCount()) {
                         $pagemin = max(0,$this->Total - $this->PageSize - 1);
          }else if ($this->PageNum() == 1){
                          $pagemin = 0;
          }else{
                          $pagemin = min($this->Total - 1,$this->PageSize * ($this->PageNum() - 1));
                          if($this->PageNum() == $this->PageCount()) {
                                $last = ($this->Total - $this->PageSize * ($this->PageNum() - 1));
                          } else {
                                $last =$this->PageSize;
                          }
                          return $pagemin . "," . $last;
          }

          return $pagemin . "," . $this->PageSize;
    }

    //定位首页  
    function FristPage() {
          $Frist = ($this->PageNum() <= 1) ? " " : "<a href=\"".$this->LinkUrl."&page=1".$this->Url($this->LinkAry)."\">首页</a> ";
          return $Frist;
    }

    //定位上一页
    function PrePage() {
          $prepage=$this->PageNum() - 1;
          $Previous = ($this->PageNum() >= 2) ? " <a href=\"".$this->LinkUrl."&page=".$prepage.$this->Url($this->LinkAry)."\">上一页</a> " : "<span>首页</span> ";
          return $Previous;
    }

    //定位下一页
    function NextPage() {
          $nextpage = $this->PageNum() + 1;
          $Next = ($this->PageNum() <= $this->PageCount()-1) ? " <a href=\"".$this->LinkUrl."&page=".$nextpage.$this->Url($this->LinkAry)."\">下一页</a> " : "<span>下一页</span> ";
          return $Next;
    }

    //定位最后一页
    function LastPage() {
          $Last = ($this->PageNum() >= $this->PageCount()) ? "<span>尾页</span> " : " <a href=\"".$this->LinkUrl."&page=".$this->PageCount().$this->Url($this->LinkAry)."\">尾页</a> ";
          return $Last;
    }

    //下拉跳转页面
    function JumpPage() {
     $Jump = "  <span>页码：<b><font color='red'>".$this->PageNum()."</font></b>/<b><font color='red'>".$this->PageCount()."</font></b>";
         $Jump.="&nbsp;&nbsp;每页<b><font color='red'>".$this->PageSize."</font></b>条 , 共<b><font color='red'>".$this->Total."</font></b>条记录";
         $Jump.="&nbsp;&nbsp;跳转 <select name=page onchange=\"javascript:location=this.options[this.selectedIndex].value;\">";
          for ($i=1; $i<=$this->PageCount(); $i++) 
          {
                  if ($i==$this->PageNum())
                         $Jump .= "<option value=\"".$this->LinkUrl."&page=".$i.$this->Url($this->LinkAry)."\" selected>$i</option>";
                  else 
                         $Jump .="<option value=\"".$this->LinkUrl."&page=".$i.$this->Url($this->LinkAry)."\">$i</option> "; 
          }
                  $Jump .= "</select></span>";
                  return $Jump;
    }

    //URL参数处理
    function Url($ary) 
    {
        $Linkstr = "";
        if (count($ary) > 0) {
            foreach ($ary as $key => $val) {
                $Linkstr .= "&".$key."=".$val;
            }
        }
        return $Linkstr;
    }

    //生成导航条
    function ShowLink() {
        return $this->FristPage().$this->PrePage().$this->NextPage().$this->LastPage().$this->JumpPage();
    }
 }
?>