<?php $__env->startSection('content'); ?>
    <div class="page">
        <div class="page__bd">
            <div class="weui-form-preview">
                <div class="weui-form-preview__hd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">付款金额</label>
                        <em class="weui-form-preview__value"><?php echo e($orderInfo['total']); ?></em>
                    </div>
                </div>
                <?php $__currentLoopData = $orderInfo['product']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">商品</label>
                        <span class="weui-form-preview__value"><?php echo e($product['name']); ?></span>
                    </div>
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">数量</label>
                        <span class="weui-form-preview__value"><?php echo e($product['quantity']); ?></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="weui-form-preview__ft">
                    <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:">付款</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
    <script type="application/javascript" src="/static/layer_mobile/layer.js"></script>
    <link rel="stylesheet" href="/static/home/css/layer.css"/>
    
        
        
        
            
            
            
            
        
        
            
            
            
            
            
                
                    
                    
                    
                
                
            
            
                
                
                
                
                    
                    
                        
                            
                            
                            
                            
                        
                        
                    
                        
                            
                            
                            
                        
                    
                
            
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>