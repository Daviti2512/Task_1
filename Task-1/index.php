<?php
// სტუდენტის პასუხები და ლექტორის შეფასებები
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_responses = [
        'php' => $_POST['php'] ?? '',
        'html' => $_POST['html'] ?? '',
        'css' => $_POST['css'] ?? '',
        'csharp' => $_POST['csharp'] ?? '',
        'javascript' => $_POST['javascript'] ?? ''
    ];

    $lecturer_scores = [
        'php' => $_POST['php_score'] ?? 0,
        'html' => $_POST['html_score'] ?? 0,
        'css' => $_POST['css_score'] ?? 0,
        'csharp' => $_POST['csharp_score'] ?? 0,
        'javascript' => $_POST['javascript_score'] ?? 0
    ];

    // საშუალო ქულის გამოთვლა
    $average_score = array_sum($lecturer_scores) / count($lecturer_scores);

    // შედეგების ჩვენება
    echo "<h2>სტუდენტის პასუხები და ლექტორის შეფასებები</h2>";
    foreach ($student_responses as $subject => $response) {
        echo "<p><strong>კითხვა: რა არის " . ucfirst($subject) . "?</strong><br>";
        echo "სტუდენტის პასუხი: $response<br>";
        echo "ლექტორის შეფასება: " . $lecturer_scores[$subject] . "</p>";
    }

    echo "<h3>საშუალო ქულა: $average_score</h3>";
}
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>სტუდენტის შეფასების ფორმა</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: gray;
            border: 1px solid black;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #f8fbff;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: silver;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: black;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .bottom-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bottom-section select, .bottom-section input[type="submit"] {
            width: 45%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align: center;">სტუდენტის შეფასების ფორმა</h2>
    <form method="POST">
        <table>
            <thead>
                <tr>
                    <th>კითხვა</th>
                    <th>სტუდენტის პასუხი</th>
                    <th>ლექტორის შეფასება</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>რა არის PHP?</td>
                    <td><input type="text" name="php"></td>
                    <td><input type="number" name="php_score" min="0" max="10"></td>
                </tr>
                <tr>
                    <td>რა არის HTML?</td>
                    <td><input type="text" name="html"></td>
                    <td><input type="number" name="html_score" min="0" max="10"></td>
                </tr>
                <tr>
                    <td>რა არის CSS?</td>
                    <td><input type="text" name="css"></td>
                    <td><input type="number" name="css_score" min="0" max="10"></td>
                </tr>
                <tr>
                    <td>რა არის C#?</td>
                    <td><input type="text" name="csharp"></td>
                    <td><input type="number" name="csharp_score" min="0" max="10"></td>
                </tr>
                <tr>
                    <td>რა არის JavaScript?</td>
                    <td><input type="text" name="javascript"></td>
                    <td><input type="number" name="javascript_score" min="0" max="10"></td>
                </tr>
            </tbody>
        </table>

        <!-- ქვედა სექცია -->
        <div class="bottom-section">
            <input type="submit" value="გაგზავნა">
        </div>
    </form>
</div>

</body>
</html>
