<?php defined('IN_IA') or exit('Access Denied');?> 
  <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="" class="form-horizontal" method="post">
                <input type="hidden" name="c" value="site">
                <input type="hidden" name="op" value="<?php  echo $_GPC['op'];?>">
                <input type="hidden" name="do" value="spread">
                <input type="hidden" name="m" value="quickspread">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">用户昵称</label>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="用户昵称 或 openid">
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="panel panel-default">
    <div class="panel-heading">
        总计人数: <?php  echo $total;?>
    </div>
    <div class="panel-body">
 
<table class="table" style='width:100%;'>
  <thead>
    <tr>
      <th>编号</th>
	  <th>微信id</th>
      <th>图像</th>
      <th>姓名</th>
      <th>扫码时间</th>
      <th>引客数</th>
      <th>引客获得积分</th>
      <th>账户剩余积分</th>
      <th style="text-align:right; min-width:60px;">统计详情</th>
  </thead>
  <tbody>
    <?php  if(is_array($mylist)) { foreach($mylist as $user) { ?>
    <tr>
      <td><?php  echo ++$seq?></td>
      <td><?php  echo $this->userlink($user['from_user'])?></td>
      <td><img width="46px" height="46px" class="img-rounded" src="<?php  echo preg_replace('/\/0/', '/46', stripslashes($user['avatar']));?>" /></td>
      <td><?php  echo $user['nickname'];?></td>
      <td class="followtime"><?php  echo date('Y-m-d H:i', $user['createtime'])?></td>
      <td><?php  echo $user['follower_count'];?></td>
      <td><?php  echo $user['follower_credit'];?></td>
      <td><?php  echo $user['credit1'];?></td>
      <td style="text-align:right;">
        <a class="btn btn-default" href="<?php  echo $this->CreateWebUrl('Spread', array('from_user' => $user['from_user'], 'op' => 'user'))?>" title="统计详情" class="btn btn-small"><i class="fa fa-bar-chart"></i> 统计详情</a>
      </td>
    </tr>
    <?php  } } ?>
  </tbody>
</table>
<div style="text-align:center">
 <?php  echo $pager;?>
</div>
       
    </div>
</div>
