<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case NotPaid = 'Not Paid';
    case Paid = 'Paid';
    case Failed = 'Failed';

    public function getColor(): string
    {
        return match ($this) {
            self::NotPaid => 'primary',
            self::Paid => 'success',
            self::Failed => 'warning',
        };
    }
}
