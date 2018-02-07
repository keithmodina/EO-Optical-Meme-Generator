var eoAd = {
    init: function(){
        this.loadMrec();
        this._bindSkinEvent();
    },

    _bindSkinEvent: function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 200){
                $(".eo-skin").addClass('skin-fixed');
            } else {
                $(".eo-skin").removeClass('skin-fixed');
            }
        });
    },

    loadMrec: function(){
        var adNum = Math.ceil(Math.random() * 3);
        var adImg = "<a target='_blank' href='https://www.eo-executiveoptical.com/'><img src='"+(assets_url+"img/eomeme/IA_EO_MRec"+adNum+".gif")+"'></a>";
        // console.log(assets_url+"img/eomeme/IA_EO_MRec"+adNum+".gif");
        $("#eo-mrec div:first").html(adImg);
    }
};

$(document).ready(function(){
    if(!isEoMobile){
        eoAd.init();
    }
})