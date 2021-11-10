<?php

namespace App\Http\Controllers\Admins;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');

        $categories = Category::byKeyword('name', $keyword)->paginate(30);
        $categories->append('keyword');

        return view('admins.categories.index', compact('categories', 'keyword'));
    }

    public function create()
    {
        return view('admins.categories.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required:unique:'.Category::class.',name',
        ]);

        Category::create($attr);

        return redirect()
            ->route('admins.categories.index')
            ->with('message', 'Berhasil menambahkan kategori');
    }


    public function edit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('admins.categories.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $attr = $request->validate([
            'name' => [
                'required',
                Rule::unique(Category::class)
                    ->ignore($category->name, 'name')
            ]
        ]);

        $category->update($attr);

        return redirect()
            ->route('admins.categories.index')
            ->with('message', 'Berhasil menyimpan perubahan');

    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
            ->back()
            ->with('message', "Berhasil manghapus kategori {$category->name}");
    }
}
