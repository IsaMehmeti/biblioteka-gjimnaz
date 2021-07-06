@extends('layouts.admin')
  @section('pageTitle', 'Paneli Kryesor')

@section('content')
  <div class="row">
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1"></div>
          <div class="data-info">
            <div class="desc">Gjithësej Libra</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number">{{$books_count}}</span>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="widget widget-tile">
        <div class="chart sparkline" id="spark2"></div>
        <div class="data-info">
          <div class="desc">Gjithësej libra duke u lexuar</div>
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number">{{$borrows_count}}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="widget widget-tile">
        <div class="chart sparkline" id="spark3"></div>
        <div class="data-info">
          <div class="desc">Gjithësej Autor</div>
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number">{{$authors_count}}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-12 col-12">
       <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Librin</div>
      <div class="card-body">
      
        
        <form action="{{route('books.store')}}" method="POST">
          @csrf
          <div class="form-group pt-2">
            <label for="inputEmail">Emri</label>
            <input class="form-control" name="emri" id="emri" type="text" placeholder="" >
          </div>
          <div class="form-group pt-2">
            <label for="kategoria">Kategoria</label>
              <select id="category_id"  name="category_id" class="form-control">
                <option selected disabled hidden>Zgjedh Kategorine...</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="sasia">Sasia</label>
            <input class="form-control" name="sasia" id="sasia" type="text" placeholder="" v>
          </div>
          <div class="form-group pt-2">
            <label for="date">Autori: </label>
            <select id="multiple-checkboxes" multiple="multiple" name="author_id[]">
              @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                @endforeach
          </select>
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
                <button class="btn btn-space btn-secondary text-uppercase">Anulo</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-12 col-12">
     <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Huazo</div>
      <div class="card-body">
        <form action="{{route('borrows.store')}}" method="POST">
          @csrf 
        
          <div class="form-group pt-2">
            <label for="libri">Nxenesi</label>
             <select id="student_id"  name="student_id" class="form-control" placeholder="zgjedh">
                <option selected disabled hidden>Zgjedh  Nxenesin...</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}"> {{ $student->name }} {{ $student->surname }}</option>
                @endforeach
              </select>
          </div>
                <a href="{{ route('students.create')}}" class="btn btn-space btn-primary text-uppercase" type="submit">Shto nje Nxenes</a>

          <div class="form-group pt-2">
            <label for="libri">Libri</label>
             <select id="book_id"  name="book_id" class="form-control" placeholder="zgjedh" value="{{ old('book_id') }}">
                <option selected disabled hidden>Zgjedh Librin...</option>
                <option style="font-weight: bold" disabled> Emri - Autori - Kategoria</option>
                  @foreach($books as $book)
                <option value="{{ $book->id }}"> {{ $book->emri }} - {{ $book->category->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="date">Data e kthimit</label>
            <input class="form-control" name="date" id="date" type="date" placeholder="" value="{{ old('date') }}">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
                <button class="btn btn-space btn-secondary text-uppercase">Anulo</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-12 col-12">
     <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Autor</div>
      <div class="card-body">
        <form action="{{route('authors.store')}}" method="POST">
          @csrf
          <div class="form-group pt-2">
            <label for="emri">Emri</label>
            <input class="form-control" name='name' id="emri" type="text" placeholder="">
          </div>
          <div class="form-group pt-2">
            <label for="mbiemri">Mbiemri</label>
            <input class="form-control"name='surname' id="mbiemri" type="text" placeholder="">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
                <button class="btn btn-space btn-secondary text-uppercase">Anulo</button>
            </div>
          </div>
        </form>
      </div>
    </div>

     <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Kategori</div>
      <div class="card-body">



        <form action="{{route('categories.store')}}" method="POST">
          <div class="form-group pt-2">
            <label for="inputEmail">Emri</label>
            <input class="form-control" name="name" id="name" type="text" placeholder="">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
                <button class="btn btn-space btn-secondary text-uppercase">Anulo</button>
            </div>
          </div>
          @csrf
        </form>



      </div>
    </div>

     
    </div>
      <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">5 Huazimet e fundit </div>
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
            @foreach($borrows as $borrow)
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
              <td><a href="{{route('borrows.edit', $borrow->id)}}" class="btn mr-2 btn-info">Edito</a> 
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
    <script src="/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="/js/app-form-elements.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
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
  	App.dashboard();
  
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#multiple-checkboxes').multiselect({
        includeSelectAllOption: true,
      });
  });
</script>
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