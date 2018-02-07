(function(){
    var gallery = {
        url: "microsites/eomemes/json/data_",
        pageNumber: 1,
        eventBinded: 0,
        pageEnd: false,
        dataStart: 0,
        mainGallery: function(errCallback){
            var url = data_url + this.url + this.pageNumber + ".gz";
            if(this.pageNumber > 10){
                url = base_url + "mayforeversaeo/get_gallery?start=" + this.dataStart;
            }
            this._netRequest({url: url}).done((function(res){

                if(Object.keys(res).length){
                    var dom = this._buildDom(res, "all");
                    $("#eo-gallery-main").html(dom);
                    if(this.eventBinded == 0){
                        this.bindEvents();
                    }
                    $("#eo-gallery-main li img").lazyload({
                        effect : "fadeIn"
                    });

                    // typeof successCallback == "function" && successCallback();

                } else{
                    errCallback();
                }

            }).bind(this))
            .error(function(err){
                if(typeof errCallback == "function"){
                    errCallback(err);
                }
            });
        },

        recent: function(){
            var url = data_url + "microsites/eomemes/json/featured.gz";
            var $mainPlaceHolder = $("#eo-gallery-main");
            this._netRequest({url: url}).done((function(res){
                if(res.length){
                    var html = this._buildDom(res, "recent");
                    $mainPlaceHolder.html(html);
                    $("#eo-gallery-main li img").lazyload({
                        effect : "fadeIn"
                    });
                    lightBox.bindEvents();
                    imgShare.init();
                } else {
                    this._removeFeeaturedMemes();
                }
            }).bind(this)).error((function(){
                    this._removeFeeaturedMemes();             
            }).bind(this));
        },

        _removeFeeaturedMemes: function(){
            $("#eo-gallery-main, #featured_title").remove();
            $("#a-see-all div").text("GO TO GALLERY");
        },

        _netRequest: function(params){
            return $.ajax({
                url: typeof params.url !== undefined ? params.url : "",
                dataType: "json"
            });
        },

        _buildDom: function(data, type){
            var html = "",
            baseFilePath = "//images.gmanews.tv/webpics/2016/10/",
            dataLength = type == "all" ? data.length : 4;
            html += "<ul>";
            for(var i = 0; i < dataLength; i++){
                if(typeof data[i] !== "undefined"){
                    var img = data_url + "microsites/eomemes/images/" + data[i].filename;
                    html += "<li data-imgsrc = '"+ img +"'>";
                        html += "<img data-original='"+ img +"'>"
                        html += "<div id='eo-gallery-btn' class='article_mode_sr'>";
                            html += '<ul>';
                                html += '<li class="srb is-fb-share" imgurl="'+img+'">';
                                            html += '<div class="social-icon-holder facebook-ico">';
                                                html += '<span class="social-icon">';
                                                html += '<i class="gma-icon gma-facebook"></i>';
                                                html += '</span>';
                                            html += '</div>';
                                html += '</li>';
                                html += '<li class="srb is-tw-share" imgurl="'+img+'">';
                                            html += '<div class="social-icon-holder twitter-ico">';
                                                html += '<span class="social-icon ">';
                                                html += '<i class="gma-icon gma-twitter"></i>';
                                                html += '</span>';
                                            html += '</div>';
                                html += '</li>';
                            html += "</ul>";
                        html += "</div>";
                    html += "</li>";
                }
            }
            html += "</ul>";
            return html;
        },
        bindEvents: function(){
            $("#page-ctrl > div").on("click", (function(event){
                var target = $(event.currentTarget).index();
                if(target == 0 && ((this.pageNumber-1) == 0)){
                    return true;
                }

                if(target == 0){
                    $("#page-ctrl > div").eq(1).show();
                    this.pageNumber -=1;
                    this.dataStart -= 15;
                } else {
                    this.pageNumber +=1;
                    this.dataStart += 15;
                }

                this.mainGallery(function(err){
                    gallery.pageNumber -=1;
                    gallery.dataStart -= 15;
                    $("#page-ctrl > div").eq(target).hide();
                });

            }).bind(this));

            // $("#a-meme-link").on("click", function(){
            //     var ga = {event_category: "Create your own meme button", action: "eo_clicked", event_label: "Create your own meme button clicked", event_value: 1};
            //     eoAnalytics.pageEvent(ga);

            //     document.location.href = base_url + "mayforeversaeo";
            // });

            lightBox.bindEvents();
            imgShare.init();
            this.eventBinded = 1;
        }
    }

    $(document).ready(function(){
        if(!isEoMobile){
            if(router == "gallery"){
                gallery.mainGallery();
            } else {
                gallery.recent();
            }

            $(".eo-head img").on("click",function(){
                document.location.href = base_url + "mayforeversaeo";
            });
        }
    });

})();

