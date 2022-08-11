<?php

namespace App\Http\Controllers;

use Prometheus\CollectorRegistry;
use Prometheus\Exception\MetricsRegistrationException;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

class MetricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     * @throws MetricsRegistrationException
     */
    public function __invoke(): string
    {
        $registry = new CollectorRegistry(new InMemory());

        $counter = $registry->getOrRegisterGauge('test', 'some_counter', 'it sets', ['type']);
        $counter->set(rand(1, 99), ['blue']);

        $renderer = new RenderTextFormat();
        $result = $renderer->render($registry->getMetricFamilySamples());

        header('Content-type: ' . RenderTextFormat::MIME_TYPE);
        return $result;
    }
}
