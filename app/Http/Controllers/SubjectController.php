<?php

namespace App\Http\Controllers;


class SubjectController extends Controller
{
    public function getUserSubjects()
    {
        $user = auth()->user(); // Get the authenticated user

        $subjects = $user->subjects;

        return response()->json($subjects);
    }
}
