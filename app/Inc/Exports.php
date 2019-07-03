<?php


namespace App\Inc;

use App\People;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exports implements FromCollection
{
    public function collection()
    {
        return People::all();
    }
}