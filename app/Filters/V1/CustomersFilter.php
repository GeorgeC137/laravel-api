<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter {
    protected $allowedParams = [
        'postalCode' => ['gt', 'lt', 'eq', 'gte', 'lte'],
        'name' => ['eq'],
        'type' => ['eq'],
        'state' => ['eq'],
        'city' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
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
