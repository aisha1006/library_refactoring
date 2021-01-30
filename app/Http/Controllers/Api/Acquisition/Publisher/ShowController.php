<?php

namespace App\Http\Controllers\Api\Acquisition\Publisher;

use App\Helpers\ControllerHelpers\GetData;
use App\Http\Controllers\Controller;
use App\Models\Acquisition\Publisher\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $response = GetData::index($request, Publisher::defaultQuery(), Publisher::LAST_QUERY_NAME, Publisher::SORT_FIELDS);

        return response()->json($response);
    }

    public function show(int $id): JsonResponse
    {
        $response = GetData::show(Publisher::defaultQuery(), $id);
        return response()->json($response);
    }

    public function last(Request $request): JsonResponse
    {
        $response = GetData::last($request, Publisher::LAST_QUERY_NAME, Publisher::SORT_FIELDS);
        return response()->json($response);
    }

    public function lastCreated(Request $request): JsonResponse
    {
        $response = GetData::created($request, Publisher::class,
            Publisher::CREATED_ID_NAME, Publisher::LAST_QUERY_NAME, Publisher::SORT_FIELDS);
        return response()->json($response);
    }

    public function sortByFields(): JsonResponse
    {
        return response()->json(GetData::sortFields(Publisher::SORT_FIELDS));
    }
}