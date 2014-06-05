<?php
/**
 * Defines interface for for VOD providers and provides lookup
 * functions for the Provider implementations.
 */
abstract class Provider
{
    /**
     * Queue a video.
     * <p>
     * The queue implementation depends on the provider. Some implement a real queue,
     * others it's more a favorite function and some do nothing.
     *
     * @param video The Video to queue
     */
    abstract public function queue($video);

    /**
     * Lookup a provider
     */
    public static function lookup($name) {
        return new YoubioProvider();
    }

    /**
     * Return all providers
     */
    public static function all() {
        return array(new YoubioProvider());
    }
}
?>