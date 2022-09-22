<?php 

declare(strict_types=1);

namespace App\Contracts;

interface PertanyaanContract 
{
    public function getAllPertanyaan(); // tanpa pagination

    public function getListPagination();

    public function insertDataPertanyaan(string $pertanyaan, array $jawaban);

    public function getPertanyaanById($id);

    public function getPertanyaanJawaban($id);

    public function updatePertanyaanById($pertanyaan_id, $pertanyaan);

    public function updateJawaban($pertanyaan_id, array $jawabans);

    public function deletePertanyaanById($pertanyaan_id);

    public function deletePertanyaanJawaban($pertanyaan_id);

}