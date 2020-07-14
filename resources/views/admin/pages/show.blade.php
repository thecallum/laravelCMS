@extends('admin.layout.admin')

@section('content')
    <h2>Page</h2>
    
    <script>
        const page = @JSON($page);
    </script>

    <div id="app">

      <form @submit="submit">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="" placeholder="Enter name" v-model="name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="" placeholder="Enter title" v-model="title">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" id="" placeholder="Enter slug" v-model="slug">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Contents</label>
            <textarea-autosize
                placeholder="Enter content"
                ref="myTextarea"
                v-model="content"
                :min-height="30"
                :max-height="350"
                class="form-control"
                {{-- @blur.native="onBlurTextarea" --}}
            ></textarea-autosize>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

        
    </div>
    
@endsection

@section('javascript')
    <script src="/js/admin-page-show.js"></script>
@endsection