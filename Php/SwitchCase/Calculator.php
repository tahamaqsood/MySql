<?php


// Switch Case:


/* 

=> Switch statement is an alternate of a lengthy 'if else' construct.

=> Sometimes 'if else' gets lengthy and more complicated, in that sort of situations
we need to use Switch cases because it is way more proficient, easy and reliable.

=> The only difference between 'if else' and 'Switch Case' is that we can't use operators
in switch cases to compare values.

=> We compare actual value of a variable with our cases.

=> Cases name can either be in an integer format or in a string format.

=> Must use 'break' keyword to terminate statement after the condition matches.

*/


// Program: Calculator

$num1 = 10;
$num2 = 5;
$operator = '+';

switch($operator)
{
    case '+':
        $sum = $num1 + $num2;
        echo "Result is: " . $sum;
        break;

        case '-':
            $sub = $num1 - $num2;
            echo "Result is: " . $sub;
            break;

            case '*':
                $product = $num1 * $num2;
                echo "Result is: " . $product;
                break;

                case '/':
                    $div = $num1 / $num2;
                    echo "Result is: " . $div;
                    break;

                    default:
                    echo "Invalid operator";
                    break;
}

?>