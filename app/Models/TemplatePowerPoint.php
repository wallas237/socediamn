<?php

namespace App\Models;

use Illuminate\Mail\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplatePowerPoint extends Model implements Attachable
{
    use HasFactory;

    public function toMailAttachment(): Attachment
    {
        return Attachment::fromPath('/template_presentation orale_GMD.pptx');
    }
}
