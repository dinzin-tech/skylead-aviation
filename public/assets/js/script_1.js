if (!window.Intl || !window.Intl.Segmenter) {
      (function() {
        var script = document.createElement('script');
        script.src = '../static.parastorage.com/unpkg/%40formatjs/intl-segmenter%4011.7.10/polyfill.iife.js';
        document.head.appendChild(script);
      })();
    }