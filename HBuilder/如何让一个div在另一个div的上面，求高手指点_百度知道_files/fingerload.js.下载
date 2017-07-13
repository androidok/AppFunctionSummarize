/**
 * @file fingerprint js loader
 */
try {
    (function () {
        function insertScript(jsName, jsFile, callback) {
            window.jsFileList = window.jsFileList || {};
            if (!window.jsFileList[jsName]) {
                window.jsFileList[jsName] = true;
                var d = document;
                var s = d.createElement('script');
                s.type = 'text/javascript';
                s.charset = 'utf-8';
                if (s.readyState) {
                    s.onreadystatechange = function () {
                        if (s.readyState === 'loaded' || s.readyState === 'complete') {
                            s.onreadystatechange = null;
                            callback && callback();
                        }
                    };
                } else {
                    s.onload = function () {
                        callback && callback();
                    };
                }
                s.src = jsFile;
                d.getElementsByTagName('head')[0].appendChild(s);
            } else {
                callback && callback();
            }
        }

        function getFingerprint(loadParams) {
            var domain = 'https://passport.baidu.com';
            insertScript('passFingerprintJs', domain + '/static/passpc-account/js/module/fingerprint.min.js', function () {
                var params = {
                    'page': loadParams.page,
                    'source': loadParams.source,
                    'tpl': loadParams.tpl
                };
                if (fingerprint && fingerprint.initFingerprint) {
                    fingerprint.initFingerprint(params);
                }
            });
        }

        window.passFingerload = function (loadParams) {
            getFingerprint(loadParams);
        };

    })();
} catch (e) {}