<?php

namespace App\Enums;

enum OrderStatus: string
{
    case NEW = 'Новый';
    case COMPLETED  = 'Выполнен';
}
