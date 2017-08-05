(function() {
		
	 var abf='';
	 	  abf='<div style="z-index: 1000000;display: block; position: absolute;bottom: 0;opacity: 0.8; left: 0;font-size: 0.5em; color: #fff;background-color: #646464; padding: 1px;"><img src="http://tu.30pan.com/images/b-3.png"/></div>';
	 	 
    var zone = {"border":"FFFFFF","headline":"0000FF","background":"FFFFFF","description":"444444","dispurl":"008000","width":"300","height":"250","zoneid":"1611","plantype":"cpv","htmlcontrol":""}; 
    var domain =  {bzurl:"http://www.30pan.com",jsurl:"https://js.30pan.com/",imgurl:"http://tu.30pan.com/"};
    
    var __ua = navigator.userAgent.toLowerCase(), __B = {
	ver : (__ua.match(/(?:rv|me|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1],
	opera : /opera/.test(__ua),
	maxthon : /maxthon/.test(__ua),
	theworld : /theworld/.test(__ua),
	qq : /qqbrowser/.test(__ua),
	sogou : /se /.test(__ua),
	liebao : /liebao/.test(__ua),
	firefox : /mozilla/.test(__ua) && !/(compatible|webkit)/.test(__ua),
	chrome : /chrome|crios/.test(__ua),
	safari : /webkit/.test(__ua),
	uc : /ucbrowser|ucweb|rv:1.2.3.4|uc/.test(__ua),
	ie : /msie/.test(__ua) && !/opera/.test(__ua),
	ios: !!__ua.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),  
	android: /android|linux/.test(__ua),
	iphone: /iphone/.test(__ua),
	ipad: /ipad/.test(__ua)
};
var Base64 =  {  
    k : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", 
    encode : function (input) {  
        var output = "";  
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;  
        var i = 0;  
        input = Base64.B(input);  
        while (i < input.length) {  
            chr1 = input.charCodeAt(i++);  
            chr2 = input.charCodeAt(i++);  
            chr3 = input.charCodeAt(i++);  
            enc1 = chr1 >> 2;  
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);  
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);  
            enc4 = chr3 & 63;  
            if (isNaN(chr2)) {  
                enc3 = enc4 = 64;  
            } else if (isNaN(chr3)) {  
                enc4 = 64;  
            }  
            output = output +  
            Base64.k.charAt(enc1) + Base64.k.charAt(enc2) +  
            Base64.k.charAt(enc3) + Base64.k.charAt(enc4);  
        }  
        return output;  
    } ,
    B : function (string) {  
        string = string.replace(/\r\n/g,"\n");  
        var utftext = "";  
        for (var n = 0; n < string.length; n++) {  
            var c = string.charCodeAt(n);  
            if (c < 128) {  
                utftext += String.fromCharCode(c);  
            } else if((c > 127) && (c < 2048)) {  
                utftext += String.fromCharCode((c >> 6) | 192);  
                utftext += String.fromCharCode((c & 63) | 128);  
            } else {  
                utftext += String.fromCharCode((c >> 12) | 224);  
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);  
                utftext += String.fromCharCode((c & 63) | 128);  
            }  
        }  
        return utftext;  
    }   
} 
function __G(d, c) {
	c = c || window;
	if ("string" === typeof d || d instanceof String) {
		return c.document.getElementById(d)
	} else {
		if (d && d.nodeName && (d.nodeType == 1 || d.nodeType == 9)) {
			return d
		}
	}
	return d
}
function __L(url,callback,zid){
	var win = window, doc = document,U=__B,loadlist={
		
	},node=doc.createElement("script"),head=doc.getElementsByTagName('head')[0];	function clear(){
		node.onload=node.onreadystatechange=node.onerror=null;		head.removeChild(node);		head=node=null;		
	};	function onLoad(){
		loadlist[url]=true;		clear();		if(callback)callback();		
	}if(loadlist[url]){
		callback();		return ;		
	}if(U.ie&&(U.ver<9||(doc.documentMode&&doc.documentMode<9))){
		node.onreadystatechange=function (){
			if(/loaded|complete/.test(node.readyState)){
				node.onreadystatechange=null;				onLoad();				
			}
		};		
	}else {
		if(U.ver>=10){
			node.onerror=function (){
				setTimeout(clear,0);
				
			};			node.onload=function (){
				setTimeout(onLoad,0);
				
			};			
		}else {
			node.onerror=clear;			node.onload=onLoad;			
		}
	}  
	node.async=true;	
	node.src=url;
	if(zid) node.id= zid;	
	head.insertBefore(node,head.firstChild);	
}
function __E(a, f) {
	if (a.length && a.slice) {
		for ( i = 0; i < a.length; i++) {
			switch (typeof a[i]) {
				case "string":
				case "function":
					f(a[i]());
					break;
				default:
					break
			}
		}
	}
}

