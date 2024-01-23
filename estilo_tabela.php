<?php header("Content-Type: text/css; charset=UTF-8"); ?>

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    color: #333;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}


form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

input, select {
    width: calc(100% - 24px);
    padding: 10px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 12px;
    font-size: 16px;
    width: 100%;
    display: block;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
