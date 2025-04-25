<?php

/**
 * 模板函数
 * @author Seaton Jiang <hi@seatonjiang.com>
 * @license GPL-3.0 License
 * @version 2025.02.08
 */

define('THEME_VERSION', '4.3.2');

if (defined('WP_USE_THEMES') && WP_USE_THEMES === false) {
    return;
}

// 主题配置
require get_template_directory() . '/inc/codestar-framework/autoload.php';

// 更新配置
require get_template_directory() . '/inc/update-checker/autoload.php';

// 核心配置
require get_template_directory() . '/inc/theme-core.php';

// 站点配置
require get_template_directory() . '/inc/theme-setting.php';

// 文章配置
require get_template_directory() . '/inc/theme-article.php';

// 小工具配置
require get_template_directory() . '/inc/theme-widgets.php';

// 文章增强
require get_template_directory() . '/inc/theme-shortcode.php';

// 添加导航目录
require get_template_directory() . '/inc/theme-navwalker.php';

// 对象存储配置
require get_template_directory() . '/inc/theme-dogecloud.php';

// ImageX 图片服务
require get_template_directory() . '/inc/theme-volcengine.php';

// SMTP 配置
require get_template_directory() . '/inc/theme-smtp.php';

// copyright
function feed_copyright($content) {
    if(is_single() or is_feed()) {
        $sitename = get_bloginfo('name');
        $siteurl = home_url();
        $content.= '<div style="margin:10px 0;font-size:16px;">除非注明，否则均为<a rel="bookmark" title="'.$sitename.'" href="'.$siteurl.'">'.$sitename.'</a>原创文章，转载必须以链接形式标明本文链接';
        $content.= '<p>本文链接：<a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink().'">'.get_permalink().'</a></p></div>';
    }
    return $content;
}
add_filter ('the_content', 'feed_copyright');