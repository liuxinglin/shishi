<?php $__env->startSection('content'); ?>
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container" id="container" style="height: 100%;overflow: scroll">

        <div class="weui-tab product">
            <div class="weui-navbar">
                <div class="weui-navbar__item weui-bar__item_on new">
                    新上市
                </div>
                <div class="weui-navbar__item hot">
                    热卖好物
                </div>
            </div>

            <div class="weui-tab__panel">
                <div class="weui-panel weui-panel_access product-list" id="new">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="weui-panel__bd">
                            <div class="weui-media-box" style="padding: 0px">
                                <img src="<?php echo e($product['image']); ?>">
                            </div>
                            <div class="weui-media-box weui-media-box_text">
                                <h4 class="weui-media-box__title"><?php echo e($product['name']); ?></h4>
                                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                                    <div class="weui-media-box__hd">
                                        <p><span class="product-price">￥<?php echo e($product['price']); ?></span><span class="product-buy-num">已抢8.5万件</span></p>
                                    </div>
                                    <div class="weui-media-box__bd">
                                        <a href="/products/details?id=<?php echo e($product['id']); ?>"><button class="button-try">马上抢</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="weui-panel weui-panel_access product-list" id="hot" style="display: none">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="weui-panel__bd">
                            <div class="weui-media-box" style="padding: 0px">
                                <img src="<?php echo e($product['image']); ?>">
                            </div>
                            <div class="weui-media-box weui-media-box_text">
                                <h4 class="weui-media-box__title"><?php echo e($product['name']); ?></h4>
                                <div class="weui-media-box" style="padding: 0px;overflow: hidden">
                                    <div class="weui-media-box__hd">
                                        <p><span class="product-price">￥<?php echo e($product['price']); ?></span><span class="product-buy-num">已抢8.5万件</span></p>
                                    </div>
                                    <div class="weui-media-box__bd">
                                        <a href="/products/details?id=<?php echo e($product['id']); ?>"><button class="button-try">马上抢</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php echo $__env->make('home.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
    <script type="text/javascript">
        $(function(){
            $('.weui-navbar__item').on('click', function () {
                $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
                if($(this).hasClass('new')) {
                    $('#hot').css('display', 'none');
                    $('#new').css('display', 'block');
                }
                if($(this).hasClass('hot')) {
                    $('#hot').css('display', 'block');
                    $('#new').css('display', 'none');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>