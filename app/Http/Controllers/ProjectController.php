<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Model untuk project
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pendaftaran_project');
    }

    public function insertProject(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_project' => 'required|string|max:255',
            'desc' => 'required|string',
            'tujuan' => 'required|string|max:255',
            'deadline' => 'required|date',
            'fitur' => 'required|string',
            'target' => 'required|string|max:255',
            'jenis_web' => 'required|string|max:255',
            'platform' => 'required|string',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validasi dokumen
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Menyimpan file dokumen
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dokumen'), $filename); // Simpan file di public/uploads/dokumen
        }

        // Insert data ke database
        $project = new Project();
        $project->nm_project = $request->nama_project;
        $project->deskripsi = $request->desc;
        $project->tujuan = $request->tujuan;
        $project->deadline = $request->deadline;
        $project->fitur = $request->fitur;
        $project->target_pengguna = $request->target;
        $project->jenis_website = $request->jenis_web;
        $project->platform = $request->platform;
        $project->dokumen = $filename ?? null; // Simpan nama file
        $project->save();

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil ditambahkan!'
        ]);
    }

    public function ambilProject($id)
    {
        // Ambil project berdasarkan id
        $project = Project::find($id);

        // Set handle_name ke nama user yang mengambil
        $project->handle_name = Auth::user()->name;
        $project->status = "progress";
        $project->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Project berhasil diambil.');
    }

    public function upload(Request $request)
    {
        // Validasi bahwa file harus berupa .rar atau .zip
        $request->validate([
            'project_file' => 'required|mimes:zip,rar|max:20480', // Maksimal 20MB
        ]);

        if ($request->hasFile('project_file')) {
            // Ambil file
            $file = $request->file('project_file');

            // Beri nama file unik
            $filename = time() . '_' . $file->getClientOriginalName();

            // Pindahkan file ke folder uploads
            $file->move(public_path('uploads/project'), $filename);

            // Tambahkan logika lain seperti menyimpan informasi ke database
        }

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'File uploaded successfully!');
    }
}
