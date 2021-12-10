<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta Informativa</title>
</head>
<style>
    .borderarriba
    {
        border-top: black 1px dashed;
    }
    .negrita
    {
        font-weight: bold;
    }
    .border
    {
        /* border: solid 1px black; */
        border: black 1px dashed;
    }
    .t9
    {
        font-size: 12px; 
    }
    .t60
    {
        font-size: 60px; 
    }
    .t20
    {
        font-size: 20px; 
    }
    .texto
    {
        /* -webkit-text-stroke: 2px black; */
        text-shadow: 2px 2px #FF0000;
        color: rgb(119, 235, 119)
    }
    .centrartabla{
        margin: auto;
    }
    .verticalText {
    writing-mode: vertical-lr;
    transform: rotate(270deg);
    }
    .fondo{
        background-color: #adb5bd;
        font-weight: bold;
    }
    html { 
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: transparent;
    }
    @-ms-viewport {
    width: device-width;
    }
    body {
    margin: 0;
    font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #ffffff;
    }
    @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
    }
    @media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
    }
    @media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
    }
    /* 
    .container-fluid {
    width: 100%;
    padding-right: 7.5px;
    padding-left: 7.5px;
    margin-right: auto;
    margin-left: auto;
    } */
    .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
    }
    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 7.5px;
    padding-left: 7.5px;
    }
    .col {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
    }
    .col-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
    }
    .col-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
    max-width: 8.333333%;
    }
    .col-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
    max-width: 16.666667%;
    }
    .col-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
    }
    .col-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
    max-width: 33.333333%;
    }
    .col-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
    max-width: 41.666667%;
    }
    .col-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
    }
    .col-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
    max-width: 58.333333%;
    }
    .col-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
    max-width: 66.666667%;
    }
    .col-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
    }
    .col-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
    max-width: 83.333333%;
    }
    .col-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
    max-width: 91.666667%;
    }
    .col-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
    }
    .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }
    @media (min-width: 576px) {
    .container {
        max-width: 540px;
    }
    }
    @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
    }
    @media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
    }
    @media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
    }
    .container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }
    .row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    }
    .text-justify {
    text-align: justify !important;
    }
    .text-nowrap {
    white-space: nowrap !important;
    }
    .text-left {
    text-align: left !important;
    }
    .text-right {
    text-align: right !important;
    }
    .text-center {
    text-align: center !important;
    }
    .text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
    }
    @media print {
    *,
    *::before,
    *::after {
        text-shadow: none !important;
        -webkit-box-shadow: none !important;
                box-shadow: none !important;
    }
    a:not(.btn) {
        text-decoration: underline;
    }
    abbr[title]::after {
        content: " (" attr(title) ")";
    }
    pre {
        white-space: pre-wrap !important;
    }
    pre,
    blockquote {
        border: 1px solid #adb5bd;
        page-break-inside: avoid;
    }
    thead {
        display: table-header-group;
    }
    tr,
    img {
        page-break-inside: avoid;
    }
    p,
    h2,
    h3 {
        orphans: 3;
        widows: 3;
    }
    h2,
    h3 {
        page-break-after: avoid;
    }
    @page {
        size: a3;
    }
    body {
        min-width: 992px !important;
    }
    .container {
        min-width: 992px !important;
    }
    .navbar {
        display: none;
    }
    .badge {
        border: 1px solid #000;
    }
    }
    /*!
    *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
    *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
    */
    /* FONT PATH
    * -------------------------- */
</style>
<body>
    <div class="container-fluid">
        
        <div class="row">
            <table border="1" cellpadding="0" cellspacing="0" class="text-center" style="font-size: 9px">
                
            </table>
        </div>
        {{-- <div style="page-break-after:always;"></div> --}}
       
</body>
</html>