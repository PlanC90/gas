<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $walletAddress = $_POST["walletAddress"];
    $bybitUid = $_POST["bybitUid"];

    $data = array(
        "walletAddress" => $walletAddress,
        "bybitUid" => $bybitUid
    );

    $file = 'cekim.json';

    // Check if the file exists
    if (file_exists($file)) {
        // Get the existing data
        $currentData = file_get_contents($file);
        $arrayData = json_decode($currentData, true);

        // If $arrayData is null, initialize it as an empty array
        if ($arrayData === null) {
            $arrayData = [];
        }

        // Check if the wallet address already exists
        $walletExists = false;
        foreach ($arrayData as $entry) {
            if ($entry["walletAddress"] == $walletAddress) {
                $walletExists = true;
                break;
            }
        }

        // If the wallet address already exists, don't add it again
        if ($walletExists) {
            echo "Wallet address already registered.";
            echo "<script>
                    alert('This wallet address has already been registered.');
                    window.location.href = 'index.html';
                  </script>";
            exit; // Stop further execution
        }

        // Append the new data
        $arrayData[] = $data;

        // Encode the updated array
        $jsonData = json_encode($arrayData, JSON_PRETTY_PRINT);
    } else {
        // If the file doesn't exist, create a new array with the data
        $jsonData = json_encode(array($data), JSON_PRETTY_PRINT);
    }

    // Write the data to the file
    if (file_put_contents($file, $jsonData)) {
        echo "Data saved to cekim.json";
    } else {
        echo "Error saving data";
    }
} else {
    echo "Invalid request method.";
}
?>
<script>
  window.location.href = 'index.html';
</script>
