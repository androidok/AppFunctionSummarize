/**
 * Changyan.js<br>
 * base on jQuery<br>
 * 2013.11.21
 */
(function(window, jQuery) {

    var location = window.location,
        document = window.document,
        _jChangyan = window.jChangyan;

    var jChangyan = jQuery.noConflict(true),
        version = '1.0.1';

    var jscript = jQuery('script[src*="changyan.labs.https.js"]'),
        jsrc = jscript.attr('src');
    var appidRegex = /appid=(\w+)[&\?]?/,
        appid = appidRegex.exec(jsrc)[1];

    var templateRegex = /({{(\w+)}})/g;

    /**
     * variable
     */
    jChangyan.extend({
        // 常量
        Host : 'https://changyan.sohu.com',
        CDN : 'https://changyan.sohu.com',
        AppID : 'client_id',
        URL : 'topic_url',
        Title : 'topic_title',
        SourceID : 'topic_source_id',
        CategoryID : 'topic_category_id',
        // 变量
        appid : appid,
        url : jQuery('link[rel="canonical"]').attr('href') || location.href,
        title : document.title,
        // log
        LogLevel : {
            DEBUG : 1,
            INFO : 2,
            ERROR : 3
        },
        script : jscript,
        plugins : {},
        loaded : _jChangyan ? _jChangyan.loaded : {}
    });

    var level = jChangyan.LogLevel.DEBUG;

    /**
     * utils
     */
    jChangyan.extend({
        /**
         * 加载css
         *
         * @param cssurl
         */
        loadCss : function(url) {
            if (url) {
                jQuery('<link>').attr({
                    'rel' : 'stylesheet',
                    'type' : 'text/css',
                    'href' : url
                }).appendTo('head');
            }
        },
        /**
         * 加载js
         *
         * @param jsurl
         */
        loadJs : function(url) {
            if (url) {
                jQuery.ajax({
                    'type' : 'GET',
                    'url' : url,
                    'dataType' : 'script',
                    'cache' : true,
                    'scriptCharset' : 'utf-8'
                });
            }
        },
        /**
         * 加载style
         *
         * @param style 自定义的样式
         */
        loadStyle : function(style) {
            if (style) {
                jQuery('<style type="text/css">' + style + '</style>').appendTo('head');
            }
        },
        /**
         * 格式化字符串<b> $.format('abc%sghi%smn', 'def', 'jkl') = abcdefghijklmn
         */
        format : function() {
            var origin = arguments[0];
            var regex = /%s/g;
            var i = 1;
            while ((s = regex.exec(origin)) != null) {
                origin = origin.substring(0, s.index) + arguments[i++] + origin.substring(s.index + 2);
            }
            return origin;
        },
        /**
         * 格式化日期
         */
        formatDate : function(d, p) {
            var z = {
                M : d.getMonth() + 1,
                d : d.getDate(),
                h : d.getHours(),
                m : d.getMinutes(),
                s : d.getSeconds()
            };
            p = p.replace(/(M+|d+|h+|m+|s+)/g, function(v) {
                return ((v.length > 1 ? '0' : '') + z[v.slice(-1)]).slice(-2);
            });
            return p.replace(/(y+)/g, function(v) {
                return d.getFullYear().toString().slice(-v.length);
            });
        },
        /**
         *
         */
        toHtml : function(template, data) {
            var s = template;
            var ex;
            while ((ex = templateRegex.exec(template)) != null) {
                if (typeof data == 'string') {
                    s = s.replace(ex[1], data);
                } else if (typeof data == 'object') {
                    s = s.replace(ex[1], data[ex[2]]);
                }
            }
            return s;
        },
        /**
         *
         */
        cookie : function(name, value, options) {
            // set
            if (arguments.length > 1 && String(value) !== '[object Object]') {
                options = jQuery.extend({}, options);

                if (value === null || value === undefined) {
                    options.expires = -1;
                }

                if (typeof options.expires === 'number') {
                    var seconds = options.expires, t = options.expires = new Date();
                    t.setSeconds(t.getSeconds() + seconds);
                }

                value = options.json && typeof (JSON) != 'undefined' ? JSON.stringify(value) : String(value);

                return (document.cookie = [ encodeURIComponent(name), '=',
                        options.raw ? value : encodeURIComponent(value),
                        options.expires ? '; expires=' + options.expires.toUTCString() : '',
                        options.path ? '; path=' + options.path : '',
                        options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : '' ]
                        .join(''));
            }

            // read
            options = value || {};
            var result, decode = options.raw ? function(s) {
                return s;
            } : decodeURIComponent;

            return (result = (new RegExp('(?:^|; )' + encodeURIComponent(name) + '=([^;]*)')).exec(document.cookie)) ? decode(result[1]) : null;
        }
    });

    /**
     * plugin
     */
    jChangyan.extend({
        /**
         * 启用插件
         *
         * @param plugin
         *            插件名
         * @param conf
         *            自定义配置，目前支持的配置：sid(source id)、cid(category id)、skin(色调)
         */
        use : function(plugin, conf) {
            if (typeof(plugin) == "undefined"){
               return ;
            }
            jChangyan.config(conf);
            var tag = jQuery('#cy-labs-config');
            if (plugin == "emoji" && tag != null && tag.data("platform") == "wap" ) {
                tag = "-wap";
            } else {
                tag = "";
            }
            var pluginUrl = jChangyan.CDN + '/js/plugin/' + plugin + tag + '.js';
            jChangyan.loadJs(pluginUrl);
            jChangyan.stat(plugin);
        },
        /**
         * 获取要显示插件内容的容器，如果页面已存在，则直接返回，不存在则在当前script标签后创建一个（慎用）
         *
         * @param id
         *            div的id
         */
        container : function(id) {
            if (jQuery('#' + id).length == 0) {
                var div = jQuery('<div>', {
                    'id' : id
                });
                jChangyan.script.after(div);
                return div;
            } else {
                return jQuery('#' + id);
            }
        },
        /**
         * 自定义配置
         *
         * @param conf
         *            json格式的配置
         */
        config : function(conf) {
            if (conf) {
                jChangyan.extend(conf);
            }
        },
        /**
         * 第一次页面加载调用
         *
         * @param url
         *            请求的url
         * @param data
         *            请求参数，可为空
         * @param callback
         *            接口调用成功后的回调函数
         */
        loadData : function(url, data, callback) {
            var ajaxData = {
                'client_id' : jChangyan.appid,
                'topic_url' : jChangyan.url,
                'topic_title' : jChangyan.title,
                'topic_source_id' : jChangyan.sid || '',
                'topic_category_id' : jChangyan.cid || ''
            };
            if (typeof data == 'object') {
                for ( var key in data) {
                    ajaxData[key] = data[key];
                }
            } else if (typeof data == 'function') {
                callback = data;
            }

            jQuery.ajax({
                'type' : 'GET',
                'url' : url,
                'data' : ajaxData,
                'success' : callback || function() {
                },
                'dataType' : 'jsonp',
                'scriptCharset' : 'utf-8'
            });
        },
        /**
         * 获取启用的插件列表
         *
         * @param callback
         *            回调函数
         */
        loadPlugins : function(callback) {
            jQuery.ajax({
                'type' : 'GET',
                'url' : jQuery.Host + '/api/labs/plugins',
                'data' : {
                    'client_id' : appid
                },
                'success' : function(data) {
                    if (data) {
                        jChangyan.plugins = data.plugins || {};
                        if (callback) {
                            callback.call(this, data);
                        }
                    }
                },
                'dataType' : 'jsonp',
                'scriptCharset' : 'utf-8'
            });
        },
        /**
         * 加载插件配置
         *
         * @param plugin
         *            插件名
         * @param callback
         *            回调函数
         */
        loadConfig : function(plugin, callback) {
            jQuery.ajax({
                'type' : 'GET',
                'url' : jQuery.Host + '/api/labs/plugin/config',
                'data' : {
                    'client_id' : appid,
                    'plugin' : plugin
                },
                'success' : function(data) {
                    if (data && callback) {
                        callback.call(this, data);
                    }
                },
                'dataType' : 'jsonp',
                'scriptCharset' : 'utf-8'
            });
        },
        /**
         * 统计
         */
        stat : function(plugin) {
            var type = "labs" + plugin;
            jQuery.ajax({
                'type' : 'GET',
                'url' : jQuery.Host + '/stat/event',
                'data' : {
                    'clientid' : appid,
                    'type' : type
                },
                'success' : function() {},
                'dataType' : 'jsonp',
                'scriptCharset' : 'utf-8'
            });
        },
        /**
         * 显示+1，父容器的position: relative
         */
        plus1 : function(parent, item) {
            var pos = item.position();
            var w = item.width();
            var h = item.height();
            var x = pos.left + parseInt(item.css('margin-left')) + w / 2 - 17, y = pos.top - 10;
            var div = jQuery('<div>', {
                'text' : '+1',
                'style' : 'background-color: transparent; color: red; font-family: "Arial"; font-size: 180%; position: absolute;'
            });
            div.css({
                'left' : x + 'px',
                'top' : y + 'px'
            });
            parent.append(div);

            div.animate({
                'top' : (y - 20) + 'px'
            }, 1000, function() {
                div.fadeOut(1000, function() {
                    div.remove();
                });
            });
        },
        /**
         * TODO hook
         */
        register : function() {

        }
    });

    window.jChangyan = jChangyan;

    // jChangyan.loadPlugins();
    var cylabs = jQuery('div[role="cylabs"]');
    jQuery.each(cylabs, function(i, ele) {
        var $this = jQuery(this);
        var plugin = $this.data('use');
        if (jChangyan.loaded[plugin]) {
            return true; // 已经加载了
        }
        var conf = {};
        // 兼容畅言评论框设置 start
        if (typeof _config != 'undefined' && typeof _config == 'object') {
            conf.sid = _config.varName || '';
            conf.cid = _config.categoryId || '';
            conf.skin = _config.skin || '';
        }
        var $sohucs = jQuery('#SOHUCS');
        if ($sohucs.length > 0 && $sohucs.attr('sid')) {
            conf.sid = $sohucs.attr('sid');
        }
        // end
        // 畅言自己的设置
        if (typeof cylabsConfig != 'undefined' && typeof cylabsConfig == 'object') {
            conf.sid = cylabsConfig.sid || '';
            conf.cid = cylabsConfig.cid || '';
            conf.skin = cylabsConfig.skin || '';
        }
        if ($this.attr('sid')) {
            conf.sid = $this.attr('sid');
        }
        if ($this.attr('cid')) {
            conf.cid = $this.attr('cid');
        }
        if ($this.attr('skin')) {
            conf.skin = $this.attr('skin');
        }
        jChangyan.use(plugin, conf);
        jChangyan.loaded[plugin] = true;
    });

})(window, jQuery);
