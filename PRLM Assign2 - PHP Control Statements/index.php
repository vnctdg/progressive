<?php
require "student_data.php";
include "header.php";

// 1. SWITCH STATEMENT: Course Message
echo "\n[COURSE STATUS]\n";
switch ($course) {
    case "BSIT":
        echo "Track: Information Technology (Network Administrator)\n";
        break;
    case "BSCS":
        echo "Track: Computer Science (Algorithms & AI)\n";
        break;
    default:
        echo "Track: General Computing Studies\n";
        break;
}

// 2. FOREACH LOOP + IF/ELSEIF/ELSE: Evaluate Subject Grades
echo "\n[SUBJECT GRADES]\n";
$totalGrade = 0;
$passedCount = 0;
$failedCount = 0;

foreach ($subjects as $subjectName => $grade) {
    $totalGrade += $grade;

    if ($grade >= 90) {
        $remark = "Excellent";
        $passedCount++;
    } elseif ($grade >= 75) {
        $remark = "Passed";
        $passedCount++;
    } else {
        $remark = "Failed (Needs Retake)";
        $failedCount++;
    }

    echo "- $subjectName: $grade ($remark)\n";
}

// Compute Average
$totalSubjects = count($subjects);
$average = round($totalGrade / $totalSubjects, 2);

echo "--------------------------------------------------\n";
echo "General Average: $average\n";
echo "Passed: $passedCount | Failed: $failedCount\n";

// Nested IF for Academic Standing
if ($failedCount == 0 && $average >= 90) {
    echo "Standing: DEAN'S LISTER! Keep it up!\n";
} elseif ($failedCount == 0 && $average >= 75) {
    echo "Standing: Regular Student (Good Standing)\n";
} else {
    echo "Standing: Academic Warning (Clear failed subjects)\n";
}

// 3. FOR LOOP: 5-Day School Week Allowance Tracker
echo "\n[WEEKLY ALLOWANCE TRACKER (5 DAYS)]\n";
$dailySavings = $dailyAllowance - $dailyExpense;
$weeklySavings = 0;

for ($day = 1; $day <= 5; $day++) {
    $weeklySavings += $dailySavings;
    echo "Day $day: Saved PHP $dailySavings | Total Saved: PHP $weeklySavings\n";
}

// 4. WHILE LOOP: How many weeks to afford a school item
echo "\n[SAVINGS GOAL SIMULATION]\n";
echo "Goal: $goalItem (PHP $goalPrice)\n";

$currentMoney = 0;
$weeks = 0;

while ($currentMoney < $goalPrice) {
    $weeks++;
    $currentMoney += $weeklySavings;
    echo "Week $weeks: Total Money = PHP $currentMoney\n";
}
echo "Result: You can buy the $goalItem in $weeks week(s)!\n";

// 5. DO-WHILE LOOP: Simple Student Reminders
echo "\n[STUDENT REMINDERS]\n";
$step = 1;
do {
    if ($step == 1) {
        echo "1. Review your weak subjects before finals.\n";
    } elseif ($step == 2) {
        echo "2. Save at least PHP $dailySavings every school day.\n";
    } else {
        echo "3. Submit all PHP activities on time!\n";
    }
    $step++;
} while ($step <= 3);

include "footer.php";
?>
