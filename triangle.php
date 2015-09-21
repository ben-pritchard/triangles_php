<?php
    $form_side1 = $_GET["side1"];
    $form_side2 = $_GET["side2"];
    $form_side3 = $_GET["side3"];

    $user_triangle = new Triangle($form_side1, $form_side2, $form_side3);

    class Triangle {
        private $side1;
        private $side2;
        private $side3;

        function __construct($side1, $side2, $side3)
        {
            $this->side1 = $side1;
            $this->side2 = $side2;
            $this->side3 = $side3;
        }

        function determineTriangle()
        {
            if ($this->validTriangle()) {
                if ($this->side1 == $this->side2 && $this->side2 == $this->side3) {
                    return "This is an equilateral triangle!";
                } elseif ($this->side1 == $this->side2 || $this->side2 == $this->side3 || $this->side1 == $this->side3 ) {
                    return "This is an isoceles triangle!";
                } else {
                    return "This is a scalene triangle";
                }
            } else {
                return "This is not a valid triangle!";
            }
        }

        function validTriangle()
        {
            // Check to see if user input valid numbers
            if ($this->side1 <= 0 || $this->side2 <= 0 || $this->side3 <= 0) {
                return false;
            }

            // Check to see if sides make a valid triangle
            $side_array = array($this->side1, $this->side2, $this->side3);
            sort($side_array); //sort function changes the array indices
            if ($side_array[0] + $side_array[1] > $side_array[2]) {
                return true;
            } else {
                return false;
            }

        }

        //getters and setters
        function getSide1()
        {
            return $this->side1;
        }

        function getSide2()
        {
            return $this->side2;
        }

        function getSide3()
        {
            return $this->side3;
        }

        function setSide1($length1)
        {
            $this->side1 = $length;
        }

        function setSide2($length2)
        {
            $this->side2 = $length;
        }

        function setSide3($length3)
        {
            $this->side3 = $length;
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <title>Triangle Results</title>
    </head>
    <body>
        <div class="container">
            <?php
                echo "<p>Side 1 length: ".$user_triangle->getSide1()."</p>
                      <p>Side 2 length: ".$user_triangle->getSide2()."</p>
                      <p>Side 3 length: ".$user_triangle->getSide3()."</p>
                      <p>Your Result: ".$user_triangle->determineTriangle()."</p>

                        "

             ?>

        </div>

    </body>
</html>
