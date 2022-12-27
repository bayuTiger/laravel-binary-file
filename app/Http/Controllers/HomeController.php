<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::all();

        return view('home', compact('files'));
    }

    public function store(Request $request, File $file)
    {
        if (empty($request->file) === false) {
            $file->name = $request->file('file')->getClientOriginalName();
            $file->content = $request->file('file')->get();
            $file->save();
        }

        return redirect()->route('home');
    }

    public function streamFile(File $file)
    {
        $callback = function () use ($file) {
            // 出力バッファをopen
            $stream = fopen('php://output', 'w');
            fwrite($stream, $file->content);
            fclose($stream);
        };

        $header = [
            'Content-Type' => 'application/octet-stream',
        ];

        return response()->streamDownload($callback, $file->name, $header);
    }
}
