<?php

namespace App\Actions\Complaints\DataTransferObject;

use Spatie\DataTransferObject\DataTransferObject;

class ComplaintDto extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var array */
    public $address;

    /** @var array */
    public $attachments;

    /** @var int */
    public $requester_id;
}
