<?php
class ProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnYoubioForYoubioInput() {
        $provider = Provider::lookup('youbio');

        $this->assertTrue($provider instanceof YoubioProvider);
    }

    /**
     * @test
     */
    public function shouldReturnAll() {
        $providers = Provider::all();

        $this->assertEquals(1, count($providers));
        $this->assertTrue($providers[0] instanceof YoubioProvider);
    }
}
?>