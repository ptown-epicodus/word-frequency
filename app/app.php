<?php
date_default_timezone_set('America/Los_Angeles');
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/RepeatCounter.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), [ 'twig.path' => __DIR__ . '/../views/' ]);

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.html.twig');
});

$app->post('/result', function() use ($app) {
    $word = $_POST['word'];
    $text = $_POST['sample-text'];
    $counter = new RepeatCounter;

    $result = $counter->CountRepeats($word, $text);

    return $app['twig']->render('result.html.twig', [ 'result' => $result ]);
});

return $app;
?>
