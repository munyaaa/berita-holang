<?php

namespace App\Imports;

use App\News;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NewsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new News([
            //
            'link' => $row['link'],
            'headline' => $row['headline'],
            'title' => $row['title'],
            'content' => $row['content'],
            'image' => $row['image'],
            'writer' => $row['writer'],
            'date' => $row['date']
        ]);
    }
}
