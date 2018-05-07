<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function pdf1()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(15,10,'ID',1,0);
        $pdf->Cell(50,10,'Nama Customer',1,0);
        $pdf->Cell(50,10,'Alamat',1,0);
        $pdf->Cell(25,10,'Phone',1,0);
        $pdf->Cell(25,10,'Gender',1,0);
        $pdf->Cell(30,10,'Username',1,1);


        $var = \DB::table('costumer')
                        ->select('costumer.id', 'costumer.name', 'costumer.address', 'costumer.phone', 'costumer.gender', 'costumer.user_id')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
            $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(15,7,$a->id,1,0);
        $pdf->Cell(50,7,$a->name,1,0);
        $pdf->Cell(50,7,$a->address,1,0);
        $pdf->Cell(25,7,$a->phone,1,0);
        $pdf->Cell(25,7,$a->gender,1,0);
        $pdf->Cell(30,7,$a->user_id,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
    public function pdf2()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(7,10,'ID',1,0);
        $pdf->Cell(40,10,'Nama',1,0);
        $pdf->Cell(20,10,'Kode',1,0);
        $pdf->Cell(22,10,'Tanggal Pesan',1,0);
        $pdf->Cell(20,10,'Rute Dari',1,0);
        $pdf->Cell(20,10,'Rute Ke',1,0);
        $pdf->Cell(20,10,'Jam Tiba',1,0);
        $pdf->Cell(10,10,'Kursi',1,0);
        $pdf->Cell(20,10,'Username',1,1);


        $var = \DB::table('reservation')
                        ->join('rute', 'rute.id', '=', 'reservation.rute_id')
                        ->join('costumer', 'costumer.id', '=', 'reservation.costumer_id')
                        ->select('reservation.id', 'reservation.reservation_code', 'reservation.reservation_date', 'costumer.name', 'reservation.seat_code', 'rute.rute_form','rute.rute_to','rute.depart_at', 'reservation.user_id')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
        $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(7,7,$a->id,1,0);
        $pdf->Cell(40,7,$a->name,1,0);
        $pdf->Cell(20,7,$a->reservation_code,1,0);
        $pdf->Cell(22,7,$a->reservation_date,1,0);
        $pdf->Cell(20,7,$a->rute_form,1,0);
        $pdf->Cell(20,7,$a->rute_to,1,0);
        $pdf->Cell(20,7,$a->depart_at,1,0);
        $pdf->Cell(10,7,$a->seat_code,1,0);
        $pdf->Cell(20,7,$a->user_id,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
    public function pdf3()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(7,10,'ID',1,0);
        $pdf->Cell(50,10,'Kendaraan',1,0);
        $pdf->Cell(20,10,'Jam Tiba',1,0);
        $pdf->Cell(20,10,'Rute Dari',1,0);
        $pdf->Cell(20,10,'Rute Ke',1,0);
        $pdf->Cell(20,10,'Harga',1,1);


        $var = \DB::table('rute')
                        ->join('transportation', 'transportation.id', '=', 'rute.transportation_id')
                        ->select('rute.id', 'transportation.code', 'rute.depart_at', 'rute.rute_form', 'rute.rute_to', 'rute.price')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
        $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(7,7,$a->id,1,0);
        $pdf->Cell(50,7,$a->code,1,0);
        $pdf->Cell(20,7,$a->depart_at,1,0);
        $pdf->Cell(20,7,$a->rute_form,1,0);
        $pdf->Cell(20,7,$a->rute_to,1,0);
        $pdf->Cell(20,7,$a->price,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
    public function pdf4()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(7,10,'ID',1,0);
        $pdf->Cell(50,10,'Kendaraan',1,0);
        $pdf->Cell(25,10,'Deskripsi',1,0);
        $pdf->Cell(25,10,'Jumlah Kursi',1,0);
        $pdf->Cell(25,10,'Jenis Kendaraan',1,1);


        $var = \DB::table('transportation')
                        ->join('transportation_type', 'transportation_type.id', '=', 'transportation.transportation_type_id')
                        ->select('transportation.id', 'transportation.code', 'transportation.description AS nama', 'transportation.seat_qty', 'transportation_type.description')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
        $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(7,7,$a->id,1,0);
        $pdf->Cell(50,7,$a->code,1,0);
        $pdf->Cell(25,7,$a->nama,1,0);
        $pdf->Cell(25,7,$a->seat_qty,1,0);
        $pdf->Cell(25,7,$a->description,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
    public function pdf5()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(7,10,'ID',1,0);
        $pdf->Cell(50,10,'Kendaraan',1,1);


        $var = \DB::table('transportation_type')
                        ->select('transportation_type.id', 'transportation_type.description')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
        $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(7,7,$a->id,1,0);
        $pdf->Cell(50,7,$a->description,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
    public function pdf6()
    {
        $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,10,'No',1,0);
        $pdf->Cell(30,10,'Username',1,0);
        $pdf->Cell(50,10,'Nama',1,0);
        $pdf->Cell(50,10,'Email',1,0);
        $pdf->Cell(25,10,'Level',1,1);


        $var = \DB::table('users')
                        ->select('users.username', 'users.name', 'users.email', 'users.level')
                        ->get();

        $no=1;
        $pdf->SetFont('Arial','',7);
        foreach ($var as $a) {
        $pdf->Cell(7,7,$no,1,0);
        $pdf->Cell(30,7,$a->username,1,0);
        $pdf->Cell(50,7,$a->name,1,0);
        $pdf->Cell(50,7,$a->email,1,0);
        $pdf->Cell(25,7,$a->level,1,1);

        $no++;
        }

        $pdf->Output();
        die;
    }
}
