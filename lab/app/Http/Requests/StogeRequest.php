<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StogeRequest extends FormRequest
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
            'title' =>['required', 'unique:movies,title' ,'min:6'],
            'poster' =>['nullable', 'image', 'max:2048'],
            'intro' =>['required'],
            'release_date' =>['required','date', 'after_or_equal:today'],
        ];
    }

    public function messages(){
        return [
            'title.required' =>'Title không được để trống ',
            'title.min' =>'Title PHải ít nhất 6 ký tự  ',
            'intro.required' =>'Intro không được để trống ',
            'release_date.required' =>' release_date không được để trống ',
            
        ];
    }


}
