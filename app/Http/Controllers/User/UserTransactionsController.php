<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Transaction
 * @authenticated
 * API endpoints for managing users
 */
class UserTransactionsController extends Controller
{

    /**
     * All User Transactions
     * @apiResourceCollection App\Http\Resources\Transaction\TransactionCollection
     * @apiResourceModel App\Models\Transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    }
}
