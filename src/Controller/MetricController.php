<?php

namespace App\Controller;

use App\Constants\SerializerGroups;
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
class MetricController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, MetricService $service, PaginatorInterface $paginator): JsonResponse
    {
        $filter = new MetricFilter();

        $form = $this->createForm(MetricFilterType::class, $filter);
        $form->submit($request->query->all());

        try {
            if ($form->isValid()) {
                $pagination = $paginator->paginate(
                    $service->findByFilter($filter),
                    $request->query->get('page', $filter->getPage()?:1),
                    $request->query->get('per-page', $filter->getPerPage()?: 10)
                );
            } else {
                return self::getFormErrorResponse($form);
            }
        } catch (\Exception $e) {
            return new JsonResponse(
                ['message' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->jsonResponseByPaginator($pagination);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request, MetricService $service): JsonResponse
    {
        $metric = new Metric();

        $form = $this->createForm(MetricType::class, $metric);
        $form->submit(json_decode($request->getContent(), true));

        try {
            if ($form->isValid()) {
                $service->save($metric);
            } else {
                return self::getFormErrorResponse($form);
            }
        } catch (\Exception $e) {
            return new JsonResponse(
                ['message' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return new JsonResponse(
            data: $metric->toArray(),
            status: Response::HTTP_CREATED
        );
    }

    #[Route('/update/{id}', name: 'update', methods: ['PUT'])]
    public function edit(Metric $metric, Request $request, MetricService $service): JsonResponse
    {
        $form = $this->createForm(MetricType::class, $metric, ['method' => 'PUT']);
        $form->submit([
            ...$metric->toArray([SerializerGroups::DEFAULT]),
            ...json_decode($request->getContent(), true)
        ]);

        try {
            if ($form->isValid()) {
                $service->save($metric);
            } else {
                return self::getFormErrorResponse($form);
            }
        } catch (\Exception $e) {
            return new JsonResponse(
                ['message' => $e->getMessage()],
                status: Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return new JsonResponse(
            data: $metric->toArray(),
            status: Response::HTTP_CREATED
        );
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function view(Metric $metric): JsonResponse
    {
        return new JsonResponse(
            data: $metric->toArray(),
            status: Response::HTTP_CREATED
        );
    }
}