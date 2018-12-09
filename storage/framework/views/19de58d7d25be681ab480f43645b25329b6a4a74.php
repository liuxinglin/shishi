<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,viewport-fit=cover">
    <title>520幸福家</title>
    <link rel="stylesheet" href="/static/weui/style/weui.css"/>
    <link rel="stylesheet" href="/static/weui/example.css"/>
    <link rel="stylesheet" href="/static/swiper/swiper-4.3.3.min.css">
</head>
<body ontouchstart>
<div class="weui-toptips weui-toptips_warn js_tooltips">错误提示</div>
<?php echo $__env->yieldContent('content'); ?>
<script src="/static/weui/zepto.min.js"></script>
<script src="/static/swiper/swiper-4.3.3.min.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
<script src="/static/weui/example.js"></script>
<?php echo $__env->yieldContent('my-js'); ?>
</body>
</html>
