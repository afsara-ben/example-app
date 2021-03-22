showing books
{{ json_encode($book) }}

<table class="table">
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>ISBN</th>
    </tr>
    <tr>
      <td>{{ $book->title }} </a></td>
      <td>{{ $book->author }}</td>
      <td>{{ $book->ISBN }}</td>
    </tr>
    
</table>