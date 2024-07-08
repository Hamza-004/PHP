<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Information Form</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: 'Arial', sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #FFFFFF;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #DDDDDD;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #F3F3F3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>User Information Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="action" value="submit">
            <input type="hidden" name="index" id="index">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="fname" id="firstName" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lname" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label for="employeeType">Employee Type</label>
                <select class="form-control" id="employeeType" name="employeeType" required>
                    <option value="">Select Employee Type</option>
                    <option>Developer</option>
                    <option>UI/UX Designer</option>
                    <option>Project Manager</option>
                    <option>Business Analyst</option>
                    <option>HR</option>
                    <option>SEO</option>
                    <option>Content Writer</option>
                    <option>Back Linker</option>
                    <option>QA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inTime">Office In-time</label>
                <input type="datetime-local" class="form-control" id="inTime" name="inTime" required>
            </div>
            <div class="form-group">
                <label for="outTime">Office Out-time</label>
                <input type="datetime-local" class="form-control" id="outTime" name="outTime" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    session_start();
    if (!isset($_SESSION['formData'])) {
        $_SESSION['formData'] = array();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $index = isset($_POST['index']) ? $_POST['index'] : null;

        if ($action == 'submit') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $employeeType = $_POST['employeeType'];
            $inTime = $_POST['inTime'];
            $outTime = $_POST['outTime'];

            $entry = array(
                "fname" => $fname,
                "lname" => $lname,
                "employeeType" => $employeeType,
                "inTime" => $inTime,
                "outTime" => $outTime
            );

            if ($index !== null && $index !== '') {
                $_SESSION['formData'][$index] = $entry;
            } else {
                $_SESSION['formData'][] = $entry;
            }
        } elseif ($action == 'delete' && $index !== null) {
            array_splice($_SESSION['formData'], $index, 1);
        }
    }

    echo "<div class='container mt-5'>";
    echo "<h3>Submitted Data</h3>";
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>First Name</th><th>Last Name</th><th>Employee Type</th><th>Office In Time</th><th>Office Out Time</th><th>Actions</th></tr></thead>";
    echo "<tbody>";
    foreach ($_SESSION['formData'] as $i => $entry) {
        echo '<tr>';
        echo "<td>{$entry['fname']}</td>";
        echo "<td>{$entry['lname']}</td>";
        echo "<td>{$entry['employeeType']}</td>";
        echo "<td>{$entry['inTime']}</td>";
        echo "<td>{$entry['outTime']}</td>";
        echo "<td>
                <form method='post' style='display:inline-block;'>
                    <input type='hidden' name='action' value='edit'>
                    <input type='hidden' name='index' value='$i'>
                    <button type='submit' class='btn btn-warning btn-sm'>Edit</button>
                </form>
                <form method='post' style='display:inline-block;'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='hidden' name='index' value='$i'>
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>
              </td>";
        echo '</tr>';
    }
    echo "</tbody></table>";
    echo "</div>";
//  tempclear\
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit') {
        $index = $_POST['index'];
        $entry = $_SESSION['formData'][$index];
        echo "<script>
                document.getElementById('firstName').value = '{$entry['fname']}';
                document.getElementById('lastName').value = '{$entry['lname']}';
                document.getElementById('employeeType').value = '{$entry['employeeType']}';
                document.getElementById('inTime').value = '{$entry['inTime']}';
                document.getElementById('outTime').value = '{$entry['outTime']}';
                document.getElementById('index').value = '$index';
              </script>";
    }
    ?>
    //from here a new branch started
    <h1>the new branch begin</h1>
    <h1>the new branch begin</h1>

    <h1>the new branch begin</h1>
    <h1>the new branch begin</h1>
    <h1>the new branch begin</h1>
    <h2>the second new branch <h2>
    <h2>the third new branch <h2>
    <h2>the fourth new branch <h2>
    <h2>the fifth new branch <h2>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>