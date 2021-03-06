@extends('layouts.dashboard')

@section('content')

    <div>
        <h2>Roles</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow mb-4">

                <form method="post" action="{{ route('dashboard.roles.update', $role->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.includes._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4>Permissions</h4>
                        @php
                            $models = ['admins','categories','users','orders','cmsPages','coupons','brands','products'];
                        @endphp

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 15%;"> Modules</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($models as $index=>$model)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $model }}</td>
                                    <td>
                                        @if ($model == 'orders')
                                        @php
                                            $permission_maps = ['read'];
                                        @endphp

                                        @else

                                        @php
                                            $permission_maps = ['create', 'read', 'update', 'delete'];
                                        @endphp
                                    @endif




                                        <select name="permissions[]" class="form-control select2" multiple>
                                            @foreach ($permission_maps as $permission_map)
                                                <option
                                                {{ $role->hasPermission($permission_map . '_' . $model) ? 'selected' : '' }}
                                                value="{{ $permission_map . '_' . $model }}">{{ $permission_map}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
