@extends('layouts.app')
@section('title','Books')

@section('content')
<a class="btn btn-info" href="{{ route('books.create') }}">Create Book</a>
@if(count($books) > 0)
  <table class="table">
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Action</th>
      </tr>
      @foreach ($books as $book)
      <tr>
        <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->ISBN }}</td>
        <td><a href="{{ route('books.edit', $book->id) }}">Edit</a> <a href="{{ route('books.delete', $book->id) }}">Delete</a></td>
      </tr>
      @endforeach
  </table>
   
{{ $books->links() }}
@endif
@endsection