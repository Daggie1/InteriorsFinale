<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        protected $counties = [
        [
            'name'                       =>  'Mombasa',
            'code'                     =>  '001',
        ],
            [
                'name'                       =>  'Kwale',
                'code'                     =>  '002',
            ],
            [
                'name'                       =>  'Kilifi',
                'code'                     =>  '003',
            ],
            [
                'name'                       =>  'Tana River',
                'code'                     =>  '004',
            ],
            [
                'name'                       =>  'Lamu',
                'code'                     =>  '005',
            ],
            [
                'name'                       =>  'Taita-Taveta',
                'code'                     =>  '006',
            ],
            [
                'name'                       =>  'Garissa',
                'code'                     =>  '007',
            ],
            [
                'name'                       =>  'Wajir',
                'code'                     =>  '008',
            ],
            [
                'name'                       =>  'Mandera',
                'code'                     =>  '009',
            ],
            [
                'name'                       =>  'Marsabit',
                'code'                     =>  '010',
            ],
            [
                'name'                       =>  'Isiolo',
                'code'                     =>  '0011',
            ],
            [
                'name'                       =>  'Meru',
                'code'                     =>  '0012',
            ],
            [
                'name'                       =>  'Tharaka-Nithi',
                'code'                     =>  '0013',
            ],
            [
                'name'                       =>  'Embu',
                'code'                     =>  '0014',
            ],
            [
                'name'                       =>  'Kitui',
                'code'                     =>  '0015',
            ],
            [
                'name'                       =>  'Machakos',
                'code'                     =>  '0016',
            ],
            [
                'name'                       =>  'Makueni',
                'code'                     =>  '0017',
            ],
            [
                'name'                       =>  'Nyandarua',
                'code'                     =>  '0018',
            ],
            [
                'name'                       =>  'Nyeri',
                'code'                     =>  '0019',
            ],
            [
                'name'                       =>  'Kirinyaga',
                'code'                     =>  '0020',
            ],
            [
                'name'                       =>  "Murang'a",
                'code'                     =>  '0021',
            ],
            [
                'name'                       =>  'Kiambu',
                'code'                     =>  '0022',
            ],
            [
                'name'                       =>  'Turkana',
                'code'                     =>  '0023',
            ],
            [
                'name'                       =>  'West pokot',
                'code'                     =>  '0024',
            ],
            [
                'name'                       =>  'Samburu',
                'code'                     =>  '0025',
            ],
            [
                'name'                       =>  'Trans-Nzoia',
                'code'                     =>  '0026',
            ],
            [
                'name'                       =>  'Uasin Ngishu',
                'code'                     =>  '0027',
            ],

            [
            'name'                       =>  'Elgeyo-Marakwet',
            'code'                     =>  '0028',
        ],
            [
                'name'                       =>  'Nandi',
                'code'                     =>  '0029',
            ],
            [
                'name'                       =>  'Baringo',
                'code'                     =>  '0030',
            ],
            [
                'name'                       =>  'Laikipia',
                'code'                     =>  '0031',
            ],
            [
                'name'                       =>  'Nakuru',
                'code'                     =>  '0032',
            ],
            [
                'name'                       =>  'Narok',
                'code'                     =>  '0033',
            ],
            [
                'name'                       =>  'Kajiado',
                'code'                     =>  '0034',
            ],
            [
                'name'                       =>  'Kericho',
                'code'                     =>  '0035',
            ],
            [
                'name'                       =>  'Bomet',
                'code'                     =>  '0036',
            ],
            [
                'name'                       =>  'Kakamega',
                'code'                     =>  '0037',
            ],
            [
                'name'                       =>  'Vihiga',
                'code'                     =>  '0038',
            ],
            [
                'name'                       =>  'Bungoma',
                'code'                     =>  '0039',
            ],
            [
                'name'                       =>  'Busia',
                'code'                     =>  '0040',
            ],
            [
                'name'                       =>  'Siaya',
                'code'                     =>  '0041',
            ],
            [
                'name'                       =>  'Kisumu',
                'code'                     =>  '0042',
            ],
            [
                'name'                       =>  'Homa Bay',
                'code'                     =>  '0043',
            ],
            [
                'name'                       =>  'Migori',
                'code'                     =>  '0044',
            ],
            [
                'name'                       =>  'Kisii',
                'code'                     =>  '0045',
            ],
            [
                'name'                       =>  'Nyamira',
                'code'                     =>  '0046',
            ],
            [
                'name'                       =>  'Nairobi',
                'code'                     =>  '0047',
            ],
    ];

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
    {
        foreach ($this->counties as $index => $county)
        {
            $result = \App\Models\Counties::create($county);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->counties). ' records');
    }




}
