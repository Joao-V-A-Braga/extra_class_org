<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Filter\TeacherFilter;
use App\Form\Type\Filter\TeacherFilterType;
use App\Form\Type\TeacherType;
use App\Service\TeacherService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/teacher', name: 'teacher_')]
class TeacherController extends AbstractCRUDController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(Request $request, TeacherService $service, PaginatorInterface $paginator): JsonResponse
    {
        $filter = new TeacherFilter();
        return parent::indexAction($request, $service, $paginator, $filter, TeacherFilterType::class);
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(Request $request, TeacherService $service): JsonResponse
    {
        $teacher = new Teacher();
        return parent::createAction($request, $service, $teacher, TeacherType::class);
    }

    #[Route('/update/{id}', name: 'update', methods: ['PUT'])]
    public function edit(Teacher $teacher, Request $request, TeacherService $service): JsonResponse
    {
        return parent::updateAction($request, $service, $teacher, TeacherType::class);
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function view(Teacher $teacher): JsonResponse
    {
        return new JsonResponse(data: $teacher->toArray(), status: Response::HTTP_CREATED);
    }
}