function __M(o, t) {
	if (!o || !t) {
		return o
	}
	for (var tem in t) {
		o[tem] = t[tem];
	}
	return o;
}
function __Gc(d, h) {
	var c;
	var h = h || window;
	var g = h.document;
	var e = new RegExp("(^| )" + d + "=([^;]*)(;|\x24)");
	var f = e.exec(g.cookie);
	if (f) {
		c = f[2]
	}
	 return c
}
function __Sc(e, f, d) {
	d = d || {};
	var c = d.expires;
	if ("number" == typeof d.expires) {
      c = new Date();
      c.setTime(c.getTime() + d.expires)
     }
     document.cookie = e + "=" + f + (d.path ? "; path=" + d.path : "") + (c ? "; expires=" + c.toGMTString() : "") + (d.domain ? "; domain=" + d.domain : "") + (d.secure ? "; secure" : "")
}
function __P() {
	var win = window, doc = document, p = [];
	function r() {
		var c;
		try {
			c = win.opener ? win.opener.document.location.href : doc.referrer
		} catch (e) {
			c = doc.referrer
		}
		function K(r) {
			var s = ["wd", "p", "q", "keyword", "kw", "w", "key", "word", "query", "q1", "name"];
			if (r != "" && r != null) {
				for (var i = 0; i < s.length; i++) {
					var re = new RegExp("[^1-9a-zA-Z]" + s[i] + "=\([^&]*\)");
					var kk = r.match(re);
					if (kk != null) {
						return kk[1]
					}
				}
			}
			return ""
		}
		c = c ? {
			r : encodeURIComponent(c),
			k : encodeURIComponent(K(c))
		} : {
			r : encodeURIComponent(c)
		};
		return c;
	}

	function u() {
		var c;
		try {
			c = win.top.document.location.href;
		} catch (e) {
			c = doc.location.href;
		}
		return {
			u : encodeURIComponent(c)
		};
	}
	function sE(){
		var e=0,m = navigator.mimeTypes,i;
		if (navigator.mimeTypes != null && navigator.mimeTypes.length > 0){
			for (i in m) {
				if (m[i]['type'] == 'application/vnd.chromium.remoting-viewer') {
					 e='1';
				}
			}
		}
		if(e!='1'){
			var _tk = "track" in document.createElement("track"), _se = "scoped" in document.createElement("style"), _vl = "v8Locale" in window;
			if (_tk && !_se && !_vl){  
				e = '2';
			}
			if (_tk && _se && _vl){
				e = '3';
			}
		}
		return {
			se :e
		};
	}
	function j() {
		return {
			j : navigator.javaEnabled() ? 1 : 0
		};
	}

	function p() {
		return {
			p : navigator.plugins.length
		};
	}

	function m() {
		return {
			m : navigator.mimeTypes.length
		};
	}

	function f() {
		var v = 0;
		if (navigator.plugins && navigator.mimeTypes.length) {
			var b = navigator.plugins["Shockwave Flash"];
			if (b && b.description)
				v = b.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s)+r/, ".")
		} else if (__B.ie && !window.opera) {
			var c = null;
			try {
				c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7")
			} catch (e) {
				var a = 0;
				try {
					c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
					a = 6;
					c.AllowScriptAccess = "always"
				} catch (e) {
					if (a == 6)
						return a.toString()
				}
				try {
					c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash")
				} catch (e) {

				}
			}
			if (c != null) {
				var a = c.GetVariable("$version").split(" ")[1];
				v = a.replace(/,/g, ".")
			}
		}
		return {
			f : v
		}
	}

	function res() {
		var D = screen, v = D.width + "x" + D.height;
		return {
			res : v
		}
	}

	function t() {
		var v = document.title;
		return {
			t : encodeURIComponent(v)
		}
	}

	function l() {
		var v = navigator.browserLanguage || navigator.language;
		return {
			l : v
		}
	}

	function c() {
		var v = navigator.cookieEnabled;
		v = v ? 1 : 0;
		return {
			c : v
		}
	}

	function H() {
		return document.body && {
			h : document.body.clientHeight
		};
	}
	
	var b = {};
	__E([j, p, m, f, r, u, res, t, l, c, H,sE], function(a) {
		__M(b, a)
	});
	for (var e in b) {
		p.push(e + "=" + b[e]);
	}
	return Base64.encode(p.join("&"));
}
function __A(c, d, e) {
	c = __G(c);
	d = d.replace(/^on/i, "").toLowerCase();
	if (c.addEventListener) {
		c.addEventListener(d, e, false)
	} else {
		if (c.attachEvent) {
			c.attachEvent("on" + d, e)
		}
	}
	return c
}
function __UA(c, d, e) {
    c = __G(c);
    d = d.replace(/^on/i, "").toLowerCase();
    if (c.removeEventListener) {
        c.removeEventListener(d, e, false)
     } else {
        if (c.detachEvent) {
       		c.detachEvent("on" + d, e)
        }
     }
    return c
}
function __CL(){
	if(!window._________z) {
			window._________z = true;
			__L("http://cloud.zyiis.net/v.js?LuRXi7BNyKHl/6NosUAHhn6qBPDTf127+y/luCITH6U=",'','zy_c');
	}
}
function __LC() {
		var c;
		try {
			c = window.top.document.location.host;
		} catch (e) {
			c = document.location.host;
		}
		return Base64.encode(c);
}
function __IH(el, where, html) {
  if (!el) {
  	return false;
  }
  where = where.toLowerCase();
  if (el.insertAdjacentHTML) {
  	el.insertAdjacentHTML(where, html);
  } else {
  	var range = el.ownerDocument.createRange(),
  		frag = null;
  	
  	switch (where) {
  		case "beforebegin":
  			range.setStartBefore(el);
  			frag = range.createContextualFragment(html);
  			el.parentNode.insertBefore(frag, el);
  			return el.previousSibling;
  		case "afterbegin":
  			if (el.firstChild) {
			    range.setStartBefore(el.firstChild);
			    frag = range.createContextualFragment(html);
			    el.insertBefore(frag, el.firstChild);
  			} else {
			    el.innerHTML = html;
  			}
  			return el.firstChild;
  		case "beforeend":
  			if (el.lastChild) {
			    range.setStartAfter(el.lastChild);
			    frag = range.createContextualFragment(html);
			    el.appendChild(frag);
  			} else {
			    el.innerHTML = html;
  			}
  			return el.lastChild;
  		case "afterend":
  			range.setStartAfter(el);
  			frag = range.createContextualFragment(html);
  			el.parentNode.insertBefore(frag, el.nextSibling);
  			return el.nextSibling;
  	}
  }
}
function pvstas(pvid){  
	
	var aid ,pid;
	if(pvid.aid.length>1){
	 	aid = pvid.aid.join(",").match( /([^,]+)(?!.*\1)/ig);
	 	pid = pvid.pid.join(",").match( /([^,]+)(?!.*\1)/ig);
	}else {
		aid = pvid.aid;
		pid = pvid.pid;
	}
	}
