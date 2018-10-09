<?php

// Required namespace
namespace Seeds;

class PageSeeder
{
    // Required static method
    public static function seed()
    {
        // Prints this message on terminal
        echo "\n\n";
        echo "\nSeeding Pages:";
        echo "\n------------------------";
        // Call separated methods for organization
        self::addUser();
    }

    public static function addUser()
    {
        // Adds the page, using ORM Model defined for the project:
        try {

            Auth::create_user('admin', '123456', 'daidv@rikkeisoft.com', 100);
			Auth::create_user('daidv', '123456', 'daidv@rikkeisoft.com', 100);

            // Prints this message on terminal
            echo "\nuser";
        } catch (\Exception $e) {

            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving user:";
            echo "\n" . $e->getMessage(). "\n";
        }
    }
}