<?php

namespace App\Http\Controllers;

use App\Actions\Complaints\CreateComplaint;
use App\Actions\Complaints\DataTransferObject\ComplaintDto;
use App\Http\Requests\ComplaintCommentRequest;
use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Repositories\ComplaintCommentRepository;
use App\Repositories\ComplaintRepository;
use App\Http\Resources\Complaint as ComplaintResource;
use App\Repositories\Criteria\Common\Where;

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
        $dataDto = $this->getComplaintDto($data);

        $complaint = CreateComplaint::new()->execute($dataDto);

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

    public function indexMap()
    {
        $complaints = ComplaintRepository::new()->all();

        return view('complaints.map.index', compact('complaints'));
    }

    public function createComments(ComplaintCommentRequest $request, int $complaintId)
    {
        $data = $request->validated();

        $data['complaint_id'] = $complaintId;
        $comment = ComplaintCommentRepository::new()->create($data);

        $message = _m('common.success.create');
        $route = route('complaints.show', $complaintId);
        return $this->chooseReturn('success', $message, $route);
    }

    public function destroyComments(ComplaintCommentRequest $request)
    {
        $data = $request->validated();

        ComplaintCommentRepository::new()->find($data['comment']['id'])->delete();

        $message = _m('common.success.destroy');
        return $this->chooseReturn('success', $message);
    }

    public function listComments(int $complaintId)
    {
        return ComplaintCommentRepository::new()->pushCriteria([
           new Where('complaint_id', $complaintId),
        ])->all();
    }

    public function setIsSolved(int $complaintId, string $isSolved)
    {
        $complaint = ComplaintRepository::new()->find($complaintId);

        $complaint->is_solved = $isSolved === 'true';
        $complaint->save();

        $message = _m('common.success.update');
        $route = route('complaints.show', $complaintId);
        return $this->chooseReturn('success', $message, $route);
    }

    private function getComplaintDto($dataRequest)
    {
        $complaintDto = new ComplaintDto([
            'name' => $dataRequest['name'],
            'description' => $dataRequest['description'],
            'address' => $dataRequest['address'],
            'attachments' => $dataRequest['attachments'],
            'requester_id' => current_user()->id,
        ]);

        return $complaintDto;
    }
}
