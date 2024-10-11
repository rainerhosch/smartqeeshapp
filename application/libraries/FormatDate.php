<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FormatDate
{
    function konversi_id($tgl)
    {
        $tanggal = explode("-", $tgl);
        $bln = $tanggal[1];
        switch ($bln) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $tanggal[2] . " " . $bulan . " " . $tanggal[0];
    }


    function konversi_en($tgl)
    {
        $tanggal = explode("-", $tgl);
        $bln = $tanggal[1];
        switch ($bln) {
            case 1:
                $bulan = "January";
                break;
            case 2:
                $bulan = "February";
                break;
            case 3:
                $bulan = "March";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "May";
                break;
            case 6:
                $bulan = "June";
                break;
            case 7:
                $bulan = "July";
                break;
            case 8:
                $bulan = "August";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "October";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "December";
                break;
        }

        $day = intval($tanggal[2]);
        if ($day == 1 || $day == 21 || $day == 31) {
            $day_suffix = "st";
        } elseif ($day == 2 || $day == 22) {
            $day_suffix = "nd";
        } elseif ($day == 3 || $day == 23) {
            $day_suffix = "rd";
        } else {
            $day_suffix = "th";
        }

        return $bulan . " " . $day . $day_suffix . ", " . $tanggal[0];
    }
}