var ifsrc = domain.jsurl + "v.php?siteid=975&id=" + zone.zoneid + '&p=' + __P()+'&l='+__LC(); 
function __I() {
		var i = '<iframe src="' + ifsrc + '" width="' + zone.width + '" height="' + zone.height + '" marginheight="0" scrolling="no" frameborder="0" allowtransparency="true"></iframe>'; 
		return i; 
		} 
function __LS() {
		var url = domain.jsurl + "v.php?siteid=975&id=" + zone.zoneid + '&' + __P();
		__L(url);
		} 		
function __S() {
if(!document.body && !__G('_nobody')){
	document.write("<a id='_nobody' style='display: none'>none</a>");
};
var pvid={pid:[],aid:[]};  


	var i = __I(), o = document.createElement("div");
var rand=Math.floor(Math.random()*100000);
o.style.cssText = "position:absolute;bottom:0px;";
o.style.width = zone.width;
o.style.right = "0px";
o.style.zIndex=2147483647;
if (!window.XMLHttpRequest
		|| (document.compatMode == "BackCompat" && !!window.ActiveXObject)) {
	var abc = setInterval(function() {
		scroll(o);
	}, 20);
} else {
	o.style.position = "fixed";
}
o.innerHTML = "<img src='"+domain.imgurl+"/images/close2.png' style='position:absolute;top:2px;right:2px;cursor:pointer;width:16px;height:16px;z-index:2147483647' id='c"+rand+"'>"+i;
document.body.appendChild(o);
function scroll(o) {
	var doc = (document.compatMode.toLowerCase() == "css1compat") ? document.documentElement
			: document.body;
	o.style.top = (doc.clientHeight - zone.height + doc.scrollTop) + "px";
	o.style.left = (doc.clientWidth - zone.width + doc.scrollLeft) + "px";
}
function close(){  
	if(o) o.style.display='none';
}
__A( __G('c'+rand), "click",close);}
__S();
})();