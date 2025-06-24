<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\DetailKegiatan;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Kegiatan::where('id_user', session('user.id'))->get();
        $now = Carbon::now()->startOfDay();

        foreach ($events as $event) {
            $start = Carbon::parse($event->tanggal_mulai)->startOfDay();
            $end = Carbon::parse($event->tanggal_selesai)->endOfDay();

            if ($now->lt($start)) {
                $event->status = 'Coming Soon';
            } elseif ($now->between($start, $end)) {
                $event->status = 'Sedang Berlangsung';
            } else {
                $event->status = 'Selesai';
            }

            if ($event->isDirty('status')) {
                $event->save();
            }

            if ($start->isSameDay($end)) {
                $event->tanggal_display = $start->format('d M');
            } elseif ($start->format('M') === $end->format('M')) {
                $event->tanggal_display = $start->format('d') . '–' . $end->format('d M');
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
            'nama_sesi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after_or_equal:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'narasumber' => 'required|string|max:150',
            'biaya_registrasi' => 'required|numeric|min:0',
            'maksimal_peserta' => 'required|integer|min:1',
        ]);

        $jumlahSesi = DetailKegiatan::where('id_kegiatan', $id_kegiatan)->count();
        $nomorSesi = $jumlahSesi + 1;

        DetailKegiatan::create([
            'id_kegiatan' => $id_kegiatan,
            'sesi' => $nomorSesi,
            'nama_sesi' => $request->nama_sesi,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'narasumber' => $request->narasumber,
            'biaya_registrasi' => $request->biaya_registrasi,
            'maksimal_peserta' => $request->maksimal_peserta,
            'status' => 'Coming Soon',
        ]);

        return redirect()->route('panitia.event.index')->with('success', 'Sesi berhasil ditambahkan!');
    }

    public function editSesi($id_sesi)
    {
        $sesi = DetailKegiatan::findOrFail($id_sesi);
        $kegiatan = Kegiatan::findOrFail($sesi->id_kegiatan);
        return view('panitia.event.editSesi', compact('sesi', 'kegiatan'));
    }

    public function updateSesi(Request $request, $id_sesi)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'narasumber' => 'required|string|max:150',
            'biaya_registrasi' => 'required|numeric|min:0',
            'maksimal_peserta' => 'required|integer|min:1',
        ]);

        $sesi = DetailKegiatan::findOrFail($id_sesi);
        $sesi->update([
            'nama_sesi' => $request->nama_sesi,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lokasi' => $request->lokasi,
            'narasumber' => $request->narasumber,
            'biaya_registrasi' => $request->biaya_registrasi,
            'maksimal_peserta' => $request->maksimal_peserta,
        ]);

        return redirect()->route('event.detailEvent', ['id' => $sesi->id_kegiatan])->with('success', 'Sesi berhasil diperbarui!');
    }

    public function deleteSesi($id_sesi)
    {
        $sesi = DetailKegiatan::findOrFail($id_sesi);
        $sesi->delete();

        return redirect()->back()->with('success', 'Sesi berhasil dihapus!');
    }

    public function eventDetail($id_kegiatan)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)->firstOrFail();
        $userId = session('user.id');

        $detailKegiatan = DetailKegiatan::withCount('registrasi')
            ->with(['registrasi' => function ($query) use ($userId) {
                $query->where('id_user', $userId);
            }])
            ->where('id_kegiatan', $id_kegiatan)
            ->orderBy('sesi', 'asc')
            ->get();

        $start = Carbon::parse($kegiatan->tanggal_mulai);
        $end = Carbon::parse($kegiatan->tanggal_selesai);

        if ($start->isSameDay($end)) {
            $kegiatan->tanggal_display = $start->format('d M');
        } elseif ($start->format('M') === $end->format('M')) {
            $kegiatan->tanggal_display = $start->format('d') . ' – ' . $end->format('d M');
        } else {
            $kegiatan->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
        }

        return view('eventDetail', compact('kegiatan', 'detailKegiatan'));
    }
}
