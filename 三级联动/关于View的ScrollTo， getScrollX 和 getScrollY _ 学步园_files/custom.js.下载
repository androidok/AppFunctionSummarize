// 滑动特效
$(function() {
	$("#featured .item").hover(function(){
		$(this).find(".boxCaption").stop().animate({
			top:0
		}, 150);
		}, function(){
		$(this).find(".boxCaption").stop().animate({
			top:160
		}, 600);
	});
});
// 滚屏
jQuery(document).ready(function($){
$('.scroll_t').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
$('.scroll_c').click(function(){$('html,body').animate({scrollTop:$('.ct').offset().top}, 800);});
$('.scroll_b').click(function(){$('html,body').animate({scrollTop:$('.footer_bottom,.footer_bottom_a').offset().top}, 800);});
});

$(document).ready(function(){ 
    $("ul.scroll li").hover(function() {
        $(this).find("div").stop()
        .animate({right: "0", opacity:1}, "fast")
        .css("display","block")
    }, function() {
        $(this).find("div").stop()
        .animate({right: "0", opacity: 0}, "fast")
    });  
});
// context
$(document).ready(function(){
$('.entry_box_s ').hover(
	function() {
		$(this).find('.context_t').stop(true,true).fadeIn();
	},
	function() {
		$(this).find('.context_t').stop(true,true).fadeOut();
	}
);
});
// 登录
function showid(idname){
var isIE = (document.all) ? true : false;
var isIE6 = isIE && (/MSIE (\d)\.0/i.exec(navigator.userAgent));
var newbox=document.getElementById(idname);
newbox.style.zIndex="9999";
newbox.style.display="block"
newbox.style.position = !isIE6 ? "fixed" : "absolute";
newbox.style.top =newbox.style.left = "50%";
newbox.style.marginTop = - newbox.offsetHeight / 2 + "px";
newbox.style.marginLeft = - newbox.offsetWidth / 2 + "px";
var layer=document.createElement("div");
layer.id="layer";
layer.style.width=layer.style.height="100%";
layer.style.position= !isIE6 ? "fixed" : "absolute";
layer.style.top=layer.style.left=0;
layer.style.backgroundColor="#000";
layer.style.zIndex="9998";
layer.style.opacity="0.6";
document.body.appendChild(layer);
var sel=document.getElementsByTagName("select");
for(var i=0;i<sel.length;i++){
sel[i].style.visibility="hidden";
}
function layer_iestyle(){
layer.style.width=Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth)
+ "px";
layer.style.height= Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) +
"px";
}
function newbox_iestyle(){
newbox.style.marginTop = document.documentElement.scrollTop - newbox.offsetHeight / 2 + "px";
newbox.style.marginLeft = document.documentElement.scrollLeft - newbox.offsetWidth / 2 + "px";
}
if(isIE){layer.style.filter ="alpha(opacity=60)";}
if(isIE6){
layer_iestyle()
newbox_iestyle();
window.attachEvent("onscroll",function(){
newbox_iestyle();
})
window.attachEvent("onresize",layer_iestyle)
}
layer.onclick=function(){newbox.style.display="none";layer.style.display="none";for(var i=0;i<sel.length;i++){
sel[i].style.visibility="visible";
}}
}

// 邮件

function initrequest(url){
	var http_request = false;
	//initialize vars
	var email=document.wr.email.value;
	var name=document.wr.name.value;
	var message=document.wr.message.value;
	var website=document.wr.website.value;
	var hint="";
	var msg="姓名: "+name+" \n网址: "+website+" \n邮箱: "+email+"\n\n"+"\n"+"邮件内容:\n"+message;
   	
	var passData="email="+email+"&name="+name+"&message="+msg;

	if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType) {
                http_request.overrideMimeType('text/xml');
            }
        } else if (window.ActiveXObject) { // IE
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }
        if (!http_request) {
            alert('Error: Unable to initialize class');
            return false;
        }
        http_request.onreadystatechange = function() { sendrequest(http_request); };
        http_request.open('POST', url, true);
       	http_request.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		if (email && name && message)
		{
			http_request.send(passData);

		}else 
		{
			if (!email)
			{
				hint+="请填写电子邮件地址<br />";
			}
			if (!name)
			{
				hint+="请填写昵称<br />";
			}
			if (!message)
			{
				hint+="请输入邮件内容<br />";
			}
			
			document.getElementById('hint').innerHTML=hint;	
			
		}
}

