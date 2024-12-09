<?php header("Content-type: text/css"); ?>

html {
width: 100%;
height: 100%;
display: flex;
align-items: center;
justify-content: center;
}

body {
width: 30%;
font-family: Arial, sans-serif;
background-color: #f4f4f4;
margin: 0;
padding: 0;
}

.print-container {
width: 100%;
margin: 30px 0;
padding: 20px;
background-color: #F9F9F9;
border-radius: 8px !important;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
display: flex;
flex-direction: column;
align-items: flex-start;
justify-content: center;
}

.print-header {
text-align: left;
margin-bottom: 0px;
}

.print-header h1 {
font-family: Arial, sans-serif;
font-size: 24px;
color: #000;
}

.print-header p {
font-family: Arial, sans-serif;
font-size: 16px;
color: #000;
}

.details {
margin-bottom: 0px;
}

.details p {
font-family: Arial, sans-serif;
font-size: 16px;
line-height: 1.0;
color: #000;
}

.details strong {
font-family: Arial, sans-serif;
color: #000;
}

.print-footer {
text-align: center;
}

.print-footer button {
background-color: #28a745;
color: white;
border: none;
padding: 10px 20px;
font-size: 16px;
border-radius: 5px;
cursor: pointer;
}

.print-footer button:hover {
background-color: #218838;
}

#print-button{
margin-left: 22px;
}

.buttom-imprimir button{
background-color: #28a745;
color: white;
border: none;
padding: 10px 20px;
font-size: 16px;
border-radius: 5px;
cursor: pointer;
}

.buttom-email{
background-color: #28a745;
color: white;
border: none;
padding: 10px 20px;
font-size: 16px;
border-radius: 5px;
cursor: pointer;
margin-left: 24px;
}

#button-close{
background-color: #28a745;
position: absolute;
top: 10px;
right: 10px;
width: 20px;
height:20px;
border-radius: 100%;
color: white;
border: none;
}

#popup{
position: relative;
width: 100%;
background-color: #f9f9f9;
border-radius: 8px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
border: none;
padding: 20px;
border: none;
}

#popup p{
font-size: 16px;
}

#container-envio-email{
display: flex;
}