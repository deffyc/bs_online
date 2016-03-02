
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
            <meta charset="UTF-8" />
            <title>每日图书量统计</title>
            <meta name="Description" content="网协-每日图书量数据统计中心" />
            <script type="text/javascript" src="assets/js/ichart.1.2.1.min.js"></script>
            <link rel="stylesheet" href="assets/css/demo.css" type="text/css"/>
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
   /* background: url('img/dark-desert-hills.jpg');*/
    /*background-size: cover;*/
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

#con {
  width:100%;
  color:#000;
}
#top,#bottom{
  width:70%;
  margin:0px auto;
  position:relative;
  top:0;
  left:0;
}
#topCon,#bottomCon {
  width:40%;
  float: left;
  height:100px;
  margin-top:150px;
}
#topCon h1, #bottomCon h1 {
  font-size:20px;
  color: #666;
  line-height: 1.1;
}
#topCon span, #bottomCon span {
  font-size:60px;
  font-weight:bold;
  color:#333;
  line-height: 0.7;
}
#canvasDiv,#canvasDiv2 {
  margin-left:40%;
  margin-top:5%;
}

#topCon span.copies ,#bottomCon span.copies{
    line-height: 0.7;
    color: #333;
    font-size: 40px;
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
@media (max-width:950px) {
  #topCon,#bottomCon {
    float: none;
    width:100%;
    padding-left:50px;
    margin:50px auto 20px auto;
    text-align: left;
  }
  #canvasDiv,#canvasDiv2 {
    margin:0 auto;
  }

}

</style>

</head>
    

  <body>


<!-- 图书总量后台统计 -->
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
//number of book copies
$amount_of_book_sql = "SELECT book_id from book where status !='Archive'";
$amount_of_book_query = mysql_query($amount_of_book_sql);
$amount_of_book = mysql_num_rows($amount_of_book_query);

?>



<!-- 借阅量后台统计-->

<?php
$borrow_sql = "SELECT * from daily_sumup";
$borrow_query = mysql_query($borrow_sql);
$borrow_num_row = mysql_num_rows($borrow_query);
if ($borrow_num_row > 0) {
  # code...
          while($Borrow_row=mysql_fetch_array($borrow_query))
          { 
          $arr_borrow[] = $Borrow_row['sum_dnum'];  
          //将其他值 插入 null 变成新数组;
          $json_insert_borrow=array_pad($arr_borrow,30,null);
    
          } 
 } 
  else {
  //数据库中无数据则用 null 填充
  $json_insert_borrow=array_pad([null],30,null);
}

// 经过整合后的新数据转化成json
$json_borrow=json_encode($json_insert_borrow);

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
                                    color:'#333',
                                    // color:'#32bdbc',
                                    // color:'#ec4646',
                                    // 线宽
                                    line_width:3
                              }
                           ];
                  // 刻度水平轴的文本标签集合。(默认为[])
                  var labels = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"];
                  

                  var chart = new iChart.LineBasic2D({
                        render : 'canvasDiv',
                        data: data,
                        align:'center',
                        title : {
                              text:'Amount of Books',
                              font : '微软雅黑',
                              fontsize:18,
                              color:'#333'
                        },
                        subtitle : {
                              text:'Update everyday',
                              fontsize:10,
                              font : '微软雅黑',
                              color:'#333'
                        },
                        footnote : {
                              // text:'book.xiyounet.org',
                              // font : '微软雅黑',
                              // fontsize:11,
                              // fontweight:600,
                              // padding:'0 28',
                              // color:'#32bdbc'
                        },
                        width :600,
                        height :350,
                        border:false,
                        shadow:false,
                        shadow_color : '#202020',
                        shadow_blur : 8,
                        shadow_offsetx : 0,
                        shadow_offsety : 0,
                        // 组件中背景颜色(填充色)的值
                        background_color:'',
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
                              width:450,
                              height:200,
                              striped_factor : 0.18,
                              grid_color:'#999',


                              // axis坐标轴轴线的配置项。
                              // 可配置属性值:
                              // @Option enable {Boolean} 是否启用轴配置(默认为 true)
                              // @Option color {String} 轴的颜色.(默认为 '#666666')
                              // @Option width {Number/Array} 轴的宽度, 如果给出数组，则为四个边的宽度，例如:[1,0,0,1](上-右-下-左).(默认为1)
                              axis:{
                                    color:'#999', //坐标轴颜色
                                    width:[0,0,3,3]
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
                                     label : {color:'#999',font : '微软雅黑',fontsize:11,fontweight:600},
                                     // 刻度线的颜色。(默认为'#333333')
                                     scale_color:'#999'
                              },
                              {
                                     position:'bottom',     
                                     label : {color:'#999',font : '微软雅黑',fontsize:11,fontweight:600},
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
                                    // .fillText('图书总量(册)',x-40,y-12,false,'#9d987a')
                                    .textBaseline('top')
                                    .fillText('(时间)',x+w+12,y+h+10,false,'#999');
                                    
                              }
                  }));
            //开始画图
            chart.draw();
      });
      </script>



