<form action="{{ route('books.destroy', $book->id) }}">
        <button type="delete" class="btn btn-danger">Delete</button>
</form>
