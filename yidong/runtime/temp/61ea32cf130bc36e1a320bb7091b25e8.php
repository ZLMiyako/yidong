<?php /*a:1:{s:73:"D:\phpstudy\PHPTutorial\WWW\yidong\application\index\view\shop\index.html";i:1564047047;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="商城" http-equiv="keywords">
<meta name="description" content="商城,购物">
<meta name="format-detection" content="telephone=no"><!-- 禁止IPHONE识别手机号码 -->
<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1">
<title>贵阳花溪盛千辉便利店</title>
<!-- css -->
<link rel="stylesheet" href="/yidong/public/static/index/css/mui.min.css">
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/index.css">
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/swiper.min.css">

<!-- public_css -->
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/public/public_lib.css">

<!-- zy_public_css -->
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/zy_public.css">
<!-- 分类、品牌、店铺css -->
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/zy_main.css">
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/css/news_login_apply.css">
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/layui/css/layui.css" />
<!-- layui引入 -->
<link rel="stylesheet" type="text/css" href="/yidong/public/static/index/layui/css/layui.css" />
<!-- js -->
<script type="text/javascript" src="/yidong/public/static/index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/yidong/public/static/index/js/swiper.min.js"></script>
<script type="text/javascript" src="/yidong/public/static/index/layui/layui.js"></script>
<!-- js——public -->
<script type="text/javascript" src="/yidong/public/static/index/js/public.js"></script>
</head>
<body>
	<?php if((app('session')->get('msql') != null)): ?>
	<header class="zy_search_top_box">
	<div class="zy_title_top fix">
		<div class="one" href="javascript:" onclick="history.back();"><img src="/yidong/public/static/index/images/back_jt.png"></div>
		<h1>购物车</h1>
	</div>
</header>	

<!-- 内容框 -->
<!-- 判断购物车是否为空 -->
<?php if(($list==null)): ?>
<!-- 购物车为空时 -->
	<div style="width: 403px;height: 100px; text-align: center; line-height: 120px; "><a href="<?php echo url('content/index'); ?>" style="color: #c53d43;">您还没有加入物品,点击可返回商品页</a></div>
<?php else: ?>
<!-- 购物车不为空时 -->
<div class="zy_module-content">
	<div class="zy_flow_box">
		<form>
			<div class="mui-content flow_goods">
				<ul class="mui-table-view">
					<h2>盛千辉便利店</h2>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
					<li class="mui-table-view-cell">
						<div class="mui-slider-right mui-disabled">
							<a class="mui-btn mui-btn-red dele" onclick="article_del(this,'<?php echo htmlentities($list['id']); ?>')">删除</a>
						</div>
						<div class="mui-slider-handle">
							<div class="xuanz_box">
								<input class="icheck" type="checkbox" name="sp">
								<label></label>
							</div>
							<div class="goods">
								<i><img src="/yidong/public/uploads/<?php echo htmlentities($list['img']); ?>"></i>
								<dl>
									<dt><a href="goods.html"><?php echo htmlentities($list['title']); ?></a></dt>
									<dd><span>￥</span><em><?php echo htmlentities($list['price']); ?></em></dd>
								</dl>
							</div>
							<div class="num">
								<i class="min" onclick="article_min(this,'<?php echo htmlentities($list['id']); ?>')">-</i><input type="text" name="" value="<?php echo htmlentities($list['num']); ?>"><i class="add" onclick="article_add(this,'<?php echo htmlentities($list['id']); ?>')">+</i>
							</div>
						</div>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul> 
			</div>
			<!-- 滑动删除效果js -->
			<script src="/yidong/public/static/index/js/mui.min.js"></script>
			<!-- 底部总价 -->
			<div class="flow_foot dis_flex">
				<label><span><input type="checkbox" id="theadInp"><i></i></span>全选</label>
				<h2 class="dis_flex">
					<p>
						<span>总计：<b id="zj">0.00</b></span>
						<em>不含运费</em>
					</p>
					<input type="button" value="去结算" onclick="confirm()">
				</h2>
			</div>
			<!-- 价格计算js -->
			<script type="text/javascript">
				//结算按钮
				function confirm(){
					var num = 0;
					$(".icheck").each(function(){
						if(!$(this).prop("checked")){
							num = ++num;						
						}
					})
					if(num==0){
						window.location.href="<?php echo url('Confirm/index'); ?>";
					}else{
						alert('您有未确定购买的商品，请移出购物车');
					}
				}
				//全选框设计
				$("#theadInp").click(function(){
				    if(this.checked == true){
				        $('.icheck').prop("checked",true);
				    }else{
				        $('.icheck').prop("checked",false);
				    }

				    add();
				})
				//单品数量增加
				function article_add(obj,id){
				    $.ajax({
						url: "<?php echo url('Shop/add'); ?>",
						data: {id},
						type: 'POST',
						dataType: 'json',
						success: function(msg){
							if (msg.code == 1) {
								var numb = parseInt($(obj).prev().val());
								//console.log(numb);
							    numb += 1;
							    $(obj).prev().val(numb);
							    add();
				            }
						},
					});	
				}
				//单品数量减少
				function article_min(obj,id){
				    $.ajax({
						url: "<?php echo url('Shop/min'); ?>",
						data: {id},
						type: 'POST',
						dataType: 'json',
						success: function(msg){
							if (msg.code == 1) {
								var numjian = parseInt($(obj).next().val());
							    if(numjian > 1){
							        numjian -= 1;
							        $(obj).next().val(numjian);
							    };
							    add();
				            }else if(msg.code == 3){
				            	console.log(msg.msg);
				            }

						},
					});
				}
				$(".icheck").click(function(){
					add();
				})
				//分装总价
				function add(){
					var zongjia = 0;
					$(".icheck").each(function(){
						if($(this).prop("checked")){
							var dj = $(this).parent().next().children().next().children().children().next().text();
							var sum = $(this).parent().next().next().children().next().val();
							zongjia += parseFloat(dj*sum);
							//console.log(zongjia);
						}
					})
					$("#zj").text(zongjia.toFixed(2))
				}
				//删除
				function article_del(obj,id){
					$.ajax({
						url: "<?php echo url('Shop/delect'); ?>",
						data: {id},
						type: 'POST',
						dataType: 'json',
						success: function(msg){
							if (msg.code == 1) {
								window.location.reload();
				            }
						},
					});		
				}
			</script>
			<!-- 价格计算js结束 -->
		</form>
	</div>
	
	<!-- 底部 -->
	
	<!-- 返回顶部 -->
	<div class="go_top">
		<a class="btn_top"></a>
	</div>
	<script type="text/javascript">
        $(function(){
			window.onscroll=function(){
			var autoheight=document.body.scrollTop||document.documentElement.scrollTop;
			if(autoheight>100){
				$(".go_top").fadeIn()
				}else{
					$(".go_top").fadeOut()
				}
			}
			$(".btn_top").mousedown(
				function(){
					$("html, body").animate({"scroll-top":0},"fast");
				}
			)
		})
    </script>
	<!-- 底部导航 -->
</div>
<?php endif; else: ?>
	<!---------------未登录跳转到登录页------------->
	<div style="width: 100%;height: 150px; margin: 20px auto; text-align: center; line-height: 150px; background-color: #dcd6d9;">
		<p ><a href="<?php echo url('login/login'); ?>" style="color: #494a41;">您没有登录，请点击登录！</a></p>
	</div>
	<?php endif; ?>			
</body>
</html>
