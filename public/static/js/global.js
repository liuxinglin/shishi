$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * 公用重定向跳转
     */
    $(document).on('click', '.redirect', function () {
        location.href = $(this).attr('data-url');
        return false;
    });
    /**
     * 公用ajax post提交
     */
    $(document).on('click', '.ajaxSubmit', function () {
        // var objData = (obj == '') ? $('#formData') : $(obj);
        var url = (typeof($(this).attr('data-url')) == 'undefined') ? document.URL : $(this).attr('data-url');
        commonAjaxSubmit(url);
        return false;
    });

    /**
     * 公用ajax get请求
     */
    $(document).on('click', '.ajaxRequest', function () {
        var url = $(this).attr('data-url');
        if (url == "" || url == undefined || url == null) {
            return false;
        }
        ;
        var message = '您确定要 ' + $(this).text() + ' 吗？';
        commonAjaxRequest(url, message);
        return false;
    });


    /**
     * 通用AJAX提交
     * @param  {string} url    表单提交地址
     * @param  {string} formObj    待提交的表单对象或ID
     */
    function commonAjaxSubmit(url, method, formObj) {
        if (!formObj || formObj == '') {
            var formObj = "form";
        }
        if (!url || url == '') {
            var url = document.URL;
        }
        $(formObj).ajaxSubmit({
            url: url,
            type: method,
            beforeSubmit: function () {
                top.layer.load(); //loading层
            },
            success: function (rest) {
                // var rest = JSON.parse(rest);
                console.log(rest);
                if (rest.code == 0) {
                    top.layer.msg(rest.msg, {icon: 1, time: 2000});
                } else {
                    top.layer.msg(rest.msg, {icon: 2, time: 2000});
                }

                top.layer.closeAll('loading');

                if (rest.data.url && rest.data.url != '') {
                    setTimeout(function () {
                        window.location.href = rest.data.url;
                    }, 2000);
                    return false;
                }
                if (rest.code == 0) {
                    setTimeout(function () {
                        parent.location.reload();
                    }, 2000);
                }
            },
            error: function () {
                top.layer.closeAll('loading');
                top.layer.msg("异常！");
            }
        });
        return false;
    }

    /**
     * 通用ajax请求接口
     * @param  {string} url    数据删除地址
     */
    function commonAjaxRequest(url, method, data, message) {
        if (message == '') {
            var message = "您确定要执行该操作吗？"
        }
        ;
        if (data == '') {
            var data = {}
        }
        ;

        console.log(data);

        top.layer.confirm('是否执行?', {
            skin: 'layui-layer-lan',
            icon: 3,
            title: '温馨提示',
            content: message
        }, function (index) {
            top.layer.close(index);
            $.ajax({
                type: method,
                url: url,
                data: data,
                dataType: 'json',
                beforeSend: function () {
                    top.layer.load(); //loading层
                },
                success: function (rest) {
                    if (rest.code == 0) {
                        top.layer.msg(rest.msg, {icon: 1, time: 200000});
                    } else {
                        top.layer.msg(rest.msg, {icon: 2, time: 2000});
                    }
                    if (rest.data.url && rest.data.url != '') {
                        setTimeout(function () {
                            window.location.href = rest.data.url;
                        }, 2000);
                        return false;
                    }
                    if (rest.status == 0) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                },
                error: function () {
                    top.layer.msg("异常！");
                },
                complete: function () {
                    top.layer.closeAll('loading');
                }
            });
        });
        return false;
    }
})