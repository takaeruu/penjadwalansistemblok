<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?= base_url('css/simplebar.css')?>">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?= base_url('css/feather.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/select2.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/dropzone.css')?>"> 
    <link rel="stylesheet" href="<?= base_url('css/uppy.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/jquery.steps.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/jquery.timepicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/quill.snow.css')?>">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?= base_url('css/daterangepicker.css')?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?= base_url('css/app-light.css')?>" id="lightTheme">
    <link rel="stylesheet" href="<?= base_url('css/app-dark.css')?>" id="darkTheme" disabled>
    
  </head>

  <style>

.Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: rgb(255, 65, 65);
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 280px;
  border-radius: 40px;
  transition-duration: .3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px ,2px);
}


  </style>
