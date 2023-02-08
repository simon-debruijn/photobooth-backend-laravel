<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

readonly class Order
{
    function __construct(
        public string $id,
        public string $title,
        public string $description
    )
    {
    }
}
