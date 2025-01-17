<?php

namespace App\Utils;

use Carbon\Carbon;

class Tanggal
{
    public static function tglIndo($tanggal)
    {
        $tgl = new Carbon($tanggal);

        return $tgl->isoFormat('DD/MM/YYYY');
    }

    public static function tglNasional($tanggal)
    {
        $tanggal = explode('/', $tanggal);

        $tanggal_baru = "$tanggal[2]-$tanggal[1]-$tanggal[0]";
        $tgl = new Carbon($tanggal_baru);

        return $tgl->isoFormat('YYYY-MM-DD');
    }

    public static function tglLatin($tanggal)
    {
        $tgl = explode('-', $tanggal);

        return $tgl[2] . ' ' . self::namaBulan($tanggal) . ' ' . $tgl[0];
    }

    public static function namaBulan($tanggal)
    {
        $tgl = explode('-', $tanggal);
        $bln = $tgl[1];

        switch ($bln) {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
        }

        return $bulan;
    }
}
