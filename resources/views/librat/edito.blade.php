@extends('layouts.admin')
@section('pageTitle', 'Nrysho Libra')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Edito Librin</div>
      <div class="card-body">
        <form action="{{route('books.update', $book->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group pt-2">
            <label for="inputEmail">Emri</label>
            <input class="form-control" name="emri" id="emri" type="text" placeholder="" value="{{$book->emri}}">
          </div>
          <div class="form-group pt-2">
            <label for="kategoria">Kategoria</label>
              <select id="category_id"  name="category_id" class="form-control" value="{{ $book->category->id }}">
                <option disabled>Zgjedh Kategorine...</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group pt-2">
            <label for="sasia">Sasia</label>
            <input class="form-control" name="sasia" id="sasia" type="text" placeholder="" value="{{$book->sasia}}">
          </div>
          <div class="form-group pt-2">
            <label for="date">Autori</label>
             <select id="author_id"  name="author_id" class="form-control" value="@foreach($book->author as $belong) {{$belong->id}} @endforeach">
                <option disabled>Zgjedh Autorin...</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                @endforeach
              </select>
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Edito</button>
            </div>
          </div>
        </form>

        <form action="{{route('books.show', $book->id)}}" method="Get">
          @csrf
          <button class="btn btn-space btn-secondary text-uppercase" type="cancel">Anulo</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
    <script src="/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="/js/app-form-elements.js" type="text/javascript"></script>
@endsection
@section('custom_scripts')
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
@endsection