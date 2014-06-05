<?php
// Parse $_SERVER["PATH_INFO"]

// Lookup provider
$providers = Provider::all();

$model = array();
foreach ($providers as $p) {
    array_push($model, $p->??);
}

$contentNegotiation = new ContentNegotiatingViewResolver();

$viewResolver = $contentNegotiation->resolve();

header('Content-Type: ' . $viewResolver->contentType);

print $viewResolver->resolve($model);
?>