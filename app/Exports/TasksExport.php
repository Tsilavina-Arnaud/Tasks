<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Throwable;

class TasksExport implements FromCollection, WithStrictNullComparison, WithHeadings, WithStyles
{
    use Exportable;

    public function __construct(public string $userId) {}

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Task::all()->where('user_id', '=', $this->userId);
    }

    public function headings(): array
    {
        return [
            '#',
            'Titre',
            'Description',
            'Utilisateur',
            'Date de création',
            'Date de modification',
            'Observation',
            'Date du commencement',
            'Heure',
            'Date du terminaison',
            'Heure',
            'Mois'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
