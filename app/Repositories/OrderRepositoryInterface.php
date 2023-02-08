<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;

interface OrderRepositoryInterface
{
  /**
   * Summary of find
   * @return Order[]
   */
  public function find(string $query = ""): array;

  public function findUnique(string $id): ?Order;

}