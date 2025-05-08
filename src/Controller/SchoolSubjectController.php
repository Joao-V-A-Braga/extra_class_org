<?php

namespace App\Controller;

use App\Entity\SchoolSubject;
use App\Filter\SchoolSubjectFilter;
use App\Form\Type\Filter\SchoolSubjectFilterType;
use App\Form\Type\SchoolSubjectType;
use App\Service\SchoolSubjectService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/school-subject', name: 'school_subject_')]
class SchoolSubjectController extends AbstractCRUDController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, SchoolSubjectService $service, PaginatorInterface $paginator): JsonResponse
    {
        $filter = new SchoolSubjectFilter();
        return parent::indexAction($request, $service, $paginator, $filter, SchoolSubjectFilterType::class);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request, SchoolSubjectService $service): JsonResponse
    {
        $schoolSubject = new SchoolSubject();
        return parent::createAction($request, $service, $schoolSubject, SchoolSubjectType::class);
    }

    #[Route('/update/{id}', name: 'update', methods: ['PUT'])]
    public function edit(SchoolSubject $schoolSubject, Request $request, SchoolSubjectService $service): JsonResponse
    {
        return parent::updateAction($request, $service, $schoolSubject, SchoolSubjectType::class);
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function view(SchoolSubject $schoolSubject): JsonResponse
    {
        return new JsonResponse(data: $schoolSubject->toArray(), status: Response::HTTP_CREATED);
    }
}