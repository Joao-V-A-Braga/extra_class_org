<?php

namespace App\Controller;

use App\Filter\MetricFilter;
use App\Form\Type\MetricFilterType;
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
}