<?php

namespace App\Controller;

use App\Entity\Department;
use App\Repository\DepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    public $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository=$departmentRepository;
    }

    /**
     * @Route("/department",name="dep")
     */

    public function create(Request $request){
        $department_request=json_decode($request->getContent(),true);
        $department= new Department();
        $department->setEmail($department_request["email"]);
        $department->setName($department_request["name"]);
        $this->departmentRepository->add($department);
        return new JsonResponse("success", 201);
    }

    /**
     * @Route("/listdepartments",name="list_dep")
     */

    public function list()
    {
       $departments = $this->departmentRepository->list();
       return new JsonResponse($departments);
    }

    /**
     * @Route("/selectdepartment/{id}",name="select_dep")
     */

    public function select($id)
    {
        $departments = $this->departmentRepository->select($id);
        return new JsonResponse($departments);
    }
}