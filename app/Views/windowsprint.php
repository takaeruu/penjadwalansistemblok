<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            text-align: center;
        }
        table {
            font-family: 'Times New Roman', Times, serif;
            width: 100%;
        
        }
        table, th, td {
           
            padding: 5px 5px;
            text-align: center;
           
        }
        @media print {
            #print-button {
                display: none;
            }
        }
      
       
   </style>
   
</head>
<body>
<!-- <script type="text/javascript">
                window.print();
            </script> -->
            <button id="print-button" onclick="printPdf()">Print PDF</button>
<p>JADWAL MATA PELAJARAN</p> <br>
            <table class="table-container" style="font-size: 10px;" border="1px">
            <thead>
            <tr>
               
                <th scope="col">NIS</th>
                <th scope="col">NAMA GURU</th>
                <th scope="col">MATA PELAJARAN</th>
                <th scope="col">JAM MULAI PELAJARAN</th> 
                <th scope="col">JAM SELESAI PELAJARAN</th>
                        
            </tr>
            </thead>
            <?php
           
            foreach($yoga as $abcd){
            ?>
            <tbody>
            <tr>
              
                <td><?= $abcd->sesi?></td>
                <td><?= $abcd->nama_guru ?></td>
                <td><?= $abcd->nama_mapel ?></td>
                <td><?= $abcd->jam_mulai ?></td>
                <td><?= $abcd->jam_selesai ?></td>		
              
            </tr>
            </tbody>
            <?php } ?>
    </table>
    <script>
function printPdf() {
    window.print();
}
</script>
</body>
</html>