<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
              'name'     => $row[1],
              'email'    => $row[2],
              'password' => Hash::make('password'),
              'role'     => $row[4],
        ]);
    }

    public function rules(): array
    {
        return [
            '2' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '2.unique' => 'The email address already exists.',
        ];
    }

}
