<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\rejection_for;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'description' => 'required',
        'price' => 'required|numeric',
    ];

    private const BB_ERROR_MESSAGE = [
        'price.required' => 'Отдать товар бесплатно нельзя',
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длинее :max символов',
        'numeric' => 'Введите число',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function showAddBbForm()
    {
        return view('bb_add');
    }

    public function storeBb(Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGE);

        Auth::user()->bbs()->create(['title' => $validated['title'],
                                    'description' => $validated['description'],
                                    'price' => $validated['price'],]);

        return redirect()->route('home');
    }

    public function showEditBbForm(Bb $bb)
    {
        return view('bb_edit', ['bb' => $bb]);
    }

    public function updateBb(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGE);

        $bb->fill(['title' => $validated['title'],
                   'description' => $validated['description'],
                   'price' => $validated['price'],]);

        $bb->save();
        return redirect()->route('home');
    }

    public function showDeleteBbForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }

    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
