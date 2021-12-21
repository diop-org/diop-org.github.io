var smtUserAgent = navigator.userAgent.toLowerCase();

var smtBrowser = {
	version: (smtUserAgent.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [])[1],
	safari: /webkit/.test(smtUserAgent) && !/chrome/.test(smtUserAgent),
	chrome: /chrome/.test(smtUserAgent),
	opera: /opera/.test(smtUserAgent),
	msie: /msie/.test(smtUserAgent) && !/opera/.test(smtUserAgent),
	mozilla: /mozilla/.test(smtUserAgent) && !/(compatible|webkit)/.test(smtUserAgent)
};

var _smtStyleUrlCached = null;
function smtGetStyleUrl() {
    if (null == _smtStyleUrlCached) {
        var ns;
        _smtStyleUrlCached = '';
        ns = document.getElementsByTagName('link');
        for (var i = 0; i < ns.length; i++) {
            var l = ns[i];
            if (l.href && /style\.ie6\.php(\?.*)?$/.test(l.href)) {
                return _smtStyleUrlCached = l.href.replace(/style\.ie6\.php(\?.*)?$/, '');
            }
        }

        ns = document.getElementsByTagName('style');
        for (var i = 0; i < ns.length; i++) {
            var matches = new RegExp('import\\s+"([^"]+\\/)style\\.ie6\\.php"').exec(ns[i].innerHTML);
            if (null != matches && matches.length > 0)
                return _smtStyleUrlCached = matches[1];
        }
    }
    return _smtStyleUrlCached;
}  

function smtFixPNG(element) {
	if (smtBrowser.msie && smtBrowser.version < 7) {
		var src;
		if (element.tagName == 'IMG') {
			if (/\.png$/.test(element.src)) {
				src = element.src;
				element.src = smtGetStyleUrl() + 'images/blank.gif';
			}
		}
		else {
			src = element.currentStyle.backgroundImage.match(/url\("(.+\.png)"\)/i);
			if (src) {
				src = src[1];
				element.runtimeStyle.backgroundImage = 'none';
			}
		}
		if (src) element.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "')";
	}
}
