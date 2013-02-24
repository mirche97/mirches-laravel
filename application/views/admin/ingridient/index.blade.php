@layout('base.layout')
@section('content')
    <div class="alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
    </div>
    @include('admin.title')
     <br/>
    <table class="table-striped table-bordered">
        <thead>
            <tr>
              <th>#</th>
              <th>Ingridient</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

          </tbody>
    </table>
    <br/>
    <a href="#add-ingridient-modal" role="button" class="btn-primary btn-large" data-toggle="modal">Add</a>





@include('admin.ingridient.add-modal')
@include('admin.ingridient.delete-modal')

@endsection
