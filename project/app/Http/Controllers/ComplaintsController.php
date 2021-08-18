<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Repositories\AddressRepository;
use App\Repositories\ComplaintRepository;
use App\Http\Resources\Complaint as ComplaintResource;

class ComplaintsController extends Controller
{
    public function index()
    {
        return view('complaints.index');
    }

    public function show(int $complaintId)
    {
        $complaint = ComplaintRepository::new()->findOrFail($complaintId);

        return view('complaints.show', compact('complaint'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(ComplaintRequest $request)
    {
        $data = $request->validated();
        $dataComplaint = $request->only(['name', 'description']);
        $dataAddress = $data['address'];

        $complaint = ComplaintRepository::new()->create($dataComplaint);

        $dataAddress['complaint_id'] = $complaint->id;
        AddressRepository::new()->create($dataAddress);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'complaints.index');
    }

    public function destroy(Complaint $complaint)
    {
        try {
            ComplaintRepository::new()->delete($complaint);

            $message = _m('common.success.destroy');
            return $this->chooseReturn('success', $message, 'complaints.index')->forceRedirect();
        } catch (\Exception $exception) {
            report($exception);
            return $this->chooseReturn('error', _m('common.error.destroy'));
        }
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
