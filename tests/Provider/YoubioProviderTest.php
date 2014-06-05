<?php
require_once 'src/Provider/YoubioProvider.php';

class YoubioProviderTest extends PHPUnit_Framework_TestCase
{
    public function setUp() {
        // Disable DOMDocument warnings
        libxml_use_internal_errors(true);
    }

    /**
     * @test
     */
    public function shouldParsePopularMoviePage()
    {
        $doc = new DOMDocument();
        $doc->loadHTMLFile('tests/Provider/youbio/movie_popular.html');

        $p = new YoubioProvider();
        $m = $p->parse($doc);

        $this->assertEquals(132, count($m));
        $this->assertEquals('Alvin og De Frække Jordegern 3', $m[0]->title);
        $this->assertEquals('http://3.ycloud.in/covers/284x408/alvin-og-de-fraekke-jordegern-3.jpg', $m[0]->thumb);
    }
}
?>