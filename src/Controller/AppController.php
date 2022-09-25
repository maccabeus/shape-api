<?php

namespace App\Controller;

use App\Service\Geometry\GeometryCalculator;
use App\Service\Geometry\IGeometryCalculator;
use App\Shape\ShapeFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    private ShapeFactory $shapeFactory;

    public function __construct()
    {
        $this->shapeFactory = new ShapeFactory();
    }
    #[Route("/", name: "index")]
    public function index(): JsonResponse
    {
        return $this->json([
            "apiVersion" => "v1",
            "description" => "A Simple Geometry Calculation API!"
        ], 200);
    }
    #[Route("/circle", name: "circle-index")]
    public function circleIndex(): JsonResponse
    {
        return $this->json([
            "error" => true,
            "message" => "Request param `radius` not provided "
        ], 200);
    }

    #[Route("/circle/{radius}", name: "circle", methods: "GET")]
    public function circle(Request $request, float $radius, GeometryCalculator $geometry): JsonResponse
    {
        $circle = $this->shapeFactory->create("circle");
        $circle->radius = $radius;
        $circle->surface();
        $circle->circumference();
        $circle->diameter();
        return $this->json($circle->getProps(), 200);
    }

    #[Route("/circle", name: "triangle-index")]
    public function triangleIndex(): JsonResponse
    {
        return $this->json([
            "error" => true,
            "message" => "Request param `a, b, or c` not provided "
        ], 200);
    }
    #[Route("/triangle/{a}/{b}/{c}", name: "triangle", methods: "GET")]
    public function triangle(float $a, float $b, float $c, GeometryCalculator $geometry): JsonResponse
    {
        $triangle = $this->shapeFactory->create("triangle");
        $triangle->setProp("a", $a)->setProp("b", $b)->setProp("c", $c);
        $triangle->surface();
        $triangle->circumference();
        $triangle->diameter();
        return $this->json($triangle->getProps(), 200);
    }
    /**
     * This is a test usage for the  `geometryCalculator` 
     * @see `GeometryCalculatorTest.php` for complete te
     *
     * @param float $a
     * @param float $b
     * @param float $c
     * @param float $radius
     * @param GeometryCalculator $geometry
     * @return void
     */
    private function geometryCalculator(float $a, float $b, float $c, float $radius)
    {
        $triangle = $this->shapeFactory->create("triangle");
        $triangle->setProp("a", $a)->setProp("b", $b)->setProp("c", $c);

        $circle = $this->shapeFactory->create("circle");
        $circle->radius = $radius;

        $geometry = new GeometryCalculator();

        $sumOfArea = $geometry->sumOfAreas($triangle, $circle);
        $sumOfCircum = $geometry->sumOfDiameters($triangle, $circle);
        echo ("sum of area : " . $sumOfArea . "\n");
        echo ("sum circumference : " . $sumOfCircum . "\n");
    }
}
