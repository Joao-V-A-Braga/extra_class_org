<?php

namespace App\Controller;

use App\Entity\Metric;
use App\Filter\MetricFilter;
use App\Form\Type\Filter\MetricFilterType;
use App\Form\Type\MetricType;
use App\Service\MetricService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/metric', name: 'metric_')]
class MetricController extends AbstractCRUDController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, MetricService $service, PaginatorInterface $paginator): JsonResponse
    {
        $filter = new MetricFilter();
        return parent::indexAction($request, $service, $paginator, $filter, MetricFilterType::class);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request, MetricService $service): JsonResponse
    {
        $metric = new Metric();
        return parent::createAction($request, $service, $metric, MetricType::class);
    }

    #[Route('/update/{id}', name: 'update', methods: ['PUT'])]
    public function edit(Metric $metric, Request $request, MetricService $service): JsonResponse
    {
        return parent::updateAction($request, $service, $metric, MetricType::class);
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function view(Metric $metric): JsonResponse
    {
        return new JsonResponse(data: $metric->toArray(), status: Response::HTTP_CREATED);
    }
}