@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Arkiva </div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Nr</th>
              <th>Nxenesi</th>
              <th>Klasa</th>
              <th>Libri</th>
              <th>Data kthimit</th> 
              <th>Statusi</th>
              <th>Veprime</th>
            </tr>
          </thead>
          <tbody>
            @foreach($borrowss as $borrow)
            <tr class="odd gradeX">
              <td>{{$borrow->id}}</td>
              <td>{{$borrow->student->name}} {{$borrow->student->surname}}</td>
              <td>{{$borrow->student->class}} - {{$borrow->student->parallel}}</td>
              <td>{{$borrow->book->emri}}</td>
              <td>{{$borrow->date}}</td>
              <td>
                
                @if($borrow->status == 0)
                  <button id="changeStatusButton_{{$borrow->id}}" type="submit" onclick="changeStatus({{$borrow->id}},1)" class="btn mr-2 btn-danger d-inline">Joaktiv</button> 
                @else 
                  <button id="changeStatusButton_{{$borrow->id}}" type="submit" onclick="changeStatus({{$borrow->id}},0)" class="btn mr-2 btn-success d-inline">Aktiv</button> 
                @endif               
              </td>
              <td><a href="{{route('borrows.edit', $borrow->id)}}" class="btn mr-2 btn-info d-inline">Edito</a> 
                <form action="{{route('borrows.destroy', $borrow->id)}}" method="POST" class="w-100 d-inline">
                  @csrf
                  @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije</button>
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
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
  function changeStatus(id, type) {
        $.ajax({
              url: '/borrows/active/'+id+'/'+type,
              type: 'POST',
              data:{
                  "_token": "{{ csrf_token() }}",
              },
              success: function(data){
                    var myJSON = new Array(JSON.stringify(data));
                    var obj = JSON.parse(myJSON);
                    if(type == 1){
                      $('#changeStatusButton_'+id).attr('class', 'btn mr-2 btn-success d-inline');  
                      $('#changeStatusButton_'+id).attr('onclick', 'changeStatus('+id+','+0+')'); 
                      $('#changeStatusButton_'+id).text('Aktiv');  


                    }
                    else{
                      $('#changeStatusButton_'+id).attr('class', 'btn mr-2 btn-danger d-inline');  
                      $('#changeStatusButton_'+id).attr('onclick', 'changeStatus('+id+','+1+')');  
                      $('#changeStatusButton_'+id).text('Joaktiv');  

                    }
              },
              error:function(error){
                  console.log(error);
              }
          });
      }
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.dataTables();
  });
</script>
@endsection