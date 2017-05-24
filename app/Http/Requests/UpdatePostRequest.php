<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Como se tiene el mismo codigo tanto para Create como para Update
// se puede hace extender desde CreatePostRequest
class UpdatePostRequest extends CreatePostRequest
{
   
}
