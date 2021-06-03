<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskUpdateRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
      return [
         'name' => ['string', 'max:255', 'nullable'],
         'type' => ['string', 'max:255', Rule::in(['feature', 'bug']), 'nullable'],
         'status' => ['string', 'max:255', Rule::in(['new', 'in_progress', 'resolved', 'feedback', 'closed']), 'nullable'],
         'start_at' => ['date', 'nullable'],
         'end_at' => ['date', 'after:start_at', 'nullable'],
         'estimate' => ['date', 'after:start_at', 'nullable'],
      ];
   }
}
