<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;

final readonly class OrderInMemoryRepository implements OrderRepositoryInterface
{

    /**
     * @var Order[]
     */
    private array $orders;

    public function __construct()
    {
        $toOrder = fn(int $id) => new Order(
            "{$id}",
            "Order {$id}",
            "Lorem ipsum"
        );

        $this->orders = array_map($toOrder, [1, 2, 3, 4, 5, 6, 7, 8]);
    }

    /**
     *
     * @return Order[]
     */
    public function find(string $query = ''): array
    {
        if ($query === '' || $query === '*') {
            return $this->orders;
        }

        $filteredOrders = array_filter(
            $this->orders,
            fn($order) => str_contains($order->title, $query)
        );

        return array_values($filteredOrders);
    }


    public function findUnique(string $id): ?Order
    {
        $ids = array_map(fn($order) => $order->id, $this->orders);
        $foundKey = array_search($id, $ids, true);

        if ($foundKey === false) {
            return null;
        }

        return $this->orders[$foundKey];
    }
}
