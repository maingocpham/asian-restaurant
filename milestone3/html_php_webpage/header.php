<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu - Asian Asian</title>
    <style>
        /* Same styles as the homepage */
        body {
            font-family: Arial, sans-serif;
            color: black;
            background-color: #f4f4f4;
        }

        /* Navigation bar */
        nav {
            display: flex;
            /* justify-content: space-between;   */
            align-items: center;  /* Vertically center the items */
            background-color: #580808;
            padding: 10px 20px;  /* Padding around the navbar */
        }

        /* Center the links (Home, Menu, Reservations) */
        .nav-links {
            display: flex;
            justify-content: center;  /* Horizontally center the links */
            flex-grow: 1;  /* Make the links container take up available space */
        }

        /* Style the links inside the nav bar */
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 1.2em;
            display: inline-block;
        }

        /* Dropdown container for the login button */
        .dropdown {
            position: absolute;
            top: 17px;  
            right: 17px; /* Adjust the distance from the right */
        }

        /* Style the dropdown button */
        .dropbtn {
            background-color: #ae881f;
            color: white;
            padding: 14px 20px;
            font-size: 1.2em;
            border: none;
            cursor: pointer;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 65px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
            width: 50px; /* Adjust the width */
            height: auto; /* Auto height based on content */
            padding: 10px; /* Optional: add padding inside the dropdown */
            border: 1px solid #ccc; /* Optional: border to define the dropdown */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Show the dropdown content when hovering */
        .dropdown:hover .dropdown-content {
            display: block;
            width: 10px; /* Adjust the width */
            height: auto; /* Auto height based on content */
            padding: 10px; /* Optional: add padding inside the dropdown */
            border: 1px solid #ccc; /* Optional: border to define the dropdown */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);

        }

        /* Change the dropdown button color when hovering */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        /* Center heading */
        h1 {
            text-align: center;
            margin-top: 40px;
        }


            /* Form container */
            .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
        }

        /* Form elements */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 8px; /* space between line */
        }

        input, select, button {
            padding: 12px;
            margin-bottom: 20px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 0px;
        }

        button {
            background-color: #333;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #580808;
        }

        /* Styling for inputs to align them vertically */
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="time"],input[type="number"] , select {
            width: 96.5%; /* Full width for input fields */
        }

        /* Table styling
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        } */
        
    </style>
</head>
<body>

<nav>
    <a href="home.html">Home</a>
    <a href="menu.php">Menu</a>
    <a href="reservation.html">Reservations</a>
    <div class="dropdown">
        <button class="dropbtn">Login</button>
        <div class="dropdown-content">
            <a href="staff_login.html">Staff</a>
            <a href="admin_login.html">Admin</a>
        </div>
    </div>
</nav>