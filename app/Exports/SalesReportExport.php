<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class SalesReportExport implements FromCollection, WithHeadings, WithTitle, WithCustomCsvSettings, ShouldAutoSize, WithEvents
{
    protected $data;
    protected $headings;
    protected $title;

    public function __construct(Collection $data, array $headings, string $title)
    {
        $this->data = $data;
        $this->headings = $headings;
        $this->title = $title;
    }

    public function headings(): array
    {
        return $this->headings;
    }


    public function title(): string
    {
        return $this->title;
    }



    public function collection()
    {
        return $this->data->map(function ($item) {
            return collect($item)->except(['created_at', 'updated_at'])->all();
        });
    }


    public function getCsvSettings(): array
    {
        return [
            'line_ending' => "\r\n", // Adjust line ending based on your preference
        ];
    }

    public function map($row): array
    {
        return [
            $this->title, // Add the title in cell A1
            $row['#'],
            $row['Product Name'],
            $row['Initial Stock (items)'],
            $row['Total Cost Purchase'],
            $row['Sold Quantity (items)'],
            $row['Total Sales'],
            $row['Stock Remained'],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}
