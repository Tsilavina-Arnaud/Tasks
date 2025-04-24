<?php

namespace App\Imports;

use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TasksImport implements ToCollection
{
    /**
     * @param collection $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $row)
    {
        $row = $row->slice(1);
        foreach ($row as $rows) {
            Task::create([
                'title' => $rows[1],
                'description' => $rows[2],
                'user_id' => Auth::user()->id,
                'observation_id' => $rows[6],
                'begin_at' => $rows[7],
                'hour_begin_at' => $rows[8],
                'finished_at' => $rows[9],
                'hour_finished_at' => $rows[10],
                'month' => $rows[11],
            ]);
        }
    }
}
