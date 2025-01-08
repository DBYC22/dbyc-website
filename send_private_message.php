<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['private_message'];

    if (!empty($message)) {
        // Connection to database
        $conn = new mysqli('localhost', 'root', '', 'dbyc');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages (message_content) VALUES (?)");
        $stmt->bind_param("s", $message); // 's' means string

        // Execute the query
        if ($stmt->execute()) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

 '<script>
    setTimeout(function() {
        window.location.href = "index.html";
    }, 2000); // Delay of 5 seconds
</script>';

