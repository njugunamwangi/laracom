<?php

    namespace App\Enums;

    enum OrderStatus: string {
        case Pending = 'Pending';
        case Processing = 'Processing';
        case Delivered = 'Delivered';
        case Cancelled = 'Cancelled';
    }