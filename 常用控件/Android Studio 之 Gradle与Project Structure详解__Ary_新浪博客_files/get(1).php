
(function () {
    var head = document.getElementsByTagName('head')[0];
    var loadJS = function (url, callback) {
        var s = document.createElement('script');
        var loaded = false;
        var onload = function () {
            if (!loaded &&
                (!s.readyState
                    || "loaded" === s.readyState
                    || "complete" === s.readyState)) {
                loaded = true;

                // setTimeout for IE10-
                setTimeout(function () {
                    callback(false);
                }, 0);
            }
        };
        var onerror = function () {
            callback(true);
        };
        s.charset = 'UTF-8';
        s.id = 'gt_lib';
        s.async = false;
        s.onload = s.onreadystatechange = onload;
        s.onerror = onerror;
        s.src = url;
        head.appendChild(s);
    };
    var normalizeDomain = function (domain) {
        // return domain.replace(/^https?:\/\/|\/.*$/g, '');
        return domain.replace(/^https?:\/\/|\/$/g, '');
    };
    var normalizePath = function (path) {
        path = path.replace(/\/+/g, '/');
        if (path.indexOf('/') !== 0) {
            path = '/' + path;
        }
        return path;
    };
    var makeURL = function (protocol, domain, path) {
        domain = normalizeDomain(domain);
        var url = normalizePath(path);
        if (domain) {
            url = protocol + domain + url;
        }
        return url;
    };

    var load = function (protocol, domains, path, callback) {
        var max = domains.length - 1;
        var try_one = function (at) {
            var url = makeURL(protocol, domains[at], path);
            loadJS(url, function (err) {
                if (err) {
                    if (at >= max) {
                        callback(true, url);
                    } else {
                        try_one(at + 1);
                    }
                } else {
                    callback(false);
                }
            });
        };
        try_one(0);
    };

    var protocol = 'http://';
    // some domain: uems.sysu.edu.cn/jwxt/geetest/
    var domains = ['static.geetest.com/', 'dn-staticdown.qbox.me/'];
    var path = "static/js/geetest.5.10.10.js";

    load(protocol, domains, path, function (err) {
        if (err) {
            load(protocol, domains, '/static/js/geetest.0.0.0.js', function (err, url) {
                if (err) {
                    throw new Error('GeetestError: can not loaded ' + url);
                } else if (typeof window.gtcallback === 'function') {
                    window.gtcallback();
                }
            });
        } else if (typeof window.gtcallback === 'function') {
            window.gtcallback();
        }
    });
})();
