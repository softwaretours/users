<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\PermissionGroup;
use App\Models\Users\User;
use App\Repositories\Users\Roles\RolesInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class RolesController extends Controller
{
    /**
     * @var RolesInterface $repositoryObj
     */
    protected $rolesInterface;


    /**
     * PermissionController constructor.
     * @param RolesInterface $obj
     */
    public function __construct(RolesInterface $obj)
    {
        $this->rolesInterface = $obj;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->rolesInterface->index();

        $page_format = new \PageFormat([
            'title' => 'Roles and permissions',
            'h1' => 'Roles and permissions'
        ]);

        return view('auth.users.roles.index', [
            'permission_groups' => $data->permission_groups,
            'permissions' => $data->permissions,
            'titles' => $page_format->makeTitle()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Form validation is done in Modules\Core\Http\Requests\CreateUserRequest
        $data = $this->rolesInterface->store(['request' => $request]);

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
     * @param Request $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $this->rolesInterface->update(['request' => $request]);

        return response()->json(array(
            'success' => true,
            'msg' => 'Permissions updated'
        ));
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

    /**
     * @param int $user_id
     */
    public function loginAs($user_id)
    {
        $user = User::find($user_id);
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
