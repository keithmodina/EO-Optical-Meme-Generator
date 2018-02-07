var eoAnalytics = {
    init: function(){
        ga('create', is_live ? 'UA-242242-28' : 'UA-60073030-2', 'auto', 'eoTracker');
        this.pageView();
        var ref = this.getParamUrl("ref");
        if(ref != null){
            var params = {
                event_category: ref == "see_all" ? "See all button" : "Create your own meme button", 
                action: "eo_clicked",
                event_label: ref == "see_all" ? "See all button clicked" : "Create your own meme button clicked", 
                event_value: 1
            };
            this.pageEvent(params);
            window.history.replaceState( {} , document.title, document.location.href.split("?")[0] );
        }
    }, 
    pageView: function(params){
        ga('eoTracker.send', {
            'hitType': 'pageview',
            'title': document.title
        });
    },
    pageEvent: function(params){
        ga('eoTracker.send', {
            'hitType': 'event', // Required.
            'eventCategory': params.event_category, // Required.
            'eventAction': typeof params.action !== "undefined" ? params.action : 'click', // Required.
            'eventLabel': params.event_label,
            'eventValue': params.event_value
        });
    },
    getParamUrl: function(name){
        url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
};

$(document).ready(function(){
    eoAnalytics.init();
})