<?php

$themename = "MUFENG";
$shortname = "strive";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/css/style/';
$alt_stylesheets = array();
$alt_stylesheets[] = '';

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array (
	array(  "name" => $themename." Options",
      		"type" => "title"),

//常规设置
    array( "name" => "常规设置",
           "type" => "section"),
    array( "type" => "open"),

	

	array(  "name" => "logo图片地址",
			"desc" => "输入您的logo图片地址",
            "id" => $shortname."_mylogo",
            "type" => "text",
            "std" => "/wp-content/themes/MUFENG/images/logo.png"),			
		
	array(  "name" => "favicon图标地址",
			"desc" => "输入您的favicon图标地址，将在浏览器地址栏显示",
            "id" => $shortname."_favicon",
            "type" => "text",
            "std" => "/wp-content/themes/MUFENG/images/favicon.ico"),					

	array(  "name" => "是否开启瀑布流布局",
			"desc" => "默认列表文章为固定高度，开启后，则图片高度自适应",
            "id" => $shortname."_waterfall",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

	array(  "name" => "是否显示列表摘要信息",
			"desc" => "默认不显示摘要",
            "id" => $shortname."_summary",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
			
	

//首页布局设置开始
    array(  "type" => "close"),
    array( "name" => "首页布局设置",
           "type" => "section"),
    array( "type" => "open"),

			
	array(  "name" => "是否显示首页幻灯",
			"desc" => "必须先开启首页侧边栏",
            "id" => $shortname."_slides",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),
			
    array(  "name" => "输入需要在幻灯中展示的文章标签",
            "desc" => "输入文章标签，多个标签用英文逗号,分隔",
            "id" => $shortname."_slidestag",
            "type" => "text",
            "std" => ""),
			
    array(  "name" => "输入需要在首页显示的文章类别ID",
            "desc" => "输入文章类别ID，多个标签用英文逗号,分隔，(1,2,3)正数为显示此类，(-1,-2,-3)负数为排除此类",
            "id" => $shortname."_leiid",
            "type" => "text",
            "std" => ""),
			
	array(  "name" => "是否显示首页友情链接",
			"desc" => "默认不显示，请在菜单中设置友情链接，只在首页显示，防止权重流失",
            "id" => $shortname."_flinks",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

//文章页面设置
    array(  "type" => "close"),
    array(  "name" => "文章页面设置",
            "type" => "section"),
    array(  "type" => "open"),
			
	
	array(  "name" => "是否显示文章页相关文章",
			"desc" => "默认不显示",
            "id" => $shortname."_related",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),	

	array(  "name" => "是否显示文章点赞按钮",
			"desc" => "默认不显示",
            "id" => $shortname."_aboutme",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),	

//SEO设置
    array(  "type" => "close"),
	array(  "name" => "网站SEO设置",
			"type" => "section"),
	array(  "type" => "open"),

	array(	"name" => "描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "输入你的网站关键字，一般不超过100个字符"),


			
//网站统计、备案号
    array(  "type" => "close"),
	array(  "name" => "网站底部信息设置",
			"type" => "section"),
	array(  "type" => "open"),

	array(  "name" => "是否显示网站底部菜单",
			"desc" => "默认不显示",
            "id" => $shortname."_footnav",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

	array(  "name" => "是否显示网站统计",
			"desc" => "默认不显示",
            "id" => $shortname."_tj",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

    array(  "name" => "输入你的网站统计代码",
            "desc" => "",
            "id" => $shortname."_tjcode",
            "type" => "textarea",
            "std" => ""),

	array(  "name" => "是否显示备案号",
			"desc" => "默认不显示",
            "id" => $shortname."_beian",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

	array(  "name" => "输入您的备案号",
			"desc" => "",
            "id" => $shortname."_beianhao",
            "type" => "textarea",
            "std" => "苏ICP备10088888号"),

//广告设置
   
     array(  "type" => "close"),
	array(  "name" => "广告设置",
			"type" => "section"),
	array(  "type" => "open"),
	
	
	array(  'name'=>'输入文章页文字广告代码支持html',
			'desc'=>'默认不显示',
			'id'=>$shortname.'_logoadc',
			'type'=>'select',
			'std'=>'Display',
			'options'=>array('Hide','Display')),
			array(	'name'=>'输入文章页文字广告代码',
			'desc'=>'',
			'id'=>$shortname.'_logoadccode',
			'type'=>'textarea',
			'std'=>''),
	
	array(  "name" => "是否显示文章底部广告",
			"desc" => "默认不显示",
            "id" => $shortname."_adc",
            "type" => "select",
            "std" => "Display",
            "options" => array("Hide", "Display")),

	array(	"name" => "输入文章底部广告代码(宽度需小于650)",
            "desc" => "",
            "id" => $shortname."_adccode",
            "type" => "textarea",
            "std" => ""),
			

	array(	"type" => "close") 			
);
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme_options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme_options.php&reset=true");
die;
}
}
$file_dir=get_bloginfo('template_directory');
add_menu_page($themename." Options", "MUFENG设置", 'edit_theme_options',basename(__FILE__), 'mytheme_admin',$file_dir."/includes/options/loo.png",61);

}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/options/options.css", false, "1.0", "all");
wp_enqueue_style("functions", $file_dir."/includes/options/css/layout.css", false, "1.0");
wp_enqueue_style("functions", $file_dir."/includes/options/css/colorpicker.css", false, "1.0");
wp_enqueue_script("rm_script", $file_dir."/includes/options/rm_script.js", false, "1.0");
wp_enqueue_script("rm_script", $file_dir."/includes/options/colorpicker.js", false, "1.0");
}
function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<script type="text/ecmascript">
        $(function () {
            $('#color').ColorPicker({
                onChange: function (hsb, hex, rgb) {
                    $('#color').val("#" + hex);//设置文本框的值为选定的RGB颜色
                    //$('#color').css('backgroundColor', '#' + hex);//设置文本框的背景颜色为选定的RGB颜色
                }
 
            });
        });
    </script>
<script type="text/javascript">
var _version = '<?php $theme_data = get_theme_data(dirname(__FILE__) . '/../style.css');echo $theme_data['Version'];?>';
jQuery(document).ready(function(){
	jQuery("span.version_number").text(weisaytheme_latest_version);
	jQuery("a.downloand_add").attr("href",downloand_add);
	jQuery("a.author_add").attr("href",author_add);
	if(_version < weisaytheme_latest_version ){
		jQuery(".version_tips").fadeIn(1000);
	}
	else {
		jQuery(".version_tips").hide();
	};
	jQuery(".close_version_tips").click(function(){
		jQuery(this).parent().fadeOut(1000);
	});
	jQuery(".fl_cbradio_op:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).show();
	});
	jQuery(".fl_cbradio_cl:checked").each(function() {
		jQuery(this).parent().parent().children().eq(3).hide();
	});
	jQuery(".fl_cbradio_cl").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideUp();
	});
	jQuery(".fl_cbradio_op").click(function(){
		jQuery(this).parent().parent().children().eq(3).slideDown();
	});
   jQuery(".theme_options_content > div:not(:first)").hide();
   jQuery(".theme_options_tab li").each(function(index){
       jQuery(this).click(
	   	  function(){
			  jQuery(".theme_options_tab li.current").removeClass("current");
			  jQuery(this).addClass("current");
			  jQuery(".theme_options_content > div:visible").hide();
			  jQuery(".theme_options_content > div:eq(" + index + ")").show();
	  })
   })
})
</script>

