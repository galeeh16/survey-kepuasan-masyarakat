<?php 

declare(strict_types=1);

namespace App\Contracts;

interface KuesionerContract 
{
    public function addResponden(
        $nama_responden,
        $jenis_kelamin,
        $pendidikan,
        $pekerjaan,
        $no_hp,
        $nik,
        $id_layanan,
    );

    public function addKuesioner(
        $id_responden,
        $id_layanan,
        array $answers
    );

    public function getListPagination();

    public function findRespondenById($id);

    public function updateKuesionerByRespondenId($id_responden, array $answers);
}
