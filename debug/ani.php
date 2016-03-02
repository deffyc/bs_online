
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <meta charset="UTF-8" />
            <title>每日图书量统计</title>
            <meta name="Description" content="网协-每日图书量数据统计中心" />
            <script type="text/javascript" src="js/ichart.1.2.1.min.js"></script>
            <link rel="stylesheet" href="css/demo.css" type="text/css"/>
<style>

*, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: none;
}
html, body {
    height: 100%;
    overflow: hidden;
    margin: 0;
}
body {
    font-family: 'Lantinghei SC', Helvetica, Arial, 'Hiragino Sans GB', 'STHeiti', 'WenQuanYi Micro Hei', sans-serif;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    background: transparent;
    color: white;
}
.container {
    width: 600px;
    max-width: 100%;
    margin: 0 auto;
    padding: 0 10px;
    text-align: center;
}

.title {
    font-size: 25px;
    margin-bottom: 40px;
}

#canvasDiv{
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
          align-items: center;
  -webkit-justify-content: center;
          justify-content: center;

}

@media (max-width: 680px) {
    body {
        font-size: .8em;
    }
}
@media (max-height: 600px) {
    .logo {
        height: 120px;
    }
}
@media (max-height: 500px) {
    .logo {
        height: 100px;
    }
    .title {
        margin-bottom: 30px;
    }
}
canvas {
    position: fixed;
}
</style>

</head>
    

    <body>


    <canvas></canvas>


    <script src="js/animation.js"></script>
    <script>
(function() {
    var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;
    // Main
    initHeader();
    initAnimation();
    addListeners();
    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;
        target = {
            x: width / 2,
            y: height / 2
        };
        largeHeader = document.querySelector('body');
        largeHeader.style.height = height + 'px';
        canvas = document.querySelector('canvas');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');
        // create points
        points = [];
        count = Math.floor(width / 70);
        for (var x = 0; x < width; x = x + width / count) {
            for (var y = 0; y < height; y = y + height / count) {
                var px = x + Math.random() * width / count;
                var py = y + Math.random() * height / count;
                var p = {
                    x: px,
                    originX: px,
                    y: py,
                    originY: py
                };
                points.push(p);
            }
        }
        // for each point find the 5 closest points
        for (var i = 0; i < points.length; i++) {
            var closest = [];
            var p1 = points[i];
            for (var j = 0; j < points.length; j++) {
                var p2 = points[j]
                if (!(p1 == p2)) {
                    var placed = false;
                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }
        // assign a circle to each point
        for (var i in points) {
            var c = new Circle(points[i],2 + Math.random() * 2,'rgba(255,255,255,0.3)');
            points[i].circle = c;
        }
    }
    // Event handling
    function addListeners() {
        if (!('ontouchstart' in window)) {
            window.addEventListener('mousemove', mouseMove);
        }
        window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }
    function mouseMove(e) {
        var posx = posy = 0;
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        } 
        else if (e.clientX || e.clientY) {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        target.x = posx;
        target.y = posy;
    }
    function scrollCheck() {
        if (document.body.scrollTop > height)
            animateHeader = false;
        else
            animateHeader = true;
    }
    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        largeHeader.style.height = height + 'px';
        canvas.width = width;
        canvas.height = height;
    }
    // animation
    function initAnimation() {
        animate();
        for (var i in points) {
            shiftPoint(points[i]);
        }
    }
    function animate() {
        if (animateHeader) {
            ctx.clearRect(0, 0, width, height);
            for (var i in points) {
                // detect points in range
                if (Math.abs(getDistance(target, points[i])) < 4000) {
                    points[i].active = 0.3;
                    points[i].circle.active = 0.6;
                } else if (Math.abs(getDistance(target, points[i])) < 20000) {
                    points[i].active = 0.1;
                    points[i].circle.active = 0.3;
                } else if (Math.abs(getDistance(target, points[i])) < 40000) {
                    points[i].active = 0.02;
                    points[i].circle.active = 0.1;
                } else {
                    points[i].active = 0;
                    points[i].circle.active = 0;
                }
                drawLines(points[i]);
                points[i].circle.draw();
            }
        }
        requestAnimationFrame(animate);
    }
    function shiftPoint(p) {
        TweenLite.to(p, 1 + 1 * Math.random(), {
            x: p.originX - 50 + Math.random() * 100,
            y: p.originY - 50 + Math.random() * 100,
            ease: Circ.easeInOut,
            onComplete: function() {
                shiftPoint(p);
            }
        });
    }
    // Canvas manipulation
    function drawLines(p) {
        if (!p.active)
            return;
        for (var i in p.closest) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.closest[i].x, p.closest[i].y);
            ctx.strokeStyle = 'rgba(156,217,249,' + p.active + ')';
            ctx.stroke();
        }
    }
    function Circle(pos, rad, color) {
        var _this = this;
        // constructor
        (function() {
            _this.pos = pos || null ;
            _this.radius = rad || null ;
            _this.color = color || null ;
        }
        )();
        this.draw = function() {
            if (!_this.active)
                return;
            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(156,217,249,' + _this.active + ')';
            ctx.fill();
        }
        ;
    }
    // Util
    function getDistance(p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }

}
)();
</script>

<!-- 连接数据库 -->
<?php include'dbcon.php';?>
<?php
$sql = "SELECT * from book_sum";
$query = mysql_query($sql);
$num_row = mysql_num_rows($query);

if ($num_row > 0) {
  # code...


        while($row=mysql_fetch_array($query))
        { 
        $arr[] = $row['data'];  
        //将其他值 插入 null 变成新数组;
        $json_insert=array_pad($arr,30,null);
          
      } 

} else {
  //数据库中无数据则用 null 填充
  $json_insert=array_pad([null],30,null);
}



