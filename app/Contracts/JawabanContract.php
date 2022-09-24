<?php 

declare(strict_types=1);

namespace App\Contracts;

interface JawabanContract 
{
    public function getListPagination();

    public function addJawaban(array $data);

    public function updateJawaban(array $data, $id);

    public function deleteJawaban($id);
}