<!DOCTYPE html>
<html>
    <head>
        <title>数据中心</title>
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />
        <link rel="stylesheet" href="uikit/css/uikit.almost-flat.min.css">
        <link rel="stylesheet" href="uikit/css/components/dotnav.css">
        <link rel="stylesheet" href="uikit/css/components/sticky.almost-flat.min.css">
        <link rel="stylesheet" href="uikit/css/components/progress.min.css">
        <!-- 引入data-center css -->
        <link rel="stylesheet" type="text/css" href="css/data-center.css">
        <script src="uikit/js/jquery-1.11.3.min.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
        <script type="text/javascript" src="uikit/js/components/sticky.min.js"></script>
        <script type="text/javascript" src="js/ichart.1.2.1.min.js"></script>
    </head>

<body>
<!--原点导航-->
<nav id="nav-page" class="uk-flex uk-flex-middle uk-flex-center uk-visible-large">

	<ul class="uk-flex-column uk-nav-side uk-dotnav" data-uk-scrollspy-nav="{closest:'li', smoothscroll:true}">
	    <li class="uk-active"><a href="#dataOne">...</a></li>
	    <li><a href="#dataTwo">测试2</a></li>
	    <li><a href="#dataThree">...</a></li>
	</ul>
</nav>

<!-- 横向导航 -->
<header id="headerCon" class="uk-visible-large ivm-active-header uk-sticky-init uk-active uk-animation-slide-top"
data-uk-sticky="{top:-100, animation:'uk-animation-slide-top'}" >
<div class="uk-container">
		<nav id="navbar-link" class="uk-navbar uk-float-right" data-uk-sticky="{clsactive: 'uk-navbar-attached', top:-200, animation:'uk-animation-slide-top'}">
			<!-- <a href="#" class="uk-navbar-brand"></a> -->
			<ul class="uk-navbar-nav" data-uk-scrollspy-nav="{closest: 'li',smoothscroll:true}">
				<li class="uk-active">
					<a href="#dataOne">图书总量统计</a>
				</li>
				<li>
					<a href="#dataTwo">借阅量统计</a>
				</li>
				<li>
					<a href="#dataThree">数据中心</a>
				</li>
			</ul>
		</nav>
</div>
</header>


<!-- 图书总量后台统计 -->
<?php include'dbcon.php';?>
<?php
      $sql = "SELECT * from book_sum";
      $query = mysql_query($sql);
      $num_row = mysql_num_rows($query);
      if ($num_row > 0)
      {
        while($row=mysql_fetch_array($query))
        {
        $arr[] = $row['data'];
        //将其他值 插入 null 变成新数组;
        $json_insert=array_pad($arr,30,null);

        }

      }
      else
       {
        //数据库中无数据则用 null 填充
        $json_insert=array_pad([null],30,null);
        }
      // 经过整合后的新数据转化成json
      $json=json_encode($json_insert);
      // 图书数量
      $amount_of_book_sql = "SELECT book_id from book where status !='Archive'";
      $amount_of_book_query = mysql_query($amount_of_book_sql);
      $amount_of_book = mysql_num_rows($amount_of_book_query);

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
                              color:'#fff'
                        },
                        subtitle : {
                              text:'Update everyday',
                              fontsize:10,
                              font : '微软雅黑',
                              color:'#fff'
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
                                    color:'#fff', //坐标轴颜色
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
                                     label : {color:'#fff',font : '微软雅黑',fontsize:11,fontweight:600},
                                     // 刻度线的颜色。(默认为'#333333')
                                     scale_color:'#fff'
                              },
                              {
                                     position:'bottom',
                                     label : {color:'#fff',font : '微软雅黑',fontsize:11,fontweight:600},
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
<!-- page2 -->

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
                        render : 'canvasDiv2',
                        data: data,
                        align:'center',
                        title : {
                              text:'Amount of Books',
                              font : '微软雅黑',
                              fontsize:18,
                              color:'#fff'
                        },
                        subtitle : {
                              text:'Update everyday',
                              fontsize:10,
                              font : '微软雅黑',
                              color:'#fff'
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





<!-- content -->
<div id="dataOne" class="uk-grid">
<!-- Page 1 -->
	<div class="uk-width-1-1" id="#dataOne">
		<!-- 调用绘图 -->
		  <div class="chartContainer">
		    <div class="chartContent">
		      <h1>Amount of Books </h1>
		      <span><?php echo $amount_of_book ?></span>
		      <span class="copies">Copies</span>
		    </div>
		    <div id="canvasDiv"></div>
		  </div>
	</div>
</div>

<div class="uk-grid" id="dataTwo">
	<!-- page 2 -->
	<div class="uk-width-1-1 ">
	<!-- 调用绘图 -->
		<div class="chartContainer">
		    <div class="chartContent">
		      <h1>Amount of Borrow today</h1>
		      <span><?php echo $amount_of_book ?></span>
		      <span class="copies">Copies</span>
		    </div>
		    <div id="canvasDiv2"></div>
		</div>
	</div>
</div>

</body>
</html>