// 经过整合后的新数据转化成json
$json=json_encode($json_insert);

// echo $json;
echo $json;

// echo '<br>';
?>

<script type="text/javascript">

            //对象转换 将json 转换成 javascript 对象
            $(function(){
                  var flow=[];
                  var json_data= <?php echo $json;?>;
                  // ["5","6","8","10","12",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null];
                  //从 json_data 中取出数据
                  for(var i in json_data){
                  
                        flow.push(json_data [i]);
                      }

                  //定义数据源(数组)
                  var data = [
                              {
                                    name : 'book_summary',
                                    value:flow,
                                    color:'#32bdbc',
                                    // color:'#ec4646',
                                    // 线宽
                                    line_width:2
                              }
                           ];
                  // 刻度水平轴的文本标签集合。(默认为[])
                  var labels = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
                  
                  var chart = new iChart.LineBasic2D({
                        render : 'canvasDiv',
                        data: data,
                        align:'center',
                        title : {
                              text:'图书总量',
                              font : '微软雅黑',
                              fontsize:24,
                              color:'#fff'
                        },
                        subtitle : {
                              text:'每日定时更新',
                              fontsize:15,
                              font : '微软雅黑',
                              color:'#fff'
                        },
                        footnote : {
                              text:'book.xiyounet.org',
                              font : '微软雅黑',
                              fontsize:11,
                              fontweight:600,
                              padding:'0 28',
                              color:'#32bdbc'
                        },
                        width : 800,
                        height : 400,
                        shadow:true,
                        shadow_color : '#202020',
                        shadow_blur : 8,
                        shadow_offsetx : 0,
                        shadow_offsety : 0,
                        // 组件中背景颜色(填充色)的值
                        background_color:'#262626',
                        // background_color:'#2e2e2e',
                        animation : true,//开启过渡动画
                        animation_duration:600,//600ms完成动画
                        tip:{
                              enable:true,
                              shadow:true,
                              listeners:{
                                     //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
                                    parseText:function(tip,name,value,text,i){
                                    return "<span style='color:#005268;font-size:12px;'>"+labels[i]+"日图书总量为:<br/>"+
                                    "</span><span style='color:#005268;font-size:20px;'>"+value+"册</span>";
                                    }
                              }
                        },
                        crosshair:{
                              //十字线开启以及颜色定义
                              enable:true,
                              //line_color 十字线的颜色。(默认为'#1A1A1A')
                              line_color:'#32bdbc'
                        },
                        // sub_option 图中折线段的配置项。
                        sub_option : {
                              // smooth是否渲染为平滑曲线.(默认为false)
                              smooth : true,
                              label:false,
                              //hollow 为True时，空心的颜色为hollow_color指定，外环颜色与线段颜色一致。否则，情况相反。(默认为true)
                              hollow:false,
                              hollow_inside:false,
                              point_size:8
                        },
                        // 坐标系的配置项。请参考iChart.Coordinate2D
                        coordinate:{
                              width:640,
                              height:260,
                              striped_factor : 0.18,
                              grid_color:'#4e4e4e',


                              // axis坐标轴轴线的配置项。
                              // 可配置属性值:
                              // @Option enable {Boolean} 是否启用轴配置(默认为 true)
                              // @Option color {String} 轴的颜色.(默认为 '#666666')
                              // @Option width {Number/Array} 轴的宽度, 如果给出数组，则为四个边的宽度，例如:[1,0,0,1](上-右-下-左).(默认为1)
                              axis:{
                                    color:'#252525',
                                    width:[0,0,4,4]
                              },

                              // 刻度的配置项
                              scale:[{

                                    //position 轴刻度的位置，一般由坐标系给出。(默认为'left')
                                     position:'left', 
                                     //start_scale 起始刻度值。(默认为0)
                                     start_scale:0,

                                     // end_scale 结束刻度值。这个值若没有给定，则用max_scale作为结束的刻度值。(默认为undefined)
                                     end_scale:50,
                                     // scale_space 刻度值的间距值，要小于(最大值-最小值)。(默认为undefined)
                                     scale_space:4,
                                     // scale_size 刻度线的粗细。单位px。(默认为1)
                                     scale_size:2,
                                     // scale_enable 是否显示刻度线。(默认为true)
                                     scale_enable : false,
                                     // label标签的配置项。
                                     label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                                     // 刻度线的颜色。(默认为'#333333')
                                     scale_color:'#9f9f9f'
                              },
                              {
                                     position:'bottom',     
                                     label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                                     scale_enable : false,
                                     labels:labels
                              }]
                        }
                  });
                  //利用自定义组件构造左侧说明文本
                  chart.plugin(new iChart.Custom({
                              drawFn:function(){
                                    //计算位置
                                    //getCoordinate 获取坐标系对象
                                    var coo = chart.getCoordinate(),
                                    // originx图表原点x坐标，不指定会根据对齐方式计算。(默认为null)
                                    // originy图表原点y坐标，不指定会根据对齐方式计算。(默认为null)

                                          x = coo.get('originx'),
                                          y = coo.get('originy'),
                                          w = coo.width,
                                          h = coo.height;

                                    //在左上侧的位置，渲染一个单位的文字
                                    chart.target.textAlign('start')
                                    .textBaseline('bottom')
                                    .textFont('600 11px 微软雅黑')
                                    .fillText('图书总量(册)',x-40,y-12,false,'#9d987a')
                                    .textBaseline('top')
                                    .fillText('(时间)',x+w+12,y+h+10,false,'#9d987a');
                                    
                              }
                  }));
            //开始画图
            chart.draw();

      });
      </script>

<!-- json_decode($json)结果是对象

json_decode($json,true)结果是数组 -->

<!-- 调用绘图 -->
<div id="canvasDiv"></div>







</body>
</html>