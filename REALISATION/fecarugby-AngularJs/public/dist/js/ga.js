        // Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        if (window.location.hostname !== 'localhost') {            
(function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
        function () {
            (b[l].q = b[l].q || []).push(arguments)
        });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.async=1;
    e.src = 'https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', 'UA-XXXXX-X', 'auto');
ga('send', 'pageview');
        }