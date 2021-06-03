<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
         'name' => ['required', 'string', 'max:255'],
         'type' => ['required', 'string', 'max:255', Rule::in(['feature', 'bug'])],
         'status' => ['required', 'string', 'max:255', Rule::in(['new', 'in_progress', 'resolved', 'feedback', 'closed'])],
         'start_at' => ['date'],
         'end_at' => ['date', 'after:start_at'],
         'estimate' => ['required', 'date', 'after:start_at'],
      ];
   }
}
