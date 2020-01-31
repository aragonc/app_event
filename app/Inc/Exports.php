<?php


namespace App\Inc;

use App\Event;
use App\People;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exports implements FromArray
{
    public function collection()
    {

    }

    /**
     * @return array
     */
    public function array(): array
    {
        $peoples = People::all();
        $list = [];
        foreach ($peoples as $people){

            $temp = [
                'code' => $people->id,
                'name' => $people->name,
                'event' => $people->event->title,
                'dni' => $people->dni,
                'email' => $people->email,
                'phone' => $people->phone,
                'country' => $people->country,
                'authorize' => $people->authorize,
                'created_at' => $people->created_at
            ];
            $list[] = $temp;
        }

        return $list;
    }
}