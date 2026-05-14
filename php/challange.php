<?php
class EmailException extends Exception {
    public function errorMessage() {
        return "Error caught on line " . $this->getLine() . " in " . $this->getFile() 
               . ": <b>" . $this->getMessage() . "</b> is no valid E-Mail address";
    }
}

$emails = [
    "lab4a@polsub.ac.id",
    "lab4b@polsub.ac.id",
    "lab4c@polsub.ac.id",
    "lab4d@polsub.ac.id",
    "lab5a@polsub.ac.id",
    "lab5b@polsub.ac.id",
    "lab5c@polsub.ac.id",
    "someone@example...com"
];

$countLab4 = 0;
$countLab5 = 0;
$countInvalid = 0;

foreach ($emails as $email) {
    try {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new EmailException($email . " tidak mengandung kata 'lab4/lab5' dan tidak valid");
        }

        if (strpos($email, 'lab4') !== false) {
            echo $email . " mengandung kata 'lab4' dan E-mail valid <br>";
            $countLab4++;
        } elseif (strpos($email, 'lab5') !== false) {
            echo $email . " mengandung kata 'lab5' dan E-mail valid <br>";
            $countLab5++;
        } else {
            throw new EmailException($email . " tidak mengandung kata 'lab4/lab5'");
        }

    } catch (EmailException $e) {
        echo $e->errorMessage() . "<br>";
        $countInvalid++;
    }
}

echo "<br>Terdapat $countLab4 email lab 4 dan $countLab5 email lab 5";
echo "<br>Terdapat $countInvalid email bukan lab4/lab5";

?>