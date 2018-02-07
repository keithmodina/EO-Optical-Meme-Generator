<div class="col-lg-3" id="side-bar">
    <div id="eo-mrec" style="margin-bottom: 10px;">
        <div style="width:300px; height:250px;"></div>
    </div>
    <?php if($router == "gallery"){ ?>
        <div id="link">
            <a href="<?php echo BASE_URL?>mayforeversaeo?ref=create_meme" id="a-meme-link">
                <img src="<?php echo ASSETS_URL . "img/eomeme/IA_EO_CreateYourOwnMeme2.png" ?>" />
            </a>
        </div>
    <?php } else { ?>
        <div id="featured_title" style="text-align:center;width: 100%;font-size: 28px;font-weight: bold;"> FEATURED MEMES </div>
        <div id='eo-gallery-main' style="text-align:left;">
            <p style="text-align:center;font-size:18px;">Loading memes..</p>
        </div>
        <a href="<?php echo BASE_URL?>mayforeversaeo/gallery?ref=see_all" id="a-see-all">
            <div style="font-size: 30px;font-family:'DINCondensed';color: rgb(255, 255, 255);font-weight: bold;text-align:center;background-color:#3b569b;width: 283px;margin: auto;"> SEE ALL</div>
        </a>
    <?php } ?>
</div>