@extends('admin.layout.admin')

@section('content')
    <h2>Pages</h2>
    
    <script>
        const pages = @json($pages ?? '');
    </script>

    <div id="app">
        <vue-bootstrap-table
        :columns="columns"
        :values="values"
        :show-filter="true"
        :show-column-picker="true"
        :sortable="true"
        :paginated="true"
        :multi-column-sortable=true
        :filter-case-sensitive=false
        :row-click-handler="handleRowFunction"  
        >
        </vue-bootstrap-table>
    </div>
@endsection

@section('javascript')
    <script src="/js/admin-search.js"></script>
@endsection