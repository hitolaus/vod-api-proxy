<?php
require_once 'src/Provider/Provider.php';
require_once 'src/Model/Movie.php';

/**
 * Provider for YouBio (http://youbio.dk).
 */
class YoubioProvider extends Provider
{
    public function parse($doc) {
        $xpath = new DOMXPath($doc);

        $query = '//div[@id="movie_overview"]/div[@class="list"]/div[contains(@class,"svod")]';

        $entries = $xpath->query($query);

        $movies = array();

        foreach ($entries as $entry) {
            array_push($movies, new Movie($entry));
        }

        return $movies;
    }

    public function queue($video) {

    }
}
?>