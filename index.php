<?php
include "config.php";

if (isset($_POST['search'])) {
    $searchUserName = $_POST['search_username'];
    $searchLevel = $_POST['search_level'];

    $sql = "SELECT * FROM users WHERE userName = '$searchUserName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($searchLevel > 1) {
            $row = $result->fetch_assoc();
            $refID = $row["ref"];
            $finalResult = '';

            for ($i = $searchLevel - 1; $i > 0; $i--) {
                $sql = "SELECT * FROM users WHERE id = '$refID'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $refID = $row["ref"];

                    $sql = "SELECT * FROM users WHERE id = '$refID'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $finalResult = '';
                        while ($row = $result->fetch_assoc()) {
                            $finalResult = "User Name: " . $row["userName"] . "<br>";
                        }
                    } else {
                        $finalResult = "No matching results were found.";
                        break;
                    }
                } else {
                    $finalResult = "No matching results were found.";
                    break;
                }
            }

            if (!empty($finalResult)) {
                echo '<div class="container mt-3">';
                echo "Result: ";
                echo $finalResult;
                echo '</div>';
            } else {
                echo '<div class="container mt-3">';
                echo "No matching results were found.";
                echo '</div>';
            }
        }
        else{
            $row = $result->fetch_assoc();
            $refID = $row["ref"];

            $sql = "SELECT * FROM users WHERE id = '$refID'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $finalResult = "User Name: " . $row["userName"] . "<br>";
                }
            } else {
                $finalResult = "No matching results were found.";
            }
            if (!empty($finalResult)) {
                echo '<div class="container mt-3">';
                echo "Result: ";
                echo $finalResult;
                echo '</div>';
            } else {
                echo '<div class="container mt-3">';
                echo "No matching results were found.";
                echo '</div>';
            }
        }
    }
    else {
        echo '<div class="container mt-3">';
        echo "No matching results were found.";
        echo '</div>';
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Xtech789_test</title>
</head>

<body>
    <div class="container mt-3">
        <form method="POST" action="">
            <div class="mb-3 mt-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" placeholder="User Name" name="search_username" required
                    value="<?php echo isset($_POST['search_username']) ? $_POST['search_username'] : '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Level</label>
                <input type="number" min="1" class="form-control" placeholder="Level" name="search_level" required
                    value="<?php echo isset($_POST['search_level']) ? $_POST['search_level'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
    </div>

</body>

</html>