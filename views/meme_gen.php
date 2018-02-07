<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.ui.rotatable/1.0.1/jquery.ui.rotatable.css">
<script src="//cdn.jsdelivr.net/jquery.ui.rotatable/1.0.1/jquery.ui.rotatable.min.js"></script>

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
/*    @font-face {
    font-family: 'MyWebFont';
    src: url('webfont.eot'); 
    src: url('webfont.eot?#iefix') format('embedded-opentype'),
         url('webfont.woff') format('woff'), 
         url('webfont.ttf')  format('truetype'), 
         url('webfont.svg#svgFontName') format('svg'); 
    }*/
</style>

<div class="col-lg-8 eo-contents" id="mg-hldr">

    <?php $this->load->view("eo_head"); ?>

    <div class=".col-lg-4" id="meme-main">

        <div style="display:table; margin: auto; width: 97%;">
          <div class="step-title">WHY SO SEERIOUS?</div>
        <div id="step1-main" class=".col-lg-2 meme-step">
        <div class="step-num">1</div>
        <div id="printed">
        <div class="header-eo" style="display: none;"><img src="<?php echo BASE_URL."res/img/eomeme/IA_EO_MemeEOHeader.png"?>" alt="">
        </div>

        <div id="click-upload"><img src="<?php echo "http://www.gmanetwork.com/news/res/img/eomeme/upload.jpg"?>" alt=""><br>
        upload a photo<br>(mo, nya, ng crush nya..<br>Bahala ka, bes. Push mo yan.)<br>Recommended photo shape<br>is square (1:1 ratio).
        </div>
        <img id="myImg" src="" style="display: none;"/>
            <div class="draggable" style="display: none;">
                    <div class="rotate-ctr"></div>
            </div>
            <input type='file' id="upload-image" style="visibility:hidden;"/>

            <div id="draggable-text"></div>
            <div class="hashtag-eo" style="display:none;">#MAYFOREVERSAEO</div>
      
        </div>
        </div>
        <div class="step-title2">PUMILI KA. ISA LANG, HA.</div>
        <div id="step2-main" class="meme-step meme-step">
            <div class="step-num2">2</div>
            
            <div class="carousel slide article-slide" id="article-photo-carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner cont-slider">

                <div class="item active">
                    <p id="preview">Click to preview eyeglass</p>
                    <img src="" alt="" style="display: none;">
                </div>

                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_1.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_2.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_3.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_4.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_5.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_6.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_7.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_8.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_9.png" ?>">
                </div>
                <div class="item">
                <img alt="" title="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_10.png" ?>">
                </div>
               <!--  <div class="item">
                <img alt="" title="" src="/news/res/img/eomeme/IA_200px_EOFRAME_1.png">
                </div -->
                </div>

                <input type="submit" id="submit" value="USE EYEGLASS" style="display: none;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li class="first" data-slide-to="1" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_1.png" ?>">
                </li>
                <li class="" data-slide-to="2" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_2.png" ?>">
                </li>
                <li class="" data-slide-to="3" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_3.png" ?>">
                </li>
                <li class="" data-slide-to="4" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_4.png" ?>">
                </li>
                <li class="" data-slide-to="5" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_5.png" ?>">
                </li>
                <li class="" data-slide-to="6" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_6.png" ?>">
                </li>
                <li class="" data-slide-to="7" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_7.png" ?>">
                </li>
                <li class="" data-slide-to="8" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_8.png" ?>">
                </li>
                <li class="" data-slide-to="9" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_9.png" ?>">
                </li>
                <li class="" data-slide-to="10" data-target="#article-photo-carousel">
                <img alt="" src="<?php echo BASE_URL."res/img/eomeme/IA_200px_EOFRAME_10.png" ?>">
                </li>
                </ol>
                </div>
        </div>
         
        <div class="replace" type="" style="display: none;">
            <img src="<?php echo BASE_URL."res/img/eomeme/IA_EO_ReplacePhoto.png" ?>" alt="">
        </div>
        <button type="" style="visibility: hidden;"></button>

        <div class="step-num3">3</div>
        <div class="step-title3">IPAKITA ANG NARARAMDAMAN:</div>

            <textarea disabled="disabled" placeholder="'Wag kang maging malabo, bes. Klaruhin mo." rows="1" cols="26" maxlength="65" id="copy-text"></textarea>
    
            <div class="color">
            <div class="disabler"></div>
            <input class="jscolor" value="808080">
            </div>
            <p class="char-remaining-label">Remaining characters:</p>
            <input disabled="disabled" id="remaining" class="char-remaining" value="65" type="text">
    
            <div class="size"><input disabled="disabled" type="text" value="22"></div>


            <p class="email">Enter Email address<input placeholder="juandc@website.com" type="email" required="true" pattern="[^ @]*@[^ @]*" id="email" name="email"></p>
            
            <div class="captcha-container">
            <div class="g-recaptcha" data-sitekey="6LeTngwTAAAAAFN-W0k7A9PFkLLQAnnzrw2bc8DW"></div>
            </div>

            <div class="terms">TERMS AND CONDITIONS<br>
            <p id="terms"></p>
            </div>

            <p class="agree">I Agree</p>
            <input id="check" type="checkbox">

             <button disabled="disabled" type="submit" id="submit-data" value="Submit">SUBMIT</button>
                        
        </div>

    </div>
</div>
<?php $this->load->view("sidebar"); ?>

<div id="img-out" img-file="" hidden=""></div>
