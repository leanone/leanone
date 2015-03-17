<?php
/*
Template Name: 投稿
*/
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send')
{
    global $wpdb;
    $last_post = $wpdb->get_var("SELECT post_date FROM $wpdb->posts WHERE post_type = 'post' ORDER BY post_date DESC LIMIT 1");

    // 博客当前最新文章发布时间与要投稿的文章至少间隔120秒。
    // 可自行修改时间间隔，修改下面代码中的120即可
    // 相比Cookie来验证两次投稿的时间差，读数据库的方式更加安全
    if ( current_time('timestamp') - strtotime($last_post) < 120 )
    {
        wp_die('您投稿也太勤快了吧，先歇会儿！');
    }
        
    // 表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? trim($_POST['tougao_content']) : '';
	$content = str_ireplace('?>', '?&gt;', $content);
	$content = str_ireplace('<?', '&lt;?', $content);
	$content = str_ireplace('<script', '&lt;script', $content);
	$content = str_ireplace('<a ', '<a rel="external nofollow" ', $content);
    
    // 表单项数据验证
    if ( empty($name) || mb_strlen($name) > 20 )
    {
        wp_die('昵称必须填写，且长度不得超过20字');
    }
    
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        wp_die('Email必须填写，且长度不得超过60字，必须符合Email格式');
    }
    
    if ( empty($title) || mb_strlen($title) > 100 )
    {
        wp_die('标题必须填写，且长度不得超过100字');
    }
    
    if ( empty($content) || mb_strlen($content) > 3000 || mb_strlen($content) < 100)
    {
        wp_die('内容必须填写，且长度不得超过3000字，不得少于100字');
    }
    
    $post_content = '昵称: '.$name.'<br />Email: '.$email.'<br />blog: '.$blog.'<br />内容:<br />'.$content;
  
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content,
        'post_category' => array($category)
    );


    // 将文章插入数据库
    $status = wp_insert_post( $tougao );
  
    if ($status != 0) 
    { 
        // 投稿成功给博主发送邮件
        // somebody#example.com替换博主邮箱
        // My subject替换为邮件标题，content替换为邮件内容
        wp_mail("somebody#example.com","My subject","content");

        wp_die('投稿成功！感谢投稿！', '投稿成功');
    }
    else
    {
        wp_die('投稿失败！');
    }
}
?>
<?php get_header(); ?>
<section class="new-contentBox new-center">

	<div id="breadcrumbs">
		<span style="display:inline; float:left;">
			当前位置&nbsp;:&nbsp;<a href="<?php bloginfo('url'); ?>" title="首页">首页</a>&nbsp;»<?php the_title(); ?>
		</span>
		<span style="display:inline; float:right;">
			热门：<?php echo get_option('mao10_hottags'); ?>

		</span>
	<div class="clearfix"></div>
	</div>

<div id="fullcontent">
	<div id="post_entry">
									<div id="post_meta">
					<div style="margin:30px 30px;">
					<div class="post_info">
						<h1 style="margin-bottom:10px;s">投稿通道</h1>
					</div><!-- post info end -->
					<div class="post_content">
						<p><strong>投稿通道</strong></p>