<script type="text/javascript">

            //对象转换 将json 转换成 javascript 对象
            $(function(){
                  var flow=[];
                  var json_data= <?php echo $json_borrow;?>;
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
                        render : 'canvasDiv2',
                        data: data,
                        align:'center',
                        title : {
                              text:'Amount of Borrow',
                              font : '微软雅黑',
                              fontsize:18,
                              color:'#333'
                        },
                        subtitle : {
                              text:'Update everyday',
                              fontsize:10,
                              font : '微软雅黑',
                              color:'#333'
                        },
                        footnote : {
                              
                        },
                        width : 600,
                        height : 350,
                        border:false,
                        shadow:false,
                        shadow_color : '#202020',
                        shadow_blur : 8,
                        shadow_offsetx : 0,
                        shadow_offsety : 0,
                        // 组件中背景颜色(填充色)的值
                        background_color:'',
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
                              width:450,
                              height:200,
                              striped_factor : 0.18,
                              grid_color:'#999',


                              // axis坐标轴轴线的配置项。
                              // 可配置属性值:
                              // @Option enable {Boolean} 是否启用轴配置(默认为 true)
                              // @Option color {String} 轴的颜色.(默认为 '#666666')
                              // @Option width {Number/Array} 轴的宽度, 如果给出数组，则为四个边的宽度，例如:[1,0,0,1](上-右-下-左).(默认为1)
                              axis:{
                                    color:'#999',
                                    width:[0,0,4,4]
                              },

                              // 刻度的配置项
                              scale:[{

                                    //position 轴刻度的位置，一般由坐标系给出。(默认为'left')
                                     position:'left', 
                                     //start_scale 起始刻度值。(默认为0)
                                     start_scale:0,

                                     // end_scale 结束刻度值。这个值若没有给定，则用max_scale作为结束的刻度值。(默认为undefined)
                                     end_scale:20,
                                     // scale_space 刻度值的间距值，要小于(最大值-最小值)。(默认为undefined)
                                     scale_space:2,
                                     // scale_size 刻度线的粗细。单位px。(默认为1)
                                     scale_size:2,
                                     // scale_enable 是否显示刻度线。(默认为true)
                                     scale_enable : false,
                                     // label标签的配置项。
                                     label : {color:'#999',font : '微软雅黑',fontsize:11,fontweight:600},
                                     // 刻度线的颜色。(默认为'#333333')
                                     scale_color:'#999'
                              },
                              {
                                     position:'bottom',     
                                     label : {color:'#999',font : '微软雅黑',fontsize:11,fontweight:600},
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
                                    // .fillText('图书总量(册)',x-40,y-12,false,'#9d987a')
                                    .textBaseline('top')
                                    .fillText('(时间)',x+w+12,y+h+10,false,'#999');
                                    
                              }
                  }));
            //开始画图
            chart.draw();
      });
      </script>




<!-- 调用绘图 -->
<div id="con">
  <div id="top">
    <div id="topCon">
      <h1>Amount of Books </h1>
      <span><?php echo $amount_of_book ?></span>
      <span class="copies">Copies</span>
    </div>
    <div id="canvasDiv"></div>
  </div>


  <div id="bottom">
    <div id="bottomCon">
      <h1>Amount of Borrow today</h1>
      <span><?php echo $amount_of_book ?></span>
      <span class="copies">Copies</span>
    </div>
    <div id="canvasDiv2"></div>
  </div>
</div>



</body>
</html>