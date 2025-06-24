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

            // Cek status berdasarkan tanggal
            if ($now->lt($start)) {
                $event->status = 'Coming Soon';
            } elseif ($now->between($start, $end)) {
                $event->status = 'Sedang Berlangsung';
            } else {
                $event->status = 'Selesai';
            }

            // Simpan perubahan status jika berbeda
            if ($event->isDirty('status')) {
                $event->save();
            }

            // Format tampilan tanggal
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

    public function edit($id_kegiatan)
    {
        $event = Kegiatan::findOrFail($id_kegiatan);
        return view('panitia.event.edit', compact('event'));
    }

    public function update(Request $request, $id_kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('panitia.event.index')->with('success', 'Event berhasil diperbarui!');
    }


    // Controller untuk sesi
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

        // Hitung jumlah sesi yang sudah ada untuk id_kegiatan ini
        $jumlahSesi = DetailKegiatan::where('id_kegiatan', $id_kegiatan)->count();
        $nomorSesi = $jumlahSesi + 1;

        // Simpan ke database
        $detailKegiatan = DetailKegiatan::create([
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


    // Controller untuk eventDetail
    public function eventDetail($id_kegiatan)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)->firstOrFail();
        $user = session('user');
        $userId = $user['id'];
        $userRole = $user['id_role'];

        $detailKegiatan = DetailKegiatan::withCount('registrasi')
            ->with(['registrasi' => function ($query) use ($userId) {
                $query->where('id_user', $userId);
            }])
            ->where('id_kegiatan', $id_kegiatan)
            ->orderBy('sesi', 'asc')
            ->get();

        // Format tanggal event
        $start = \Carbon\Carbon::parse($kegiatan->tanggal_mulai);
        $end = \Carbon\Carbon::parse($kegiatan->tanggal_selesai);

        if ($start->isSameDay($end)) {
            $kegiatan->tanggal_display = $start->format('d M');
        } elseif ($start->format('M') === $end->format('M')) {
            $kegiatan->tanggal_display = $start->format('d') . ' – ' . $end->format('d M');
        } else {
            $kegiatan->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
        }

        // Batas waktu registrasi (misal 1 hari sebelum mulai)
        $batasWaktu = $start->copy();
        $sudahLewatBatas = now()->gt($batasWaktu);

        // Untuk setiap sesi, siapkan status registrasi user
        $sesiStatus = [];
        foreach ($detailKegiatan as $sesi) {
            $reg = $sesi->registrasi->first();
            $sudahDaftar = $reg ? true : false;
            $statusDitolak = $reg && $reg->status_konfirmasi == 'Ditolak';

            if ($sudahLewatBatas) {
                $status = 'closed';
            } elseif ($sudahDaftar && !$statusDitolak) {
                $status = 'registered';
            } elseif ($statusDitolak) {
                $status = 're-register';
            } elseif (!$sudahDaftar) {
                $status = 'can-register';
            } else {
                $status = 'not-allowed';
            }

            $sesiStatus[$sesi->id_detail_kegiatan] = $status;
        }

        return view('eventDetail', compact('kegiatan', 'detailKegiatan', 'sesiStatus', 'batasWaktu'));
    }
}