<p>&nbsp;</p>
<p>如果说今天的新闻就是明天的历史，那么钛媒体也在致力于完成<strong>中国当代商业科技史</strong>的撰写。历史是丰富多彩的，这里需要翔实完备的纪录、客观独立的分析和充满洞察力的观察。如果您愿意参与其中，请和我们一起。</p>
<p>具体而言，如果您正在从事科技领域的投资、创业；如果您是科技产品的狂热爱好者；如果您对现在和未来的科技产品、服务和趋势有原创的观点和瑰丽的想象；如果您对科技领域正在发生得大事小事，有趣事、无聊事一直有独特的看法，有话想说，不妨和我们的读者一起分享。</p>
<p>只要一篇稿件，和简单个人资料，您同时也会成为我们的博主，拥有您的个人主页，加入钛媒TMT圈子，今后钛媒圈子还会努力实现更多功能。</p>
<p>我们尤其欢迎<strong>首发</strong>的稿件，会增加录用的几率。您的稿件一经录用，也会在我们的相应栏目得到重点推荐，我们每月还会评选出热门稿件，评选“最有钛度作者”，给以物质激励，若文章录用到我们的电子周刊上也还会有额外奖励。</p>
<p>&nbsp;</p>
<blockquote><p><strong>我们特别欢迎下类不同文章：</strong></p>
<ul>
<li>&nbsp; &nbsp; 观点明确，尽量不有模糊说辞 。价值判断清晰有力，哪怕未来发展与这一思路有误也不怕——毕竟我们不是上帝。</li>
<li>&nbsp; &nbsp; 叙述角度独特，哪怕是刁钻，只要能自圆其说。</li>
<li>&nbsp; &nbsp; 专业分析，论证严密。希望能够在独特见解基础上，给出严密论证。</li>
<li>&nbsp; &nbsp; 紧扣当下热门事件，紧扣趋势和价值。历史有各种不同的表述方法。我们聚焦于TMT行业发展的价值发现和趋势挖掘。</li>
<li>&nbsp; &nbsp; &nbsp;深度IT控，文笔优美，还不乏幽默气息 。</li>
</ul>
</blockquote>
<p>&nbsp;</p>
<p><strong>我们随时期待您的稿件。 投稿方式，请您自由选择：</strong></p>
<p>1、<strong>请Email：<a href="mailto:tougao@tmtpost.com">tougao@tmtpost.com</a></strong></p>
<p><strong>投稿格式：</strong></p>
<p>主题：投稿＋《文章标题》</p>
<p><strong>正文内容：</strong>文章正文（请不要使用附件，图片可作为附件提交）。<strong>所有稿件需要是原创。</strong>请留下您的个人简介、联系方式、博客或者微博地址。如果48小时内没有回复，您也可以自行处理您的稿件。并请注明稿件是否首发，或者标注原刊处。</p>
<p><strong>2、注册（或第三方登录）成为钛媒体的用户，在用户中心后台的编辑管理器中，直接编辑您的稿件。（我们更推荐这种，并且请您完善资料，登记您的真实邮箱以方便我们与您随时取得联系）</strong></p>
<p><strong>3、在“<a href="#" target="_blank">钛爱拍话题</a>”平台，针对您感兴趣的话题直接投稿。&nbsp;</strong></p>
<p>&nbsp;</p>
<p><strong>4、或者在下面直接提交您的稿件：</strong></p>
<p>&nbsp;</p>
<div id="contribute">
			<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			    <div class="authorinfo">
			        <label for="tougao_title">文章标题<span>*</span></label>
			        <input type="text" size="40" value="" id="tougao_title" name="tougao_title" />
			    </div>
			    <style>#contribute select{width:100px;clear:none;height: auto;display: inline;margin: 0 auto 10px;} #contribute .authorinfo {margin: 5px 0;}#contribute label {display: block;}</style>
			    <div class="authorinfo">
			        <label for="tougaocategorg">分类<span>*</span></label>
			        <?php wp_dropdown_categories('id=tougaocategorg&show_count=1&hierarchical=1'); ?>
			    </div>
			                    
			    <div style="text-align: left; padding-top: 10px;">
			        <label style="vertical-align:top" for="tougao_content">投稿内容:*</label>
			        <textarea rows="15" cols="55" id="tougao_content" name="tougao_content"></textarea>
			    </div>
			     
			    <div class="authorinfo">
			        <label for="tougao_authorname">昵称<span>*</span></label>
			        <input type="text" size="40" value="" id="tougao_authorname" name="tougao_authorname" />
			    </div>
			
			    <div class="authorinfo">
			        <label for="tougao_authoremail">E-Mail<span>*</span></label>
			        <input type="text" size="40" value="" id="tougao_authoremail" name="tougao_authoremail" />
			    </div>
			                    
			    <div class="authorinfo">
			        <label for="tougao_authorblog">您的博客</label>
			        <input type="text" size="40" value="" id="tougao_authorblog" name="tougao_authorblog" />
			    </div>
			                    
			    <br clear="all">
			    <div class="submitcon">
			        <input type="hidden" value="send" name="tougao_form" />
			        <input type="submit" value="提交" />
			        <input type="reset" value="重填" />
			    </div>
			</form>
			<script charset="utf-8" src="<?php bloginfo('template_url'); ?>/kindeditor/kindeditor-min.js"></script>
			<script charset="utf-8" src="<?php bloginfo('template_url'); ?>/kindeditor/lang/zh_CN.js"></script>
			<script>
			/* 编辑器初始化代码 start */
			    var editor;
			    KindEditor.ready(function(K) {
			        editor = K.create('#tougao_content', {
			        width : '890px',
			        resizeType : 1,
			        allowPreviewEmoticons : false,
			        allowImageUpload : true, /* 开启图片上传功能，不需要就将true改成false */
			        items : [
			            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			            'insertunorderedlist', '|', 'emoticons', 'image', 'link']
			        });
			    });
			/* 编辑器初始化代码 end */
			</script>
		</div>
											</div><!-- post content end -->
					<div class="clearfix"></div>
					</div>
				</div><!-- post meta 611 end -->
						
			</div><!-- post entry end -->
	<div class="pagenavi_badoo">
<div class="clearfix"></div>
</div></div>

</section>

<div class="clearfix" style="height:10px;"></div>

</div><!-- container end -->

<?php get_footer(); ?>