<?php
function getAllContacts() {
    $file = 'contact_data.csv';
    $contacts = [];

    if (($handle = fopen($file, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $contacts[] = $data;
        }
        fclose($handle);
    }

    return $contacts;
}

function getContactByIndex($index) {
    $contacts = getAllContacts();

    if (isset($contacts[$index])) {
        return $contacts[$index];
    }

    return false;
}

function createContact($name, $email, $subject, $phone) {
    $file = 'contact_data.csv';

    $newContact = [$name, $email, $subject, $phone];

    if (($handle = fopen($file, 'a')) !== false) {
        if (fputcsv($handle, $newContact)) {
            fclose($handle);
            return true;
        }
        fclose($handle);
    }

    return false;
}

function updateContact($index, $data) {
    $contacts = getAllContacts();

    if ($contacts && isset($contacts[$index])) {
        $contacts[$index] = $data;

        $file = 'contact_data.csv';
        if (($handle = fopen($file, 'w')) !== false) {
            foreach ($contacts as $contact) {
                fputcsv($handle, $contact);
            }
            fclose($handle);
            return true;
        }
    }

    return false;
}

function deleteContact($index) {
    $contacts = getAllContacts();

    if ($contacts && isset($contacts[$index])) {
        unset($contacts[$index]);

        $file = 'contact_data.csv';
        if (($handle = fopen($file, 'w')) !== false) {
            foreach ($contacts as $contact) {
                fputcsv($handle, $contact);
            }
            fclose($handle);
            return true;
        }
    }

    return false;
}
?>
