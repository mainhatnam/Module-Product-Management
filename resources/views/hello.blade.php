<h1>hello word</h1>
<form action="{{ route('Category.add') }}" method="POST">
    @csrf
<input type="text" name="tenloaibanh">
<input type="submit" value="gui">
</form>
@isset($errors)
    {{ dd($errors) }}
@endisset
