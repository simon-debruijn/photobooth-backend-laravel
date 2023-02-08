<?php

namespace App\Http\Controllers;

use App\Repositories\OrderInMemoryRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class OrderController extends Controller
{

    public function __construct(private readonly OrderRepositoryInterface $orderRepository)
    {
    }

    public function index(): JsonResponse
    {
        $q = $_GET["q"] ?? '';

        $orders = $this->orderRepository->find($q);

        return new JsonResponse([
            'data' => $orders,
            'totalItems' => count($orders)
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $order = $this->orderRepository->findUnique($id);

        if ($order === null) {
            abort(
                code: Response::HTTP_NOT_FOUND,
                message: "Order with id {$id} has not been found."
            );
        }

        return new JsonResponse([
            'data' => $order,
        ]);
    }

    public function create()
    {
        dd("To be implemented");
    }

    public function find()
    {
        dd("To be implemented");
    }

    public function findImages()
    {
        dd("To be implemented");
    }
}
