<?php $__env->startSection('content'); ?>
    <div class="container tryout" id="container">
        <div class="weui-panel weui-panel_access product-details" style="margin-top: 0px;">
            <div class="weui-panel__bd">
                <div class="weui-media-box" style="padding: 0px">
                    <img src="/static/home/images/procuct_show.png" class="preview">
                </div>
                <div class="weui-media-box weui-media-box_text" style="padding: 2vw 3vw 0">
                    <div class="weui-media-box free" style="padding: 0px;overflow: hidden">
                        <div class="weui-media-box__hd">
                            <p>免费</p>
                        </div>
                        <div class="weui-media-box__bd">
                            <p>免费试用资格抢购中</p>
                        </div>
                    </div>
                    <div class="weui-media-box__title"><?php echo e($data['name']); ?></div>
                    <div class="weui-media-box quota">
                        <div class="weui-media-box__hd">
                            <p>已报名：<span><?php echo e(isset($data['signup_num']) ? $data['signup_num'] : 0); ?></span></p>
                        </div>
                        <div class="weui-media-box__bd">
                            <p>剩余名额：<span><?php echo e($data['quantity'] - $data['signup_num']); ?></span></p>
                        </div>
                    </div>
                </div>

                <div class="weui-media-box weui-media-box_text sign-info">
                    <div class="weui-media-box">
                        <div class="weui-media-box__hd">
                            <img src="/static/home/images/img_goodstab2.png">
                        </div>
                        <div class="weui-media-box__bd">
                            <?php if($data['end_date'] < time()): ?>
                                <p><span>报名已结束</span></p>
                            <?php else: ?>
                                <p class="countdown">剩余时间   <span id="time"></span></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-promise">
                        <p><span></span>全场包邮</p>
                        <p><span></span>7天退换</p>
                        <p><span></span>48小时发货</p>
                        <p><span></span>假一赔十</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="weui-panel tryout-content">
            <div class="weui-panel__bd title"></div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                <div class="weui-media-box weui-media-box_text">
                    <?php echo e($data['description']); ?>

                </div>
            </div>
        </div>

        <div class="weui-panel signup-list">
            <div class="weui-panel__bd">
                <a href="#" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd"><?php echo e($data['enrolments']['total']); ?>人正在抢购，可直接参</div>
                    <span class="weui-cell__ft">查看更多</span>
                </a>
            </div>
            <div class="weui-panel__bd">
                <?php if($isEnrolment): ?>
                    <div class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo e($isEnrolment['member']['headimgurl']); ?>" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title"><?php echo e($isEnrolment['nickname']); ?></h4>
                        </div>
                        <div class="weui-media-box__ft">
                            <p class="weui-media-box__title">已获得票数：<span><?php echo e($isEnrolment['votes_num']); ?></span></p>
                        </div>
                        <div class="weui-media-box__ft">
                            <button>投票</button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $data['enrolments']['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value['member']['id'] != session('member.id')): ?>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="<?php echo e($value['member']['headimgurl']); ?>" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title"><?php echo e($value['nickname']); ?></h4>
                    </div>
                    <div class="weui-media-box__ft">
                        <p class="weui-media-box__title">已获得票数：<span><?php echo e($value['votes_num']); ?></span></p>
                    </div>
                    <div class="weui-media-box__ft">
                        <button>投票</button>
                    </div>
                </div>
                        <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
            
                
                    
                    
                
            
            
                
                
                    
                        
                            
                        
                        
                            
                        
                        
                            
                        
                    
                    
                    
                        
                        
                        
                    
                
                
            
        
        <div class="weui-panel product-content">
            <div class="weui-panel__bd">商品详情</div>
            <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                <div class="weui-media-box weui-media-box_text">
                    <?php echo e($data['description']); ?>

                </div>
            </div>
        </div>
        <div class="weui-tabbar tool-bar">
            <?php if(!$isEnrolment): ?>
                <a href="/enrolments/create?tryout_id=<?php echo e($data['id']); ?>" class="weui-tabbar__item signup">
                    <p class="weui-tabbar__label">我要报名</p>
                </a>
            <?php else: ?>
                <a href="/enrolments/details?id=<?php echo e($isEnrolment['id']); ?>" class="weui-tabbar__item signup">
                    <p class="weui-tabbar__label">已报名，去分享</p>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
    <script type="application/javascript" src="/static/home/js/downCount.js"></script>
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    <script type="application/javascript">
        $('.countdown').downCount({
            date: '<?php echo e(date('Y/m/d H:i:s', $data['end_date'])); ?>'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>