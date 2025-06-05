<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;


class PesertaController extends Controller
{
    public function index(){
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

        return view('peserta.event.index', compact('events'));
    }
}
