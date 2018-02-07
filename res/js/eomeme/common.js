(function(){

    var memeGen = {
        htmlCanvas: null,
        canvasHldr: null,
        textEvTimeout: null,

        init: function(){
            this.htmlCanvas = $("#step1-main");
            this.canvasHldr = $("#canvas-hldr");
            // console.log("binding..");
            this._bindEventsText();
            this._bindEvents();
            this._rotate();
            this._load();
        },

        _bindEvents: function(){
            // console.log("das");
            $(".draggable").resizable({
                containment: "#step1-main",
                minWidth: 60,
                minHeight: 50,
                handles: "n,e,s,w,ne,se,sw,nw",
                autoHide: true,
                // stop: this._renderCanvas.bind(this)
            }).draggable({
                containment: "#step1-main",
                // stop: this._renderCanvas.bind(this)
            });
            
            $(window).unload(function(){
                $("#copy-text").val("");
                $("#upload-image").val("");
            });

        },
        _bindEventsText: function(){
            $("#draggable-text").resizable({
                containment: "#step1-main",
                minWidth: 60,
                minHeight: 50,
                handles: "n,e,s,w,ne,se,sw,nw",
                autoHide: true,
                // stop: this._renderCanvas.bind(this)
            }).draggable({
                containment: "#step1-main",
                // stop: this._renderCanvas.bind(this)
            });

            $("#copy-text").on("keyup", this._textEv.bind(this));

            $(window).on("scroll", function(){
                if($(document).scrollTop() > 100){
                    $("#fixed-side-ad").css("margin", "0");
                } else {
                    $("#fixed-side-ad").css("margin", "");
                }
            });

        },

            _rotate: function(){
            // Assign Rotatable
            $('.draggable').rotatable();

            },

        _load: function(){ 
        $('#step2-main *').attr("disabled", true);

        $("#click-upload").click(function() {
        $("#upload-image").click();
        });

        $(".replace").on("click", function() {
        $("#upload-image").trigger( "click" );
        });

        $("#submit").on("click", function() {
        var get = $('#article-photo-carousel .cont-slider .item.active img').attr('src');
        if (get == ''){
        
        }else{
        $('.draggable').css('background-image','url("'+get+'")');
        $('.draggable').css('display','block');
        $("#copy-text").attr("disabled",false);
        $('.disabler').css("display","none");
        $(".step-num3").css("background-color","#6bb9e3");  
        }
        });


        $("#copy-text").on("click", function() {
            $(".jscolor input").attr("disabled",false);
            $(".size input").attr("disabled",false);
        });

        $(".color .jscolor").change(function(){
            var color = $(".color .jscolor").val();
            var sharp = "#"+color;
            $("#draggable-text").css("color",sharp);
        });

        $(".size input").keydown(function(){
            var size = $(".size input").val();
            var lineHeight = size;
            $("#draggable-text").css("font-size",size+'px');
            $("#draggable-text").css("line-height",lineHeight+'px');
        });

         $(".size input").keyup(function(){
            var size = $(".size input").val();
            var lineHeight = size;
            $("#draggable-text").css("line-height",lineHeight+'px');
            $("#draggable-text").css("font-size",size+'px');
        });

        var $check = $("#check"); 
        var $submit = $('#submit-data');
        var ckbox = $('#check');

        $("#email").keyup(function(){
            $("#draggable-text").css("border-style","none");
            var $email = $("#email").val(); 
            var $recaptcha = $(".recaptcha-checkbox-checkmark");
            var validate = $("#email")[0].checkValidity();
            var copy = $('#copy-text').val();

            if(!validate){
            $submit.css("background-color","rgba(158, 158, 158, 0.32)");
            $submit.attr("disabled","disabled");
            }
            else {
                if(copy !== "" && ckbox.is(':checked')){
                    $submit.attr("disabled",false);
                    $submit.css("background-color","rgb(60, 86, 155)");
            }}
            });

         $("#email").focusout(function(){
            $("#draggable-text").css("border-style","none");
            var $email = $("#email").val(); 
            var $recaptcha = $(".recaptcha-checkbox-checkmark");
            var validate = $("#email")[0].checkValidity();
            var copy = $('#copy-text').val();

            if(!validate){
            $submit.css("background-color","rgba(158, 158, 158, 0.32)");
            $submit.attr("disabled","disabled");
            }
            else {
                if(copy !== "" && ckbox.is(':checked')){
                    $submit.attr("disabled",false);
                    $submit.css("background-color","rgb(60, 86, 155)");
            }}
            });

                    
        $('#check').on('click',function () {
        var copy = $('#copy-text').val();
        var validate = $("#email")[0].checkValidity();

            if (ckbox.is(':checked')) {
                if(validate && copy != ""){
                    $submit.attr("disabled",false);
                    $submit.css("background-color","rgb(60, 86, 155)");
            }}
            else{
                    $submit.css("background-color","rgba(158, 158, 158, 0.32)");
                    $submit.attr("disabled","disabled");
            }

        });


        $("#a-see-all").on("click", function(){
            var ga = {event_category: "See all button", action: "eo_clicked", event_label: "See all button clicked", event_value: 1};
            eoAnalytics.pageEvent(ga);
            document.location.href = base_url + "mayforeversaeo/gallery";
        });

        $(".eo-head img").on("click",function(){
            document.location.href = base_url + "mayforeversaeo";
        });

        // $("#copy-text").focusout(function(){
        // var text = $("#copy-text").val();
       
        
        // if(text != ""){
        //     $("#email").attr("disabled",false);
        //     $("#remaining").attr("disabled",false);
        // }else{
        //     $("#email").attr("disabled","disabled");
        // }
        // });

        $("#myImg").mouseenter(
            function(){
            $(".replace").css("z-index","8");
            });
         $("#myImg").mouseleave(
            function(){
            $(".replace").css("z-index","-1");
            });
         $(".header-eo").mouseenter(
            function(){
            $(".replace").css("z-index","8");
            });
         $(".header-eo").mouseleave(
            function(){
            $(".replace").css("z-index","-1");
            });
        $(".replace").mouseenter(
            function(){
            $(".replace").css("z-index","8");
            });
        $(".replace").mouseleave(
            function(){
            $(".replace").css("z-index","-1");
            });

        var text_max = 65;

        $('#copy-text').keyup(function() {
        var validate = $("#email")[0].checkValidity();
        var copy = $('#copy-text').val();
        var size = $(".size input").val();
        var lineHeight = size;
        var text_length = $('#copy-text').val().length;
        var text_remaining = text_max - text_length;

        $('#remaining').val(text_remaining);
        $("#draggable-text").css("line-height",lineHeight+'px');

        if (ckbox.is(':checked')) {
                if(validate && copy != ""){
                    $submit.attr("disabled",false);
                    $submit.css("background-color","rgb(60, 86, 155)");
            }}
            else{
                    $submit.css("background-color","rgba(158, 158, 158, 0.32)");
                    $submit.attr("disabled","disabled");
            }


        });
},
        _textEv: function(){
            $("#draggable-text").css("border-style","dotted");
            $("#draggable-text").html($("#copy-text").val());
            // clearTimeout(this.textEvTimeout);
        }
    };

    $(document).ready(function(){
        if(!isEoMobile){
            memeGen.init();
            $(":file").change(function () {
                if (this.files && this.files[0]) {
                    var filename = this.files[0].name;
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);

                    $("#img-out").attr("img-file",filename);
                }
            });
        }
    });

        function imageIsLoaded(e) {
        
        $(".replace").css("display","block");
        $("#submit").css("display","block");
        $(".step-num2").css("background-color","#6bb9e3");
        $(".meme-step").css("background-color","rgb(253, 253, 253)");
        $(".article-slide .carousel-indicators li").css("pointer-events","auto")
        $(".header-eo").css("display","block");
        $(".hashtag-eo").css("display","block");
        $('#step2-main *').attr("disabled", false);
        $('#myImg').css({'z-index':'5','display':'block'});
        $('#click-upload').css('display','none');
        $('#draggable-text').css({'position': 'absolute','z-index':'5'});
        $('#myImg').attr('src', e.target.result);
        };

})();


