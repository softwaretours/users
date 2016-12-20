<?php

namespace App\Http\Controllers\Users;

use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Users\UserInterface;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\Users\User;
class UserController extends Controller
{


    /**
     *  User Repository Interface
     */
    protected $userInterface;


    /**
     * UserController constructor.
     * @param UserInterface2 $obj
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::get();

        return view('auth.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $edit_user = new \stdClass();
        $edit_user->api_key = str_random(16);

        $titles = new \stdClass();
        $titles->title = 'Create user';
        $titles->h1 = 'Create user';

        return view('auth.users.create', compact('edit_user'));
    }


    /**
     *  Initialize datatable with users
     */
    public function datatable()
    {
        $this->userInterface->datatable();
    }


    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        // Form validation is done in Modules\Core\Http\Requests\CreateUserRequest
        $this->userInterface->createUser(array(
            'email' => $request['email'],
            'password_text' => $request['password'],
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'account_source' => $request['account_source'],
            'status' => $request['status'],
            'account_id' => $request['account_id'],
            'parent_id' => $request['parent_id'],
            'api_key' => $request['api_key']
        ));

        return redirect()->route('users.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit_user = $this->userInterface->findUser($id);

        $titles = new \stdClass();
        $titles->title = $edit_user->name . ' ' . $edit_user->last_name . ' - Edit user';
        $titles->h1 = $edit_user->name . ' ' . $edit_user->last_name . ' <small>Edit user</small>';

        return view('auth.users.edit', compact('edit_user', 'titles'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // Form validation is done in Modules\Core\Http\Requests\UpdateUserRequest
        $this->userInterface->updateUser(array(
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'account_source' => $request['account_source'],
            'status' => $request['status'],
            'account_id' => $request['account_id'],
            'parent_id' => $request['parent_id'],
            'api_key' => $request['api_key']
        ), array('id' => $id));

        return redirect()->route('users.index');
    }


    /**
     * @param Request $request
     * @param mixed $id
     */
    public function destroy(Request $request, $id = null)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
        }

        if (!isset($id))
            dd('User id is not set.');

        $this->userInterface->deleteUser(array('id' => $id));

    }
    
    public function loginAs(Request $request){
    	
    }
}
