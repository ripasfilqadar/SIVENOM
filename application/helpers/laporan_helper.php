<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('hitungDenda'))
{
    function hitungDenda($kontrak, $report)
    {
      $ketidakHadiranDC = intval($report['KehadiranDC']) - intval($report['RealisasiKehadiranDC']);
      $hargaDC = intval($kontrak['HargaKehadiranDC']) * 0.1 + intval($kontrak['HargaKehadiranDC']);
      $hargaDC = intval($hargaDC) *  intval($report['KehadiranDC']);

      $ketidakHadiranDRC = intval($report['KehadiranDRC']) - intval($report['RealisasiKehadiranDRC']);
      $hargaDRC = intval($kontrak['HargaKehadiranDRC']) * 0.1 + intval($kontrak['HargaKehadiranDRC']);
      $hargaDRC = intval($hargaDRC) *  intval($report['KehadiranDRC']);

      $dendaDRC = intval($ketidakHadiranDRC) * $kontrak['PengaliDenda']/100 * intval($hargaDRC);
      $dendaDC = intval($ketidakHadiranDC) * $kontrak['PengaliDenda']/100 * intval($hargaDC);
      return array('DendaDC' => strval($dendaDC), 'DendaDRC' => strval($dendaDRC) );
    }
}

if ( ! function_exists('hitungDendaKontrak'))
{
    function hitungDendaKontrakDC($kontrak, $reports)
    {
      $totalDendaDC = 0;
      $totalDendaDRC = 0;
      foreach ($reports as $report) {
        $dendaKontrak = hitungDenda($kontrak, $report);
        $totalDendaDC += intval($dendaKontrak['DendaDC']);
        $totalDendaDRC += intval($dendaKontrak['DendaDRC']);
      }

      return array('TotalDendaDC' => $totalDendaDC, 'TotalDendaDRC' => $totalDendaDRC, 'TotalDenda' => $totalDendaDC + $totalDendaDRC);
    }
}