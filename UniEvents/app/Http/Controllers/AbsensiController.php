<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\RegistrasiKegiatan;
use App\Models\Presensi;
use App\Models\DetailKegiatan;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $events = Kegiatan::all();

        $selectedEvent = $request->input('event_id');
        $selectedSession = $request->input('session_id');

        $presensiQuery = Presensi::with([
            'registrasi.user',
            'registrasi.detailKegiatan.kegiatan',
        ]);

        if ($selectedEvent) {
            $presensiQuery->whereHas('registrasi.detailKegiatan', function ($q) use ($selectedEvent) {
                $q->where('id_kegiatan', $selectedEvent);
            });
        }

        if ($selectedSession) {
            $presensiQuery->whereHas('registrasi', function ($q) use ($selectedSession) {
                $q->where('id_detail_kegiatan', $selectedSession);
            });
        }

        $presensiList = $presensiQuery->orderByDesc('waktu_pindai')->get();

        return view('panitia.absensi.index', compact('events', 'presensiList', 'selectedEvent', 'selectedSession'));
    }

    public function scan($id, Request $request)
    {
        $eventId = $request->query('event_id');
        $sessionId = $request->query('session_id');

        $registrasi = RegistrasiKegiatan::find($id);

        if (!$registrasi) {
            return response()->json(['message' => 'Registrasi tidak ditemukan.'], 404);
        }

        if ($registrasi->id_detail_kegiatan != $sessionId) {
            return response()->json(['message' => 'Sesi tidak valid untuk QR ini.'], 403);
        }

        $actualEventId = $registrasi->detailKegiatan->id_kegiatan;
        if ($actualEventId != $eventId) {
            return response()->json([
                'message' => 'QR ini bukan untuk event yang sedang dipilih.'
            ], 403);
        }

        $exists = Presensi::where('id_registrasi', $id)->exists();
        if ($exists) {
            return response()->json([
                'message' => 'Peserta ini sudah tercatat hadir.'
            ], 409);
        }

        Presensi::create([
            'id_registrasi' => $id,
            'waktu_pindai' => now(),
            'status' => 'Hadir',
        ]);

        return response()->json([
            'message' => 'Presensi berhasil dicatat untuk ID: ' . $id
        ]);
    }

    public function getSessionsByEvent($id)
    {
        $sessions = DetailKegiatan::where('id_kegiatan', $id)->get();

        return response()->json($sessions);
    }
}
