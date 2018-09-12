<?php
/**
 * helpers.php
 * Author: shenhengxin
 * Email: 853043009@qq.com
 * Created on 2018/9/12 14:44
 */
/**
 * @desc 此方法会将当前请求的路由名称转换为 CSS 类名称，作用是允许我们针对某个页面做页面样式定制
 * @Author shenhengxin
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}