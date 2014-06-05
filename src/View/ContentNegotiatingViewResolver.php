<?php
/**
 * Return the appropiate view resolver based on the request.
 *
 * The view resolver is selected on the following criteria in the given order
 * <ol>
 *  <li>The 'format' request parameter</li>
 *  <li>The 'Accept' HTTP header</li>
 * </ol>
 */
class ContentNegotiatingViewResolver
{
    public function resolve() {
        return new JsonViewResolver();
    }
}
?>