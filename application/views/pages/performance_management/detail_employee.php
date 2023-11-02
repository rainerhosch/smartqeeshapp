<!doctype html>
<html><head>
        <title></title>
        <style type="text/css">
        p{
            font-family: Arial, Helvetica, sans-serif;
        }
        </style>
    </head><body align="center" style="font-family: calibri; font-size: 18 px;">
        <br>
        <h2>DETAIL EMPOLYEE MEDICAL CHECKUP</h2>
        <br>

        <?php foreach($employee as $em):?>
            <?php if($em['intIdEmployee'] == $detail->intIdEmployee):?>
        <p><b>EMPLOYEE NUMBER:</b> <?php echo $em['txtNikEmployee'] ?></p>
        <p><b>NAME:</b> <?php echo $em['txtNameEmployee'] ?></p>
        <p><b>ADDRESS:</b> <?php echo $em['txtAlamat1'] ?> <?php echo $em['txtAlamat2'] ?></p>
        <p><b>DEPARTEMENT:</b> </p>
        <p><b>SERVICE PERIOD:</b> <?php echo $detail->service_period?></p>
        <p><b>AGE:</b> <?php echo $detail->age?></p>
        <?php endif?>
        <?php endforeach?>
        <br>

        <p><b>MCU PERIOD:</b> <?php echo $detail->mcu_period?></p>

        <?php foreach($hospital as $hpt):?>
            <?php if($hpt['IdHospital'] == $detail->hospital):?>
        <p><b>HOSPITAL:</b> <?php echo $hpt['HospitalName'] ?></p>
            <?php endif?>
        <?php endforeach?>
        
        <?php foreach($type as $type):?>
            <?php if($type['idMcuType'] == $detail->mcu_type):?>
        <p><b>MCU TYPE:</b> <?php echo $type['type'] ?></p>
            <?php endif?>
        <?php endforeach?>

        <p><b>DATE OF MCU:</b> <?php echo $detail->mcu_date?></p>
        <br>

        <p><b>HEALTH STATUS:</b> <?php echo $detail->health_status?></p>

        <p><b>HEIGHT:</b> <?php echo $detail->height?> cm</p>

        <p><b>WEIGHT:</b> <?php echo $detail->weight?> kg</p>

        <p><b>BMI:</b> <?php echo $detail->bmi?> kg/m<sup>2</sup></p>

        <p><b>CHOLESTEROL:</b> <?php echo $detail->cholesterol?> mg/dL</p>
        
        <p><b>GOUT:</b> <?php echo $detail->gout?> mg/dL</p>
        
        <p><b>BLOOD SUGAR:</b> <?php echo $detail->bloodsugar?> mg/dL</p>

        <p><b>BLOOD PRESSURE:</b> <?php echo $detail->bloodpressure?> mmHg</p>


        <p><b>HEALTH STATUS:</b> <?php echo $detail->health_status?></p>


        <?php foreach($disease as $dis):?>
            <?php if($dis['intidDisease'] == $detail->identified_disease):?>
        <p>I<b>DENTIFIED DISEASE:</b> <?php echo $dis['txtNamaDisease'] ?></p>
            <?php endif?>
        <?php endforeach?>

        <p><b>TREATMENT:</b> <?php echo $detail->treatment?></p>
        <!-- Script di bawah untuk menampilkan jendela print-->
        <script type="text/javascript">
            window.print()
        </script>
    </body></html>