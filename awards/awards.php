<?php
class AwardsManager {
    private $awardsFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/ASE-230-Company-Website-main/admin/awards/awards.json';

    public function getAllAwards() {
        if (file_exists($this->awardsFile)) {
            $awardsData = file_get_contents($this->awardsFile);
            $awards = json_decode($awardsData, true);
    
            if ($awards !== null) {
                return $awards;
            } else {
                echo "Error decoding JSON data.";
                return false;
            }
        } else {
            echo "JSON file not found.";
            return false;
        }
    }

    public function getAwardById($year) {
        $awards = $this->getAllAwards();
        if ($awards) {
            foreach ($awards as $award) {
                if ($award['year'] == $year) {
                    return $award['description'];
                }
            }
        }
        return false;
    }

    public function createAward($year, $description) {
        $awards = $this->getAllAwards();
        $newAward = [
            'year' => $year,
            'description' => $description,
        ];

        if ($awards === false) {
            $awards = [];
        }

        $awards[] = $newAward;
        file_put_contents($this->awardsFile, json_encode($awards, JSON_PRETTY_PRINT));
        return true;
    }

    public function modifyAward($year, $newDescription) {
        $awards = $this->getAllAwards();
        if ($awards) {
            foreach ($awards as &$award) {
                if ($award['year'] == $year) {
                    $award['description'] = $newDescription;
                }
            }
            file_put_contents($this->awardsFile, json_encode($awards, JSON_PRETTY_PRINT));
            return true;
        }
        return false;
    }

    public function deleteAward($year) {
        $awards = $this->getAllAwards();
        if ($awards) {
            $awards = array_filter($awards, function ($award) use ($year) {
                return $award['year'] != $year;
            });
            file_put_contents($this->awardsFile, json_encode(array_values($awards), JSON_PRETTY_PRINT));
            return true;
        }
        return false;
    }
}

class JSONHelper {
    public static function createJSONFile($file, $data) {
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }

    public static function readJSONFile($file) {
        if (file_exists($file)) {
            return json_decode(file_get_contents($file), true);
        }
        return false;
    }
}

?>
