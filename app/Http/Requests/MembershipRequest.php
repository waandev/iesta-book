<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
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
        return [
            'title' => 'required',
            'degree' => 'required',
            'institution' => 'required',
            'field' => 'required',
            'name' => 'required',
            'current_institution' => 'required',
            'position' => 'required',
            'email' => 'required|email',
            'membership_type' => 'required',
            'cv' => 'mimes:pdf,doc,docx|max:2048',
            'g-recaptcha-response' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please select your title.',
            'degree.required' => 'Please select your highest degree.',
            'institution.required' => 'Please select your current institution.',
            'field.required' => 'Please select your field of work/study.',
            'name.required' => 'Please enter your name.',
            'current_institution.required' => 'Please enter the name of your current institution.',
            'position.required' => 'Please enter your current job position.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'membership_type.required' => 'Please select your membership type.',
            'cv.mimes' => 'CV must be a PDF, DOC, or DOCX file.',
            'cv.max' => 'CV must not exceed 2MB in size.'
        ];
    }
}
