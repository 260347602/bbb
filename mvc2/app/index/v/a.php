<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="./public/js/jquery-3.4.1.min.js"></script>
    <script src="./public/js/vue.min.js"></script>
</head>
<body>
<!--/*style="overflow: hidden"清除浮动*/-->
<div style="overflow: hidden">
    <div class="a"></div>
</div>


<div style="overflow: hidden">
    <div class="b"></div>
</div>

<!--:style=""属性绑定 @click=""绑定点击事件  -->
<div class="mm">
    <div :style="styleData" @click="a()">{{name}}</div>
    <!--v-for="(v,key) in list">{{key+1}}循环 v-值 key-下标  -->
    <div :class ="v.classList"  v-for="(v,key) in list"    :style="v.styleData" @mouseover="over(key)" @mouseout="out(key)">{{key+1}}</div>
</div>
<style>
    /* @keyframes 规则是创建动画   0% 是动画的开始，100% 是动画的完成*/
    @keyframes myfirst {
        0%   {transform: rotate(0deg)}
        100% {transform: rotate(360deg)}
    }
    /*hover 伪类是用来添加一些选择器的特殊效果*/
    .zz:hover{
        animation-name: myfirst;/*动画名*/
        animation-duration: 5s;/*时间*/
        animation-timing-function: linear;/*匀速*/
        -moz-animation:myfirst 5s; /* Firefox */
        -webkit-animation:myfirst 5s; /* Safari and Chrome */
        -o-animation:myfirst 5s; /* Opera */
    }
</style>



<script type="text/javascript">
    $(function () {
        new Vue({
            //绑定
            el:'.mm',
            //数据
            data:{
                name:'按钮',
                styleData:{
                    background:'#265510',
                    color:'#fffdfb',
                    margin:'10px auto',
                    padding:'50px',
                    border:'solid 2px',
                    borderRadius:'15px',
                    textAlign:'center',
                },
                list:[]
            },
            //方法
            methods:{
                a:function () {
                    if(this.list.length>=10)
                        return false;
                    this.list.push({
                        styleData:{
                            background:setColor(),
                            color:'#fffdfb',
                            margin:'10px auto',
                            padding:'30px',
                            border:'solid 15px ',
                            textAlign:'center',
                            height:'30px',
                            lineHeight:'30px',
                            float:'left',
                            cursor:'pointer',
                            width:'30px'
                        },
                        classList:{
                            zz:false
                        }

                    })
                },
                over:function (data) {
                    this.list[data].classList.zz=true;
//                    console.log(data)

                },
                out:function (data) {
                    this.list[data].classList.zz=false;
                }
            }
        })
    })




    function setColor() {
        var char = '0123456789abcdef';
        var c = '';
        for(var i=0;i<6;i++){
            /**
             * Math.random()返回介于 0（包含） ~ 1（不包含） 之间的一个随机数：
             * Math.round()把一个数字舍入为最接近的整数
             * */
            c+=char[Math.round(Math.random()*15)]
        }
        return '#'+c;
    }


    window.onload=function () {
        var a = document.getElementsByClassName('a')[0]
        a.innerHTML='按钮'
        a.style.background='#265510'
        a.style.color='#fffdfb'
        a.style.margin='10px auto'/*外边距 自动*/
        a.style.padding='50px'/*内边距*/
        a.style.border='solid 2px'/*边框*/
        a.style.borderRadius='15px'/*导圆*/
        a.style.textAlign='center'/*字体居中*/
        a.onclick=function () {
            var dd = document.getElementsByClassName('dd')/*获取对象*/
            if(dd.length<10){
                var div = document.createElement('div')/*创建一个新的div标签 将a放进去*/
                this.parentNode.append(div)/*parentNode 属性可返回某节点的父节点 append() 方法在被选元素的结尾（仍然在内部）插入指定内容*/
//            div.innerHTML='按钮'
                div.style.background=setColor()
                div.style.color='#fffdfb'
                div.style.margin='10px auto'
                div.style.padding='30px'
                div.style.border='solid 15px '
                div.style.height='30px'
                div.style.width='30px'
                div.style.textAlign='center'
                div.style.lineHeight='30px'/*line-height 属性设置行间的距离（行高）*/
                div.setAttribute('class','dd')/*setAttribute动态添加一个属性*/
                div.innerHTML=dd.length/*length获取长度*/
                div.style.float='left'/*float浮动*/
                div.style.cursor='pointer'/*指针换成手*/
                div.onmouseover=function () {/*onmouseover当鼠标指针移动到元素上时触发*/
                    div.style.height='60px'
                    div.style.width='60px'
                    div.style.lineHeight='60px'
                    div.classList.add('zz')/*classList.add为 <div> 元素添加 class*/
                }
                div.onmouseout=function () {/*onmouseout当鼠标指针移出元素时触发*/
                    div.style.height='30px'
                    div.style.width='30px'
                    div.style.lineHeight='30px'
                    div.classList.remove('zz')/*classList.remove移除元素中一个或多个类名*/
                }
            }
        }
    }


    $(function () {
        $('.b').html('按钮'),
            $('.b').css({
                background:'#265510',
                color:'#fffdfb',
                margin:'10px auto',
                padding:'50px',
                border:'solid 2px',
                borderRadius:'15px',
                textAlign:'center',
            })
        $('.b').click(function () {
            if($('.zz').length<10){
                var div = $('<div>')
                $(div).attr('class','zz')/*attr() 方法设置或返回被选元素的属性值*/
                $(div).html($('.zz').length+1)
                $(div).css({
                    background:setColor(),
                    color:'#fffdfb',
                    margin:'10px auto',
                    padding:'30px',
                    border:'solid 15px ',
                    height:'30px',
                    textAlign:'center',
                    lineHeight:'30px',
                    float:'left',
                    cursor:'pointer',
                    width:'30px'
                })
                $(this).parent().append(div)
                $(div).mouseover(function () {
                    $(div).css({
                        height:'60px',
                        width:'60px',
                        lineHeight:'60px'
                    })
                    $(div).addClass('zz')
                })
                $(div).mouseout(function () {
                    $(div).css({
                        height:'30px',
                        width:'30px',
                        lineHeight:'30px'
                    })
                    $(div).removeClass('zz')
                })
            }
        })
    })
</script>
</body>
</html>