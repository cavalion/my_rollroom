<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>  
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit"> 
    <title>roll房</title>
    <style type="text/css"> 
        *{margin:0;padding:0;}
	.prize_con{position: absolute;width: 100%;height: 100%;background: url(images/firstp_bg.jpg) no-repeat left top / 100% 100%;overflow: hidden;}
	.preDIV{
		width:65%;height:400px;margin: 150px auto 30px;text-align: center;overflow: hidden;
	}
	.preDIV ul{width:100%;font-size:0;}
	.preDIV li{display:inline-block;font-size:64px;color:#f1bf90;text-align: center;width:20%;line-height:100px;font-family:Arial;}
	.vetically{justify-content:center;align-items:center;display:-webkit-flex;}
        .vetically2{justify-content:center;align-items:center;display:-webkit-flex;}
        
        
	.start{width: 250px;height: 90px;margin:0 auto;cursor:pointer;}
	.prize_grade{font-size:80px;color: #ffe9af;float:top;}
        .prize_grade2{font-size:80px;color: #ffe9af;float:top;}
	
	.qimo8{ overflow:hidden; width:100%;padding-bottom: 20px;}
        .qimo8 .qimo {/*width:99999999px;*/width:8000%; height:30px;}
        .qimo8 .qimo div{ float:left; height: 30px;}
        .qimo8 .qimo ul{float:left; height:30px; overflow:hidden; zoom:1; }
        .qimo8 .qimo ul li{float:left; line-height:30px; list-style:none;font-family: '微软雅黑';font-size: 24px;}
    </style>  
        
    <script src="js/jquery-1.11.2.min.js"></script>

    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="prize_con">
        	<div id="mathroll" class="preDIV">
		<div style="margin-top:30px;margin-bottom:20px;">
		<span class="prize_grade">正在抽取第x轮摇号</span>
		</div>
		
		<div id="trunres" class="vetically">
		<ul>
			<li>000</li>
			<li>000</li>
			<li>000</li>
			<li>000</li>
                        <li>000</li>
			<li>000</li>
			<li>000</li>
			<li>000</li>
                        
			
		</ul>
		</div>
		
		
	</div>
    
    <div id="scrollDIV" class="preDIV" style="display:none;">
        <marquee id="uls" style="text-align:center;" behavior="scroll" direction="up" scrollamount="6" height="400" onmouseover="this.stop()" onmouseout="this.start()">
            
        </marquee>
    </div>
    
        
	<div id="demo" class="qimo8">
        <div class="qimo">
          <div id="demo1" style="background-color: #cbcbcb;">
            <ul  id="totalNUMS">
                
            </ul>
          </div>
          <div id="demo2" style="background-color: #cbcbcb;"></div>
        </div>
      </div>
        

	
	<p class="start"><img src="images/prize_start.png" alt=""></p>
        <p align="center" style="padding-top:10px;"><a href="javascript:goScroll();" style="color:#dec70d;font-weight: bolder;text-decoration : none">查看所有中奖名单</a></p>
	
        
	
	
	
	<input type="hidden" value="0" id="prize_btn">
        </div>
    </body>
</html>
<script type="text/javascript">
        var myNumber;
        var arr = [];
        var turnNUM=[];
        var timesNUM=1;
        var scrollsw=0;
        //var code = ['001','002','003','004','005','006','007','008','009','010','011','012','013','014','015','016','017','018','019','020','021','022','023','024','025','026','027','028','029','030','031','032','033','034','035','036','037','038','039','040','041','042','043','044','045','046','047','048','049','050'];
        var code =[];
        var codenum=500;
        function showRandomNum(num) {
            turnNUM=[];
            arr=[];
            var li = "";
            var codel=code.length;
            
            for(var i = 0; i < codel; i++){
                arr[i] = i;
            }
            arr.sort(function(){
                return 0.5 - Math.random();
            });

            for(var j = 0; j < num; j++){
                var index = arr[j];
                li += '<li>'+code[index]+'</li>';
            }

            $(".vetically ul").html(li);

        }
        
        function goScroll(){
            $("#mathroll").css('display','none'); 
            $("#scrollDIV").css('display','block'); 
            $('#scrollDIV').each(function () {
                if (this.scrollHeight > this.offsetHeight) $(this).html(this.innerHTML);
            });
        }
        
        function delTheRep(){
  
            var temp = []; //临时数组1 
            var temparray = [];//临时数组2 

            for (var i = 0; i < turnNUM.length; i++) { 
                    temp[turnNUM[i]] = true;//巧妙地方：把数组B的值当成临时数组1的键并赋值为真 
            }; 

            for (var i = 0; i < code.length; i++) { 	 
                    if (!temp[code[i]]) {
                            temparray.push(code[i]);//巧妙地方：同时把数组A的值当成临时数组1的键并判断是否为真，如果不为真说明没重复，就合并到一个新数组里，这样就可以得到一个全新并无重复的数组 
                    };
            }; 
            
            code=temparray;
        }
        
//        $('#scrollDIV').each(function () {
//            if (this.scrollHeight > this.offsetHeight) $(this).html('<marquee behavior="scroll" direction="up" scrollamount="5" height="400" onmouseover="this.stop()" onmouseout="this.start()">'+this.innerHTML+'</marquee>');
//        });
        $(function(){
                $(".prize_grade").each(function(){
                    $(".prize_grade").text("正在抽取第"+timesNUM+"轮摇号");
                });   
                if(window.innerHeight !== undefined){
                    $("#totalNUMS").append("<li><span style=\"margin-left:"+window.innerWidth+"px;\"></span></li>")
                }
                
                for(i=1;i<codenum;i++){
                    code[i]=i;
                }
                
        });


        $(".start").click(function(){
            $("#scrollDIV").css('display','none'); 
            $("#mathroll").css('display','block'); 
            if(code.length==0){
                alert('哦不，所有号码都中过一次奖啦');
                return;
            }
            $(".prize_grade").each(function(){
                    $(".prize_grade").text("正在抽取第"+timesNUM+"轮摇号");
                });
            if($("#prize_btn").val() == 0){
                $("#prize_btn").val(1);
                var num = 8;//$("#prizeCount").val();
                $(this).find("img").attr("src","images/prize_stop.png");

                myNumber = setInterval(function(){
                  showRandomNum(num);
                }, 30);
                
                
                
            }else{
                $("#prize_btn").val(0);
                clearInterval(myNumber);
                $(this).find("img").attr("src","images/prize_start.png");
                        $("#trunres").each(function (){
                                $(this).find('li').each(function() {  
                                        turnNUM.push($(this).text());
                                }); 
                        });

                
                //$("#mathroll").css('display','none'); 
                //$("#scrollDIV").css('display','block'); 
                $("#uls").append("<div style=\"margin-top:30px;margin-bottom:20px;\"><span class=\"prize_grade2\">第"+timesNUM+"轮摇号8名</span></div><div class=\"vetically2\"><ul id=\"scrollUL"+timesNUM+"\"></ul></div>");
                
                var totalSTR="<span style=\"color:red;\">&nbsp;&nbsp;&nbsp;第"+timesNUM+"轮摇号中奖名单：（8名）</span>";
                
                for (var i = 0; i < turnNUM.length; i++) { 
                    $("#scrollUL"+timesNUM).append("<li>"+turnNUM[i]+"</li>");
                    totalSTR=totalSTR+turnNUM[i]+"  ";
                }; 
                $("#totalNUMS").append("<li>"+totalSTR+"</li>");

//                    $('#scrollDIV').each(function () {
//                        if (this.scrollHeight > this.offsetHeight) $(this).html('<marquee style="text-align:center;" behavior="scroll" direction="up" scrollamount="5" height="400" onmouseover="this.stop()" onmouseout="this.start()">'+this.innerHTML+'</marquee>');
//                    });
                $('#scrollDIV').each(function () {
                    if (this.scrollHeight > this.offsetHeight) $(this).html(this.innerHTML);
                });
                
                var demo = document.getElementById("demo");
                var demo1 = document.getElementById("demo1");
                var demo2 = document.getElementById("demo2");
                demo2.innerHTML=document.getElementById("demo1").innerHTML;
                if(timesNUM==1){
                    function Marquee(){
                        if(demo.scrollLeft-demo2.offsetWidth>=0){
                            demo.scrollLeft-=demo1.offsetWidth;
                        }
                        else{
                            demo.scrollLeft++;
                        }
                    }
                }
                var myvar=setInterval(Marquee,12);
                demo.onmouseout=function (){myvar=setInterval(Marquee,12);}
                demo.onmouseover=function(){clearInterval(myvar);}

		delTheRep();
                timesNUM++;
                
            }
        });
	</script>