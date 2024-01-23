<?php header("Content-Type: text/css; charset=UTF-8"); //

/*
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
		 body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

		body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
*/

?>


	body {
		font-family: 'Arial', sans-serif;
		background-color: #f4f4f4;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 100vh;
	}
	table, th, td {
		border: 1px solid #ddd;
		padding: 10px;
		text-align: left;
		background-color: #f2f2f2;
	}
	th {
		background-color: #f2f2f2;
	}
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.4);
		padding-top: 60px;
		vertical-align: top;
	}

	.modal-content {
		background-color: #fefefe;
		margin: 5% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
		vertical-align: top;
	}

	.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}
		
		
	header {
		width: 100%;
		background-color: #333;
		overflow: hidden;
	}	
	
	table, form {
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
	
	.menu_principal{
		vertical-align: top;
		background-color: #ddd;
		color: black;
		text-decoration: none;
		cursor: pointer;
	}
	.subitem{
		vertical-align: top;
		background-color: #ddd;
		color: black;
		text-decoration: none;
		cursor: pointer;
	}