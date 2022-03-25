@foreach(Arr::flatten($errors) as $error)
  <div class="text-danger">{{ $error }}</div>
@endforeach