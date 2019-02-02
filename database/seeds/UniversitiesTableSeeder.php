<?php

use App\University;
use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    protected $data = [
        ['name' => 'University of Aberdeen', 'domain' => 'abdn.ac.uk'],
        ['name' => 'University of Bath', 'domain' => 'bath.ac.uk' ],
        ['name' => 'University of Bristol', 'domain' => 'bris.ac.uk' ],
        ['name' => 'University of Cambridge', 'domain' => 'cam.ac.uk' ],
        ['name' => 'University of Cranfield', 'domain' => 'cranfield.ac.uk'],
        ['name' => 'University of Edinburgh', 'domain' => 'ed.ac.uk'],
        ['name' => 'University of Essex', 'domain' => 'essex.ac.uk'],
        ['name' => 'University of Exeter', 'domain' => 'ex.ac.uk'],
        ['name' => 'Imperial College London', 'domain' => 'ic.ac.uk'],
        ['name' => 'University of Leeds', 'domain' => 'leeds.ac.uk'],
        ['name' => 'Loughborough University', 'domain' => 'lboro.ac.uk'],
        ['name' => 'University of Manchester', 'domain' => 'man.ac.uk'],
        ['name' => 'University of Nottingham', 'domain' => 'nottingham.ac.uk'],
        ['name' => 'University of Oxford', 'domain' => 'ox.ac.uk'],
        ['name' => 'Queen\'s University Belfast', 'domain' => 'qub.ac.uk'],
        ['name' => 'University of Salford', 'domain' => 'salford.ac.uk'],
        ['name' => 'University of Southampton', 'domain' => 'soton.ac.uk'],
		['name' => 'University of Strathclyde', 'domain' => 'strath.ac.uk'],
        ['name' => 'University of Surrey', 'domain' => 'surrey.ac.uk'],
        ['name' => 'University College London (UCL)', 'domain' => 'ucl.ac.uk'],
        ['name' => 'University of the West of England (UWE)', 'domain' => 'uwe.ac.uk'],
        ['name' => 'University of Warwick', 'domain' => 'warwick.ac.uk'],
        ['name' => 'University of York', 'domain' => 'york.ac.uk'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $datum)
            University::create($datum);
    }
}
