<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use App\Http\Resources\Complaint as ComplaintResource;

class ComplaintsController extends Controller
{
    public function index()
    {
        return view('complaints.index');
    }

    public function show()
    {
        return view('complaints.show');
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        return view('complaints.edit');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function pagination()
    {
        return pagination()
            ->repository(ComplaintRepository::class)
            ->resource(ComplaintResource::class);
    }

    public function getComplaintForMap()
    {
        return Complaint::all();
    }
}
