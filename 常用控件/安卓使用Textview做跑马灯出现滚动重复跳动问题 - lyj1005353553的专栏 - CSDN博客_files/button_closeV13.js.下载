var buttonClose = {
    getId: function(id) {
        return document.getElementById(id)
    },
    init: function() {
        var self = this;
        self.addCloseButton("./image/");

    },
    addCloseButton: function(button_path) {
        var self = this;
        var agAd = self.getId('ag_ad');
        var width = agAd.style.width;
        var height = agAd.style.height;
        var close_button = '<div id="cb-x" class="cb-x">';
        close_button = close_button + '<a style="cursor: pointer;z-index: 2000"  id="cb-x-a" title="关闭广告">';
        close_button = close_button + '<img src="' + button_path + 'button_close.svg" style="position: relative; cursor: pointer"></a></div>';
        close_button = close_button + '<div id="floatdiv" style="width:' + width + '; height:' + height + ';">';
        close_button = close_button + '<div><span id="spclose" class="spclose">已关闭广告展示<a id="btrevert" class="a-revert">撤销</a></span>';
        close_button = close_button + '<span id="spclosefinal" class="spclose">感谢您的反馈<a id="btrevertfinal" class="a-revert">撤销</a></span>';
        close_button = close_button + '<span id="spanq">此推广内容有什么问题</span>';
        close_button = close_button + '<span id="spanreason"><ul id="ulreason"><li><input type="radio" value="11" name="reason" id="rd1"><span>不感兴趣</span></li>';
        close_button = close_button + '<li><input type="radio" value="12" name="reason" id="rd2"><span>视觉干扰</span></li>';
        close_button = close_button + '<li><input type="radio" value="13" name="reason" id="rd3"><span>重复展示</span></li>';
        close_button = close_button + '<li><input type="radio" value="14" name="reason" id="rd4"><span>其他</span></li></ul></span></div></div>';
        agAd.insertAdjacentHTML("beforeEnd", close_button);
        self.getId("floatdiv").onclick = function(e){
            e.preventDefault();
            e.stopPropagation();
        };
        self.getId('cb-x-a').onclick = function(e) {
            e.preventDefault();
            e.stopPropagation();
            self.getId('floatdiv').style.display = 'block';
            self.getId('spclose').style.display = '';
            self.getId('spclosefinal').style.display = 'none';
            self.getId('spanq').style.display = '';
            self.getId('ulreason').style.display = 'block';
            extendMethods.showEvent(10);
        }

        self.getId('btrevert').onclick = function(e) {
            self.getId('floatdiv').style.display = 'none';
            e.preventDefault();
            e.stopPropagation();
            extendMethods.showEvent(20);
        }
        self.getId('btrevertfinal').onclick = function(e) {
            self.getId('floatdiv').style.display = 'none';
            e.preventDefault();
            e.stopPropagation();
            extendMethods.showEvent(20);
        }

        self.getId('rd1').onclick = function(e) {
            e.stopPropagation();
            self.submitReason(this.value);
        }
        self.getId('rd2').onclick = function(e) {
            e.stopPropagation();
            self.submitReason(this.value);
        }
        self.getId('rd3').onclick = function(e) {
            e.stopPropagation();
            self.submitReason(this.value);
        }
        self.getId('rd4').onclick = function(e) {
            e.stopPropagation();
            self.submitReason(this.value);
        }
    },
    /*setwh: function(width,height){
    	var self = this;
    	//set width
    	document.body.style.width=width;
    	document.body.style.height=height;
    	self.getId('floatdiv').style.width=width;
    	self.getId('ag_ad').style.width=width;
    	self.getId('adimg').style.width=width;
    	self.getId('floatdiv').style.height=height;
    	self.getId('ag_ad').style.height=height;
    	self.getId('adimg').style.height=height;
    	//document.getElementById('cb-x-a').click();
    	//end
    },*/
    submitReason: function(v) {
        var self = this;
        self.getId('spclose').style.display = 'none';
        self.getId('spclosefinal').style.display = 'inline';
        self.getId('spanq').style.display = 'none';
        self.getId('ulreason').style.display = 'none';
        extendMethods.showEvent(v);
    }
};
buttonClose.init();
