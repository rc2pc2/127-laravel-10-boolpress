<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "title" => [ "required", "string", "unique:posts", "min:4", "max:255"],
            "image" =>[ "required", "image", "max:3000"],
            "content" => [ "required", "string", "min:20"],
            "category_id" => [ "required", "integer", "exists:categories,id"],
            "tags" => [ "required", "array", "exists:tags,id"],
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "title.required" => "The title is necessary to create a new post!",
            "image.url" => "The image field must be an active url!",
        ];
    }
}
