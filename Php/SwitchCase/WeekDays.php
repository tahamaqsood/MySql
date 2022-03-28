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


// Program: Week Days

$Day = "Saturday";

switch($Day)
{
    case "Monday":
        echo "Today is Monday";
        break;

        case "Tuesday":
            echo "Today is Tuesday";
            break;

            case "Wednesday":
                echo "Today is Wednesday";
                break;

                case "Thursday":
                    echo "Today is Thursday";
                    break;

                    case "Friday":
                        echo "Today is Friday";
                        break;

                        case "Saturday":
                            echo "Today is Saturday";
                            break;

                            case "Sunday":
                                echo "Today is Sunday";
                                break;

                                default :
                                echo "Invalid Day!!";
                                break;
}

?>