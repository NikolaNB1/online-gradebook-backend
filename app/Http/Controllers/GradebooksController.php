<?php

namespace App\Http\Controllers;

use App\Service\GradebookService;
use Illuminate\Http\Request;

class GradebooksController extends Controller
{
    public GradebookService $gradebookService;

    public function __construct(GradebookService $gradebookService)
    {
        $this->gradebookService = $gradebookService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gradebooks = $this->gradebookService->showGradebooks($request);

        return $gradebooks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gradebook = $this->gradebookService->postGradebook($request);

        return $gradebook;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gradebook = $this->gradebookService->showGradebook($id);

        return $gradebook;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gradebook = $this->gradebookService->editGradebook($request, $id);
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);

        return $gradebook;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = $this->gradebookService->deleteGradebook($id);

        return $gradebook;
    }
}
