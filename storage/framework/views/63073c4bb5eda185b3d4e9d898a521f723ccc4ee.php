<?php $__env->startSection('content'); ?>
    <div class="container" id="container">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
        <div class="swiper-slide"><img src="/static/home/images/banner.png"></div>
    </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="weui-panel weui-panel_access product-list">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="weui-panel__bd">
            <div class="weui-media-box" style="padding: 0px">
                <img src="<?php echo e($product['image']); ?>">
            </div>
                <div class="weui-media-box__bd end-time" >
                    <?php if($product['end_date'] < time()): ?>
                        <p><span>报名已结束</span></p>
                    <?php else: ?>
                        <p class="countdown">剩余时间：  <span id="time"><?php echo e(intval(($product['end_date']-time())/(60*60))); ?>时</span></p>
                    <?php endif; ?>
                </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title"><?php echo e($product['name']); ?></h4>
                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                    <div class="weui-media-box__hd">
                        <p>免费试用名额：<span class="tryput-num"><?php echo e(isset($product['quantity']) ? $product['quantity'] : 0); ?></span></p>
                        <p>已报名：<span><?php echo e(isset($product['signup_num']) ? $product['signup_num'] : 0); ?></span></p>
                    </div>
                    <div class="weui-media-box__bd">
                        <a href="/tryoutProducts/details?id=<?php echo e($product['id']); ?>"><button class="button-try">免费试 ></button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo $__env->make('home.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
    <script type="application/javascript" src="/static/home/js/downCount.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            loop: true,
            autoplay:true,

            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
            },
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>