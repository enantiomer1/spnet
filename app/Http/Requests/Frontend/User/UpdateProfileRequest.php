<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Validation\Rule;
use App\Helpers\Frontend\Auth\Socialite;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
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
            'username'  => 'required|max:60',
            'email' => 'sometimes|required|email|max:60',
            'program' => 'required|max:7',
            'sobriety_date' => 'required|size:10',
            'zipcode' => 'required|size:5',
            'bio' => 'required|max:255',
            'avatar_type' => ['required', 'max:191', Rule::in(array_merge(['gravatar', 'storage'], (new Socialite)->getAcceptedProviders()))],
            'avatar_location' => 'sometimes|image|max:2048',
        ];
    }
}
