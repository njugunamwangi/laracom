<?php

    namespace App\Enums;

    enum PaymentStatus: string {
        case NotPaid = 'Not Paid';
        case Paid = 'Paid';
        case Failed = 'Failed';
    }