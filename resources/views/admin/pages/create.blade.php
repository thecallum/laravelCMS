@extends('admin.layout.admin')

@section('content')
    <h2>Create a new page</h2>

    <script>
        const allPages = @JSON($allPages);
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
            <label for="exampleInputEmail1">Full URL</label>
            <input type="text" class="form-control" v-model="fullURL" readonly>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Parent Page</label>
            <select class="form-control" id="exampleFormControlSelect1" v-model="parentPageId">

                <option 
                    v-for="(page, index) in allPages"
                    :value="page.id"
                >
                    @{{ page.name }}
                </option>
            </select>
          </div>
          <error :errors="errors" name="parent_page_id"></error>


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
        <error :errors="errors" name="content"></error>

        <button type="submit" class="btn btn-primary">Create</button>
      </form>

        
    </div>
@endsection

@section('javascript')
    <script src="/js/admin/pages/create.js"></script>
@endsection