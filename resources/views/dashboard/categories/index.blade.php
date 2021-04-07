@extends('layouts.dashboard')

@section('content')

    <div>
        <h2>Category</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
          @if (auth()->guard('admin')->user()->hasPermission('create_categories'))
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.create') }}"> Add New Category </a></li>
    @endif
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">



                <div class="row">
                    <div class="col-md-12">
                        @if ($categories !== null)
                            <table class="table table-hover" id="datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Main Category</th>
                                    <th>status</th>
                                    <th> Link</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($categories as $index=>$category)

                                @if(!isset($category->parent_category->name))
                                    <?php $parent_category = "root"; ?>
                                @else
                                    <?php $parent_category = $category->parent_category->name; ?>
                                @endif

                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $parent_category }}</td>
                                        <td>
                                             @if($category->getActive() == 'active')
                                                <span class="btn-sm btn-success">{{ $category->getActive() }}</span>
                                            @else
                                                <span class="btn-sm btn-danger">{{ $category->getActive() }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->url }}</td>
                                        <td>{{ $category->description }}</td>

                                        <td>{{ $category->parent_id }}</td>
                                                                               <td>
                                            @if (auth()->guard('admin')->user()->hasPermission('update_categories'))
                                                <a href="{{ route('dashboard.categories.edit', $category->id) }}"  title="Edit"><i class="fa fa-edit"></i></a>

                                            @endif
                                            @if (auth()->guard('admin')->user()->hasPermission('delete_categories'))
                                                <form method="post" action="{{ route('dashboard.categories.destroy', $category->id) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="background: none;border:0px;color:#c13232;outline:0" class="delete" title="Delete"><i class="fa fa-trash"></i></button>
                                                </form><!-- end of form -->

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                        <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

