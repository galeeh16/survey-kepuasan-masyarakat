<?php 

declare(strict_types=1);

namespace App\Contracts;


interface LayananContract 
{
    public function getList(): array;

    public function dropdownLayanan();

    public function addLayanan(array $data);

    public function deleteLayanan($id);

    public function editLayanan(array $data);
}
