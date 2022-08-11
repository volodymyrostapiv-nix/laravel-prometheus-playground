<?php

namespace App\Http\Controllers;

use App\Models\MyFirstModel;
use Carbon\Carbon;
use Prometheus\CollectorRegistry;
use Prometheus\Exception\MetricsRegistrationException;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

class MetricsController extends Controller
{

    /**
     * @var CollectorRegistry
     */
    protected CollectorRegistry $registry;

    public function __construct(CollectorRegistry $registry){
        $this->registry = $registry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     * @throws MetricsRegistrationException
     */
    public function __invoke(): string
    {
        //Total
        $this->registry
        ->getOrRegisterCounter('total', 'models', 'it sets', ['type'])
        ->incBy(MyFirstModel::all()->count(),['count']);

        //Recent (newer than subMinutes from now)
        $stamp = Carbon::now()->subMinutes(30)->format("Y-m-d H:i:s");

        $this->registry
            ->getOrRegisterCounter('recent', 'models', $stamp, ['type'])
            ->incBy(MyFirstModel::where('created_at', '>=', $stamp)
                ->get()
                ->count(),['count']);

        $renderer = new RenderTextFormat();
        $result = $renderer->render($this->registry->getMetricFamilySamples());

        header('Content-type: ' . RenderTextFormat::MIME_TYPE);
        return $result;
    }
}
