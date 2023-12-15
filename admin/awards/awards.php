<?php
// Function to retrieve and index all items from the database
function getAllAwards() {
    $awardsFile = 'C:\Users\lucbu\OneDrive\XAMPP\htdocs\ASE-230\04\admin\awards\awards.txt';
    if (file_exists($awardsFile)) {
        $awards = file($awardsFile, FILE_IGNORE_NEW_LINES);
        return $awards;
    } else {
        return false;
    }
}

// Function to retrieve and show a specific item from the database
function getAwardById($year) {
    $awards = getAllAwards();
    if ($awards) {
        foreach ($awards as $award) {
            $awardData = explode(': ', $award);
            if ($awardData[0] == $year) {
                return $awardData[1];
            }
        }
    }
    return false;
}

// Function to create a new item in the database
function createAward($year, $description) {
    $awardsFile = 'C:\Users\lucbu\OneDrive\XAMPP\htdocs\ASE-230\04\admin\awards\awards.txt';
    $award = $year . ': ' . $description . PHP_EOL;
    file_put_contents($awardsFile, $award, FILE_APPEND);
    return true;
}

// Function to modify an existing award in the database
function modifyAward($oldAward, $newDescription) {
    $awardsFile = 'C:\Users\lucbu\OneDrive\XAMPP\htdocs\ASE-230\04\admin\awards\awards.txt';
    $awards = getAllAwards();
    
    if ($awards) {
        $updatedAwards = [];
        foreach ($awards as $existingAward) {
            // Compare the trimmed award descriptions for modification
            if (trim($existingAward) == trim($oldAward)) {
                $updatedAwards[] = $newDescription; // Add the updated award description
            } else {
                $updatedAwards[] = $existingAward;
            }
        }
        file_put_contents($awardsFile, implode(PHP_EOL, $updatedAwards));
        return true;
    }
    return false;
}



function deleteAward($award) {
    $awardsFile = 'C:\Users\lucbu\OneDrive\XAMPP\htdocs\ASE-230\04\admin\awards\awards.txt';
    $awards = getAllAwards();
    
    if ($awards) {
        $updatedAwards = [];
        foreach ($awards as $existingAward) {
            // Compare the trimmed award descriptions for deletion
            if (trim($existingAward) != trim($award)) {
                $updatedAwards[] = $existingAward;
            }
        }
        file_put_contents($awardsFile, implode(PHP_EOL, $updatedAwards));
        return true;
    }
    return false;
}

?>
