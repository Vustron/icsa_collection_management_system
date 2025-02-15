<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institute_names = [
            'Institute of Computing',
            'Institute of Aquatic and Applied Sciences',
            'Institute of Leadership, Entrepreneurship and Good Governance',
            'Institute of Teacher Education'
        ];

        $institutes = [
            $institute_names[0] => [
                'programs' => [
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[0])->value('id'),
                        'name' => 'BS Information Systems',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[0])->value('id'),
                        'name' => 'BS Information Technology',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                ]
            ],
            $institute_names[1] => [
                'programs' => [
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[1])->value('id'),
                        'name' => 'BS Agro-Forestry',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[1])->value('id'),
                        'name' => 'BS Fisheries and Aquatic Sciences',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[1])->value('id'),
                        'name' => 'The BS Food Technology',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[1])->value('id'),
                        'name' => 'The BS Marine Biology',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                ]
            ],
            $institute_names[2] => [
                'programs' => [
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[2])->value('id'),
                        'name' => 'Bachelor of Public Administration',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[2])->value('id'),
                        'name' => 'Bachelor of Science in Disaster Resiliency and Managemen',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[2])->value('id'),
                        'name' => 'Bachelor of Science in Entrepreneurship',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[2])->value('id'),
                        'name' => 'Bachelor of Science in Social Work',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[2])->value('id'),
                        'name' => 'Bachelor of Science in Tourism Management',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],

                ]
            ],
            $institute_names[3] => [
                'programs' => [
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[3])->value('id'),
                        'name' => 'Bachelor of Secondary Education Major in English, Mathematics and Sciences',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[3])->value('id'),
                        'name' => 'Bachelor of Technology and Livelihood Education',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                    [
                        'institute_id' => Institute::where('institute_name', '=', $institute_names[3])->value('id'),
                        'name' => 'Bachelor of Physical Education',
                        'status' => 'active',
                        'delete_flag' => 0,
                        'date_created' => now(),
                        'date_updated' => now()
                    ],
                ]
            ],
        ];


        foreach ($institutes as $institute) {
            foreach ($institute['programs'] as $program) {
                Program::create($program);
            }
        }
    }
}
