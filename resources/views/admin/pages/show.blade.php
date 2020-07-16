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
        <error :errors="errors" name="name"></error>

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="" placeholder="Enter title" v-model="title">
        </div>
        <error :errors="errors" name="title"></error>

        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" id="" placeholder="Enter slug" v-model="slug">
        </div>
        <error :errors="errors" name="slug"></error>

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
        <error :errors="errors" name="contents"></error>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" :disabled="!contentChanged" @click="undoChanges">Undo Changes</button>
      </form>

        
    </div>
    
@endsection

@section('javascript')
    <script src="/js/admin/pages/show.js"></script>
@endsection
