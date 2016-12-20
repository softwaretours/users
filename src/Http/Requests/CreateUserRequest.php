<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Repositories\Users\UserInterface;

class CreateUserRequest extends Request
{
    /**
     *  User repository interface
     */
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

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
        return $this->userInterface->getValidatorCreateDataSystem();
    }
}
