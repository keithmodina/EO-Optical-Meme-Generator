var lightBox = {
    init: function(imgUrl){
        var html = "";
        html += "<div id='eo-light-main'>";
            html += "<div id='eo-gallery-backd'></div>";
            html += "<div id='eo-light-img'>";
                html += "<img src='"+ imgUrl +"'>";
                html += "<div id='eo-gallery-btn' class='article_mode_sr'>";
                html += '<ul>';
                    html += '<li class="srb">';
                                html += '<div class="social-icon-holder close">';
                                    html += '<span class="social-icon">';
                                    html += 'X';
                                    html += '</span>';
                                html += '</div>';
                    html += '</li>';
                    html += '<li class="srb is-fb-share" imgurl="'+imgUrl+'" displayText="Facebook">';
                                html += '<div class="social-icon-holder facebook-ico">';
                                    html += '<span class="social-icon">';
                                    html += '<i class="gma-icon gma-facebook"></i>';
                                    html += '</span>';
                                html += '</div>';
                    html += '</li>';
                    html += '<li class="srb is-tw-share" imgurl="'+imgUrl+'">';
                                html += '<div class="social-icon-holder twitter-ico">';
                                    html += '<span class="social-icon ">';
                                    html += '<i class="gma-icon gma-twitter"></i>';
                                    html += '</span>';
                                html += '</div>';
                    html += '</li>';
                html += "</ul>";
                html += "</div>";
            html += "</div>";
        html += "</div>";
        $("body").append(html);
    },

    destroy: function(){
        $("#eo-light-main").remove();
    },

    bindEvents: function(){
        $(document).on("click", "#eo-gallery-main li > img",(function(){
            var ga = {event_category: "Meme", action: "eo_clicked", event_label: "Meme clicked", event_value: 1};
            eoAnalytics.pageEvent(ga);
            lightBox.init($(this).attr("src"));
        }));

        $(document).on("click", ".social-icon-holder.close, #eo-gallery-backd" ,function(){
            lightBox.destroy();
        });
    }
}

