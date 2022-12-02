<?php

if (!function_exists('read_file')) {
    
    /**
     * Reads the content of a csv file.
     * 
     */
    function read_file(string $file_path) : array {

        $content = file($file_path);

        $array = array();

        for ($i = 1; $i < count($content); $i++) {
            if (!empty($content[$i])) {
                $line = explode(',', $content[$i]);
                for ($j = 0; $j < count($line); $j++) {
                    $array[$i][$j + 1] = $line[$j];
                }
            }
        }

        $k = count($array) + 1;
        
        $filtered_data = [];

        for ($i = 2; $i < $k; $i++) {
            
            $id = $array[$i][1] ?? null;
            $section_id = $array[$i][2] ?? null;
            $section_name = $array[$i][3] ?? null;
            $title = $array[$i][4] ?? null;
            $created = $array[$i][5] ?? null;

            if (
                !empty($id) && !empty($section_id)
            ) {
                $filtered_data[] = [
                    'id' => $id,
                    'section_id' => $section_id,
                    'section_name' => $section_name,
                    'title' => $title,
                    'created' => $created
                ];
            }
        }

        return $filtered_data;
    }
}