function sendrequest(http_request) {
		if (http_request.readyState == 4) {
            if (http_request.status == 200) {
				document.getElementById('hint').innerHTML = http_request.responseText;	
				document.getElementById('form_name').value = '';
				document.getElementById('form_email').value = '';
				document.getElementById('form_website').value = '';
				document.getElementById('form_message').value = '';
			} 
			else {
				HideIndicator()
                document.getElementById('hint').innerHTML = '邮件没有发送成功，请稍后再试。谢谢！';
            }
        }
}


// 头像
$(document).ready(function(){
$('#respond').hover(
	function() {
		$(this).find('.set_avatar').stop(true,true).fadeIn();
	},
	function() {
		$(this).find('.set_avatar').stop(true,true).fadeOut();
	}
);
});

 // 链接复制
function copy_code(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("已经成功将原文链接复制到剪贴板！");
  } else {
	var x=prompt('你的浏览器可能不能正常复制\n请您手动进行：',text);
  }
}

// 评论贴图
function embedImage() {
  var URL = prompt('请输入图片 URL 地址:', 'http://');
  if (URL) {
    document.getElementById('comment').value = document.getElementById('comment').value + '[img]' + URL + '[/img]';
  }
}
// 控制贴图大小
$(document).ready(function() {
    var maxwidth=500;
    $(".commentlist img").each(function(){
        if (this.width>maxwidth)
         this.width = maxwidth;
    });
});


//引用
$(function(){
    $("h4.backs").bind("click",function(){
	    var $content = $(this).next("div.track");
	    if($content.is(":visible")){
			$content.hide("200");
		}else{
			$content.show("200");
		}
	})
})

//提示
 var sweetTitles = {
 x : 10, // @Number: x pixel value of current cursor position
 y : 20, // @Number: y pixel value of current cursor position
 tipElements : ".cat_post_box a,.slider_image a,.v_content_list a", // @Array: Allowable elements that can have the toolTip,split with ","
 noTitle : true, //if this value is false,when the elements has no title,it will not be show
 init : function() {
 var noTitle = this.noTitle;
 $(this.tipElements).each(function(){
 $(this).mouseover(function(e){
 if(noTitle){
 isTitle = true;
 }else{
 isTitle = $.trim(this.title) != '';
 }
 if(isTitle){
 this.myTitle = this.title;
 this.title = "";
 var tooltip = "<div id='tooltip'><p>"+this.myTitle+"</p></div>";
 $('body').append(tooltip);
 $('#tooltip')
 .css({
 "top" :( e.pageY+20)+"px",
 "left" :( e.pageX+10)+"px"
 }).show('fast');
 }
 }).mouseout(function(){
 if(this.myTitle != null){
 this.title = this.myTitle;
 $('#tooltip').remove();
 }
 }).mousemove(function(e){
 $('#tooltip')
 .css({
 "top" :( e.pageY+20)+"px",
 "left" :( e.pageX+10)+"px"
 });
 });
 });
 }
 };
 $(function(){
 sweetTitles.init();
 });
//Comments
$(document).ready(function(){
// 当鼠标聚焦
if($('#comment').val()==""){
$('#comment').val('留言是种美德，写点什么...').css({color:"#666"});}
$('#comment').focus(
function() {
if($(this).val() == '留言是种美德，写点什么...') {
$(this).val('').css({color:"#222"});
}
}
// 当鼠标失去焦点
).blur(
function(){
if($(this).val() == '') {
$(this).val('留言是种美德，写点什么...').css({color:"#666"});
}
}
);
});