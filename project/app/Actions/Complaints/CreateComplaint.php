<?php

namespace App\Actions\Complaints;

use App\Actions\Complaints\DataTransferObject\ComplaintDto;
use App\Models\Address;
use App\Models\Complaint;
use App\Repositories\AddressRepository;
use App\Repositories\ComplaintRepository;
use App\Traits\Newable;

class CreateComplaint
{
    use Newable;

    /**
     * @param ComplaintDto $complaintDto
     * @return Complaint
     */
    public function execute(ComplaintDto $complaintDto): Complaint
    {
        $complaint = ComplaintRepository::new()->create([
            'name' => $complaintDto->name,
            'description' => $complaintDto->description,
        ]);

        $this->createAddressForComplaint($complaintDto, $complaint->id);

        $complaint = $this->createAttachmentsForComplaint($complaintDto, $complaint);

        return $complaint;
    }

    /**
     * @param ComplaintDto $complaintDto
     * @param int $complaintId
     * @return Address
     */
    private function createAddressForComplaint(ComplaintDto $complaintDto, int $complaintId): Address
    {
        $dataAddress = $complaintDto->address;

        $dataAddress['complaint_id'] = $complaintId;
        $address = AddressRepository::new()->create($dataAddress);

        return $address;
    }

    /**
     * @param ComplaintDto $complaintDto
     * @param Complaint $complaint
     * @return Complaint
     */
    private function createAttachmentsForComplaint(ComplaintDto $complaintDto, Complaint $complaint): Complaint
    {
        foreach ($complaintDto->attachments as $attachment) {
            $complaint->addMedia($attachment)->toMediaCollection('media');
        }

        return $complaint;
    }
}
