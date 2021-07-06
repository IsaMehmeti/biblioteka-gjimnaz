  @extends('layouts.admin')
  @section('pageTitle', 'Autoret')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Autort</div>
      <div class="card-body">
         <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Nr</th>
              <th>Emri</th>
              <th>Mbiemri</th>
              <th>Veprime</th>
            </tr>
          </thead>
          <tbody>

            @foreach($authors as $author)

            <tr class="odd gradeX">
              <td>{{$author->id}}</td>
              <td>{{$author->name}}</td>
              <td>{{$author->surname}}</td>

              <td>
                <a href="{{route('authors.edit', $author->id)}}" class="btn mr-2 btn-info">Edito</a>
                <form action="{{route('authors.destroy', $author->id)}}" class="w-100 d-inline" method="POST">
                @csrf
                @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije</button>
              </form>
            </td>
            
            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
  <script src="/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
  <script src="/js/app-tables-datatables.js" type="text/javascript"></script>
@endsection
@section('custom_scripts')
<script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.dataTables();
  });
</script>
@endsection