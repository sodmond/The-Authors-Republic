<?php

namespace App\Exports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuthorsExport implements FromCollection, WithHeadings
{
    public $month;
    public $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Author::whereRaw("MONTH(created_at) = $this->month AND YEAR(created_at) = $this->year")
            ->select('title', 'firstname', 'lastname', 'email', 'phone', 'dob', 'balance', 'city', 'state', 'zip', 'created_at', 'facebook', 'twitter', 'linkedin')
            ->get();
    }

    public function headings() : array
    {
        return [
            'TITLE',
            'FIRSTNAME',
            'LASTNAME',
            'EMAIL',
            'PHONE',
            'DATE OF BIRTH',
            'BALANCE ₦',
            'CITY',
            'STATE',
            'ZIP CODE',
            'DATE CREATED',
            'FACEBOOK',
            'TWITTER',
            'LINKEDIN'
        ];
    }
}
