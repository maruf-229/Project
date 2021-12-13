<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>All Category</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header">All Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@php($sl=1)--}}
                                @foreach($categories as $cat)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $cat->user->name }}</td>
                                    <td>{{ $cat->category_name }}</td>
                                    <td>
                                        @if($cat->created_at==NULL)
                                            <span class="text-danger">No date Set</span>
                                        @else
                                        {{ $cat->created_at }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.category',$cat->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('softDelete.category',$cat->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" placeholder="Enter Category Name">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{--Trash Portion--}}

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trash List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                @php($sl=1)--}}
                                @foreach($trashCat as $cat)
                                    <tr>
                                        <th scope="row">{{ $trashCat->firstItem()+$loop->index }}</th>
                                        <td>{{ $cat->user->name }}</td>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>
                                            @if($cat->created_at==NULL)
                                                <span class="text-danger">No date Set</span>
                                            @else
                                                {{ $cat->created_at }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('restore.category',$cat->id) }}" class="btn btn-info">Restore</a>
                                            <a href="{{ route('p_delete.category',$cat->id) }}" class="btn btn-danger">Permanently Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>
            </div>

            {{--End Trash Portion--}}
        </div>
    </div>
</x-app-layout>

