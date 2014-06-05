<?php
require_once 'src/View/JsonViewResolver.php';
require_once 'src/Model/Movie.php';

class JsonViewResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldMarshalSingleMovieElementAsJsonObject()
    {
        $m = new Movie();
        $m->title = 'title1';
        $m->thumb = 'thumb1';

        $resolver = new JsonViewResolver();

        $result = $resolver->resolve($m);

        $this->assertEquals('{"id":"","title":"title1","thumb":"thumb1"}', $result);
    }

    /**
     * @test
     */
    public function shouldMarshalSingleMovieArrayAsJsonArray()
    {
        $m = new Movie();
        $m->title = 'title1';
        $m->thumb = 'thumb1';

        $resolver = new JsonViewResolver();

        $result = $resolver->resolve(array($m));

        $this->assertEquals('[{"id":"","title":"title1","thumb":"thumb1"}]', $result);
    }

    /**
     * @test
     */
    public function shouldMarshalEmptyArrayAsEmptyJsonArray()
    {
        $resolver = new JsonViewResolver();

        $result = $resolver->resolve(array());

        $this->assertEquals('[]', $result);
    }
}
?>