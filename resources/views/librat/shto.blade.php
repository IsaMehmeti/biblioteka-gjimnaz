@extends('layouts.admin')
@section('pageTitle', 'Shto Libra')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
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
</div>
@endsection

@section('custom_footer')
    <script src="/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="/js/app-form-elements.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@endsection
@section('custom_scripts')
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#multiple-checkboxes').multiselect({
        includeSelectAllOption: true,
      });
  });
</script>
@endsection