<?php header("Content-Type: text/css; charset=UTF-8"); ?>


body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: top;
    justify-content: top;
    height: 100vh;
}

/* Adiciona estilos específicos para o menu */
header {
    background-color: #333;
    color: white;
    padding: 10px;
    text-align: top;
    width: 100%;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    margin-top: 20px;
    box-sizing: border-box;
}

h2 {
    text-align: center;
    color: #333;
}

input, select {
    width: 100%;
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
