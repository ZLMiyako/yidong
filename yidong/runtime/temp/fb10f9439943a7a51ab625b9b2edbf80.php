<?php /*a:3:{s:76:"E:\php\PHPTutorial\WWW\yidong\application\admin\view\admindetails\index.html";i:1563354161;s:70:"E:\php\PHPTutorial\WWW\yidong\application\admin\view\public\_meta.html";i:1563324026;s:72:"E:\php\PHPTutorial\WWW\yidong\application\admin\view\public\_footer.html";i:1562634778;}*/ ?>
﻿<!--_meat 作为公共模版分离出去-->	

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/yidong/public/static/adminlib/html5shiv.js"></script>
<script type="text/javascript" src="/yidong/public/static/adminlib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/layui/css/layui.css" />
<!--文本编辑器-->
<!--w文本编辑器-->
<script type="text/javascript" src="/yidong/public/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" charset="utf-8" src="/yidong/public/static/admin/utf8/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/yidong/public/static/admin/utf8/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
 <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/yidong/public/static/admin/utf8/lang/zh-cn/zh-cn.js"></script>

<!--_meat 作为公共模版分离出去-->	

<link rel="stylesheet" type="text/css" href="/yidong/public/static/admin/swiper.min.css"/>
<script src="/yidong/public/static/admin/swiper.min.js" type="text/javascript" charset="utf-8"></script>
<title>图片列表</title>
</head>
<body>
<!--<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 图片列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="<?php echo url('Admindetails/index'); ?>;" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">-->
	<!--<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{ $dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{ $dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="" id="" placeholder=" 图片名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图片</button>
	</div>-->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="<?php echo url('Admindetails/deleALL'); ?>" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="picadd('添加商品详情','<?php echo url("Admindetails/picadd",["id"=>$id["id"]]); ?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加商品详情</a></span></div>
	
	
			
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
	
					<th>图片轮播</th>
					<th>商品标题</th>
					<th>商品种类</th>
					<th>商品原价</th>
					<th>商品库存</th>
					<th>商品详情图片</th>
					<th width="150">更新时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
		
			<?php if(($alist['id'] != null)): ?>
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td><?php echo htmlentities($alist['id']); ?></td>
					<td ><a href="javascript:;" >
							<div  class="swiper-container" style="width: 120px;height: 50px;">
								<div class="swiper-wrapper">
									<?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aimg): $mod = ($i % 2 );++$i;?>
									<div class="swiper-slide">
										<img width="80" class="picture-thumb " src="/yidong/public/uploads/<?php echo htmlentities($aimg); ?>" style="width: 110px;height: 50px;">
									</div>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</a>
					</td>
					<td><?php echo htmlentities($alist['title1']); ?></td>
					<td><?php echo htmlentities($alist['class']); ?></td>
					<td><?php echo htmlentities($alist['price1']); ?></td>
					<td><?php echo htmlentities($alist['inventory']); ?></td>
					<td ><a href="javascript:;" >
							<div  class="swiper-container" style="width: 120px;height: 60px;">
								<div class="swiper-wrapper">
									<?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aimg): $mod = ($i % 2 );++$i;?>
									<div class="swiper-slide">
										<img width="80" class="picture-thumb " src="/yidong/public/uploads/<?php echo htmlentities($aimg); ?>" style="width: 120px;height: 60px;">
									</div>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</div>
						</a>
					</td>
					<td><?php echo htmlentities($alist['time']); ?></td>
					<td class="td-manage"><a style="text-decoration:none" onClick="picture_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="edit('图库编辑','<?php echo url("Admindetails/edit"); ?>',<?php echo htmlentities($alist['id']); ?>)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="dele('图库编辑','<?php echo url("Admindetails/dele"); ?>',<?php echo htmlentities($alist['id']); ?>)" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				
			<?php else: ?>
			<div style="width: 1280px; height: 50px; text-align: center; line-height: 50px; background-color: #426579;"><a href="#" style="color: #fff;">此商品没有详情信息,请联系管理员添加</a></div>
			<?php endif; ?>
		</table>
		<!--分页；-->
		<div style="text-align: center;">
		
		</div>
	</div>
	
</div>
<!--_footer 作为公共模版分离出去-->


<script type="text/javascript" src="/yidong/public/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yidong/public/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/yidong/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="/yidong/public/static/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

<!--layui-->
<script type="text/javascript" src="/yidong/public/static/admin/layui/layui.js"></script>
<!--图片添加。编辑-->
<script type="text/javascript" src="/yidong/public/static/admin/js.js"></script>


<!--_footer 作为公共模版分离出去-->

<script type="text/javascript">
	$(function(){
		var swiper = new Swiper('.swiper-container', {
		    pagination: '.swiper-pagination',
 			paginationClickable: true,
			speed: 1000,
			loop: true,
			observer:true,
			observeParents:true,
			autoplayDisableOnInteraction : false,
			autoplay:1500
        });
    })
		      
</script>
</body>
</html>