<?php $__env->startSection('content'); ?>
    <style>
        .weui-media-box:before {
            border-top: none;
        }
    </style>
    <div class="container comment" id="container" style="height: 100%;overflow: scroll">
        <div class="weui-navbar">
            <div class="weui-navbar__item weui-bar__item_on all">
                <p>全部(1990)</p>
            </div>
            <div class="weui-navbar__item good">
                <p>好评(0)</p>
            </div>
            <div class="weui-navbar__item general">
                <p>中评(333)</p>
            </div>
            <div class="weui-navbar__item bad">
                <p>差评(222)</p>
            </div>
        </div>
        <div class="weui-tab">
            <div class="weui-tab__panel comment-list">
                <div class="weui-panel weui-panel_access" id="all">
                    <div class="weui-panel__bd" style="border-top:1px solid #E5E5E5">
                        <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="weui-media-box weui-media-box_text" style="border-bottom: 1px solid #E5E5E5">
                                <div class="user-info">
                                    <div class="weui-media-box__hd">
                                        <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                                    </div>
                                    <div class="weui-media-box__bd">
                                        <h4 class="weui-media-box__title"><?php echo e($value['nickname']); ?></h4>
                                    </div>
                                    <div class="weui-media-box__ft">
                                        <p class="weui-media-box__desc"><?php echo e($value['created_at']); ?></p>
                                    </div>
                                </div>
                                <p class="weui-media-box__desc content" ><?php echo e($value['content']); ?></p>
                                <ul class="weui-media-box__info">
                                    <li class="weui-media-box__info__meta">文字来源</li>
                                    <li class="weui-media-box__info__meta">时间</li>
                                    <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">其它信息</li>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                    
                        
                            
                                
                                    
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                
                            
                        
                    
                

                
                    
                        
                            
                                
                                    
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                
                            
                        
                    
                

                
                    
                        
                            
                                
                                    
                                        
                                    
                                    
                                        
                                        
                                            
                                            
                                        
                                    
                                
                            
                        
                    
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
    <script type="text/javascript">
        $(function(){
            $('.weui-navbar__item').on('click', function () {
                $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
                if($(this).hasClass('all')) {
                    $('#good').css('display', 'none');
                    $('#general').css('display', 'none');
                    $('#bad').css('display', 'none');
                    $('#all').css('display', 'block');
                }
                if($(this).hasClass('good')) {
                    $('#all').css('display', 'none');
                    $('#general').css('display', 'none');
                    $('#bad').css('display', 'none');
                    $('#good').css('display', 'block');
                }
                if($(this).hasClass('general')) {
                    $('#all').css('display', 'none');
                    $('#good').css('display', 'none');
                    $('#bad').css('display', 'none');
                    $('#general').css('display', 'block');
                }
                if($(this).hasClass('bad')) {
                    $('#all').css('display', 'none');
                    $('#general').css('display', 'none');
                    $('#good').css('display', 'none');
                    $('#bad').css('display', 'block');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>