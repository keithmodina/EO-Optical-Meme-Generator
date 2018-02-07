<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends MX_Controller {
    private $page_data;

    public function __construct() {
        parent::__construct();
        $this->page_data = array(
            "title" => "EO MEME Generator | ",
            "elek_zone_id" => 1025,
            "ogitem" => (object) array(
                "title" => "Executive Optical Meme Generator",
                "tags" => "GMA, gma, GMA Network, GMA News, GMA News Online, Executive Optical, EO, eo, #MayForeverSaEO, hugot, meme, meme maker, meme generator",
                "link" => BASE_URL . "mayforeversaeo/gallery",
                "description" => "May forever ba sa-EO? Share your hugot in this EO Meme Maker! #MayForeverSaEO",
                "image_url" => ASSETS_URL . 'img/eomeme/' . 'IA_EO_OGImage.jpg'
            ),
            "main_view" => "mayforeversaeo/meme_gen"
        );
    }

    public function index(){
        $this->page_data["main_view"] = "mayforeversaeo/gallery";
        $this->load->view('header', $this->page_data);
        $this->load->view("index", $this->page_data);
        // $this->load->view('footer', $this->page_data);
    }

}
