<?php

namespace App\Imports;

use App\Models\Mcq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class McqsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Mcq([
            'category_id'     => $row['category_id'],
            'subcategory_id'  => $row['subcategory_id'],
            'question'        => $row['question'],
            'option_a'        => $row['option_a'],
            'option_b'        => $row['option_b'],
            'option_c'        => $row['option_c'],
            'option_d'        => $row['option_d'],
            'correct_option'  => $row['correct_option'],
            'explanation'     => $row['explanation'],
            'title'           => $row['title'] ?? null,
            'image'           => $row['image'] ?? null,
        ]);
    }
}
