<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'file' => 'required|image',
            'title' => 'nullable'
        ];
    }

    public function getData() {
        $data = $this->validated() + [
            'user_id' => 1
        ];

        if ($this->hasFile('file')) {
            $directory = Image::makeDirectory();
            $data['file'] = $this->file->store($directory);
            $data['dimension'] = Image::getImageDimension($data['file']);
        }

        return $data;
    }

    
}
