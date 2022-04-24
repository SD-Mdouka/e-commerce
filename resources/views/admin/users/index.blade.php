
                                                        @extends('layouts.appadmin')

                                                            @section('content')
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-4">
                                                                        @include('layouts.sidebar')
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <table class="table table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Client</th>
                                                                                    <th>Email</th>
                                                                                    <th>City</th>
                                                                                    <th>Date Create</th>
                                                                                    <th>Activation</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($users as $user)
                                                                                    <tr>
                                                                                        <td>{{ $user->id }}</td>
                                                                                        <td>{{ $user->name }}</td>
                                                                                        <td>{{ $user->email }}</td>
                                                                                        <td>
                                                                                            @if($user->city)
                                                                                            {{ $user->city }}
                                                                                        @else
                                                                                            <span class="text-danger"> Not available</span>
                                                                                        @endif
                                                                                        </td>
                                                                                        <td>{{ $user->created_at }}</td>
                                                                                        <td>
                                                                                            @if($user->active)
                                                                                                <i class="fa fa-check text-success"></i>
                                                                                            @else
                                                                                                <i class="fa fa-times text-danger"></i>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                                                                            <form method="POST" action="{{ route("users.update",$user->id) }}">
                                                                                                @csrf
                                                                                                @method("PUT")
                                                                                                <button class="btn btn-sm btn-success">
                                                                                                    <i class="fa fa-check"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                            <form id="{{ $user->id }}" method="POST" action="{{ route("users.destroy",$user->id) }}">
                                                                                                @csrf
                                                                                                @method("DELETE")
                                                                                                <button
                                                                                                onclick="event.preventDefault();
                                                                                                   if(confirm('Do you really want to delete the client {{ $user->id  }} ?'))
                                                                                                    document.getElementById({{ $user->id }}).submit();
                                                                                                "
                                                                                                class="btn btn-sm btn-danger">
                                                                                                    <i class="fa fa-trash"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <hr>
                                                                        <div class="justify-content-center d-flex">
                                                                            {{ $users->links() }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endsection

