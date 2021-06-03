<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
         'contract' => ['string', 'max:255'],
         'contract_type' => ['string', 'max:255'],
         'start_at' => ['date'],
         'end_at' => ['date', 'after:start_at'],
      ];
   }
}
