<?php
/**
 * 项目常量表
 * 
 * @author leig
 */

/*******************************页面路径常量*******************************/

// bootstrap根路径
define('BOOTSTRAP_PATH', "/static/bootstrap/");
// bootstrapCSS样式路径
define('BOOTSTRAP_CSS', "/static/bootstrap/css/");
// bootstrapJS路径
define('BOOTSTRAP_JS', "/static/bootstrap/js/");
// 静态文件路径
define('STATIC_PATH', "/static/default/");


/*******************************数据字段常量*******************************/

// 用户/孩子 排序类型
define('ORDER_TYPE', 't1.updatetime');

// 操作字段-停用
define('OPEFLAG_DISABLED', 4);
// 操作字段-启用
define('OPEFLAG_ENABLED', 2);

// 删除字段-已删除
define('DELFLAG_DELETE', 4);
// 删除字段-未删除
define('DELFLAG_NORMAL', 2);

/*******************************系统常量表*******************************/

// 分页长度
define('PAGE_SIZE', 10);

// 价格敏感度低
define('PRICE_LOW', 2);
// 价格敏感度中
define('PRICE_MID', 4);
// 价格敏感度高
define('PRICE_HIGH', 8);

// 性别为男的数据字段
define('SEX_KEY_MALE', 2);
// 性别为女的数据字段
define('SEX__KEY_FEMALE', 4);

// 主题根路径
define('THEME_PATH', "theme/");


/*******************************请求结果返回字段常量*******************************/

// 运行状态-失败
define('STATUS_NG', -1);
// 运行状态-成功
define('STATUS_OK', 1);






