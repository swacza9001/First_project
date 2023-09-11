<?php

class MessageHandler
{
    /**
     * Storing positive massages in array
     * @param string $message Message to show the user
     */
    public static function addPositiveMessage(string $message)
    {
        if (isset($_SESSION['positive_messages'])) {
            $_SESSION['positive_messages'][] = $message;
        } else {
            $_SESSION['positive_messages'] = array($message);
        }   
    }
    
    /**
     * Storing negative messages in array
     * @param string $message Message to show the user
     */
    public static function addNegativeMessage(string $message)
    {
        if (isset($_SESSION['negative_messages'])) {
            $_SESSION['negative_messages'][] = $message;
        } else {
            $_SESSION['negative_messages'] = array($message);
        }   
    }
    
    /**
     * Unsetting of the superglobal array and returning all of the messages
     * @return array Array of both positive and negative messages
     */
    public static function returnMessages(): array
    {
        $messages = [];

        if (isset($_SESSION['positive_messages'])) {
            $messages['positive'] = $_SESSION['positive_messages'];
            unset($_SESSION['positive_messages']);
        }

        if (isset($_SESSION['negative_messages'])) {
            $messages['negative'] = $_SESSION['negative_messages'];
            unset($_SESSION['negative_messages']);
        }

        return $messages;
    }

}    