<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'Pending';
    case Processing = 'Processing';
    case Delivered = 'Delivered';
    case Cancelled = 'Cancelled';

    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'gray',
            self::Processing => 'primary',
            self::Delivered => 'success',
            self::Cancelled => 'danger',
        };
    }
}
