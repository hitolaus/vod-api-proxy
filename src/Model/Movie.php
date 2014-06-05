<?php
require_once 'src/Model/Video.php';

class Movie extends Video {
    function __construct($dom = null) {
        if (isset($dom)) {
            $img = $dom->getElementsByTagName('img');

            $this->title = $img->item(0)->getAttribute('alt');
            $this->thumb = $img->item(0)->getAttribute('data-original');
        }
    }
}
?>
