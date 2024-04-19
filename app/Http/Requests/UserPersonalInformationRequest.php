<?php

namespace App\Http\Requests;

use App\Rules\EmailSena;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UserPersonalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->user();
        $date =  Carbon::now()->subyears(10)->format('d-m-Y');
        // dd($this->user()->personalInformation->id);

        return [
            'document_number' => ['required', Rule::unique('user_personal_information')->ignore($user->personalInformation?->id)],
            'email' => ['required', new EmailSena(), Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'min:5', 'max:15'],
            'last_name' => ['required', 'string', 'min:5', 'max:15'],
            'date_born' => ['required', 'date', "before:$date"],
            'password' => ['nullable', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->letters()->numbers()->symbols()->uncompromised()],
            'photo' => ['nullable', 'file', 'max:10240', File::types(['jpg', 'png', 'jpeg'])],
        ];
    }
}
