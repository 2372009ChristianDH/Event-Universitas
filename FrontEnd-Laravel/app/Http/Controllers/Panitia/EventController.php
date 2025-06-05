<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\DetailKegiatan;

class EventController extends Controller
{
    public function index()
    {
        $events = Kegiatan::where('id_user', session('user.id'))->get();

        // Tambahkan properti untuk tanggal yang sudah diformat
        foreach ($events as $event) {
            $start = \Carbon\Carbon::parse($event->tanggal_mulai);
            $end = \Carbon\Carbon::parse($event->tanggal_selesai);

            if ($start->isSameDay($end)) {
                $event->tanggal_display = $start->format('d M');
            } elseif ($start->format('M') === $end->format('M')) {
                $event->tanggal_display = $start->format('d') . '–' . $end->format('d') . ' ' . $start->format('M');
            } else {
                $event->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
            }
        }

        return view('panitia.event.index', compact('events'));
    }

    public function create()
    {
        return view('panitia.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $kegiatan = Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'id_user' => session('user')['id'],
            'status' => 'Coming Soon',
        ]);

        return redirect()->route('panitia.event.index', ['id_kegiatan' => $kegiatan->id_kegiatan])->with('success', 'Event berhasil dibuat!');
    }

    public function createSesi($id_kegiatan)
    {
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        return view('panitia.event.createSesi', compact('kegiatan'));
    }

    public function storeSesi(Request $request, $id_kegiatan)
    {
        $request->validate([
            'sesi' => 'required|integer|min:1',
            'nama_sesi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after_or_equal:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'narasumber' => 'required|string|max:150',
        ]);

        $detailKegiatan = DetailKegiatan::create([
            'id_kegiatan' => $id_kegiatan,
            'sesi' => $request->sesi,
            'nama_sesi' => $request->nama_sesi,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'narasumber' => $request->narasumber,
        ]);

        return redirect()->route('panitia.event.index')->with('success', 'Sesi berhasil ditambahkan!');
    }

    public function eventDetail($id_kegiatan)
    {
        // Ambil 1 kegiatan berdasarkan id_kegiatan dan id_user
        $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)
            ->where('id_user', session('user.id'))
            ->firstOrFail();

        // Format tanggal tampilannya
        $start = \Carbon\Carbon::parse($kegiatan->tanggal_mulai);
        $end = \Carbon\Carbon::parse($kegiatan->tanggal_selesai);

        if ($start->isSameDay($end)) {
            // Event 1 hari
            $kegiatan->tanggal_display = $start->format('d M');
        } elseif ($start->format('M') === $end->format('M')) {
            // Tanggal beda tapi bulan sama, contoh: 03 – 04 Jun
            $kegiatan->tanggal_display = $start->format('d') . ' – ' . $end->format('d M');
        } else {
            // Tanggal dan bulan beda, contoh: 30 Jun – 02 Jul
            $kegiatan->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
        }


        // Ambil detail kegiatan
        $detailKegiatan = DetailKegiatan::where('id_kegiatan', $id_kegiatan)
            ->orderBy('sesi', 'asc')
            ->get();

        return view('eventDetail', compact('kegiatan', 'detailKegiatan'));
    }
}
