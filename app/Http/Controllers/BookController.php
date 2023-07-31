<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store()
    {
        Book::create($this->validateRequest());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    /**
     * @return array
     */
    protected function validateRequest(): array
    {
        return \request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