<div class="wrap rm_wrap">
<h2>MUFENG V1.5 主题设置</h2>
<div class="clear"></div>
<div class="rm_opts">
<div class="rm_opts">
<form method="post"> 
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>
<?php break;
case "close":
?>
</div>
</div>
<br />
<?php break;
case "title":
?>
<?php break;
case 'text':
?>
<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php
break;
case 'textarea':
?>
<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php
break;
case 'select':
?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" >
<?php foreach ($value['options'] as $option) { ?>
		<option value="<?php echo $option;?>" <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>>
		<?php
		if ((empty($option) || $option == '' ) && isset($value['default_option_value'])) {
			echo $value['default_option_value'];
		} else {
			echo $option; 
		}?>
		
		</option><?php } ?>
</select>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
case "checkbox":
?>
<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":
$i++;
?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/includes/options/clear.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="保存设置" />
</span><div class="clearfix"></div></div>
<div class="rm_options">
<?php break;}}?>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="恢复默认" /> <font color=#ff0000>提示：此按钮将恢复主题初始状态，您的所有设置将消失！</font>
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div> 
 <div class="kg"></div>
 </div>
<?php
}
?>
<?php
function mytheme_wp_head() { 
	$stylesheet = get_option('strive_alt_stylesheet');
	if($stylesheet != ''){?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style/<?php echo $stylesheet; ?>" />
<?php }
} 
add_action('wp_head', 'mytheme_wp_head');
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>