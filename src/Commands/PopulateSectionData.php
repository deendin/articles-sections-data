<?php

namespace App\Commands;

use App\Actions\CreateSection;
use App\Requests\ValidateCSVRequest;

class PopulateSectionData extends ValidateCSVRequest
{
    /**
     * Handles and create a new sector from the csv file
     * 
     */
    public function handle(string $filepath = null) : int | bool
    {
        $insertions = 0;

        if( ! $this->validate($filepath) ) {
            return 0;
        }

        $data = read_file($filepath);

        foreach ($data as $sector => $value) {
            
            // prepare
            $data['section_id'] = $value['section_id'];
            $data['section_name'] = $value['section_name'];

            // execute
            $sector = (new CreateSection());
            $response = $sector->create($data);

            $insertions += 1;
        }

        return $insertions;
    }
}