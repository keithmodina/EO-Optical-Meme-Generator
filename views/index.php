<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<style>
    @font-face {
        font-family: "DINCondensed";
        src: url('<?php echo ASSETS_URL; ?>css/eomeme/fonts/DINCondensedBold.ttf') format('truetype');
    }

    @font-face {
        font-family: "Tw Cen MT";
        src: url('<?php echo ASSETS_URL; ?>css/eomeme/fonts/ufonts.com_tw-cen-mt.ttf') format('truetype');
    }
    @font-face {
        font-family: "Myriad Pro";
        src: url('<?php echo ASSETS_URL; ?>css/eomeme/fonts/MyriadPro-Regular.otf') format('opentype');
    }
    @font-face {
        font-family: 'DINCondensed';
        src: url('<?php echo ASSETS_URL; ?>css/eomeme/fonts/DINCondensedBold.eot') /* EOT file for IE */
    }
    @font-face {
        font-family: "Tw Cen MT";
        src: url("<?php echo ASSETS_URL; ?>css/eomeme/fonts/ufonts.com_tw-cen-mt.eot") /* EOT file for IE */
    }
       @font-face {
        font-family: "Myriad Pro";
        src: url("<?php echo ASSETS_URL; ?>css/eomeme/fonts/MyriadPro-Regular.eot") /* EOT file for IE */
    }
    @font-face {
        font-family: "Oswald";
        src: url("<?php echo ASSETS_URL; ?>css/eomeme/fonts/Oswald-DemiBold.eot") /* EOT file for IE */
    }
</style>
<div id="eo-ldr" style="width: 100%; text-align: center;margin-bottom: 10px;">
    <a target='_blank' href='https://www.eo-executiveoptical.com/'>
        <img src="<?php echo ASSETS_URL; ?>img/eomeme/IA_EO_Leaderboard.jpg">
    </a>
</div>
<div class="container" id="eo-hldr">
    <div id="" class="sky-ad col-lg-1" style="">
    <a target="_blank" href='https://www.eo-executiveoptical.com/'>
        <img class="eo-skin" src="<?php echo ASSETS_URL; ?>img/eomeme/IA_EO_LeftSkinning.jpg">
    </a>
    </div>
    <div class="col-lg-10" id="main-container" style="background-image: url('<?php echo ASSETS_URL . "img/eomeme/IA_EO_Background2.jpg" ?>')">
        <div class="" id="main-view">
            <?php $this->load->view($main_view); ?>
        </div>
        <div style="text-align:center;margin-top:20px;">
            <div id="eo-past">
                ANG PAST, PUWEDENG KALIMUTAN... PERO ANG <p>HASHTAG</p>, DAPAT HINDI!
            </div>
            <div id="eo-hashtag">
                <p id="footer-text"></p>
            </div>
        </div>
    </div>

    <div id="" class="sky-ad col-lg-1 2" style="">
        <a target="_blank" href='https://www.eo-executiveoptical.com/'>
            <img class="eo-skin" src="<?php echo ASSETS_URL; ?>img/eomeme/IA_EO_RightSkinning.jpg">
        </a>
    </div>
</div>


<div class="modal fade" id="promptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style='top:20%'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title shreType" id="myModalLabel">
            SHARE MEME
        </h4>
      </div>
      <div class="modal-body">
        <div class='row'>
            <div class='col-sm-6'>
                <div class='row'>
                    <div class='col-xs-12'>
                        <textarea style='resize: none;' cols='35' rows='10' id='prevDesc' placeholder="Hugot fest na, bes! Make your own with EO Meme Maker para #MayForeverSaEO. Click here: http://gmanetwork.com/mayforeversaeo"></textarea>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <img id='prevImg' alt="MEME IMAGE" src="" style="width: 100%">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="shreBtn">Share</button>
      </div>
    </div>
  </div>
</div>

<!-- Mobile Response -->

<div id="eo-mobile-msg" style="background-image: url('<?php echo ASSETS_URL . "img/eomeme/IA_EO_Background.jpg" ?>');background-repeat:no-repeat;">
    <div style="margin:auto;display:table;text-align:center;">
        <div>
            <img src="<?php echo ASSETS_URL . "img/eomeme/IA_EO_TopLeftLogo.png" ?>"/>
        </div>
        <div>
            <img src="<?php echo ASSETS_URL?>img/eomeme/IA_M_EO_ToDesktop2.png">
        </div>
        <div>
            <div id="eof-eomg">
                <div style="font-size:36px;" id="eo-forever">
                    #MAYFOREVERSAEO
                </div>
                <div style="margin-top:-9px;" id="eo-mg">
                    MEME GENERATOR
                </div>
                <div style="font-family:'DINCondensed';font-size: 24px;color:#3c569b;font-weight:bold;line-height:26px;margin: 11px auto 0px;width:90%;">
                    Create your own memes using a desktop browser.
                </div>
                <div style="font-family:'DINCondensed';font-size: 20px;color:#3c569b;font-weight:bold;">
                    Visit gmanetwork.com/MayForeverSaEO
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>
</div>


<script>
    var isEoMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if(!isEoMobile){
        $("#eo-hldr").css({"display": "flex"});
        $(document).ready(function () {
            var switchTo5x = true;
            // setInterval(function(){
            //     alert(JSON.stringify(stButtons));
            // }, 1000);
            var stpopup = $(window).width() <= 1200 ? false : true;

            stLight.options({
                publisher: "2fe2f580-75f9-45bd-ad56-972d8c36a727",
                onhover: false,
                doNotHash: false,
                doNotCopy: false,
                hashAddressBar: false,
                popup: stpopup,
                servicePopup: stpopup
            });
            $(".eo.st_facebook_custom").on("click", function(){
                var ga = {event_category: "Facebook share page button", action: "eo_clicked", event_label: "Facebook share page button clicked", event_value: 1};
                eoAnalytics.pageEvent(ga);
            });
            $(".eo.st_twitter_custom").on("click", function(){
                var ga = {event_category: "Twitter share page button", action: "eo_clicked", event_label: "Twitter share page button clicked", event_value: 1};
                eoAnalytics.pageEvent(ga);
            });

            $.ajax({
                type: "get",
                url: data_url + 'microsites/eomemes/json/eo_config.json',
                dataType: 'json',
                success: function (data) {

                    var terms = data.terms;
                    var footerText = data.footer_text;

                    $("#terms").append(terms);
                    $("#footer-text").append(footerText);
                }
            });
        });
    } else {
        $("#eo-ldr").remove();
        $("#eo-mobile-msg").css({"display": "block"});
        $(".container").css({"width": "100% !important"});
    }

</script>