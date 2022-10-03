<?php 

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ExportExcelFromView implements FromView, ShouldAutoSize, WithChunkReading
{
    use Exportable;

    public function __construct(
        public string $view='', 
        public array $params=[], 
        public string $sheetName='sheet'
    ) {}
    
    /**
     * View Excel
     *
     * @return View
     */
    public function view(): View
    {
        return view($this->view, $this->params);
    }

    /**
     * Chunk arrays per 1000
     * 
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }
}