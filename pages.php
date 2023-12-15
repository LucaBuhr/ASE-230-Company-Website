<?php
function getCreatedPagesList() {
    $pagesDirectory = 'created_pages';
    $pagesList = [];

    if (is_dir($pagesDirectory)) {
        $files = scandir($pagesDirectory);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $pagesList[] = $file;
            }
        }
    }

    return $pagesList;
}

function createPage($filename, $htmlCode) {
    $pagesDirectory = 'created_pages';

    if (!is_dir($pagesDirectory)) {
        mkdir($pagesDirectory, 0755, true);
    }

    $filePath = $pagesDirectory . '/' . $filename . '.html';

    if (file_put_contents($filePath, $htmlCode)) {
        return true;
    }

    return false;
}

function getPageContent($pageName) {
    $pagePath = 'created_pages/' . $pageName; 

    if (file_exists($pagePath)) {
        return file_get_contents($pagePath);
    }

    return false;
}

function updatePageContent($pageName, $htmlCode) {
    $pagePath = 'created_pages/' . $pageName;
    if (file_exists($pagePath) && file_put_contents($pagePath, $htmlCode)) {
        return true;
    }

    return false;
}

function deletePage($pageName) {
    $pagePath = 'created_pages/' . $pageName; 

    if (file_exists($pagePath) && unlink($pagePath)) {
        return true;
    }

    return false;
}
?>
