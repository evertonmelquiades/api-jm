<?php

namespace App\Http\Controllers;

use App\Http\Requests\Business\BusinessStoreRequest;
use App\Http\Requests\Business\BusinessUpdateRequest;
use App\Models\Business;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(Business::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessStoreRequest $request): JsonResponse
    {
        $business = Business::create($request->validated());
        return new JsonResponse($business, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business): JsonResponse
    {
        return new JsonResponse($business, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessUpdateRequest $request, Business $business): JsonResponse
    {
        $business->fill($request->validated());
        $business->save();
        return new JsonResponse($business, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business): JsonResponse
    {
        return $business->delete() ? new JsonResponse(null, 204) : new JsonResponse(null, 500);
    }
}
