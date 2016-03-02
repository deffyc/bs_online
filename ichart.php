<!DOCTYPE html>
<html>
      <head>
            <meta charset="UTF-8" />
            <title>ichartjs 示例</title>
            <meta name="Description" content="The ichartjs's gallery center,ichartjs 示例中心" />
            <script type="text/javascript" src="js/ichart.1.2.1.min.js"></script>
            <link rel="stylesheet" href="css/demo.css" type="text/css"/>
            <script type="text/javascript">

            $(function(){
                  var flow=[];
                  //定义随机取样数据数量
                  for(var i=0;i<30;i++){
                        flow.push(Math.floor(Math.random()*(10+((i%16)*5)))+10);
                  }

                  //定义数据源(数组)
                  var data = [
                              {
                                    name : 'Borrow_books',
                                    value:[01,02,03,01,02,03,04,01,02,03,04,01,02,03,04,01,02,03,04,01,02,03,04,01,02,03,04,06,02,null],
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
                              text:'图书借阅量',
                              font : '微软雅黑',
                              fontsize:24,
                              color:'#b4b4b4'
                        },
                        subtitle : {
                              text:'每日定时更新',
                              font : '微软雅黑',
                              color:'#b4b4b4'
                        },
                        footnote : {
                              text:'book.xiyounet.org',
                              font : '微软雅黑',
                              fontsize:11,
                              fontweight:600,
                              padding:'0 28',
                              color:'#b4b4b4'
                        },
                        width : 800,
                        height : 400,
                        shadow:true,
                        shadow_color : '#202020',
                        shadow_blur : 8,
                        shadow_offsetx : 0,
                        shadow_offsety : 0,
                        // 组件中背景颜色(填充色)的值
                        background_color:'#2e2e2e',
                        animation : true,//开启过渡动画
                        animation_duration:600,//600ms完成动画
                        tip:{
                              enable:true,
                              shadow:true,
                              listeners:{
                                     //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
                                    parseText:function(tip,name,value,text,i){
                                    return "<span style='color:#005268;font-size:12px;'>"+labels[i]+"日借阅量为:<br/>"+
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
                                     end_scale:20,
                                     // scale_space 刻度值的间距值，要小于(最大值-最小值)。(默认为undefined)
                                     scale_space:2,
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
                                    .fillText('借阅量(册)',x-40,y-12,false,'#9d987a')
                                    .textBaseline('top')
                                    .fillText('(时间)',x+w+12,y+h+10,false,'#9d987a');
                                    
                              }
                  }));
            //开始画图
            chart.draw();
      });
      </script>
</head>
<body>
      <div id='canvasDiv'></div>
</body>
</html>