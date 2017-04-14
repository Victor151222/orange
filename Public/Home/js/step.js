$(document).ready(function () {


// 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    var option;

    $.ajax({
        type:"get",
        async:false,
        url:ajaxurl,
        // data: {type: "2月"},
        dataType:"json",
        success: function (data) {

            // alert("插入成功！");
            console.log(data);
            // 指定图表的配置项和数据
            option = {
                title: {
                    text: 'Step Line'
                },
                tooltip: {
                    // show: false,
                    trigger: 'axis'
                },
                legend: {
                    data:['success','weixin', 'paper']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true,
                    // 控制图的大小，调整下面这些值就可以，
                    x: 40,
                    x2: 100,
                    y2: 150,// y2可以控制 X轴跟Zoom控件之间的间隔，避免以为倾斜后造成 label重叠到zoom上
                },
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    data: data.createtime
                },
                yAxis: {
                    type: 'value',
                    // show: false
                    // axisLine: {show: false},
                    axisLabel: {show: false},
                    // axisTick: {show: false},
                    // splitLine: {show: false},

                },
                series: [
                    {
                        name:'paper',
                        type:'line',
                        step: 'start',
                        data:data.paper//100-200
                    },
                    {
                        name:'weixin',
                        type:'line',
                        step: 'start',
                        data:data.weixin//300-400
                    },
                    {
                        name:'success',
                        type:'line',
                        step: 'start',
                        data:data.success//500-600
                    }
                ]
            };


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(textStatus);
        }
    });





// 视口调整后重新渲染echart图表
    window.onresize = myChart.resize;
// $("#main").resize(myChart.resize);

// 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);




    var timeTicket;
    clearInterval(timeTicket);
    timeTicket = setInterval(function () {
        $.ajax({
            type:"get",
            async:false,
            url:ajaxurl,
            // data: {type: "2月"},
            dataType:"json",
            success: function (data) {

                // alert("插入成功！");
                console.log(data);
                // 指定图表的配置项和数据



                // myChart.hideLoading();    //隐藏加载动画
                myChart.setOption({        //载入数据
                    xAxis: {
                        data: data.createtime    //填入X轴数据
                    },
                    series: [
                        {
                            name:'paper',
                            data:data.paper//100-200
                        },
                        {
                            name:'weixin',
                            data:data.weixin//300-400
                        },
                        {
                            name:'success',
                            data:data.success//500-600
                        }
                    ]
                });






            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            }
        });
    }, 1000);//end timer



    var timeTicket1;
    clearInterval(timeTicket1);
    timeTicket1 = setInterval(function () {
        $.ajax({
            type:"get",
            async:false,
            url:ajaxurl,
            data: {type: 1},
            dataType:"json",
            success: function (data) {


            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            }
        });
    }, 1000);//end timer




// //add for test
//     addDataAnimation:function(params,done){
//         done();
//     },


// 按钮点击事件
    function pay() {

        // 向服务器请求数据
        $.ajax({
            type:"get",
            async:false,
            url:ajaxurl,
            data: {paper: 1},
            dataType:"json",
            success: function (data) {

                alert("付款成功！欢迎再次使用");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            }
        });


    }
    // 测试删除
    function del() {

        // 向服务器请求数据
        $.ajax({
            type:"get",
            async:false,
            url:ajaxurl,
            data: {delete: 1},
            dataType:"json",
            success: function (data) {

                // alert("付款成功！欢迎再次使用");

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest.status);
                alert(XMLHttpRequest.readyState);
                alert(textStatus);
            }
        });


    }
// document.getElementById("paper").onclick = function(){ alert("hello"); }
    document.getElementById("paper").addEventListener("click",pay,false);
    document.getElementById("delete").addEventListener("click",del,false);
// $("#paper").addEventListener("click",pay,false);//为什么这个不行



});