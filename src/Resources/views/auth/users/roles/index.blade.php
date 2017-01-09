@extends('layouts.html')

@section('scripts_js')
    <script src="{{URL::asset('assets/js/ajax.js')}}"></script>
    <script src="{{URL::asset('assets/js/products/form-update.js')}}"></script>
    <script>
        var $url = "{{route('users.roles.update')}}";
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="page-header">
                @permission('users.index')
                <a class="btn btn-default pull-right" href="{{ route('users.index') }}">All users </a>
                @endpermission
                <h1><?=isset($titles->h1) ? $titles->h1 : 'Page title'?></h1>
            </div>


            {!! Form::open(['route'=>['users.roles.update'],'class'=>'form-horizontal','method'=>'put', 'id' => 'roles_update'])!!}


            <div class="row">

                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-md-3">Permission group</th>
                        <th class="col-md-2">Permission type</th>
                        <th class="col-md-4">Permissions</th>
                        <th class="col-md-5">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="control-label" for="name">Users</label>
                            <div class="secondary-text">Allows you to manage appliaction and database acces in user management section</div>
                        </td>
                        <td>
                            <label class="control-label" for="name">Application access</label>
                        </td>
                        <td>
                            <ul>

                                <li><a href="#">Create new users</a></li>
                                <li><a href="#">Read all users</a></li>
                                <li><a href="#">View only users he created</a></li>
                                <li><a href="#">View account level users</a></li>
                                <li><a href="#">Update users</a></li>
                                <li><a href="#">Delete users</a></li>

                            </ul>
                        </td>
                        <td>
                            <a href="#">Edit</a> &nbsp;&nbsp; <a href="#">Associate</a> &nbsp;&nbsp; <a href="#">Copy</a>

                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: 0">

                        </td>
                        <td>
                            <label class="control-label" for="name">Data access</label>
                        </td>
                        <td>
                            <ul>

                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10123">PD: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10124">ADM: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10125">EXT: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10127">API: Scrum Issue Type Scheme</a>
                                </li>

                            </ul>
                        </td>
                        <td>
                            <a href="#">Edit</a> &nbsp;&nbsp; <a href="#">Associate</a> &nbsp;&nbsp; <a href="#">Copy</a> &nbsp;&nbsp; <a href="#">Delete</a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label" for="name">Products</label>
                            <div class="secondary-text">Allows you to manage appliaction and database acces in products management section</div>
                        </td>
                        <td>
                            <label class="control-label" for="name">Application access</label>
                        </td>
                        <td>
                            <ul>

                                <li><a href="#">Create new products</a></li>
                                <li><a href="#">Read all products</a></li>
                                <li><a href="#">View only products he created</a></li>
                                <li><a href="#">Update products</a></li>
                                <li><a href="#">Delete products</a></li>

                            </ul>
                        </td>
                        <td>
                            <a href="#">Edit</a> &nbsp;&nbsp; <a href="#">Associate</a> &nbsp;&nbsp; <a href="#">Copy</a>

                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: 0">

                        </td>
                        <td>
                            <label class="control-label" for="name">Data access</label>
                        </td>
                        <td>
                            <ul>

                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10123">PD: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10124">ADM: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10125">EXT: Scrum Issue Type Scheme</a>
                                </li>
                                <li>
                                    <a href="ManageIssueTypeSchemes!default.jspa?atl_token=BCOW-8F3M-CBCD-DMYQ%7C8eb7a902d2bb54515fab05d60942ca0262d42f97%7Clin&amp;actionedSchemeId=10127">API: Scrum Issue Type Scheme</a>
                                </li>

                            </ul>
                        </td>
                        <td>
                            <a href="#">Edit</a> &nbsp;&nbsp; <a href="#">Associate</a> &nbsp;&nbsp; <a href="#">Copy</a> &nbsp;&nbsp; <a href="#">Delete</a>

                        </td>
                    </tr>
                    </tbody>
                </table>


            </div>

            <hr>

            <div class="row text-right">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@endsection