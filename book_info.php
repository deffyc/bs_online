<!-- 书籍信息 -->
<?php include 'header.php';?>
<?php include 'nav_viewallbooks.php';?>


    <a id="temp1" tabindex="0" class="btn btn-info" role="button" data-toggle="popover"  title="详情" >详情</a>

</body>

<script>
        $(function () {
            $('[data-toggle="popover"]').each(function () {
                var element = $(this);
                var id = element.attr('id');
                var txt = element.html();
                element.popover({
                    trigger: 'manual',
                    placement: 'right', //top, bottom, left or right
                    title: txt,
                    html: 'true',
                    content: ContentMethod(txt),

                }).on("mouseenter", function () {
                    var _this = this;
                    $(this).popover("show");
                    $(this).siblings(".popover").on("mouseleave", function () {
                        $(_this).popover('hide');
                    });
                }).on("mouseleave", function () {
                    var _this = this;
                    setTimeout(function () {
                        if (!$(".popover:hover").length) {
                            $(_this).popover("hide")
                        }
                    }, 100);
                });
            });
        });
        function ContentMethod(txt) {
            return '<table class="table table-bordered"><tr><td>' + txt + '</td><td>BB</td><td>CC</td><td>DD</td></tr>' +
                    '<tr><td>' + txt + '</td><td>BB</td><td>CC</td><td>DD</td></tr>' +
                    '<tr><td>' + txt + '</td><td>BB</td><td>CC</td><td>DD</td></tr>'+
                    '<tr><td><?php echo $summary ?></td><td>BB</td><td>CC</td><td>DD</td></tr></table>';
        }
    </script>
