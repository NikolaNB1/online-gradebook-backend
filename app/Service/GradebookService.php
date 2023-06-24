<?php

namespace App\Service;

use App\Models\Gradebook;
use Illuminate\Http\Request;


class GradebookService
{

    public function showGradebooks(Request $request)
    {
        $gradebooks = Gradebook::get();

        return $gradebooks;
    }

    public function postGradebook(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255|string',
        ]);

        $gradebook = new Gradebook();

        $gradebook->name = $request->name;
        $gradebook->save();

        return $gradebook;
    }

    public function showGradebook($id)
    {
        $gradebook = Gradebook::find($id);
        return $gradebook;
    }

    public function editGradebook(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $gradebook = Gradebook::find($id);

        $gradebook->name = $request->name;
        $gradebook->save();

        return $gradebook;
    }

    public function deleteGradebook($id)
    {
        Gradebook::destroy($id);
    }
}
