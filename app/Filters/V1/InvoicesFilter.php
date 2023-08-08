<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter {
    protected $allowedParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt',  'gt', 'gte', 'lte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['gt', 'lt', 'eq', 'gte', 'lte'],
        'paidDate' => ['eq', 'lt',  'gt', 'gte', 'lte']
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '≤',
        'gte' => '≥',
        'ne' => '!='
    ];
}
