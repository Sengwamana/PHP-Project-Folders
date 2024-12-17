<?php

// Utility function to map score to a range
function mapScoreToRange($score, $ranges) {
    foreach ($ranges as $range => $value) {
        [$min, $max] = explode("-", $range);
        if ($score >= (float)$min && $score <= (float)$max) {
            return $value;
        }
    }
    return null; // Default in case no range matches
}

// -------------------------- Score Letter Grade -------------------------

function getScoreLetterGrade($score) {
    $letterGradeRanges = [
        "75-100" => "AA",
        "70-74" => "A",
        "65-69" => "AB",
        "60-64" => "B",
        "55-59" => "BC",
        "50-54" => "C",
        "45-49" => "CD",
        "40-44" => "D",
        "0-39" => "F",
    ];

    return mapScoreToRange($score, $letterGradeRanges);
}

// -------------------------- Score Grade Point -------------------------

function getScoreGradePoint($score) {
    $gradePointRanges = [
        "75-100" => 4.00,
        "70-74" => 3.50,
        "65-69" => 3.25,
        "60-64" => 3.00,
        "55-59" => 2.75,
        "50-54" => 2.50,
        "45-49" => 2.25,
        "40-44" => 2.00,
        "0-39" => 0.00,
    ];

    return mapScoreToRange($score, $gradePointRanges);
}

// -------------------------- Class of Diploma -------------------------

function getClassOfDiploma($gpa) {
    $diplomaRanges = [
        "3.50-4.00" => "Distinction",
        "3.00-3.49" => "Upper Credit",
        "2.50-2.99" => "Lower Credit",
        "2.00-2.49" => "Pass",
        "0.00-1.99" => "Fail",
    ];

    return mapScoreToRange($gpa, $diplomaRanges);
}
?>
