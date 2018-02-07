<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mayforeversaeo extends MX_Controller {
    private $page_data;

    public function __construct() {
        parent::__construct();
        $this->page_data = array(
            "title" => "EO MEME Generator | ",
            "elek_zone_id" => 1025,
            "ogitem" => (object) array(
                "title" => "Executive Optical Meme Generator",
                "tags" => "GMA, gma, GMA Network, GMA News, GMA News Online, Executive Optical, EO, eo, #MayForeverSaEO, hugot, meme, meme maker, meme generator",
                "link" => BASE_URL . "mayforeversaeo",
                "description" => "May forever ba sa-EO? Share your hugot in this EO Meme Maker! #MayForeverSaEO",
                "image_url" => ASSETS_URL . 'img/eomeme/' . 'IA_EO_OGImage.jpg'
            ),
            "main_view" => "mayforeversaeo/meme_gen"
        );
    }

    public function index(){
        $this->load->view('header', $this->page_data);
        $this->load->view("index", $this->page_data);
        // $this->load->view('footer', $this->page_data);
    }

    public function gallery(){
        $this->page_data["main_view"] = "mayforeversaeo/gallery";
        $this->load->view('header', $this->page_data);
        $this->load->view("index", $this->page_data);
        // $this->load->view('footer', $this->page_data);
    }

    public function upload_image(){
        $res = array("status" => 0);
        $this->load->library("s3_lib");
        $this->load->model("mayforeversaeo/meme_model", "em");
        // pe($_POST);
        $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : "";
        // pe($this->validate_recaptcha($captcha));
        if($this->validate_recaptcha($captcha)){
            $filename = $_FILES['source']['name'] . ".png";
            $insert_params = array(
                "image_file" =>$filename,
                "author_email" => $_POST['author_email']
            );

            $last_id = $this->em->write_user_upload($insert_params);

            if($last_id > 0){
                $s3_params = array(
                    "bucket" => "test.gmanetwork.com",
                    "key" => "gno/microsites/eomemes/images/" . $last_id  . "_" . $filename,
                    "content_type" => "image/png",
                    "body" => file_get_contents($_FILES['source']['tmp_name'])
                );

                $this->s3_lib->save($s3_params);
                $res["status"] = 1;
            }
        }

        echo json_encode($res);
    }

    private function validate_recaptcha($captcha_response){
        require_once dirname(dirname(__FILE__)) . '/../../third_party/recaptcha/src/autoload.php';
        $secret = '6LeTngwTAAAAAO6tBeUR-mURZtlGoadaElRtJD58';
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($captcha_response);

        return $resp->isSuccess();
    }

    public function get_gallery(){
        $this->load->model("mayforeversaeo/meme_model", "em");
        $p = $_GET;
        $rparams["start"] = isset($p["start"])? $p["start"] : 0;
        $rparams["lim"] = 15;
        $gallery = $this->em->gallery($rparams);
        
        echo json_encode($gallery);
    }

}
